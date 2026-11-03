<!-- ugoods Footer Component (Deep Saturated Purple/Violet #36289A - Figma Aligned) -->
<footer class="w-full bg-[#36289A] text-white border-t border-[#4B39B8] relative overflow-hidden">
  <!-- Subtle ambient decorative glow inside footer -->
  <div class="absolute -top-24 -right-24 w-96 h-96 bg-purple-500/20 rounded-full blur-3xl pointer-events-none"></div>
  <div class="absolute -bottom-24 -left-24 w-80 h-80 bg-indigo-500/20 rounded-full blur-3xl pointer-events-none"></div>

  <div class="relative z-10 max-w-[1280px] mx-auto px-margin md:px-margin-tablet lg:px-margin-desktop py-space-2xl">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter-desktop">
      <!-- Col 1: Brand Info -->
      <div class="flex flex-col gap-space-sm">
        <div class="flex items-center">
          <span class="text-white font-headline-md text-headline-md font-bold tracking-tight">u</span>
          <span class="text-white font-headline-md text-headline-md font-bold tracking-tight">goods</span>
        </div>
        <p class="font-body-sm text-body-sm text-purple-200/90 leading-relaxed">
          Platform peer-to-peer re-commerce mahasiswa Indonesia. Aman, hemat, dan terverifikasi untuk transaksi preloved
          antar sivitas kampus.
        </p>
        <div class="flex items-center gap-space-xs pt-space-xs">
          <div
            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/10 border border-emerald-400/40 text-emerald-300">
            <span class="material-symbols-outlined text-[16px] text-emerald-300">verified</span>
            <span class="font-label-sm text-label-sm font-semibold">Polimedia Student Verified Hub</span>
          </div>
        </div>
      </div>

      <!-- Col 2: Quick Links -->
      <div class="flex flex-col gap-space-sm">
        <h4 class="font-headline-sm text-headline-sm text-white font-semibold">Tautan Cepat</h4>
        <ul class="flex flex-col gap-space-xs">
          <li class="nav-item"><a class="font-body-sm text-body-sm text-purple-200 hover:text-white transition-colors"
              href="{{ route('home') }}">Katalog Kampus</a></li>
          <li class="nav-item"><a class="font-body-sm text-body-sm text-purple-200 hover:text-white transition-colors"
              href="{{ route('seller.products.create') }}">Pasang Iklan / Jual</a></li>
          <li class="nav-item"><a class="font-body-sm text-body-sm text-purple-200 hover:text-white transition-colors"
              href="{{ route('about') }}">Tentang ugoods</a></li>
          <li class="nav-item"><a class="font-body-sm text-body-sm text-purple-200 hover:text-white transition-colors"
              href="{{ route('contact') }}">Pusat Bantuan &amp; FAQ</a></li>
        </ul>
      </div>

      <!-- Col 3: Services & Security -->
      <div class="flex flex-col gap-space-sm">
        <h4 class="font-headline-sm text-headline-sm text-white font-semibold">Layanan &amp; Keamanan</h4>
        <ul class="flex flex-col gap-space-xs">
          <li class="nav-item"><a class="font-body-sm text-body-sm text-purple-200 hover:text-white transition-colors"
              href="{{ route('orders.show') }}">Keamanan Transaksi Midtrans</a></li>
          <li class="nav-item"><a class="font-body-sm text-body-sm text-purple-200 hover:text-white transition-colors"
              href="{{ route('register') }}">Verifikasi KTM Mahasiswa</a></li>
          <li class="nav-item"><a class="font-body-sm text-body-sm text-purple-200 hover:text-white transition-colors"
              href="{{ route('admin.dashboard') }}">Portal Moderasi Admin</a></li>
          <li class="nav-item"><a class="font-body-sm text-body-sm text-purple-200 hover:text-white transition-colors"
              href="{{ route('contact') }}">Hubungi Tim Dukungan</a></li>
        </ul>
      </div>

      <!-- Col 4: COD Points & Socials -->
      <div class="flex flex-col gap-space-sm">
        <h4 class="font-headline-sm text-headline-sm text-white font-semibold">Titik COD Kampus</h4>
        <div class="p-space-sm rounded-xl bg-white/10 border border-white/15 flex flex-col gap-space-2xs text-white">
          <span class="font-label-md text-label-md flex items-center gap-space-xs font-semibold text-white">
            <span class="material-symbols-outlined text-sky-300 text-[16px]">location_on</span>Polimedia Kreatif
            Srengseng
          </span>
          <p class="font-body-sm text-body-sm text-purple-200/90">Tersedia spot serah-terima COD aman di Gedung Kuliah
            Terpadu &amp; Kantin Kreatif setiap hari perkuliahan.</p>
        </div>
        <div class="flex items-center gap-space-sm pt-space-xs">
          <a aria-label="Instagram"
            class="w-9 h-9 rounded-lg bg-white/10 border border-white/10 flex items-center justify-center text-purple-200 hover:text-white hover:bg-white/20 transition-all"
            href="#"><span class="material-symbols-outlined text-[18px]">alternate_email</span></a>
          <a aria-label="Chat Bantuan"
            class="w-9 h-9 rounded-lg bg-white/10 border border-white/10 flex items-center justify-center text-purple-200 hover:text-white hover:bg-white/20 transition-all"
            href="{{ route('contact') }}"><span class="material-symbols-outlined text-[18px]">chat</span></a>
          <a aria-label="Komunitas Kampus"
            class="w-9 h-9 rounded-lg bg-white/10 border border-white/10 flex items-center justify-center text-purple-200 hover:text-white hover:bg-white/20 transition-all"
            href="#"><span class="material-symbols-outlined text-[18px]">forum</span></a>
        </div>
      </div>
    </div>

    <!-- Bottom Copyright -->
    <div
      class="mt-space-xl pt-space-md border-t border-white/15 flex flex-col md:flex-row items-center justify-between gap-space-sm text-purple-200/80">
      <p class="font-body-sm text-body-sm">© 2025 ugoods Indonesia. Dirancang untuk mahasiswa Polimedia &amp;
        universitas mitra.</p>
      <div class="flex items-center gap-space-md">
        <span class="font-label-sm text-label-sm text-purple-200">100% Bebas Biaya Layanan Kampus</span>
      </div>
    </div>
  </div>
</footer>