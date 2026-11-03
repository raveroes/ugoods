<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Models\Product;
use App\Models\Order;

// 1. Homepage Feed
Route::get('/', [ProductController::class, 'index'])->name('home');

// 2. Auth: Login, Register, & Logout
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 3. Categories & Filters
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('categories.show');

// 4. Products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

// 5. Public Seller Profile (Bisa Dilihat Siapa Saja)
Route::get('/seller/{id}', [AuthController::class, 'showPublicProfile'])->name('seller.public');

// 6. Checkout & Cart (Hanya Mengambil Barang yang Belum Sold / Masih Tersedia)
Route::get('/checkout', function (Request $request) {
    $product = null;

    $queryAvailable = function ($q) {
        $q->whereNull('status')->orWhere('status', 'available');
    };

    if ($request->filled('product_id')) {
        $product = Product::with('user')
            ->where($queryAvailable)
            ->find($request->product_id);
    } elseif ($request->filled('product')) {
        $product = Product::with('user')
            ->where($queryAvailable)
            ->where('slug', $request->product)
            ->first();
    }

    return view('checkout.index', compact('product'));
})->name('checkout.index');

// 7. Protected Features (Perlu Login)
Route::middleware('auth')->group(function () {
    // Orders & Status Pembayaran Midtrans (dengan Auto Sync Status)
    Route::get('/orders', function () {
        $orders = Order::where('user_id', Auth::id())
            ->orWhereHas('product', function ($q) {
                $q->where('user_id', Auth::id());
            })
            ->with(['product', 'user', 'product.user'])
            ->latest()
            ->get();

        // Cek & Sync setiap order yang masih pending dengan Midtrans API
        foreach ($orders as $order) {
            if ($order->payment_status === 'pending') {
                OrderController::syncOrderStatus($order);
            }
        }

        return view('orders.index', compact('orders'));
    })->name('orders.index');

    Route::get('/orders/{id?}', function ($id = null) {
        $order = $id
            ? Order::with(['product', 'user', 'product.user'])->find($id)
            : Order::with(['product', 'user', 'product.user'])->where('user_id', Auth::id())->latest()->first();

        if ($order && $order->payment_status === 'pending') {
            OrderController::syncOrderStatus($order);
        }

        return view('orders.show', compact('order'));
    })->name('orders.show');

    // Route untuk menyimpan order & panggil Midtrans Snap Token
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

    // Seller: Tambah Produk
    Route::get('/seller/products/create', [ProductController::class, 'create'])->name('seller.products.create');
    Route::post('/seller/products', [ProductController::class, 'store'])->name('seller.products.store');

    // Seller: Edit, Update, dan Hapus Produk
    Route::get('/seller/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/seller/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/seller/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    // Profile: Edit & Update Data Mahasiswa, Lokasi COD, serta Upload Avatar
    Route::get('/profile', function () {
        return view('profile.edit');
    })->name('profile.edit');

    Route::post('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
});

// 8. Admin Dashboard & Moderasi (Dilindungi Middleware Auth & Admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // Aksi Moderasi Produk
    Route::post('/products/{id}/approve', [AdminController::class, 'approveProduct'])->name('products.approve');
    Route::delete('/products/{id}/reject', [AdminController::class, 'rejectProduct'])->name('products.reject');

    // Aksi Verifikasi KTM
    Route::post('/users/{id}/verify-ktm', [AdminController::class, 'verifyKtm'])->name('users.verifyKtm');
    Route::delete('/users/{id}/reject-ktm', [AdminController::class, 'rejectKtm'])->name('users.rejectKtm');
});

// 9. Informasi: Tentang Kami & Kontak
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');