@extends('layouts.app')

@section('title', ($product->title ?? 'Kamera Mirrorless Sony A6100') . ' - ugoods Detail Produk')

@section('content')
  @php
    $displayImg = ($product && $product->image_path)
      ? (\Illuminate\Support\Str::startsWith($product->image_path, 'http') ? $product->image_path : asset('storage/' . $product->image_path))
      : 'https://lh3.googleusercontent.com/aida-public/AB6AXuCpsOLSxu4fvgtYgwZUNryMHSrF0XYrPXSw8MI4P9mdsxkxtpFR6_LgLoR8Q92KbJEw_Agtj7VbQdHtYTX3ahTMBLxukWXnclxPwWycHJ6Stoi2MyKPsJWKvtLLsA1tRZCJYX8VUzbiWpe4ggED2IzXhujvXmcqG6seK1AATwHhUbioCOQTnM7R8a3mD5qsrjzgGWBizShNhWSh9YF57Zt0P2ACcIH_PvW2un2FBaoAt-ksXwEI_28';
  @endphp
  <div class="flex flex-col w-full">
    <!-- Top Navigation & Breadcrumbs -->
    <section class="w-full bg-surface-container-lowest py-space-sm">
      <div class="max-w-[1280px] mx-auto px-margin md:px-margin-desktop flex items-center justify-between">
        <nav aria-label="Breadcrumb" class="flex items-center gap-space-xs font-label-md text-label-md text-outline">
          <a class="hover:text-primary transition-colors flex items-center gap-1" href="{{ route('home') }}">
            <span class="material-symbols-outlined text-[16px]">home</span>
            <span class="">Beranda</span>
          </a>
          <span class="material-symbols-outlined text-[14px] text-outline-variant">chevron_right</span>
          <a class="hover:text-primary transition-colors" href="{{ route('home') }}#katalog">Katalog</a>
          <span class="material-symbols-outlined text-[14px] text-outline-variant">chevron_right</span>
          <span
            class="text-on-surface truncate max-w-[200px] sm:max-w-xs md:max-w-md font-medium">{{ $product->title ?? 'Kamera Mirrorless Sony A6100' }}</span>
        </nav>
        <div class="hidden sm:flex items-center gap-space-sm">
          <span
            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-tertiary-container/30 text-tertiary font-label-sm text-label-sm">
            <span class="w-1.5 h-1.5 rounded-full bg-tertiary animate-pulse"></span>
            Listing Aktif
          </span>
          <span class="text-outline font-label-sm text-label-sm">ID: UGD-{{ $product->id ?? '8841' }}-POLI</span>
        </div>
      </div>
    </section>
    <!-- Main Product Stage (2-Columns Layout) -->
    <section class="w-full py-space-lg md:py-space-xl">
      <div
        class="max-w-[1280px] mx-auto px-margin md:px-margin-desktop grid grid-cols-1 lg:grid-cols-12 gap-gutter-desktop items-start">
        <!-- LEFT COLUMN: Product Gallery & Guarantee -->
        <div class="lg:col-span-6 flex flex-col gap-space-md">
          <!-- Main Media Card -->
          <div
            class="relative w-full aspect-[4/3] sm:aspect-square bg-surface-container-low rounded-xl overflow-hidden group shadow-xl">
            <img alt="{{ $product->title ?? 'Sony A6100' }}"
              class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
              id="mainShowcaseImg" src="{{ $displayImg }}">
            <!-- Ambient overlay for badge contrast -->
            <div
              class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest/80 via-transparent to-surface-container-lowest/40 pointer-events-none">
            </div>
            <!-- Top Status Badges -->
            <div class="absolute top-4 left-4 right-4 flex items-center justify-between pointer-events-none">
              <span
                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-surface-container-high/90 backdrop-blur-md text-tertiary font-label-md text-label-md shadow-md">
                <span class="material-symbols-outlined text-[16px] text-tertiary">check_circle</span>
                Kondisi: {{ $product->condition_rating ?? '9/10 Like New' }}
              </span>
              <span
                class="inline-flex items-center gap-1 px-3 py-1.5 rounded-full bg-primary-container/90 backdrop-blur-md text-on-primary-container font-label-md text-label-md shadow-md"><span
                  class="material-symbols-outlined text-[16px]">verified_user</span> Garansi Mahasiswa</span>
            </div>
            <!-- Zoom Hint Overlay Button -->
            <div class="absolute bottom-4 right-4 pointer-events-none">
              <span
                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-surface-container-lowest/80 backdrop-blur-md text-outline font-label-sm text-label-sm">
                <span class="material-symbols-outlined text-[16px]">zoom_in</span>
                Klik untuk resolusi penuh
              </span>
            </div>
          </div>
          <!-- Product Showcase Gallery & Details -->
          <div class="grid grid-cols-3 gap-space-sm" id="thumbGallery">
            <div
              class="relative aspect-square rounded-lg overflow-hidden bg-surface-container-low p-1 text-left ring-2 ring-primary-container">
              @if ($product->image_path)
                <img alt="{{ $product->title }}" class="w-full h-full object-cover rounded" src="{{ $displayImg }}">
              @else
                <div
                  class="w-full h-full flex flex-col items-center justify-center bg-surface-container-high text-primary rounded">
                  <span class="font-bold text-xs font-display">ugoods</span>
                </div>
              @endif
              <span
                class="absolute bottom-1.5 left-1.5 px-1.5 py-0.5 rounded bg-surface-container-lowest/90 font-label-sm text-[10px] text-on-surface">Foto
                Utama</span>
            </div>
            <div
              class="relative aspect-square rounded-lg overflow-hidden bg-surface-container-low p-2 text-left flex flex-col justify-between border border-outline-variant/30">
              <div class="w-7 h-7 rounded-lg bg-secondary/15 text-secondary flex items-center justify-center">
                <span class="material-symbols-outlined text-[16px]">location_on</span>
              </div>
              <div class="flex flex-col">
                <span class="text-[10px] text-outline font-medium">Titik COD</span>
                <span class="text-[11px] font-bold text-white truncate">{{ $product->cod_location ?? 'Kampus' }}</span>
              </div>
            </div>
            <div
              class="relative aspect-square rounded-lg overflow-hidden bg-surface-container-low p-2 text-left flex flex-col justify-between border border-outline-variant/30">
              <div class="w-7 h-7 rounded-lg bg-tertiary/15 text-tertiary flex items-center justify-center">
                <span class="material-symbols-outlined text-[16px]">verified_user</span>
              </div>
              <div class="flex flex-col">
                <span class="text-[10px] text-outline font-medium">KTM Terverifikasi</span>
                <span class="text-[11px] font-bold text-white truncate">{{ $product->user->name ?? 'Mahasiswa' }}</span>
              </div>
            </div>
          </div>
          <!-- Campus Safety Trust Micro-banner -->
          <div class="p-space-md rounded-xl bg-surface-container-low flex items-start gap-space-sm shadow-sm">
            <div class="w-10 h-10 rounded-lg bg-tertiary-container/20 flex items-center justify-center shrink-0">
              <span class="material-symbols-outlined text-tertiary text-[22px]">verified</span>
            </div>
            <div class="flex flex-col gap-0.5">
              <span class="font-label-md text-label-md text-on-surface font-semibold flex items-center gap-1.5">
                Proteksi Uang Kembali 100% Kampus
                <span
                  class="px-1.5 py-0.5 rounded bg-tertiary/10 text-tertiary font-label-sm text-label-sm font-bold">Auto-Refund</span>
              </span>
              <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">Transaksi diverifikasi otomatis
                via Midtrans Gateway dengan garansi mahasiswa terverifikasi KTM saat COD.</p>
            </div>
          </div>
          <!-- Campus Verification Specs Badge -->
          <div class="grid grid-cols-2 gap-space-sm pt-space-xs">
            <div class="p-space-sm rounded-lg bg-surface-container flex items-center gap-space-xs">
              <span class="material-symbols-outlined text-secondary text-[20px]">pin_drop</span>
              <div class="flex flex-col">
                <span class="font-label-sm text-label-sm text-outline">Zona Pertemuan</span>
                <span
                  class="font-label-md text-label-md text-on-surface truncate">{{ $product->cod_location ?? 'Polimedia Srengseng' }}</span>
              </div>
            </div>
            <div class="p-space-sm rounded-lg bg-surface-container flex items-center gap-space-xs">
              <span class="material-symbols-outlined text-primary text-[20px]">shutter_speed</span>
              <div class="flex flex-col">
                <span class="font-label-sm text-label-sm text-outline">Status Kondisi</span>
                <span
                  class="font-label-md text-label-md text-on-surface">{{ $product->condition_rating ?? '9/10 Like New' }}</span>
              </div>
            </div>
          </div>
        </div>
        <!-- RIGHT COLUMN: Purchase Details & Action Drawer -->
        <div class="lg:col-span-6 flex flex-col gap-space-md">
          <!-- Header Info Block -->
          <div class="flex flex-col gap-space-xs">
            <div class="flex items-center justify-between">
              <span
                class="px-3 py-1 rounded-full bg-surface-container font-label-sm text-label-sm text-primary tracking-wide uppercase font-semibold">
                Katalog Mahasiswa
              </span>
              <div class="flex items-center gap-space-xs">
                <button aria-label="Bagikan Produk"
                  class="w-8 h-8 rounded-lg bg-surface-container-low flex items-center justify-center text-outline hover:text-on-surface transition-colors"
                  type="button">
                  <span class="material-symbols-outlined text-[18px]">share</span>
                </button>
                <button aria-label="Laporkan Produk"
                  class="w-8 h-8 rounded-lg bg-surface-container-low flex items-center justify-center text-outline hover:text-error transition-colors"
                  type="button">
                  <span class="material-symbols-outlined text-[18px]">flag</span>
                </button>
              </div>
            </div>
            <h1 class="font-headline-lg text-headline-lg text-on-surface pt-space-xs">
              {{ $product->title ?? 'Kamera Mirrorless Sony A6100 Kit 16-50mm' }}
            </h1>
            <!-- Rating & Sale Meta -->
            <div class="flex flex-wrap items-center gap-x-space-md gap-y-2 pt-1 font-label-md text-label-md">
              <div class="flex items-center gap-1 text-amber-400">
                <span class="material-symbols-outlined text-[18px]"
                  style="font-variation-settings: &quot;FILL&quot; 1;">star</span>
                <span class="font-bold text-on-surface">5.0</span>
                <span class="text-outline font-normal">(Terverifikasi Kampus)</span>
              </div>
              <div class="w-1 h-1 rounded-full bg-outline-variant"></div>
              <span
                class="text-on-surface-variant font-medium">{{ isset($product->created_at) ? $product->created_at->diffForHumans() : 'Diposting baru saja' }}</span>
              <div class="w-1 h-1 rounded-full bg-outline-variant"></div>
              <span
                class="inline-flex items-center gap-1 px-2 py-0.5 rounded bg-tertiary-container/30 text-tertiary font-label-sm text-label-sm">
                <span class="material-symbols-outlined text-[14px]">bolt</span>
                COD Siap
              </span>
            </div>
          </div>
          <!-- Price Section -->
          <div class="p-space-md rounded-xl bg-surface-container-low flex flex-col gap-space-xs shadow-md">
            <div class="flex items-center justify-between flex-wrap gap-2">
              <span class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Harga Spesial
                Mahasiswa</span>
              <span
                class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-amber-400/10 border border-amber-400/30 text-amber-400 font-label-sm text-label-sm font-semibold">
                <span class="material-symbols-outlined text-[14px]">bolt</span>
                <span>Sisa 1 Unit (Barang Preloved)</span>
              </span>
            </div>
            <div class="flex items-baseline gap-space-sm flex-wrap">
              <span class="font-price-display text-[32px] leading-tight text-primary font-bold tracking-tight">
                Rp {{ isset($product->price) ? number_format($product->price, 0, ',', '.') : '4.224.000' }}
              </span>
              <span
                class="px-2.5 py-1 rounded-md bg-tertiary-container/30 text-tertiary font-label-sm text-label-sm font-bold">Hemat
                Ongkir COD</span>
            </div>
            <div class="flex items-center gap-2 pt-1 font-body-sm text-body-sm text-tertiary">
              <span class="material-symbols-outlined text-[16px]">savings</span>
              <span>Transaksi peer-to-peer terverifikasi sesama mahasiswa!</span>
            </div>
          </div>
          <!-- Seller Profile Card -->
          <div class="p-space-md rounded-xl bg-surface-container-low flex flex-col gap-space-sm shadow-sm">
            <div class="flex items-center justify-between">
              <div class="flex items-center gap-space-sm">
                <div class="relative">
                  <div
                    class="w-10 h-10 rounded-full overflow-hidden bg-[#5B47E0] text-white font-bold text-sm flex items-center justify-center shrink-0 border border-indigo-400/30">
                    @if($product->user && $product->user->avatar)
                      <img src="{{ asset('storage/' . $product->user->avatar) }}" class="w-full h-full object-cover"
                        alt="{{ $product->user->name }}">
                    @else
                      {{ strtoupper(substr($product->user->name ?? 'U', 0, 2)) }}
                    @endif
                  </div>
                  <span
                    class="absolute bottom-0 right-0 w-3.5 h-3.5 rounded-full bg-tertiary ring-2 ring-surface-container-low"
                    title="Sedang Online"></span>
                </div>
                <div class="flex flex-col">
                  <div class="flex items-center gap-1.5">
                    <span
                      class="font-headline-sm text-headline-sm text-on-surface">{{ $product->user->name ?? 'Fahri Dwi' }}</span>
                    <span
                      class="px-1.5 py-0.5 rounded bg-secondary-container/20 text-secondary font-label-sm text-label-sm font-bold flex items-center gap-0.5">
                      <span class="material-symbols-outlined text-[12px]">school</span> Mahasiswa
                    </span>
                  </div>
                  <span class="font-body-sm text-body-sm text-tertiary flex items-center gap-1">
                    <span class="material-symbols-outlined text-[14px]">verified</span>
                    Mahasiswa Terverifikasi Polimedia
                  </span>
                </div>
              </div>
              <span class="px-3 py-1.5 rounded-lg bg-surface-container text-on-surface font-label-sm text-label-sm">
                Penjual
              </span>
            </div>
            <div class="pt-space-xs flex flex-col gap-1.5 font-body-sm text-body-sm text-on-surface-variant">
              <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-secondary text-[16px] shrink-0">location_on</span>
                <span class="text-on-surface font-medium">Titik Temu COD:</span>
                <span class="truncate">{{ $product->cod_location ?? 'Gedung Kuliah 3 - Polimedia (Lobi Utama)' }}</span>
              </div>
              <div class="flex items-center gap-space-md text-outline font-label-sm text-label-sm pl-6">
                <span class="">⭐ Rating Penjual 5.0</span>
                <span class="">•</span>
                <span class="text-tertiary">⚡ Responsif (Sesama Mahasiswa)</span>
              </div>
            </div>
          </div>
          <!-- Handover & Delivery Option Selector -->
          <div class="flex flex-col gap-space-xs">
            <label class="font-label-md text-label-md text-on-surface font-semibold flex items-center justify-between">
              <span class="">Metode Pengambilan Barang</span>
              <span class="text-outline font-label-sm text-label-sm">Pilih 1 Opsi</span>
            </label>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-sm" id="handoverGroup">
              <!-- Option 1: Campus COD (Default Selected) -->
              <button
                class="delivery-opt p-space-sm rounded-xl bg-surface-container text-left transition-all ring-2 ring-primary-container flex flex-col justify-between gap-2 cursor-pointer shadow-sm"
                data-selected="true" onclick="selectDelivery(this)" type="button">
                <div class="flex items-start justify-between">
                  <div class="flex items-center gap-1.5 text-on-surface font-label-md text-label-md font-semibold">
                    <span class="material-symbols-outlined text-secondary text-[18px]">handshake</span>
                    <span class="">COD di Kampus</span>
                  </div>
                  <span
                    class="px-1.5 py-0.5 rounded bg-tertiary-container/30 text-tertiary font-label-sm text-label-sm font-bold">Bebas
                    Ongkir</span>
                </div>
                <p class="font-body-sm text-body-sm text-outline leading-tight">
                  Ketemuan aman di Lobi Gedung Kuliah atau Kantin Kreatif.
                </p>
              </button>
              <!-- Option 2: Antar Kos -->
              <button
                class="delivery-opt p-space-sm rounded-xl bg-surface-container-low hover:bg-surface-container text-left transition-all flex flex-col justify-between gap-2 cursor-pointer shadow-sm"
                data-selected="false" onclick="selectDelivery(this)" type="button">
                <div class="flex items-start justify-between">
                  <div class="flex items-center gap-1.5 text-on-surface font-label-md text-label-md font-semibold">
                    <span class="material-symbols-outlined text-primary text-[18px]">local_shipping</span>
                    <span class="">Antar ke Kos</span>
                  </div>
                  <span class="font-label-sm text-label-sm text-on-surface font-bold">+Rp 5.000</span>
                </div>
                <p class="font-body-sm text-body-sm text-outline leading-tight">
                  Radius maksimal 3km dari gerbang kampus via sesama mahasiswa.
                </p>
              </button>
            </div>
          </div>
          <!-- Sticky Purchase CTA Action Bar -->
          <div class="pt-space-xs flex flex-col gap-space-xs">
            <div class="flex flex-col gap-space-sm">
              <a href="{{ route('checkout.index', ['product_id' => $product->id]) }}"
                class="w-full h-12 rounded-xl bg-primary-container hover:bg-primary-container/90 active:scale-[0.99] text-on-primary-container font-headline-sm text-headline-sm font-bold flex items-center justify-center gap-2 shadow-lg shadow-primary-container/30 transition-all">
                <span class="material-symbols-outlined text-[22px]">shopping_bag</span>
                <span>Beli Sekarang</span>
              </a>
              <div class="grid grid-cols-12 gap-space-xs sm:gap-space-sm">
                <button
                  class="col-span-5 sm:col-span-6 h-11 px-space-sm rounded-xl bg-surface-container hover:bg-surface-container-high border border-outline-variant/30 text-on-surface font-label-md text-label-md font-semibold flex items-center justify-center gap-1.5 transition-colors shadow-sm"
                  onclick="triggerAction('cart')" type="button">
                  <span class="material-symbols-outlined text-[18px]">add_shopping_cart</span>
                  <span>+ Keranjang</span>
                </button>
                @if(isset($product->user->whatsapp_number) && $product->user->whatsapp_number)
                  <a href="https://wa.me/{{ preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $product->user->whatsapp_number)) }}?text={{ urlencode('Halo kak ' . $product->user->name . ', saya tertarik dengan barang ' . $product->title . ' di ugoods.') }}"
                    target="_blank"
                    class="col-span-7 sm:col-span-6 h-11 px-space-sm rounded-xl bg-surface-container hover:bg-surface-container-high border border-outline-variant/30 text-on-surface-variant hover:text-on-surface font-label-md text-label-md font-semibold flex items-center justify-center gap-1.5 transition-colors shadow-sm">
                    <span class="material-symbols-outlined text-[18px] text-tertiary">chat</span>
                    <span class="truncate">Chat WA Penjual</span>
                  </a>
                @else
                  <button
                    class="col-span-7 sm:col-span-6 h-11 px-space-sm rounded-xl bg-surface-container hover:bg-surface-container-high border border-outline-variant/30 text-on-surface-variant hover:text-on-surface font-label-md text-label-md font-semibold flex items-center justify-center gap-1.5 transition-colors shadow-sm"
                    onclick="triggerAction('chat')" type="button">
                    <span class="material-symbols-outlined text-[18px] text-primary">chat</span>
                    <span class="truncate">Chat Penjual</span>
                  </button>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Interactive Accordion / Tabbed Specifications Section -->
    <section class="w-full py-space-xl bg-surface-container-lowest">
      <div class="max-w-[1280px] mx-auto px-margin md:px-margin-desktop">
        <div class="p-space-lg rounded-xl bg-surface-container-low shadow-md">
          <!-- Tab Bar -->
          <div class="flex items-center gap-space-sm overflow-x-auto pb-space-sm mb-space-md scrollbar-none"
            id="infoTabs">
            <button
              class="tab-trigger px-space-md py-space-xs rounded-full bg-primary-container text-on-primary-container font-label-md text-label-md font-semibold whitespace-nowrap transition-colors"
              onclick="switchTab('deskripsi', this)" type="button">
              Deskripsi Produk
            </button>
            <button
              class="tab-trigger px-space-md py-space-xs rounded-full bg-surface-container text-outline hover:text-on-surface font-label-md text-label-md font-medium whitespace-nowrap transition-colors"
              onclick="switchTab('kelengkapan', this)" type="button">
              Kelengkapan Unit
            </button>
            <button
              class="tab-trigger px-space-md py-space-xs rounded-full bg-surface-container text-outline hover:text-on-surface font-label-md text-label-md font-medium whitespace-nowrap transition-colors"
              onclick="switchTab('panduan', this)" type="button">
              Panduan Aman COD Kampus
            </button>
          </div>
          <!-- Tab Content 1: Deskripsi & Spesifikasi -->
          <div class="tab-panel flex flex-col gap-space-md" id="tab-deskripsi">
            <div class="flex flex-col gap-space-xs">
              <h3 class="font-headline-sm text-headline-sm text-on-surface">Cerita &amp; Kondisi Pemakaian</h3>
              <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed whitespace-pre-line">
                {{ $product->description ?? 'Dijual kamera kesayangan Sony A6100 pemakaian kuliah semester 3-4 DKV. Shutter count tergolong sangat rendah, baru sekitar 3.200 jepretan dari batas daya tahan 200.000 jepretan. Sensor dijamin bersih kinclong tanpa jamur maupun baret, autofokus mata super cepat (real-time eye tracking), dan rekaman video 4K jernih tanpa overheating. Alasan jual: ganti gear untuk tugas akhir video cinema semester depan.' }}
              </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-space-md pt-space-xs">
              <div class="p-space-md rounded-xl bg-surface-container flex flex-col gap-space-xs">
                <span class="font-label-md text-label-md text-primary font-bold">Ringkasan Spesifikasi Teknis</span>
                <ul class="flex flex-col gap-space-xs font-body-md text-body-md text-on-surface">
                  <li class="flex items-start justify-between py-1">
                    <span class="text-outline">Sensor Kamera</span>
                    <span class="text-right font-medium">24.2 MP APS-C Exmor CMOS</span>
                  </li>
                  <li class="flex items-start justify-between py-1">
                    <span class="text-outline">Autofokus Sistem</span>
                    <span class="text-right font-medium">425 Titik Phase-Detection Eye AF</span>
                  </li>
                  <li class="flex items-start justify-between py-1">
                    <span class="text-outline">Resolusi Video</span>
                    <span class="text-right font-medium">4K HDR (24/30p) No Crop</span>
                  </li>
                  <li class="flex items-start justify-between py-1">
                    <span class="text-outline">Tipe Layar</span>
                    <span class="text-right font-medium">180° Flip Touchscreen</span>
                  </li>
                </ul>
              </div>
              <div class="p-space-md rounded-xl bg-surface-container flex flex-col gap-space-xs">
                <span class="font-label-md text-label-md text-tertiary font-bold">Catatan Kejujuran Fisik</span>
                <ul class="flex flex-col gap-space-xs font-body-md text-body-md text-on-surface-variant">
                  <li class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-tertiary text-[18px]">check</span>
                    Karet grip kencang tidak melar sama sekali.
                  </li>
                  <li class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-tertiary text-[18px]">check</span>
                    Layar sudah terpasang tempered glass sejak hari pertama beli.
                  </li>
                  <li class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-tertiary text-[18px]">check</span>
                    Tombol dan dial roda putar berfungsi 100% tactile empuk.
                  </li>
                  <li class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-outline text-[18px]">info</span>
                    Goresan mikroskopis pemakaian normal di bawah ulir tripod (tidak terlihat).
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Tab Content 2: Kelengkapan Unit -->
          <div class="tab-panel hidden flex flex-col gap-space-md" id="tab-kelengkapan">
            <h3 class="font-headline-sm text-headline-sm text-on-surface">Daftar Paket yang Didapat</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-space-sm">
              <div class="p-space-sm rounded-lg bg-surface-container flex items-center gap-space-sm">
                <span class="material-symbols-outlined text-primary text-[22px]">photo_camera</span>
                <span class="font-label-md text-label-md text-on-surface">Body Sony Alpha A6100 Black</span>
              </div>
              <div class="p-space-sm rounded-lg bg-surface-container flex items-center gap-space-sm">
                <span class="material-symbols-outlined text-primary text-[22px]">center_focus_strong</span>
                <span class="font-label-md text-label-md text-on-surface">Lensa Kit 16-50mm f/3.5-5.6 OSS</span>
              </div>
              <div class="p-space-sm rounded-lg bg-surface-container flex items-center gap-space-sm">
                <span class="material-symbols-outlined text-primary text-[22px]">battery_charging_full</span>
                <span class="font-label-md text-label-md text-on-surface">2x Baterai Original Sony NP-FW50</span>
              </div>
              <div class="p-space-sm rounded-lg bg-surface-container flex items-center gap-space-sm">
                <span class="material-symbols-outlined text-primary text-[22px]">power</span>
                <span class="font-label-md text-label-md text-on-surface">Charger Dual-Slot Eksternal USB-C</span>
              </div>
              <div class="p-space-sm rounded-lg bg-surface-container flex items-center gap-space-sm">
                <span class="material-symbols-outlined text-primary text-[22px]">style</span>
                <span class="font-label-md text-label-md text-on-surface">Strap Leher Orisinal Sony Alpha</span>
              </div>
              <div class="p-space-sm rounded-lg bg-surface-container flex items-center gap-space-sm">
                <span class="material-symbols-outlined text-primary text-[22px]">inventory_2</span>
                <span class="font-label-md text-label-md text-on-surface">Dus Box Asli, Buku Panduan, &amp; Nota</span>
              </div>
            </div>
          </div>
          <!-- Tab Content 3: Panduan Aman COD -->
          <div class="tab-panel hidden flex flex-col gap-space-sm" id="tab-panduan">
            <h3 class="font-headline-sm text-headline-sm text-on-surface">Protokol COD ugoods Polimedia</h3>
            <p class="font-body-md text-body-md text-on-surface-variant">
              Demi keselamatan bersama mahasiswa, patuhi panduan ringkas berikut:
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-space-sm pt-space-xs">
              <div class="p-space-md rounded-xl bg-surface-container flex flex-col gap-1">
                <span class="font-headline-sm text-headline-sm text-secondary">01. Lokasi Terang</span>
                <p class="font-body-sm text-body-sm text-on-surface-variant">Lakukan serah terima di titik rekomendasi:
                  Lobi Gedung Kuliah Terpadu atau Kantin Kreatif saat jam ramai kuliah.</p>
              </div>
              <div class="p-space-md rounded-xl bg-surface-container flex flex-col gap-1">
                <span class="font-headline-sm text-headline-sm text-tertiary">02. Cek Fungsi 10 Menit</span>
                <p class="font-body-sm text-body-sm text-on-surface-variant">Bawa memori card sendiri untuk tes shutter,
                  slot baterai, flash, dan hasil foto sebelum menekan tombol terima.</p>
              </div>
              <div class="p-space-md rounded-xl bg-surface-container flex flex-col gap-1">
                <span class="font-headline-sm text-headline-sm text-primary">03. Konfirmasi di Aplikasi</span>
                <p class="font-body-sm text-body-sm text-on-surface-variant">Setelah puas dengan kondisi barang, tekan
                  tombol "Konfirmasi Terima" agar dana rekber diteruskan ke penjual.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Bottom Section: Produk Serupa untuk Kebutuhan Kuliah (4-Column Grid) -->
    <section class="w-full py-space-2xl bg-background">
      <div class="max-w-[1280px] mx-auto px-margin md:px-margin-desktop flex flex-col gap-space-lg">
        <!-- Section Header -->
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-space-xs">
          <div class="flex flex-col gap-1">
            <span class="font-label-sm text-label-sm text-primary font-bold uppercase tracking-wider">Gear Pendukung
              Kreatif</span>
            <h2 class="font-headline-lg text-headline-lg text-on-surface">Produk Serupa untuk Kuliah</h2>
          </div>
          <a class="inline-flex items-center gap-1 font-label-md text-label-md text-primary hover:text-on-surface transition-colors"
            href="{{ route('categories.index', ['category' => $product->category_id]) }}">
            <span class="">Lihat Semua Produk Sejenis</span>
            <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
          </a>
        </div>
        <!-- 4-Card Responsive Grid (Dinamis dari Kategori Serupa) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-gutter-desktop">
          @forelse ($relatedProducts as $related)
            <div
              class="group relative flex flex-col rounded-xl bg-surface-container-low overflow-hidden shadow-md transition-all duration-300 hover:bg-surface-container border border-outline-variant/30">
              <div class="relative w-full aspect-square overflow-hidden bg-surface-container-lowest">
                @if ($related->image_path)
                  <img alt="{{ $related->title }}"
                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
                    src="{{ \Illuminate\Support\Str::startsWith($related->image_path, 'http') ? $related->image_path : asset('storage/' . $related->image_path) }}"
                    onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'w-full h-full flex flex-col items-center justify-center bg-surface-container-high text-primary p-3 text-center\'><span class=\'font-bold text-xl tracking-tight text-white font-display\'>u<span class=\'text-primary\'>goods</span></span><span class=\'text-[10px] text-outline mt-1\'>Preloved Kampus</span></div>';">
                @else
                  <div
                    class="w-full h-full flex flex-col items-center justify-center bg-surface-container-high text-primary p-3 text-center">
                    <span class="font-bold text-xl tracking-tight text-white font-display">u<span
                        class="text-primary">goods</span></span>
                    <span class="text-[10px] text-outline mt-1">Preloved Kampus</span>
                  </div>
                @endif

                @if($related->condition_rating)
                  <span
                    class="absolute top-3 left-3 px-2 py-0.5 rounded bg-primary-container text-on-primary-container font-label-sm text-[11px] font-bold shadow">
                    {{ $related->condition_rating }}
                  </span>
                @endif

                <div class="absolute bottom-2 left-2">
                  <span
                    class="inline-flex items-center gap-1 px-2 py-0.5 rounded bg-tertiary-container/80 backdrop-blur text-on-tertiary-container font-label-sm text-[10px]">
                    <span class="material-symbols-outlined text-[12px]">handshake</span> COD Kampus
                  </span>
                </div>
              </div>
              <div class="p-space-md flex flex-col flex-1 justify-between gap-space-sm">
                <div class="flex flex-col gap-1">
                  <div class="flex items-center gap-1 text-amber-400 font-label-sm text-xs">
                    <span class="material-symbols-outlined text-[14px]"
                      style="font-variation-settings: &quot;FILL&quot; 1;">star</span>
                    <span class="font-bold text-on-surface">5.0</span>
                    <span class="text-outline">({{ $related->user->name ?? 'Mahasiswa' }})</span>
                  </div>
                  <h3
                    class="font-headline-sm text-sm text-on-surface line-clamp-1 group-hover:text-primary transition-colors"
                    title="{{ $related->title }}">
                    <a href="{{ route('products.show', $related->slug ?? $related->id) }}">
                      {{ $related->title }}
                    </a>
                  </h3>
                  <span class="font-body-sm text-xs text-outline flex items-center gap-1 truncate">
                    <span class="material-symbols-outlined text-[13px] text-secondary">location_on</span>
                    {{ $related->cod_location ?? 'Polimedia Srengseng' }}
                  </span>
                </div>
                <div class="flex flex-col gap-space-xs pt-1">
                  <div class="flex items-baseline gap-2">
                    <span class="font-price-display text-sm text-primary font-bold">
                      Rp {{ number_format($related->price, 0, ',', '.') }}
                    </span>
                  </div>
                  <a href="{{ route('products.show', $related->slug ?? $related->id) }}"
                    class="w-full py-2 rounded-lg bg-surface-container hover:bg-primary hover:text-white text-on-surface font-label-md text-xs font-semibold transition-colors flex items-center justify-center gap-1.5 shadow-sm">
                    <span class="material-symbols-outlined text-[16px]">visibility</span>
                    <span>Lihat Detail</span>
                  </a>
                </div>
              </div>
            </div>
          @empty
            <div
              class="col-span-full py-12 px-6 rounded-2xl bg-surface-container-low text-center border border-dashed border-outline-variant/30 flex flex-col items-center justify-center">
              <span class="material-symbols-outlined text-3xl text-outline mb-2">category</span>
              <p class="text-xs text-slate-300 font-medium">Belum ada barang serupa lainnya di kategori ini.</p>
              <a href="{{ route('categories.index') }}" class="mt-3 text-xs text-primary hover:underline">Jelajahi seluruh
                kategori -></a>
            </div>
          @endforelse
        </div>
      </div>
    </section>
    <!-- Interactive Client Behavior Scripts -->

  </div>
@endsection

@push('scripts')
  <script>

    // Gallery Switcher
    function updateGallery(index, el) {
      const showcaseImg = document.getElementById('mainShowcaseImg');
      const thumbBtns = document.querySelectorAll('#thumbGallery .thumb-btn');

      thumbBtns.forEach(btn => {
        btn.classList.remove('ring-2', 'ring-primary-container');
        btn.classList.add('hover:bg-surface-container');
      });
      el.classList.add('ring-2', 'ring-primary-container');
      el.classList.remove('hover:bg-surface-container');

      // Subtle animation feedback
      showcaseImg.classList.add('opacity-70');
      setTimeout(() => {
        showcaseImg.classList.remove('opacity-70');
      }, 150);
    }

    // Delivery Option Switcher
    function selectDelivery(el) {
      const options = document.querySelectorAll('.delivery-opt');
      options.forEach(opt => {
        opt.classList.remove('ring-2', 'ring-primary-container', 'bg-surface-container');
        opt.classList.add('bg-surface-container-low');
        opt.setAttribute('data-selected', 'false');
      });
      el.classList.remove('bg-surface-container-low');
      el.classList.add('ring-2', 'ring-primary-container', 'bg-surface-container');
      el.setAttribute('data-selected', 'true');
    }

    // Tab Switcher
    function switchTab(tabId, el) {
      const triggers = document.querySelectorAll('#infoTabs .tab-trigger');
      triggers.forEach(t => {
        t.classList.remove('bg-primary-container', 'text-on-primary-container');
        t.classList.add('bg-surface-container', 'text-outline');
      });
      el.classList.remove('bg-surface-container', 'text-outline');
      el.classList.add('bg-primary-container', 'text-on-primary-container');

      const panels = document.querySelectorAll('.tab-panel');
      panels.forEach(p => p.classList.add('hidden'));
      const activePanel = document.getElementById('tab-' + tabId);
      if (activePanel) {
        activePanel.classList.remove('hidden');
      }
    }

    // Wishlist Heart Toggle
    function toggleWishlist(btn) {
      const icon = btn.querySelector('#wishlistIcon');
      const isFav = icon.getAttribute('style')?.includes("'FILL' 1");
      if (isFav) {
        icon.style.fontVariationSettings = "'FILL' 0";
        btn.classList.remove('text-error');
        btn.classList.add('text-outline');
      } else {
        icon.style.fontVariationSettings = "'FILL' 1";
        btn.classList.remove('text-outline');
        btn.classList.add('text-error');
      }
    }

    // Cart Button Feedback
    function triggerCardAdd(btn) {
      const originalText = btn.innerHTML;
      btn.innerHTML = '<span class="material-symbols-outlined text-[16px] text-tertiary">check</span><span class="text-tertiary">Ditambahkan</span>';
      btn.classList.add('bg-surface-container-highest');
      setTimeout(() => {
        btn.innerHTML = originalText;
        btn.classList.remove('bg-surface-container-highest');
      }, 1400);
    }

    function triggerAction(action) {
      if (action === 'buy') {
        alert('Menuju Checkout Rekber: Kamera Sony A6100 (COD Kampus)');
      } else if (action === 'cart') {
        alert('Produk ditambahkan ke keranjang belanja kampus!');
      } else if (action === 'chat') {
        alert('Membuka obrolan langsung dengan Fahri Dwi (Desain Grafis 22)...');
      }
    }

  </script>
@endpush