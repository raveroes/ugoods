@extends('layouts.app')

@section('title', 'Tambah Barang Preloved - ugoods')

@section('content')
  <div class="flex flex-col w-full">
    <!-- Sub-header & Navigation Context -->
    <div class="w-full bg-surface-container-lowest py-space-md">
      <div
        class="max-w-[1280px] mx-auto px-margin md:px-margin-desktop flex flex-col md:flex-row md:items-center justify-between gap-space-sm">
        <!-- Breadcrumb -->
        <nav aria-label="Breadcrumb"
          class="flex items-center gap-space-xs font-label-sm text-label-sm text-on-surface-variant flex-wrap">
          <a class="hover:text-primary transition-colors" href="{{ url('/') }}">Beranda</a>
          <span class="text-outline">/</span>
          <a class="hover:text-primary transition-colors" href="{{ url('/seller/products/create') }}">Dashboard
            Penjual</a>
          <span class="text-outline">/</span>
          <span class="text-on-surface font-semibold">Tambah Barang Preloved</span>
        </nav>
        <!-- Verified Student Badge Pill (Dinamis Auth) -->
        <div
          class="inline-flex items-center gap-space-xs px-3 py-1.5 rounded-full bg-[#E0F2FE] border border-[#BAE6FD] text-[#0369A1] font-label-sm text-label-sm w-fit font-bold shadow-xs">
          <span class="material-symbols-outlined text-[16px] text-[#0284C7]">school</span>
          <span>Penjual Terverifikasi KTM • {{ Auth::user()->name ?? 'Mahasiswa' }}</span>
          <span class="material-symbols-outlined text-[16px] text-[#059669] ml-0.5">verified</span>
        </div>
      </div>
    </div>

    <!-- Page Introduction Banner Area -->
    <div class="w-full max-w-[1280px] mx-auto px-margin md:px-margin-desktop pt-space-lg pb-space-sm">
      <div class="flex flex-col gap-space-xs">
        <div class="flex items-center gap-space-xs">
          <span
            class="px-2.5 py-1 rounded-md bg-[#F5F3FF] border border-[#D6C7FF] text-[#5B47E0] font-label-sm text-label-sm uppercase tracking-wider font-bold">Listing
            Baru</span>
          <span class="text-[#7E70A6] font-label-sm text-label-sm">• Katalog Re-Commerce Kampus</span>
        </div>
        <h1 class="font-headline-lg text-headline-lg text-[#1A0D3F] font-bold tracking-tight">Jual Barang Bekasmu</h1>
        <p class="font-body-md text-body-md text-[#4A3B75] max-w-3xl">
          Isi detail barang preloved milikmu untuk ditinjau dan langsung ditayangkan di katalog ugoods sesama mahasiswa
          &amp; mitra se-Jabodetabek.
        </p>
      </div>
      <!-- Escrow & Single Unit Tip Banner -->
      <div
        class="mt-space-md p-space-md rounded-2xl bg-white border border-[#E9E3FB] shadow-sm shadow-purple-100/50 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-space-sm">
        <div class="flex items-start sm:items-center gap-space-sm">
          <div
            class="w-9 h-9 rounded-xl bg-[#D1FAE5] border border-[#A7F3D0] text-[#065F46] flex items-center justify-center shrink-0">
            <span class="material-symbols-outlined text-[20px] text-[#059669]">bolt</span>
          </div>
          <p class="font-body-sm text-body-sm text-[#4A3B75] leading-snug">
            <strong class="text-[#1A0D3F] font-bold">Stok Unit Tunggal (1 Unit):</strong> Barang preloved personal
            mahasiswa otomatis berstatus habis saat pembayaran via <span class="text-[#0284C7] font-semibold">Midtrans
              Gateway</span> &amp; COD terkonfirmasi.
          </p>
        </div>
        <div class="shrink-0 flex items-center gap-space-xs text-[#065F46] font-label-sm text-label-sm font-bold bg-[#D1FAE5] border border-[#A7F3D0] px-2.5 py-1 rounded-lg">
          <span class="material-symbols-outlined text-[16px] text-[#059669]">format_image_left</span>
          <span>Rekber Aman ugoods</span>
        </div>
      </div>
    </div>

    <!-- Main 2-Column Form Layout -->
    <div class="w-full max-w-[1280px] mx-auto px-margin md:px-margin-desktop py-space-md pb-space-2xl">
      <form action="{{ route('seller.products.store') }}" method="POST" enctype="multipart/form-data"
        class="grid grid-cols-1 lg:grid-cols-12 gap-gutter-desktop items-start" id="prelovedForm">
        @csrf

        @if (isset($errors) && $errors->any())
          <div
            class="lg:col-span-12 p-4 rounded-xl bg-[#FFE4E6] border border-[#FECDD3] text-[#9F1239] text-xs flex items-start gap-2.5 shadow-sm shadow-rose-900/[0.04]">
            <span class="material-symbols-outlined text-[18px] text-[#E11D48] shrink-0 mt-0.5">error</span>
            <div>
              <span class="font-bold block text-[#9F1239]">Harap periksa isian formulir berikut:</span>
              <ul class="list-disc list-inside space-y-0.5 text-[#9F1239] mt-1 font-medium">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          </div>
        @endif

        <!-- LEFT COLUMN (Upload, Condition, Location) -->
        <div class="lg:col-span-5 flex flex-col gap-space-lg">
          <!-- CARD 1: FOTO BARANG (Dropzone & Thumbnails) -->
          <div class="p-space-lg rounded-2xl bg-white border border-[#E9E3FB] shadow-md shadow-purple-100/50 flex flex-col gap-space-md">
            <div class="flex items-center justify-between">
              <div>
                <h2 class="font-headline-sm text-headline-sm text-[#1A0D3F] font-bold">Foto Barang</h2>
                <p class="font-body-sm text-body-sm text-[#4A3B75]">Maksimal resolusi jernih.</p>
              </div>
              <span
                class="px-2.5 py-1 rounded bg-[#F5F3FF] border border-[#D6C7FF] text-[#5B47E0] font-label-sm text-label-sm font-semibold">Foto
                Produk</span>
            </div>
            <!-- Drag and Drop Active Box -->
            <div
              class="relative w-full p-space-lg rounded-xl bg-[#FAF8FF] border-2 border-dashed border-[#D6C7FF] hover:border-[#5B47E0] flex flex-col items-center justify-center text-center cursor-pointer hover:bg-white transition-all group">
              <input accept="image/*" aria-label="Unggah foto barang preloved" name="image" id="productImageInput"
                onchange="previewProductImage(this)" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                type="file" required>
              <div
                class="w-12 h-12 rounded-full bg-[#F5F3FF] border border-[#E9E3FB] text-[#5B47E0] flex items-center justify-center mb-space-xs group-hover:scale-110 transition-transform shadow-xs">
                <span class="material-symbols-outlined text-[26px]">add_a_photo</span>
              </div>
              <p class="font-label-md text-label-md text-[#1A0D3F] font-bold">Tarik &amp; lepas foto di sini</p>
              <p class="font-body-sm text-body-sm text-[#4A3B75] mt-space-2xs">atau <span
                  class="text-[#5B47E0] font-semibold underline">klik untuk jelajahi file</span></p>
              <span class="font-label-sm text-label-sm text-[#7E70A6] mt-space-xs">Format JPG, PNG, WEBP • Maks. 5MB per
                berkas</span>
            </div>
            <!-- Photo Slots Grid -->
            <div class="grid grid-cols-4 gap-space-sm">
              <!-- Slot 1: Uploaded (Main) -->
              <div class="relative aspect-square rounded-xl bg-[#F6F3FE] border border-[#E9E3FB] overflow-hidden group">
                <div id="previewPlaceholder"
                  class="w-full h-full flex flex-col items-center justify-center bg-[#F6F3FE] text-[#7E70A6] p-2 text-center">
                  <span class="material-symbols-outlined text-2xl text-[#5B47E0]">add_photo_alternate</span>
                  <span class="font-label-sm text-[9px] mt-0.5 text-[#7E70A6] font-medium">Pilih Foto</span>
                </div>
                <img id="mainPreviewImg" class="hidden w-full h-full object-cover" alt="Preview foto barang preloved">
                <div id="badgeUtama"
                  class="hidden absolute top-1 left-1 bg-[#D1FAE5] text-[#065F46] border border-[#A7F3D0] px-1.5 py-0.5 rounded font-label-sm text-[10px] uppercase font-bold tracking-tight">
                  Utama
                </div>
                <button id="btnDeletePreview" aria-label="Hapus Foto Utama"
                  class="hidden absolute top-1 right-1 w-6 h-6 rounded-full bg-white/90 text-rose-600 hover:bg-rose-50 border border-rose-200 flex items-center justify-center transition-colors shadow-xs"
                  type="button" onclick="clearPreviewImage();">
                  <span class="material-symbols-outlined text-[14px]">delete</span>
                </button>
              </div>
              <!-- Slot 2: Empty Add -->
              <div
                class="aspect-square rounded-xl bg-[#FAF8FF] border border-[#E9E3FB] flex flex-col items-center justify-center text-[#7E70A6] hover:text-[#5B47E0] hover:border-[#D6C7FF] hover:bg-white cursor-pointer transition-all p-space-xs text-center shadow-xs"
                onclick="document.getElementById('productImageInput').click();">
                <span class="material-symbols-outlined text-[20px]">add</span>
                <span class="font-label-sm text-[10px] mt-0.5 text-[#4A3B75] font-medium">Samping</span>
              </div>
              <!-- Slot 3: Empty Add -->
              <div
                class="aspect-square rounded-xl bg-[#FAF8FF] border border-[#E9E3FB] flex flex-col items-center justify-center text-[#7E70A6] hover:text-[#5B47E0] hover:border-[#D6C7FF] hover:bg-white cursor-pointer transition-all p-space-xs text-center shadow-xs"
                onclick="document.getElementById('productImageInput').click();">
                <span class="material-symbols-outlined text-[20px]">add</span>
                <span class="font-label-sm text-[10px] mt-0.5 text-[#4A3B75] font-medium">Detail</span>
              </div>
              <!-- Slot 4: Empty Add -->
              <div
                class="aspect-square rounded-xl bg-[#FAF8FF] border border-[#E9E3FB] flex flex-col items-center justify-center text-[#7E70A6] hover:text-[#5B47E0] hover:border-[#D6C7FF] hover:bg-white cursor-pointer transition-all p-space-xs text-center shadow-xs"
                onclick="document.getElementById('productImageInput').click();">
                <span class="material-symbols-outlined text-[20px]">add</span>
                <span class="font-label-sm text-[10px] mt-0.5 text-[#4A3B75] font-medium">Box/Nota</span>
              </div>
            </div>
            <!-- Micro Tip Box -->
            <div class="p-space-sm rounded-lg bg-surface-container flex items-start gap-space-xs">
              <span class="material-symbols-outlined text-secondary text-[18px] shrink-0 mt-0.5">lightbulb</span>
              <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                <strong class="text-on-surface">Tips Fotografi Cepat:</strong> Potret di tempat terang. Tunjukkan minus
                fisik (jika ada) agar pembeli percaya dan transaksi COD cepat deal.
              </p>
            </div>
          </div>

          <!-- CARD 2: KONDISI BARANG (Rating Pilihan) -->
          <div class="p-space-lg rounded-xl bg-surface-container-low flex flex-col gap-space-md">
            <div class="flex items-center justify-between">
              <h2 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Kondisi Fisik Barang</h2>
              <span class="font-label-sm text-label-sm text-secondary flex items-center gap-1">
                <span class="material-symbols-outlined text-[14px]">verified</span>
                Standar ugoods
              </span>
            </div>
            <div class="flex flex-col gap-space-sm">
              <!-- Condition Option 10/10 -->
              <label
                class="flex items-center justify-between p-space-sm rounded-xl bg-surface-container hover:bg-surface-container-high cursor-pointer transition-colors">
                <div class="flex items-center gap-space-sm">
                  <input class="w-4 h-4 text-primary-container bg-surface-container-lowest focus:ring-0 cursor-pointer"
                    name="condition_rating" type="radio" value="10/10 • BNIB Segel">
                  <div class="flex flex-col">
                    <span class="font-label-md text-label-md text-on-surface font-semibold">10/10 • Baru / Belum
                      Dipakai</span>
                    <span class="font-body-sm text-body-sm text-on-surface-variant">Segel utuh, belum pernah dipakai
                      kuliah sama sekali.</span>
                  </div>
                </div>
                <span
                  class="px-space-xs py-space-2xs rounded bg-surface-container-highest text-outline font-label-sm text-label-sm">BNIB</span>
              </label>
              <!-- Condition Option 9/10 (Selected Default) -->
              <label
                class="flex items-center justify-between p-space-sm rounded-xl bg-primary-container/20 cursor-pointer transition-colors">
                <div class="flex items-center gap-space-sm">
                  <input checked
                    class="w-4 h-4 text-primary-container bg-surface-container-lowest focus:ring-0 cursor-pointer"
                    name="condition_rating" type="radio" value="9/10 • Like New">
                  <div class="flex flex-col">
                    <span
                      class="font-label-md text-label-md text-on-surface font-semibold flex items-center gap-space-xs">
                      9/10 • Like New / Jarang Pakai
                      <span class="w-2 h-2 rounded-full bg-tertiary"></span>
                    </span>
                    <span class="font-body-sm text-body-sm text-on-surface-variant">Fungsi 100%, body mulus, minim lecet
                      mikro wajar.</span>
                  </div>
                </div>
                <span
                  class="px-space-xs py-space-2xs rounded bg-primary-container text-on-primary-container font-label-sm text-label-sm">Pilihan
                  Anda</span>
              </label>
              <!-- Condition Option 8/10 -->
              <label
                class="flex items-center justify-between p-space-sm rounded-xl bg-surface-container hover:bg-surface-container-high cursor-pointer transition-colors">
                <div class="flex items-center gap-space-sm">
                  <input class="w-4 h-4 text-primary-container bg-surface-container-lowest focus:ring-0 cursor-pointer"
                    name="condition_rating" type="radio" value="8/10 • Normal Pakai">
                  <div class="flex flex-col">
                    <span class="font-label-md text-label-md text-on-surface font-semibold">8/10 • Pemakaian Normal
                      Kuliah</span>
                    <span class="font-body-sm text-body-sm text-on-surface-variant">Semua fitur normal, ada tanda bekas
                      pakai harian.</span>
                  </div>
                </div>
                <span
                  class="px-space-xs py-space-2xs rounded bg-surface-container-highest text-outline font-label-sm text-label-sm">Good</span>
              </label>
              <!-- Condition Option 7/10 -->
              <label
                class="flex items-center justify-between p-space-sm rounded-xl bg-surface-container hover:bg-surface-container-high cursor-pointer transition-colors">
                <div class="flex items-center gap-space-sm">
                  <input class="w-4 h-4 text-primary-container bg-surface-container-lowest focus:ring-0 cursor-pointer"
                    name="condition_rating" type="radio" value="7/10 • Minus Ringan">
                  <div class="flex flex-col">
                    <span class="font-label-md text-label-md text-on-surface font-semibold">7/10 • Ada Minus Kosmetik
                      Ringan</span>
                    <span class="font-body-sm text-body-sm text-on-surface-variant">Fungsi normal, terdapat lecet/dent
                      yang dijelaskan detail.</span>
                  </div>
                </div>
                <span
                  class="px-space-xs py-space-2xs rounded bg-surface-container-highest text-outline font-label-sm text-label-sm">Fair</span>
              </label>
            </div>
          </div>

          <!-- CARD 3: TITIK TEMU COD & JANGKAUAN -->
          <div class="p-space-lg rounded-xl bg-surface-container-low flex flex-col gap-space-md">
            <div class="flex items-center justify-between">
              <h2 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Titik Temu COD &amp; Pengiriman
              </h2>
              <span class="material-symbols-outlined text-secondary text-[20px]">pin_drop</span>
            </div>
            <!-- Dropdown Kampus COD -->
            <div class="flex flex-col gap-space-2xs">
              <label class="font-label-md text-label-md text-on-surface font-medium" for="campusSpot">Titik COD Utama
                Kampus</label>
              <div class="relative">
                <select name="cod_location"
                  class="w-full bg-surface-container-lowest rounded-xl px-space-md py-space-sm font-body-md text-body-md text-on-surface appearance-none focus:outline-none focus:bg-surface-container cursor-pointer pr-10"
                  id="campusSpot">
                  <option value="Lobi Utama Gedung 3 Polimedia Kreatif" {{ (Auth::user()->campus_cod_location == 'Lobi Utama Gedung 3 Polimedia Kreatif' || !Auth::user()->campus_cod_location) ? 'selected' : '' }}>Lobi Utama
                    Gedung 3 Polimedia Kreatif</option>
                  <option value="Kantin Terpadu Kampus Srengseng Sawah" {{ Auth::user()->campus_cod_location == 'Kantin Terpadu Kampus Srengseng Sawah' ? 'selected' : '' }}>Kantin Terpadu Kampus Srengseng Sawah</option>
                  <option value="Selasar Gedung Kuliah Terpadu (GKT Lt. 1)" {{ Auth::user()->campus_cod_location == 'Selasar Gedung Kuliah Terpadu (GKT Lt. 1)' ? 'selected' : '' }}>Selasar Gedung Kuliah Terpadu (GKT Lt. 1)
                  </option>
                  <option value="Gazebo Perpustakaan & Reading Lounge" {{ Auth::user()->campus_cod_location == 'Gazebo Perpustakaan & Reading Lounge' ? 'selected' : '' }}>Gazebo Perpustakaan &amp; Reading Lounge</option>
                  <option value="Depan Gerbang Utama Kampus Srengseng" {{ Auth::user()->campus_cod_location == 'Depan Gerbang Utama Kampus Srengseng' ? 'selected' : '' }}>Depan Gerbang Utama Kampus Srengseng</option>
                </select>
                <span
                  class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-outline pointer-events-none text-[20px]">expand_more</span>
              </div>
            </div>
            <!-- Checkbox Options for Fulfillment -->
            <div class="flex flex-col gap-space-sm pt-space-xs">
              <label class="flex items-start gap-space-sm p-space-sm rounded-lg bg-surface-container cursor-pointer">
                <input checked
                  class="mt-1 w-4 h-4 rounded text-primary-container bg-surface-container-lowest focus:ring-0 cursor-pointer"
                  type="checkbox">
                <div class="flex flex-col">
                  <span class="font-label-md text-label-md text-on-surface font-semibold flex items-center gap-space-xs">
                    COD Langsung Kampus
                    <span class="text-tertiary font-bold text-label-sm">(Bebas Ongkir / Rp 0)</span>
                  </span>
                  <span class="font-body-sm text-body-sm text-on-surface-variant">Serah terima barang &amp; cek fisik
                    langsung saat jam perkuliahan.</span>
                </div>
              </label>
              <label class="flex items-start gap-space-sm p-space-sm rounded-lg bg-surface-container cursor-pointer">
                <input checked
                  class="mt-1 w-4 h-4 rounded text-primary-container bg-surface-container-lowest focus:ring-0 cursor-pointer"
                  type="checkbox">
                <div class="flex flex-col">
                  <span class="font-label-md text-label-md text-on-surface font-semibold flex items-center gap-space-xs">
                    Antar Langsung ke Kos Mahasiswa
                    <span class="text-secondary font-bold text-label-sm">(+Rp 5.000)</span>
                  </span>
                  <span class="font-body-sm text-body-sm text-on-surface-variant">Khusus area sekitar radius maksimal 3 KM
                    dari batas gerbang kampus.</span>
                </div>
              </label>
            </div>
          </div>
        </div>

        <!-- RIGHT COLUMN (Item details, Category, Pricing, Description, Seller) -->
        <div class="lg:col-span-7 flex flex-col gap-space-lg">
          <!-- CARD 1: INFORMASI DETAIL PRODUK & KATEGORI -->
          <div class="p-space-lg rounded-xl bg-surface-container-low flex flex-col gap-space-md">
            <div class="flex items-center justify-between">
              <h2 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Informasi Produk</h2>
              <span
                class="px-space-xs py-space-2xs rounded bg-secondary-container/20 text-secondary font-label-sm text-label-sm">Langkah
                1/2</span>
            </div>
            <!-- Product Title Input -->
            <div class="flex flex-col gap-space-2xs">
              <label class="font-label-md text-label-md text-on-surface font-medium flex items-center justify-between"
                for="productName">
                <span>Nama Barang Preloved <span class="text-error">*</span></span>
                <span class="font-body-sm text-body-sm text-outline">Gunakan merek, tipe &amp; spek</span>
              </label>
              <input name="title" value="{{ old('title') }}"
                class="w-full bg-surface-container-lowest rounded-xl px-space-md py-space-sm font-body-md text-body-md text-on-surface placeholder:text-outline focus:outline-none focus:bg-surface-container transition-colors"
                id="productName" placeholder="Contoh: iPad Air 4 64GB WiFi Only Space Gray" required type="text">
            </div>
            <!-- Category and Subcategory Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
              <div class="flex flex-col gap-space-2xs">
                <label class="font-label-md text-label-md text-on-surface font-medium" for="category">Kategori Utama <span
                    class="text-error">*</span></label>
                <div class="relative">
                  <select name="category_id"
                    class="w-full bg-surface-container-lowest rounded-xl px-space-md py-space-sm font-body-md text-body-md text-on-surface appearance-none focus:outline-none focus:bg-surface-container cursor-pointer pr-10"
                    id="category">
                    <option value="1" {{ old('category_id') == 1 ? 'selected' : '' }}>Elektronik &amp; Multimedia</option>
                    <option value="2" {{ old('category_id') == 2 ? 'selected' : '' }}>Buku &amp; Modul Kuliah</option>
                    <option value="3" {{ old('category_id') == 3 ? 'selected' : '' }}>Alat Gambar &amp; Praktek Lab</option>
                    <option value="4" {{ old('category_id') == 4 ? 'selected' : '' }}>Fashion &amp; Jaket Angkatan</option>
                    <option value="5" {{ old('category_id') == 5 ? 'selected' : '' }}>Kebutuhan Kamar Kos</option>
                    <option value="6" {{ old('category_id') == 6 ? 'selected' : '' }}>Lain-lain</option>
                  </select>
                  <span
                    class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-outline pointer-events-none text-[20px]">expand_more</span>
                </div>
              </div>
              <div class="flex flex-col gap-space-2xs">
                <label class="font-label-md text-label-md text-on-surface font-medium" for="subcat">Merek /
                  Sub-kategori</label>
                <input
                  class="w-full bg-surface-container-lowest rounded-xl px-space-md py-space-sm font-body-md text-body-md text-on-surface placeholder:text-outline focus:outline-none focus:bg-surface-container transition-colors"
                  id="subcat" placeholder="Contoh: Apple / Sony / Logitech" type="text" value="{{ old('brand') }}">
              </div>
            </div>
            <!-- PRICING SECTION -->
            <div class="mt-space-xs p-space-md rounded-xl bg-surface-container flex flex-col gap-space-md">
              <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-xs">
                <span class="font-label-md text-label-md text-on-surface font-semibold flex items-center gap-space-xs">
                  <span class="material-symbols-outlined text-tertiary text-[18px]">payments</span>
                  Penetapan Harga Ramah Mahasiswa
                </span>
                <span
                  class="font-label-sm text-label-sm text-tertiary bg-tertiary-container/20 px-space-xs py-space-2xs rounded">0%
                  Fee Transaksi Kampus</span>
              </div>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
                <!-- Listing Price -->
                <div class="flex flex-col gap-space-2xs">
                  <label class="font-label-md text-label-md text-on-surface font-medium" for="sellingPrice">Harga Jual
                    ugoods (IDR) <span class="text-error">*</span></label>
                  <div class="relative flex items-center">
                    <span class="absolute left-3.5 font-price-display text-price-display text-primary font-bold">Rp</span>
                    <input name="price" value="{{ old('price') }}"
                      class="w-full bg-surface-container-lowest rounded-xl pl-12 pr-space-md py-space-sm font-price-display text-price-display text-on-surface focus:outline-none focus:bg-surface-container-high transition-colors font-bold"
                      id="sellingPrice" placeholder="150000" required type="text">
                  </div>
                </div>
                <!-- Original Purchased Price (Reference) -->
                <div class="flex flex-col gap-space-2xs">
                  <label class="font-label-md text-label-md text-on-surface-variant font-medium" for="originalPrice">Harga
                    Beli Baru (Opsional)</label>
                  <div class="relative flex items-center">
                    <span class="absolute left-3.5 font-body-md text-body-md text-outline">Rp</span>
                    <input
                      class="w-full bg-surface-container-lowest rounded-xl pl-10 pr-space-md py-space-sm font-body-md text-body-md text-on-surface-variant focus:outline-none focus:bg-surface-container transition-colors"
                      id="originalPrice" type="text" placeholder="300000">
                  </div>
                </div>
              </div>
              <!-- Single Stock Info Pill -->
              <div
                class="p-space-xs px-space-sm rounded-lg bg-primary-container/20 flex items-center gap-space-xs text-primary font-body-sm text-body-sm">
                <span class="material-symbols-outlined text-[16px]">info</span>
                <span>Listing ini otomatis dikunci pada kuantitas <strong>1 unit preloved personal</strong>.</span>
              </div>
            </div>
          </div>

          <!-- CARD 2: DESKRIPSI & KELENGKAPAN -->
          <div class="p-space-lg rounded-xl bg-surface-container-low flex flex-col gap-space-md">
            <div class="flex items-center justify-between">
              <h2 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Deskripsi &amp; Kelengkapan Unit
              </h2>
              <span class="font-label-sm text-label-sm text-outline">Min. 20 Karakter</span>
            </div>
            <!-- Description Textarea -->
            <div class="flex flex-col gap-space-2xs">
              <label class="font-label-md text-label-md text-on-surface font-medium" for="itemDesc">Jelaskan Kondisi,
                Riwayat &amp; Alasan Jual</label>
              <textarea name="description"
                class="w-full bg-surface-container-lowest rounded-xl p-space-md font-body-md text-body-md text-on-surface placeholder:text-outline focus:outline-none focus:bg-surface-container transition-colors leading-relaxed"
                id="itemDesc" rows="5"
                placeholder="Tuliskan alasan jual, kondisi fisik barang, serta kelengkapan seperti box, charger, atau kelengkapan nota..."
                required>{{ old('description') }}</textarea>
            </div>
          </div>

          <!-- CARD 3: PROFIL PENJUAL (Dinamis Auth User) -->
          <div class="p-space-lg rounded-xl bg-surface-container-low flex flex-col gap-space-md">
            <div class="flex items-center justify-between">
              <h2 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Identitas Penjual Terdaftar</h2>
              <span class="material-symbols-outlined text-tertiary text-[20px]">badge</span>
            </div>
            <div
              class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-space-md p-space-md rounded-xl bg-surface-container">
              <div class="flex items-center gap-space-md">
                <!-- Avatar Inisial Dinamis -->
                <!-- Avatar Penjual Aktif -->
                <div
                  class="w-12 h-12 rounded-full overflow-hidden bg-[#5B47E0] text-white font-bold text-base flex items-center justify-center shrink-0 border-2 border-indigo-400/30">
                  @if(Auth::user()->avatar)
                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="w-full h-full object-cover"
                      alt="{{ Auth::user()->name }}">
                  @else
                    {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 2)) }}
                  @endif
                </div>
                <div class="flex flex-col">
                  <div class="flex items-center gap-space-xs">
                    <span
                      class="font-headline-sm text-headline-sm text-on-surface font-semibold">{{ Auth::user()->name }}</span>
                    <span class="material-symbols-outlined text-secondary text-[16px]"
                      title="Terverifikasi">verified</span>
                  </div>
                  <p class="font-body-sm text-body-sm text-on-surface-variant">📧 {{ Auth::user()->email }} • 💬
                    {{ Auth::user()->whatsapp_number ?? 'Belum ada No. WA' }}
                  </p>
                  <div class="flex items-center gap-space-xs mt-0.5 font-label-sm text-label-sm text-secondary">
                    <span class="material-symbols-outlined text-[14px]">location_on</span>
                    <span>Titik COD Utama: {{ Auth::user()->campus_cod_location ?? 'Polimedia Kreatif' }}</span>
                  </div>
                </div>
              </div>
              <div class="shrink-0 flex sm:flex-col items-end gap-1">
                <span
                  class="px-space-xs py-space-2xs rounded bg-tertiary-container/30 text-tertiary font-label-sm text-label-sm font-semibold">KTM
                  Terverifikasi</span>
                <span class="font-label-sm text-label-sm text-outline">Akun Mahasiswa Aktif</span>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>

    <!-- FIXED BOTTOM FORM ACTION BAR -->
    <div
      class="sticky bottom-0 left-0 right-0 z-40 bg-surface-container-lowest/95 backdrop-blur-xl py-space-sm px-margin md:px-margin-desktop shadow-2xl">
      <div class="max-w-[1280px] mx-auto flex flex-col sm:flex-row items-center justify-between gap-space-sm">
        <!-- Auto-save Status Indicator -->
        <div class="flex items-center gap-space-xs text-on-surface-variant font-label-sm text-label-sm">
          <span class="material-symbols-outlined text-tertiary text-[18px]">cloud_done</span>
          <span>Sistem siap menayangkan iklan jualanmu.</span>
        </div>
        <!-- Action Buttons -->
        <div class="flex items-center gap-space-sm w-full sm:w-auto justify-end">
          <a href="{{ route('home') }}"
            class="px-space-md py-space-xs rounded-xl bg-transparent hover:bg-surface-container text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors">
            Batal
          </a>
          <button
            class="px-space-lg py-space-xs rounded-xl bg-primary-container text-on-primary-container hover:brightness-110 font-label-md text-label-md font-bold shadow-lg transition-all flex items-center gap-space-xs"
            form="prelovedForm" type="submit">
            <span class="material-symbols-outlined text-[18px]">rocket_launch</span>
            <span>Tayangkan Barang</span>
          </button>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    function previewProductImage(input) {
      if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
          const img = document.getElementById('mainPreviewImg');
          const placeholder = document.getElementById('previewPlaceholder');
          const badge = document.getElementById('badgeUtama');
          const btn = document.getElementById('btnDeletePreview');
          if (img) {
            img.src = e.target.result;
            img.classList.remove('hidden');
          }
          if (placeholder) placeholder.classList.add('hidden');
          if (badge) badge.classList.remove('hidden');
          if (btn) btn.classList.remove('hidden');
        };
        reader.readAsDataURL(input.files[0]);
      }
    }

    function clearPreviewImage() {
      const input = document.getElementById('productImageInput');
      const img = document.getElementById('mainPreviewImg');
      const placeholder = document.getElementById('previewPlaceholder');
      const badge = document.getElementById('badgeUtama');
      const btn = document.getElementById('btnDeletePreview');
      if (input) input.value = '';
      if (img) {
        img.src = '';
        img.classList.add('hidden');
      }
      if (placeholder) placeholder.classList.remove('hidden');
      if (badge) badge.classList.add('hidden');
      if (btn) btn.classList.add('hidden');
    }

    document.querySelectorAll('input[name="condition_rating"]').forEach(radio => {
      radio.addEventListener('change', (e) => {
        document.querySelectorAll('input[name="condition_rating"]').forEach(r => {
          const parentLabel = r.closest('label');
          if (r.checked) {
            parentLabel.classList.remove('bg-surface-container');
            parentLabel.classList.add('bg-primary-container/20');
          } else {
            parentLabel.classList.remove('bg-primary-container/20');
            parentLabel.classList.add('bg-surface-container');
          }
        });
      });
    });
  </script>
@endpush