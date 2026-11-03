@extends('layouts.app')

@section('title', 'ugoods - Campus Thrift Marketplace')

@section('content')
<div class="flex flex-col w-full">
@if (session('success'))
<div class="max-w-[1280px] w-full mx-auto px-margin md:px-margin-tablet lg:px-margin-desktop pt-4">
    <div class="p-4 rounded-2xl bg-[#D1FAE5] border border-[#A7F3D0] text-[#065F46] flex items-center justify-between gap-3 shadow-md shadow-emerald-900/[0.04]">
        <div class="flex items-center gap-3">
            <span class="material-symbols-outlined text-[#059669] text-2xl">check_circle</span>
            <span class="font-semibold text-sm md:text-base">{{ session('success') }}</span>
        </div>
        <a href="#katalog" class="px-3.5 py-1.5 rounded-lg bg-[#059669] text-white text-xs font-semibold hover:bg-[#047857] transition-colors shadow-xs">
            Lihat Produk
        </a>
    </div>
</div>
@endif
<!-- Hero Section (Split Asymmetric Layout with Campus Glow & Saturated Contrast) -->
<section class="relative w-full max-w-[1280px] mx-auto px-margin md:px-margin-tablet lg:px-margin-desktop pt-space-xl pb-space-2xl overflow-hidden">
<!-- Ambient Backdrop Light Orbs (Lavender-Pink Soft Ambient Glow) -->
<div class="absolute -top-24 left-1/4 w-96 h-96 bg-purple-300/25 rounded-full blur-3xl pointer-events-none -z-10"></div>
<div class="absolute top-1/2 right-10 w-80 h-80 bg-pink-300/20 rounded-full blur-3xl pointer-events-none -z-10"></div>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter-desktop items-center">
<!-- Left Narrative Column -->
<div class="lg:col-span-7 flex flex-col gap-space-md z-10">
<!-- New Feature Pill -->
<div class="inline-flex items-center gap-space-xs px-3.5 py-1.5 rounded-full bg-white border border-[#D6C7FF] w-fit shadow-sm shadow-purple-100/60">
<span class="w-2 h-2 rounded-full bg-[#059669] animate-pulse"></span>
<span class="font-label-sm text-label-sm text-[#5B47E0] uppercase tracking-wider font-bold">✨ Baru di Polimedia</span>
<span class="text-[#7E70A6] text-xs">|</span>
<span class="font-label-sm text-label-sm text-[#4A3B75] font-medium">v2.4 Marketplace Rilis</span>
</div>
<!-- Hero Headline -->
<h1 class="font-display-hero text-display-hero-mobile md:text-display-hero text-[#1A0D3F] tracking-tight leading-none font-bold">
          Temukan Barang <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#5B47E0] via-[#8B5CF6] to-[#EC4899]">Preloved</span> Kebutuhan Kuliahmu!
        </h1>
<!-- Subtitle -->
<p class="font-body-lg text-body-lg text-[#4A3B75] max-w-xl leading-relaxed font-medium">
          Platform peer-to-peer jual beli barang bekas aman, praktis, dan super hemat khusus civitas akademika Polimedia. Transaksi terverifikasi KTM tanpa drama ongkir.
        </p>
<!-- CTA Action & Verification Bar -->
<div class="flex flex-wrap items-center gap-space-md pt-space-xs">
<a class="group relative inline-flex items-center justify-center gap-space-xs px-6 py-3.5 rounded-xl bg-[#5B47E0] text-white font-headline-sm text-headline-sm hover:bg-[#4A35D0] transition-all duration-200 shadow-lg shadow-[#5B47E0]/30 hover:shadow-[#5B47E0]/45 font-semibold" href="#katalog">
<span class="">Mulai Belanja</span>
<span class="material-symbols-outlined text-[20px] transition-transform duration-200 group-hover:translate-x-1">arrow_forward</span>
</a>
<a class="inline-flex items-center gap-space-xs px-5 py-3.5 rounded-xl bg-white hover:bg-[#FAF8FF] text-[#1A0D3F] border border-[#D6C7FF] font-label-md text-label-md transition-all duration-200 shadow-sm shadow-purple-100/50 font-semibold" href="#cara-kerja">
<span class="material-symbols-outlined text-[#0284C7] text-[20px]">play_circle</span>
<span class="">Panduan Mahasiswa</span>
</a>
</div>
<!-- Value Proposition Badges -->
<div class="grid grid-cols-1 sm:grid-cols-3 gap-space-sm pt-space-sm">
<div class="flex items-center gap-space-xs p-space-sm rounded-2xl bg-white border border-[#E9E3FB] shadow-md shadow-purple-100/50">
<div class="w-9 h-9 rounded-xl bg-[#F5F3FF] border border-[#E9E3FB] flex items-center justify-center shrink-0 text-[#0284C7]">
<span class="material-symbols-outlined text-[18px]">location_on</span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-[#1A0D3F] font-bold">COD di Kampus</span>
<span class="font-body-sm text-body-sm text-[#7E70A6]">Gedung Kuliah &amp; Kantin</span>
</div>
</div>
<div class="flex items-center gap-space-xs p-space-sm rounded-2xl bg-white border border-[#E9E3FB] shadow-md shadow-purple-100/50">
<div class="w-9 h-9 rounded-xl bg-[#ECFDF5] border border-[#A7F3D0] flex items-center justify-center shrink-0 text-[#059669]">
<span class="material-symbols-outlined text-[18px]">verified_user</span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-[#1A0D3F] font-bold">Transaksi Aman</span>
<span class="font-body-sm text-body-sm text-[#7E70A6]">Midtrans Proteksi 100%</span>
</div>
</div>
<div class="flex items-center gap-space-xs p-space-sm rounded-2xl bg-white border border-[#E9E3FB] shadow-md shadow-purple-100/50">
<div class="w-9 h-9 rounded-xl bg-[#F5F3FF] border border-[#E9E3FB] flex items-center justify-center shrink-0 text-[#5B47E0]">
<span class="material-symbols-outlined text-[18px]">sell</span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-[#1A0D3F] font-bold">Harga Mahasiswa</span>
<span class="font-body-sm text-body-sm text-[#7E70A6]">Diskon hingga 70%</span>
</div>
</div>
</div>
</div>
<!-- Right Visual Feature (Floating Campus Deal Preview Card - Dinamis) -->
<div class="lg:col-span-5 relative flex items-center justify-center mt-space-lg lg:mt-0">
  <div class="relative w-full max-w-lg rounded-3xl bg-white/95 border border-[#D6C7FF] p-6 overflow-hidden backdrop-blur-xl shadow-[0_15px_35px_rgba(91,71,224,0.12)] flex flex-col items-center justify-between gap-4">
    <div class="absolute -inset-10 bg-gradient-to-tr from-purple-100/40 via-pink-50/25 to-transparent rounded-full blur-3xl pointer-events-none -z-10"></div>
    <div class="w-full flex items-center justify-between border-b border-[#E9E3FB] pb-2">
      <span class="text-xs font-bold text-[#1A0D3F] flex items-center gap-1.5">
        <span class="w-2 h-2 rounded-full bg-[#0284C7] animate-pulse"></span>
        Preloved Populer Terbaru
      </span>
      <a href="{{ route('categories.index') }}" class="text-[11px] text-[#5B47E0] hover:underline font-bold">Jelajahi -></a>
    </div>
    <div class="grid grid-cols-3 gap-3 w-full items-end pt-2 pb-1">
      @forelse ($heroProducts as $index => $heroItem)
        @php
          $isCenter = ($index === 1 || ($heroProducts->count() === 1 && $index === 0));
        @endphp
        <a href="{{ route('products.show', $heroItem->slug ?? $heroItem->id) }}" 
           class="{{ $isCenter ? 'relative -mt-4 rounded-2xl bg-white border-2 border-[#5B47E0] p-3 flex flex-col gap-2 shadow-xl shadow-[#5B47E0]/20 scale-105 transition-transform duration-300 hover:scale-110 z-10' : 'rounded-2xl bg-white border border-[#E9E3FB] p-2.5 flex flex-col gap-2 shadow-md shadow-purple-100/40 transition-transform duration-300 hover:-translate-y-1' }}">
          <div class="relative aspect-square w-full rounded-xl overflow-hidden bg-[#F6F3FE] border border-[#E9E3FB]">
            @if ($heroItem->image_path)
              <img alt="{{ $heroItem->title }}" class="w-full h-full object-cover" 
                   src="{{ \Illuminate\Support\Str::startsWith($heroItem->image_path, 'http') ? $heroItem->image_path : asset('storage/' . $heroItem->image_path) }}"
                   onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'w-full h-full flex flex-col items-center justify-center bg-[#F6F3FE] text-[#5B47E0]\'><span class=\'font-bold text-xs font-display\'>ugoods</span></div>';">
            @else
              <div class="w-full h-full flex flex-col items-center justify-center bg-[#F6F3FE] text-[#5B47E0]">
                <span class="font-bold text-xs tracking-tight text-[#1A0D3F] font-display">u<span class="text-[#5B47E0]">goods</span></span>
              </div>
            @endif
          </div>
          <div class="flex flex-col">
            <span class="{{ $isCenter ? 'font-label-md text-label-md font-bold' : 'font-label-sm text-label-sm font-semibold' }} text-[#1A0D3F] truncate" title="{{ $heroItem->title }}">
              {{ $heroItem->title }}
            </span>
            <span class="{{ $isCenter ? 'font-price-display text-price-display text-[#5B47E0]' : 'font-headline-sm text-[13px] text-[#5B47E0]' }} font-bold">
              Rp {{ number_format($heroItem->price, 0, ',', '.') }}
            </span>
          </div>
        </a>
      @empty
        <div class="col-span-3 py-8 text-center text-xs text-[#7E70A6]">
          Belum ada produk untuk ditampilkan.
        </div>
      @endforelse
    </div>
  </div>
</div>
</div>
</section>

<!-- Categories Section (Warm Gradient Strip with Distinct Tinted Elevation) -->
<section class="w-full bg-gradient-to-b from-[#FAF8FF] via-white/80 to-[#FAF8FF] border-y border-[#E9E3FB] py-space-xl" id="kategori">
<div class="max-w-[1280px] mx-auto px-margin md:px-margin-tablet lg:px-margin-desktop">
<div class="flex items-end justify-between mb-space-lg">
<div>
<span class="font-label-sm text-label-sm text-[#5B47E0] uppercase tracking-wider font-bold block mb-1">Eksplorasi Praktis</span>
<h2 class="font-headline-lg text-headline-lg text-[#1A0D3F] tracking-tight font-bold">Cari yang kamu butuhkan</h2>
</div>
<a class="group inline-flex items-center gap-1 font-label-md text-label-md text-[#5B47E0] hover:text-[#4A35D0] transition-colors font-bold" href="{{ route('categories.index') }}">
<span class="">Lihat semua</span>
<span class="material-symbols-outlined text-[16px] transition-transform group-hover:translate-x-1">chevron_right</span>
</a>
</div>
<!-- 6 Interactive Category Cards -->
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-gutter">
<!-- 1. Elektronik -->
<a class="group flex flex-col items-center text-center p-space-md rounded-2xl bg-white border border-[#E9E3FB] hover:border-[#5B47E0] transition-all duration-300 shadow-md shadow-purple-100/50 hover:shadow-xl hover:shadow-purple-200/60 hover:-translate-y-1" href="{{ route('categories.index', ['category' => 'elektronik']) }}">
<div class="w-14 h-14 rounded-2xl bg-[#EEF2FF] border border-[#E0E7FF] text-[#4F46E5] flex items-center justify-center mb-space-sm group-hover:scale-110 group-hover:bg-[#5B47E0] group-hover:text-white transition-all duration-300">
<span class="material-symbols-outlined text-[28px]">devices</span>
</div>
<span class="font-label-md text-label-md text-[#1A0D3F] font-bold group-hover:text-[#5B47E0] transition-colors">Elektronik</span>
<span class="font-body-sm text-body-sm text-[#7E70A6] mt-0.5">Laptop, Tablet, Audio</span>
</a>
<!-- 2. Buku & Modul -->
<a class="group flex flex-col items-center text-center p-space-md rounded-2xl bg-white border border-[#E9E3FB] hover:border-[#0284C7] transition-all duration-300 shadow-md shadow-purple-100/50 hover:shadow-xl hover:shadow-purple-200/60 hover:-translate-y-1" href="{{ route('categories.index', ['category' => 'buku-modul']) }}">
<div class="w-14 h-14 rounded-2xl bg-[#E0F2FE] border border-[#BAE6FD] text-[#0284C7] flex items-center justify-center mb-space-sm group-hover:scale-110 group-hover:bg-[#0284C7] group-hover:text-white transition-all duration-300">
<span class="material-symbols-outlined text-[28px]">menu_book</span>
</div>
<span class="font-label-md text-label-md text-[#1A0D3F] font-bold group-hover:text-[#0284C7] transition-colors">Buku &amp; Modul</span>
<span class="font-body-sm text-body-sm text-[#7E70A6] mt-0.5">Diktat, DKV, Penerbitan</span>
</a>
<!-- 3. Fashion -->
<a class="group flex flex-col items-center text-center p-space-md rounded-2xl bg-white border border-[#E9E3FB] hover:border-[#059669] transition-all duration-300 shadow-md shadow-purple-100/50 hover:shadow-xl hover:shadow-purple-200/60 hover:-translate-y-1" href="{{ route('categories.index', ['category' => 'fashion-thrift']) }}">
<div class="w-14 h-14 rounded-2xl bg-[#ECFDF5] border border-[#A7F3D0] text-[#059669] flex items-center justify-center mb-space-sm group-hover:scale-110 group-hover:bg-[#059669] group-hover:text-white transition-all duration-300">
<span class="material-symbols-outlined text-[28px]">apparel</span>
</div>
<span class="font-label-md text-label-md text-[#1A0D3F] font-bold group-hover:text-[#059669] transition-colors">Fashion Thrift</span>
<span class="font-body-sm text-body-sm text-[#7E70A6] mt-0.5">Jaket, Hoodie, Sepatu</span>
</a>
<!-- 4. Alat Gambar/Praktek -->
<a class="group flex flex-col items-center text-center p-space-md rounded-2xl bg-white border border-[#E9E3FB] hover:border-[#5B47E0] transition-all duration-300 shadow-md shadow-purple-100/50 hover:shadow-xl hover:shadow-purple-200/60 hover:-translate-y-1" href="{{ route('categories.index', ['category' => 'alat-gambar']) }}">
<div class="w-14 h-14 rounded-2xl bg-[#F5F3FF] border border-[#DDD6FE] text-[#7C3AED] flex items-center justify-center mb-space-sm group-hover:scale-110 group-hover:bg-[#5B47E0] group-hover:text-white transition-all duration-300">
<span class="material-symbols-outlined text-[28px]">draw</span>
</div>
<span class="font-label-md text-label-md text-[#1A0D3F] font-bold group-hover:text-[#5B47E0] transition-colors">Alat Gambar</span>
<span class="font-body-sm text-body-sm text-[#7E70A6] mt-0.5">Pen Tablet, Kuas, Tracing</span>
</a>
<!-- 5. Kebutuhan Kos -->
<a class="group flex flex-col items-center text-center p-space-md rounded-2xl bg-white border border-[#E9E3FB] hover:border-[#D97706] transition-all duration-300 shadow-md shadow-purple-100/50 hover:shadow-xl hover:shadow-purple-200/60 hover:-translate-y-1" href="{{ route('categories.index', ['category' => 'kebutuhan-kos']) }}">
<div class="w-14 h-14 rounded-2xl bg-[#FEF3C7] border border-[#FDE68A] text-[#D97706] flex items-center justify-center mb-space-sm group-hover:scale-110 group-hover:bg-[#D97706] group-hover:text-white transition-all duration-300">
<span class="material-symbols-outlined text-[28px]">bed</span>
</div>
<span class="font-label-md text-label-md text-[#1A0D3F] font-bold group-hover:text-[#D97706] transition-colors">Kebutuhan Kos</span>
<span class="font-body-sm text-body-sm text-[#7E70A6] mt-0.5">Kipas, Meja Lipat, Rak</span>
</a>
<!-- 6. Lainnya -->
<a class="group flex flex-col items-center text-center p-space-md rounded-2xl bg-white border border-[#E9E3FB] hover:border-[#DB2777] transition-all duration-300 shadow-md shadow-purple-100/50 hover:shadow-xl hover:shadow-purple-200/60 hover:-translate-y-1" href="{{ route('categories.index', ['category' => 'lainnya']) }}">
<div class="w-14 h-14 rounded-2xl bg-[#FDF2F8] border border-[#FBCFE8] text-[#DB2777] flex items-center justify-center mb-space-sm group-hover:scale-110 group-hover:bg-[#DB2777] group-hover:text-white transition-all duration-300">
<span class="material-symbols-outlined text-[28px]">grid_view</span>
</div>
<span class="font-label-md text-label-md text-[#1A0D3F] font-bold group-hover:text-[#5B47E0] transition-colors">Lainnya</span>
<span class="font-body-sm text-body-sm text-[#7E70A6] mt-0.5">Helm, Aksesoris, Alat Lab</span>
</a>
</div>
</div>
</section>

<!-- Featured Products Section ("Rekomendasi Hari Ini") -->
<section class="w-full py-space-2xl" id="katalog">
<div class="max-w-[1280px] mx-auto px-margin md:px-margin-tablet lg:px-margin-desktop">
<!-- Section Header -->
<div class="flex flex-col sm:flex-row sm:items-end justify-between mb-space-lg gap-space-xs">
<div>
<div class="flex items-center gap-2 mb-1">
<span class="w-2.5 h-2.5 rounded-full bg-[#0284C7]"></span>
<span class="font-label-sm text-label-sm text-[#0284C7] uppercase tracking-wider font-bold">Pilihan Kurasi Mahasiswa</span>
</div>
<h2 class="font-headline-lg text-headline-lg text-[#1A0D3F] tracking-tight font-bold">Rekomendasi Hari Ini (Maks. 8 Barang)</h2>
</div>
<div class="flex items-center gap-space-sm">
<!-- Filter Tag Indicator -->
<span class="hidden md:inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-white border border-[#D6C7FF] text-[#4A3B75] font-label-sm text-label-sm shadow-sm shadow-purple-100/50 font-medium">
<span class="material-symbols-outlined text-[16px] text-[#059669]">tune</span> Filter: Kampus Srengseng
</span>
<a class="group inline-flex items-center gap-1 font-label-md text-label-md text-[#5B47E0] hover:text-[#4A35D0] transition-colors font-bold" href="{{ route('categories.index') }}">
<span class="">Lihat Semua Barang</span>
<span class="material-symbols-outlined text-[16px] transition-transform group-hover:translate-x-1">arrow_forward</span>
</a>
</div>
</div>
<!-- 4-Column Product Grid (Maksimal 8 Produk) -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-gutter-desktop">
@forelse ($recommendedProducts as $product)
<!-- PRODUCT CARD: {{ $product->title }} -->
<article class="group relative rounded-2xl bg-white border border-[#E9E3FB] hover:border-[#C4B5FD] flex flex-col justify-between overflow-hidden shadow-md shadow-purple-100/60 hover:shadow-xl hover:shadow-[#5B47E0]/15 transition-all duration-300">
<div>
<!-- Image Frame (Warm Tinted Lilac Framing) -->
<div class="relative aspect-square w-full bg-[#F6F3FE] border-b border-[#E9E3FB] overflow-hidden">
@if ($product->image_path)
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" 
     src="{{ \Illuminate\Support\Str::startsWith($product->image_path, 'http') ? $product->image_path : asset('storage/' . $product->image_path) }}" 
     alt="{{ $product->title }}"
     onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'w-full h-full flex flex-col items-center justify-center bg-[#F6F3FE] text-[#5B47E0] p-3 text-center\'><span class=\'font-bold text-2xl tracking-tight text-[#1A0D3F] font-display\'>u<span class=\'text-[#5B47E0]\'>goods</span></span><span class=\'text-[10px] text-[#7E70A6] font-label-sm mt-1 uppercase tracking-wider\'>Preloved Kampus</span></div>';">
@else
<div class="w-full h-full flex flex-col items-center justify-center bg-[#F6F3FE] text-[#5B47E0] p-3 text-center">
  <span class="font-bold text-2xl tracking-tight text-[#1A0D3F] font-display">u<span class="text-[#5B47E0]">goods</span></span>
  <span class="text-[10px] text-[#7E70A6] font-label-sm mt-1 uppercase tracking-wider line-clamp-1">
    {{ \Illuminate\Support\Str::limit($product->title, 20) }}
  </span>
</div>
@endif

@if ($product->condition_rating)
<span class="absolute top-3 left-3 px-2.5 py-1 rounded-md bg-[#5B47E0] text-white font-headline-sm text-headline-sm shadow-md shadow-[#5B47E0]/20 font-bold">
  {{ $product->condition_rating }}
</span>
@endif

<!-- Wishlist Heart Button -->
<button aria-label="Simpan ke wishlist" class="absolute top-3 right-3 w-9 h-9 rounded-full bg-white/95 backdrop-blur-md flex items-center justify-center text-[#7E70A6] hover:text-rose-600 border border-[#E9E3FB] transition-colors shadow-sm" type="button">
<span class="material-symbols-outlined text-[20px]">favorite</span>
</button>
</div>

<!-- Card Content Body -->
<div class="p-space-md flex flex-col gap-1.5">
<div class="flex items-center justify-between text-[#7E70A6]">
<span class="font-body-sm text-body-sm flex items-center gap-1 font-medium">
<span class="material-symbols-outlined text-[#0284C7] text-[15px]">location_on</span> {{ $product->cod_location ?? 'Polimedia Srengseng' }}
</span>
<span class="font-label-sm text-label-sm text-[#065F46] bg-[#D1FAE5] border border-[#A7F3D0] px-2 py-0.5 rounded font-bold">COD Ready</span>
</div>

<h3 class="font-headline-sm text-headline-sm text-[#1A0D3F] truncate group-hover:text-[#5B47E0] transition-colors font-bold" title="{{ $product->title }}">
<a href="{{ route('products.show', $product->slug ?? $product->id) }}">
  {{ $product->title }}
</a>
</h3>

<!-- Rating & Seller -->
<div class="flex items-center gap-1 font-body-sm text-body-sm text-[#4A3B75]">
<span class="text-amber-500 font-bold">⭐ 5.0</span>
<span class="text-[#7E70A6]">({{ $product->user->name ?? 'Mahasiswa' }})</span>
</div>

<!-- Price Box -->
<div class="mt-space-xs flex items-baseline gap-2">
<span class="font-price-display text-price-display text-[#5B47E0] tabular-nums tracking-tight font-bold text-xl">
  Rp {{ number_format($product->price, 0, ',', '.') }}
</span>
</div>
</div>
</div>

<!-- Add to Cart / Detail CTA -->
<div class="p-space-md pt-0">
<a href="{{ route('products.show', $product->slug ?? $product->id) }}" class="w-full py-2.5 px-3 rounded-xl bg-[#F5F3FF] hover:bg-[#5B47E0] text-[#5B47E0] hover:text-white border border-[#D6C7FF] hover:border-[#5B47E0] font-label-md text-label-md flex items-center justify-center gap-1.5 transition-all duration-200 shadow-xs hover:shadow-md hover:shadow-[#5B47E0]/25 font-bold">
<span class="material-symbols-outlined text-[18px]">visibility</span>
<span class="">Lihat Detail</span>
</a>
</div>
</article>
@empty
<div class="col-span-full py-16 px-6 rounded-3xl bg-white text-center flex flex-col items-center justify-center border border-dashed border-[#D6C7FF] shadow-sm shadow-purple-100/50">
<div class="w-16 h-16 rounded-2xl bg-[#F5F3FF] border border-[#E9E3FB] flex items-center justify-center text-[#5B47E0] mb-4 shadow-sm">
<span class="material-symbols-outlined text-3xl">shopping_bag</span>
</div>
<h3 class="font-headline-sm text-[#1A0D3F] font-bold text-xl">Belum Ada Barang yang Dijual</h3>
<p class="font-body-md text-[#4A3B75] max-w-md mt-1 mb-6">Jadilah mahasiswa pertama yang menawarkan barang preloved bermanfaat untuk teman se-kampus!</p>
<a href="{{ route('seller.products.create') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-[#5B47E0] text-white font-headline-sm hover:bg-[#4A35D0] transition-all shadow-lg shadow-[#5B47E0]/30 hover:shadow-[#5B47E0]/45 font-bold">
<span class="material-symbols-outlined text-[20px]">add_circle</span>
<span>Mulai Jual Barang Sekarang</span>
</a>
</div>
@endforelse
</div>

<!-- Button Lihat Semua Barang -> route('categories.index') -->
<div class="mt-10 text-center">
  <a href="{{ route('categories.index') }}" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-2xl bg-white border border-[#D6C7FF] hover:bg-[#5B47E0] hover:text-white hover:border-[#5B47E0] text-[#1A0D3F] text-sm font-bold transition-all shadow-md shadow-purple-100/60 hover:shadow-lg group">
    <span>Lihat Semua Barang di Katalog</span>
    <span class="material-symbols-outlined text-[20px] transition-transform group-hover:translate-x-1">arrow_forward</span>
  </a>
</div>
<!-- Quick Trust Indicators Strip -->
<div class="mt-space-2xl p-space-lg rounded-2xl bg-white border border-[#E9E3FB] shadow-md shadow-purple-100/50 flex flex-col md:flex-row items-center justify-between gap-space-md">
<div class="flex items-center gap-space-md">
<div class="w-12 h-12 rounded-xl bg-[#D1FAE5] border border-[#A7F3D0] flex items-center justify-center text-[#065F46] shrink-0 shadow-xs">
<span class="material-symbols-outlined text-[26px]">shield_with_heart</span>
</div>
<div>
<h4 class="font-headline-sm text-headline-sm text-[#1A0D3F] font-bold">Jaminan Pembayaran Midtrans</h4>
<p class="font-body-sm text-body-sm text-[#4A3B75]">Uang baru dilepas ke penjual setelah kamu menerima dan mengecek fisik barang secara langsung saat COD.</p>
</div>
</div>
<div class="flex items-center gap-space-sm shrink-0">
<span class="font-label-md text-label-md text-[#065F46] font-bold flex items-center gap-1 bg-[#D1FAE5] border border-[#A7F3D0] px-3 py-1 rounded-full">
<span class="material-symbols-outlined text-[18px]">check_circle</span> 0% Fee Mahasiswa
</span>
</div>
</div>
</div>
</section>

<!-- Seller CTA Callout Section (Deep Pastel Lavender-Pink Gradient Card) -->
<section class="w-full pb-space-2xl">
<div class="max-w-[1280px] mx-auto px-margin md:px-margin-tablet lg:px-margin-desktop">
<div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-[#EDE9FE] via-white to-[#FCE7F3]/40 border border-[#D6C7FF] p-space-lg md:p-space-2xl shadow-xl shadow-purple-100/60">
<!-- Accent Glow Gradients -->
<div class="absolute -top-20 -left-20 w-80 h-80 bg-purple-300/20 rounded-full blur-3xl pointer-events-none"></div>
<div class="absolute -bottom-20 -right-20 w-80 h-80 bg-pink-300/20 rounded-full blur-3xl pointer-events-none"></div>
<div class="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-gutter-desktop items-center">
<!-- Text Narrative -->
<div class="lg:col-span-8 flex flex-col gap-space-sm">
<!-- Badge -->
<div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#E0F2FE] border border-[#BAE6FD] text-[#0369A1] font-label-sm text-label-sm w-fit font-bold shadow-xs">
<span class="material-symbols-outlined text-[16px]">local_shipping</span>
<span class="">Gratis Ongkir di Kampus</span>
</div>
<!-- Title -->
<h2 class="font-headline-lg text-headline-lg text-[#1A0D3F] tracking-tight font-bold">
              Jual Barang Bekasmu Sekarang!
            </h2>
<!-- Description -->
<p class="font-body-lg text-body-lg text-[#4A3B75] max-w-2xl font-medium">
              Punya modul semester lalu, drawing tab, atau outfit yang jarang dipakai? Jadikan uang tambahan jajan kuliah dengan mudah. Langsung tayang dalam 60 detik ke ratusan mahasiswa aktif.
            </p>
<!-- Key Seller Perks -->
<div class="flex flex-wrap items-center gap-x-6 gap-y-2 pt-2 text-[#7E70A6] font-label-md text-label-md">
<span class="flex items-center gap-1.5 text-[#1A0D3F] font-semibold">
<span class="material-symbols-outlined text-[#059669] text-[18px]">verified</span> Verifikasi instan KTM
</span>
<span class="flex items-center gap-1.5 text-[#1A0D3F] font-semibold">
<span class="material-symbols-outlined text-[#0284C7] text-[18px]">chat</span> Chat langsung di app
</span>
<span class="flex items-center gap-1.5 text-[#1A0D3F] font-semibold">
<span class="material-symbols-outlined text-[#5B47E0] text-[18px]">payments</span> Dana langsung cair
</span>
</div>
<!-- CTA Button -->
<div class="pt-space-sm">
<a class="group inline-flex items-center justify-center gap-space-xs px-6 py-3.5 rounded-xl bg-[#5B47E0] text-white font-headline-sm text-headline-sm hover:bg-[#4A35D0] transition-all duration-200 shadow-lg shadow-[#5B47E0]/30 hover:shadow-[#5B47E0]/45 font-bold" href="{{ url('/seller/products/create') }}">
<span class="">Mulai Jual</span>
<span class="material-symbols-outlined text-[20px] transition-transform duration-200 group-hover:translate-x-1">arrow_forward</span>
</a>
</div>
</div>
<!-- Stylized Graphic Container / 3D Package Illustration -->
<div class="lg:col-span-4 flex items-center justify-center">
<div class="relative w-full max-w-[280px] aspect-square rounded-2xl bg-white border border-[#E9E3FB] p-6 flex flex-col items-center justify-center text-center shadow-md shadow-purple-100/50">
<!-- Inline Stylized 3D Package / Box Graphic SVG -->
<svg class="w-32 h-32 mb-3 text-[#5B47E0] transition-transform hover:scale-105 duration-300" fill="none" viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg">
<path d="M60 15L100 36V84L60 105L20 84V36L60 15Z" fill="#FAF8FF" stroke="#5B47E0" stroke-linejoin="round" stroke-width="3"></path>
<path d="M60 15V60M100 36L60 60M20 36L60 60" stroke="#0284C7" stroke-linejoin="round" stroke-width="3"></path>
<path d="M60 60L60 105" stroke="#5B47E0" stroke-width="3"></path>
<circle cx="60" cy="38" fill="#5B47E0" fill-opacity="0.15" r="8"></circle>
<path d="M56 38L59 41L65 35" stroke="#5B47E0" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
<!-- Floating campus sparkle tags -->
<circle cx="95" cy="25" fill="#059669" r="4"></circle>
<circle cx="22" cy="75" fill="#0284C7" r="3"></circle>
</svg>
<span class="font-headline-sm text-headline-sm text-[#1A0D3F] font-bold">Polimedia Express</span>
<span class="font-body-sm text-body-sm text-[#7E70A6] mt-0.5">Drop-off point terdekat di Gedung Terpadu</span>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Interactive JavaScript Micro-interactions for Client-Side Polishing -->

</div>
@endsection

@push('scripts')
<script>

    document.addEventListener('DOMContentLoaded', () => {
      // Favorite Button Micro-interaction toggle
      const wishlistBtns = document.querySelectorAll('button[aria-label="Simpan ke wishlist"]');
      wishlistBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
          e.preventDefault();
          const icon = btn.querySelector('.material-symbols-outlined');
          if (icon) {
            const isFilled = icon.style.fontVariationSettings?.includes("'FILL' 1");
            if (isFilled) {
              icon.style.fontVariationSettings = "'FILL' 0";
              btn.classList.remove('text-error');
              btn.classList.add('text-outline');
            } else {
              icon.style.fontVariationSettings = "'FILL' 1";
              btn.classList.remove('text-outline');
              btn.classList.add('text-error');
            }
          }
        });
      });

      // Simple Add to Cart Feedback
      const addToCartBtns = document.querySelectorAll('button:has(.material-symbols-outlined:contains("add_shopping_cart")), button');
      addToCartBtns.forEach(btn => {
        if (btn.innerText.includes('Tambah ke keranjang')) {
          btn.addEventListener('click', (e) => {
            e.preventDefault();
            const originalContent = btn.innerHTML;
            btn.innerHTML = `<span class="material-symbols-outlined text-[18px] text-tertiary">check_circle</span> <span class="text-tertiary">Ditambahkan!</span>`;
            setTimeout(() => {
              btn.innerHTML = originalContent;
            }, 1800);
          });
        }
      });
    });
  
</script>
@endpush
