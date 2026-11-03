@extends('layouts.app')

@section('title', 'Tentang Kami - ugoods Re-Commerce Kampus')

@section('content')
  <div class="flex flex-col w-full">
    <!-- Subtle Ambient Glow -->
    <div class="relative w-full overflow-hidden">
      <div
        class="absolute top-12 left-1/2 -translate-x-1/2 w-[720px] h-[360px] bg-primary-container/20 blur-[130px] rounded-full pointer-events-none -z-10">
      </div>
      <div
        class="absolute top-48 left-1/4 w-[380px] h-[220px] bg-secondary-container/15 blur-[110px] rounded-full pointer-events-none -z-10">
      </div>
      <!-- 1. HERO SECTION -->
      <section class="max-w-6xl mx-auto px-margin md:px-margin-tablet lg:px-margin-desktop pt-10 pb-16 text-center">
        <!-- Pill Badge -->
        <div
          class="inline-flex items-center gap-2 bg-primary/10 text-primary-fixed-dim rounded-full px-4 py-1.5 shadow-sm">
          <span class="material-symbols-outlined text-sm leading-none text-tertiary">auto_awesome</span>
          <span class="font-label-sm text-label-sm uppercase tracking-widest font-semibold">TENTANG UGOODS</span>
        </div>
        <!-- Headline -->
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight text-center leading-tight mb-4">
          <span class="text-white block">Marketplace Preloved dari Mahasiswa,</span>
          <span class="text-[#38BDF8] block mt-1">untuk Mahasiswa</span>
        </h1>
        <!-- Subtitle -->
        <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto mt-5 leading-relaxed">
          Platform peer-to-peer terverifikasi tempat civitas akademika Polimedia saling jual-beli perlengkapan kuliah
          secara hemat, praktis, dan 100% transparan.
        </p>
        <!-- Action Buttons -->
        <div class="flex flex-wrap items-center justify-center gap-4 mt-8">
          <a class="inline-flex items-center gap-2 bg-primary-container hover:bg-inverse-primary text-on-primary-container font-label-md text-label-md px-6 py-3.5 rounded-xl shadow-lg transition-all duration-200"
            href="#">
            <span class="material-symbols-outlined text-[20px]">explore</span>
            <span class="">Jelajahi Katalog</span>
          </a>
          <a class="inline-flex items-center gap-2 bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md px-6 py-3.5 rounded-xl shadow-sm transition-all duration-200"
            href="#">
            <span class="material-symbols-outlined text-[20px] text-tertiary">add_circle</span>
            <span class="">Mulai Jual Barang</span>
          </a>
        </div>
        <!-- Campus Visual Trust Banner -->

      </section>
    </div>
    <!-- 2. MISSION & VISION + CORE VALUES -->
    <section class="max-w-6xl mx-auto px-margin md:px-margin-tablet lg:px-margin-desktop py-12 w-full">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Card 1: Visi & Misi Kami -->
        <div class="bg-surface-container p-8 md:p-10 rounded-2xl flex flex-col justify-between shadow-md">
          <div>
            <div
              class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-primary-container/20 text-primary-fixed">
              <span class="material-symbols-outlined text-[26px]">recycling</span>
            </div>
            <h2 class="font-headline-lg text-headline-lg text-on-surface font-bold mt-5">
              Ekonomi Sirkular di Kampus
            </h2>
            <p class="font-body-md text-body-md text-on-surface-variant mt-4 leading-relaxed">
              Membangun ekosistem sirkular di lingkungan kampus dengan memberikan nafas kedua bagi barang-barang preloved
              berkualitas. Kami percaya bahwa kelulusan atau pergantian semester bukan berarti alat-alat studi harus
              berakhir menumpuk di pojok kosan.
            </p>
            <p class="font-body-md text-body-md text-on-surface-variant mt-3 leading-relaxed">
              Dari perlengkapan sablon Teknik Grafika, drawing monitor mahasiswa Desain Grafis, buku antologi Penerbitan,
              hingga unit lensa anak Multimedia—ugoods menjembatani transfer inventaris bermanfaat antar-tingkat dengan
              aman dan saling meringankan beban biaya kuliah.
            </p>
          </div>
          <div class="mt-8 p-4 rounded-xl bg-surface-container-high/60">
            <div class="flex items-start gap-3">
              <span class="material-symbols-outlined text-primary-fixed text-[24px] mt-0.5 shrink-0">format_quote</span>
              <p class="font-body-sm text-body-sm text-on-surface italic">
                "Solusi cerdas bagi mahasiswa baru untuk hemat hingga 70% pengeluaran perlengkapan kuliah tanpa
                mengorbankan kualitas berkarya."
              </p>
            </div>
          </div>
        </div>
        <!-- Card 2: Nilai-Nilai Utama -->
        <div class="bg-surface-container p-8 md:p-10 rounded-2xl flex flex-col shadow-md">
          <div class="flex items-center gap-3">
            <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-secondary/15 text-secondary">
              <span class="material-symbols-outlined text-[26px]">verified_user</span>
            </div>
            <div>
              <span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary font-semibold">Keunggulan
                Layanan</span>
              <h3 class="font-headline-md text-headline-md text-on-surface font-bold">Kenapa Memilih ugoods?</h3>
            </div>
          </div>
          <div class="flex flex-col gap-4 mt-6 flex-1 justify-center">
            <!-- Item 1 -->
            <div
              class="p-4 rounded-xl bg-surface-container-low hover:bg-surface-container-high transition-colors duration-200">
              <div class="flex items-start gap-4">
                <div
                  class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center shrink-0 text-tertiary">
                  <span class="material-symbols-outlined text-[22px]">payments</span>
                </div>
                <div>
                  <h4 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Harga Mahasiswa &amp; Hemat
                  </h4>
                  <p class="font-body-sm text-body-sm text-on-surface-variant mt-1 leading-normal">
                    Penyesuaian batas harga khusus kantong mahasiswa tanpa mark-up tengkulak. Dilengkapi opsi tawar wajar
                    langsung dengan pemilik barang.
                  </p>
                </div>
              </div>
            </div>
            <!-- Item 2 -->
            <div
              class="p-4 rounded-xl bg-surface-container-low hover:bg-surface-container-high transition-colors duration-200">
              <div class="flex items-start gap-4">
                <div
                  class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center shrink-0 text-secondary">
                  <span class="material-symbols-outlined text-[22px]">near_me</span>
                </div>
                <div>
                  <h4 class="font-headline-sm text-headline-sm text-on-surface font-semibold">COD Bebas Ongkir di Titik
                    Kampus</h4>
                  <p class="font-body-sm text-body-sm text-on-surface-variant mt-1 leading-normal">
                    Zero delivery fee. Serah-terima fleksibel di spot resmi: Lobi Gedung Kuliah Terpadu, Kantin Kreatif,
                    atau Gazebo Multimedia.
                  </p>
                </div>
              </div>
            </div>
            <!-- Item 3 -->
            <div
              class="p-4 rounded-xl bg-surface-container-low hover:bg-surface-container-high transition-colors duration-200">
              <div class="flex items-start gap-4">
                <div
                  class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center shrink-0 text-primary-fixed">
                  <span class="material-symbols-outlined text-[22px]">lock_clock</span>
                </div>
                <div>
                  <h4 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Sistem Rekber Aman via
                    Midtrans</h4>
                  <p class="font-body-sm text-body-sm text-on-surface-variant mt-1 leading-normal">
                    Dukungan payment gateway resmi (QRIS, GoPay, ShopeePay, VA Bank). Dana ditahan sistem dan hanya
                    diteruskan ke penjual setelah barang diterima baik.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- 3. PLATFORM STATISTICS (4 KPI STAT CARDS) -->

    <!-- 4. HOW IT WORKS / ALUR KERJA (3 CARDS) -->
    <section class="max-w-6xl mx-auto px-margin md:px-margin-tablet lg:px-margin-desktop py-12 w-full">
      <div class="text-center max-w-2xl mx-auto mb-12">
        <div class="inline-flex items-center gap-1.5 text-primary-fixed">
          <span class="material-symbols-outlined text-sm">route</span>
          <span class="font-label-sm text-label-sm uppercase tracking-wider font-semibold">Mudah &amp; Praktis</span>
        </div>
        <h2 class="font-headline-lg text-headline-lg text-on-surface font-bold mt-2">Bagaimana ugoods Bekerja?</h2>
        <p class="font-body-md text-body-md text-on-surface-variant mt-2">Proses cepat, transparan, dan terarah dalam 3
          tahapan sederhana.</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 relative">
        <!-- Step 1 -->
        <div
          class="bg-surface-container p-8 rounded-2xl flex flex-col justify-between hover:bg-surface-container-high transition-colors duration-200">
          <div>
            <div class="flex items-center justify-between mb-6">
              <span
                class="font-label-md text-label-md font-bold px-3 py-1 rounded-full bg-primary-container text-on-primary-container">
                01
              </span>
              <div
                class="w-10 h-10 rounded-xl bg-surface-container-low flex items-center justify-center text-on-surface-variant">
                <span class="material-symbols-outlined text-[22px]">add_a_photo</span>
              </div>
            </div>
            <h3 class="font-headline-md text-headline-md text-on-surface font-bold">Pasang Iklan</h3>
            <p class="font-body-md text-body-md text-on-surface-variant mt-3 leading-relaxed">
              Unggah foto barang bekas kuliahmu, beri deskripsi kondisi riil tanpa manipulasi, dan tentukan titik temu COD
              favoritmu di area kampus.
            </p>
          </div>
          <div class="mt-6 pt-4 bg-surface-container-low/50 rounded-lg p-3">
            <span class="font-label-sm text-label-sm text-secondary flex items-center gap-1.5">
              <span class="material-symbols-outlined text-sm">bolt</span>
              Upload instan &lt; 2 menit
            </span>
          </div>
        </div>
        <!-- Step 2 -->
        <div
          class="bg-surface-container p-8 rounded-2xl flex flex-col justify-between hover:bg-surface-container-high transition-colors duration-200">
          <div>
            <div class="flex items-center justify-between mb-6">
              <span
                class="font-label-md text-label-md font-bold px-3 py-1 rounded-full bg-primary-container text-on-primary-container">
                02
              </span>
              <div class="w-10 h-10 rounded-xl bg-surface-container-low flex items-center justify-center text-tertiary">
                <span class="material-symbols-outlined text-[22px]">gavel</span>
              </div>
            </div>
            <h3 class="font-headline-md text-headline-md text-on-surface font-bold">Verifikasi Admin</h3>
            <p class="font-body-md text-body-md text-on-surface-variant mt-3 leading-relaxed">
              Tim admin kampus meninjau kelayakan barang, kewajaran harga mahasiswa, serta memvalidasi keaslian berkas KTM
              sebelum tayang ke etalase publik.
            </p>
          </div>
          <div class="mt-6 pt-4 bg-surface-container-low/50 rounded-lg p-3">
            <span class="font-label-sm text-label-sm text-tertiary flex items-center gap-1.5">
              <span class="material-symbols-outlined text-sm">verified</span>
              Sistem Anti-Spam &amp; Scam
            </span>
          </div>
        </div>
        <!-- Step 3 -->
        <div
          class="bg-surface-container p-8 rounded-2xl flex flex-col justify-between hover:bg-surface-container-high transition-colors duration-200">
          <div>
            <div class="flex items-center justify-between mb-6">
              <span
                class="font-label-md text-label-md font-bold px-3 py-1 rounded-full bg-primary-container text-on-primary-container">
                03
              </span>
              <div class="w-10 h-10 rounded-xl bg-surface-container-low flex items-center justify-center text-secondary">
                <span class="material-symbols-outlined text-[22px]">handshake</span>
              </div>
            </div>
            <h3 class="font-headline-md text-headline-md text-on-surface font-bold">Serah Terima COD</h3>
            <p class="font-body-md text-body-md text-on-surface-variant mt-3 leading-relaxed">
              Bertemu langsung di lobi gedung kuliah atau kantin yang disepakati untuk cek fisik barang, lalu konfirmasi
              pelepasan dana escrow via satu klik.
            </p>
          </div>
          <div class="mt-6 pt-4 bg-surface-container-low/50 rounded-lg p-3">
            <span class="font-label-sm text-label-sm text-primary-fixed flex items-center gap-1.5">
              <span class="material-symbols-outlined text-sm">check_circle</span>
              Midtrans Escrow Release
            </span>
          </div>
        </div>
      </div>
    </section>
    <!-- 5. COMMUNITY CALL-TO-ACTION (CTA BANNER) -->
    <section class="max-w-6xl mx-auto px-margin md:px-margin-tablet lg:px-margin-desktop py-12 mb-16 w-full">
      <div
        class="relative bg-gradient-to-r from-surface-container-low via-surface-container to-surface-container-low rounded-3xl p-8 md:p-14 overflow-hidden shadow-xl text-center">
        <!-- Glow Accent -->
        <div
          class="absolute -top-24 left-1/2 -translate-x-1/2 w-96 h-48 bg-primary-container/30 blur-3xl pointer-events-none rounded-full">
        </div>
        <div class="relative z-10 max-w-2xl mx-auto">
          <div
            class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-primary-container text-on-primary-container mb-6 shadow-md">
            <span class="material-symbols-outlined text-[32px]">savings</span>
          </div>
          <h2 class="font-headline-lg text-headline-lg md:text-display-hero text-on-surface font-bold">
            Punya barang kuliah tak terpakai?
          </h2>
          <p class="font-body-lg text-body-lg text-on-surface-variant mt-3">
            Jadikan uang saku tambahan hari ini sekaligus bantu adik tingkat mendapatkan peralatan belajar terjangkau.
          </p>
          <div class="flex flex-wrap items-center justify-center gap-4 mt-8">
            <a class="inline-flex items-center gap-2 bg-primary-container hover:bg-inverse-primary text-on-primary-container font-label-md text-label-md px-7 py-3.5 rounded-xl shadow-lg transition-colors"
              href="#">
              <span class="material-symbols-outlined text-[20px]">how_to_reg</span>
              <span class="">Daftar Akun Mahasiswa Sekarang</span>
            </a>
            <a class="inline-flex items-center gap-2 bg-surface-container-high hover:bg-surface-variant text-on-surface font-label-md text-label-md px-6 py-3.5 rounded-xl transition-colors"
              href="#">
              <span class="material-symbols-outlined text-[20px] text-tertiary">shield</span>
              <span class="">Pelajari Panduan Keamanan COD</span>
            </a>
          </div>
          <div class="flex items-center justify-center gap-6 mt-8 pt-6 border-t border-surface-variant/40">
            <div class="flex items-center gap-2">
              <span class="material-symbols-outlined text-tertiary text-sm">check</span>
              <span class="font-label-sm text-label-sm text-on-surface-variant">Bebas Potongan Komisi</span>
            </div>
            <div class="flex items-center gap-2">
              <span class="material-symbols-outlined text-tertiary text-sm">check</span>
              <span class="font-label-sm text-label-sm text-on-surface-variant">Verifikasi Identitas Kampus</span>
            </div>
            <div class="hidden sm:flex items-center gap-2">
              <span class="material-symbols-outlined text-tertiary text-sm">check</span>
              <span class="font-label-sm text-label-sm text-on-surface-variant">Titik Kumpul Aman</span>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection