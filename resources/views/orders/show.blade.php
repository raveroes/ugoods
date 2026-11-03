@extends('layouts.app')

@section('title', 'Status Pesanan #' . ($order->order_number ?? 'UGD-' . ($order->id ?? '0')) . ' - ugoods')

@section('content')
  @php
    $orderNum = $order->order_number ?? ('UGD-' . time());
    $status = $order->payment_status ?? 'pending';
    $isPaid = ($status == 'settlement' || $status == 'success');

    $product = $order->product ?? null;
    $seller = $product->user ?? null;
    $buyer = $order->user ?? Auth::user();

    $productTitle = $product->title ?? 'Barang Preloved Mahasiswa';
    $productPrice = $product ? (int) $product->price : 0;
    $shippingCost = (int) ($order->shipping_cost ?? 0);
    $serviceFee = 2000;
    $totalAmount = $order->total_price ?? ($productPrice + $shippingCost + $serviceFee);

    $productImg = ($product && $product->image_path)
      ? (\Illuminate\Support\Str::startsWith($product->image_path, 'http') ? $product->image_path : asset('storage/' . $product->image_path))
      : null;

    $sellerName = $seller->name ?? 'Mahasiswa ugoods';
    $sellerAvatar = $seller->avatar ?? null;
    $sellerPhone = $seller->phone ?? $seller->whatsapp_number ?? '6281234567890';
  @endphp

  <div class="flex flex-col w-full">
    <section
      class="w-full max-w-[1280px] mx-auto px-margin md:px-margin-tablet lg:px-margin-desktop py-space-md md:py-space-lg">

      <!-- Top Breadcrumb & Progress Header -->
      <div class="flex flex-col md:flex-row md:items-center justify-between gap-space-md mb-space-lg">
        <div class="flex items-center gap-space-xs text-on-surface-variant font-label-md text-label-md">
          <a class="hover:text-on-surface transition-colors" href="{{ url('/') }}">Beranda</a>
          <span class="material-symbols-outlined text-outline text-[14px]">chevron_right</span>
          <a class="hover:text-on-surface transition-colors" href="{{ route('orders.index') }}">Riwayat Pesanan</a>
          <span class="material-symbols-outlined text-outline text-[14px]">chevron_right</span>
          <span class="text-on-surface font-semibold">Status Pesanan (#{{ $orderNum }})</span>
        </div>

        <!-- Campus Live Badge -->
        <div
          class="inline-flex items-center gap-space-xs px-space-sm py-space-2xs rounded-full bg-surface-container-high text-secondary text-label-sm font-label-sm self-start md:self-auto">
          <span class="w-2 h-2 rounded-full bg-secondary animate-ping"></span>
          <span>Titik COD: {{ $product->cod_location ?? 'Lobi Utama Gedung 3 Polimedia' }}</span>
        </div>
      </div>

      <!-- Stepper Indicator Card -->
      <div
        class="w-full bg-surface-container-low rounded-xl p-space-md md:p-space-lg mb-space-xl border border-surface-variant/40">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-space-md md:gap-space-lg relative">

          <!-- Step 1 (Completed) -->
          <div class="flex items-center gap-space-sm">
            <div
              class="w-9 h-9 rounded-full bg-tertiary-container flex items-center justify-center text-on-tertiary-container shrink-0">
              <span class="material-symbols-outlined text-[18px]">check</span>
            </div>
            <div class="min-w-0">
              <p class="font-label-sm text-label-sm text-tertiary uppercase tracking-wider">Langkah 1</p>
              <p class="font-headline-sm text-headline-sm text-on-surface truncate">Rincian &amp; Titik COD</p>
            </div>
          </div>

          <!-- Step 2 (Midtrans Payment Status) -->
          <div class="flex items-center gap-space-sm p-space-xs md:p-0 rounded-lg bg-surface-container md:bg-transparent">
            <div
              class="relative w-9 h-9 rounded-full {{ $isPaid ? 'bg-tertiary-container text-on-tertiary-container' : 'bg-primary-container text-on-primary-container' }} flex items-center justify-center shrink-0">
              <span class="material-symbols-outlined text-[18px]">{{ $isPaid ? 'check' : 'payments' }}</span>
              @if(!$isPaid)
                <span
                  class="absolute -top-0.5 -right-0.5 w-3 h-3 rounded-full bg-warning border-2 border-surface-container-low animate-pulse"></span>
              @endif
            </div>
            <div class="min-w-0">
              <p
                class="font-label-sm text-label-sm {{ $isPaid ? 'text-tertiary' : 'text-primary' }} uppercase tracking-wider font-semibold">
                Langkah 2 • {{ $isPaid ? 'Lunas' : 'Menunggu Bayar' }}
              </p>
              <p class="font-headline-sm text-headline-sm text-on-surface truncate">Pembayaran Midtrans</p>
            </div>
          </div>

          <!-- Step 3 (Serah Terima) -->
          <div class="flex items-center gap-space-sm {{ $isPaid ? '' : 'opacity-60' }}">
            <div
              class="w-9 h-9 rounded-full {{ $isPaid ? 'bg-primary-container text-on-primary-container' : 'bg-surface-container-high text-outline' }} flex items-center justify-center shrink-0">
              <span class="material-symbols-outlined text-[18px]">handshake</span>
            </div>
            <div class="min-w-0">
              <p
                class="font-label-sm text-label-sm {{ $isPaid ? 'text-primary font-semibold' : 'text-outline' }} uppercase tracking-wider">
                Langkah 3</p>
              <p
                class="font-headline-sm text-headline-sm {{ $isPaid ? 'text-on-surface' : 'text-on-surface-variant' }} truncate">
                Serah Terima &amp; Selesai</p>
            </div>
          </div>

        </div>
      </div>

      <!-- Centered Order Status & Midtrans Interface Container -->
      <div class="max-w-3xl mx-auto flex flex-col gap-space-lg">

        <!-- Status Banner -->
        <div
          class="relative overflow-hidden bg-surface-container-low rounded-xl p-space-lg md:p-space-xl border border-surface-variant/40">
          <div
            class="absolute -right-16 -top-16 w-56 h-56 bg-primary-container/10 rounded-full blur-3xl pointer-events-none">
          </div>

          <div class="relative flex flex-col md:flex-row md:items-center justify-between gap-space-md">
            <div class="flex flex-col gap-space-xs">
              <div
                class="inline-flex items-center gap-space-xs px-space-sm py-space-2xs rounded-full {{ $isPaid ? 'bg-tertiary-container/30 text-tertiary' : 'bg-warning-container/30 text-warning' }} self-start font-semibold text-xs">
                <span class="material-symbols-outlined text-[16px]">{{ $isPaid ? 'verified' : 'schedule' }}</span>
                <span>{{ $isPaid ? 'Pembayaran Lunas (Settlement)' : 'Menunggu Pembayaran Midtrans' }}</span>
              </div>
              <p class="font-label-sm text-label-sm text-on-surface-variant">
                Order ID: <span class="font-mono text-on-surface font-semibold">#{{ $orderNum }}</span> •
                {{ $order->created_at ? $order->created_at->format('d M Y, H:i') : 'Terbaru' }} WIB
              </p>
              <div class="flex items-center gap-space-xs pt-space-xs">
                <span class="material-symbols-outlined text-tertiary text-[16px]">verified_user</span>
                <span class="font-label-sm text-label-sm text-tertiary font-medium">Transaksi Terverifikasi Otomatis oleh
                  Midtrans Gateway</span>
              </div>
            </div>

            <!-- Total Amount Card -->
            <div
              class="flex flex-col items-start md:items-end gap-1 bg-surface-container px-space-md py-space-sm rounded-xl">
              <span class="font-label-sm text-label-sm text-on-surface-variant">Total Tagihan</span>
              <span class="font-price-display text-headline-md text-primary font-bold">
                Rp {{ number_format($totalAmount, 0, ',', '.') }}
              </span>
            </div>
          </div>
        </div>

        <!-- MIDTRANS ACTION BANNER (Skenario B: Manual Klik Bayar via Snap) -->
        @if(!$isPaid)
          <div
            class="bg-surface-container-low rounded-xl p-space-lg border border-warning/30 flex flex-col items-center text-center gap-space-md">
            <div class="w-12 h-12 rounded-full bg-warning-container/30 text-warning flex items-center justify-center">
              <span class="material-symbols-outlined text-2xl">pending_actions</span>
            </div>
            <div class="space-y-1">
              <h3 class="font-headline-sm text-on-surface font-bold text-base">Selesaikan Pembayaran Anda</h3>
              <p class="font-body-sm text-on-surface-variant max-w-md">
                Silakan lakukan pembayaran instan menggunakan QRIS atau Virtual Account pilihanmu via Midtrans Snap.
              </p>
            </div>
            <button id="btn-pay-snap" type="button"
              class="px-8 py-3.5 rounded-xl bg-primary text-on-primary font-bold text-sm shadow-lg shadow-primary/20 hover:brightness-110 transition-all flex items-center gap-2 cursor-pointer">
              <span class="material-symbols-outlined text-[18px]">lock</span>
              <span>Bayar Sekarang via Midtrans Snap</span>
            </button>
          </div>
        @else
          <div
            class="bg-tertiary-container/20 rounded-xl p-space-lg border border-tertiary/30 flex flex-col items-center text-center gap-space-xs">
            <span class="material-symbols-outlined text-4xl text-tertiary">task_alt</span>
            <h3 class="font-headline-sm text-on-surface font-bold text-base">Pembayaran Berhasil!</h3>
            <p class="font-body-sm text-on-surface-variant max-w-md">
              Dana Anda telah diamankan oleh sistem ugoods. Silakan temui penjual di titik COD untuk melakukan serah-terima
              unit.
            </p>
          </div>
        @endif

        <!-- Campus Order Summary Detail Box -->
        <div
          class="bg-surface-container-low rounded-xl p-space-md md:p-space-lg flex flex-col gap-space-md border border-surface-variant/40">
          <div class="flex items-center justify-between pb-space-xs">
            <div class="flex items-center gap-space-xs">
              <span class="material-symbols-outlined text-primary text-[20px]">inventory_2</span>
              <h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Ringkasan Pesanan Kampus</h3>
            </div>
            <span
              class="font-label-sm text-label-sm text-tertiary bg-surface-container-highest px-space-sm py-space-2xs rounded-full">Preloved
              Terverifikasi</span>
          </div>

          <!-- Product Row -->
          <div
            class="flex flex-col sm:flex-row items-start sm:items-center gap-space-md bg-surface-container p-space-sm rounded-xl">
            <div
              class="relative w-20 h-20 rounded-lg overflow-hidden shrink-0 bg-surface-container-highest border border-surface-variant/30">
              @if($productImg)
                <img class="w-full h-full object-cover" src="{{ $productImg }}" alt="{{ $productTitle }}">
              @else
                <div class="w-full h-full flex items-center justify-center text-outline text-xs">No Image</div>
              @endif
            </div>

            <div class="flex-1 min-w-0">
              <h4 class="font-label-md text-label-md text-on-surface font-semibold truncate">{{ $productTitle }}</h4>
              <div class="flex items-center gap-space-xs pt-0.5">
                <span class="material-symbols-outlined text-secondary text-[14px]">person</span>
                <p class="font-body-sm text-body-sm text-on-surface-variant truncate">Penjual: {{ $sellerName }}</p>
              </div>
              <p class="font-price-display text-price-display text-primary font-bold pt-1">
                Rp {{ number_format($productPrice, 0, ',', '.') }}
              </p>
            </div>
          </div>

          <!-- Campus Delivery / COD Plan Row -->
          <div
            class="bg-surface-container-lowest p-space-md rounded-xl flex flex-col gap-space-xs border border-surface-variant/30">
            <div class="flex items-center gap-space-xs text-secondary font-label-md text-label-md font-semibold">
              <span class="material-symbols-outlined text-[18px]">location_on</span>
              <span>Titik Temu COD Kampus</span>
            </div>
            <p class="font-body-sm text-body-sm text-on-surface font-medium pl-6">
              {{ $product->cod_location ?? 'Lobi Utama Gedung Kuliah Terpadu 3 Polimedia' }}
            </p>
            @if($order->notes)
              <div class="pl-6 pt-space-2xs">
                <div
                  class="p-space-xs rounded-lg bg-surface-container-high text-outline font-body-sm text-body-sm flex items-start gap-space-xs">
                  <span class="material-symbols-outlined text-outline text-[16px] shrink-0 mt-0.5">chat_bubble</span>
                  <span><strong class="text-on-surface-variant">Catatan Penyerahan:</strong> "{{ $order->notes }}"</span>
                </div>
              </div>
            @endif
          </div>

          <!-- Price Breakdown -->
          <div
            class="flex flex-col gap-space-xs pt-space-xs text-on-surface-variant font-body-sm text-body-sm border-t border-surface-variant/30">
            <div class="flex items-center justify-between">
              <span>Harga Barang (Preloved)</span>
              <span class="text-on-surface font-medium">Rp {{ number_format($productPrice, 0, ',', '.') }}</span>
            </div>
            <div class="flex items-center justify-between">
              <span>Biaya Serah-Terima / Ongkir</span>
              <span
                class="text-tertiary font-semibold">{{ $shippingCost == 0 ? 'GRATIS (COD)' : 'Rp ' . number_format($shippingCost, 0, ',', '.') }}</span>
            </div>
            <div class="flex items-center justify-between">
              <span>Biaya Layanan Penanganan</span>
              <span class="text-on-surface font-medium">Rp {{ number_format($serviceFee, 0, ',', '.') }}</span>
            </div>
            <div
              class="flex items-center justify-between pt-space-xs text-on-surface font-headline-sm text-headline-sm border-t border-surface-variant/20">
              <span>Total Tagihan</span>
              <span class="text-primary font-bold">Rp {{ number_format($totalAmount, 0, ',', '.') }}</span>
            </div>
          </div>
        </div>

        <!-- 3-Step Campus Guide Cards -->
        <div
          class="bg-surface-container-low rounded-xl p-space-md md:p-space-lg flex flex-col gap-space-md border border-surface-variant/40">
          <h4 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Tahap Selanjutnya Setelah Pembayaran
          </h4>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-space-sm">
            <div class="bg-surface-container p-space-md rounded-xl flex flex-col gap-space-xs">
              <div
                class="w-7 h-7 rounded-full bg-primary-container/30 text-primary flex items-center justify-center font-bold text-label-md">
                1</div>
              <h5 class="font-label-md text-label-md text-on-surface font-semibold">Bayar via Midtrans</h5>
              <p class="font-body-sm text-body-sm text-on-surface-variant">Gunakan Snap QRIS / Virtual Account instan.</p>
            </div>
            <div class="bg-surface-container p-space-md rounded-xl flex flex-col gap-space-xs">
              <div
                class="w-7 h-7 rounded-full bg-tertiary-container/30 text-tertiary flex items-center justify-center font-bold text-label-md">
                2</div>
              <h5 class="font-label-md text-label-md text-on-surface font-semibold">Verifikasi Otomatis</h5>
              <p class="font-body-sm text-body-sm text-on-surface-variant">Sistem mengonfirmasi dana dalam &lt;10 detik.
              </p>
            </div>
            <div class="bg-surface-container p-space-md rounded-xl flex flex-col gap-space-xs">
              <div
                class="w-7 h-7 rounded-full bg-secondary-container/30 text-secondary flex items-center justify-center font-bold text-label-md">
                3</div>
              <h5 class="font-label-md text-label-md text-on-surface font-semibold">COD Aman Kampus</h5>
              <p class="font-body-sm text-body-sm text-on-surface-variant">Temui {{ $sellerName }} di titik COD untuk cek
                barang langsung.</p>
            </div>
          </div>
        </div>

        <!-- Action Buttons Grid -->
        <div class="flex flex-col gap-space-sm pt-space-xs pb-space-xl">
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-sm">
            <a class="h-11 px-space-md rounded-xl bg-tertiary-container text-on-tertiary-container font-label-md text-label-md font-semibold flex items-center justify-center gap-space-xs transition-colors hover:brightness-110"
              href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $sellerPhone) }}" target="_blank">
              <span class="material-symbols-outlined text-[18px]">chat</span>
              <span>Chat Penjual ({{ $sellerName }})</span>
            </a>
            <a class="h-11 px-space-md rounded-xl bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md font-medium flex items-center justify-center gap-space-xs transition-colors"
              href="{{ route('orders.index') }}">
              <span class="material-symbols-outlined text-[18px]">receipt_long</span>
              <span>Ke Riwayat Pesanan</span>
            </a>
          </div>
          <div class="flex items-center justify-center pt-space-xs">
            <a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors flex items-center gap-1"
              href="{{ url('/') }}">
              <span class="material-symbols-outlined text-[16px]">arrow_back</span>
              <span>Kembali ke Beranda ugoods</span>
            </a>
          </div>
        </div>

      </div>
    </section>
  </div>
@endsection

@push('scripts')
  @if(!$isPaid && $order->snap_token)
    <!-- Script SDK Midtrans Snap Sandbox -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script>
      document.getElementById('btn-pay-snap')?.addEventListener('click', function () {
        window.snap.pay("{{ $order->snap_token }}", {
          onSuccess: function (result) {
            window.location.reload();
          },
          onPending: function (result) {
            window.location.reload();
          },
          onError: function (result) {
            alert("Pembayaran gagal!");
          },
          onClose: function () {
            console.log('Pop-up Midtrans ditutup pengguna');
          }
        });
      });
    </script>
  @endif
@endpush