@extends('layouts.app', ['noNavbar' => true, 'noFooter' => true])

@section('title', 'Masuk Akun Mahasiswa - ugoods')

@section('content')
    <div class="min-h-screen flex flex-col justify-between bg-[#FAF8FF] font-body-md text-[#1A0D3F] antialiased">
        <!-- Streamlined Auth Header -->
        <header class="w-full bg-white/90 backdrop-blur-xl border-b border-[#E4DCFA] sticky top-0 z-30 shadow-xs">
            <div class="h-16 max-w-7xl mx-auto px-4 md:px-6 lg:px-8 flex items-center justify-between">
                <a class="flex items-center gap-2 group" href="{{ url('/') }}">
                    <span class="text-2xl font-black tracking-tight font-headline-sm">
                        <span class="text-[#1A0D3F] font-bold">u<span class="text-[#5B47E0]">goods</span></span>
                    </span>
                </a>
                <a class="flex items-center gap-1.5 text-[#4A3B75] hover:text-[#5B47E0] font-semibold text-sm transition-colors"
                    href="{{ url('/') }}">
                    <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                    <span>Kembali ke Beranda</span>
                </a>
            </div>
        </header>

        <!-- Main Auth Container -->
        <main
            class="flex-1 flex flex-col items-center justify-center w-full px-4 md:px-6 lg:px-8 py-8 md:py-12 relative overflow-hidden">
            <!-- Ambient Luminous Glow Orbs -->
            <div
                class="absolute top-1/4 -left-20 w-80 h-80 bg-purple-200/30 rounded-full blur-[110px] pointer-events-none -z-10">
            </div>
            <div
                class="absolute bottom-10 right-0 w-96 h-96 bg-pink-200/20 rounded-full blur-[130px] pointer-events-none -z-10">
            </div>

            <div class="w-full max-w-7xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                    <!-- LEFT COLUMN: Brand Proposition & Campus Community Proof -->
                    <section class="lg:col-span-6 flex flex-col justify-center space-y-6 pr-0 lg:pr-6">
                        <!-- Live Campus Chip -->
                        <div
                            class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#D1FAE5] border border-[#A7F3D0] text-[#065F46] w-fit shadow-xs">
                            <span class="relative flex h-2 w-2">
                                <span
                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-500 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-600"></span>
                            </span>
                            <span class="font-bold text-xs tracking-wide uppercase">Kampus Terhubung • Polimedia Hub</span>
                        </div>

                        <!-- Headline & Impact Statement -->
                        <div class="space-y-3">
                            <h1 class="text-3xl lg:text-4xl font-extrabold text-[#1A0D3F] tracking-tight leading-tight">
                                Platform Jual Beli <span
                                    class="text-transparent bg-clip-text bg-gradient-to-r from-[#5B47E0] via-[#8B5CF6] to-[#EC4899]">Preloved</span>
                                Khusus Mahasiswa Kampus
                            </h1>
                            <p class="text-base text-[#4A3B75] max-w-xl leading-relaxed">
                                Beli kebutuhan kuliah hemat hingga 70% atau ubah barang studio &amp; buku tak terpakai jadi
                                uang saku aman via Midtrans &amp; COD Lobi Kampus.
                            </p>
                        </div>

                        <!-- 3 Feature Advantage Tiles -->
                        <div class="grid grid-cols-1 gap-3.5">
                            <!-- Card 1 -->
                            <div
                                class="group flex items-start gap-4 p-4 rounded-2xl bg-white border border-[#E4DCFA] hover:border-[#C4B5FD] transition-all shadow-sm shadow-purple-100/50">
                                <div
                                    class="w-11 h-11 shrink-0 rounded-xl bg-purple-50 border border-purple-200 flex items-center justify-center text-[#5B47E0] group-hover:bg-[#5B47E0] group-hover:text-white transition-colors">
                                    <span class="material-symbols-outlined text-[24px]">school</span>
                                </div>
                                <div class="space-y-1 min-w-0">
                                    <div class="flex items-center gap-2">
                                        <span class="font-bold text-base text-[#1A0D3F]">Verifikasi KTM Mahasiswa</span>
                                        <span
                                            class="px-2 py-0.5 rounded-full text-[10px] bg-purple-100 text-[#5B47E0] font-bold">Eksklusif</span>
                                    </div>
                                    <p class="text-xs sm:text-sm text-[#4A3B75] leading-relaxed">Cukup unggah foto KTM aktif
                                        untuk mendapatkan status mahasiswa terverifikasi.</p>
                                </div>
                            </div>

                            <!-- Card 2 -->
                            <div
                                class="group flex items-start gap-4 p-4 rounded-2xl bg-white border border-[#E4DCFA] hover:border-[#C4B5FD] transition-all shadow-sm shadow-purple-100/50">
                                <div
                                    class="w-11 h-11 shrink-0 rounded-xl bg-emerald-50 border border-emerald-200 flex items-center justify-center text-[#059669] group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                                    <span class="material-symbols-outlined text-[24px]">place</span>
                                </div>
                                <div class="space-y-1 min-w-0">
                                    <div class="flex items-center gap-2">
                                        <span class="font-bold text-base text-[#1A0D3F]">Titik Temu COD Kampus Aman</span>
                                        <span
                                            class="px-2 py-0.5 rounded-full text-[10px] bg-emerald-100 text-emerald-800 font-bold">Rp0
                                            Ongkir</span>
                                    </div>
                                    <p class="text-xs sm:text-sm text-[#4A3B75] leading-relaxed">
                                        Janji temu praktis di Lobi Gedung Kuliah, Kantin Terpadu, atau Selasar Lab Grafika
                                        tanpa biaya pengiriman tambahan.
                                    </p>
                                </div>
                            </div>

                            <!-- Card 3 -->
                            <div
                                class="group flex items-start gap-4 p-4 rounded-2xl bg-white border border-[#E4DCFA] hover:border-[#C4B5FD] transition-all shadow-sm shadow-purple-100/50">
                                <div
                                    class="w-11 h-11 shrink-0 rounded-xl bg-sky-50 border border-sky-200 flex items-center justify-center text-[#0284C7] group-hover:bg-[#0284C7] group-hover:text-white transition-colors">
                                    <span class="material-symbols-outlined text-[24px]">bolt</span>
                                </div>
                                <div class="space-y-1 min-w-0">
                                    <div class="flex items-center gap-2">
                                        <span class="font-bold text-base text-[#1A0D3F]">Escrow &amp; Transaksi
                                            Otomatis</span>
                                        <span
                                            class="px-2 py-0.5 rounded-full text-[10px] bg-sky-100 text-sky-800 font-bold">QRIS
                                            / VA</span>
                                    </div>
                                    <p class="text-xs sm:text-sm text-[#4A3B75] leading-relaxed">
                                        Pembayaran dilindungi Midtrans Escrow berlisensi BI. Saldo baru cair ke penjual
                                        setelah kamu menerima dan mengonfirmasi barang.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Social Proof Pill with Member Avatars -->
                        <div
                            class="flex flex-col sm:flex-row items-start sm:items-center gap-4 p-4 rounded-2xl bg-white border border-[#E4DCFA] shadow-sm shadow-purple-100/50">
                            <div class="flex -space-x-3 shrink-0">
                                <div
                                    class="w-9 h-9 rounded-full bg-[#5B47E0] text-white flex items-center justify-center font-bold text-xs shadow-xs">
                                    MR</div>
                                <div
                                    class="w-9 h-9 rounded-full bg-[#0284C7] text-white flex items-center justify-center font-bold text-xs shadow-xs">
                                    SN</div>
                                <div
                                    class="w-9 h-9 rounded-full bg-emerald-600 text-white flex items-center justify-center font-bold text-xs shadow-xs">
                                    FA</div>
                                <div
                                    class="w-9 h-9 rounded-full bg-[#F5F3FF] border border-[#E4DCFA] text-[#5B47E0] flex items-center justify-center font-bold text-xs shadow-xs">
                                    +1k</div>
                            </div>
                            <div class="space-y-0.5">
                                <div class="flex items-center gap-1.5">
                                    <span class="font-bold text-sm text-[#1A0D3F]">1.400+ Mahasiswa Bergabung</span>
                                    <span class="material-symbols-outlined text-emerald-600 text-[16px]"
                                        style="font-variation-settings: 'FILL' 1;">verified</span>
                                </div>
                                <p class="text-xs text-[#7E70A6]">
                                    Polimedia Jakarta, Srengseng Sawah, &amp; jejaring kampus Jabodetabek.
                                </p>
                            </div>
                        </div>
                    </section>

                    <!-- RIGHT COLUMN: Unified Auth Box -->
                    <section class="lg:col-span-6 w-full">
                        <div
                            class="relative rounded-3xl bg-white p-6 md:p-8 shadow-xl shadow-purple-900/10 overflow-hidden border border-[#E4DCFA]">
                            <!-- Top subtle gradient highlight bar -->
                            <div
                                class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-[#5B47E0] via-[#8B5CF6] to-[#EC4899]">
                            </div>

                            <!-- Segmented Tab Switcher -->
                            <div
                                class="w-full p-1.5 bg-[#FAF8FF] border border-[#E4DCFA] rounded-2xl flex items-center gap-1.5 mb-6 shadow-2xs">
                                <a href="{{ url('/login') }}"
                                    class="flex-1 py-2.5 rounded-xl font-bold text-sm bg-[#5B47E0] text-white shadow-md shadow-[#5B47E0]/30 transition-all flex items-center justify-center gap-2"
                                    id="tab-login">
                                    <span class="material-symbols-outlined text-[18px]">login</span>
                                    <span>Masuk Akun</span>
                                </a>
                                <a href="{{ url('/register') }}"
                                    class="flex-1 py-2.5 rounded-xl font-bold text-sm bg-transparent text-[#4A3B75] hover:text-[#5B47E0] hover:bg-white/60 transition-all flex items-center justify-center gap-2"
                                    id="tab-register">
                                    <span class="material-symbols-outlined text-[18px]">person_add</span>
                                    <span>Daftar Akun Baru</span>
                                </a>
                            </div>

                            <!-- Card Header -->
                            <div class="space-y-1 mb-6">
                                <div class="flex items-center justify-between">
                                    <h2 class="text-xl sm:text-2xl font-bold text-[#1A0D3F]" id="form-heading">
                                        Selamat Datang di ugoods
                                    </h2>
                                    <span class="material-symbols-outlined text-[#5B47E0] text-[28px]">token</span>
                                </div>
                                <p class="text-xs sm:text-sm text-[#4A3B75]" id="form-subheading">
                                    Gunakan kredensial email/NIM kampus aktif kamu untuk masuk ke akun.
                                </p>
                            </div>

                            <!-- LOGIN FORM -->
                            <form method="POST" action="{{ route('login.store') }}" class="space-y-4">
                                @csrf

                                @if ($errors->any())
                                    <div
                                        class="p-3.5 rounded-xl bg-rose-50 border border-rose-200 text-rose-700 text-xs flex items-start gap-2.5">
                                        <span
                                            class="material-symbols-outlined text-[18px] shrink-0 mt-0.5 text-rose-600">error</span>
                                        <div class="space-y-0.5">
                                            @foreach ($errors->all() as $error)
                                                <p class="font-medium">{{ $error }}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if (session('success'))
                                    <div
                                        class="p-3.5 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs flex items-start gap-2.5">
                                        <span
                                            class="material-symbols-outlined text-[18px] shrink-0 mt-0.5 text-emerald-600">check_circle</span>
                                        <p class="font-medium">{{ session('success') }}</p>
                                    </div>
                                @endif

                                <!-- Input: Campus Identifier -->
                                <div class="space-y-1.5">
                                    <div class="flex justify-between items-center">
                                        <label class="text-sm font-semibold text-[#1A0D3F]" for="login-id">Email / NIM
                                            Kampus</label>
                                        <span class="text-xs text-emerald-700 font-semibold flex items-center gap-0.5">
                                            <span class="material-symbols-outlined text-[14px]">shield</span> Terenkripsi
                                        </span>
                                    </div>
                                    <div class="relative flex items-center">
                                        <div class="absolute left-3.5 flex items-center pointer-events-none text-[#7E70A6]">
                                            <span class="material-symbols-outlined text-[18px]">badge</span>
                                        </div>
                                        <input name="email" value="{{ old('email') }}"
                                            class="w-full h-11 pl-11 pr-4 rounded-xl border border-[#E4DCFA] bg-[#FAF8FF] text-[#1A0D3F] placeholder-[#7E70A6] text-sm font-medium focus:outline-none focus:bg-white focus:border-[#5B47E0] focus:ring-2 focus:ring-[#5B47E0]/20 transition-all shadow-2xs"
                                            id="login-id" placeholder="Masukkan email kampus (e.g. user@gmail.com)" required
                                            type="text">
                                    </div>
                                    <p class="text-xs text-[#7E70A6] flex items-center gap-1">
                                        <span
                                            class="material-symbols-outlined text-[14px] text-emerald-600">check_circle</span>
                                        Gunakan email terdaftar atau nomor telepon aktif.
                                    </p>
                                </div>

                                <!-- Input: Password -->
                                <div class="space-y-1.5">
                                    <div class="flex justify-between items-center">
                                        <label class="text-sm font-semibold text-[#1A0D3F]" for="login-password">Kata Sandi
                                            (Password)</label>
                                        <a class="text-xs font-semibold text-[#5B47E0] hover:text-[#4A35D0] transition-colors"
                                            href="#">Lupa Password?</a>
                                    </div>
                                    <div class="relative flex items-center">
                                        <div class="absolute left-3.5 flex items-center pointer-events-none text-[#7E70A6]">
                                            <span class="material-symbols-outlined text-[18px]">lock</span>
                                        </div>
                                        <input name="password"
                                            class="w-full h-11 pl-11 pr-11 rounded-xl border border-[#E4DCFA] bg-[#FAF8FF] text-[#1A0D3F] placeholder-[#7E70A6] text-sm font-medium focus:outline-none focus:bg-white focus:border-[#5B47E0] focus:ring-2 focus:ring-[#5B47E0]/20 transition-all shadow-2xs tracking-widest"
                                            id="login-password" placeholder="••••••••••••" required type="password">
                                        <button aria-label="Tampilkan kata sandi"
                                            class="absolute right-3.5 flex items-center text-[#7E70A6] hover:text-[#1A0D3F] transition-colors"
                                            onclick="togglePasswordVisibility('login-password', this)" type="button">
                                            <span class="material-symbols-outlined text-[18px]">visibility</span>
                                        </button>
                                    </div>
                                </div>

                                <!-- Row: Remember Session -->
                                <div class="flex items-center justify-between pt-1">
                                    <label class="flex items-center gap-2 cursor-pointer select-none">
                                        <input name="remember" checked=""
                                            class="w-4 h-4 rounded border-[#D6C7FF] text-[#5B47E0] accent-[#5B47E0] focus:ring-[#5B47E0] cursor-pointer"
                                            type="checkbox">
                                        <span class="text-xs sm:text-sm text-[#4A3B75] font-medium">Ingat sesi di perangkat
                                            lab/kampus ini</span>
                                    </label>
                                </div>

                                <!-- Submit Action Button -->
                                <button
                                    class="w-full h-12 rounded-xl bg-[#5B47E0] hover:bg-[#4A35D0] text-white font-bold text-base shadow-lg shadow-[#5B47E0]/30 transition-all duration-200 flex items-center justify-center gap-2 active:scale-[0.99] cursor-pointer"
                                    type="submit">
                                    <span>Masuk Sekarang</span>
                                    <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
                                </button>
                            </form>

                            <!-- Card Security Footnote -->
                            <div
                                class="mt-6 pt-4 -mx-6 md:-mx-8 -mb-6 md:-mb-8 p-4 md:p-6 bg-[#FAF8FF] rounded-b-3xl flex items-center gap-3 border-t border-[#E4DCFA]">
                                <span
                                    class="material-symbols-outlined text-emerald-600 text-[22px] shrink-0">verified_user</span>
                                <p class="text-xs text-[#4A3B75] leading-snug">
                                    <span class="font-bold text-[#1A0D3F]">Akses Terbatas Kampus:</span> Penjualan barang
                                    khusus bagi mahasiswa aktif dengan KTM terverifikasi. Anti penipuan &amp; bebas calo.
                                </p>
                            </div>
                        </div>

                        <!-- Quick Back Navigation -->
                        <div class="mt-4 text-center">
                            <a class="inline-flex items-center gap-1.5 text-xs sm:text-sm text-[#4A3B75] hover:text-[#5B47E0] font-medium transition-colors"
                                href="{{ url('/') }}">
                                <span class="material-symbols-outlined text-[16px]">arrow_back</span>
                                <span>Kembali ke Katalog Beranda ugoods tanpa masuk</span>
                            </a>
                        </div>
                    </section>
                </div>
            </div>
        </main>

        <!-- Auth Simple Footer -->
        <footer class="w-full bg-white/80 backdrop-blur-xl py-4 border-t border-[#E4DCFA]">
            <div
                class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-2">
                <div class="flex items-center gap-2">
                    <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                    <span class="text-xs text-[#7E70A6] font-medium">ugoods verified campus secure authentication</span>
                </div>
                <span class="text-xs text-[#7E70A6]">© 2025 ugoods Indonesia. Hak cipta dilindungi.</span>
            </div>
        </footer>
    </div>
@endsection

@push('scripts')
    <script>
        function togglePasswordVisibility(inputId, btn) {
            const input = document.getElementById(inputId);
            const icon = btn.querySelector('.material-symbols-outlined');
            if (input.type === 'password') {
                input.type = 'text';
                icon.textContent = 'visibility_off';
            } else {
                input.type = 'password';
                icon.textContent = 'visibility';
            }
        }
    </script>
@endpush