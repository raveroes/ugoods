@extends('layouts.app', ['noNavbar' => true, 'noFooter' => true])

@section('title', 'Masuk Akun Mahasiswa - ugoods')

@section('content')
<div class="min-h-screen flex flex-col justify-between bg-surface-container-lowest font-body-md text-on-surface antialiased">
    <!-- Streamlined Auth Header -->
    <header class="w-full bg-surface-container-lowest/90 backdrop-blur-xl border-b border-[#1E293B]">
        <div class="h-16 max-w-7xl mx-auto px-margin md:px-margin-tablet lg:px-margin-desktop flex items-center justify-between">
            <a class="flex items-center gap-space-xs group" href="{{ url('/') }}">
                <span class="text-2xl font-black tracking-tight font-headline-sm">
                    <span class="text-[#5B47E0]">u</span><span class="text-white">goods</span>
                </span>
            </a>
            <a class="flex items-center gap-space-xs text-on-surface-variant hover:text-on-surface font-body-sm text-body-sm transition-colors" href="{{ url('/') }}">
                <span class="material-symbols-outlined text-[16px]">arrow_back</span>
                <span>Kembali ke Beranda</span>
            </a>
        </div>
    </header>

    <!-- Main Auth Container -->
    <main class="flex-1 flex flex-col items-center justify-center w-full px-margin md:px-margin-tablet lg:px-margin-desktop py-space-xl">
        <div class="w-full max-w-7xl mx-auto py-space-md lg:py-space-xl">
            <!-- Ambient Luminous Glow Orbs -->
            <div class="absolute top-1/4 -left-20 w-80 h-80 bg-primary-container/20 rounded-full blur-[110px] pointer-events-none -z-10"></div>
            <div class="absolute bottom-10 right-0 w-96 h-96 bg-secondary-container/15 rounded-full blur-[130px] pointer-events-none -z-10"></div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg lg:gap-space-2xl items-center">
                <!-- LEFT COLUMN: Brand Proposition & Campus Community Proof -->
                <section class="lg:col-span-6 flex flex-col justify-center space-y-space-lg lg:space-y-space-xl pr-0 lg:pr-space-md">
                    <!-- Live Campus Chip -->
                    <div class="inline-flex items-center gap-space-sm px-space-md py-space-xs rounded-full bg-surface-container-high w-fit shadow-sm">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-tertiary opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-tertiary"></span>
                        </span>
                        <span class="font-label-sm text-label-sm text-tertiary-fixed tracking-wide uppercase">Kampus Terhubung • Polimedia Hub</span>
                    </div>

                    <!-- Headline & Impact Statement -->
                    <div class="space-y-space-sm">
                        <h1 class="font-headline-lg text-headline-lg lg:font-display-hero lg:text-display-hero text-on-surface tracking-tight">
                            Platform Jual Beli Preloved Khusus <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary via-primary-fixed to-secondary">Mahasiswa Kampus</span>
                        </h1>
                        <p class="font-body-lg text-body-lg text-on-surface-variant max-w-xl leading-relaxed">
                            Beli kebutuhan kuliah hemat hingga 70% atau ubah barang studio &amp; buku tak terpakai jadi uang saku aman via Midtrans &amp; COD Lobi Kampus.
                        </p>
                    </div>

                    <!-- 3 Feature Advantage Tiles -->
                    <div class="grid grid-cols-1 gap-space-md">
                        <!-- Card 1 -->
                        <div class="group flex items-start gap-space-md p-space-md rounded-xl bg-surface-container-low hover:bg-surface-container transition-colors shadow-sm">
                            <div class="w-11 h-11 shrink-0 rounded-lg bg-surface-container-highest flex items-center justify-center text-primary group-hover:bg-primary-container group-hover:text-on-primary-container transition-colors">
                                <span class="material-symbols-outlined text-[24px]">school</span>
                            </div>
                            <div class="space-y-space-2xs min-w-0">
                                <div class="flex items-center gap-space-xs">
                                    <span class="font-headline-sm text-headline-sm text-on-surface">Verifikasi KTM Mahasiswa</span>
                                    <span class="px-space-xs py-0.5 rounded text-[10px] bg-secondary/15 text-secondary font-label-sm">Eksklusif</span>
                                </div>
                                <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">Cukup unggah foto KTM aktif untuk mendapatkan status mahasiswa terverifikasi.</p>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="group flex items-start gap-space-md p-space-md rounded-xl bg-surface-container-low hover:bg-surface-container transition-colors shadow-sm">
                            <div class="w-11 h-11 shrink-0 rounded-lg bg-surface-container-highest flex items-center justify-center text-tertiary group-hover:bg-tertiary-container group-hover:text-on-tertiary-container transition-colors">
                                <span class="material-symbols-outlined text-[24px]">place</span>
                            </div>
                            <div class="space-y-space-2xs min-w-0">
                                <div class="flex items-center gap-space-xs">
                                    <span class="font-headline-sm text-headline-sm text-on-surface">Titik Temu COD Kampus Aman</span>
                                    <span class="px-space-xs py-0.5 rounded text-[10px] bg-tertiary/15 text-tertiary font-label-sm">Rp0 Ongkir</span>
                                </div>
                                <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                                    Janji temu praktis di Lobi Gedung Kuliah, Kantin Terpadu, atau Selasar Lab Grafika tanpa biaya pengiriman tambahan.
                                </p>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="group flex items-start gap-space-md p-space-md rounded-xl bg-surface-container-low hover:bg-surface-container transition-colors shadow-sm">
                            <div class="w-11 h-11 shrink-0 rounded-lg bg-surface-container-highest flex items-center justify-center text-secondary group-hover:bg-secondary-container group-hover:text-on-secondary-container transition-colors">
                                <span class="material-symbols-outlined text-[24px]">bolt</span>
                            </div>
                            <div class="space-y-space-2xs min-w-0">
                                <div class="flex items-center gap-space-xs">
                                    <span class="font-headline-sm text-headline-sm text-on-surface">Escrow &amp; Transaksi Otomatis</span>
                                    <span class="px-space-xs py-0.5 rounded text-[10px] bg-primary/15 text-primary-fixed font-label-sm">QRIS / VA</span>
                                </div>
                                <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                                    Pembayaran dilindungi Midtrans Escrow berlisensi BI. Saldo baru cair ke penjual setelah kamu menerima dan mengonfirmasi barang.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Social Proof Pill with Member Avatars -->
                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-space-md p-space-md rounded-xl bg-surface-container shadow-md">
                        <div class="flex -space-x-3 shrink-0">
                            <div class="w-9 h-9 rounded-full bg-primary-container flex items-center justify-center text-on-primary font-headline-sm text-[13px] shadow">MR</div>
                            <div class="w-9 h-9 rounded-full bg-secondary-container flex items-center justify-center text-on-secondary font-headline-sm text-[13px] shadow">SN</div>
                            <div class="w-9 h-9 rounded-full bg-tertiary-container flex items-center justify-center text-on-tertiary font-headline-sm text-[13px] shadow">FA</div>
                            <div class="w-9 h-9 rounded-full bg-surface-bright flex items-center justify-center text-primary font-headline-sm text-[12px] shadow">+1k</div>
                        </div>
                        <div class="space-y-0.5">
                            <div class="flex items-center gap-1">
                                <span class="font-label-md text-label-md text-on-surface">1.400+ Mahasiswa Bergabung</span>
                                <span class="material-symbols-outlined text-tertiary text-[16px]" style="font-variation-settings: 'FILL' 1;">verified</span>
                            </div>
                            <p class="font-body-sm text-body-sm text-on-surface-variant">
                                Polimedia Jakarta, Srengseng Sawah, &amp; jejaring kampus Jabodetabek.
                            </p>
                        </div>
                    </div>
                </section>

                <!-- RIGHT COLUMN: Unified Auth Box -->
                <section class="lg:col-span-6 w-full">
                    <div class="relative rounded-2xl bg-surface-container-low p-space-lg lg:p-space-xl shadow-2xl overflow-hidden border border-[#1E293B]">
                        <!-- Top subtle glow highlight bar -->
                        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-primary to-transparent opacity-75"></div>

                        <!-- Segmented Tab Switcher -->
                        <div class="w-full p-1 bg-surface-container-lowest rounded-xl flex items-center mb-space-lg shadow-inner">
                            <a href="{{ url('/login') }}" class="flex-1 py-2.5 rounded-lg font-headline-sm text-headline-sm text-on-surface bg-primary-container text-on-primary-container transition-all flex items-center justify-center gap-space-xs shadow-md" id="tab-login">
                                <span class="material-symbols-outlined text-[18px]">login</span>
                                <span>Masuk Akun</span>
                            </a>
                            <a href="{{ url('/register') }}" class="flex-1 py-2.5 rounded-lg font-headline-sm text-headline-sm text-on-surface-variant hover:text-on-surface transition-all flex items-center justify-center gap-space-xs" id="tab-register">
                                <span class="material-symbols-outlined text-[18px]">person_add</span>
                                <span>Daftar Akun Baru</span>
                            </a>
                        </div>

                        <!-- Card Header -->
                        <div class="space-y-space-xs mb-space-lg">
                            <div class="flex items-center justify-between">
                                <h2 class="font-headline-lg text-headline-lg text-on-surface" id="form-heading">
                                    Selamat Datang di ugoods
                                </h2>
                                <span class="material-symbols-outlined text-primary text-[28px]">token</span>
                            </div>
                            <p class="font-body-md text-body-md text-on-surface-variant" id="form-subheading">
                                Gunakan kredensial email/NIM kampus aktif kamu untuk masuk ke akun.
                            </p>
                        </div>

                        <!-- LOGIN FORM -->
                        <form method="POST" action="{{ route('login.store') }}" class="space-y-space-md">
                            @csrf

                            @if ($errors->any())
                                <div class="p-3.5 rounded-xl bg-rose-500/10 border border-rose-500/30 text-rose-400 text-xs flex items-start gap-2.5">
                                    <span class="material-symbols-outlined text-[18px] shrink-0 mt-0.5">error</span>
                                    <div class="space-y-0.5">
                                        @foreach ($errors->all() as $error)
                                            <p class="font-medium">{{ $error }}</p>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="p-3.5 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-xs flex items-start gap-2.5">
                                    <span class="material-symbols-outlined text-[18px] shrink-0 mt-0.5">check_circle</span>
                                    <p class="font-medium">{{ session('success') }}</p>
                                </div>
                            @endif

                            <!-- Input: Campus Identifier -->
                            <div class="space-y-space-2xs">
                                <div class="flex justify-between items-center">
                                    <label class="font-label-md text-label-md text-on-surface" for="login-id">Email / NIM Kampus</label>
                                    <span class="font-body-sm text-body-sm text-secondary flex items-center gap-0.5">
                                        <span class="material-symbols-outlined text-[14px]">shield</span> Terenkripsi
                                    </span>
                                </div>
                                <div class="relative flex items-center">
                                    <div class="absolute left-space-md flex items-center pointer-events-none text-outline">
                                        <span class="material-symbols-outlined text-[20px]">badge</span>
                                    </div>
                                    <input name="email" value="{{ old('email') }}" class="w-full h-11 pl-11 pr-space-md rounded-xl bg-surface-container-lowest text-on-surface placeholder:text-outline font-body-md text-body-md focus:outline-none focus:ring-2 focus:ring-primary-container transition-all border border-[#1E293B]" id="login-id" placeholder="Masukkan email kampus (e.g. user@gmail.com)" required type="text">
                                </div>
                                <p class="font-body-sm text-body-sm text-on-surface-variant flex items-center gap-1">
                                    <span class="material-symbols-outlined text-[14px] text-tertiary">check_circle</span> Gunakan email terdaftar atau nomor telepon aktif.
                                </p>
                            </div>

                            <!-- Input: Password -->
                            <div class="space-y-space-2xs">
                                <div class="flex justify-between items-center">
                                    <label class="font-label-md text-label-md text-on-surface" for="login-password">Kata Sandi (Password)</label>
                                    <a class="font-body-sm text-body-sm text-primary hover:text-primary-fixed transition-colors" href="#">Lupa Password?</a>
                                </div>
                                <div class="relative flex items-center">
                                    <div class="absolute left-space-md flex items-center pointer-events-none text-outline">
                                        <span class="material-symbols-outlined text-[20px]">lock</span>
                                    </div>
                                    <input name="password" class="w-full h-11 pl-11 pr-11 rounded-xl bg-surface-container-lowest text-on-surface placeholder:text-outline font-body-md text-body-md focus:outline-none focus:ring-2 focus:ring-primary-container transition-all tracking-widest border border-[#1E293B]" id="login-password" placeholder="••••••••••••" required type="password">
                                    <button aria-label="Tampilkan kata sandi" class="absolute right-space-md flex items-center text-outline hover:text-on-surface transition-colors" onclick="togglePasswordVisibility('login-password', this)" type="button">
                                        <span class="material-symbols-outlined text-[20px]">visibility</span>
                                    </button>
                                </div>
                            </div>

                            <!-- Row: Remember Session -->
                            <div class="flex items-center justify-between pt-space-2xs">
                                <label class="flex items-center gap-space-xs cursor-pointer select-none">
                                    <input name="remember" checked="" class="w-4 h-4 rounded bg-surface-container-lowest text-primary-container accent-primary-container focus:ring-0 cursor-pointer" type="checkbox">
                                    <span class="font-body-sm text-body-sm text-on-surface-variant">Ingat sesi di perangkat lab/kampus ini</span>
                                </label>
                            </div>

                            <!-- Submit Action Button -->
                            <button class="w-full h-12 rounded-xl bg-primary-container hover:bg-primary-container/90 text-on-primary font-headline-sm text-headline-sm tracking-wide shadow-lg shadow-primary-container/30 transition-all flex items-center justify-center gap-space-xs active:scale-[0.99]" type="submit">
                                <span>Masuk Sekarang</span>
                                <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
                            </button>
                        </form>

                        <!-- Card Security Footnote -->
                        <div class="mt-space-lg pt-space-md bg-surface-container-lowest/60 -mx-space-lg -mb-space-lg p-space-md rounded-b-2xl flex items-center gap-space-sm border-t border-[#1E293B]/60">
                            <span class="material-symbols-outlined text-secondary text-[22px] shrink-0">verified_user</span>
                            <p class="font-body-sm text-body-sm text-on-surface-variant leading-snug">
                                <span class="font-label-md text-label-md text-on-surface font-semibold">Akses Terbatas Kampus:</span> Penjualan barang khusus bagi mahasiswa aktif dengan KTM terverifikasi. Anti penipuan &amp; bebas calo.
                            </p>
                        </div>
                    </div>

                    <!-- Quick Back Navigation -->
                    <div class="mt-space-md text-center">
                        <a class="inline-flex items-center gap-space-xs font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="{{ url('/') }}">
                            <span class="material-symbols-outlined text-[16px]">arrow_back</span>
                            <span>Kembali ke Katalog Beranda ugoods tanpa masuk</span>
                        </a>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <!-- Auth Simple Footer -->
    <footer class="w-full bg-surface-container-lowest/80 backdrop-blur-xl py-space-lg border-t border-[#1E293B]">
        <div class="max-w-7xl mx-auto px-margin md:px-margin-tablet lg:px-margin-desktop flex flex-col sm:flex-row items-center justify-between gap-space-md">
            <div class="flex items-center gap-space-sm">
                <div class="w-2 h-2 rounded-full bg-tertiary"></div>
                <span class="font-body-sm text-body-sm text-on-surface-variant">ugoods verified campus secure authentication</span>
            </div>
            <span class="font-body-sm text-body-sm text-outline">© 2025 ugoods Indonesia. Hak cipta dilindungi.</span>
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
