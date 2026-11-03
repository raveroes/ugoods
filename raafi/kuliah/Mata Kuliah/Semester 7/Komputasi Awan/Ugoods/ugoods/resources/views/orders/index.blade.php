@extends('layouts.app')

@section('title', 'Riwayat Pesanan - ugoods')

@section('content')
    <div class="flex flex-col w-full">
        <div class="max-w-[1280px] mx-auto w-full py-space-xl px-margin md:px-margin-desktop space-y-space-lg">

            <!-- Header Page -->
            <div
                class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-xs pb-space-sm border-b border-surface-variant/30">
                <div>
                    <h1 class="font-headline-lg text-headline-md sm:text-headline-lg text-on-surface font-bold">
                        Riwayat Pesanan & Transaksi
                    </h1>
                    <p class="font-body-md text-body-md text-on-surface-variant mt-1">
                        Pantau status pembayaran, serah terima COD, dan invoice transaksi kampusmu.
                    </p>
                </div>
                <a href="{{ route('home') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-surface-container-high hover:bg-surface-bright text-on-surface font-label-md text-label-md transition-colors self-start sm:self-auto">
                    <span class="material-symbols-outlined text-[18px]">storefront</span>
                    <span>Jelajahi Katalog</span>
                </a>
            </div>

            @php
                // Pengecekan aman keberadaan model Order & pencarian data transaksi user
                if (class_exists(\App\Models\Order::class)) {
                    $orders = \App\Models\Order::where('user_id', Auth::id())
                        ->orWhereHas('product', function ($q) {
                            $q->where('user_id', Auth::id());
                        })
                        ->with(['product', 'user', 'product.user'])
                        ->latest()
                        ->get();
                } else {
                    $orders = collect();
                }
            @endphp

            @if($orders->isEmpty())
                <div
                    class="py-16 px-6 rounded-2xl bg-surface-container-low text-center flex flex-col items-center justify-center border border-dashed border-outline-variant/30">
                    <div
                        class="w-14 h-14 rounded-2xl bg-surface-container-high flex items-center justify-center text-primary mb-3 shadow-sm">
                        <span class="material-symbols-outlined text-3xl">receipt_long</span>
                    </div>
                    <h3 class="font-headline-sm text-on-surface font-semibold text-base">Belum Ada Riwayat Pesanan</h3>
                    <p class="font-body-sm text-on-surface-variant max-w-md mt-1 mb-5">
                        Kamu belum memiliki transaksi aktif maupun selesai. Yuk cari perlengkapan kuliah preloved di ugoods!
                    </p>
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center gap-1.5 px-5 py-2.5 rounded-xl bg-primary-container text-on-primary-container font-label-md text-label-md hover:brightness-110 transition-all shadow-sm">
                        <span>Mulai Belanja</span>
                    </a>
                </div>
            @else
                <div class="space-y-space-md">
                    @foreach($orders as $order)
                        @php
                            $isBuyer = $order->user_id == Auth::id();
                            $partner = $isBuyer ? ($order->product->user ?? null) : $order->user;
                            $partnerName = $partner->name ?? 'Mahasiswa ugoods';
                            $partnerAvatar = $partner->avatar ?? null;
                            $partnerInitials = strtoupper(substr($partnerName, 0, 2));
                        @endphp
                        <div
                            class="bg-surface-container-low rounded-xl border border-surface-variant/40 p-space-md sm:p-space-lg shadow-sm hover:border-primary-container/30 transition-all flex flex-col gap-space-md">

                            <!-- Top Bar Order Header -->
                            <div
                                class="flex flex-wrap items-center justify-between gap-space-xs pb-space-xs border-b border-surface-variant/30 text-xs">
                                <div class="flex items-center gap-space-xs flex-wrap">
                                    <span
                                        class="font-mono font-bold text-on-surface">#{{ $order->order_number ?? 'UGD-' . $order->id }}</span>
                                    <span class="text-outline">•</span>
                                    <span
                                        class="text-on-surface-variant">{{ $order->created_at ? $order->created_at->format('d M Y, H:i') : 'Terbaru' }}</span>
                                    <span
                                        class="px-2 py-0.5 rounded-full text-[10px] font-bold tracking-wider uppercase bg-surface-container text-primary border border-primary-container/30">
                                        {{ $isBuyer ? 'Pembelian' : 'Penjualan' }}
                                    </span>
                                </div>

                                <!-- Status Badge -->
                                <div>
                                    @if(($order->payment_status ?? 'pending') == 'settlement' || ($order->payment_status ?? 'pending') == 'success')
                                        <span
                                            class="px-2.5 py-1 rounded-full bg-tertiary-container/30 text-tertiary text-xs font-semibold flex items-center gap-1">
                                            <span class="material-symbols-outlined text-[14px]">check_circle</span> Pembayaran Lunas
                                        </span>
                                    @elseif(($order->payment_status ?? 'pending') == 'pending')
                                        <span
                                            class="px-2.5 py-1 rounded-full bg-warning-container/30 text-warning text-xs font-semibold flex items-center gap-1">
                                            <span class="material-symbols-outlined text-[14px]">schedule</span> Menunggu Pembayaran
                                        </span>
                                    @else
                                        <span
                                            class="px-2.5 py-1 rounded-full bg-error-container/30 text-error text-xs font-semibold flex items-center gap-1">
                                            <span class="material-symbols-outlined text-[14px]">cancel</span>
                                            {{ ucfirst($order->payment_status ?? 'Batal') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Content Details Row -->
                            <div class="flex flex-col sm:flex-row items-start justify-between gap-space-md">
                                <div class="flex items-start gap-space-md min-w-0">
                                    <!-- Thumbnail Produk -->
                                    <div
                                        class="w-16 h-16 rounded-lg overflow-hidden bg-surface-container-highest shrink-0 border border-surface-variant/30">
                                        @if($order->product && $order->product->image_path)
                                            <img src="{{ \Illuminate\Support\Str::startsWith($order->product->image_path, 'http') ? $order->product->image_path : asset('storage/' . $order->product->image_path) }}"
                                                class="w-full h-full object-cover" alt="Barang">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-outline text-xs">No Image</div>
                                        @endif
                                    </div>

                                    <div class="space-y-1 min-w-0">
                                        <h3 class="font-headline-sm text-sm text-on-surface font-semibold truncate">
                                            {{ $order->product->title ?? 'Barang Preloved' }}
                                        </h3>
                                        
                                        <!-- Info Mitra Transaksi + Avatar Dinamis -->
                                        <div class="flex items-center gap-1.5 font-body-sm text-xs text-outline">
                                            <span class="text-secondary font-medium">{{ $isBuyer ? 'Penjual:' : 'Pembeli:' }}</span>
                                            <div class="w-4 h-4 rounded-full overflow-hidden bg-primary text-on-primary font-bold text-[9px] flex items-center justify-center shrink-0">
                                                @if($partnerAvatar)
                                                    <img src="{{ asset('storage/' . $partnerAvatar) }}" class="w-full h-full object-cover" alt="{{ $partnerName }}">
                                                @else
                                                    {{ $partnerInitials }}
                                                @endif
                                            </div>
                                            <span class="text-on-surface font-medium truncate">{{ $partnerName }}</span>
                                        </div>

                                        <p class="font-body-sm text-xs text-outline flex items-center gap-1">
                                            <span class="material-symbols-outlined text-[14px] text-primary">location_on</span>
                                            <span>COD: {{ $order->product->cod_location ?? 'Kampus Polimedia' }}</span>
                                        </p>
                                    </div>
                                </div>

                                <!-- Price & Action Button -->
                                <div
                                    class="flex flex-row sm:flex-col items-end justify-between w-full sm:w-auto pt-space-xs sm:pt-0 border-t sm:border-t-0 border-surface-variant/20 gap-2">
                                    <div class="text-left sm:text-right">
                                        <span class="text-[11px] text-outline block">Total Tagihan</span>
                                        <span class="font-price-display text-primary font-bold text-base">
                                            Rp {{ number_format($order->total_price ?? ($order->product->price ?? 0) + 2000, 0, ',', '.') }}
                                        </span>
                                    </div>
                                    <a href="{{ route('orders.show', $order->id) }}"
                                        class="px-3.5 py-1.5 rounded-lg bg-primary-container hover:bg-primary-container/80 text-on-primary-container font-label-md text-xs font-semibold transition-all">
                                        Detail & Instruksi
                                    </a>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
@endsection