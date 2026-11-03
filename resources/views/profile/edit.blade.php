@extends('layouts.app')

@section('title', 'Profil Mahasiswa & Lokasi COD - ugoods')

@section('content')
  <div class="flex flex-col w-full">
    <div class="max-w-4xl mx-auto w-full py-8 px-4 md:px-8 space-y-6">

      <!-- Breadcrumb & Status Pill -->
      <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <nav aria-label="Breadcrumb" class="flex items-center gap-2 text-sm text-[#7E70A6] font-medium">
          <a class="hover:text-[#5B47E0] transition-colors" href="{{ url('/') }}">Beranda</a>
          <span class="text-[#D6C7FF]">/</span>
          <a class="hover:text-[#5B47E0] transition-colors" href="{{ route('profile.edit') }}">Akun Saya</a>
          <span class="text-[#D6C7FF]">/</span>
          <span class="text-[#5B47E0] font-semibold">Pengaturan Profil</span>
        </nav>
        <div
          class="flex items-center gap-2 px-3 py-1 rounded-full bg-[#ECFDF5] border border-[#A7F3D0] text-[#065F46] self-start sm:self-auto shadow-xs">
          <span class="w-2 h-2 rounded-full bg-[#059669] animate-pulse"></span>
          <span class="text-xs font-bold tracking-wide">Status Akun Aktif</span>
        </div>
      </div>

      @if (session('success'))
        <div class="p-4 rounded-xl bg-[#D1FAE5] border border-[#A7F3D0] text-[#065F46] flex items-center justify-between gap-3 shadow-md shadow-emerald-900/[0.04]">
          <div class="flex items-center gap-3">
            <span class="material-symbols-outlined text-[#059669] text-2xl">check_circle</span>
            <span class="font-semibold text-sm md:text-base">{{ session('success') }}</span>
          </div>
          <a href="#lapak-saya" class="px-3.5 py-1.5 rounded-lg bg-[#059669] text-white text-xs font-semibold hover:bg-[#047857] transition-colors shadow-xs">
            Lihat Lapak
          </a>
        </div>
      @endif

      <!-- FORM UTAMA PROFIL (Memilih Foto, Mengubah Identitas & Lokasi COD) -->
      <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" id="profile-form">
        @csrf

        <!-- User Header Card -->
        <section class="bg-white rounded-2xl p-6 sm:p-8 relative overflow-hidden shadow-md shadow-purple-100/50 border border-[#E9E3FB] mb-6">
          <!-- Glow ambient backdrop -->
          <div class="absolute -right-16 -top-16 w-72 h-72 rounded-full bg-purple-300/20 blur-3xl pointer-events-none"></div>
          <div class="absolute left-1/3 bottom-0 w-48 h-48 rounded-full bg-pink-300/15 blur-2xl pointer-events-none"></div>

          <div class="relative z-10 flex flex-col lg:flex-row lg:items-center justify-between gap-6">
            <!-- Left: Student Info & Avatar Upload Box -->
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
              
              <!-- AVATAR CONTAINER -->
              <div class="relative flex-shrink-0">
                <div class="w-20 h-20 rounded-full bg-[#F6F3FE] border-2 border-[#D6C7FF] shadow-inner flex items-center justify-center relative overflow-hidden group">
                  
                  <!-- TAMPILKAN FOTO AVATAR JIKA SUDAH ADA -->
                  @if(Auth::user()->avatar)
                    <img id="avatarPreview" src="{{ asset('storage/' . Auth::user()->avatar) }}" class="w-full h-full object-cover" alt="Foto Profil {{ Auth::user()->name }}">
                    <div id="avatarInitials" class="hidden w-full h-full bg-gradient-to-tr from-[#5B47E0] to-[#8B5CF6] flex items-center justify-center text-white font-bold text-xl">
                      {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 2)) }}
                    </div>
                  @else
                    <div id="avatarInitials" class="w-full h-full bg-gradient-to-tr from-[#5B47E0] to-[#8B5CF6] flex items-center justify-center text-white font-bold text-xl">
                      {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 2)) }}
                    </div>
                    <img id="avatarPreview" class="hidden w-full h-full object-cover" alt="Preview Foto Profil">
                  @endif

                  <!-- INPUT FILE TERSEMBUNYI UNTUK AVATAR -->
                  <input type="file" name="avatar" id="avatarInput" accept="image/jpeg,image/png,image/jpg,image/webp" class="hidden" onchange="previewAvatarImage(this)">

                  <!-- BUTTON OVERLAY KAMERA -->
                  <button type="button" onclick="document.getElementById('avatarInput').click();" aria-label="Ganti Foto Profil" class="absolute inset-0 bg-black/50 backdrop-blur-xs opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center text-white cursor-pointer">
                    <span class="material-symbols-outlined text-[20px]">photo_camera</span>
                    <span class="text-[10px] font-medium">Ubah</span>
                  </button>
                </div>
                
                <div class="absolute -bottom-1 -right-1 w-6 h-6 rounded-full bg-emerald-600 text-white flex items-center justify-center shadow-md">
                  <span class="material-symbols-outlined text-[15px] font-bold">check</span>
                </div>
              </div>

              <!-- USER DETAILS -->
              <div class="space-y-1 min-w-0">
                <div class="flex flex-wrap items-center gap-2">
                  <h1 class="text-2xl sm:text-3xl font-extrabold text-[#1A0D3F] tracking-tight">
                    {{ Auth::user()->name }}
                  </h1>
                  @if(Auth::user()->ktm_status === 'verified')
                    <span class="material-symbols-outlined text-emerald-600 text-[20px]" title="Identitas Kampus Terverifikasi">verified</span>
                  @endif
                </div>
                <p class="text-sm text-[#4A3B75] font-medium line-clamp-1">
                  {{ Auth::user()->campus_cod_location ?? 'Titik COD Kampus Belum Diatur' }}
                </p>
                <div class="flex flex-wrap items-center gap-2 pt-1">
                  <span class="inline-flex items-center gap-1 text-xs px-2.5 py-1 rounded-lg bg-[#FAF8FF] border border-[#E4DCFA] text-[#4A3B75] font-medium">
                    <span class="material-symbols-outlined text-[14px] text-[#5B47E0]">mail</span> {{ Auth::user()->email }}
                  </span>
                  <span class="inline-flex items-center gap-1 text-xs px-2.5 py-1 rounded-lg bg-[#FAF8FF] border border-[#E4DCFA] text-[#4A3B75] font-medium">
                    <span class="material-symbols-outlined text-[14px] text-emerald-600">chat</span>
                    {{ Auth::user()->whatsapp_number ?? 'Belum ada No. WA' }}
                  </span>
                </div>
              </div>
            </div>

            <!-- Right: Stats & Public View -->
            <div class="flex flex-col sm:flex-row lg:flex-col items-start sm:items-center lg:items-end justify-between gap-3 pt-2 lg:pt-0">
              
              <!-- STATUS VERIFIKASI KTM DINAMIS (High-Contrast Saturated Badges) -->
              @if(Auth::user()->ktm_status === 'verified')
                <div class="flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-[#D1FAE5] text-[#065F46] border border-[#A7F3D0] shadow-xs">
                  <span class="material-symbols-outlined text-[16px] text-[#059669]">verified_user</span>
                  <span class="text-xs font-bold">User Terverifikasi KTM</span>
                </div>
              @elseif(Auth::user()->ktm_status === 'rejected')
                <div class="flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-[#FFE4E6] text-[#9F1239] border border-[#FECDD3] shadow-xs">
                  <span class="material-symbols-outlined text-[16px] text-[#E11D48]">error</span>
                  <span class="text-xs font-bold">Verifikasi KTM Ditolak</span>
                </div>
              @else
                <div class="flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-[#FEF3C7] text-[#92400E] border border-[#FDE68A] shadow-xs">
                  <span class="material-symbols-outlined text-[16px] text-[#D97706]">hourglass_top</span>
                  <span class="text-xs font-bold">KTM Sedang Ditinjau Admin</span>
                </div>
              @endif

              <div class="flex items-center gap-2 text-left lg:text-right">
                <div>
                  <div class="text-sm font-bold text-[#1A0D3F] flex items-center lg:justify-end gap-1">
                    <span>{{ Auth::user()->products()->count() }} Barang di Lapak</span>
                    - <span class="text-amber-500 font-bold">5.0 ★</span>
                  </div>
                  <p class="text-xs text-[#7E70A6] font-medium">100% Reputasi COD Aman</p>
                </div>
              </div>
              <a class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-white border border-[#E4DCFA] hover:bg-[#FAF8FF] text-[#5B47E0] font-semibold text-xs transition-all shadow-xs"
                href="{{ route('seller.public', Auth::id()) }}" target="_blank">
                <span>Lihat Profil Publik</span>
                <span class="material-symbols-outlined text-[15px]">open_in_new</span>
              </a>
            </div>
          </div>
        </section>

        <!-- Main Settings Form Section -->
        <div class="bg-white rounded-2xl p-6 sm:p-8 space-y-6 shadow-md shadow-purple-100/50 border border-[#E9E3FB]">
          <!-- Section Header -->
          <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-4 border-b border-[#F0EBFD]">
            <div>
              <h2 class="text-xl sm:text-2xl font-bold text-[#1A0D3F]">Pengaturan Profil &amp; Lokasi COD Kampus</h2>
              <p class="text-sm text-[#4A3B75] mt-1 font-medium">
                Kelola identitas mahasiswa, nomor kontak koordinasi cepat, dan titik temu aman di lingkungan kampus.
              </p>
            </div>
            <span class="text-xs text-[#7E70A6] font-semibold px-3 py-1 bg-[#FAF8FF] border border-[#E4DCFA] rounded-full self-start sm:self-auto">
              Terakhir Sinkron: Hari ini
            </span>
          </div>

          <!-- Input Grid -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-6">
            <!-- Field 1: Nama Lengkap -->
            <div class="flex flex-col gap-1.5">
              <label class="text-sm text-[#1A0D3F] font-semibold flex items-center justify-between" for="student-name">
                <span>Nama Lengkap Mahasiswa <span class="text-rose-500">*</span></span>
                <span class="text-xs text-[#7E70A6] font-normal">Sesuai SIAK / KTM</span>
              </label>
              <div class="relative">
                <span class="material-symbols-outlined absolute left-3 top-3 text-[#7E70A6] text-[18px]">person</span>
                <input
                  class="w-full h-11 pl-10 pr-3 rounded-xl border border-[#E4DCFA] bg-[#FAF8FF] text-[#1A0D3F] placeholder-[#7E70A6] font-medium text-sm focus:outline-none focus:bg-white focus:border-[#5B47E0] focus:ring-2 focus:ring-[#5B47E0]/20 transition-all shadow-2xs"
                  id="student-name" name="name" required type="text" value="{{ old('name', Auth::user()->name) }}" placeholder="Nama Lengkap Mahasiswa">
              </div>
              <span class="text-xs text-[#7E70A6]">Nama ini akan ditampilkan ke mitra transaksi saat proses COD berlangsung.</span>
            </div>

            <!-- Field 2: Email Pribadi -->
            <div class="flex flex-col gap-1.5">
              <label class="text-sm text-[#1A0D3F] font-semibold" for="campus-email">Email Pribadi <span class="text-rose-500">*</span></label>
              <div class="relative">
                <span class="material-symbols-outlined absolute left-3 top-3 text-[#7E70A6] text-[18px]">mail</span>
                <input
                  class="w-full h-11 pl-10 pr-3 rounded-xl border border-[#E4DCFA] bg-[#FAF8FF] text-[#1A0D3F] placeholder-[#7E70A6] font-medium text-sm focus:outline-none focus:bg-white focus:border-[#5B47E0] focus:ring-2 focus:ring-[#5B47E0]/20 transition-all shadow-2xs"
                  id="campus-email" name="email" required type="email" value="{{ old('email', Auth::user()->email) }}" placeholder="email@kampus.ac.id">
              </div>
              <span class="text-xs text-[#7E70A6]">Email aktif untuk notifikasi transaksi &amp; penerimaan invoice.</span>
            </div>

            <!-- Field 3: Nomor WhatsApp Aktif -->
            <div class="flex flex-col gap-1.5">
              <label class="text-sm text-[#1A0D3F] font-semibold" for="student-wa">
                Nomor WhatsApp (Koordinasi COD) <span class="text-rose-500">*</span>
              </label>
              <div class="relative">
                <span class="material-symbols-outlined absolute left-3 top-3 text-emerald-600 text-[18px]">chat</span>
                <input
                  class="w-full h-11 pl-10 pr-3 rounded-xl border border-[#E4DCFA] bg-[#FAF8FF] text-[#1A0D3F] placeholder-[#7E70A6] font-medium text-sm focus:outline-none focus:bg-white focus:border-[#5B47E0] focus:ring-2 focus:ring-[#5B47E0]/20 transition-all shadow-2xs"
                  id="student-wa" name="whatsapp_number" required type="tel" value="{{ old('whatsapp_number', Auth::user()->whatsapp_number) }}" placeholder="08xxxxxxxxxx">
              </div>
              <span class="text-xs text-[#7E70A6]">Dipakai pembeli/penjual untuk konfirmasi posisi real-time saat ketemuan.</span>
            </div>

            <!-- Field 4: Program Studi & Angkatan -->
            <div class="flex flex-col gap-1.5">
              <label class="text-sm text-[#1A0D3F] font-semibold" for="student-prodi">Program Studi &amp; Angkatan</label>
              <div class="relative">
                <span class="material-symbols-outlined absolute left-3 top-3 text-[#7E70A6] text-[18px]">palette</span>
                <select class="w-full h-11 pl-10 pr-9 rounded-xl border border-[#E4DCFA] bg-[#FAF8FF] text-[#1A0D3F] font-medium text-sm appearance-none focus:outline-none focus:bg-white focus:border-[#5B47E0] focus:ring-2 focus:ring-[#5B47E0]/20 transition-all cursor-pointer shadow-2xs" id="student-prodi">
                  <option value="d4-dg">D4 Desain Grafis</option>
                  <option value="d4-animasi">D4 Animasi</option>
                  <option value="d4-trpm" selected>D4 Teknologi Rekayasa Multimedia</option>
                  <option value="d3-penerbitan">D3 Penerbitan / Jurnalistik</option>
                  <option value="d3-fotografi">D3 Fotografi</option>
                  <option value="d3-periklanan">D3 Periklanan</option>
                </select>
                <span class="material-symbols-outlined absolute right-3 top-3 text-[#7E70A6] pointer-events-none text-[18px]">expand_more</span>
              </div>
              <span class="text-xs text-[#7E70A6]">Membantu calon mitra transaksi mengenali gedung fakultas asalmu.</span>
            </div>

            <!-- Field 5: Titik Temu COD Favorit -->
            <div class="md:col-span-2 flex flex-col gap-1.5">
              <label class="text-sm text-[#1A0D3F] font-semibold flex items-center justify-between" for="campus-spot">
                <span>Titik Temu COD Kampus Utama (Rekomendasi Aman) <span class="text-rose-500">*</span></span>
                <span class="text-xs text-emerald-700 flex items-center gap-1 font-semibold">
                  <span class="material-symbols-outlined text-[14px]">shield</span> Terpantau Security
                </span>
              </label>
              <div class="relative">
                <span class="material-symbols-outlined absolute left-3 top-3 text-[#5B47E0] text-[18px]">location_on</span>
                <select class="w-full h-11 pl-10 pr-9 rounded-xl border border-[#E4DCFA] bg-[#FAF8FF] text-[#1A0D3F] font-medium text-sm appearance-none focus:outline-none focus:bg-white focus:border-[#5B47E0] focus:ring-2 focus:ring-[#5B47E0]/20 transition-all cursor-pointer shadow-2xs" id="campus-spot" name="campus_cod_location">
                  <option value="Lobi Utama Gedung 3 Polimedia Kreatif" {{ Auth::user()->campus_cod_location == 'Lobi Utama Gedung 3 Polimedia Kreatif' ? 'selected' : '' }}>Lobi Utama Gedung 3 Polimedia Kreatif (Dipilih Default)</option>
                  <option value="Kantin Terpadu Kampus Srengseng Sawah" {{ Auth::user()->campus_cod_location == 'Kantin Terpadu Kampus Srengseng Sawah' ? 'selected' : '' }}>Kantin Terpadu Kampus Srengseng Sawah</option>
                  <option value="Selasar Gedung Kuliah Terpadu (GKT Lantai 1)" {{ Auth::user()->campus_cod_location == 'Selasar Gedung Kuliah Terpadu (GKT Lantai 1)' ? 'selected' : '' }}>Selasar Gedung Kuliah Terpadu (GKT Lantai 1)</option>
                  <option value="Gazebo Perpustakaan & Laboratorium Multimedia" {{ Auth::user()->campus_cod_location == 'Gazebo Perpustakaan & Laboratorium Multimedia' ? 'selected' : '' }}>Gazebo Perpustakaan &amp; Laboratorium Multimedia</option>
                  <option value="Hall Depan Pos Keamanan Gerbang Utama" {{ Auth::user()->campus_cod_location == 'Hall Depan Pos Keamanan Gerbang Utama' ? 'selected' : '' }}>Hall Depan Pos Keamanan Gerbang Utama</option>
                </select>
                <span class="material-symbols-outlined absolute right-3 top-3 text-[#7E70A6] pointer-events-none text-[18px]">expand_more</span>
              </div>
              <div class="flex items-center gap-2 mt-1 text-[#7E70A6] text-xs">
                <span class="material-symbols-outlined text-[16px] text-emerald-600">check_circle</span>
                <span>Titik temu resmi ugoods selalu berada di area publik yang ramai civitas akademika untuk menjamin keamanan serah terima.</span>
              </div>
            </div>

            <!-- Field 6: Alamat Kos -->
            <div class="md:col-span-2 flex flex-col gap-1.5">
              <div class="flex items-center justify-between">
                <label class="text-sm text-[#1A0D3F] font-semibold" for="student-dorm">Alamat Kos / Tempat Tinggal Pengantaran (Opsional)</label>
                <span class="text-xs text-[#7E70A6]">Khusus Opsi Kurir Antar Kos (+Rp 5.000)</span>
              </div>
              <div class="relative">
                <span class="material-symbols-outlined absolute left-3 top-3 text-[#7E70A6] text-[18px]">home</span>
                <input class="w-full h-11 pl-10 pr-3 rounded-xl border border-[#E4DCFA] bg-[#FAF8FF] text-[#1A0D3F] placeholder-[#7E70A6] font-medium text-sm focus:outline-none focus:bg-white focus:border-[#5B47E0] focus:ring-2 focus:ring-[#5B47E0]/20 transition-all shadow-2xs" id="student-dorm" name="kos_address" type="text" value="{{ old('kos_address', Auth::user()->kos_address) }}" placeholder="Contoh: Jl. Srengseng Sawah No. 12, Kos Mahasiswa Kamar 3B">
              </div>
              <span class="text-xs text-[#7E70A6]">Alamat ini hanya dibagikan ke penjual sesama mahasiswa jika kamu memilih opsi layanan antar langsung ke kamar/kos.</span>
            </div>
          </div>

          <!-- KTM Status Section -->
          <div class="rounded-2xl bg-[#FAF8FF] border border-[#E4DCFA] p-5 sm:p-6 flex flex-col md:flex-row items-stretch md:items-center justify-between gap-6 relative overflow-hidden">
            <div class="absolute -left-12 -top-12 w-48 h-48 rounded-full bg-purple-200/20 blur-3xl pointer-events-none"></div>
            <div class="space-y-2 relative z-10 max-w-md">
              
              <!-- STATUS Keterangan KTM -->
              @if(Auth::user()->ktm_status === 'verified')
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 border border-emerald-200 text-xs font-semibold">
                  <span class="material-symbols-outlined text-[15px]">verified</span>
                  <span>KTM Terverifikasi Admin</span>
                </div>
                <h3 class="text-base font-bold text-[#1A0D3F]">Kartu Tanda Mahasiswa (KTM) Aktif</h3>
                <p class="text-xs sm:text-sm text-[#4A3B75] leading-relaxed">
                  Verifikasi resmi disetujui. Akunmu memiliki hak akses penuh untuk transaksi peer-to-peer dan rekber kampus.
                </p>
              @elseif(Auth::user()->ktm_status === 'rejected')
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-rose-100 text-rose-800 border border-rose-200 text-xs font-semibold">
                  <span class="material-symbols-outlined text-[15px]">error</span>
                  <span>Verifikasi KTM Ditolak</span>
                </div>
                <h3 class="text-base font-bold text-[#1A0D3F]">Kartu Tanda Mahasiswa Perlu Diperbarui</h3>
                <p class="text-xs sm:text-sm text-[#4A3B75] leading-relaxed">
                  Mohon unggah ulang foto KTM yang jelas dan sesuai dengan identitas kampus agar akun dapat divalidasi kembali oleh admin.
                </p>
              @else
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-100 text-amber-800 border border-amber-200 text-xs font-semibold">
                  <span class="material-symbols-outlined text-[15px]">hourglass_top</span>
                  <span>KTM Sedang Ditinjau Admin</span>
                </div>
                <h3 class="text-base font-bold text-[#1A0D3F]">Menunggu Persetujuan Admin Kampus</h3>
                <p class="text-xs sm:text-sm text-[#4A3B75] leading-relaxed">
                  Dokumen KTM kamu sedang dalam antrean pemeriksaan oleh tim moderator ugoods. Harap menunggu beberapa saat.
                </p>
              @endif

              <div class="flex items-center gap-1.5 text-[#7E70A6] text-xs pt-1">
                <span class="material-symbols-outlined text-[15px]">attachment</span>
                <span>File: {{ Auth::user()->ktm_image ? basename(Auth::user()->ktm_image) : 'KTM_Mahasiswa.jpg' }}</span>
              </div>
            </div>

            <!-- Mini Student Card Mockup -->
            <div class="relative z-10 flex-shrink-0 flex flex-col items-center sm:items-end gap-2">
              <div class="w-64 h-36 rounded-xl bg-gradient-to-br from-white via-[#FAF8FF] to-[#F1EBFC] p-3.5 relative flex flex-col justify-between shadow-md border border-[#E4DCFA] select-none">
                <div class="absolute -right-6 -bottom-6 w-24 h-24 rounded-full bg-[#5B47E0]/10 blur-xl pointer-events-none"></div>
                <div class="flex items-center justify-between">
                  <div class="flex items-center gap-1.5">
                    <span class="w-5 h-5 rounded-md bg-[#5B47E0] text-white flex items-center justify-center text-[10px] font-bold">u</span>
                    <div class="flex flex-col">
                      <span class="text-[9px] font-bold tracking-tight text-[#1A0D3F]">POLIMEDIA KREATIF</span>
                      <span class="text-[7px] text-[#7E70A6] tracking-wider font-semibold">CAMPUS CARD</span>
                    </div>
                  </div>
                  <span class="text-[8px] px-1.5 py-0.5 rounded bg-white border border-[#E4DCFA] text-emerald-700 font-bold tracking-wider">VALID '26</span>
                </div>
                <div class="flex items-center gap-2.5 my-1">
                  <div class="w-11 h-14 rounded-lg bg-[#F5F3FF] border border-[#E4DCFA] overflow-hidden flex-shrink-0 relative flex items-center justify-center text-[#7E70A6]">
                    <span class="material-symbols-outlined text-[24px]">face</span>
                  </div>
                  <div class="flex flex-col min-w-0">
                    <span class="text-[11px] font-bold text-[#1A0D3F] truncate">{{ strtoupper(Auth::user()->name) }}</span>
                    <span class="text-[9px] text-[#5B47E0] font-mono font-bold">
                      @if(Auth::user()->ktm_status === 'verified')
                        VERIFIED STUDENT
                      @else
                        PENDING REVIEW
                      @endif
                    </span>
                  </div>
                </div>
                <div class="flex items-center justify-between pt-1 border-t border-[#E4DCFA]/60">
                  <div class="flex items-center gap-0.5 h-3">
                    <span class="w-1 h-3 bg-[#7E70A6] rounded-2xs"></span>
                    <span class="w-0.5 h-3 bg-[#7E70A6]"></span>
                    <span class="w-1.5 h-3 bg-[#7E70A6] rounded-2xs"></span>
                    <span class="w-0.5 h-3 bg-[#7E70A6]"></span>
                    <span class="w-2 h-3 bg-[#7E70A6] rounded-2xs"></span>
                  </div>
                  <span class="text-[8px] text-[#7E70A6] font-mono tracking-tight font-semibold">KTM-SECURE-AUTH</span>
                </div>
              </div>
              <button class="text-[#5B47E0] hover:text-[#4A35D0] font-semibold text-xs flex items-center gap-1 transition-colors mt-1" type="button">
                <span class="material-symbols-outlined text-[14px]">upload_file</span>
                <span>Unggah Ulang KTM Baru</span>
              </button>
            </div>
          </div>

          <!-- Action Buttons -->
          <div class="pt-2 flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-4 border-t border-[#F0EBFD]">
            <div class="flex items-center gap-2 text-[#7E70A6] text-xs order-2 sm:order-1 font-medium">
              <span class="material-symbols-outlined text-[16px] text-[#5B47E0]">sync</span>
              <span>Perubahan otomatis terintegrasi ke seluruh formulir transaksi COD aktif.</span>
            </div>
            <div class="flex items-center gap-3 order-1 sm:order-2">
              <button class="px-5 py-2.5 rounded-xl bg-white border border-[#E4DCFA] hover:bg-[#FAF8FF] text-[#4A3B75] font-semibold text-sm transition-all" type="reset">
                Reset
              </button>
              <button class="px-6 py-2.5 rounded-xl bg-[#5B47E0] hover:bg-[#4A35D0] text-white font-semibold text-sm flex items-center justify-center gap-2 shadow-md shadow-[#5B47E0]/30 transition-all active:scale-95" type="submit">
                <span class="material-symbols-outlined text-[18px]">check</span>
                <span>Simpan Perubahan</span>
              </button>
            </div>
          </div>
        </div>
      </form>

      <!-- Lapak Jualan Saya Section -->
      <section class="bg-white rounded-2xl p-6 sm:p-8 space-y-6 shadow-md shadow-purple-100/50 border border-[#E9E3FB]" id="lapak-saya">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-4 border-b border-[#F0EBFD]">
          <div>
            <div class="flex items-center gap-2">
              <span class="w-2.5 h-2.5 rounded-full bg-[#5B47E0]"></span>
              <h2 class="text-xl sm:text-2xl font-bold text-[#1A0D3F]">Lapak Jualan Saya</h2>
            </div>
            <p class="text-sm text-[#4A3B75] mt-1 font-medium">
              Kelola, perbarui, dan pantau barang preloved yang sedang kamu tawarkan ke teman-teman kampus.
            </p>
          </div>
          <a href="{{ route('seller.products.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#5B47E0] text-white font-semibold text-xs sm:text-sm hover:bg-[#4A35D0] transition-all shadow-md shadow-[#5B47E0]/25 self-start sm:self-auto shrink-0">
            <span class="material-symbols-outlined text-[18px]">add_circle</span>
            <span>Tambah Barang Baru</span>
          </a>
        </div>

        @php
          $myProducts = Auth::user()->products()->latest()->get();
        @endphp

        @if ($myProducts->isEmpty())
          <div class="py-12 px-6 rounded-2xl bg-[#FAF8FF] text-center flex flex-col items-center justify-center border border-dashed border-[#D6C7FF]">
            <div class="w-14 h-14 rounded-2xl bg-[#F6F3FE] border border-[#E9E3FB] flex items-center justify-center text-[#5B47E0] mb-3 shadow-xs">
              <span class="material-symbols-outlined text-3xl">storefront</span>
            </div>
            <h3 class="text-base font-bold text-[#1A0D3F]">Belum Ada Barang di Lapak Kamu</h3>
            <p class="text-sm text-[#4A3B75] max-w-md mt-1 mb-5">
              Punya modul kuliah, kamera, drawing tab, atau perlengkapan kos yang sudah tidak terpakai? Yuk tawarkan ke sesama mahasiswa di ugoods!
            </p>
            <a href="{{ route('seller.products.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#5B47E0] text-white font-semibold text-sm hover:bg-[#4A35D0] transition-all shadow-md shadow-[#5B47E0]/25">
              <span class="material-symbols-outlined text-[18px]">add</span>
              <span>Mulai Jual Barang</span>
            </a>
          </div>
        @else
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach ($myProducts as $product)
              <div class="rounded-2xl bg-white border border-[#E4DCFA] overflow-hidden flex flex-col justify-between group hover:border-[#C4B5FD] transition-all shadow-sm shadow-purple-100/50">
                <div>
                  <!-- Image & Badge Container -->
                  <div class="relative aspect-[16/10] w-full bg-[#F6F3FE] overflow-hidden">
                    @if ($product->image_path)
                      <img src="{{ \Illuminate\Support\Str::startsWith($product->image_path, 'http') ? $product->image_path : asset('storage/' . $product->image_path) }}" 
                           alt="{{ $product->title }}" 
                           class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @else
                      <div class="w-full h-full flex flex-col items-center justify-center text-[#7E70A6] bg-[#F6F3FE]">
                        <span class="material-symbols-outlined text-3xl">inventory_2</span>
                        <span class="text-[11px] mt-1 font-semibold">Tanpa Foto</span>
                      </div>
                    @endif
                    <div class="absolute top-2.5 left-2.5 flex items-center gap-1">
                      <span class="px-2 py-0.5 rounded-md bg-white/90 backdrop-blur-md text-[11px] font-bold text-[#5B47E0] border border-[#E4DCFA] shadow-xs">
                        {{ $product->condition_rating ?? '9/10 Like New' }}
                      </span>
                    </div>

                    <!-- STATUS BADGE DINAMIS (PENDING vs TAYANG) -->
                    @php
                        $prodStatus = $product->status ?? 'available';
                    @endphp

                    @if($prodStatus === 'pending')
                      <span class="absolute top-2.5 right-2.5 px-2.5 py-0.5 rounded-md bg-amber-100 text-amber-800 border border-amber-200 text-[10px] font-bold tracking-wide uppercase shadow-xs">
                        Menunggu Kurasi
                      </span>
                    @else
                      <span class="absolute top-2.5 right-2.5 px-2.5 py-0.5 rounded-md bg-emerald-100 text-emerald-800 border border-emerald-200 text-[10px] font-bold tracking-wide uppercase shadow-xs">
                        Tayang
                      </span>
                    @endif

                  </div>

                  <!-- Content Body -->
                  <div class="p-4 space-y-2">
                    <div class="flex items-center justify-between text-xs text-[#7E70A6]">
                      <span class="flex items-center gap-1 truncate max-w-[200px]" title="{{ $product->cod_location }}">
                        <span class="material-symbols-outlined text-[14px] text-[#5B47E0]">location_on</span>
                        <span class="truncate">{{ $product->cod_location ?? 'Kampus Polimedia' }}</span>
                      </span>
                      <span class="text-[#7E70A6] font-mono text-[11px]">
                        {{ $product->created_at ? $product->created_at->diffForHumans(null, true) : 'Baru' }}
                      </span>
                    </div>

                    <h3 class="text-sm text-[#1A0D3F] font-bold line-clamp-2 group-hover:text-[#5B47E0] transition-colors" title="{{ $product->title }}">
                      <a href="{{ route('products.show', $product->slug ?? $product->id) }}">
                        {{ $product->title }}
                      </a>
                    </h3>

                    <div class="pt-1 flex items-baseline justify-between">
                      <span class="text-[#5B47E0] font-bold text-base tracking-tight">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                      </span>
                      <a href="{{ route('products.show', $product->slug ?? $product->id) }}" class="text-[#7E70A6] hover:text-[#5B47E0] text-xs font-semibold flex items-center gap-0.5 transition-colors" title="Lihat di katalog">
                        <span>Lihat</span>
                        <span class="material-symbols-outlined text-[13px]">open_in_new</span>
                      </a>
                    </div>
                  </div>
                </div>

                <!-- Action Button Bar -->
                <div class="p-3 pt-0 flex items-center gap-2 border-t border-[#F0EBFD] mt-2">
                  <a href="{{ route('products.edit', $product->id) }}" class="flex-1 py-2 px-3 rounded-xl bg-white border border-[#E4DCFA] hover:bg-[#FAF8FF] text-[#1A0D3F] text-xs font-semibold flex items-center justify-center gap-1.5 transition-colors shadow-2xs">
                    <span class="material-symbols-outlined text-[15px] text-[#5B47E0]">edit</span>
                    <span>Edit Produk</span>
                  </a>
                  <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Apakah kamu yakin ingin menghapus barang \'{{ addslashes($product->title) }}\' dari lapak kamu?');" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full py-2 px-3 rounded-xl bg-rose-50 hover:bg-rose-100 text-rose-700 border border-rose-200 text-xs font-semibold flex items-center justify-center gap-1.5 transition-colors shadow-2xs">
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
      <div class="rounded-2xl bg-white border border-[#E4DCFA] p-5 flex items-start gap-3.5 shadow-sm shadow-purple-100/50">
        <div class="w-9 h-9 rounded-xl bg-purple-50 border border-[#D6C7FF] text-[#5B47E0] flex items-center justify-center flex-shrink-0 mt-0.5">
          <span class="material-symbols-outlined text-[20px]">security</span>
        </div>
        <div class="space-y-1">
          <h4 class="text-sm text-[#1A0D3F] font-bold">Protokol Keamanan COD Kampus ugoods</h4>
          <p class="text-xs sm:text-sm text-[#4A3B75] leading-relaxed">
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
