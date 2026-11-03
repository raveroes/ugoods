<!-- ugoods Header / Navbar Component (Vibrant Light Mode) -->
<header class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-md border-b border-[#E4DCFA] shadow-sm shadow-purple-900/[0.04]">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 py-3 flex items-center justify-between gap-4">

    <!-- Brand & Desktop Navigation -->
    <div class="flex items-center gap-6 lg:gap-8 shrink-0">
      <a class="flex items-center tracking-tight select-none" href="{{ route('home') }}">
        <span class="text-[#5B47E0] font-bold text-2xl tracking-tight">u</span>
        <span class="text-[#1A0D3F] font-bold text-2xl tracking-tight">goods</span>
      </a>
      <nav class="hidden lg:flex items-center gap-6">
        <a class="text-sm font-medium {{ request()->routeIs('home') ? 'text-[#5B47E0] font-bold' : 'text-[#4A3B75] hover:text-[#5B47E0]' }} transition-colors"
          href="{{ route('home') }}">Beranda</a>
        <a class="text-sm font-medium {{ request()->routeIs('categories.*') ? 'text-[#5B47E0] font-bold' : 'text-[#4A3B75] hover:text-[#5B47E0]' }} transition-colors"
          href="{{ route('categories.index') }}">Kategori</a>
        @auth
          <a class="text-sm font-medium {{ request()->routeIs('orders.*') ? 'text-[#5B47E0] font-bold' : 'text-[#4A3B75] hover:text-[#5B47E0]' }} transition-colors flex items-center gap-1"
            href="{{ route('orders.index') }}">
            <span>Riwayat Pesanan</span>
          </a>
        @endauth
        <a class="text-sm font-medium {{ request()->routeIs('about') ? 'text-[#5B47E0] font-bold' : 'text-[#4A3B75] hover:text-[#5B47E0]' }} transition-colors"
          href="{{ route('about') }}">Tentang Kami</a>
        <a class="text-sm font-medium {{ request()->routeIs('contact') ? 'text-[#5B47E0] font-bold' : 'text-[#4A3B75] hover:text-[#5B47E0]' }} transition-colors"
          href="{{ route('contact') }}">Kontak</a>
      </nav>
    </div>

    <!-- Right Actions -->
    <div class="flex items-center gap-2 sm:gap-3 flex-1 justify-end">
      <!-- Search Input (Desktop/Tablet) -->
      <form action="{{ route('categories.index') }}" method="GET"
        class="relative items-center w-48 md:w-64 lg:w-72 hidden sm:flex">
        <button type="submit"
          class="absolute left-3 text-[#7E70A6] hover:text-[#5B47E0] flex items-center justify-center p-0 bg-transparent border-0 cursor-pointer"
          aria-label="Cari">
          <span class="material-symbols-outlined text-[18px]">search</span>
        </button>
        <input name="search" value="{{ request('search') }}"
          class="w-full bg-[#FAF8FF] border border-[#D6C7FF] rounded-xl pl-9 pr-4 py-2 font-body-sm text-xs text-[#1A0D3F] placeholder-[#7E70A6] focus:outline-none focus:border-[#5B47E0] focus:ring-2 focus:ring-[#5B47E0]/20 focus:bg-white transition-all shadow-xs"
          placeholder="Cari jaket thrift, kalkulator lab, buku..." type="text">
      </form>

      <!-- Jual Barang Quick Button -->
      <a aria-label="Jual Barang" href="{{ route('seller.products.create') }}"
        class="hidden md:inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-[#F5F3FF] border border-[#D6C7FF] text-[#5B47E0] hover:bg-[#5B47E0] hover:text-white font-label-sm text-xs font-semibold transition-all shadow-xs hover:shadow-sm">
        <span class="material-symbols-outlined text-[16px]">add_circle</span>
        <span>Jual Barang</span>
      </a>

      @php
        // Cek secara dinamis apakah ada item aktif (belum sold) yang sedang dipilih di checkout
        $hasActiveCartItem = false;

        if (request()->filled('product_id')) {
          $hasActiveCartItem = \App\Models\Product::where(function ($q) {
            $q->whereNull('status')->orWhere('status', 'available');
          })->where('id', request('product_id'))->exists();
        } elseif (request()->filled('product')) {
          $hasActiveCartItem = \App\Models\Product::where(function ($q) {
            $q->whereNull('status')->orWhere('status', 'available');
          })->where('slug', request('product'))->exists();
        }
      @endphp

      <!-- Keranjang Belanja Dinamis -->
      <a aria-label="Keranjang Belanja"
        class="relative w-9 h-9 sm:w-10 sm:h-10 rounded-xl flex items-center justify-center text-[#4A3B75] hover:text-[#1A0D3F] hover:bg-[#F3EFFF] transition-colors shrink-0"
        href="{{ route('checkout.index') }}">
        <span class="material-symbols-outlined text-[20px] sm:text-[22px]">shopping_bag</span>

        @if($hasActiveCartItem)
          <span
            class="absolute top-1 sm:top-1.5 right-1 sm:right-1.5 min-w-[16px] h-4 px-1 rounded-full bg-rose-500 text-white font-semibold text-[10px] flex items-center justify-center leading-none ring-2 ring-white">
            1
          </span>
        @endif
      </a>

      <!-- State: GUEST (Belum Login) -->
      @guest
        <div class="flex items-center gap-1.5 sm:gap-2 shrink-0">
          <a href="{{ route('login') }}"
            class="text-xs sm:text-sm font-semibold text-[#4A3B75] hover:text-[#1A0D3F] px-2.5 sm:px-3 py-1.5 rounded-xl hover:bg-[#F3EFFF] transition-colors">
            Masuk
          </a>
          <a href="{{ route('register') }}"
            class="text-xs sm:text-sm font-semibold text-white bg-[#5B47E0] hover:bg-[#4A35D0] px-3 sm:px-4 py-1.5 rounded-xl transition-all shadow-md shadow-[#5B47E0]/30 flex items-center justify-center">
            Daftar
          </a>
        </div>
      @endguest

      <!-- State: AUTH (Sudah Login) -->
      @auth
        <div class="flex items-center gap-2 sm:gap-3 shrink-0">

          <!-- Tombol Pintasan Admin Dashboard (Hanya Muncul Jika Role Admin) -->
          @if(Auth::user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}"
              class="hidden sm:inline-flex items-center gap-1 px-3 py-1.5 rounded-xl bg-amber-50 border border-amber-200 text-amber-800 hover:bg-amber-100 text-xs font-semibold transition-all shadow-xs"
              title="Masuk Panel Admin & Moderasi">
              <span class="material-symbols-outlined text-[16px]">admin_panel_settings</span>
              <span>Admin Dashboard</span>
            </a>
          @endif

          <!-- Profile Avatar Inisial / Foto Profil -> route('profile.edit') -->
          <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 group" title="Pengaturan Profil">
            <div
              class="w-8 h-8 rounded-full overflow-hidden bg-[#5B47E0] text-white flex items-center justify-center font-bold text-xs border border-[#DDD6FE] shrink-0 shadow-xs">
              @if(Auth::user()->avatar)
                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="w-full h-full object-cover"
                  alt="{{ Auth::user()->name }}">
              @else
                {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 2)) }}
              @endif
            </div>
            <span
              class="text-xs font-semibold text-[#1A0D3F] group-hover:text-[#5B47E0] transition-colors hidden sm:inline-block">
              {{ Auth::user()->name }}
            </span>
          </a>

          <!-- Form Logout -->
          <form method="POST" action="{{ route('logout') }}" class="inline-flex m-0 p-0">
            @csrf
            <button type="submit"
              class="inline-flex items-center gap-1 sm:gap-1.5 px-2.5 sm:px-3 py-1.5 rounded-xl border border-[#E4DCFA] hover:border-rose-300 text-[#4A3B75] hover:text-rose-600 hover:bg-rose-50 text-xs font-semibold transition-all cursor-pointer shadow-xs"
              title="Keluar">
              <span class="material-symbols-outlined text-[16px]">logout</span>
              <span class="hidden sm:inline">Keluar</span>
            </button>
          </form>
        </div>
      @endauth

      <!-- Mobile Hamburger Button -->
      <button onclick="document.getElementById('mobileNavMenu').classList.toggle('hidden')" aria-label="Menu Navigasi"
        class="lg:hidden w-9 h-9 rounded-xl flex items-center justify-center text-[#4A3B75] hover:text-[#1A0D3F] hover:bg-[#F3EFFF] transition-colors"
        type="button">
        <span class="material-symbols-outlined text-[22px]">menu</span>
      </button>
    </div>
  </div>

  <!-- Mobile Collapsible Menu -->
  <div id="mobileNavMenu" class="hidden lg:hidden border-t border-[#E4DCFA] bg-white/98 backdrop-blur-md px-5 py-4 space-y-3 shadow-xl">
    <div class="flex flex-col gap-2">
      <a class="text-sm font-medium {{ request()->routeIs('home') ? 'text-[#5B47E0] font-bold' : 'text-[#1A0D3F]' }} py-1.5 hover:text-[#5B47E0] transition-colors"
        href="{{ route('home') }}">Beranda</a>
      <a class="text-sm font-medium {{ request()->routeIs('categories.*') ? 'text-[#5B47E0] font-bold' : 'text-[#1A0D3F]' }} py-1.5 hover:text-[#5B47E0] transition-colors"
        href="{{ route('categories.index') }}">Kategori</a>
      @auth
        <a class="text-sm font-medium {{ request()->routeIs('orders.*') ? 'text-[#5B47E0] font-bold' : 'text-[#1A0D3F]' }} py-1.5 hover:text-[#5B47E0] transition-colors flex items-center gap-1.5"
          href="{{ route('orders.index') }}">
          <span class="material-symbols-outlined text-[16px]">receipt_long</span>
          <span>Riwayat Pesanan</span>
        </a>

        <!-- Tambahan Mobile Admin Menu -->
        @if(Auth::user()->role === 'admin')
          <a class="text-sm font-semibold text-amber-800 py-1.5 flex items-center gap-1.5 hover:text-amber-900 transition-colors"
            href="{{ route('admin.dashboard') }}">
            <span class="material-symbols-outlined text-[16px]">admin_panel_settings</span>
            <span>Admin Dashboard</span>
          </a>
        @endif
      @endauth
      <a class="text-sm font-medium {{ request()->routeIs('about') ? 'text-[#5B47E0] font-bold' : 'text-[#1A0D3F]' }} py-1.5 hover:text-[#5B47E0] transition-colors"
        href="{{ route('about') }}">Tentang Kami</a>
      <a class="text-sm font-medium {{ request()->routeIs('contact') ? 'text-[#5B47E0] font-bold' : 'text-[#1A0D3F]' }} py-1.5 hover:text-[#5B47E0] transition-colors"
        href="{{ route('contact') }}">Kontak</a>
      <a class="text-sm font-medium text-[#5B47E0] py-1.5 flex items-center gap-1.5 hover:text-[#4A35D0] transition-colors font-semibold"
        href="{{ route('seller.products.create') }}">
        <span class="material-symbols-outlined text-[16px]">add_circle</span>
        <span>Jual Barang</span>
      </a>
    </div>
  </div>
</header>