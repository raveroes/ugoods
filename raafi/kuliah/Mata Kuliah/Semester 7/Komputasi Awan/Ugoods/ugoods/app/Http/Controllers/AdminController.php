<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // Statistik Kartu Atas
        $pendingProductsCount = Product::where('status', 'pending')->count();
        $pendingKtmCount = User::where('ktm_status', 'pending')->count();
        $totalActiveUsers = User::count();
        $totalIssues = 0; // Kasus aduan / kendala transaksi

        // Ambil data antrean produk yang statusnya pending/moderasi
        $productsQuery = Product::with('user')->where('status', 'pending')->latest();
        if ($request->filled('search')) {
            $search = $request->search;
            $productsQuery->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($u) use ($search) {
                        $u->where('name', 'like', "%{$search}%");
                    });
            });
        }
        $pendingProducts = $productsQuery->paginate(5, ['*'], 'products_page')->withQueryString();

        // Ambil data mahasiswa yang menunggu verifikasi KTM
        $pendingUsers = User::where('ktm_status', 'pending')->latest()->take(4)->get();

        return view('admin.dashboard', compact(
            'pendingProductsCount',
            'pendingKtmCount',
            'totalActiveUsers',
            'totalIssues',
            'pendingProducts',
            'pendingUsers'
        ));
    }

    public function approveProduct($id)
    {
        $product = Product::findOrFail($id);

        // Ubah status menjadi 'available' agar produk lolos filter publik dan tampil di beranda/katalog
        $product->update(['status' => 'available']);

        return redirect()->back()->with('success', 'Produk berhasil disetujui dan ditayangkan ke katalog umum.');
    }

    public function rejectProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->back()->with('success', 'Produk ditolak dan dihapus dari antrean.');
    }

    public function verifyKtm($id)
    {
        $user = User::findOrFail($id);
        $user->update(['ktm_status' => 'verified']);

        return redirect()->back()->with('success', 'KTM mahasiswa berhasil diverifikasi.');
    }

    public function rejectKtm($id)
    {
        $user = User::findOrFail($id);
        $user->update(['ktm_status' => 'rejected']);

        return redirect()->back()->with('success', 'Verifikasi KTM ditolak.');
    }
}