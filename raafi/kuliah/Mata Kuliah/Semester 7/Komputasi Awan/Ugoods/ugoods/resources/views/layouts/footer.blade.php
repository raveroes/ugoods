<!-- ugoods Footer Component -->
<footer class="w-full bg-surface-container-lowest border-t border-surface-variant">
  <div class="max-w-[1280px] mx-auto px-margin md:px-margin-tablet lg:px-margin-desktop py-space-2xl">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter-desktop">
      <!-- Col 1: Brand Info -->
      <div class="flex flex-col gap-space-sm">
        <div class="flex items-center">
          <span class="text-primary-container font-headline-md text-headline-md font-bold">u</span>
          <span class="text-on-surface font-headline-md text-headline-md font-bold">goods</span>
        </div>
        <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          Platform peer-to-peer re-commerce mahasiswa Indonesia. Aman, hemat, dan terverifikasi untuk transaksi preloved antar sivitas kampus.
        </p>
        <div class="flex items-center gap-space-xs pt-space-xs">
          <span class="material-symbols-outlined text-tertiary text-[18px]">verified</span>
          <span class="font-label-sm text-label-sm text-tertiary font-semibold">Polimedia Student Verified Hub</span>
        </div>
      </div>

      <!-- Col 2: Quick Links -->
      <div class="flex flex-col gap-space-sm">
        <h4 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Tautan Cepat</h4>
        <ul class="flex flex-col gap-space-xs">
          <li class="nav-item"><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-on-surface transition-colors" href="{{ route('home') }}">Katalog Kampus</a></li>
          <li class="nav-item"><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-on-surface transition-colors" href="{{ route('seller.products.create') }}">Pasang Iklan / Jual</a></li>
          <li class="nav-item"><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-on-surface transition-colors" href="{{ route('about') }}">Tentang ugoods</a></li>
          <li class="nav-item"><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-on-surface transition-colors" href="{{ route('contact') }}">Pusat Bantuan &amp; FAQ</a></li>
        </ul>
      </div>

      <!-- Col 3: Services & Security -->
      <div class="flex flex-col gap-space-sm">
        <h4 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Layanan &amp; Keamanan</h4>
        <ul class="flex flex-col gap-space-xs">
          <li class="nav-item"><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-on-surface transition-colors" href="{{ route('orders.show') }}">Keamanan Transaksi Midtrans</a></li>
          <li class="nav-item"><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-on-surface transition-colors" href="{{ route('register') }}">Verifikasi KTM Mahasiswa</a></li>
          <li class="nav-item"><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-on-surface transition-colors" href="{{ route('admin.dashboard') }}">Portal Moderasi Admin</a></li>
          <li class="nav-item"><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-on-surface transition-colors" href="{{ route('contact') }}">Hubungi Tim Dukungan</a></li>
        </ul>
      </div>

      <!-- Col 4: COD Points & Socials -->
      <div class="flex flex-col gap-space-sm">
        <h4 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Titik COD Kampus</h4>
        <div class="p-space-sm rounded-xl bg-surface-container-low border border-surface-variant flex flex-col gap-space-2xs">
          <span class="font-label-md text-label-md text-on-surface flex items-center gap-space-xs font-medium">
            <span class="material-symbols-outlined text-secondary text-[16px]">location_on</span>Polimedia Kreatif Srengseng
          </span>
          <p class="font-body-sm text-body-sm text-on-surface-variant">Tersedia spot serah-terima COD aman di Gedung Kuliah Terpadu &amp; Kantin Kreatif setiap hari perkuliahan.</p>
        </div>
        <div class="flex items-center gap-space-sm pt-space-xs">
          <a aria-label="Instagram" class="w-9 h-9 rounded-lg bg-surface-container flex items-center justify-center text-outline hover:text-on-surface hover:bg-surface-container-high transition-colors" href="#"><span class="material-symbols-outlined text-[18px]">alternate_email</span></a>
          <a aria-label="Chat Bantuan" class="w-9 h-9 rounded-lg bg-surface-container flex items-center justify-center text-outline hover:text-on-surface hover:bg-surface-container-high transition-colors" href="{{ route('contact') }}"><span class="material-symbols-outlined text-[18px]">chat</span></a>
          <a aria-label="Komunitas Kampus" class="w-9 h-9 rounded-lg bg-surface-container flex items-center justify-center text-outline hover:text-on-surface hover:bg-surface-container-high transition-colors" href="#"><span class="material-symbols-outlined text-[18px]">forum</span></a>
        </div>
      </div>
    </div>

    <!-- Bottom Copyright -->
    <div class="mt-space-xl pt-space-md border-t border-surface-variant flex flex-col md:flex-row items-center justify-between gap-space-sm">
      <p class="font-body-sm text-body-sm text-outline">© 2025 ugoods Indonesia. Dirancang untuk mahasiswa Polimedia &amp; universitas mitra.</p>
      <div class="flex items-center gap-space-md">
        <span class="font-label-sm text-label-sm text-outline">100% Bebas Biaya Layanan Kampus</span>
      </div>
    </div>
  </div>
</footer>
