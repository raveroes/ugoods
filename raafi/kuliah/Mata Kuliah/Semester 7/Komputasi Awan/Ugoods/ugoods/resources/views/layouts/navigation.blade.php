<!-- ugoods Header / Navbar Component -->
<header class="fixed top-0 left-0 right-0 z-50 bg-[#0B0F19]/90 backdrop-blur-md border-b border-[#1E293B]">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 py-3 flex items-center justify-between gap-4">

    <!-- Brand & Desktop Navigation -->
    <div class="flex items-center gap-6 lg:gap-8 shrink-0">
      <a class="flex items-center tracking-tight select-none" href="{{ route('home') }}">
        <span class="text-[#5B47E0] font-bold text-2xl tracking-tight">u</span>
        <span class="text-white font-bold text-2xl tracking-tight">goods</span>
      </a>
      <nav class="hidden lg:flex items-center gap-6">
        <a class="text-sm font-medium {{ request()->routeIs('home') ? 'text-white font-semibold' : 'text-slate-300 hover:text-white' }} transition-colors"
          href="{{ route('home') }}">Beranda</a>
        <a class="text-sm font-medium {{ request()->routeIs('categories.*') ? 'text-white font-semibold' : 'text-slate-300 hover:text-white' }} transition-colors"
          href="{{ route('categories.index') }}">Kategori</a>
        @auth
          <a class="text-sm font-medium {{ request()->routeIs('orders.*') ? 'text-white font-semibold' : 'text-slate-300 hover:text-white' }} transition-colors flex items-center gap-1"
            href="{{ route('orders.index') }}">
            <span>Riwayat Pesanan</span>
          </a>
        @endauth
        <a class="text-sm font-medium {{ request()->routeIs('about') ? 'text-white font-semibold' : 'text-slate-300 hover:text-white' }} transition-colors"
          href="{{ route('about') }}">Tentang Kami</a>
        <a class="text-sm font-medium {{ request()->routeIs('contact') ? 'text-white font-semibold' : 'text-slate-300 hover:text-white' }} transition-colors"
          href="{{ route('contact') }}">Kontak</a>
      </nav>
    </div>

    <!-- Right Actions -->
    <div class="flex items-center gap-2 sm:gap-3 flex-1 justify-end">
      <!-- Search Input (Desktop/Tablet) -->
      <form action="{{ route('categories.index') }}" method="GET"
        class="relative items-center w-48 md:w-64 lg:w-72 hidden sm:flex">
        <button type="submit"
          class="absolute left-3 text-slate-400 hover:text-white flex items-center justify-center p-0 bg-transparent border-0 cursor-pointer"
          aria-label="Cari">
          <span class="material-symbols-outlined text-[18px]">search</span>
        </button>
        <input name="search" value="{{ request('search') }}"
          class="w-full bg-[#0B0F19] border border-[#1E293B] rounded-xl pl-9 pr-4 py-2 font-body-sm text-xs text-slate-200 placeholder-slate-400 focus:outline-none focus:border-[#5B47E0] transition-colors"
          placeholder="Cari jaket thrift, kalkulator lab, buku..." type="text">
      </form>

      <!-- Jual Barang Quick Button -->
      <a aria-label="Jual Barang" href="{{ route('seller.products.create') }}"
        class="hidden md:inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-primary-container/20 border border-primary-container/40 text-primary hover:bg-primary-container hover:text-on-primary font-label-sm text-xs font-semibold transition-all">
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
        class="relative w-9 h-9 sm:w-10 sm:h-10 rounded-xl flex items-center justify-center text-slate-300 hover:text-white hover:bg-[#1E293B]/60 transition-colors shrink-0"
        href="{{ route('checkout.index') }}">
        <span class="material-symbols-outlined text-[20px] sm:text-[22px]">shopping_bag</span>

        @if($hasActiveCartItem)
          <span
            class="absolute top-1 sm:top-1.5 right-1 sm:right-1.5 min-w-[16px] h-4 px-1 rounded-full bg-rose-500 text-white font-semibold text-[10px] flex items-center justify-center leading-none ring-2 ring-[#0B0F19]">
            1
          </span>
        @endif
      </a>

      <!-- State: GUEST (Belum Login) -->
      @guest
        <div class="flex items-center gap-1.5 sm:gap-2 shrink-0">
          <a href="{{ route('login') }}"
            class="text-xs sm:text-sm font-medium text-slate-300 hover:text-white px-2.5 sm:px-3 py-1.5 rounded-xl hover:bg-white/5 transition-colors">
            Masuk
          </a>
          <a href="{{ route('register') }}"
            class="text-xs sm:text-sm font-semibold text-white bg-[#5B47E0] hover:bg-[#6D58F0] px-3 sm:px-4 py-1.5 rounded-xl transition-all shadow-sm shadow-[#5B47E0]/25 flex items-center justify-center">
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
              class="hidden sm:inline-flex items-center gap-1 px-3 py-1.5 rounded-xl bg-amber-500/10 border border-amber-500/30 text-amber-400 hover:bg-amber-500/20 text-xs font-semibold transition-all shadow-sm"
              title="Masuk Panel Admin & Moderasi">
              <span class="material-symbols-outlined text-[16px]">admin_panel_settings</span>
              <span>Admin Dashboard</span>
            </a>
          @endif

          <!-- Profile Avatar Inisial / Foto Profil -> route('profile.edit') -->
          <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 group" title="Pengaturan Profil">
            <div
              class="w-8 h-8 rounded-full overflow-hidden bg-[#5B47E0] text-white flex items-center justify-center font-bold text-xs border border-indigo-400/30 shrink-0">
              @if(Auth::user()->avatar)
                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="w-full h-full object-cover"
                  alt="{{ Auth::user()->name }}">
              @else
                {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 2)) }}
              @endif
            </div>
            <span
              class="text-xs font-semibold text-white group-hover:text-indigo-300 transition-colors hidden sm:inline-block">
              {{ Auth::user()->name }}
            </span>
          </a>

          <!-- Form Logout -->
          <form method="POST" action="{{ route('logout') }}" class="inline-flex m-0 p-0">
            @csrf
            <button type="submit"
              class="inline-flex items-center gap-1 sm:gap-1.5 px-2.5 sm:px-3 py-1.5 rounded-xl border border-[#1E293B] hover:border-rose-500/40 text-slate-300 hover:text-rose-400 hover:bg-rose-500/10 text-xs font-semibold transition-all cursor-pointer"
              title="Keluar">
              <span class="material-symbols-outlined text-[16px]">logout</span>
              <span class="hidden sm:inline">Keluar</span>
            </button>
          </form>
        </div>
      @endauth

      <!-- Mobile Hamburger Button -->
      <button onclick="document.getElementById('mobileNavMenu').classList.toggle('hidden')" aria-label="Menu Navigasi"
        class="lg:hidden w-9 h-9 rounded-xl flex items-center justify-center text-slate-400 hover:text-white hover:bg-[#1E293B] transition-colors"
        type="button">
        <span class="material-symbols-outlined text-[22px]">menu</span>
      </button>
    </div>
  </div>

  <!-- Mobile Collapsible Menu -->
  <div id="mobileNavMenu" class="hidden lg:hidden border-t border-[#1E293B] bg-[#0B0F19]/95 px-5 py-4 space-y-3">
    <div class="flex flex-col gap-2">
      <a class="text-sm font-medium {{ request()->routeIs('home') ? 'text-white font-semibold' : 'text-slate-300' }} py-1.5 hover:text-white transition-colors"
        href="{{ route('home') }}">Beranda</a>
      <a class="text-sm font-medium {{ request()->routeIs('categories.*') ? 'text-white font-semibold' : 'text-slate-300' }} py-1.5 hover:text-white transition-colors"
        href="{{ route('categories.index') }}">Kategori</a>
      @auth
        <a class="text-sm font-medium {{ request()->routeIs('orders.*') ? 'text-white font-semibold' : 'text-slate-300' }} py-1.5 hover:text-white transition-colors flex items-center gap-1.5"
          href="{{ route('orders.index') }}">
          <span class="material-symbols-outlined text-[16px]">receipt_long</span>
          <span>Riwayat Pesanan</span>
        </a>

        <!-- Tambahan Mobile Admin Menu -->
        @if(Auth::user()->role === 'admin')
          <a class="text-sm font-semibold text-amber-400 py-1.5 flex items-center gap-1.5 hover:text-amber-300 transition-colors"
            href="{{ route('admin.dashboard') }}">
            <span class="material-symbols-outlined text-[16px]">admin_panel_settings</span>
            <span>Admin Dashboard</span>
          </a>
        @endif
      @endauth
      <a class="text-sm font-medium {{ request()->routeIs('about') ? 'text-white font-semibold' : 'text-slate-300' }} py-1.5 hover:text-white transition-colors"
        href="{{ route('about') }}">Tentang Kami</a>
      <a class="text-sm font-medium {{ request()->routeIs('contact') ? 'text-white font-semibold' : 'text-slate-300' }} py-1.5 hover:text-white transition-colors"
        href="{{ route('contact') }}">Kontak</a>
      <a class="text-sm font-medium text-primary py-1.5 flex items-center gap-1.5 hover:text-primary-fixed transition-colors"
        href="{{ route('seller.products.create') }}">
        <span class="material-symbols-outlined text-[16px]">add_circle</span>
        <span>Jual Barang</span>
      </a>
    </div>
  </div>
</header>