@extends('layouts.app', ['noNavbar' => true, 'noFooter' => true])

@section('title', 'Daftar Akun Baru (Verifikasi KTM) - ugoods')

@section('content')
<div class="min-h-screen flex flex-col justify-between bg-[#FAF8FF] font-body-md text-[#1A0D3F] antialiased">
    <!-- Streamlined Auth Header -->
    <header class="w-full bg-white/90 backdrop-blur-xl border-b border-[#E4DCFA] sticky top-0 z-30 shadow-xs">
        <div class="h-16 max-w-7xl mx-auto px-4 md:px-6 lg:px-8 flex items-center justify-between">
            <a class="flex items-center gap-2 group" href="{{ url('/') }}">
                <span class="text-2xl font-black tracking-tight font-headline-sm select-none">
                    <span class="text-[#1A0D3F] font-bold">u<span class="text-[#5B47E0]">goods</span></span>
                </span>
            </a>
            <a class="flex items-center gap-1.5 text-[#4A3B75] hover:text-[#5B47E0] font-semibold text-sm transition-colors" href="{{ url('/') }}">
                <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                <span>Kembali ke Beranda</span>
            </a>
        </div>
    </header>

    <!-- Main Registration Stage -->
    <main class="flex-1 flex flex-col items-center justify-center w-full px-4 md:px-6 lg:px-8 py-8 md:py-12 relative overflow-hidden">
        <!-- Ambient Luminous Glow Orbs -->
        <div class="absolute top-1/4 -left-20 w-80 h-80 bg-purple-200/30 rounded-full blur-[110px] pointer-events-none -z-10"></div>
        <div class="absolute bottom-10 right-0 w-96 h-96 bg-pink-200/20 rounded-full blur-[130px] pointer-events-none -z-10"></div>

        <div class="w-full max-w-7xl mx-auto">
            <!-- Split 2-Column Main Section -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
                
                <!-- LEFT COLUMN: Brand, Value Proposition & Campus Proof -->
                <section class="lg:col-span-5 flex flex-col gap-6 lg:sticky lg:top-24">
                    <!-- Live Campus Hub Badge -->
                    <div class="flex items-center gap-2">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#D1FAE5] border border-[#A7F3D0] text-[#065F46] shadow-xs">
                            <span class="relative flex h-2 w-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-500 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-600"></span>
                            </span>
                            <span class="font-bold text-xs tracking-wide uppercase">Kampus Terhubung • Polimedia Hub</span>
                        </div>
                        <span class="text-xs font-semibold text-[#7E70A6] px-2.5 py-1 rounded-full bg-white border border-[#E4DCFA]">v2.4 Live</span>
                    </div>

                    <!-- Headline & Punchy Subtext -->
                    <div class="flex flex-col gap-2.5">
                        <h1 class="text-3xl lg:text-4xl font-extrabold text-[#1A0D3F] leading-tight tracking-tight">
                            Platform Jual Beli Preloved <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#5B47E0] via-[#8B5CF6] to-[#EC4899]">Khusus Mahasiswa</span> Kampus
                        </h1>
                        <p class="text-base text-[#4A3B75] leading-relaxed">
                            Beli kebutuhan kuliah hemat hingga 70% atau ubah barang studio, drawing tablet &amp; buku tak terpakai jadi uang saku aman via Midtrans &amp; COD Lobi Kampus.
                        </p>
                    </div>

                    <!-- Value Proposition Trio Cards -->
                    <div class="flex flex-col gap-3.5">
                        <!-- Value Card 1 -->
                        <div class="flex items-start gap-4 p-4 rounded-2xl bg-white border border-[#E4DCFA] hover:border-[#C4B5FD] transition-all shadow-sm shadow-purple-100/50">
                            <div class="w-10 h-10 rounded-xl bg-purple-50 border border-purple-200 flex items-center justify-center shrink-0 text-[#5B47E0]">
                                <span class="material-symbols-outlined text-[20px]">verified_user</span>
                            </div>
                            <div class="flex flex-col gap-1">
                                <h2 class="text-base font-bold text-[#1A0D3F] leading-tight">Verifikasi KTM Kampus</h2>
                                <p class="text-xs sm:text-sm text-[#4A3B75] leading-relaxed">
                                    Cukup unggah foto/scan Kartu Tanda Mahasiswa (KTM) aktif untuk verifikasi akun penjual &amp; pembeli.
                                </p>
                            </div>
                        </div>

                        <!-- Value Card 2 -->
                        <div class="flex items-start gap-4 p-4 rounded-2xl bg-white border border-[#E4DCFA] hover:border-[#C4B5FD] transition-all shadow-sm shadow-purple-100/50">
                            <div class="w-10 h-10 rounded-xl bg-emerald-50 border border-emerald-200 flex items-center justify-center shrink-0 text-[#059669]">
                                <span class="material-symbols-outlined text-[20px]">location_on</span>
                            </div>
                            <div class="flex flex-col gap-1">
                                <h2 class="text-base font-bold text-[#1A0D3F] leading-tight">Titik Temu COD Aman</h2>
                                <p class="text-xs sm:text-sm text-[#4A3B75] leading-relaxed">
                                    Janji temu praktis di Lobi Gedung Kuliah, Kantin Terpadu, atau Selasar Lab tanpa biaya kirim &amp; risiko paket hilang.
                                </p>
                            </div>
                        </div>

                        <!-- Value Card 3 -->
                        <div class="flex items-start gap-4 p-4 rounded-2xl bg-white border border-[#E4DCFA] hover:border-[#C4B5FD] transition-all shadow-sm shadow-purple-100/50">
                            <div class="w-10 h-10 rounded-xl bg-sky-50 border border-sky-200 flex items-center justify-center shrink-0 text-[#0284C7]">
                                <span class="material-symbols-outlined text-[20px]">bolt</span>
                            </div>
                            <div class="flex flex-col gap-1">
                                <h2 class="text-base font-bold text-[#1A0D3F] leading-tight">Transaksi Cepat &amp; Praktis</h2>
                                <p class="text-xs sm:text-sm text-[#4A3B75] leading-relaxed">
                                    Otomatisasi pembayaran QRIS/VA dan koordinasi langsung via WhatsApp resmi sesama mahasiswa tanpa perantara.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Social Proof Widget -->
                    <div class="p-4 rounded-2xl bg-white border border-[#E4DCFA] flex flex-col sm:flex-row sm:items-center justify-between gap-3 shadow-sm shadow-purple-100/50">
                        <div class="flex items-center gap-3">
                            <div class="flex -space-x-2">
                                <div class="w-8 h-8 rounded-full bg-[#5B47E0] text-white text-xs font-bold flex items-center justify-center shadow-xs">MF</div>
                                <div class="w-8 h-8 rounded-full bg-[#0284C7] text-white text-xs font-bold flex items-center justify-center shadow-xs">SN</div>
                                <div class="w-8 h-8 rounded-full bg-emerald-600 text-white text-xs font-bold flex items-center justify-center shadow-xs">FA</div>
                                <div class="w-8 h-8 rounded-full bg-[#F5F3FF] border border-[#E4DCFA] text-[#5B47E0] text-xs font-bold flex items-center justify-center shadow-xs">+1k</div>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm font-bold text-[#1A0D3F]">1.400+ Mahasiswa Bergabung</span>
                                <span class="text-xs text-[#7E70A6]">Polimedia Jakarta, Srengseng Sawah &amp; sekitarnya</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-1 text-amber-500">
                            <span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="text-sm font-bold text-[#1A0D3F]">4.9/5</span>
                        </div>
                    </div>
                </section>

                <!-- RIGHT COLUMN: Registration Card Container -->
                <section class="lg:col-span-7 w-full">
                    <div class="w-full bg-white rounded-3xl p-6 md:p-8 shadow-xl shadow-purple-900/10 relative overflow-hidden border border-[#E4DCFA]">
                        <!-- Decorative top accent line -->
                        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-[#5B47E0] via-[#8B5CF6] to-[#EC4899]"></div>

                        <!-- Auth Segmented Switcher -->
                        <div class="relative z-10 bg-[#FAF8FF] border border-[#E4DCFA] rounded-2xl p-1.5 grid grid-cols-2 gap-1.5 mb-6 shadow-2xs">
                            <a class="flex items-center justify-center gap-2 py-2.5 rounded-xl text-[#4A3B75] font-bold text-sm hover:text-[#5B47E0] hover:bg-white/60 transition-all" href="{{ url('/login') }}">
                                <span class="material-symbols-outlined text-[18px]">login</span>
                                <span>Masuk Akun</span>
                            </a>
                            <div class="flex items-center justify-center gap-2 py-2.5 rounded-xl bg-[#5B47E0] text-white font-bold text-sm shadow-md shadow-[#5B47E0]/30">
                                <span class="material-symbols-outlined text-[18px]">person_add</span>
                                <span>Daftar Akun Baru</span>
                            </div>
                        </div>

                        <!-- Card Header Info -->
                        <div class="relative z-10 flex flex-col gap-1 mb-6">
                            <div class="flex items-center justify-between">
                                <h2 class="text-xl sm:text-2xl font-bold text-[#1A0D3F] flex items-center gap-2">
                                    Buat Akun Baru
                                    <span class="material-symbols-outlined text-[#5B47E0] text-[22px]">school</span>
                                </h2>
                                <span class="text-xs px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-800 border border-emerald-200 font-semibold flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-600 animate-pulse"></span>
                                    Batch Aktif
                                </span>
                            </div>
                            <p class="text-xs sm:text-sm text-[#4A3B75]">
                                Daftar dengan data dan email kampus untuk mulai jual-beli barang preloved sesama mahasiswa dengan verifikasi KTM.
                            </p>
                        </div>

                        <!-- Multi-field Registration Form -->
                        <form method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data" class="relative z-10 flex flex-col gap-4">
                            @csrf

                            @if ($errors->any())
                                <div class="p-3.5 rounded-xl bg-rose-50 border border-rose-200 text-rose-700 text-xs flex items-start gap-2.5">
                                    <span class="material-symbols-outlined text-[18px] shrink-0 mt-0.5 text-rose-600">error</span>
                                    <div class="space-y-1">
                                        <span class="font-bold block text-rose-800">Harap periksa kembali isian formulir:</span>
                                        <ul class="list-disc list-inside space-y-0.5 text-rose-700">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif

                            <!-- Field 1: Nama Lengkap -->
                            <div class="flex flex-col gap-1.5">
                                <div class="flex items-center justify-between">
                                    <label class="text-sm font-semibold text-[#1A0D3F]" for="reg-fullname">
                                        Nama Lengkap <span class="text-rose-500">*</span>
                                    </label>
                                    <span class="text-xs text-[#7E70A6]">Sesuai KTM / SIAK</span>
                                </div>
                                <div class="relative flex items-center">
                                    <span class="material-symbols-outlined absolute left-3.5 text-[18px] text-[#7E70A6] pointer-events-none">person</span>
                                    <input name="name" value="{{ old('name') }}" class="w-full bg-[#FAF8FF] text-[#1A0D3F] placeholder-[#7E70A6] text-sm font-medium rounded-xl py-2.5 pl-10 pr-3.5 focus:outline-none focus:bg-white focus:border-[#5B47E0] focus:ring-2 focus:ring-[#5B47E0]/20 transition-all border border-[#E4DCFA] shadow-2xs" id="reg-fullname" placeholder="e.g. Fahri Dwi Kurniawan" required type="text">
                                </div>
                            </div>

                            <!-- Field 2: Email Pribadi / Kampus -->
                            <div class="flex flex-col gap-1.5">
                                <div class="flex items-center justify-between flex-wrap gap-1">
                                    <label class="text-sm font-semibold text-[#1A0D3F]" for="reg-email">
                                        Email Aktif <span class="text-rose-500">*</span>
                                    </label>
                                    <span class="text-xs text-[#7E70A6]">Gunakan email aktif</span>
                                </div>
                                <div class="relative flex items-center">
                                    <span class="material-symbols-outlined absolute left-3.5 text-[18px] text-[#7E70A6] pointer-events-none">alternate_email</span>
                                    <input name="email" value="{{ old('email') }}" class="w-full bg-[#FAF8FF] text-[#1A0D3F] placeholder-[#7E70A6] text-sm font-medium rounded-xl py-2.5 pl-10 pr-3.5 focus:outline-none focus:bg-white focus:border-[#5B47E0] focus:ring-2 focus:ring-[#5B47E0]/20 transition-all border border-[#E4DCFA] shadow-2xs" id="reg-email" placeholder="e.g. user@gmail.com" required type="email">
                                </div>
                            </div>

                            <!-- 2-Column Responsive: Titik COD Kampus & WhatsApp -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Field 3: Titik COD Kampus Utama -->
                                <div class="flex flex-col gap-1.5">
                                    <label class="text-sm font-semibold text-[#1A0D3F]" for="reg-campus-cod">
                                        Titik COD Favorit <span class="text-rose-500">*</span>
                                    </label>
                                    <div class="relative flex items-center">
                                        <span class="material-symbols-outlined absolute left-3.5 text-[18px] text-[#5B47E0] pointer-events-none">location_on</span>
                                        <select name="campus_cod_location" class="w-full bg-[#FAF8FF] text-[#1A0D3F] text-sm font-medium rounded-xl py-2.5 pl-10 pr-9 appearance-none focus:outline-none focus:bg-white focus:border-[#5B47E0] focus:ring-2 focus:ring-[#5B47E0]/20 transition-all border border-[#E4DCFA] cursor-pointer shadow-2xs" id="reg-campus-cod" required>
                                            <option class="bg-white text-[#1A0D3F]" value="Lobi Gedung Kuliah Terpadu" {{ old('campus_cod_location') == 'Lobi Gedung Kuliah Terpadu' ? 'selected' : '' }}>Lobi Gedung Kuliah Terpadu</option>
                                            <option class="bg-white text-[#1A0D3F]" value="Kantin Kreatif Polimedia" {{ old('campus_cod_location') == 'Kantin Kreatif Polimedia' ? 'selected' : '' }}>Kantin Kreatif Polimedia</option>
                                            <option class="bg-white text-[#1A0D3F]" value="Selasar Lab Grafika" {{ old('campus_cod_location') == 'Selasar Lab Grafika' ? 'selected' : '' }}>Selasar Lab Grafika</option>
                                            <option class="bg-white text-[#1A0D3F]" value="Gerbang Depan Srengseng" {{ old('campus_cod_location') == 'Gerbang Depan Srengseng' ? 'selected' : '' }}>Gerbang Depan Srengseng</option>
                                            <option class="bg-white text-[#1A0D3F]" value="Perpustakaan Lt. 2" {{ old('campus_cod_location') == 'Perpustakaan Lt. 2' ? 'selected' : '' }}>Perpustakaan Lt. 2</option>
                                        </select>
                                        <span class="material-symbols-outlined absolute right-3 text-[18px] text-[#7E70A6] pointer-events-none">expand_more</span>
                                    </div>
                                </div>

                                <!-- Field 4: Nomor WhatsApp -->
                                <div class="flex flex-col gap-1.5">
                                    <label class="text-sm font-semibold text-[#1A0D3F]" for="reg-phone">
                                        Nomor WhatsApp (COD) <span class="text-rose-500">*</span>
                                    </label>
                                    <div class="relative flex items-center">
                                        <span class="material-symbols-outlined absolute left-3.5 text-[18px] text-emerald-600 pointer-events-none">chat</span>
                                        <input name="whatsapp_number" value="{{ old('whatsapp_number') }}" class="w-full bg-[#FAF8FF] text-[#1A0D3F] placeholder-[#7E70A6] text-sm font-medium rounded-xl py-2.5 pl-10 pr-3.5 focus:outline-none focus:bg-white focus:border-[#5B47E0] focus:ring-2 focus:ring-[#5B47E0]/20 transition-all border border-[#E4DCFA] shadow-2xs" id="reg-phone" placeholder="0812-3456-7890" required type="tel">
                                    </div>
                                    <span class="text-xs text-[#7E70A6]">
                                        Digunakan janjian COD di lobi kampus
                                    </span>
                                </div>
                            </div>

                            <!-- KTM Upload Section -->
                            <div class="flex flex-col gap-1.5">
                                <div class="flex items-center justify-between">
                                    <label class="text-sm font-semibold text-[#1A0D3F]" for="reg-ktm">
                                        Unggah Foto / Scan KTM <span class="text-rose-500">*</span>
                                    </label>
                                    <span class="text-xs px-2.5 py-0.5 rounded-full bg-emerald-100 text-emerald-800 border border-emerald-200 font-semibold">
                                        Wajib Verifikasi
                                    </span>
                                </div>
                                <div class="relative border-2 border-dashed border-[#C4B5FD] hover:border-[#5B47E0] bg-[#FAF8FF] hover:bg-[#F3EFFF] rounded-2xl p-6 flex flex-col items-center justify-center text-center gap-2 cursor-pointer transition-colors group shadow-2xs">
                                    <input name="ktm_image" accept="image/jpeg,image/png,image/webp,application/pdf" class="absolute inset-0 opacity-0 cursor-pointer w-full h-full" id="reg-ktm" required type="file" onchange="previewKtmFile(this)">
                                    <div class="w-12 h-12 rounded-xl bg-purple-50 border border-purple-200 flex items-center justify-center group-hover:scale-105 transition-transform">
                                        <span class="material-symbols-outlined text-[#5B47E0] text-[28px]" id="ktm-icon">badge</span>
                                    </div>
                                    <div class="flex flex-col gap-0.5">
                                        <p class="text-sm font-bold text-[#1A0D3F] group-hover:text-[#5B47E0] transition-colors" id="ktm-filename">
                                            Tarik &amp; lepas foto KTM atau klik untuk jelajahi
                                        </p>
                                        <p class="text-xs text-[#7E70A6]">
                                            Format JPG, PNG, atau PDF (Maksimal 3 MB)
                                        </p>
                                    </div>
                                    <button class="mt-1 px-4 py-1.5 rounded-xl bg-white border border-[#E4DCFA] text-[#5B47E0] text-xs font-semibold shadow-xs flex items-center gap-1.5 pointer-events-none" type="button">
                                        <span class="material-symbols-outlined text-[16px] text-[#5B47E0]">upload_file</span>
                                        <span>Pilih File KTM</span>
                                    </button>
                                </div>
                                <span class="text-xs text-[#7E70A6]">
                                    Digunakan admin untuk verifikasi status mahasiswa aktif Polimedia.
                                </span>
                            </div>

                            <!-- 2-Column Responsive: Kata Sandi & Konfirmasi -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Field 5: Password -->
                                <div class="flex flex-col gap-1.5">
                                    <label class="text-sm font-semibold text-[#1A0D3F]" for="reg-pass">
                                        Kata Sandi <span class="text-rose-500">*</span>
                                    </label>
                                    <div class="relative flex items-center">
                                        <span class="material-symbols-outlined absolute left-3.5 text-[18px] text-[#7E70A6] pointer-events-none">lock</span>
                                        <input name="password" class="w-full bg-[#FAF8FF] text-[#1A0D3F] placeholder-[#7E70A6] text-sm font-medium rounded-xl py-2.5 pl-10 pr-10 focus:outline-none focus:bg-white focus:border-[#5B47E0] focus:ring-2 focus:ring-[#5B47E0]/20 transition-all border border-[#E4DCFA] shadow-2xs" id="reg-pass" placeholder="Minimal 8 karakter" required type="password">
                                        <button aria-label="Tampilkan sandi" class="absolute right-3 text-[#7E70A6] hover:text-[#1A0D3F] p-1 transition-colors" onclick="const p = document.getElementById('reg-pass'); p.type = p.type === 'password' ? 'text' : 'password';" type="button">
                                            <span class="material-symbols-outlined text-[18px]">visibility</span>
                                        </button>
                                    </div>
                                </div>

                                <!-- Field 6: Password Confirmation -->
                                <div class="flex flex-col gap-1.5">
                                    <label class="text-sm font-semibold text-[#1A0D3F]" for="reg-pass-confirm">
                                        Konfirmasi Sandi <span class="text-rose-500">*</span>
                                    </label>
                                    <div class="relative flex items-center">
                                        <span class="material-symbols-outlined absolute left-3.5 text-[18px] text-[#7E70A6] pointer-events-none">lock_reset</span>
                                        <input name="password_confirmation" class="w-full bg-[#FAF8FF] text-[#1A0D3F] placeholder-[#7E70A6] text-sm font-medium rounded-xl py-2.5 pl-10 pr-10 focus:outline-none focus:bg-white focus:border-[#5B47E0] focus:ring-2 focus:ring-[#5B47E0]/20 transition-all border border-[#E4DCFA] shadow-2xs" id="reg-pass-confirm" placeholder="Ulangi kata sandi" required type="password">
                                        <span class="material-symbols-outlined absolute right-3 text-[18px] text-emerald-600">check</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Password Requirements Pill Stack -->
                            <div class="flex flex-wrap items-center gap-2 py-1">
                                <span class="inline-flex items-center gap-1 text-xs px-2.5 py-1 rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-800 font-semibold">
                                    <span class="material-symbols-outlined text-[14px]">done</span> Min. 8 karakter
                                </span>
                                <span class="inline-flex items-center gap-1 text-xs px-2.5 py-1 rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-800 font-semibold">
                                    <span class="material-symbols-outlined text-[14px]">done</span> Kombinasi angka
                                </span>
                                <span class="inline-flex items-center gap-1 text-xs px-2.5 py-1 rounded-lg bg-[#FAF8FF] border border-[#E4DCFA] text-[#7E70A6] font-medium">
                                    <span class="material-symbols-outlined text-[14px]">radio_button_unchecked</span> Huruf kapital
                                </span>
                            </div>

                            <!-- Terms & Conditions Checkbox -->
                            <label class="flex items-start gap-2.5 cursor-pointer select-none group mt-1">
                                <input checked="" class="mt-1 w-4 h-4 rounded border-[#D6C7FF] text-[#5B47E0] accent-[#5B47E0] cursor-pointer focus:ring-[#5B47E0]" required type="checkbox">
                                <span class="text-xs text-[#4A3B75] leading-relaxed">
                                    Saya menyetujui <a class="text-[#5B47E0] hover:underline font-semibold" href="#">Syarat &amp; Ketentuan</a> serta <a class="text-[#5B47E0] hover:underline font-semibold" href="#">Kebijakan Privasi ugoods</a> untuk transaksi mahasiswa Polimedia.
                                </span>
                            </label>

                            <!-- Primary Submission CTA Button -->
                            <button class="w-full mt-2 py-3.5 px-6 rounded-xl bg-[#5B47E0] hover:bg-[#4A35D0] active:scale-[0.99] text-white font-bold text-base transition-all duration-200 flex items-center justify-center gap-2 shadow-lg shadow-[#5B47E0]/30 cursor-pointer group" type="submit">
                                <span>Daftar Akun Baru &amp; Unggah KTM</span>
                                <span class="material-symbols-outlined text-[20px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
                            </button>
                        </form>

                        <!-- Security & Campus Trust Notice Box -->
                        <div class="relative z-10 mt-5 p-3.5 rounded-xl bg-[#FAF8FF] border border-[#E4DCFA] flex items-start gap-3">
                            <span class="material-symbols-outlined text-[18px] text-emerald-600 shrink-0 mt-0.5">verified</span>
                            <div class="flex flex-col gap-0.5">
                                <span class="text-xs font-bold text-[#1A0D3F]">Akses Terbatas Kampus</span>
                                <p class="text-xs text-[#4A3B75]">
                                    Penjualan &amp; pembelian barang khusus civitas akademika aktif dengan verifikasi email/KTM. Bebas calo &amp; bebas penipuan.
                                </p>
                            </div>
                        </div>

                        <!-- Login Shortcut Link -->
                        <div class="relative z-10 mt-5 text-center">
                            <p class="text-xs sm:text-sm text-[#4A3B75]">
                                Sudah punya akun ugoods? 
                                <a class="text-[#5B47E0] hover:text-[#4A35D0] font-bold underline-offset-4 hover:underline transition-colors ml-1" href="{{ url('/login') }}">
                                    Masuk di sini →
                                </a>
                            </p>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Security & Status Indicator -->
            <div class="mt-8 pt-4 flex flex-wrap items-center justify-between gap-3 border-t border-[#E4DCFA]">
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span class="text-xs text-[#7E70A6] font-medium">
                        ugoods verified campus secure 256-bit SSL encrypted registration
                    </span>
                </div>
                <div class="flex items-center gap-4 text-[#7E70A6] text-xs font-medium">
                    <span class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-[15px] text-[#5B47E0]">shield</span> Midtrans Payment Gateway
                    </span>
                    <span class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-[15px] text-[#059669]">map</span> Kampus Polimedia Jakarta
                    </span>
                </div>
            </div>
        </div>
    </main>

    <!-- Auth Simple Footer -->
    <footer class="w-full bg-white/80 backdrop-blur-xl py-4 border-t border-[#E4DCFA]">
        <div class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-2">
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
    function previewKtmFile(input) {
        if (input.files && input.files[0]) {
            const fileName = input.files[0].name;
            document.getElementById('ktm-filename').textContent = 'File terpilih: ' + fileName;
            document.getElementById('ktm-icon').textContent = 'check_circle';
            document.getElementById('ktm-icon').classList.remove('text-[#5B47E0]');
            document.getElementById('ktm-icon').classList.add('text-emerald-600');
        }
    }
</script>
@endpush
