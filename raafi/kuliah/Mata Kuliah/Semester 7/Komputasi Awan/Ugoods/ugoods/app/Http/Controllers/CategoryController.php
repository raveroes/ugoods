<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Daftar Kategori Terstandarisasi Kampus
    public static $categoryList = [
        'elektronik' => [
            'id' => 1,
            'name' => 'Elektronik & Multimedia',
            'desc' => 'Laptop, Tablet, Audio, Kamera & Aksesoris',
            'icon' => 'devices',
        ],
        'buku-modul' => [
            'id' => 2,
            'name' => 'Buku & Modul Kuliah',
            'desc' => 'Diktat, DKV, Penerbitan, Jurnal & Buku Teori',
            'icon' => 'menu_book',
        ],
        'fashion-thrift' => [
            'id' => 3,
            'name' => 'Fashion Thrift',
            'desc' => 'Jaket, Hoodie, Sepatu, Kemeja & Totebag',
            'icon' => 'apparel',
        ],
        'alat-gambar' => [
            'id' => 4,
            'name' => 'Alat Gambar & Praktek Lab',
            'desc' => 'Pen Tablet, Kuas, Drawing Pad, Tracing Lightbox',
            'icon' => 'draw',
        ],
        'kebutuhan-kos' => [
            'id' => 5,
            'name' => 'Kebutuhan Kamar Kos',
            'desc' => 'Kipas, Meja Lipat, Rak Buku, Lampu Meja',
            'icon' => 'bed',
        ],
        'lainnya' => [
            'id' => 6,
            'name' => 'Lain-lain',
            'desc' => 'Helm, Aksesoris Unik, Alat Lab & Hobi Mahasiswa',
            'icon' => 'grid_view',
        ],
    ];

    // Daftar Titik COD Kampus Populer
    public static $campusLocations = [
        'Lobi Utama Gedung 3 Polimedia Kreatif',
        'Kantin Kreatif Srengseng Sawah',
        'Gedung Kuliah Terpadu (GKT) Lt. 1',
        'Perpustakaan Pusat & Reading Lounge',
        'Depan Gerbang Utama Kampus Srengseng',
    ];

    /**
     * Menampilkan katalog seluruh produk dengan filter komprehensif.
     */
    public function index(Request $request)
    {
        // Hanya tampilkan barang yang belum terjual (status NULL atau 'available')
        $query = Product::with('user')->where(function ($q) {
            $q->whereNull('status')->orWhere('status', 'available');
        });

        // 1. Filter Kategori (Bisa berupa slug atau ID)
        $selectedCategory = $request->query('category');
        $activeCategoryData = null;

        if ($selectedCategory) {
            if (isset(self::$categoryList[$selectedCategory])) {
                $catId = self::$categoryList[$selectedCategory]['id'];
                $query->where('category_id', $catId);
                $activeCategoryData = self::$categoryList[$selectedCategory];
            } elseif (is_numeric($selectedCategory)) {
                $query->where('category_id', $selectedCategory);
                foreach (self::$categoryList as $slug => $data) {
                    if ($data['id'] == $selectedCategory) {
                        $activeCategoryData = $data;
                        break;
                    }
                }
            }
        }

        // 2. Filter Lokasi COD Kampus
        if ($request->filled('location')) {
            $query->where('cod_location', 'like', '%' . $request->query('location') . '%');
        }

        // 3. Filter Rentang Harga
        if ($request->filled('min_price')) {
            $minPrice = (int) preg_replace('/[^0-9]/', '', (string) $request->query('min_price'));
            if ($minPrice > 0) {
                $query->where('price', '>=', $minPrice);
            }
        }

        if ($request->filled('max_price')) {
            $maxPrice = (int) preg_replace('/[^0-9]/', '', (string) $request->query('max_price'));
            if ($maxPrice > 0) {
                $query->where('price', '<=', $maxPrice);
            }
        }

        // 4. Pencarian Kata Kunci (Judul & Deskripsi)
        if ($request->filled('search')) {
            $search = $request->query('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // 5. Urutan (Sort)
        $sort = $request->query('sort', 'latest');
        switch ($sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'oldest':
                $query->oldest();
                break;
            case 'latest':
            default:
                $query->latest();
                break;
        }

        // 6. Pagination 12 item per halaman
        $products = $query->paginate(12)->withQueryString();

        $categories = self::$categoryList;
        $campusLocations = self::$campusLocations;

        return view('categories.index', compact(
            'products',
            'categories',
            'campusLocations',
            'selectedCategory',
            'activeCategoryData',
            'sort'
        ));
    }

    /**
     * Rute cepat melihat kategori tertentu via slug URL.
     */
    public function show($slug)
    {
        return redirect()->route('categories.index', ['category' => $slug]);
    }
}