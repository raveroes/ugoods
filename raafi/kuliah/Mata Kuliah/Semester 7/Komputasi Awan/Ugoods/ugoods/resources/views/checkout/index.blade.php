@extends('layouts.app')

@section('title', 'Keranjang & Checkout - ugoods')

@section('content')
  <div class="flex flex-col w-full">
    <!-- Status & Security Sub-header Strip -->
    <section
      class="w-full bg-surface-container-lowest border-b border-surface-variant/40 py-space-sm px-margin md:px-margin-desktop">
      <div class="max-w-[1280px] mx-auto flex flex-col md:flex-row md:items-center md:justify-between gap-space-sm">
        <!-- Breadcrumb + Flow Steps -->
        <div class="flex items-center gap-space-xs flex-wrap">
          <a class="font-label-sm text-label-sm text-outline hover:text-on-surface transition-colors flex items-center gap-1"
            href="{{ url('/') }}">
            <span class="material-symbols-outlined text-[14px]">home</span>
            Beranda
          </a>
          <span class="text-outline-variant font-label-sm text-label-sm">/</span>
          <span class="font-label-sm text-label-sm text-on-surface">Keranjang &amp; Checkout</span>
          <span class="hidden sm:inline-block text-outline-variant mx-space-xs">•</span>
          <!-- Step Indicator -->
          <div class="hidden sm:flex items-center gap-space-2xs text-label-sm font-label-sm">
            <span class="px-space-xs py-0.5 rounded-full bg-primary-container text-on-primary-container font-semibold">1.
              Detail Item</span>
            <span class="text-outline">→</span>
            <span class="px-space-xs py-0.5 rounded-full bg-primary-container text-on-primary-container font-semibold">2.
              Pembayaran Midtrans</span>
            <span class="text-outline">→</span>
            <span class="text-outline-variant">3. COD Selesai</span>
          </div>
        </div>
        <!-- Campus Escrow Reassurance Badge -->
        <div
          class="flex items-center gap-space-xs self-start md:self-auto px-space-sm py-1 rounded-full bg-tertiary-container/30 border border-tertiary-fixed-dim/30">
          <span class="material-symbols-outlined text-tertiary text-[16px]">verified_user</span>
          <span class="font-label-sm text-label-sm text-tertiary font-semibold tracking-tight">Sesi Checkout Aman via
            Midtrans Gateway</span>
        </div>
      </div>
    </section>

    <!-- Checkout Grid Workspace -->
    <main class="w-full max-w-[1280px] mx-auto px-margin md:px-margin-desktop py-space-xl">
      @if(!$product)
        <!-- Empty State Container (Tampilan Saat Tidak Ada Barang / Barang Sudah Terjual) -->
        <div
          class="py-16 px-6 rounded-2xl bg-surface-container-low text-center flex flex-col items-center justify-center border border-dashed border-surface-variant/60 max-w-2xl mx-auto shadow-sm">
          <div
            class="w-16 h-16 rounded-2xl bg-surface-container-high flex items-center justify-center text-primary mb-4 shadow-sm">
            <span class="material-symbols-outlined text-4xl">shopping_bag</span>
          </div>
          <h3 class="font-headline-sm text-on-surface font-semibold text-lg">Keranjang & Sesi Checkout Kosong</h3>
          <p class="font-body-sm text-outline max-w-md mt-1 mb-6">
            Barang preloved yang kamu pilih mungkin sudah berhasil dibeli pengguna lain atau kamu belum memilih barang dari
            katalog.
          </p>
          <div class="flex items-center gap-3 flex-wrap justify-center">
            <a href="{{ route('home') }}"
              class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-primary-container text-on-primary-container font-label-md text-label-md hover:brightness-110 transition-all shadow-sm">
              <span class="material-symbols-outlined text-[18px]">storefront</span>
              <span>Jelajahi Katalog</span>
            </a>
            <a href="{{ route('orders.index') }}"
              class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-surface-container-high hover:bg-surface-bright text-on-surface font-label-md text-label-md transition-colors">
              <span class="material-symbols-outlined text-[18px]">receipt_long</span>
              <span>Riwayat Pesanan</span>
            </a>
          </div>
        </div>
      @else
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter-desktop items-start">
          <!-- LEFT COLUMN: Order Details, Delivery Selection, Notes, Payment Method -->
          <div class="lg:col-span-7 xl:col-span-8 flex flex-col gap-space-lg">
            @php
              $sellerName = $product->user->name ?? 'Penjual ugoods';
              $sellerAvatar = $product->user->avatar ?? null;
              $sellerWords = array_values(array_filter(explode(' ', trim($sellerName))));
              $sellerInitials = count($sellerWords) >= 2
                ? strtoupper(substr($sellerWords[0], 0, 1) . substr($sellerWords[1], 0, 1))
                : strtoupper(substr($sellerName, 0, 2));
              $itemPrice = (int) $product->price;
              $serviceFee = 2000;
              $totalBill = $itemPrice + $serviceFee;
              $productImg = $product->image_path
                ? (\Illuminate\Support\Str::startsWith($product->image_path, 'http') ? $product->image_path : asset('storage/' . $product->image_path))
                : null;
            @endphp

            <!-- SECTION 1: Item Pesanan (Preloved Unit Tunggal Dinamis) -->
            <section
              class="bg-surface-container-low rounded-xl border border-surface-variant/50 p-space-md md:p-space-lg shadow-sm">
              <div
                class="flex flex-col sm:flex-row sm:items-center justify-between pb-space-md border-b border-surface-variant/40 gap-space-xs">
                <div class="flex items-center gap-space-xs">
                  <span class="font-headline-sm text-headline-sm text-on-surface">Barang Preloved</span>
                  <span
                    class="px-space-xs py-0.5 bg-surface-container rounded-md font-label-sm text-label-sm text-outline">1
                    Item</span>
                </div>

                <!-- Seller Pill Badge -->
                <div
                  class="flex items-center gap-space-xs px-space-sm py-1 rounded-lg bg-surface-container border border-surface-variant/30">
                  <div
                    class="w-6 h-6 rounded-full overflow-hidden bg-primary flex items-center justify-center text-on-primary font-label-sm text-[10px] font-bold shrink-0">
                    @if($sellerAvatar)
                      <img src="{{ asset('storage/' . $sellerAvatar) }}" class="w-full h-full object-cover"
                        alt="{{ $sellerName }}">
                    @else
                      {{ $sellerInitials }}
                    @endif
                  </div>
                  <div class="flex items-center gap-1">
                    <span class="font-label-md text-label-md text-on-surface font-semibold">{{ $sellerName }}</span>
                    <span class="font-body-sm text-body-sm text-outline">(Mahasiswa)</span>
                  </div>
                  <span class="material-symbols-outlined text-tertiary text-[16px]"
                    title="Mahasiswa Terverifikasi Polimedia">verified</span>
                </div>
              </div>

              <!-- Product Item Card Row -->
              <div class="pt-space-md flex flex-col sm:flex-row items-start gap-space-md">
                <!-- Product Thumbnail -->
                <div
                  class="relative w-full sm:w-28 sm:h-28 aspect-square rounded-lg overflow-hidden bg-surface-container-highest shrink-0 border border-surface-variant/50">
                  @if ($productImg)
                    <img class="w-full h-full object-cover" src="{{ $productImg }}" alt="{{ $product->title ?? 'Barang' }}"
                      onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'w-full h-full flex flex-col items-center justify-center bg-surface-container-high text-primary p-2 text-center\'><span class=\'font-bold text-sm text-white font-display\'>u<span class=\'text-primary\'>goods</span></span></div>';">
                  @else
                    <div
                      class="w-full h-full flex flex-col items-center justify-center bg-surface-container-high text-primary p-2 text-center">
                      <span class="font-bold text-sm tracking-tight text-white font-display">u<span
                          class="text-primary">goods</span></span>
                      <span class="text-[9px] text-outline mt-0.5">Preloved</span>
                    </div>
                  @endif
                  <span
                    class="absolute top-1 left-1 px-1.5 py-0.5 bg-surface-container-lowest/80 backdrop-blur-md rounded text-[10px] font-label-sm text-tertiary font-bold tracking-wider">
                    {{ $product->condition_rating ?? '9/10 MINT' }}
                  </span>
                </div>

                <!-- Product Specs & Price -->
                <div class="flex-1 min-w-0 flex flex-col justify-between w-full">
                  <div class="flex flex-col gap-1">
                    <div class="flex items-center gap-space-xs flex-wrap">
                      <span
                        class="px-space-xs py-0.5 rounded bg-surface-container text-outline text-[11px] font-label-sm">Katalog
                        Mahasiswa</span>
                      <span class="text-tertiary font-label-sm text-label-sm flex items-center gap-0.5 font-medium">
                        <span class="material-symbols-outlined text-[13px]">bolt</span> Sisa 1 Unit (Preloved)
                      </span>
                    </div>
                    <h2 class="font-headline-sm text-headline-sm text-on-surface font-semibold truncate pt-0.5"
                      title="{{ $product->title ?? 'Barang Preloved' }}">
                      {{ $product->title ?? 'Barang Preloved Mahasiswa' }}
                    </h2>
                    <p class="font-body-sm text-body-sm text-outline-variant line-clamp-1">
                      {{ $product->description ?? 'Barang preloved terawat, siap serah terima COD di titik kampus.' }}
                    </p>
                  </div>
                  <div class="flex items-end justify-between pt-space-md sm:pt-space-sm mt-auto">
                    <div class="flex flex-col">
                      <span class="font-label-sm text-label-sm text-outline">Harga Kesepakatan Kampus</span>
                      <div class="font-price-display text-price-display text-primary font-bold tracking-tight text-xl">
                        Rp {{ number_format($itemPrice, 0, ',', '.') }}
                      </div>
                    </div>
                    <a href="{{ route('home') }}"
                      class="flex items-center gap-1 text-slate-400 hover:text-white font-label-sm text-label-sm px-space-xs py-1 rounded hover:bg-surface-container transition-colors">
                      <span class="material-symbols-outlined text-[16px]">arrow_back</span>
                      <span>Ganti Barang</span>
                    </a>
                  </div>
                </div>
              </div>
            </section>

            <!-- SECTION 2: Metode Penyerahan Barang -->
            <section
              class="bg-surface-container-low rounded-xl border border-surface-variant/50 p-space-md md:p-space-lg shadow-sm">
              <div class="flex items-center justify-between pb-space-sm">
                <div class="flex items-center gap-space-xs">
                  <span class="material-symbols-outlined text-secondary text-[20px]">directions_run</span>
                  <h3 class="font-headline-sm text-headline-sm text-on-surface">Metode Penyerahan Barang</h3>
                </div>
                <span class="font-label-sm text-label-sm text-tertiary font-medium">COD Lebih Hemat &amp; Terjamin</span>
              </div>
              <p class="font-body-sm text-body-sm text-outline pb-space-md">
                Pilih opsi serah-terima fisik unit untuk cek fisik barang secara langsung sebelum dana diteruskan ke seller.
              </p>

              <div class="grid grid-cols-1 md:grid-cols-2 gap-space-sm" id="delivery-options-group">
                <!-- Option A: COD Kampus -->
                <label
                  class="relative flex flex-col p-space-md rounded-xl border-2 border-primary-container bg-surface-container/70 cursor-pointer transition-all hover:border-primary-container shadow-sm"
                  id="label-opt-cod">
                  <div class="flex items-start justify-between gap-space-xs">
                    <div class="flex items-center gap-space-xs">
                      <input checked class="accent-primary-container w-4 h-4 mt-0.5 cursor-pointer" id="delivery_cod"
                        name="delivery_method" type="radio" value="0" onchange="updateDeliveryFee(0)">
                      <div class="flex flex-col">
                        <span class="font-label-md text-label-md text-on-surface font-bold flex items-center gap-1">📍 COD
                          di Kampus</span>
                        <span class="font-label-sm text-label-sm text-tertiary font-medium">Bebas Ongkir / Rp 0</span>
                      </div>
                    </div>
                    <span
                      class="px-2 py-0.5 rounded-full bg-tertiary/15 text-tertiary font-label-sm text-label-sm font-semibold">Gratis</span>
                  </div>
                  <div class="mt-space-sm pl-6 flex flex-col gap-1 border-t border-surface-variant/30 pt-space-xs">
                    <span class="font-body-sm text-body-sm text-on-surface-variant">
                      <span class="font-semibold text-on-surface">Titik Temu:</span>
                      {{ $product->cod_location ?? 'Lobi Utama Gedung 3 Polimedia' }}
                    </span>
                    <span class="font-label-sm text-label-sm text-outline flex items-center gap-1">
                      <span class="material-symbols-outlined text-[14px] text-secondary">schedule</span>
                      Bisa disepakati hari ini saat jeda kuliah
                    </span>
                  </div>
                </label>

                <!-- Option B: Antar ke Kos -->
                <label
                  class="relative flex flex-col p-space-md rounded-xl border border-surface-variant/40 bg-surface-container-lowest/50 cursor-pointer transition-all hover:border-outline-variant"
                  id="label-opt-kos">
                  <div class="flex items-start justify-between gap-space-xs">
                    <div class="flex items-center gap-space-xs">
                      <input class="accent-primary-container w-4 h-4 mt-0.5 cursor-pointer" id="delivery_kos"
                        name="delivery_method" type="radio" value="5000" onchange="updateDeliveryFee(5000)">
                      <div class="flex flex-col">
                        <span class="font-label-md text-label-md text-on-surface font-bold flex items-center gap-1">📦 Antar
                          Langsung ke Kos</span>
                        <span class="font-label-sm text-label-sm text-outline">Diantar oleh seller {{ $sellerName }}</span>
                      </div>
                    </div>
                    <span
                      class="px-2 py-0.5 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm font-medium">+Rp
                      5.000</span>
                  </div>
                  <div class="mt-space-sm pl-6 flex flex-col gap-1 border-t border-surface-variant/30 pt-space-xs">
                    <span class="font-body-sm text-body-sm text-on-surface-variant">Maksimal radius 3 KM dari gerbang utama
                      kampus.</span>
                    <span class="font-label-sm text-label-sm text-outline flex items-center gap-1">
                      <span class="material-symbols-outlined text-[14px]">local_shipping</span>
                      Penjadwalan langsung via chat setelah bayar
                    </span>
                  </div>
                </label>
              </div>
            </section>

            <!-- SECTION 3: Catatan untuk Penjual -->
            <section
              class="bg-surface-container-low rounded-xl border border-surface-variant/50 p-space-md md:p-space-lg shadow-sm">
              <div class="flex items-center justify-between pb-space-xs">
                <label class="font-headline-sm text-headline-sm text-on-surface flex items-center gap-space-xs"
                  for="seller-note">
                  <span class="material-symbols-outlined text-primary text-[20px]">chat_bubble</span>
                  Catatan untuk Penjual ({{ $sellerName }})
                </label>
                <span class="font-label-sm text-label-sm text-outline">Opsional</span>
              </div>
              <div class="relative mt-space-xs">
                <textarea
                  class="w-full bg-surface-container-lowest border border-surface-variant/80 rounded-xl p-space-sm font-body-sm text-body-sm text-on-surface placeholder:text-outline focus:outline-none focus:border-primary-container focus:ring-1 focus:ring-primary-container transition-all"
                  id="seller-note"
                  placeholder="Contoh: Ketemu di Lobi Gd. 3 lantai 1 pas jam istirahat kuliah (12.00 - 13.00), saya pakai jaket almamater biru navy ya bro..."
                  rows="3"></textarea>
              </div>
              <div
                class="mt-space-xs flex items-center gap-space-xs p-space-xs rounded-lg bg-surface-container/60 text-outline">
                <span class="material-symbols-outlined text-secondary text-[16px]">tips_and_updates</span>
                <span class="font-label-sm text-label-sm">
                  <span class="text-on-surface font-semibold">Tips Mahasiswa:</span> Tentukan jam luang kuliah agar
                  transaksi COD berjalan tepat waktu tanpa terburu-buru masuk kelas.
                </span>
              </div>
            </section>

            <!-- SECTION 4: Metode Pembayaran -->
            <section
              class="bg-surface-container-low rounded-xl border border-surface-variant/50 p-space-md md:p-space-lg shadow-sm">
              <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-space-sm gap-space-xs">
                <div class="flex items-center gap-space-xs">
                  <span class="material-symbols-outlined text-primary text-[20px]">account_balance_wallet</span>
                  <h3 class="font-headline-sm text-headline-sm text-on-surface">Metode Pembayaran (Midtrans Payment Gateway)
                  </h3>
                </div>
                <span class="font-label-sm text-label-sm text-tertiary flex items-center gap-1 font-semibold">
                  <span class="material-symbols-outlined text-[15px]">lock</span> Proses Otomatis &amp; Terverifikasi
                  Midtrans
                </span>
              </div>
              <p class="font-body-sm text-body-sm text-outline pb-space-md">Pembayaran diproses secara instan dan aman
                melalui Midtrans Payment Gateway berlisensi Bank Indonesia.</p>

              <div class="flex flex-col gap-space-sm" id="payment-options-group">
                <!-- QRIS Option -->
                <label
                  class="flex flex-col sm:flex-row sm:items-center justify-between p-space-md rounded-xl border-2 border-primary-container bg-surface-container/70 cursor-pointer transition-all hover:border-primary-container"
                  id="label-pay-qris">
                  <div class="flex items-start gap-space-sm">
                    <input checked class="accent-primary-container w-4 h-4 mt-1 cursor-pointer" id="pay_qris"
                      name="payment_channel" type="radio" value="qris">
                    <div class="flex flex-col">
                      <div class="flex items-center gap-space-xs">
                        <span class="font-label-md text-label-md text-on-surface font-bold">QRIS Instant Payment</span>
                        <span
                          class="px-1.5 py-0.2 rounded bg-tertiary-container text-on-tertiary-container font-label-sm text-[10px] font-bold">VERIFIKASI
                          &lt;10 DETIK</span>
                      </div>
                      <span class="font-body-sm text-body-sm text-outline">Dukung GoPay, OVO, ShopeePay, DANA, BCA Mobile,
                        Livin Mandiri, &amp; seluruh m-banking berlogo QRIS</span>
                    </div>
                  </div>
                  <div class="mt-space-xs sm:mt-0 pl-7 sm:pl-0 flex items-center gap-1 shrink-0">
                    <span
                      class="font-headline-sm text-headline-sm font-bold tracking-tighter text-on-surface border border-outline-variant px-2 py-0.5 rounded bg-surface-container-lowest">QRIS</span>
                  </div>
                </label>

                <!-- Virtual Account Option -->
                <label
                  class="flex flex-col sm:flex-row sm:items-center justify-between p-space-md rounded-xl border border-surface-variant/40 bg-surface-container-lowest/50 cursor-pointer transition-all hover:border-outline-variant"
                  id="label-pay-va">
                  <div class="flex items-start gap-space-sm">
                    <input class="accent-primary-container w-4 h-4 mt-1 cursor-pointer" id="pay_va" name="payment_channel"
                      type="radio" value="va">
                    <div class="flex flex-col">
                      <div class="flex items-center gap-space-xs">
                        <span class="font-label-md text-label-md text-on-surface font-bold">Transfer Virtual Account
                          (VA)</span>
                        <span class="text-outline font-label-sm text-[11px]">Bebas Biaya Admin Bank</span>
                      </div>
                      <span class="font-body-sm text-body-sm text-outline">Nomor rekening virtual otomatis aktif 24 jam
                        untuk pembayaran via ATM &amp; Internet Banking</span>
                    </div>
                  </div>
                  <div class="mt-space-xs sm:mt-0 pl-7 sm:pl-0 flex items-center gap-1 shrink-0 flex-wrap">
                    <span
                      class="font-label-sm text-[10px] font-bold px-1.5 py-0.5 bg-surface-container rounded border border-surface-variant text-on-surface">BCA</span>
                    <span
                      class="font-label-sm text-[10px] font-bold px-1.5 py-0.5 bg-surface-container rounded border border-surface-variant text-on-surface">MANDIRI</span>
                    <span
                      class="font-label-sm text-[10px] font-bold px-1.5 py-0.5 bg-surface-container rounded border border-surface-variant text-on-surface">BNI</span>
                    <span
                      class="font-label-sm text-[10px] font-bold px-1.5 py-0.5 bg-surface-container rounded border border-surface-variant text-on-surface">BRI</span>
                  </div>
                </label>
              </div>
            </section>
          </div>

          <!-- RIGHT COLUMN: Sticky Payment Summary & Rekber Guarantee -->
          <aside class="lg:col-span-5 xl:col-span-4 flex flex-col gap-space-md sticky top-20">
            <div
              class="bg-surface-container-low rounded-xl border border-surface-variant/60 p-space-md md:p-space-lg shadow-xl relative overflow-hidden">
              <div
                class="absolute -top-16 -right-16 w-36 h-36 bg-primary-container/20 rounded-full blur-2xl pointer-events-none">
              </div>
              <h3
                class="font-headline-sm text-headline-sm text-on-surface pb-space-md border-b border-surface-variant/40 flex items-center justify-between">
                <span>Ringkasan Pembayaran</span>
                <span class="material-symbols-outlined text-outline text-[18px]">receipt_long</span>
              </h3>

              <!-- Price Breakdown -->
              <div
                class="py-space-md flex flex-col gap-space-xs border-b border-surface-variant/40 font-body-sm text-body-sm">
                <div class="flex items-center justify-between">
                  <span class="text-outline">Harga Barang (1 Unit)</span>
                  <span class="text-on-surface font-medium font-price-display">Rp
                    {{ number_format($itemPrice, 0, ',', '.') }}</span>
                </div>
                <div class="flex items-center justify-between">
                  <div class="flex items-center gap-1">
                    <span class="text-outline">Biaya Serah-Terima</span>
                    <span class="material-symbols-outlined text-outline text-[14px]"
                      title="Ongkos kirim disesuaikan dengan pilihan metode penyerahan">info</span>
                  </div>
                  <span class="text-tertiary font-semibold font-price-display" id="summary-shipping-cost">Gratis (COD
                    Kampus)</span>
                </div>
                <div class="flex items-center justify-between">
                  <div class="flex items-center gap-1"><span class="text-outline">Biaya Layanan Penanganan</span></div>
                  <span class="text-on-surface font-medium font-price-display">Rp
                    {{ number_format($serviceFee, 0, ',', '.') }}</span>
                </div>
                <div class="hidden items-center justify-between text-tertiary" id="voucher-discount-row">
                  <span class="flex items-center gap-1">
                    <span class="material-symbols-outlined text-[14px]">local_offer</span> Potongan Kupon Mahasiswa
                  </span>
                  <span class="font-semibold font-price-display" id="voucher-discount-val">-Rp 50.000</span>
                </div>
              </div>

              <!-- Promo Input -->
              <div class="pt-space-md pb-space-sm flex flex-col gap-space-xs">
                <label class="font-label-sm text-label-sm text-outline flex items-center justify-between"
                  for="campus-voucher-input">
                  <span>Voucher Promo Mahasiswa / Maba</span>
                  <span class="text-primary hover:underline cursor-pointer" id="btn-use-maba">Gunakan MABA2025</span>
                </label>
                <div class="flex items-center gap-space-xs">
                  <div class="relative flex-1">
                    <input
                      class="w-full bg-surface-container-lowest border border-surface-variant/80 rounded-lg px-space-sm py-2 font-body-sm text-body-sm uppercase tracking-wider text-on-surface placeholder:text-outline focus:outline-none focus:border-primary-container"
                      id="campus-voucher-input" placeholder="KODE KAMPUS / BEM" type="text">
                  </div>
                  <button
                    class="px-space-md py-2 rounded-lg bg-surface-container hover:bg-surface-container-high border border-surface-variant text-on-surface font-label-md text-label-md transition-colors whitespace-nowrap"
                    id="btn-apply-voucher" type="button">
                    Terapkan
                  </button>
                </div>
                <p class="text-[11px] font-label-sm hidden" id="voucher-message"></p>
              </div>

              <!-- Total Bill -->
              <div class="pt-space-md border-t border-surface-variant/40 flex items-baseline justify-between">
                <div class="flex flex-col">
                  <span class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Total Tagihan</span>
                  <span class="font-label-sm text-label-sm text-tertiary">Diproses via Midtrans Gateway</span>
                </div>
                <div class="text-right">
                  <span class="font-display-hero text-[28px] leading-tight text-primary font-bold tracking-tight"
                    id="summary-total-price">
                    Rp {{ number_format($totalBill, 0, ',', '.') }}
                  </span>
                </div>
              </div>

              <!-- Main CTA Payment Action Button -->
              <div class="mt-space-lg flex flex-col gap-space-xs">
                <button
                  class="w-full py-3.5 px-space-lg rounded-xl bg-primary-container hover:bg-inverse-primary text-on-primary font-label-md text-label-md font-bold flex items-center justify-center gap-space-xs shadow-lg shadow-primary-container/25 transition-all transform active:scale-[0.99]"
                  id="btn-submit-order" type="button">
                  <span class="material-symbols-outlined text-[18px]">lock</span>
                  <span id="btn-action-label">Bayar Sekarang via Midtrans Snap</span>
                </button>
                <p class="text-center font-label-sm text-label-sm text-outline pt-1">
                  Dengan melanjutkan, kamu setuju dengan <a class="text-on-surface hover:underline" href="#">Ketentuan
                    Transaksi Kampus</a>.
                </p>
              </div>

              <!-- Rekber Protection Highlight -->
              <div
                class="mt-space-lg p-space-sm rounded-xl bg-surface-container border border-surface-variant/40 flex flex-col gap-space-xs">
                <div class="flex items-center gap-space-xs text-tertiary font-label-md text-label-md font-bold">
                  <span class="material-symbols-outlined text-[18px]">gavel</span> Jaminan Transaksi Aman Midtrans
                </div>
                <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                  Transaksi Anda diproses melalui gerbang pembayaran resmi Midtrans dengan enkripsi perbankan 256-bit SSL,
                  verifikasi instan otomatis, dan perlindungan komunitas mahasiswa kampus.
                </p>
                <div
                  class="pt-space-2xs flex flex-col gap-1 border-t border-surface-variant/30 font-label-sm text-label-sm text-outline">
                  <div class="flex items-center gap-1.5 text-on-surface-variant">
                    <span class="material-symbols-outlined text-tertiary text-[14px]">check_circle</span>
                    <span>Enkripsi Keamanan 256-bit SSL Bank-Grade</span>
                  </div>
                  <div class="flex items-center gap-1.5 text-on-surface-variant">
                    <span class="material-symbols-outlined text-tertiary text-[14px]">check_circle</span>
                    <span>Verifikasi Otomatis Seketika (QRIS &amp; Virtual Account)</span>
                  </div>
                  <div class="flex items-center gap-1.5 text-on-surface-variant">
                    <span class="material-symbols-outlined text-tertiary text-[14px]">check_circle</span>
                    <span>Dukungan Satgas &amp; Komunitas Mahasiswa Terverifikasi</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Help Desk Card -->
            <div
              class="px-space-md py-space-sm rounded-xl bg-surface-container-lowest border border-surface-variant/30 flex items-center justify-between text-outline">
              <div class="flex items-center gap-space-xs">
                <span class="material-symbols-outlined text-secondary text-[20px]">support_agent</span>
                <div class="flex flex-col">
                  <span class="font-label-md text-label-md text-on-surface">Butuh bantuan mendadak?</span>
                  <span class="font-body-sm text-body-sm">Admin BEM / Kampus standby di Gedung Kuliah</span>
                </div>
              </div>
              <a class="font-label-sm text-label-sm text-secondary hover:underline font-semibold" href="#">Chat Bantuan</a>
            </div>
          </aside>
        </div>
      @endif
    </main>
  </div>
@endsection

@push('scripts')
  @if($product)
    <!-- Script SDK Midtrans Snap Sandbox -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

    <script>
      let basePrice = {{ $itemPrice }};
      let serviceFee = {{ $serviceFee }};
      let deliveryFee = 0;

      function formatRupiah(num) {
        return 'Rp ' + num.toLocaleString('id-ID');
      }

      function updateDeliveryFee(fee) {
        deliveryFee = fee;
        const shippingLabel = document.getElementById('summary-shipping-cost');
        if (shippingLabel) {
          shippingLabel.textContent = fee === 0 ? 'Gratis (COD Kampus)' : formatRupiah(fee);
        }
        const totalLabel = document.getElementById('summary-total-price');
        if (totalLabel) {
          totalLabel.textContent = formatRupiah(basePrice + serviceFee + deliveryFee);
        }

        const optCod = document.getElementById('label-opt-cod');
        const optKos = document.getElementById('label-opt-kos');
        if (fee === 0) {
          if (optCod) optCod.className = 'relative flex flex-col p-space-md rounded-xl border-2 border-primary-container bg-surface-container/70 cursor-pointer transition-all hover:border-primary-container shadow-sm';
          if (optKos) optKos.className = 'relative flex flex-col p-space-md rounded-xl border border-surface-variant/40 bg-surface-container-lowest/50 cursor-pointer transition-all hover:border-outline-variant';
        } else {
          if (optKos) optKos.className = 'relative flex flex-col p-space-md rounded-xl border-2 border-primary-container bg-surface-container/70 cursor-pointer transition-all hover:border-primary-container shadow-sm';
          if (optCod) optCod.className = 'relative flex flex-col p-space-md rounded-xl border border-surface-variant/40 bg-surface-container-lowest/50 cursor-pointer transition-all hover:border-outline-variant';
        }
      }

      // Handler Klik Tombol Bayar Sekarang
      document.getElementById('btn-submit-order')?.addEventListener('click', function (e) {
        e.preventDefault();

        const selectedDelivery = document.querySelector('input[name="delivery_method"]:checked')?.value || 0;
        const sellerNote = document.getElementById('seller-note')?.value || '';
        const productId = {{ $product->id ?? 0 }};

        fetch("{{ route('orders.store') }}", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
          },
          body: JSON.stringify({
            product_id: productId,
            delivery_method: selectedDelivery,
            notes: sellerNote
          })
        })
          .then(response => response.json())
          .then(data => {
            if (data.status === 'success') {
              // Memunculkan Pop-up Midtrans Snap
              window.snap.pay(data.snap_token, {
                onSuccess: function (result) {
                  window.location.href = "/orders/" + data.order_id;
                },
                onPending: function (result) {
                  window.location.href = "/orders/" + data.order_id;
                },
                onError: function (result) {
                  alert("Pembayaran gagal!");
                },
                onClose: function () {
                  window.location.href = "/orders/" + data.order_id;
                }
              });
            } else {
              alert("Gagal memproses pesanan: " + (data.message || 'Terjadi kesalahan.'));
            }
          })
          .catch(error => {
            console.error('Error:', error);
            alert("Terjadi kesalahan sistem saat membuat transaksi.");
          });
      });
    </script>
  @endif
@endpush