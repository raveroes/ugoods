<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'fahridwi@gmail.com'],
            [
                'name' => 'Fahri Dwi Kurniawan',
                'password' => Hash::make('password123'),
                'whatsapp_number' => '0812-3456-7890',
                'ktm_status' => 'verified',
                'role' => 'user',
                'campus_cod_location' => 'Lobi Utama Gedung 3 Polimedia Kreatif',
                'kos_address' => 'Kos Puri Srengseng Raya No. 12',
            ]
        );

        $sampleProducts = [
            [
                'user_id' => $user->id,
                'category_id' => 1,
                'title' => 'Kamera Mirrorless Sony A6100 Kit 16-50mm',
                'slug' => 'kamera-mirrorless-sony-a6100-kit-16-50mm',
                'description' => 'Alasan jual: ganti gear untuk tugas akhir animasi semester depan. Sensor bersih tanpa jamur, shutter count baru 4.100x. Kelengkapan unit kamera A6100, lensa kit 16-50mm OSS, strap original Sony, baterai original, box lengkap.',
                'condition_rating' => '9/10 • Like New',
                'price' => 4224000,
                'stock' => 1,
                'status' => 'available',
                'cod_location' => 'Lobi Utama Gedung 3 Polimedia Kreatif',
                'image_path' => null,
            ],
            [
                'user_id' => $user->id,
                'category_id' => 1,
                'title' => 'Backpack Kuliah Minimalis Laptop 15 Inch',
                'slug' => 'backpack-kuliah-minimalis-laptop-15-inch',
                'description' => 'Tas punggung warna dark grey elegan dengan kompartemen laptop busa tebal anti-benturan. Baru dipakai 1 semester, jahitan rapi, resleting lancar jaya.',
                'condition_rating' => '9/10 • Mulus',
                'price' => 184000,
                'stock' => 1,
                'status' => 'available',
                'cod_location' => 'Gedung Kuliah Terpadu (GKT) Lt. 1',
                'image_path' => null,
            ],
            [
                'user_id' => $user->id,
                'category_id' => 2,
                'title' => 'Buku Modul Desain Grafis & Tipografi 2024',
                'slug' => 'buku-modul-desain-grafis-tipografi-2024',
                'description' => 'Buku pegangan kuliah semester 1 & 2 prodi Desain Grafis Polimedia. Halaman bersih, tidak ada coretan pulpen/stabilo, masih seperti baru.',
                'condition_rating' => '9.5/10 • Sangat Mulus',
                'price' => 119000,
                'stock' => 1,
                'status' => 'available',
                'cod_location' => 'Perpustakaan Pusat Polimedia',
                'image_path' => null,
            ],
            [
                'user_id' => $user->id,
                'category_id' => 1,
                'title' => 'Laptop Gaming Acer Nitro 5 Ryzen 5 RTX',
                'slug' => 'laptop-gaming-acer-nitro-5-ryzen-5-rtx',
                'description' => 'Laptop multimedia & gaming spec kencang untuk rendering Premiere/After Effects dan 3D Blender. Kelengkapan charger original dan tas backpack Acer.',
                'condition_rating' => '8.5/10 • Terawat',
                'price' => 7790000,
                'stock' => 1,
                'status' => 'available',
                'cod_location' => 'Kantin Kreatif Srengseng Sawah',
                'image_path' => null,
            ],
        ];

        foreach ($sampleProducts as $prod) {
            Product::firstOrCreate(['slug' => $prod['slug']], $prod);
        }
    }
}
