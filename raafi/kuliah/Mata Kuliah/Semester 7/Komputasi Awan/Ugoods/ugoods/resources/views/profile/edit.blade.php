@extends('layouts.app')

@section('title', 'Profil Mahasiswa & Lokasi COD - ugoods')

@section('content')
  <div class="flex flex-col w-full">
    <div class="max-w-4xl mx-auto w-full py-space-xl px-margin md:px-margin-tablet lg:px-margin-desktop space-y-space-lg">

      <!-- Breadcrumb & Status Pill -->
      <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-space-sm">
        <nav aria-label="Breadcrumb" class="flex items-center gap-space-xs font-label-md text-label-md">
          <a class="text-outline hover:text-on-surface transition-colors" href="{{ url('/') }}">Beranda</a>
          <span class="text-outline-variant">/</span>
          <a class="text-outline hover:text-on-surface transition-colors" href="{{ route('profile.edit') }}">Akun Saya</a>
          <span class="text-outline-variant">/</span>
          <span class="text-primary-fixed-dim font-semibold">Pengaturan Profil</span>
        </nav>
        <div
          class="flex items-center gap-space-xs px-space-sm py-space-2xs rounded-full bg-surface-container-high text-tertiary self-start sm:self-auto shadow-sm">
          <span class="w-2 h-2 rounded-full bg-tertiary animate-pulse"></span>
          <span class="font-label-sm text-label-sm font-semibold tracking-wide">Status Akun Aktif</span>
        </div>
      </div>

      @if (session('success'))
        <div class="p-4 rounded-xl bg-tertiary-container/30 border border-tertiary text-on-surface flex items-center justify-between gap-3 shadow-lg">
          <div class="flex items-center gap-3">
            <span class="material-symbols-outlined text-tertiary text-2xl">check_circle</span>
            <span class="font-medium text-sm md:text-base">{{ session('success') }}</span>
          </div>
          <a href="#lapak-saya" class="px-3 py-1 rounded-lg bg-tertiary text-on-tertiary text-xs font-semibold hover:opacity-90 transition-opacity">
            Lihat Lapak
          </a>
        </div>
      @endif

      <!-- FORM UTAMA PROFIL (Memilih Foto, Mengubah Identitas & Lokasi COD) -->
      <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" id="profile-form">
        @csrf

        <!-- User Header Card -->
        <section class="bg-surface-container rounded-xl p-space-lg sm:p-space-xl relative overflow-hidden shadow-xl mb-space-lg">
          <!-- Glow ambient backdrop -->
          <div class="absolute -right-16 -top-16 w-72 h-72 rounded-full bg-primary-container/15 blur-3xl pointer-events-none"></div>
          <div class="absolute left-1/3 bottom-0 w-48 h-48 rounded-full bg-secondary-container/10 blur-2xl pointer-events-none"></div>

          <div class="relative z-10 flex flex-col lg:flex-row lg:items-center justify-between gap-space-lg">
            <!-- Left: Student Info & Avatar Upload Box -->
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-space-md">
              
              <!-- AVATAR CONTAINER -->
              <div class="relative flex-shrink-0">
                <div class="w-20 h-20 rounded-full bg-surface-container-highest shadow-inner flex items-center justify-center relative overflow-hidden group">
                  
                  <!-- TAMPILKAN FOTO AVATAR JIKA SUDAH ADA -->
                  @if(Auth::user()->avatar)
                    <img id="avatarPreview" src="{{ asset('storage/' . Auth::user()->avatar) }}" class="w-full h-full object-cover" alt="Foto Profil {{ Auth::user()->name }}">
                    <div id="avatarInitials" class="hidden w-full h-full bg-gradient-to-tr from-primary-container to-secondary-container/40 flex items-center justify-center text-on-primary-container font-headline-lg font-bold">
                      {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 2)) }}
                    </div>
                  @else
                    <div id="avatarInitials" class="w-full h-full bg-gradient-to-tr from-primary-container to-secondary-container/40 flex items-center justify-center text-on-primary-container font-headline-lg font-bold">
                      {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 2)) }}
                    </div>
                    <img id="avatarPreview" class="hidden w-full h-full object-cover" alt="Preview Foto Profil">
                  @endif

                  <!-- INPUT FILE TERSEMBUNYI UNTUK AVATAR -->
                  <input type="file" name="avatar" id="avatarInput" accept="image/jpeg,image/png,image/jpg,image/webp" class="hidden" onchange="previewAvatarImage(this)">

                  <!-- BUTTON OVERLAY KAMERA -->
                  <button type="button" onclick="document.getElementById('avatarInput').click();" aria-label="Ganti Foto Profil" class="absolute inset-0 bg-surface-container-lowest/70 backdrop-blur-xs opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center text-on-surface cursor-pointer">
                    <span class="material-symbols-outlined text-[20px]">photo_camera</span>
                    <span class="font-label-sm text-[10px]">Ubah</span>
                  </button>
                </div>
                
                <div class="absolute -bottom-1 -right-1 w-6 h-6 rounded-full bg-tertiary text-on-tertiary flex items-center justify-center shadow-md">
                  <span class="material-symbols-outlined text-[15px] font-bold">check</span>
                </div>
              </div>

              <!-- USER DETAILS -->
              <div class="space-y-space-2xs min-w-0">
                <div class="flex flex-wrap items-center gap-space-xs">
                  <h1 class="font-headline-lg text-headline-md sm:text-headline-lg text-on-surface tracking-tight">
                    {{ Auth::user()->name }}
                  </h1>
                  @if(Auth::user()->ktm_status === 'verified')
                    <span class="material-symbols-outlined text-secondary text-[20px]" title="Identitas Kampus Terverifikasi">verified</span>
                  @endif
                </div>
                <p class="font-body-md text-body-md text-on-surface-variant line-clamp-1">
                  {{ Auth::user()->campus_cod_location ?? 'Titik COD Kampus Belum Diatur' }}
                </p>
                <div class="flex flex-wrap items-center gap-space-xs pt-space-xs">
                  <span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-space-xs py-space-2xs rounded bg-surface-container-lowest text-on-surface-variant">
                    <span class="material-symbols-outlined text-[13px] text-primary">mail</span> {{ Auth::user()->email }}
                  </span>
                  <span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-space-xs py-space-2xs rounded bg-surface-container-lowest text-on-surface-variant">
                    <span class="material-symbols-outlined text-[13px] text-tertiary">chat</span>
                    {{ Auth::user()->whatsapp_number ?? 'Belum ada No. WA' }}
                  </span>
                </div>
              </div>
            </div>

            <!-- Right: Stats & Public View -->
            <div class="flex flex-col sm:flex-row lg:flex-col items-start sm:items-center lg:items-end justify-between gap-space-sm pt-space-sm lg:pt-0">
              
              <!-- STATUS VERIFIKASI KTM DINAMIS -->
              @if(Auth::user()->ktm_status === 'verified')
                <div class="flex items-center gap-space-xs px-space-sm py-space-xs rounded-full bg-emerald-500/20 text-emerald-400 border border-emerald-500/30">
                  <span class="material-symbols-outlined text-[16px]">verified_user</span>
                  <span class="font-label-sm text-label-sm font-semibold">User Terverifikasi KTM</span>
                </div>
              @elseif(Auth::user()->ktm_status === 'rejected')
                <div class="flex items-center gap-space-xs px-space-sm py-space-xs rounded-full bg-rose-500/20 text-rose-400 border border-rose-500/30">
                  <span class="material-symbols-outlined text-[16px]">error</span>
                  <span class="font-label-sm text-label-sm font-semibold">Verifikasi KTM Ditolak</span>
                </div>
              @else
                <div class="flex items-center gap-space-xs px-space-sm py-space-xs rounded-full bg-amber-500/20 text-amber-400 border border-amber-500/30">
                  <span class="material-symbols-outlined text-[16px]">hourglass_top</span>
                  <span class="font-label-sm text-label-sm font-semibold">KTM Sedang Ditinjau Admin</span>
                </div>
              @endif

              <div class="flex items-center gap-space-sm text-left lg:text-right">
                <div>
                  <div class="font-headline-sm text-headline-sm text-on-surface flex items-center lg:justify-end gap-1">
                    <span>{{ Auth::user()->products()->count() }} Barang di Lapak</span>
                    - <span class="text-secondary font-body-sm text-body-sm">5.0 ★</span>
                  </div>
                  <p class="font-body-sm text-body-sm text-outline">100% Reputasi COD Aman</p>
                </div>
              </div>
              <a class="inline-flex items-center gap-space-xs px-space-sm py-space-xs rounded-lg bg-surface-container-high hover:bg-surface-bright text-on-surface font-label-md text-label-md transition-colors shadow-sm"
                href="{{ route('seller.public', Auth::id()) }}" target="_blank">
                <span>Lihat Profil Publik</span>
                <span class="material-symbols-outlined text-[16px]">open_in_new</span>
              </a>
            </div>
          </div>
        </section>

        <!-- Main Settings Form Section -->
        <div class="bg-surface-container rounded-xl p-space-lg sm:p-space-xl space-y-space-xl shadow-xl">
          <!-- Section Header -->
          <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-xs pb-space-sm">
            <div>
              <h2 class="font-headline-md text-headline-md text-on-surface">Pengaturan Profil &amp; Lokasi COD Kampus</h2>
              <p class="font-body-md text-body-md text-on-surface-variant mt-space-2xs">
                Kelola identitas mahasiswa, nomor kontak koordinasi cepat, dan titik temu aman di lingkungan kampus.
              </p>
            </div>
            <span class="font-label-sm text-label-sm text-outline px-space-sm py-space-2xs bg-surface-container-lowest rounded-full self-start sm:self-auto">
              Terakhir Sinkron: Hari ini
            </span>
          </div>

          <!-- Input Grid -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-space-md sm:gap-space-lg">
            <!-- Field 1: Nama Lengkap -->
            <div class="flex flex-col gap-space-xs">
              <label class="font-label-md text-label-md text-on-surface flex items-center justify-between" for="student-name">
                <span>Nama Lengkap Mahasiswa <span class="text-error">*</span></span>
                <span class="font-label-sm text-label-sm text-outline">Sesuai SIAK / KTM</span>
              </label>
              <div class="relative">
                <span class="material-symbols-outlined absolute left-3 top-2.5 text-outline text-[18px]">person</span>
                <input
                  class="w-full h-10 pl-9 pr-3 rounded-lg bg-surface-container-lowest text-on-surface font-body-md text-body-md focus:outline-none focus:ring-1 focus:ring-primary-container transition-all"
                  id="student-name" name="name" required type="text" value="{{ old('name', Auth::user()->name) }}">
              </div>
              <span class="font-body-sm text-body-sm text-outline">Nama ini akan ditampilkan ke mitra transaksi saat proses COD berlangsung.</span>
            </div>

            <!-- Field 2: Email Pribadi -->
            <div class="flex flex-col gap-space-xs">
              <label class="font-label-md text-label-md text-on-surface" for="campus-email">Email Pribadi <span class="text-error">*</span></label>
              <div class="relative">
                <span class="material-symbols-outlined absolute left-3 top-2.5 text-outline text-[18px]">mail</span>
                <input
                  class="w-full h-10 pl-9 pr-3 rounded-lg bg-surface-container-lowest text-on-surface font-body-md text-body-md focus:outline-none focus:ring-1 focus:ring-primary-container transition-all"
                  id="campus-email" name="email" required type="email" value="{{ old('email', Auth::user()->email) }}">
              </div>
              <span class="font-body-sm text-body-sm text-outline">Email aktif untuk notifikasi transaksi &amp; penerimaan invoice.</span>
            </div>

            <!-- Field 3: Nomor WhatsApp Aktif -->
            <div class="flex flex-col gap-space-xs">
              <label class="font-label-md text-label-md text-on-surface" for="student-wa">
                Nomor WhatsApp (Koordinasi COD) <span class="text-error">*</span>
              </label>
              <div class="relative">
                <span class="material-symbols-outlined absolute left-3 top-2.5 text-tertiary text-[18px]">chat</span>
                <input
                  class="w-full h-10 pl-9 pr-3 rounded-lg bg-surface-container-lowest text-on-surface font-body-md text-body-md focus:outline-none focus:ring-1 focus:ring-primary-container transition-all"
                  id="student-wa" name="whatsapp_number" required type="tel" value="{{ old('whatsapp_number', Auth::user()->whatsapp_number) }}">
              </div>
              <span class="font-body-sm text-body-sm text-outline">Dipakai pembeli/penjual untuk konfirmasi posisi real-time saat ketemuan.</span>
            </div>

            <!-- Field 4: Program Studi & Angkatan -->
            <div class="flex flex-col gap-space-xs">
              <label class="font-label-md text-label-md text-on-surface" for="student-prodi">Program Studi &amp; Angkatan</label>
              <div class="relative">
                <span class="material-symbols-outlined absolute left-3 top-2.5 text-outline text-[18px]">palette</span>
                <select class="w-full h-10 pl-9 pr-8 rounded-lg bg-surface-container-lowest text-on-surface font-body-md text-body-md appearance-none focus:outline-none focus:ring-1 focus:ring-primary-container transition-all cursor-pointer" id="student-prodi">
                  <option value="d4-dg">D4 Desain Grafis</option>
                  <option value="d4-animasi">D4 Animasi</option>
                  <option value="d4-trpm" selected>D4 Teknologi Rekayasa Multimedia</option>
                  <option value="d3-penerbitan">D3 Penerbitan / Jurnalistik</option>
                  <option value="d3-fotografi">D3 Fotografi</option>
                  <option value="d3-periklanan">D3 Periklanan</option>
                </select>
                <span class="material-symbols-outlined absolute right-3 top-2.5 text-outline pointer-events-none text-[18px]">expand_more</span>
              </div>
              <span class="font-body-sm text-body-sm text-outline">Membantu calon mitra transaksi mengenali gedung fakultas asalmu.</span>
            </div>

            <!-- Field 5: Titik Temu COD Favorit -->
            <div class="md:col-span-2 flex flex-col gap-space-xs">
              <label class="font-label-md text-label-md text-on-surface flex items-center justify-between" for="campus-spot">
                <span>Titik Temu COD Kampus Utama (Rekomendasi Aman) <span class="text-error">*</span></span>
                <span class="font-label-sm text-label-sm text-tertiary flex items-center gap-1">
                  <span class="material-symbols-outlined text-[13px]">shield</span> Terpantau Security
                </span>
              </label>
              <div class="relative">
                <span class="material-symbols-outlined absolute left-3 top-2.5 text-primary text-[18px]">location_on</span>
                <select class="w-full h-10 pl-9 pr-8 rounded-lg bg-surface-container-lowest text-on-surface font-body-md text-body-md appearance-none focus:outline-none focus:ring-1 focus:ring-primary-container transition-all cursor-pointer" id="campus-spot" name="campus_cod_location">
                  <option value="Lobi Utama Gedung 3 Polimedia Kreatif" {{ Auth::user()->campus_cod_location == 'Lobi Utama Gedung 3 Polimedia Kreatif' ? 'selected' : '' }}>Lobi Utama Gedung 3 Polimedia Kreatif (Dipilih Default)</option>
                  <option value="Kantin Terpadu Kampus Srengseng Sawah" {{ Auth::user()->campus_cod_location == 'Kantin Terpadu Kampus Srengseng Sawah' ? 'selected' : '' }}>Kantin Terpadu Kampus Srengseng Sawah</option>
                  <option value="Selasar Gedung Kuliah Terpadu (GKT Lantai 1)" {{ Auth::user()->campus_cod_location == 'Selasar Gedung Kuliah Terpadu (GKT Lantai 1)' ? 'selected' : '' }}>Selasar Gedung Kuliah Terpadu (GKT Lantai 1)</option>
                  <option value="Gazebo Perpustakaan & Laboratorium Multimedia" {{ Auth::user()->campus_cod_location == 'Gazebo Perpustakaan & Laboratorium Multimedia' ? 'selected' : '' }}>Gazebo Perpustakaan &amp; Laboratorium Multimedia</option>
                  <option value="Hall Depan Pos Keamanan Gerbang Utama" {{ Auth::user()->campus_cod_location == 'Hall Depan Pos Keamanan Gerbang Utama' ? 'selected' : '' }}>Hall Depan Pos Keamanan Gerbang Utama</option>
                </select>
                <span class="material-symbols-outlined absolute right-3 top-2.5 text-outline pointer-events-none text-[18px]">expand_more</span>
              </div>
              <div class="flex items-center gap-space-xs mt-space-2xs text-outline font-body-sm text-body-sm">
                <span class="material-symbols-outlined text-[16px] text-tertiary">check_circle</span>
                <span>Titik temu resmi ugoods selalu berada di area publik yang ramai civitas akademika untuk menjamin keamanan serah terima.</span>
              </div>
            </div>

            <!-- Field 6: Alamat Kos -->
            <div class="md:col-span-2 flex flex-col gap-space-xs">
              <div class="flex items-center justify-between">
                <label class="font-label-md text-label-md text-on-surface" for="student-dorm">Alamat Kos / Tempat Tinggal Pengantaran (Opsional)</label>
                <span class="font-label-sm text-label-sm text-outline">Khusus Opsi Kurir Antar Kos (+Rp 5.000)</span>
              </div>
              <div class="relative">
                <span class="material-symbols-outlined absolute left-3 top-2.5 text-outline text-[18px]">home</span>
                <input class="w-full h-10 pl-9 pr-3 rounded-lg bg-surface-container-lowest text-on-surface font-body-md text-body-md focus:outline-none focus:ring-1 focus:ring-primary-container transition-all" id="student-dorm" name="kos_address" type="text" value="{{ old('kos_address', Auth::user()->kos_address) }}">
              </div>
              <span class="font-body-sm text-body-sm text-outline">Alamat ini hanya dibagikan ke penjual sesama mahasiswa jika kamu memilih opsi layanan antar langsung ke kamar/kos.</span>
            </div>
          </div>

          <!-- KTM Status Section -->
          <div class="rounded-xl bg-surface-container-lowest p-space-md sm:p-space-lg flex flex-col md:flex-row items-stretch md:items-center justify-between gap-space-lg relative overflow-hidden">
            <div class="absolute -left-12 -top-12 w-48 h-48 rounded-full bg-tertiary-container/20 blur-3xl pointer-events-none"></div>
            <div class="space-y-space-xs relative z-10 max-w-md">
              
              <!-- STATUS Keterangan KTM -->
              @if(Auth::user()->ktm_status === 'verified')
                <div class="inline-flex items-center gap-space-xs px-space-sm py-space-2xs rounded-full bg-emerald-500/20 text-emerald-400 font-label-sm text-label-sm font-semibold">
                  <span class="material-symbols-outlined text-[15px]">verified</span>
                  <span>KTM Terverifikasi Admin</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-on-surface">Kartu Tanda Mahasiswa (KTM) Aktif</h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant">
                  Verifikasi resmi disetujui. Akunmu memiliki hak akses penuh untuk transaksi peer-to-peer dan rekber kampus.
                </p>
              @elseif(Auth::user()->ktm_status === 'rejected')
                <div class="inline-flex items-center gap-space-xs px-space-sm py-space-2xs rounded-full bg-rose-500/20 text-rose-400 font-label-sm text-label-sm font-semibold">
                  <span class="material-symbols-outlined text-[15px]">error</span>
                  <span>Verifikasi KTM Ditolak</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-on-surface">Kartu Tanda Mahasiswa Perlu Diperbarui</h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant">
                  Mohon unggah ulang foto KTM yang jelas dan sesuai dengan identitas kampus agar akun dapat divalidasi kembali oleh admin.
                </p>
              @else
                <div class="inline-flex items-center gap-space-xs px-space-sm py-space-2xs rounded-full bg-amber-500/20 text-amber-400 font-label-sm text-label-sm font-semibold">
                  <span class="material-symbols-outlined text-[15px]">hourglass_top</span>
                  <span>KTM Sedang Ditinjau Admin</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-on-surface">Menunggu Persetujuan Admin Kampus</h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant">
                  Dokumen KTM kamu sedang dalam antrean pemeriksaan oleh tim moderator ugoods. Harap menunggu beberapa saat.
                </p>
              @endif

              <div class="flex items-center gap-space-xs text-outline font-label-sm text-label-sm pt-space-xs">
                <span class="material-symbols-outlined text-[15px]">attachment</span>
                <span>File: {{ Auth::user()->ktm_image ? basename(Auth::user()->ktm_image) : 'KTM_Mahasiswa.jpg' }}</span>
              </div>
            </div>

            <!-- Mini Student Card Mockup -->
            <div class="relative z-10 flex-shrink-0 flex flex-col items-center sm:items-end gap-space-xs">
              <div class="w-64 h-36 rounded-lg bg-gradient-to-br from-surface-container-high via-surface-container to-surface-container-lowest p-3 relative flex flex-col justify-between shadow-2xl overflow-hidden select-none">
                <div class="absolute -right-6 -bottom-6 w-24 h-24 rounded-full bg-primary/10 blur-xl pointer-events-none"></div>
                <div class="flex items-center justify-between">
                  <div class="flex items-center gap-1.5">
                    <span class="w-5 h-5 rounded bg-primary-container text-on-primary-container flex items-center justify-center font-headline-sm text-[10px] font-bold">u</span>
                    <div class="flex flex-col">
                      <span class="font-label-sm text-[9px] font-bold tracking-tight text-on-surface">POLIMEDIA KREATIF</span>
                      <span class="font-label-sm text-[7px] text-outline tracking-wider">CAMPUS CARD</span>
                    </div>
                  </div>
                  <span class="font-label-sm text-[8px] px-1.5 py-0.5 rounded bg-surface-container-lowest text-tertiary font-bold tracking-wider">VALID '26</span>
                </div>
                <div class="flex items-center gap-2.5 my-1">
                  <div class="w-11 h-14 rounded bg-surface-bright overflow-hidden flex-shrink-0 relative flex items-center justify-center text-outline">
                    <span class="material-symbols-outlined text-[24px]">face</span>
                  </div>
                  <div class="flex flex-col min-w-0">
                    <span class="font-headline-sm text-[11px] font-bold text-on-surface truncate">{{ strtoupper(Auth::user()->name) }}</span>
                    <span class="font-label-sm text-[9px] text-primary font-mono font-semibold">
                      @if(Auth::user()->ktm_status === 'verified')
                        VERIFIED STUDENT
                      @else
                        PENDING REVIEW
                      @endif
                    </span>
                  </div>
                </div>
                <div class="flex items-center justify-between pt-1">
                  <div class="flex items-center gap-0.5 h-3">
                    <span class="w-1 h-3 bg-outline rounded-2xs"></span>
                    <span class="w-0.5 h-3 bg-outline"></span>
                    <span class="w-1.5 h-3 bg-outline rounded-2xs"></span>
                    <span class="w-0.5 h-3 bg-outline"></span>
                    <span class="w-2 h-3 bg-outline rounded-2xs"></span>
                  </div>
                  <span class="font-label-sm text-[8px] text-outline font-mono tracking-tight">KTM-SECURE-AUTH</span>
                </div>
              </div>
              <button class="text-secondary hover:text-on-surface font-label-sm text-label-sm flex items-center gap-1 transition-colors mt-space-2xs" type="button">
                <span class="material-symbols-outlined text-[14px]">upload_file</span>
                <span>Unggah Ulang KTM Baru</span>
              </button>
            </div>
          </div>

          <!-- Action Buttons -->
          <div class="pt-space-sm flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-space-md">
            <div class="flex items-center gap-space-xs text-outline font-body-sm text-body-sm order-2 sm:order-1">
              <span class="material-symbols-outlined text-[16px] text-secondary">sync</span>
              <span>Perubahan otomatis terintegrasi ke seluruh formulir transaksi COD aktif.</span>
            </div>
            <div class="flex items-center gap-space-sm order-1 sm:order-2">
              <button class="px-space-md py-2.5 rounded-lg bg-surface-container-high hover:bg-surface-bright text-on-surface font-label-md text-label-md transition-colors" type="reset">
                Reset
              </button>
              <button class="px-space-lg py-2.5 rounded-lg bg-primary-container hover:bg-primary-container/90 text-on-primary-container font-label-md text-label-md flex items-center justify-center gap-space-xs shadow-lg transition-transform active:scale-95" type="submit">
                <span class="material-symbols-outlined text-[18px]">check</span>
                <span>Simpan Perubahan</span>
              </button>
            </div>
          </div>
        </div>
      </form>

      <!-- Lapak Jualan Saya Section -->
      <section class="bg-surface-container rounded-xl p-space-lg sm:p-space-xl space-y-space-lg shadow-xl" id="lapak-saya">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm pb-space-sm border-b border-outline-variant/20">
          <div>
            <div class="flex items-center gap-2">
              <span class="w-2.5 h-2.5 rounded-full bg-secondary"></span>
              <h2 class="font-headline-md text-headline-md text-on-surface">Lapak Jualan Saya</h2>
            </div>
            <p class="font-body-md text-body-md text-on-surface-variant mt-1">
              Kelola, perbarui, dan pantau barang preloved yang sedang kamu tawarkan ke teman-teman kampus.
            </p>
          </div>
          <a href="{{ route('seller.products.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-primary text-on-primary font-label-md text-label-md hover:bg-primary-container hover:text-on-primary transition-all shadow-md self-start sm:self-auto shrink-0">
            <span class="material-symbols-outlined text-[18px]">add_circle</span>
            <span>Tambah Barang Baru</span>
          </a>
        </div>

        @php
          $myProducts = Auth::user()->products()->latest()->get();
        @endphp

        @if ($myProducts->isEmpty())
          <div class="py-12 px-6 rounded-2xl bg-surface-container-low text-center flex flex-col items-center justify-center border border-dashed border-outline-variant/30">
            <div class="w-14 h-14 rounded-2xl bg-surface-container-high flex items-center justify-center text-primary mb-3 shadow-sm">
              <span class="material-symbols-outlined text-3xl">storefront</span>
            </div>
            <h3 class="font-headline-sm text-on-surface font-semibold text-base">Belum Ada Barang di Lapak Kamu</h3>
            <p class="font-body-sm text-on-surface-variant max-w-md mt-1 mb-5">
              Punya modul kuliah, kamera, drawing tab, atau perlengkapan kos yang sudah tidak terpakai? Yuk tawarkan ke sesama mahasiswa di ugoods!
            </p>
            <a href="{{ route('seller.products.create') }}" class="inline-flex items-center gap-1.5 px-5 py-2.5 rounded-xl bg-primary-container text-on-primary-container font-label-md text-label-md hover:brightness-110 transition-all shadow-sm">
              <span class="material-symbols-outlined text-[18px]">add</span>
              <span>Mulai Jual Barang</span>
            </a>
          </div>
        @else
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-space-md">
            @foreach ($myProducts as $product)
              <div class="rounded-xl bg-surface-container-low border border-outline-variant/20 overflow-hidden flex flex-col justify-between group hover:border-primary-container/40 transition-all shadow-sm">
                <div>
                  <!-- Image & Badge Container -->
                  <div class="relative aspect-[16/10] w-full bg-surface-container-lowest overflow-hidden">
                    @if ($product->image_path)
                      <img src="{{ \Illuminate\Support\Str::startsWith($product->image_path, 'http') ? $product->image_path : asset('storage/' . $product->image_path) }}" 
                           alt="{{ $product->title }}" 
                           class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @else
                      <div class="w-full h-full flex flex-col items-center justify-center text-outline bg-surface-container-high">
                        <span class="material-symbols-outlined text-3xl">inventory_2</span>
                        <span class="text-[11px] mt-1 font-label-sm">Tanpa Foto</span>
                      </div>
                    @endif
                    <div class="absolute top-2.5 left-2.5 flex items-center gap-1">
                      <span class="px-2 py-0.5 rounded-md bg-surface-container-lowest/90 backdrop-blur-md text-[11px] font-semibold text-secondary shadow-xs">
                        {{ $product->condition_rating ?? '9/10 Like New' }}
                      </span>
                    </div>

                    <!-- STATUS BADGE DINAMIS (PENDING vs TAYANG) -->
                    @php
                        $prodStatus = $product->status ?? 'available';
                    @endphp

                    @if($prodStatus === 'pending')
                      <span class="absolute top-2.5 right-2.5 px-2 py-0.5 rounded-md bg-amber-500/90 text-white text-[10px] font-bold tracking-wide uppercase shadow-xs">
                        Menunggu Kurasi
                      </span>
                    @else
                      <span class="absolute top-2.5 right-2.5 px-2 py-0.5 rounded-md bg-tertiary-container/90 text-on-tertiary-container text-[10px] font-bold tracking-wide uppercase shadow-xs">
                        Tayang
                      </span>
                    @endif

                  </div>

                  <!-- Content Body -->
                  <div class="p-4 space-y-2">
                    <div class="flex items-center justify-between text-outline text-xs">
                      <span class="flex items-center gap-1 truncate max-w-[200px]" title="{{ $product->cod_location }}">
                        <span class="material-symbols-outlined text-[14px] text-secondary">location_on</span>
                        <span class="truncate">{{ $product->cod_location ?? 'Kampus Polimedia' }}</span>
                      </span>
                      <span class="text-on-surface-variant font-mono text-[11px]">
                        {{ $product->created_at ? $product->created_at->diffForHumans(null, true) : 'Baru' }}
                      </span>
                    </div>

                    <h3 class="font-headline-sm text-sm text-on-surface font-semibold line-clamp-2 group-hover:text-primary transition-colors" title="{{ $product->title }}">
                      <a href="{{ route('products.show', $product->slug ?? $product->id) }}">
                        {{ $product->title }}
                      </a>
                    </h3>

                    <div class="pt-1 flex items-baseline justify-between">
                      <span class="font-price-display text-primary font-bold text-base tracking-tight">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                      </span>
                      <a href="{{ route('products.show', $product->slug ?? $product->id) }}" class="text-outline hover:text-on-surface text-xs font-label-sm flex items-center gap-0.5 transition-colors" title="Lihat di katalog">
                        <span>Lihat</span>
                        <span class="material-symbols-outlined text-[13px]">open_in_new</span>
                      </a>
                    </div>
                  </div>
                </div>

                <!-- Action Button Bar -->
                <div class="p-3 pt-0 flex items-center gap-2 border-t border-outline-variant/10 mt-2">
                  <a href="{{ route('products.edit', $product->id) }}" class="flex-1 py-2 px-3 rounded-lg bg-surface-container-high hover:bg-surface-bright text-on-surface font-label-sm text-xs font-semibold flex items-center justify-center gap-1.5 transition-colors shadow-xs">
                    <span class="material-symbols-outlined text-[15px] text-primary">edit</span>
                    <span>Edit Produk</span>
                  </a>
                  <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Apakah kamu yakin ingin menghapus barang \'{{ addslashes($product->title) }}\' dari lapak kamu?');" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full py-2 px-3 rounded-lg bg-error-container/20 hover:bg-error-container text-error hover:text-on-error-container font-label-sm text-xs font-semibold flex items-center justify-center gap-1.5 transition-colors shadow-xs">
                      <span class="material-symbols-outlined text-[15px]">delete</span>
                      <span>Hapus</span>
                    </button>
                  </form>
                </div>
              </div>
            @endforeach
          </div>
        @endif
      </section>

      <!-- Campus Safety Quick Notes Banner -->
      <div class="rounded-xl bg-surface-container-low p-space-md flex items-start gap-space-md">
        <div class="w-8 h-8 rounded-lg bg-primary-container/20 text-primary flex items-center justify-center flex-shrink-0 mt-0.5">
          <span class="material-symbols-outlined text-[20px]">security</span>
        </div>
        <div class="space-y-space-2xs">
          <h4 class="font-label-md text-label-md text-on-surface font-semibold">Protokol Keamanan COD Kampus ugoods</h4>
          <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            Selalu periksa kondisi fisik perlengkapan kuliah (kamera, kalkulator teknik, drawing tab) di tempat umum
            sebelum menyelesaikan pembayaran saldo Rekber ugoods. Hindari transaksi di luar area kampus yang sepi pada
            malam hari.
          </p>
        </div>
      </div>

    </div>
  </div>
@endsection

@push('scripts')
<script>
function previewAvatarImage(input) {
  if (input.files && input.files[0]) {
    const reader = new FileReader();
    reader.onload = function(e) {
      const preview = document.getElementById('avatarPreview');
      const initials = document.getElementById('avatarInitials');
      
      if (preview) {
        preview.src = e.target.result;
        preview.classList.remove('hidden');
      }
      if (initials) {
        initials.classList.add('hidden');
      }
    };
    reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endpush