<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Transaction;

class OrderController extends Controller
{
    /**
     * Memproses checkout dan meng-generate Snap Token dari Midtrans Sandbox
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'delivery_method' => 'required',
        ]);

        $product = Product::findOrFail($request->product_id);

        // 🟢 MASALAH 2: Cek stok / status ketersediaan barang
        if ($product->status && $product->status === 'sold') {
            return response()->json([
                'status' => 'error',
                'message' => 'Maaf, barang ini baru saja dibeli oleh pengguna lain (Stok Habis).'
            ], 422);
        }

        $serviceFee = 2000;
        $deliveryFee = (int) $request->delivery_method;
        $totalPrice = (int) $product->price + $serviceFee + $deliveryFee;

        $orderNumber = 'UGD-' . time() . '-' . rand(100, 999);

        // 1. Simpan data pesanan awal ke database
        $order = Order::create([
            'order_number' => $orderNumber,
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'total_price' => $totalPrice,
            'shipping_cost' => $deliveryFee,
            'delivery_method' => $deliveryFee == 0 ? 'COD Kampus' : 'Antar ke Kos',
            'notes' => $request->notes ?? null,
            'payment_status' => 'pending',
        ]);

        // 2. Konfigurasi SDK Midtrans
        Config::$serverKey = trim(env('MIDTRANS_SERVER_KEY'));
        Config::$isProduction = (bool) env('MIDTRANS_IS_PRODUCTION', false);
        Config::$isSanitized = (bool) env('MIDTRANS_IS_SANITIZED', true);
        Config::$is3ds = (bool) env('MIDTRANS_IS_3DS', true);

        // 3. Susun parameter rincian transaksi untuk Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => $order->order_number,
                'gross_amount' => $totalPrice,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
            'item_details' => [
                [
                    'id' => $product->id,
                    'price' => (int) $product->price,
                    'quantity' => 1,
                    'name' => substr($product->title, 0, 50),
                ],
                [
                    'id' => 'FEE-1',
                    'price' => $serviceFee,
                    'quantity' => 1,
                    'name' => 'Biaya Layanan Penanganan',
                ],
                [
                    'id' => 'SHIP-1',
                    'price' => $deliveryFee,
                    'quantity' => 1,
                    'name' => 'Biaya Serah Terima / Ongkir',
                ]
            ]
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            $order->update(['snap_token' => $snapToken]);

            return response()->json([
                'status' => 'success',
                'snap_token' => $snapToken,
                'order_id' => $order->id,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Memeriksa & menyinkronkan status pesanan secara otomatis dengan API Midtrans
     */
    public static function syncOrderStatus($order)
    {
        if (!$order || $order->payment_status === 'settlement' || $order->payment_status === 'cancel') {
            return $order;
        }

        Config::$serverKey = trim(env('MIDTRANS_SERVER_KEY'));
        Config::$isProduction = (bool) env('MIDTRANS_IS_PRODUCTION', false);

        try {
            $midtransStatus = Transaction::status($order->order_number);
            $status = is_object($midtransStatus) ? $midtransStatus->transaction_status : ($midtransStatus['transaction_status'] ?? null);

            if ($status === 'settlement' || $status === 'capture') {
                $order->payment_status = 'settlement';
                $order->save();

                // 🟢 MASALAH 2: Tandai produk sebagai Terjual (SOLD)
                if ($order->product) {
                    $order->product->update(['status' => 'sold']);

                    // Batalkan otomatis pesanan pending pengguna lain untuk produk yang sama
                    Order::where('product_id', $order->product_id)
                        ->where('id', '!=', $order->id)
                        ->where('payment_status', 'pending')
                        ->update(['payment_status' => 'cancel']);
                }
            } else if (in_array($status, ['expire', 'cancel', 'deny'])) {
                $order->payment_status = $status;
                $order->save();
            }
        } catch (\Exception $e) {
            // Jika transaksi belum diproses di Midtrans, biarkan berstatus pending
        }

        return $order;
    }
}