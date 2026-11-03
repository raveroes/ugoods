@extends('layouts.app')

@section('title', 'Riwayat Pesanan - ugoods')

@section('content')
    <div class="flex flex-col w-full">
        <div class="max-w-[1280px] mx-auto w-full py-8 px-4 md:px-8 space-y-6">

            <!-- Header Page -->
            <div
                class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-4 border-b border-[#E4DCFA]">
                <div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-[#1A0D3F] tracking-tight">
                        Riwayat Pesanan & Transaksi
                    </h1>
                    <p class="text-sm sm:text-base text-[#4A3B75] mt-1">
                        Pantau status pembayaran, serah terima COD, dan invoice transaksi kampusmu.
                    </p>
                </div>
                <a href="{{ route('home') }}"
                    class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-white border border-[#E4DCFA] hover:bg-[#F3EFFF] text-[#5B47E0] font-semibold text-sm transition-all shadow-xs self-start sm:self-auto">
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
                    class="py-16 px-6 rounded-2xl bg-white text-center flex flex-col items-center justify-center border border-dashed border-[#D6C7FF] shadow-sm shadow-purple-100/50">
                    <div
                        class="w-14 h-14 rounded-2xl bg-[#F6F3FE] border border-[#E9E3FB] flex items-center justify-center text-[#5B47E0] mb-3 shadow-xs">
                        <span class="material-symbols-outlined text-3xl">receipt_long</span>
                    </div>
                    <h3 class="font-bold text-[#1A0D3F] text-lg">Belum Ada Riwayat Pesanan</h3>
                    <p class="text-sm text-[#4A3B75] max-w-md mt-1 mb-5 leading-relaxed">
                        Kamu belum memiliki transaksi aktif maupun selesai. Yuk cari perlengkapan kuliah preloved di ugoods!
                    </p>
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-[#5B47E0] text-white font-semibold text-sm hover:bg-[#4A35D0] transition-all shadow-md shadow-[#5B47E0]/25">
                        <span class="material-symbols-outlined text-[18px]">shopping_bag</span>
                        <span>Mulai Belanja</span>
                    </a>
                </div>
            @else
                <div class="space-y-4">
                    @foreach($orders as $order)
                        @php
                            $isBuyer = $order->user_id == Auth::id();
                            $partner = $isBuyer ? ($order->product->user ?? null) : $order->user;
                            $partnerName = $partner->name ?? 'Mahasiswa ugoods';
                            $partnerAvatar = $partner->avatar ?? null;
                            $partnerInitials = strtoupper(substr($partnerName, 0, 2));
                        @endphp
                        <div
                            class="bg-white rounded-2xl border border-[#E4DCFA] p-5 sm:p-6 shadow-sm shadow-purple-100/50 hover:border-[#C4B5FD] transition-all flex flex-col gap-4">

                            <!-- Top Bar Order Header -->
                            <div
                                class="flex flex-wrap items-center justify-between gap-2 pb-3 border-b border-[#F0EBFD] text-xs">
                                <div class="flex items-center gap-2 flex-wrap">
                                    <span
                                        class="font-mono font-bold text-[#1A0D3F]">#{{ $order->order_number ?? 'UGD-' . $order->id }}</span>
                                    <span class="text-[#D6C7FF]">•</span>
                                    <span
                                        class="text-[#4A3B75] font-medium">{{ $order->created_at ? $order->created_at->format('d M Y, H:i') : 'Terbaru' }}</span>
                                    <span
                                        class="px-2.5 py-0.5 rounded-full text-[10px] font-bold tracking-wider uppercase bg-[#F5F3FF] text-[#5B47E0] border border-[#D6C7FF]">
                                        {{ $isBuyer ? 'Pembelian' : 'Penjualan' }}
                                    </span>
                                </div>

                                <!-- Status Badge -->
                                <div>
                                    @if(($order->payment_status ?? 'pending') == 'settlement' || ($order->payment_status ?? 'pending') == 'success')
                                        <span
                                            class="px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-semibold flex items-center gap-1.5">
                                            <span class="material-symbols-outlined text-[15px]">check_circle</span> Pembayaran Lunas
                                        </span>
                                    @elseif(($order->payment_status ?? 'pending') == 'pending')
                                        <span
                                            class="px-3 py-1 rounded-full bg-amber-50 text-amber-800 border border-amber-200 text-xs font-semibold flex items-center gap-1.5">
                                            <span class="material-symbols-outlined text-[15px]">schedule</span> Menunggu Pembayaran
                                        </span>
                                    @else
                                        <span
                                            class="px-3 py-1 rounded-full bg-rose-50 text-rose-700 border border-rose-200 text-xs font-semibold flex items-center gap-1.5">
                                            <span class="material-symbols-outlined text-[15px]">cancel</span>
                                            {{ ucfirst($order->payment_status ?? 'Batal') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Content Details Row -->
                            <div class="flex flex-col sm:flex-row items-start justify-between gap-4">
                                <div class="flex items-start gap-4 min-w-0">
                                    <!-- Thumbnail Produk -->
                                    <div
                                        class="w-16 h-16 rounded-xl overflow-hidden bg-[#F6F3FE] shrink-0 border border-[#E9E3FB]">
                                        @if($order->product && $order->product->image_path)
                                            <img src="{{ \Illuminate\Support\Str::startsWith($order->product->image_path, 'http') ? $order->product->image_path : asset('storage/' . $order->product->image_path) }}"
                                                class="w-full h-full object-cover" alt="Barang">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-[#7E70A6] text-xs">No Image</div>
                                        @endif
                                    </div>

                                    <div class="space-y-1.5 min-w-0">
                                        <h3 class="text-base text-[#1A0D3F] font-bold truncate">
                                            {{ $order->product->title ?? 'Barang Preloved' }}
                                        </h3>
                                        
                                        <!-- Info Mitra Transaksi + Avatar Dinamis -->
                                        <div class="flex items-center gap-1.5 text-xs text-[#7E70A6]">
                                            <span class="text-[#5B47E0] font-semibold">{{ $isBuyer ? 'Penjual:' : 'Pembeli:' }}</span>
                                            <div class="w-4 h-4 rounded-full overflow-hidden bg-[#5B47E0] text-white font-bold text-[9px] flex items-center justify-center shrink-0">
                                                @if($partnerAvatar)
                                                    <img src="{{ asset('storage/' . $partnerAvatar) }}" class="w-full h-full object-cover" alt="{{ $partnerName }}">
                                                @else
                                                    {{ $partnerInitials }}
                                                @endif
                                            </div>
                                            <span class="text-[#1A0D3F] font-semibold truncate">{{ $partnerName }}</span>
                                        </div>

                                        <p class="text-xs text-[#7E70A6] flex items-center gap-1">
                                            <span class="material-symbols-outlined text-[14px] text-[#5B47E0]">location_on</span>
                                            <span>COD: {{ $order->product->cod_location ?? 'Kampus Polimedia' }}</span>
                                        </p>
                                    </div>
                                </div>

                                <!-- Price & Action Button -->
                                <div
                                    class="flex flex-row sm:flex-col items-end justify-between w-full sm:w-auto pt-3 sm:pt-0 border-t sm:border-t-0 border-[#F0EBFD] gap-2.5">
                                    <div class="text-left sm:text-right">
                                        <span class="text-[11px] text-[#7E70A6] font-medium block">Total Tagihan</span>
                                        <span class="text-[#5B47E0] font-bold text-base sm:text-lg">
                                            Rp {{ number_format($order->total_price ?? ($order->product->price ?? 0) + 2000, 0, ',', '.') }}
                                        </span>
                                    </div>
                                    <a href="{{ route('orders.show', $order->id) }}"
                                        class="px-4 py-2 rounded-xl bg-[#5B47E0] hover:bg-[#4A35D0] text-white text-xs sm:text-sm font-semibold transition-all shadow-xs">
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
