@extends('layouts.app')

@section('title', isset($activeCategoryData) ? $activeCategoryData['name'] . ' - Katalog ugoods' : 'Eksplorasi Katalog Barang Kampus - ugoods')

@section('content')
<div class="w-full min-h-screen py-6 md:py-10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <!-- Breadcrumb & Header -->
    <div class="mb-8">
      <nav class="flex items-center gap-2 text-xs text-[#7E70A6] mb-3 font-medium">
        <a href="{{ route('home') }}" class="hover:text-[#5B47E0] transition-colors">Beranda</a>
        <span class="material-symbols-outlined text-[14px]">chevron_right</span>
        <a href="{{ route('categories.index') }}" class="hover:text-[#5B47E0] transition-colors">Katalog Kategori</a>
        @if(isset($activeCategoryData))
          <span class="material-symbols-outlined text-[14px]">chevron_right</span>
          <span class="text-[#5B47E0] font-bold">{{ $activeCategoryData['name'] }}</span>
        @endif
      </nav>

      <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white border border-[#D6C7FF] text-xs text-[#5B47E0] mb-2 font-semibold shadow-xs">
            <span class="material-symbols-outlined text-[16px] text-[#059669]">storefront</span>
            <span>Katalog Resmi Preloved Kampus Polimedia</span>
          </div>
          <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold font-display text-[#1A0D3F] tracking-tight">
            @if(isset($activeCategoryData))
              {{ $activeCategoryData['name'] }}
            @elseif(request('search'))
              Hasil Pencarian: "{{ request('search') }}"
            @else
              Semua Kategori Barang
            @endif
          </h1>
          <p class="text-[#4A3B75] text-sm mt-1 max-w-2xl font-medium">
            @if(isset($activeCategoryData))
              {{ $activeCategoryData['desc'] }}
            @else
              Temukan berbagai kebutuhan kuliah, buku diktat, perlengkapan kos, hingga fashion thrift dari sesama mahasiswa tanpa perantara.
            @endif
          </p>
        </div>

        <!-- Tombol Jual Barang Cepat -->
        <a href="{{ route('seller.products.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#5B47E0] text-white text-xs font-semibold hover:bg-[#4A35D0] transition-all shadow-md shadow-[#5B47E0]/30 shrink-0 w-fit">
          <span class="material-symbols-outlined text-[18px]">add_circle</span>
          <span>Pasang Iklan Barang</span>
        </a>
      </div>
    </div>

    <!-- Quick Category Pills -->
    <div class="flex items-center gap-2 overflow-x-auto pb-3 mb-8 scrollbar-thin scrollbar-thumb-purple-200">
      <a href="{{ route('categories.index') }}" 
         class="px-4 py-2 rounded-xl text-xs font-semibold shrink-0 transition-all {{ empty($selectedCategory) ? 'bg-[#5B47E0] text-white shadow-md shadow-[#5B47E0]/30' : 'bg-white text-[#4A3B75] hover:bg-[#F3EFFF] hover:text-[#5B47E0] border border-[#E4DCFA] shadow-xs' }}">
        Semua ({{ \App\Models\Product::where('status', 'available')->count() }})
      </a>
      @foreach($categories as $slug => $cat)
        @php
          $catCount = \App\Models\Product::where('category_id', $cat['id'])->where('status', 'available')->count();
          $isActive = ($selectedCategory === $slug || $selectedCategory == $cat['id']);
        @endphp
        <a href="{{ route('categories.index', array_merge(request()->except('category', 'page'), ['category' => $slug])) }}" 
           class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-semibold shrink-0 transition-all {{ $isActive ? 'bg-[#5B47E0] text-white shadow-md shadow-[#5B47E0]/30' : 'bg-white text-[#4A3B75] hover:bg-[#F3EFFF] hover:text-[#5B47E0] border border-[#E4DCFA] shadow-xs' }}">
          <span class="material-symbols-outlined text-[16px]">{{ $cat['icon'] }}</span>
          <span>{{ $cat['name'] }}</span>
          <span class="px-1.5 py-0.2 rounded-full text-[10px] {{ $isActive ? 'bg-white/20 text-white' : 'bg-[#F5F3FF] text-[#5B47E0] border border-[#D6C7FF]' }}">{{ $catCount }}</span>
        </a>
      @endforeach
    </div>

    <!-- Main Grid: Sidebar Filter + Product Catalog -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 items-start">
      
      <!-- SIDEBAR FILTER (Mobile collapsable / Desktop sticky) -->
      <aside class="lg:col-span-1 bg-white border border-[#E4DCFA] rounded-2xl p-5 sticky top-20 shadow-md shadow-purple-100/50">
        <form action="{{ route('categories.index') }}" method="GET" id="filterForm" class="space-y-6">
          
          <!-- Header Filter -->
          <div class="flex items-center justify-between border-b border-[#E4DCFA] pb-3">
            <div class="flex items-center gap-2">
              <span class="material-symbols-outlined text-[#5B47E0] text-[20px]">tune</span>
              <h3 class="font-bold text-[#1A0D3F] text-sm">Filter Katalog</h3>
            </div>
            @if(request()->hasAny(['category', 'location', 'min_price', 'max_price', 'search', 'sort']))
              <a href="{{ route('categories.index') }}" class="text-[11px] text-[#059669] hover:underline font-bold">Reset</a>
            @endif
          </div>

          <!-- 1. Pencarian Kata Kunci -->
          <div>
            <label class="block text-xs font-bold text-[#1A0D3F] mb-2">Kata Kunci</label>
            <div class="relative">
              <span class="material-symbols-outlined absolute left-3 top-2.5 text-[#7E70A6] text-[18px]">search</span>
              <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul, merek..." 
                     class="w-full bg-[#FAF8FF] border border-[#D6C7FF] rounded-xl pl-9 pr-3 py-2 text-xs text-[#1A0D3F] placeholder-[#7E70A6] focus:outline-none focus:border-[#5B47E0] focus:ring-2 focus:ring-[#5B47E0]/20 focus:bg-white transition-all shadow-xs">
            </div>
          </div>

          <!-- 2. Kategori Barang -->
          <div>
            <label class="block text-xs font-bold text-[#1A0D3F] mb-2">Kategori Pilihan</label>
            <div class="space-y-1.5 max-h-48 overflow-y-auto pr-1">
              <label class="flex items-center gap-2.5 text-xs text-[#4A3B75] hover:text-[#1A0D3F] p-1.5 rounded-lg hover:bg-[#F5F3FF] cursor-pointer transition-colors">
                <input type="radio" name="category" value="" {{ empty($selectedCategory) ? 'checked' : '' }} 
                       class="text-[#5B47E0] focus:ring-0 bg-[#FAF8FF] border-[#D6C7FF]">
                <span>Semua Kategori</span>
              </label>
              @foreach($categories as $slug => $cat)
                <label class="flex items-center gap-2.5 text-xs text-[#4A3B75] hover:text-[#1A0D3F] p-1.5 rounded-lg hover:bg-[#F5F3FF] cursor-pointer transition-colors">
                  <input type="radio" name="category" value="{{ $slug }}" 
                         {{ ($selectedCategory === $slug || $selectedCategory == $cat['id']) ? 'checked' : '' }} 
                         class="text-[#5B47E0] focus:ring-0 bg-[#FAF8FF] border-[#D6C7FF]">
                  <span class="truncate">{{ $cat['name'] }}</span>
                </label>
              @endforeach
            </div>
          </div>

          <!-- 3. Lokasi COD Kampus -->
          <div>
            <label class="block text-xs font-bold text-[#1A0D3F] mb-2">Titik COD Kampus</label>
            <div class="relative">
              <select name="location" class="w-full bg-[#FAF8FF] border border-[#D6C7FF] rounded-xl px-3 py-2 text-xs text-[#1A0D3F] focus:outline-none focus:border-[#5B47E0] focus:ring-2 focus:ring-[#5B47E0]/20 focus:bg-white transition-all appearance-none cursor-pointer shadow-xs">
                <option value="">Semua Titik COD</option>
                @foreach($campusLocations as $loc)
                  <option value="{{ $loc }}" {{ request('location') == $loc ? 'selected' : '' }}>
                    {{ $loc }}
                  </option>
                @endforeach
              </select>
              <span class="material-symbols-outlined absolute right-3 top-2.5 text-[#7E70A6] text-[18px] pointer-events-none">expand_more</span>
            </div>
          </div>

          <!-- 4. Rentang Harga -->
          <div>
            <label class="block text-xs font-bold text-[#1A0D3F] mb-2">Rentang Harga (Rp)</label>
            <div class="grid grid-cols-2 gap-2">
              <div>
                <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min" 
                       class="w-full bg-[#FAF8FF] border border-[#D6C7FF] rounded-xl px-3 py-2 text-xs text-[#1A0D3F] placeholder-[#7E70A6] focus:outline-none focus:border-[#5B47E0] focus:ring-2 focus:ring-[#5B47E0]/20 focus:bg-white transition-all shadow-xs">
              </div>
              <div>
                <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Maks" 
                       class="w-full bg-[#FAF8FF] border border-[#D6C7FF] rounded-xl px-3 py-2 text-xs text-[#1A0D3F] placeholder-[#7E70A6] focus:outline-none focus:border-[#5B47E0] focus:ring-2 focus:ring-[#5B47E0]/20 focus:bg-white transition-all shadow-xs">
              </div>
            </div>
          </div>

          <!-- 5. Urutkan (Sort) -->
          <div>
            <label class="block text-xs font-bold text-[#1A0D3F] mb-2">Urutkan Berdasarkan</label>
            <div class="relative">
              <select name="sort" class="w-full bg-[#FAF8FF] border border-[#D6C7FF] rounded-xl px-3 py-2 text-xs text-[#1A0D3F] focus:outline-none focus:border-[#5B47E0] focus:ring-2 focus:ring-[#5B47E0]/20 focus:bg-white transition-all appearance-none cursor-pointer shadow-xs">
                <option value="latest" {{ ($sort ?? request('sort')) == 'latest' ? 'selected' : '' }}>Barang Terbaru</option>
                <option value="price_asc" {{ ($sort ?? request('sort')) == 'price_asc' ? 'selected' : '' }}>Harga: Termurah ke Termahal</option>
                <option value="price_desc" {{ ($sort ?? request('sort')) == 'price_desc' ? 'selected' : '' }}>Harga: Termahal ke Termurah</option>
                <option value="oldest" {{ ($sort ?? request('sort')) == 'oldest' ? 'selected' : '' }}>Paling Lama</option>
              </select>
              <span class="material-symbols-outlined absolute right-3 top-2.5 text-[#7E70A6] text-[18px] pointer-events-none">sort</span>
            </div>
          </div>

          <!-- Submit Action -->
          <div class="pt-2 flex flex-col gap-2">
            <button type="submit" class="w-full py-2.5 px-4 rounded-xl bg-[#5B47E0] hover:bg-[#4A35D0] text-white text-xs font-semibold transition-all shadow-md shadow-[#5B47E0]/25 flex items-center justify-center gap-1.5 cursor-pointer">
              <span class="material-symbols-outlined text-[16px]">filter_alt</span>
              <span>Terapkan Filter</span>
            </button>
            <a href="{{ route('categories.index') }}" class="w-full py-2 px-4 rounded-xl bg-[#F5F3FF] hover:bg-[#EDE9FE] text-[#4A3B75] hover:text-[#1A0D3F] border border-[#D6C7FF] text-xs font-medium text-center transition-colors">
              Bersihkan Filter
            </a>
          </div>
        </form>
      </aside>

      <!-- CATALOG PRODUCTS GRID -->
      <section class="lg:col-span-3">
        <!-- Results Counter Bar -->
        <div class="flex items-center justify-between mb-4 bg-white border border-[#E4DCFA] shadow-xs rounded-xl px-4 py-2.5">
          <div class="text-xs text-[#4A3B75] font-medium">
            Menampilkan <span class="font-bold text-[#1A0D3F]">{{ $products->count() }}</span> dari total <span class="font-bold text-[#1A0D3F]">{{ $products->total() }}</span> barang preloved
          </div>
          <div class="text-[11px] text-[#7E70A6] hidden sm:block">
            Halaman {{ $products->currentPage() }} dari {{ $products->lastPage() }}
          </div>
        </div>

        <!-- 3-4 Column Grid of 12 Products -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5">
          @forelse ($products as $product)
            <article class="group relative rounded-2xl bg-white border border-[#E9E3FB] hover:border-[#C4B5FD] flex flex-col justify-between overflow-hidden shadow-md shadow-purple-100/60 hover:shadow-xl hover:shadow-[#5B47E0]/15 transition-all duration-300">
              <div>
                <!-- Image Box with dynamic fallback placeholder (Warm Tinted Frame) -->
                <div class="relative aspect-square w-full bg-[#F6F3FE] border-b border-[#E9E3FB] overflow-hidden">
                  @if ($product->image_path)
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" 
                         src="{{ \Illuminate\Support\Str::startsWith($product->image_path, 'http') ? $product->image_path : asset('storage/' . $product->image_path) }}" 
                         alt="{{ $product->title }}"
                         onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'w-full h-full flex flex-col items-center justify-center bg-[#F6F3FE] text-[#5B47E0] p-3 text-center\'><span class=\'font-bold text-2xl tracking-tight text-[#1A0D3F] font-display\'>u<span class=\'text-[#5B47E0]\'>goods</span></span><span class=\'text-[10px] text-[#7E70A6] font-label-sm mt-1 uppercase tracking-wider\'>Preloved Kampus</span></div>';">
                  @else
                    <!-- Dynamic Placeholder: Logo ugoods + Inisial / Judul Produk -->
                    <div class="w-full h-full flex flex-col items-center justify-center bg-[#F6F3FE] text-[#5B47E0] p-3 text-center">
                      <span class="font-bold text-2xl tracking-tight text-[#1A0D3F] font-display">u<span class="text-[#5B47E0]">goods</span></span>
                      <span class="text-[10px] text-[#7E70A6] font-label-sm mt-1 uppercase tracking-wider line-clamp-1">
                        {{ \Illuminate\Support\Str::limit($product->title, 20) }}
                      </span>
                    </div>
                  @endif

                  <!-- Condition Badge -->
                  @if ($product->condition_rating)
                    <span class="absolute top-3 left-3 px-2.5 py-1 rounded-md bg-[#5B47E0] text-white font-headline-sm text-[11px] font-bold shadow-md shadow-[#5B47E0]/20 backdrop-blur-md">
                      {{ $product->condition_rating }}
                    </span>
                  @endif

                  <!-- Category Tag Badge -->
                  @php
                    $catMeta = collect($categories)->firstWhere('id', $product->category_id);
                  @endphp
                  @if($catMeta)
                    <span class="absolute bottom-3 left-3 px-2 py-0.5 rounded-md bg-white/90 text-[#1A0D3F] text-[10px] font-semibold backdrop-blur-md border border-[#E4DCFA] flex items-center gap-1 shadow-xs">
                      <span class="material-symbols-outlined text-[12px] text-[#5B47E0]">{{ $catMeta['icon'] }}</span>
                      <span>{{ $catMeta['name'] }}</span>
                    </span>
                  @endif
                </div>

                <!-- Card Info -->
                <div class="p-4 flex flex-col gap-2">
                  <!-- Lokasi COD & Badge Kampus -->
                  <div class="flex items-center justify-between text-[#7E70A6] text-[11px]">
                    <span class="flex items-center gap-1 truncate max-w-[160px]" title="{{ $product->cod_location ?? 'Polimedia Srengseng' }}">
                      <span class="material-symbols-outlined text-[#0284C7] text-[14px] shrink-0">location_on</span> 
                      <span class="truncate">{{ $product->cod_location ?? 'Polimedia Srengseng' }}</span>
                    </span>
                    <span class="text-[#065F46] bg-[#D1FAE5] border border-[#A7F3D0] px-2 py-0.5 rounded text-[10px] font-bold shrink-0">
                      COD Kampus
                    </span>
                  </div>

                  <!-- Product Title -->
                  <h3 class="font-bold text-sm text-[#1A0D3F] line-clamp-2 group-hover:text-[#5B47E0] transition-colors" title="{{ $product->title }}">
                    <a href="{{ route('products.show', $product->slug ?? $product->id) }}">
                      {{ $product->title }}
                    </a>
                  </h3>

                  <!-- Seller Name -->
                  <div class="flex items-center gap-1 text-[11px] text-[#7E70A6]">
                    <span class="material-symbols-outlined text-[14px] text-[#7E70A6]">account_circle</span>
                    <span class="truncate">{{ $product->user->name ?? 'Mahasiswa Penjual' }}</span>
                  </div>

                  <!-- Price Display -->
                  <div class="mt-1 flex items-baseline justify-between">
                    <span class="text-base font-bold text-[#5B47E0] font-price-display text-lg">
                      Rp {{ number_format($product->price, 0, ',', '.') }}
                    </span>
                    <span class="text-[10px] text-[#7E70A6]">Harga Pas</span>
                  </div>
                </div>
              </div>

              <!-- Action Button -->
              <div class="p-4 pt-0">
                <a href="{{ route('products.show', $product->slug ?? $product->id) }}" 
                   class="w-full py-2 px-3 rounded-xl bg-[#F5F3FF] hover:bg-[#5B47E0] hover:text-white text-[#5B47E0] border border-[#D6C7FF] hover:border-[#5B47E0] text-xs font-bold flex items-center justify-center gap-1.5 transition-all duration-200 shadow-xs hover:shadow-md hover:shadow-[#5B47E0]/25">
                  <span class="material-symbols-outlined text-[16px]">visibility</span>
                  <span>Lihat Detail</span>
                </a>
              </div>
            </article>
          @empty
            <div class="col-span-full py-16 px-6 rounded-2xl bg-white text-center flex flex-col items-center justify-center border border-dashed border-[#D6C7FF] shadow-sm shadow-purple-100/50">
              <div class="w-16 h-16 rounded-2xl bg-[#F5F3FF] border border-[#E9E3FB] flex items-center justify-center text-[#5B47E0] mb-4 shadow-sm">
                <span class="material-symbols-outlined text-3xl">search_off</span>
              </div>
              <h3 class="font-bold text-[#1A0D3F] text-lg">Tidak Ada Barang yang Cocok</h3>
              <p class="text-[#4A3B75] text-xs max-w-md mt-1 mb-6">
                Belum ada produk yang memenuhi kriteria filter atau kata kunci pencarian Anda. Coba kurangi filter atau cari dengan istilah lain.
              </p>
              <div class="flex items-center gap-3">
                <a href="{{ route('categories.index') }}" class="px-4 py-2 rounded-xl bg-[#F5F3FF] text-[#1A0D3F] border border-[#D6C7FF] text-xs font-bold hover:bg-[#EDE9FE] transition-colors">
                  Reset Semua Filter
                </a>
                <a href="{{ route('seller.products.create') }}" class="px-4 py-2 rounded-xl bg-[#5B47E0] text-white text-xs font-bold hover:bg-[#4A35D0] shadow-md shadow-[#5B47E0]/25 transition-colors">
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
