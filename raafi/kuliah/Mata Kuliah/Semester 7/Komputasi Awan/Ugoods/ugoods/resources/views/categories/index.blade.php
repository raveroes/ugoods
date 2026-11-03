@extends('layouts.app')

@section('title', isset($activeCategoryData) ? $activeCategoryData['name'] . ' - Katalog ugoods' : 'Eksplorasi Katalog Barang Kampus - ugoods')

@section('content')
<div class="w-full min-h-screen py-6 md:py-10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <!-- Breadcrumb & Header -->
    <div class="mb-8">
      <nav class="flex items-center gap-2 text-xs text-slate-400 mb-3">
        <a href="{{ route('home') }}" class="hover:text-white transition-colors">Beranda</a>
        <span class="material-symbols-outlined text-[14px]">chevron_right</span>
        <a href="{{ route('categories.index') }}" class="hover:text-white transition-colors">Katalog Kategori</a>
        @if(isset($activeCategoryData))
          <span class="material-symbols-outlined text-[14px]">chevron_right</span>
          <span class="text-primary font-medium">{{ $activeCategoryData['name'] }}</span>
        @endif
      </nav>

      <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-surface-container-high border border-outline-variant/30 text-xs text-primary mb-2">
            <span class="material-symbols-outlined text-[16px] text-tertiary">storefront</span>
            <span>Katalog Resmi Preloved Kampus Polimedia</span>
          </div>
          <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold font-display text-white tracking-tight">
            @if(isset($activeCategoryData))
              {{ $activeCategoryData['name'] }}
            @elseif(request('search'))
              Hasil Pencarian: "{{ request('search') }}"
            @else
              Semua Kategori Barang
            @endif
          </h1>
          <p class="text-slate-400 text-sm mt-1 max-w-2xl">
            @if(isset($activeCategoryData))
              {{ $activeCategoryData['desc'] }}
            @else
              Temukan berbagai kebutuhan kuliah, buku diktat, perlengkapan kos, hingga fashion thrift dari sesama mahasiswa tanpa perantara.
            @endif
          </p>
        </div>

        <!-- Tombol Jual Barang Cepat -->
        <a href="{{ route('seller.products.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-primary text-white text-xs font-semibold hover:bg-primary-container transition-all shadow-lg shadow-primary/25 shrink-0 w-fit">
          <span class="material-symbols-outlined text-[18px]">add_circle</span>
          <span>Pasang Iklan Barang</span>
        </a>
      </div>
    </div>

    <!-- Quick Category Pills -->
    <div class="flex items-center gap-2 overflow-x-auto pb-3 mb-8 scrollbar-thin scrollbar-thumb-slate-700">
      <a href="{{ route('categories.index') }}" 
         class="px-4 py-2 rounded-xl text-xs font-semibold shrink-0 transition-all {{ empty($selectedCategory) ? 'bg-primary text-white shadow-md shadow-primary/30' : 'bg-surface-container text-slate-300 hover:bg-surface-container-high hover:text-white border border-outline-variant/30' }}">
        Semua ({{ \App\Models\Product::where('status', 'available')->count() }})
      </a>
      @foreach($categories as $slug => $cat)
        @php
          $catCount = \App\Models\Product::where('category_id', $cat['id'])->where('status', 'available')->count();
          $isActive = ($selectedCategory === $slug || $selectedCategory == $cat['id']);
        @endphp
        <a href="{{ route('categories.index', array_merge(request()->except('category', 'page'), ['category' => $slug])) }}" 
           class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-semibold shrink-0 transition-all {{ $isActive ? 'bg-primary text-white shadow-md shadow-primary/30' : 'bg-surface-container text-slate-300 hover:bg-surface-container-high hover:text-white border border-outline-variant/30' }}">
          <span class="material-symbols-outlined text-[16px]">{{ $cat['icon'] }}</span>
          <span>{{ $cat['name'] }}</span>
          <span class="px-1.5 py-0.2 rounded-full text-[10px] {{ $isActive ? 'bg-white/20 text-white' : 'bg-surface-container-high text-slate-400' }}">{{ $catCount }}</span>
        </a>
      @endforeach
    </div>

    <!-- Main Grid: Sidebar Filter + Product Catalog -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 items-start">
      
      <!-- SIDEBAR FILTER (Mobile collapsable / Desktop sticky) -->
      <aside class="lg:col-span-1 bg-surface-container border border-outline-variant/30 rounded-2xl p-5 sticky top-20 shadow-md">
        <form action="{{ route('categories.index') }}" method="GET" id="filterForm" class="space-y-6">
          
          <!-- Header Filter -->
          <div class="flex items-center justify-between border-b border-outline-variant/20 pb-3">
            <div class="flex items-center gap-2">
              <span class="material-symbols-outlined text-primary text-[20px]">tune</span>
              <h3 class="font-bold text-white text-sm">Filter Katalog</h3>
            </div>
            @if(request()->hasAny(['category', 'location', 'min_price', 'max_price', 'search', 'sort']))
              <a href="{{ route('categories.index') }}" class="text-[11px] text-tertiary hover:underline font-medium">Reset</a>
            @endif
          </div>

          <!-- 1. Pencarian Kata Kunci -->
          <div>
            <label class="block text-xs font-semibold text-slate-300 mb-2">Kata Kunci</label>
            <div class="relative">
              <span class="material-symbols-outlined absolute left-3 top-2.5 text-slate-400 text-[18px]">search</span>
              <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul, merek..." 
                     class="w-full bg-surface-container-low border border-outline-variant/40 rounded-xl pl-9 pr-3 py-2 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-primary transition-colors">
            </div>
          </div>

          <!-- 2. Kategori Barang -->
          <div>
            <label class="block text-xs font-semibold text-slate-300 mb-2">Kategori Pilihan</label>
            <div class="space-y-1.5 max-h-48 overflow-y-auto pr-1">
              <label class="flex items-center gap-2.5 text-xs text-slate-300 hover:text-white p-1.5 rounded-lg hover:bg-surface-container-high cursor-pointer transition-colors">
                <input type="radio" name="category" value="" {{ empty($selectedCategory) ? 'checked' : '' }} 
                       class="text-primary focus:ring-0 bg-surface-container-low border-outline-variant">
                <span>Semua Kategori</span>
              </label>
              @foreach($categories as $slug => $cat)
                <label class="flex items-center gap-2.5 text-xs text-slate-300 hover:text-white p-1.5 rounded-lg hover:bg-surface-container-high cursor-pointer transition-colors">
                  <input type="radio" name="category" value="{{ $slug }}" 
                         {{ ($selectedCategory === $slug || $selectedCategory == $cat['id']) ? 'checked' : '' }} 
                         class="text-primary focus:ring-0 bg-surface-container-low border-outline-variant">
                  <span class="truncate">{{ $cat['name'] }}</span>
                </label>
              @endforeach
            </div>
          </div>

          <!-- 3. Lokasi COD Kampus -->
          <div>
            <label class="block text-xs font-semibold text-slate-300 mb-2">Titik COD Kampus</label>
            <div class="relative">
              <select name="location" class="w-full bg-surface-container-low border border-outline-variant/40 rounded-xl px-3 py-2 text-xs text-white focus:outline-none focus:border-primary transition-colors appearance-none cursor-pointer">
                <option value="">Semua Titik COD</option>
                @foreach($campusLocations as $loc)
                  <option value="{{ $loc }}" {{ request('location') == $loc ? 'selected' : '' }}>
                    {{ $loc }}
                  </option>
                @endforeach
              </select>
              <span class="material-symbols-outlined absolute right-3 top-2.5 text-slate-400 text-[18px] pointer-events-none">expand_more</span>
            </div>
          </div>

          <!-- 4. Rentang Harga -->
          <div>
            <label class="block text-xs font-semibold text-slate-300 mb-2">Rentang Harga (Rp)</label>
            <div class="grid grid-cols-2 gap-2">
              <div>
                <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min" 
                       class="w-full bg-surface-container-low border border-outline-variant/40 rounded-xl px-3 py-2 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-primary transition-colors">
              </div>
              <div>
                <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Maks" 
                       class="w-full bg-surface-container-low border border-outline-variant/40 rounded-xl px-3 py-2 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-primary transition-colors">
              </div>
            </div>
          </div>

          <!-- 5. Urutkan (Sort) -->
          <div>
            <label class="block text-xs font-semibold text-slate-300 mb-2">Urutkan Berdasarkan</label>
            <div class="relative">
              <select name="sort" class="w-full bg-surface-container-low border border-outline-variant/40 rounded-xl px-3 py-2 text-xs text-white focus:outline-none focus:border-primary transition-colors appearance-none cursor-pointer">
                <option value="latest" {{ ($sort ?? request('sort')) == 'latest' ? 'selected' : '' }}>Barang Terbaru</option>
                <option value="price_asc" {{ ($sort ?? request('sort')) == 'price_asc' ? 'selected' : '' }}>Harga: Termurah ke Termahal</option>
                <option value="price_desc" {{ ($sort ?? request('sort')) == 'price_desc' ? 'selected' : '' }}>Harga: Termahal ke Termurah</option>
                <option value="oldest" {{ ($sort ?? request('sort')) == 'oldest' ? 'selected' : '' }}>Paling Lama</option>
              </select>
              <span class="material-symbols-outlined absolute right-3 top-2.5 text-slate-400 text-[18px] pointer-events-none">sort</span>
            </div>
          </div>

          <!-- Submit Action -->
          <div class="pt-2 flex flex-col gap-2">
            <button type="submit" class="w-full py-2.5 px-4 rounded-xl bg-primary hover:bg-primary-container text-white text-xs font-semibold transition-all shadow-md shadow-primary/20 flex items-center justify-center gap-1.5 cursor-pointer">
              <span class="material-symbols-outlined text-[16px]">filter_alt</span>
              <span>Terapkan Filter</span>
            </button>
            <a href="{{ route('categories.index') }}" class="w-full py-2 px-4 rounded-xl bg-surface-container-high hover:bg-surface-container-highest text-slate-300 hover:text-white text-xs font-medium text-center transition-colors">
              Bersihkan Filter
            </a>
          </div>
        </form>
      </aside>

      <!-- CATALOG PRODUCTS GRID -->
      <section class="lg:col-span-3">
        <!-- Results Counter Bar -->
        <div class="flex items-center justify-between mb-4 bg-surface-container/50 border border-outline-variant/20 rounded-xl px-4 py-2.5">
          <div class="text-xs text-slate-300">
            Menampilkan <span class="font-bold text-white">{{ $products->count() }}</span> dari total <span class="font-bold text-white">{{ $products->total() }}</span> barang preloved
          </div>
          <div class="text-[11px] text-slate-400 hidden sm:block">
            Halaman {{ $products->currentPage() }} dari {{ $products->lastPage() }}
          </div>
        </div>

        <!-- 3-4 Column Grid of 12 Products -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5">
          @forelse ($products as $product)
            <article class="group relative rounded-2xl bg-surface-container border border-outline-variant/30 flex flex-col justify-between overflow-hidden shadow-sm hover:shadow-xl hover:shadow-primary-container/10 hover:border-primary-container/40 transition-all duration-300">
              <div>
                <!-- Image Box with dynamic fallback placeholder -->
                <div class="relative aspect-square w-full bg-surface-container-low overflow-hidden">
                  @if ($product->image_path)
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" 
                         src="{{ \Illuminate\Support\Str::startsWith($product->image_path, 'http') ? $product->image_path : asset('storage/' . $product->image_path) }}" 
                         alt="{{ $product->title }}"
                         onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'w-full h-full flex flex-col items-center justify-center bg-surface-container-high text-primary p-3 text-center\'><span class=\'font-bold text-2xl tracking-tight text-white font-display\'>u<span class=\'text-primary\'>goods</span></span><span class=\'text-[10px] text-outline font-label-sm mt-1 uppercase tracking-wider\'>Preloved Kampus</span></div>';">
                  @else
                    <!-- Dynamic Placeholder: Logo ugoods + Inisial / Judul Produk -->
                    <div class="w-full h-full flex flex-col items-center justify-center bg-surface-container-high text-primary p-3 text-center">
                      <span class="font-bold text-2xl tracking-tight text-white font-display">u<span class="text-primary">goods</span></span>
                      <span class="text-[10px] text-outline font-label-sm mt-1 uppercase tracking-wider line-clamp-1">
                        {{ \Illuminate\Support\Str::limit($product->title, 20) }}
                      </span>
                    </div>
                  @endif

                  <!-- Condition Badge -->
                  @if ($product->condition_rating)
                    <span class="absolute top-3 left-3 px-2 py-0.5 rounded-md bg-primary-container text-on-primary font-headline-sm text-[11px] font-semibold shadow-md backdrop-blur-md">
                      {{ $product->condition_rating }}
                    </span>
                  @endif

                  <!-- Category Tag Badge -->
                  @php
                    $catMeta = collect($categories)->firstWhere('id', $product->category_id);
                  @endphp
                  @if($catMeta)
                    <span class="absolute bottom-3 left-3 px-2 py-0.5 rounded-md bg-surface-container-lowest/80 text-slate-200 text-[10px] font-medium backdrop-blur-md border border-outline-variant/30 flex items-center gap-1">
                      <span class="material-symbols-outlined text-[12px] text-primary">{{ $catMeta['icon'] }}</span>
                      <span>{{ $catMeta['name'] }}</span>
                    </span>
                  @endif
                </div>

                <!-- Card Info -->
                <div class="p-4 flex flex-col gap-2">
                  <!-- Lokasi COD & Badge Kampus -->
                  <div class="flex items-center justify-between text-slate-400 text-[11px]">
                    <span class="flex items-center gap-1 truncate max-w-[160px]" title="{{ $product->cod_location ?? 'Polimedia Srengseng' }}">
                      <span class="material-symbols-outlined text-secondary text-[14px] shrink-0">location_on</span> 
                      <span class="truncate">{{ $product->cod_location ?? 'Polimedia Srengseng' }}</span>
                    </span>
                    <span class="text-tertiary bg-tertiary/10 px-1.5 py-0.5 rounded text-[10px] font-semibold shrink-0">
                      COD Kampus
                    </span>
                  </div>

                  <!-- Product Title -->
                  <h3 class="font-bold text-sm text-white line-clamp-2 group-hover:text-primary transition-colors" title="{{ $product->title }}">
                    <a href="{{ route('products.show', $product->slug ?? $product->id) }}">
                      {{ $product->title }}
                    </a>
                  </h3>

                  <!-- Seller Name -->
                  <div class="flex items-center gap-1 text-[11px] text-slate-400">
                    <span class="material-symbols-outlined text-[14px] text-slate-500">account_circle</span>
                    <span class="truncate">{{ $product->user->name ?? 'Mahasiswa Penjual' }}</span>
                  </div>

                  <!-- Price Display -->
                  <div class="mt-1 flex items-baseline justify-between">
                    <span class="text-base font-bold text-primary font-price-display">
                      Rp {{ number_format($product->price, 0, ',', '.') }}
                    </span>
                    <span class="text-[10px] text-slate-500">Harga Pas</span>
                  </div>
                </div>
              </div>

              <!-- Action Button -->
              <div class="p-4 pt-0">
                <a href="{{ route('products.show', $product->slug ?? $product->id) }}" 
                   class="w-full py-2 px-3 rounded-xl bg-surface-container-highest hover:bg-primary hover:text-white text-slate-200 text-xs font-semibold flex items-center justify-center gap-1.5 transition-all duration-200">
                  <span class="material-symbols-outlined text-[16px]">visibility</span>
                  <span>Lihat Detail</span>
                </a>
              </div>
            </article>
          @empty
            <div class="col-span-full py-16 px-6 rounded-2xl bg-surface-container text-center flex flex-col items-center justify-center border border-dashed border-outline-variant/40">
              <div class="w-16 h-16 rounded-2xl bg-surface-container-high flex items-center justify-center text-primary mb-4 shadow-sm">
                <span class="material-symbols-outlined text-3xl">search_off</span>
              </div>
              <h3 class="font-bold text-white text-lg">Tidak Ada Barang yang Cocok</h3>
              <p class="text-slate-400 text-xs max-w-md mt-1 mb-6">
                Belum ada produk yang memenuhi kriteria filter atau kata kunci pencarian Anda. Coba kurangi filter atau cari dengan istilah lain.
              </p>
              <div class="flex items-center gap-3">
                <a href="{{ route('categories.index') }}" class="px-4 py-2 rounded-xl bg-surface-container-highest text-white text-xs font-semibold hover:bg-primary transition-colors">
                  Reset Semua Filter
                </a>
                <a href="{{ route('seller.products.create') }}" class="px-4 py-2 rounded-xl bg-primary text-white text-xs font-semibold hover:bg-primary-container transition-colors">
                  Jual Barang Ini
                </a>
              </div>
            </div>
          @endforelse
        </div>

        <!-- Pagination Links -->
        <div class="mt-8">
          {{ $products->links() }}
        </div>

      </section>
    </div>

  </div>
</div>
@endsection
