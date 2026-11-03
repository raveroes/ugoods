@extends('layouts.app', ['noNavbar' => true, 'noFooter' => true])

@section('title', 'Daftar Akun Baru (Verifikasi KTM) - ugoods')

@section('content')
<div class="min-h-screen flex flex-col justify-between bg-surface-container-lowest font-body-md text-on-surface antialiased">
    <!-- Streamlined Auth Header -->
    <header class="w-full bg-surface-container-lowest/90 backdrop-blur-xl border-b border-[#1E293B]">
        <div class="h-16 max-w-7xl mx-auto px-margin md:px-margin-tablet lg:px-margin-desktop flex items-center justify-between">
            <a class="flex items-center gap-space-xs group" href="{{ url('/') }}">
                <span class="font-headline-sm text-2xl font-black tracking-tight select-none">
                    <span class="text-primary-container">u</span><span class="text-white">goods</span>
                </span>
            </a>
            <a class="flex items-center gap-space-xs text-on-surface-variant hover:text-on-surface font-body-sm text-body-sm transition-colors" href="{{ url('/') }}">
                <span class="material-symbols-outlined text-[16px]">arrow_back</span>
                <span>Kembali ke Beranda</span>
            </a>
        </div>
    </header>

    <!-- Main Registration Stage -->
    <main class="flex-1 flex flex-col items-center justify-center w-full px-margin md:px-margin-tablet lg:px-margin-desktop py-space-xl">
        <div class="w-full max-w-7xl mx-auto py-space-sm md:py-space-md">
            <!-- Split 2-Column Main Section -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg lg:gap-space-xl items-start">
                
                <!-- LEFT COLUMN: Brand, Value Proposition & Campus Proof -->
                <section class="lg:col-span-5 flex flex-col gap-space-lg lg:sticky lg:top-8">
                    <!-- Live Campus Hub Badge -->
                    <div class="flex items-center gap-space-xs">
                        <div class="inline-flex items-center gap-space-xs px-space-sm py-space-2xs rounded-full bg-surface-container-high border-none shadow-sm">
                            <span class="relative flex h-2 w-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-tertiary opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-tertiary"></span>
                            </span>
                            <span class="font-label-sm text-label-sm text-tertiary font-semibold tracking-wider uppercase">Kampus Terhubung • Polimedia Hub</span>
                        </div>
                        <span class="font-label-sm text-label-sm text-outline px-space-2xs py-space-2xs rounded bg-surface-container-low">v2.4 Live</span>
                    </div>

                    <!-- Headline & Punchy Subtext -->
                    <div class="flex flex-col gap-space-sm">
                        <h1 class="font-headline-lg text-headline-lg text-on-surface font-bold leading-tight">
                            Platform Jual Beli Preloved <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary via-primary-fixed to-secondary">Khusus Mahasiswa</span> Kampus
                        </h1>
                        <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                            Beli kebutuhan kuliah hemat hingga 70% atau ubah barang studio, drawing tablet &amp; buku tak terpakai jadi uang saku aman via Midtrans &amp; COD Lobi Kampus.
                        </p>
                    </div>

                    <!-- Value Proposition Trio Cards -->
                    <div class="flex flex-col gap-space-sm">
                        <!-- Value Card 1 -->
                        <div class="flex items-start gap-space-md p-space-md rounded-xl bg-surface-container-low transition-all duration-200 hover:bg-surface-container border border-[#1E293B]">
                            <div class="w-10 h-10 rounded-lg bg-surface-container-highest flex items-center justify-center shrink-0 text-primary">
                                <span class="material-symbols-outlined text-[20px]">verified_user</span>
                            </div>
                            <div class="flex flex-col gap-space-2xs">
                                <h2 class="font-headline-sm text-headline-sm text-on-surface text-[15px] leading-tight font-semibold">Verifikasi KTM Kampus</h2>
                                <p class="font-body-sm text-body-sm text-on-surface-variant">
                                    Cukup unggah foto/scan Kartu Tanda Mahasiswa (KTM) aktif untuk verifikasi akun penjual &amp; pembeli.
                                </p>
                            </div>
                        </div>

                        <!-- Value Card 2 -->
                        <div class="flex items-start gap-space-md p-space-md rounded-xl bg-surface-container-low transition-all duration-200 hover:bg-surface-container border border-[#1E293B]">
                            <div class="w-10 h-10 rounded-lg bg-surface-container-highest flex items-center justify-center shrink-0 text-tertiary">
                                <span class="material-symbols-outlined text-[20px]">location_on</span>
                            </div>
                            <div class="flex flex-col gap-space-2xs">
                                <h2 class="font-headline-sm text-headline-sm text-on-surface text-[15px] leading-tight font-semibold">Titik Temu COD Aman</h2>
                                <p class="font-body-sm text-body-sm text-on-surface-variant">
                                    Janji temu praktis di Lobi Gedung Kuliah, Kantin Terpadu, atau Selasar Lab tanpa biaya kirim &amp; risiko paket hilang.
                                </p>
                            </div>
                        </div>

                        <!-- Value Card 3 -->
                        <div class="flex items-start gap-space-md p-space-md rounded-xl bg-surface-container-low transition-all duration-200 hover:bg-surface-container border border-[#1E293B]">
                            <div class="w-10 h-10 rounded-lg bg-surface-container-highest flex items-center justify-center shrink-0 text-secondary">
                                <span class="material-symbols-outlined text-[20px]">bolt</span>
                            </div>
                            <div class="flex flex-col gap-space-2xs">
                                <h2 class="font-headline-sm text-headline-sm text-on-surface text-[15px] leading-tight font-semibold">Transaksi Cepat &amp; Praktis</h2>
                                <p class="font-body-sm text-body-sm text-on-surface-variant">
                                    Otomatisasi pembayaran QRIS/VA dan koordinasi langsung via WhatsApp resmi sesama mahasiswa tanpa perantara.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Social Proof Widget -->
                    <div class="p-space-md rounded-xl bg-surface-container-low flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm border border-[#1E293B]">
                        <div class="flex items-center gap-space-sm">
                            <div class="flex -space-x-2">
                                <div class="w-8 h-8 rounded-full bg-primary-container text-on-primary-container font-label-sm text-label-sm font-bold flex items-center justify-center shadow-md">MF</div>
                                <div class="w-8 h-8 rounded-full bg-tertiary-container text-on-tertiary-container font-label-sm text-label-sm font-bold flex items-center justify-center shadow-md">SN</div>
                                <div class="w-8 h-8 rounded-full bg-surface-container-highest text-secondary font-label-sm text-label-sm font-bold flex items-center justify-center shadow-md">FA</div>
                                <div class="w-8 h-8 rounded-full bg-surface-bright text-on-surface font-label-sm text-label-sm font-bold flex items-center justify-center shadow-md">+1k</div>
                            </div>
                            <div class="flex flex-col">
                                <span class="font-label-md text-label-md text-on-surface font-semibold">1.400+ Mahasiswa Bergabung</span>
                                <span class="font-body-sm text-body-sm text-outline">Polimedia Jakarta, Srengseng Sawah &amp; sekitarnya</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-1 text-tertiary">
                            <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="font-headline-sm text-headline-sm text-[13px] text-on-surface font-bold">4.9/5</span>
                        </div>
                    </div>
                </section>

                <!-- RIGHT COLUMN: Registration Card Container -->
                <section class="lg:col-span-7 w-full">
                    <div class="w-full bg-surface-container-low rounded-xl p-space-md md:p-space-lg shadow-xl relative overflow-hidden border border-[#1E293B]">
                        <!-- Decorative subtle gradient wash -->
                        <div class="absolute -top-24 -right-24 w-64 h-64 bg-primary-container/10 rounded-full blur-3xl pointer-events-none"></div>
                        <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-tertiary-container/10 rounded-full blur-3xl pointer-events-none"></div>

                        <!-- Auth Segmented Switcher -->
                        <div class="relative z-10 bg-surface-container-lowest rounded-lg p-space-2xs grid grid-cols-2 gap-space-2xs mb-space-md border border-[#1E293B]">
                            <a class="flex items-center justify-center gap-space-xs py-space-xs rounded-md text-on-surface-variant font-label-md text-label-md hover:text-on-surface transition-colors" href="{{ url('/login') }}">
                                <span class="material-symbols-outlined text-[18px]">login</span>
                                <span>Masuk Akun</span>
                            </a>
                            <div class="flex items-center justify-center gap-space-xs py-space-xs rounded-md bg-primary-container text-on-primary-container font-label-md text-label-md font-semibold shadow-md">
                                <span class="material-symbols-outlined text-[18px]">person_add</span>
                                <span>Daftar Akun Baru</span>
                            </div>
                        </div>

                        <!-- Card Header Info -->
                        <div class="relative z-10 flex flex-col gap-space-2xs mb-space-md">
                            <div class="flex items-center justify-between">
                                <h2 class="font-headline-md text-headline-md text-on-surface flex items-center gap-space-xs font-bold">
                                    Buat Akun Baru
                                    <span class="material-symbols-outlined text-primary text-[22px]">school</span>
                                </h2>
                                <span class="font-label-sm text-label-sm px-space-xs py-space-2xs rounded bg-tertiary-container/20 text-tertiary font-semibold flex items-center gap-1">
                                    <span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span>
                                    Batch Aktif
                                </span>
                            </div>
                            <p class="font-body-sm text-body-sm text-on-surface-variant">
                                Daftar dengan data dan email kampus untuk mulai jual-beli barang preloved sesama mahasiswa dengan verifikasi KTM.
                            </p>
                        </div>

                        <!-- Multi-field Registration Form -->
                        <form method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data" class="relative z-10 flex flex-col gap-space-md">
                            @csrf

                            @if ($errors->any())
                                <div class="p-3.5 rounded-xl bg-rose-500/10 border border-rose-500/30 text-rose-400 text-xs flex items-start gap-2.5">
                                    <span class="material-symbols-outlined text-[18px] shrink-0 mt-0.5">error</span>
                                    <div class="space-y-1">
                                        <span class="font-semibold block text-rose-300">Harap periksa kembali isian formulir:</span>
                                        <ul class="list-disc list-inside space-y-0.5 text-slate-300">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif

                            <!-- Field 1: Nama Lengkap -->
                            <div class="flex flex-col gap-space-2xs">
                                <div class="flex items-center justify-between">
                                    <label class="font-label-md text-label-md text-on-surface font-medium" for="reg-fullname">
                                        Nama Lengkap <span class="text-error">*</span>
                                    </label>
                                    <span class="font-label-sm text-label-sm text-outline">Sesuai KTM / SIAK</span>
                                </div>
                                <div class="relative flex items-center">
                                    <span class="material-symbols-outlined absolute left-3.5 text-[18px] text-outline pointer-events-none">person</span>
                                    <input name="name" value="{{ old('name') }}" class="w-full bg-surface-container-lowest text-on-surface placeholder:text-outline font-body-md text-body-md rounded-lg py-2.5 pl-10 pr-3.5 focus:outline-none focus:ring-2 focus:ring-primary-container transition-all border border-[#1E293B]" id="reg-fullname" placeholder="e.g. Fahri Dwi Kurniawan" required type="text">
                                </div>
                            </div>

                            <!-- Field 2: Email Pribadi / Kampus -->
                            <div class="flex flex-col gap-space-2xs">
                                <div class="flex items-center justify-between flex-wrap gap-1">
                                    <label class="font-label-md text-label-md text-on-surface font-medium" for="reg-email">
                                        Email Aktif <span class="text-error">*</span>
                                    </label>
                                    <span class="font-label-sm text-label-sm text-outline">Gunakan email aktif</span>
                                </div>
                                <div class="relative flex items-center">
                                    <span class="material-symbols-outlined absolute left-3.5 text-[18px] text-outline pointer-events-none">alternate_email</span>
                                    <input name="email" value="{{ old('email') }}" class="w-full bg-surface-container-lowest text-on-surface placeholder:text-outline font-body-md text-body-md rounded-lg py-2.5 pl-10 pr-3.5 focus:outline-none focus:ring-2 focus:ring-primary-container transition-all border border-[#1E293B]" id="reg-email" placeholder="e.g. user@gmail.com" required type="email">
                                </div>
                            </div>

                            <!-- 2-Column Responsive: Titik COD Kampus & WhatsApp -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
                                <!-- Field 3: Titik COD Kampus Utama -->
                                <div class="flex flex-col gap-space-2xs">
                                    <label class="font-label-md text-label-md text-on-surface font-medium" for="reg-campus-cod">
                                        Titik COD Favorit <span class="text-error">*</span>
                                    </label>
                                    <div class="relative flex items-center">
                                        <span class="material-symbols-outlined absolute left-3.5 text-[18px] text-outline pointer-events-none">location_on</span>
                                        <select name="campus_cod_location" class="w-full bg-surface-container-lowest text-on-surface font-body-md text-body-md rounded-lg py-2.5 pl-10 pr-8 appearance-none focus:outline-none focus:ring-2 focus:ring-primary-container transition-all border border-[#1E293B] cursor-pointer" id="reg-campus-cod" required>
                                            <option class="bg-surface-container-low text-on-surface" value="Lobi Gedung Kuliah Terpadu" {{ old('campus_cod_location') == 'Lobi Gedung Kuliah Terpadu' ? 'selected' : '' }}>Lobi Gedung Kuliah Terpadu</option>
                                            <option class="bg-surface-container-low text-on-surface" value="Kantin Kreatif Polimedia" {{ old('campus_cod_location') == 'Kantin Kreatif Polimedia' ? 'selected' : '' }}>Kantin Kreatif Polimedia</option>
                                            <option class="bg-surface-container-low text-on-surface" value="Selasar Lab Grafika" {{ old('campus_cod_location') == 'Selasar Lab Grafika' ? 'selected' : '' }}>Selasar Lab Grafika</option>
                                            <option class="bg-surface-container-low text-on-surface" value="Gerbang Depan Srengseng" {{ old('campus_cod_location') == 'Gerbang Depan Srengseng' ? 'selected' : '' }}>Gerbang Depan Srengseng</option>
                                            <option class="bg-surface-container-low text-on-surface" value="Perpustakaan Lt. 2" {{ old('campus_cod_location') == 'Perpustakaan Lt. 2' ? 'selected' : '' }}>Perpustakaan Lt. 2</option>
                                        </select>
                                        <span class="material-symbols-outlined absolute right-3 text-[18px] text-outline pointer-events-none">expand_more</span>
                                    </div>
                                </div>

                                <!-- Field 4: Nomor WhatsApp -->
                                <div class="flex flex-col gap-space-2xs">
                                    <label class="font-label-md text-label-md text-on-surface font-medium" for="reg-phone">
                                        Nomor WhatsApp (COD) <span class="text-error">*</span>
                                    </label>
                                    <div class="relative flex items-center">
                                        <span class="material-symbols-outlined absolute left-3.5 text-[18px] text-tertiary pointer-events-none">chat</span>
                                        <input name="whatsapp_number" value="{{ old('whatsapp_number') }}" class="w-full bg-surface-container-lowest text-on-surface placeholder:text-outline font-body-md text-body-md rounded-lg py-2.5 pl-10 pr-3.5 focus:outline-none focus:ring-2 focus:ring-primary-container transition-all border border-[#1E293B]" id="reg-phone" placeholder="0812-3456-7890" required type="tel">
                                    </div>
                                    <span class="font-body-sm text-body-sm text-outline">
                                        Digunakan janjian COD di lobi kampus
                                    </span>
                                </div>
                            </div>

                            <!-- KTM Upload Section -->
                            <div class="flex flex-col gap-space-2xs">
                                <div class="flex items-center justify-between">
                                    <label class="font-label-md text-label-md text-on-surface font-medium" for="reg-ktm">
                                        Unggah Foto / Scan KTM (Kartu Tanda Mahasiswa) <span class="text-error">*</span>
                                    </label>
                                    <span class="font-label-sm text-label-sm px-space-xs py-0.5 rounded bg-tertiary-container/20 text-tertiary font-medium">
                                        Wajib Verifikasi
                                    </span>
                                </div>
                                <div class="relative border-2 border-dashed border-outline-variant/60 hover:border-primary-container bg-surface-container-lowest rounded-xl p-4 flex flex-col items-center justify-center text-center gap-2 cursor-pointer transition-colors group">
                                    <input name="ktm_image" accept="image/jpeg,image/png,image/webp,application/pdf" class="absolute inset-0 opacity-0 cursor-pointer w-full h-full" id="reg-ktm" required type="file" onchange="previewKtmFile(this)">
                                    <div class="w-12 h-12 rounded-full bg-surface-container flex items-center justify-center group-hover:scale-105 transition-transform">
                                        <span class="material-symbols-outlined text-primary text-[28px]" id="ktm-icon">badge</span>
                                    </div>
                                    <div class="flex flex-col gap-0.5">
                                        <p class="font-body-md text-body-md text-on-surface font-semibold group-hover:text-primary transition-colors" id="ktm-filename">
                                            Tarik &amp; lepas foto KTM atau klik untuk jelajahi
                                        </p>
                                        <p class="font-body-sm text-body-sm text-outline">
                                            Format JPG, PNG, atau PDF (Maksimal 3 MB)
                                        </p>
                                    </div>
                                    <button class="mt-1 px-4 py-1.5 rounded-lg bg-surface-container-high hover:bg-surface-container-highest text-on-surface font-label-md text-label-md font-semibold transition-colors flex items-center gap-1.5 pointer-events-none" type="button">
                                        <span class="material-symbols-outlined text-[16px] text-primary">upload_file</span>
                                        <span>Pilih File KTM</span>
                                    </button>
                                </div>
                                <span class="font-body-sm text-body-sm text-outline">
                                    Digunakan admin untuk verifikasi status mahasiswa aktif Polimedia.
                                </span>
                            </div>

                            <!-- 2-Column Responsive: Kata Sandi & Konfirmasi -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
                                <!-- Field 5: Password -->
                                <div class="flex flex-col gap-space-2xs">
                                    <label class="font-label-md text-label-md text-on-surface font-medium" for="reg-pass">
                                        Kata Sandi <span class="text-error">*</span>
                                    </label>
                                    <div class="relative flex items-center">
                                        <span class="material-symbols-outlined absolute left-3.5 text-[18px] text-outline pointer-events-none">lock</span>
                                        <input name="password" class="w-full bg-surface-container-lowest text-on-surface placeholder:text-outline font-body-md text-body-md rounded-lg py-2.5 pl-10 pr-10 focus:outline-none focus:ring-2 focus:ring-primary-container transition-all border border-[#1E293B]" id="reg-pass" placeholder="Minimal 8 karakter" required type="password">
                                        <button aria-label="Tampilkan sandi" class="absolute right-3 text-outline hover:text-on-surface p-1 transition-colors" onclick="const p = document.getElementById('reg-pass'); p.type = p.type === 'password' ? 'text' : 'password';" type="button">
                                            <span class="material-symbols-outlined text-[18px]">visibility</span>
                                        </button>
                                    </div>
                                </div>

                                <!-- Field 6: Password Confirmation -->
                                <div class="flex flex-col gap-space-2xs">
                                    <label class="font-label-md text-label-md text-on-surface font-medium" for="reg-pass-confirm">
                                        Konfirmasi Sandi <span class="text-error">*</span>
                                    </label>
                                    <div class="relative flex items-center">
                                        <span class="material-symbols-outlined absolute left-3.5 text-[18px] text-outline pointer-events-none">lock_reset</span>
                                        <input name="password_confirmation" class="w-full bg-surface-container-lowest text-on-surface placeholder:text-outline font-body-md text-body-md rounded-lg py-2.5 pl-10 pr-10 focus:outline-none focus:ring-2 focus:ring-primary-container transition-all border border-[#1E293B]" id="reg-pass-confirm" placeholder="Ulangi kata sandi" required type="password">
                                        <span class="material-symbols-outlined absolute right-3 text-[18px] text-tertiary">check</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Password Requirements Pill Stack -->
                            <div class="flex flex-wrap items-center gap-space-xs py-space-2xs">
                                <span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded bg-surface-container text-tertiary">
                                    <span class="material-symbols-outlined text-[13px]">done</span> Min. 8 karakter
                                </span>
                                <span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded bg-surface-container text-tertiary">
                                    <span class="material-symbols-outlined text-[13px]">done</span> Kombinasi angka
                                </span>
                                <span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded bg-surface-container text-outline">
                                    <span class="material-symbols-outlined text-[13px]">radio_button_unchecked</span> Huruf kapital
                                </span>
                            </div>

                            <!-- Terms & Conditions Checkbox -->
                            <label class="flex items-start gap-space-sm cursor-pointer select-none group mt-space-2xs">
                                <input checked="" class="mt-1 w-4 h-4 rounded bg-surface-container-lowest accent-primary-container cursor-pointer focus:ring-primary-container" required type="checkbox">
                                <span class="font-body-sm text-body-sm text-on-surface-variant group-hover:text-on-surface transition-colors leading-relaxed">
                                    Saya menyetujui <a class="text-primary hover:underline font-medium" href="#">Syarat &amp; Ketentuan</a> serta <a class="text-primary hover:underline font-medium" href="#">Kebijakan Privasi ugoods</a> untuk transaksi mahasiswa Polimedia.
                                </span>
                            </label>

                            <!-- Primary Submission CTA Button -->
                            <button class="w-full mt-space-xs py-3.5 px-space-lg rounded-xl bg-primary-container hover:bg-inverse-primary active:scale-[0.99] text-on-primary-container font-headline-sm text-headline-sm text-[16px] font-semibold transition-all duration-200 flex items-center justify-center gap-space-sm shadow-xl shadow-primary-container/20 group" type="submit">
                                <span>Daftar Akun Baru &amp; Unggah KTM</span>
                                <span class="material-symbols-outlined text-[20px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
                            </button>
                        </form>

                        <!-- Security & Campus Trust Notice Box -->
                        <div class="relative z-10 mt-space-md p-space-sm rounded-lg bg-surface-container flex items-start gap-space-sm border border-[#1E293B]">
                            <span class="material-symbols-outlined text-[18px] text-tertiary shrink-0 mt-0.5">verified</span>
                            <div class="flex flex-col gap-0.5">
                                <span class="font-label-sm text-label-sm text-on-surface font-semibold">Akses Terbatas Kampus</span>
                                <p class="font-body-sm text-body-sm text-outline">
                                    Penjualan &amp; pembelian barang khusus civitas akademika aktif dengan verifikasi email/KTM. Bebas calo &amp; bebas penipuan.
                                </p>
                            </div>
                        </div>

                        <!-- Login Shortcut Link -->
                        <div class="relative z-10 mt-space-md text-center">
                            <p class="font-body-md text-body-md text-on-surface-variant">
                                Sudah punya akun ugoods? 
                                <a class="text-primary hover:text-primary-fixed font-semibold underline-offset-4 hover:underline transition-colors ml-1" href="{{ url('/login') }}">
                                    Masuk di sini →
                                </a>
                            </p>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Security & Status Indicator -->
            <div class="mt-space-lg pt-space-md flex flex-wrap items-center justify-between gap-space-sm border-t border-[#1E293B]">
                <div class="flex items-center gap-space-xs">
                    <span class="w-2 h-2 rounded-full bg-tertiary animate-pulse"></span>
                    <span class="font-body-sm text-body-sm text-outline">
                        ugoods verified campus secure 256-bit SSL encrypted registration
                    </span>
                </div>
                <div class="flex items-center gap-space-md text-outline font-body-sm text-body-sm">
                    <span class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-[14px]">shield</span> Midtrans Payment Gateway
                    </span>
                    <span class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-[14px]">map</span> Kampus Polimedia Jakarta
                    </span>
                </div>
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
    function previewKtmFile(input) {
        if (input.files && input.files[0]) {
            const fileName = input.files[0].name;
            document.getElementById('ktm-filename').textContent = 'File terpilih: ' + fileName;
            document.getElementById('ktm-icon').textContent = 'check_circle';
            document.getElementById('ktm-icon').classList.remove('text-primary');
            document.getElementById('ktm-icon').classList.add('text-tertiary');
        }
    }
</script>
@endpush
