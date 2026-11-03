<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // Menampilkan Katalog Dinamis di Homepage (Hanya Produk yang Disetujui / Tersedia)
    public function index()
    {
        $queryPublished = function ($q) {
            $q->where('status', 'approved')
                ->orWhere('status', 'available')
                ->orWhereNull('status');
        };

        $heroProducts = Product::with('user')
            ->where($queryPublished)
            ->latest()
            ->take(3)
            ->get();

        $recommendedProducts = Product::with('user')
            ->where($queryPublished)
            ->latest()
            ->take(8)
            ->get();

        $products = $recommendedProducts;

        return view('welcome', compact('heroProducts', 'recommendedProducts', 'products'));
    }

    // Menampilkan Form Tambah Produk
    public function create()
    {
        return view('seller.products.create');
    }

    // Menyimpan Produk Baru ke Database (Status awal: pending untuk kurasi admin)
    public function store(Request $request)
    {
        // Bersihkan format harga (misal: "4.224.000" -> 4224000)
        if ($request->filled('price')) {
            $cleanedPrice = preg_replace('/[^0-9]/', '', (string) $request->price);
            $request->merge(['price' => $cleanedPrice]);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'nullable',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'cod_location' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        $userId = Auth::id() ?? (User::first()->id ?? null);

        // Menentukan label kondisi fisik
        $condition = $request->input('condition_rating') ?? $request->input('condition', '9/10 Mulus');
        if ($condition === '10')
            $condition = '10/10 • BNIB Segel';
        elseif ($condition === '9')
            $condition = '9/10 • Like New';
        elseif ($condition === '8')
            $condition = '8/10 • Normal Pakai';
        elseif ($condition === '7')
            $condition = '7/10 • Minus Ringan';

        Product::create([
            'user_id' => $userId,
            'category_id' => $request->category_id ?? 1,
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'description' => $request->description,
            'condition_rating' => $condition,
            'price' => $request->price,
            'stock' => 1,
            'status' => 'pending', // Diubah dari 'available' menjadi 'pending' agar masuk antrean moderasi admin
            'cod_location' => $request->cod_location,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('home')->with('success', 'Barang preloved berhasil diunggah dan sedang menunggu tinjauan kurasi admin.');
    }

    // Menampilkan Detail Produk Dinamis
    public function show($slug)
    {
        $queryPublished = function ($q) {
            $q->where('status', 'approved')
                ->orWhere('status', 'available')
                ->orWhereNull('status');
        };

        $product = Product::with('user')->where('slug', $slug)->first();

        // Fallback untuk mockup / ID jika slug tidak ditemukan
        if (!$product) {
            $product = Product::with('user')->find($slug);
        }

        if (!$product) {
            // Ambil produk pertama yang sudah dipublikasikan sebagai fallback demo
            $product = Product::with('user')->where($queryPublished)->latest()->first();
        }

        if (!$product) {
            abort(404, 'Barang preloved tidak ditemukan atau belum disetujui.');
        }

        // Ambil produk serupa dari kategori yang sama dan sudah dipublikasikan
        $relatedProducts = Product::with('user')
            ->where($queryPublished)
            ->where('category_id', $product->category_id ?? 1)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        if ($relatedProducts->isEmpty()) {
            $relatedProducts = Product::with('user')
                ->where($queryPublished)
                ->where('id', '!=', $product->id)
                ->latest()
                ->take(4)
                ->get();
        }

        return view('products.show', compact('product', 'relatedProducts'));
    }

    // Menampilkan Form Edit Produk (Proteksi Otorisasi User / Admin)
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        if ($product->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403, 'Anda tidak memiliki otorisasi untuk mengubah atau menghapus barang milik pengguna lain.');
        }

        return view('seller.products.edit', compact('product'));
    }

    // Memperbarui Data Produk (Proteksi Otorisasi User / Admin)
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($product->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403, 'Anda tidak memiliki otorisasi untuk mengubah atau menghapus barang milik pengguna lain.');
        }

        // Bersihkan format harga (misal: "4.224.000" -> 4224000)
        if ($request->filled('price')) {
            $cleanedPrice = preg_replace('/[^0-9]/', '', (string) $request->price);
            $request->merge(['price' => $cleanedPrice]);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'nullable',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'cod_location' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5048',
        ]);

        $imagePath = $product->image_path;
        if ($request->hasFile('image')) {
            // Hapus gambar lama dari storage jika ada dan lokal
            if ($product->image_path && Storage::disk('public')->exists($product->image_path)) {
                Storage::disk('public')->delete($product->image_path);
            }
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // Menentukan label kondisi fisik
        $condition = $request->input('condition_rating') ?? $request->input('condition', $product->condition_rating);
        if ($condition === '10')
            $condition = '10/10 • BNIB Segel';
        elseif ($condition === '9')
            $condition = '9/10 • Like New';
        elseif ($condition === '8')
            $condition = '8/10 • Normal Pakai';
        elseif ($condition === '7')
            $condition = '7/10 • Minus Ringan';

        $product->update([
            'title' => $request->title,
            'category_id' => $request->category_id ?? $product->category_id,
            'description' => $request->description,
            'condition_rating' => $condition,
            'price' => $request->price,
            'cod_location' => $request->cod_location,
            'image_path' => $imagePath,
            'status' => 'pending', // Opsional: kembalikan ke pending agar setiap edisi ulang produk ditinjau ulang oleh admin
        ]);

        return redirect()->route('profile.edit')->with('success', 'Produk "' . $product->title . '" berhasil diperbarui dan menunggu kurasi ulang admin!');
    }

    // Menghapus Produk dari Lapak (Proteksi Otorisasi User / Admin)
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403, 'Anda tidak memiliki otorisasi untuk mengubah atau menghapus barang milik pengguna lain.');
        }

        // Hapus foto produk dari storage jika ada
        if ($product->image_path && Storage::disk('public')->exists($product->image_path)) {
            Storage::disk('public')->delete($product->image_path);
        }

        $title = $product->title;
        $product->delete();

        return redirect()->route('profile.edit')->with('success', 'Produk "' . $title . '" berhasil dihapus dari lapak!');
    }
}