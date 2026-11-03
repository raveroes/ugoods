@extends('layouts.app')

@section('title', 'Edit Barang Preloved - ugoods')

@section('content')
<div class="flex flex-col w-full">
<!-- Sub-header & Navigation Context -->
<div class="w-full bg-surface-container-lowest py-space-md">
<div class="max-w-[1280px] mx-auto px-margin md:px-margin-desktop flex flex-col md:flex-row md:items-center justify-between gap-space-sm">
<!-- Breadcrumb -->
<nav aria-label="Breadcrumb" class="flex items-center gap-space-xs font-label-sm text-label-sm text-on-surface-variant flex-wrap">
<a class="hover:text-primary transition-colors" href="{{ url('/') }}">Beranda</a>
<span class="text-outline">/</span>
<a class="hover:text-primary transition-colors" href="{{ route('profile.edit') }}#lapak-saya">Lapak Saya</a>
<span class="text-outline">/</span>
<span class="text-on-surface font-semibold">Edit Barang</span>
</nav>
<!-- Verified Student Badge Pill -->
<div class="inline-flex items-center gap-space-xs px-space-sm py-space-xs rounded-full bg-secondary-container/15 text-secondary font-label-sm text-label-sm w-fit">
<span class="material-symbols-outlined text-[16px] text-secondary">school</span>
<span class="">Penjual • {{ Auth::user()->name ?? ($product->user->name ?? 'Mahasiswa') }}</span>
<span class="material-symbols-outlined text-[16px] text-tertiary ml-0.5">verified</span>
</div>
</div>
</div>
<!-- Page Introduction Banner Area -->
<div class="w-full max-w-[1280px] mx-auto px-margin md:px-margin-desktop pt-space-lg pb-space-sm">
<div class="flex flex-col gap-space-xs">
<div class="flex items-center gap-space-xs">
<span class="px-space-xs py-space-2xs rounded bg-primary-container text-on-primary-container font-label-sm text-label-sm uppercase tracking-wider">Edit Produk</span>
<span class="text-outline font-label-sm text-label-sm">• ID: UGD-{{ $product->id }}</span>
</div>
<h1 class="font-headline-lg text-headline-lg text-on-surface font-bold tracking-tight">Perbarui Informasi Barang</h1>
<p class="font-body-md text-body-md text-on-surface-variant max-w-3xl">
        Ubah detail informasi, harga, kondisi fisik, atau foto barang preloved milikmu yang sedang tayang di katalog ugoods.
      </p>
</div>
<!-- Escrow & Single Unit Tip Banner -->
<div class="mt-space-md p-space-md rounded-xl bg-surface-container-low flex flex-col sm:flex-row items-start sm:items-center justify-between gap-space-sm">
<div class="flex items-start sm:items-center gap-space-sm">
<div class="w-9 h-9 rounded-lg bg-tertiary-container/30 text-tertiary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[20px]">edit_note</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-snug">
<strong class="text-on-surface font-semibold">Perubahan Langsung Aktif:</strong> Setiap perubahan judul, harga, atau deskripsi akan otomatis diperbarui secara instan pada katalog homepage ugoods.
        </p>
</div>
<div class="shrink-0 flex items-center gap-space-xs text-tertiary font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[16px]">verified</span>
<span class="">Otorisasi Penjual Terverifikasi</span>
</div>
</div>
</div>
<!-- Main 2-Column Form Layout -->
<div class="w-full max-w-[1280px] mx-auto px-margin md:px-margin-desktop py-space-md pb-space-2xl">
<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-12 gap-gutter-desktop items-start" id="prelovedForm">
@csrf
@method('PUT')

@if (isset($errors) && $errors->any())
<div class="lg:col-span-12 p-4 rounded-xl bg-rose-500/10 border border-rose-500/30 text-rose-400 text-xs flex items-start gap-2.5">
  <span class="material-symbols-outlined text-[18px] shrink-0 mt-0.5">error</span>
  <div>
    <span class="font-semibold block text-rose-300">Harap periksa isian formulir berikut:</span>
    <ul class="list-disc list-inside space-y-0.5 text-slate-300 mt-1">
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
<div class="p-space-lg rounded-xl bg-surface-container-low flex flex-col gap-space-md">
<div class="flex items-center justify-between">
<div>
<h2 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Foto Barang</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Unggah foto baru jika ingin mengganti.</p>
</div>
<span class="px-space-xs py-space-2xs rounded bg-surface-container-highest text-on-surface-variant font-label-sm text-label-sm">Foto Produk</span>
</div>
<!-- Drag and Drop Active Box -->
<div class="relative w-full p-space-lg rounded-xl bg-surface-container-lowest flex flex-col items-center justify-center text-center cursor-pointer hover:bg-surface-container transition-all group">
<input accept="image/*" aria-label="Unggah foto barang preloved baru" name="image" id="productImageInput" onchange="previewProductImage(this)" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" type="file">
<div class="w-12 h-12 rounded-full bg-primary-container/20 text-primary flex items-center justify-center mb-space-xs group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-[26px]">photo_camera</span>
</div>
<p class="font-label-md text-label-md text-on-surface font-semibold">Klik untuk mengganti foto</p>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-space-2xs">Biarkan kosong jika tidak ingin mengubah foto</p>
<span class="font-label-sm text-label-sm text-outline mt-space-xs">Format JPG, PNG, WEBP • Maks. 5MB</span>
</div>
<!-- Photo Slots Grid -->
<div class="grid grid-cols-4 gap-space-sm">
<!-- Slot 1: Current/Uploaded (Main) -->
<div class="relative aspect-square rounded-lg bg-surface-container-high overflow-hidden group">
  @if ($product->image_path)
    <img id="mainPreviewImg" class="w-full h-full object-cover" data-alt="Preview foto barang preloved" 
         src="{{ \Illuminate\Support\Str::startsWith($product->image_path, 'http') ? $product->image_path : asset('storage/' . $product->image_path) }}"
         onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'w-full h-full flex flex-col items-center justify-center bg-surface-container text-primary p-2 text-center\'><span class=\'font-bold text-sm text-white font-display\'>u<span class=\'text-primary\'>goods</span></span></div>';">
    <div id="badgeStatus" class="absolute top-1 left-1 bg-tertiary-container/90 text-on-tertiary-container px-1.5 py-0.5 rounded font-label-sm text-[10px] uppercase font-bold tracking-tight">
      Aktif
    </div>
  @else
    <div id="previewPlaceholder" class="w-full h-full flex flex-col items-center justify-center bg-surface-container text-slate-400 p-2 text-center">
      <span class="material-symbols-outlined text-2xl text-slate-500">add_photo_alternate</span>
      <span class="font-label-sm text-[9px] mt-0.5 text-slate-400">Belum Ada Foto</span>
    </div>
    <img id="mainPreviewImg" class="hidden w-full h-full object-cover" alt="Preview foto produk">
    <div id="badgeStatus" class="hidden absolute top-1 left-1 bg-tertiary-container/90 text-on-tertiary-container px-1.5 py-0.5 rounded font-label-sm text-[10px] uppercase font-bold tracking-tight">
      Baru
    </div>
  @endif
</div>
</div>
<!-- Micro Tip Box -->
<div class="p-space-sm rounded-lg bg-surface-container flex items-start gap-space-xs">
<span class="material-symbols-outlined text-secondary text-[18px] shrink-0 mt-0.5">lightbulb</span>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
<strong class="text-on-surface">Tips:</strong> Foto yang jelas dengan pencahayaan baik meningkatkan minat beli sesama mahasiswa hingga 80%.
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
@php
  $currentCond = old('condition_rating', $product->condition_rating);
@endphp
<div class="flex flex-col gap-space-sm">
<!-- Condition Option 10/10 -->
<label class="flex items-center justify-between p-space-sm rounded-xl {{ str_contains($currentCond, '10') ? 'bg-primary-container/20' : 'bg-surface-container hover:bg-surface-container-high' }} cursor-pointer transition-colors">
<div class="flex items-center gap-space-sm">
<input {{ str_contains($currentCond, '10') ? 'checked' : '' }} class="w-4 h-4 text-primary-container bg-surface-container-lowest focus:ring-0 cursor-pointer" name="condition_rating" type="radio" value="10/10 • BNIB Segel">
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-semibold">10/10 • Baru / Belum Dipakai</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Segel utuh, belum pernah dipakai kuliah sama sekali.</span>
</div>
</div>
<span class="px-space-xs py-space-2xs rounded bg-surface-container-highest text-outline font-label-sm text-label-sm">BNIB</span>
</label>
<!-- Condition Option 9/10 -->
<label class="flex items-center justify-between p-space-sm rounded-xl {{ str_contains($currentCond, '9') ? 'bg-primary-container/20' : 'bg-surface-container hover:bg-surface-container-high' }} cursor-pointer transition-colors">
<div class="flex items-center gap-space-sm">
<input {{ str_contains($currentCond, '9') ? 'checked' : '' }} class="w-4 h-4 text-primary-container bg-surface-container-lowest focus:ring-0 cursor-pointer" name="condition_rating" type="radio" value="9/10 • Like New">
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-semibold flex items-center gap-space-xs">
                    9/10 • Like New / Jarang Pakai
                    <span class="w-2 h-2 rounded-full bg-tertiary"></span>
</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Fungsi 100%, body mulus, minim lecet mikro wajar.</span>
</div>
</div>
<span class="px-space-xs py-space-2xs rounded bg-primary-container text-on-primary-container font-label-sm text-label-sm">Populer</span>
</label>
<!-- Condition Option 8/10 -->
<label class="flex items-center justify-between p-space-sm rounded-xl {{ str_contains($currentCond, '8') ? 'bg-primary-container/20' : 'bg-surface-container hover:bg-surface-container-high' }} cursor-pointer transition-colors">
<div class="flex items-center gap-space-sm">
<input {{ str_contains($currentCond, '8') ? 'checked' : '' }} class="w-4 h-4 text-primary-container bg-surface-container-lowest focus:ring-0 cursor-pointer" name="condition_rating" type="radio" value="8/10 • Normal Pakai">
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-semibold">8/10 • Pemakaian Normal Kuliah</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Semua fitur normal, ada tanda bekas pakai harian.</span>
</div>
</div>
<span class="px-space-xs py-space-2xs rounded bg-surface-container-highest text-outline font-label-sm text-label-sm">Good</span>
</label>
<!-- Condition Option 7/10 -->
<label class="flex items-center justify-between p-space-sm rounded-xl {{ str_contains($currentCond, '7') ? 'bg-primary-container/20' : 'bg-surface-container hover:bg-surface-container-high' }} cursor-pointer transition-colors">
<div class="flex items-center gap-space-sm">
<input {{ str_contains($currentCond, '7') ? 'checked' : '' }} class="w-4 h-4 text-primary-container bg-surface-container-lowest focus:ring-0 cursor-pointer" name="condition_rating" type="radio" value="7/10 • Minus Ringan">
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-semibold">7/10 • Ada Minus Kosmetik Ringan</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Fungsi normal, terdapat lecet/dent yang dijelaskan detail.</span>
</div>
</div>
<span class="px-space-xs py-space-2xs rounded bg-surface-container-highest text-outline font-label-sm text-label-sm">Fair</span>
</label>
</div>
</div>
<!-- CARD 3: TITIK TEMU COD & JANGKAUAN -->
<div class="p-space-lg rounded-xl bg-surface-container-low flex flex-col gap-space-md">
<div class="flex items-center justify-between">
<h2 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Titik Temu COD &amp; Pengiriman</h2>
<span class="material-symbols-outlined text-secondary text-[20px]">pin_drop</span>
</div>
<!-- Dropdown Kampus COD -->
<div class="flex flex-col gap-space-2xs">
<label class="font-label-md text-label-md text-on-surface font-medium" for="campusSpot">Titik COD Utama Kampus</label>
<div class="relative">
<select name="cod_location" class="w-full bg-surface-container-lowest rounded-xl px-space-md py-space-sm font-body-md text-body-md text-on-surface appearance-none focus:outline-none focus:bg-surface-container cursor-pointer pr-10" id="campusSpot">
<option {{ old('cod_location', $product->cod_location) == 'Lobi Utama Gedung 3 Polimedia Kreatif' ? 'selected' : '' }} value="Lobi Utama Gedung 3 Polimedia Kreatif">Lobi Utama Gedung 3 Polimedia Kreatif</option>
<option {{ old('cod_location', $product->cod_location) == 'Kantin Kreatif Srengseng Sawah' ? 'selected' : '' }} value="Kantin Kreatif Srengseng Sawah">Kantin Kreatif Srengseng Sawah</option>
<option {{ old('cod_location', $product->cod_location) == 'Gedung Kuliah Terpadu (GKT) Lt. 1' ? 'selected' : '' }} value="Gedung Kuliah Terpadu (GKT) Lt. 1">Gedung Kuliah Terpadu (GKT) Lt. 1</option>
<option {{ old('cod_location', $product->cod_location) == 'Perpustakaan Pusat & Reading Lounge' ? 'selected' : '' }} value="Perpustakaan Pusat & Reading Lounge">Perpustakaan Pusat & Reading Lounge</option>
<option {{ old('cod_location', $product->cod_location) == 'Depan Gerbang Utama Kampus Srengseng' ? 'selected' : '' }} value="Depan Gerbang Utama Kampus Srengseng">Depan Gerbang Utama Kampus Srengseng</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-outline pointer-events-none text-[20px]">expand_more</span>
</div>
</div>
</div>
</div>
<!-- RIGHT COLUMN (Item details, Category, Pricing, Description) -->
<div class="lg:col-span-7 flex flex-col gap-space-lg">
<!-- CARD 1: INFORMASI DETAIL PRODUK & KATEGORI -->
<div class="p-space-lg rounded-xl bg-surface-container-low flex flex-col gap-space-md">
<div class="flex items-center justify-between">
<h2 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Informasi Produk</h2>
<span class="px-space-xs py-space-2xs rounded bg-secondary-container/20 text-secondary font-label-sm text-label-sm">Edit Data</span>
</div>
<!-- Product Title Input -->
<div class="flex flex-col gap-space-2xs">
<label class="font-label-md text-label-md text-on-surface font-medium flex items-center justify-between" for="productName">
<span class="">Nama Barang Preloved <span class="text-error">*</span></span>
<span class="font-body-sm text-body-sm text-outline">Gunakan merek, tipe &amp; spek</span>
</label>
<input name="title" value="{{ old('title', $product->title) }}" class="w-full bg-surface-container-lowest rounded-xl px-space-md py-space-sm font-body-md text-body-md text-on-surface placeholder:text-outline focus:outline-none focus:bg-surface-container transition-colors" id="productName" placeholder="Contoh: iPad Air 4 64GB WiFi Only" required type="text">
</div>
<!-- Category and Subcategory Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
<div class="flex flex-col gap-space-2xs">
<label class="font-label-md text-label-md text-on-surface font-medium" for="category">Kategori Utama <span class="text-error">*</span></label>
<div class="relative">
<select name="category_id" class="w-full bg-surface-container-lowest rounded-xl px-space-md py-space-sm font-body-md text-body-md text-on-surface appearance-none focus:outline-none focus:bg-surface-container cursor-pointer pr-10" id="category">
<option {{ old('category_id', $product->category_id) == '1' ? 'selected' : '' }} value="1">Elektronik &amp; Multimedia</option>
<option {{ old('category_id', $product->category_id) == '2' ? 'selected' : '' }} value="2">Buku &amp; Modul Kuliah</option>
<option {{ old('category_id', $product->category_id) == '3' ? 'selected' : '' }} value="3">Alat Gambar &amp; Praktek Lab</option>
<option {{ old('category_id', $product->category_id) == '4' ? 'selected' : '' }} value="4">Fashion &amp; Jaket Angkatan</option>
<option {{ old('category_id', $product->category_id) == '5' ? 'selected' : '' }} value="5">Kebutuhan Kamar Kos</option>
<option {{ old('category_id', $product->category_id) == '6' ? 'selected' : '' }} value="6">Lain-lain</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-outline pointer-events-none text-[20px]">expand_more</span>
</div>
</div>
</div>
<!-- PRICING SECTION -->
<div class="mt-space-xs p-space-md rounded-xl bg-surface-container flex flex-col gap-space-md">
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-xs">
<span class="font-label-md text-label-md text-on-surface font-semibold flex items-center gap-space-xs">
<span class="material-symbols-outlined text-tertiary text-[18px]">payments</span>
                Penetapan Harga Ramah Mahasiswa
              </span>
<span class="font-label-sm text-label-sm text-tertiary bg-tertiary-container/20 px-space-xs py-space-2xs rounded">0% Fee Transaksi Kampus</span>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
<!-- Listing Price -->
<div class="flex flex-col gap-space-2xs">
<label class="font-label-md text-label-md text-on-surface font-medium" for="sellingPrice">Harga Jual ugoods (IDR) <span class="text-error">*</span></label>
<div class="relative flex items-center">
<span class="absolute left-3.5 font-price-display text-price-display text-primary font-bold">Rp</span>
<input name="price" value="{{ old('price', $product->price) }}" class="w-full bg-surface-container-lowest rounded-xl pl-12 pr-space-md py-space-sm font-price-display text-price-display text-on-surface focus:outline-none focus:bg-surface-container-high transition-colors font-bold" id="sellingPrice" placeholder="Contoh: 150000" required type="text">
</div>
</div>
</div>
</div>
</div>
<!-- CARD 2: DESKRIPSI & KELENGKAPAN -->
<div class="p-space-lg rounded-xl bg-surface-container-low flex flex-col gap-space-md">
<div class="flex items-center justify-between">
<h2 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Deskripsi &amp; Kelengkapan Unit</h2>
</div>
<!-- Description Textarea -->
<div class="flex flex-col gap-space-2xs">
<label class="font-label-md text-label-md text-on-surface font-medium" for="itemDesc">Jelaskan Kondisi, Riwayat &amp; Alasan Jual</label>
<textarea name="description" class="w-full bg-surface-container-lowest rounded-xl p-space-md font-body-md text-body-md text-on-surface placeholder:text-outline focus:outline-none focus:bg-surface-container transition-colors leading-relaxed" id="itemDesc" rows="6" required>{{ old('description', $product->description) }}</textarea>
</div>
</div>
</div>
</form>
</div>
<!-- FIXED BOTTOM FORM ACTION BAR -->
<div class="sticky bottom-0 left-0 right-0 z-40 bg-surface-container-lowest/95 backdrop-blur-xl py-space-sm px-margin md:px-margin-desktop shadow-2xl">
<div class="max-w-[1280px] mx-auto flex flex-col sm:flex-row items-center justify-between gap-space-sm">
<!-- Status Indicator -->
<div class="flex items-center gap-space-xs text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-tertiary text-[18px]">verified_user</span>
<span class="">Perubahan data dilindungi otorisasi akun pemilik</span>
</div>
<!-- Action Buttons -->
<div class="flex items-center gap-space-sm w-full sm:w-auto justify-end">
<a href="{{ route('profile.edit') }}#lapak-saya" class="px-space-md py-space-xs rounded-xl bg-transparent hover:bg-surface-container text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors">
  Batal
</a>
<button class="px-space-lg py-space-xs rounded-xl bg-primary-container text-on-primary-container hover:brightness-110 font-label-md text-label-md font-bold shadow-lg transition-all flex items-center gap-space-xs" form="prelovedForm" type="submit">
<span class="material-symbols-outlined text-[18px]">save</span>
<span class="">Simpan Perubahan</span>
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
      reader.onload = function(e) {
        const img = document.getElementById('mainPreviewImg');
        const placeholder = document.getElementById('previewPlaceholder');
        const badge = document.getElementById('badgeStatus');
        if (img) {
          img.src = e.target.result;
          img.classList.remove('hidden');
        }
        if (placeholder) placeholder.classList.add('hidden');
        if (badge) {
          badge.textContent = 'Baru';
          badge.classList.remove('hidden');
        }
      };
      reader.readAsDataURL(input.files[0]);
    }
  }

  // Micro-interaction for condition selection highlighting
  document.querySelectorAll('input[name="condition_rating"]').forEach(radio => {
    radio.addEventListener('change', () => {
      document.querySelectorAll('input[name="condition_rating"]').forEach(r => {
        const parentLabel = r.closest('label');
        if (r.checked) {
          parentLabel.classList.remove('bg-surface-container', 'hover:bg-surface-container-high');
          parentLabel.classList.add('bg-primary-container/20');
        } else {
          parentLabel.classList.remove('bg-primary-container/20');
          parentLabel.classList.add('bg-surface-container', 'hover:bg-surface-container-high');
        }
      });
    });
  });
</script>
@endpush
