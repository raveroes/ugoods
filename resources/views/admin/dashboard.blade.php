=@extends('layouts.app')

@section('title', 'Dashboard Admin & Moderasi Kampus - ugoods')

@section('content')
  <div class="flex flex-col w-full">
    <div
      class="max-w-[1280px] w-full mx-auto px-margin md:px-margin-tablet lg:px-margin-desktop py-space-xl flex flex-col gap-space-xl">
      <!-- Breadcrumbs & Header Section -->
      <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-space-lg">
        <div class="flex flex-col gap-space-xs">
          <nav aria-label="Breadcrumb" class="flex items-center gap-space-xs">
            <span class="font-label-sm text-label-sm text-outline">Admin Portal</span>
            <span class="material-symbols-outlined text-[14px] text-outline">chevron_right</span>
            <span class="font-label-sm text-label-sm text-primary">Pusat Moderasi Kampus</span>
            <span
              class="inline-flex items-center gap-1 ml-space-xs px-space-xs py-space-2xs rounded bg-surface-container-high text-tertiary font-label-sm text-label-sm">
              <span class="w-1.5 h-1.5 rounded-full bg-tertiary animate-pulse"></span> Live System
            </span>
          </nav>
          <h1 class="font-headline-lg text-headline-lg tracking-tight text-on-surface">
            Dashboard Moderasi &amp; Verifikasi Kampus
          </h1>
          <p class="font-body-md text-body-md text-on-surface-variant max-w-2xl">
            Pantau dan setujui penayangan barang preloved mahasiswa serta verifikasi keabsahan Kartu Tanda Mahasiswa
            (KTM).
          </p>
        </div>
        <!-- Quick Action Buttons -->
        <div class="flex items-center gap-space-sm self-start lg:self-center shrink-0">
          <a href="{{ route('admin.dashboard') }}"
            class="h-10 px-space-md rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md flex items-center gap-space-xs transition-colors shadow-sm"
            id="btn-refresh">
            <span class="material-symbols-outlined text-[18px] text-secondary">refresh</span>
            <span>Segarkan Data</span>
          </a>
          <button
            class="h-10 px-space-md rounded-lg bg-primary-container hover:bg-primary-container/90 text-on-primary-container font-label-md text-label-md flex items-center gap-space-xs transition-colors shadow-md">
            <span class="material-symbols-outlined text-[18px]">download</span>
            <span>Ekspor Laporan Moderasi</span>
          </button>
        </div>
      </div>
      <!-- KPI Metric Cards Grid (4 Columns) -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-space-md">
        <!-- Card 1: Pengajuan Produk -->
        <div
          class="p-space-lg rounded-xl bg-surface-container relative overflow-hidden flex flex-col justify-between shadow-sm">
          <div class="flex items-center justify-between">
            <span class="font-label-md text-label-md text-on-surface-variant">Pengajuan Produk</span>
            <div class="w-10 h-10 rounded-lg bg-primary-container/30 flex items-center justify-center text-primary">
              <span class="material-symbols-outlined text-[22px]">inventory_2</span>
            </div>
          </div>
          <div class="mt-space-md flex flex-col gap-space-2xs">
            <div class="flex items-baseline gap-space-xs">
              <span class="font-display-hero text-display-hero leading-none text-on-surface"
                id="stat-product-count">{{ $pendingProductsCount }}</span>
              <span class="font-label-sm text-label-sm text-primary font-semibold">Listing</span>
            </div>
            <span class="font-body-sm text-body-sm text-on-surface-variant">Menunggu tinjauan kurasi</span>
          </div>
          <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-primary to-primary-container"></div>
        </div>
        <!-- Card 2: Verifikasi KTM Pending -->
        <div
          class="p-space-lg rounded-xl bg-surface-container relative overflow-hidden flex flex-col justify-between shadow-sm">
          <div class="flex items-center justify-between">
            <span class="font-label-md text-label-md text-on-surface-variant">Verifikasi KTM Pending</span>
            <div class="w-10 h-10 rounded-lg bg-amber-500/15 flex items-center justify-center text-amber-400">
              <span class="material-symbols-outlined text-[22px]">badge</span>
            </div>
          </div>
          <div class="mt-space-md flex flex-col gap-space-2xs">
            <div class="flex items-baseline gap-space-xs">
              <span class="font-display-hero text-display-hero leading-none text-on-surface"
                id="stat-ktm-count">{{ $pendingKtmCount }}</span>
              <span class="font-label-sm text-label-sm text-amber-400 font-semibold">Berkas</span>
            </div>
            <span class="font-body-sm text-body-sm text-on-surface-variant">Dokumen mahasiswa baru</span>
          </div>
          <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-amber-500 to-amber-300"></div>
        </div>
        <!-- Card 3: Total Pengguna Aktif -->
        <div
          class="p-space-lg rounded-xl bg-surface-container relative overflow-hidden flex flex-col justify-between shadow-sm">
          <div class="flex items-center justify-between">
            <span class="font-label-md text-label-md text-on-surface-variant">Total Pengguna Aktif</span>
            <div class="w-10 h-10 rounded-lg bg-tertiary-container/40 flex items-center justify-center text-tertiary">
              <span class="material-symbols-outlined text-[22px]">group</span>
            </div>
          </div>
          <div class="mt-space-md flex flex-col gap-space-2xs">
            <div class="flex items-baseline gap-space-xs">
              <span
                class="font-display-hero text-display-hero leading-none text-on-surface">{{ $totalActiveUsers }}</span>
              <span class="font-label-sm text-label-sm text-tertiary font-semibold">Mhs</span>
            </div>
            <span class="font-body-sm text-body-sm text-on-surface-variant">Mahasiswa terverifikasi</span>
          </div>
          <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-tertiary to-tertiary-container"></div>
        </div>
        <!-- Card 4: Laporan Kendala / Aduan -->
        <div
          class="p-space-lg rounded-xl bg-surface-container relative overflow-hidden flex flex-col justify-between shadow-sm">
          <div class="flex items-center justify-between">
            <span class="font-label-md text-label-md text-on-surface-variant">Laporan Kendala / Aduan</span>
            <div class="w-10 h-10 rounded-lg bg-secondary-container/30 flex items-center justify-center text-secondary">
              <span class="material-symbols-outlined text-[22px]">verified_user</span>
            </div>
          </div>
          <div class="mt-space-md flex flex-col gap-space-2xs">
            <div class="flex items-baseline gap-space-xs">
              <span class="font-display-hero text-display-hero leading-none text-on-surface">{{ $totalIssues }}</span>
              <span class="font-label-sm text-label-sm text-secondary font-semibold">Kasus</span>
            </div>
            <span class="font-body-sm text-body-sm text-on-surface-variant">Semua transaksi lancar</span>
          </div>
          <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-secondary to-secondary-container"></div>
        </div>
      </div>
      <!-- Segmented Control Bar & Search Filter Panel -->
      <div class="flex flex-col gap-space-md">
        <!-- Main Segmented Tabs -->
        <div class="flex flex-wrap items-center justify-between gap-space-md">
          <div class="inline-flex p-1 rounded-xl bg-surface-container-low">
            <button
              class="px-space-lg py-space-sm rounded-lg bg-primary-container text-on-primary-container font-label-md text-label-md flex items-center gap-space-xs shadow-md transition-all"
              id="tab-btn-products">
              <span class="material-symbols-outlined text-[18px]">inventory_2</span>
              <span>Moderasi Produk Preloved</span>
              <span
                class="ml-space-2xs px-1.5 py-0.5 rounded-full bg-white/20 text-on-primary-container font-label-sm text-label-sm">{{ $pendingProductsCount }}</span>
            </button>
            <button
              class="px-space-lg py-space-sm rounded-lg text-on-surface-variant hover:text-on-surface font-label-md text-label-md flex items-center gap-space-xs transition-all"
              id="tab-btn-ktm">
              <span class="material-symbols-outlined text-[18px]">badge</span>
              <span>Verifikasi KTM User</span>
              <span
                class="ml-space-2xs px-1.5 py-0.5 rounded-full bg-amber-500/20 text-amber-400 font-label-sm text-label-sm">{{ $pendingKtmCount }}</span>
            </button>
          </div>
          <div class="flex items-center gap-space-xs font-label-sm text-label-sm text-outline">
            <span class="material-symbols-outlined text-[16px] text-tertiary">check_circle</span>
            <span>Sistem sinkron: Kampus Polimedia Depok</span>
          </div>
        </div>
        <!-- Filter and Search Row -->
        <form action="{{ route('admin.dashboard') }}" method="GET"
          class="p-space-md rounded-xl bg-surface-container flex flex-col md:flex-row items-stretch md:items-center justify-between gap-space-md shadow-sm">
          <div class="relative flex-1">
            <span
              class="material-symbols-outlined absolute left-space-md top-1/2 -translate-y-1/2 text-outline text-[18px]">search</span>
            <input
              class="w-full h-10 pl-10 pr-space-md rounded-lg bg-surface-container-low font-body-sm text-body-sm text-on-surface placeholder:text-outline focus:outline-none focus:bg-surface-container-high transition-colors"
              id="search-input" name="search" value="{{ request('search') }}"
              placeholder="Cari judul produk, nama penjual, atau email..." type="text">
          </div>
          <div class="flex flex-wrap items-center gap-space-sm">
            <!-- Category Filter -->
            <div class="relative">
              <select name="category"
                class="h-10 pl-space-md pr-8 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface appearance-none focus:outline-none focus:bg-surface-container-high transition-colors cursor-pointer">
                <option value="all">Semua Kategori</option>
                <option value="electronics">Elektronik &amp; Gadget</option>
                <option value="books">Buku Kuliah</option>
                <option value="stationery">Alat Gambar &amp; Praktikum</option>
              </select>
              <span
                class="material-symbols-outlined absolute right-space-sm top-1/2 -translate-y-1/2 text-outline pointer-events-none text-[18px]">expand_more</span>
            </div>
            <!-- Quick Refresh Table Mini Button -->
            <button type="submit"
              class="h-10 px-4 flex items-center justify-center rounded-lg bg-primary-container text-on-primary-container font-label-sm text-label-sm transition-colors">
              Cari
            </button>
          </div>
        </form>
      </div>

      <!-- Active Tab 1 Content: Moderation Table Card -->
      <div class="p-space-lg rounded-2xl bg-surface-container flex flex-col gap-space-md shadow-xl">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-xs pb-space-sm">
          <div>
            <h2 class="font-headline-sm text-headline-sm text-on-surface">Antrean Pengajuan Barang Preloved Kampus</h2>
            <p class="font-body-sm text-body-sm text-on-surface-variant">Periksa foto asli, kelayakan barang, deskripsi,
              dan kepatuhan harga mahasiswa.</p>
          </div>
          <span
            class="px-space-sm py-space-2xs rounded bg-surface-container-high text-outline font-label-sm text-label-sm self-start sm:self-center">
            Menampilkan daftar pengajuan produk
          </span>
        </div>

        @if($pendingProducts->isEmpty())
          <div class="py-12 text-center text-slate-400 text-xs">
            <span class="material-symbols-outlined text-3xl mb-2 text-emerald-400">task_alt</span>
            <p>Hebat! Tidak ada antrean produk preloved yang menunggu kurasi saat ini.</p>
          </div>
        @else
          <!-- Table Wrapper -->
          <div class="overflow-x-auto -mx-space-lg px-space-lg">
            <table class="w-full text-left border-collapse min-w-[960px]">
              <thead>
                <tr
                  class="bg-surface-container-low text-on-surface-variant font-label-sm text-label-sm tracking-wider uppercase">
                  <th class="py-space-md px-space-md rounded-l-lg">Foto Barang</th>
                  <th class="py-space-md px-space-md">Judul Produk &amp; Deskripsi</th>
                  <th class="py-space-md px-space-md">Penjual</th>
                  <th class="py-space-md px-space-md">Kategori</th>
                  <th class="py-space-md px-space-md text-right">Harga (IDR)</th>
                  <th class="py-space-md px-space-md">Tanggal Upload</th>
                  <th class="py-space-md px-space-md">Status Kurasi</th>
                  <th class="py-space-md px-space-md text-right rounded-r-lg">Aksi Admin</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-surface-container-low font-body-md text-body-md text-on-surface">
                @foreach($pendingProducts as $product)
                  @php
                    $productImg = $product->image_path
                      ? (\Illuminate\Support\Str::startsWith($product->image_path, 'http') ? $product->image_path : asset('storage/' . $product->image_path))
                      : null;
                  @endphp
                  <tr class="hover:bg-surface-container-high/60 transition-colors group" id="row-prod-{{ $product->id }}">
                    <td class="py-space-md px-space-md align-top">
                      <div class="relative w-20 h-20 rounded-lg overflow-hidden bg-surface-container-low shrink-0 shadow-sm">
                        @if($productImg)
                          <img class="w-full h-full object-cover" src="{{ $productImg }}" alt="{{ $product->title }}">
                        @else
                          <div class="w-full h-full flex items-center justify-center text-outline text-[10px]">No Photo</div>
                        @endif
                        <span
                          class="absolute bottom-1 left-1 px-1.5 py-0.5 rounded bg-surface/90 text-tertiary font-label-sm text-[10px] font-bold">
                          {{ $product->condition_rating ?? '9/10 MINT' }}
                        </span>
                      </div>
                    </td>
                    <td class="py-space-md px-space-md align-top max-w-xs">
                      <div class="flex flex-col gap-space-2xs">
                        <a class="font-headline-sm text-body-lg text-on-surface hover:text-primary transition-colors leading-snug"
                          href="#">
                          {{ $product->title }}
                        </a>
                        <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2">
                          {{ $product->description }}
                        </p>
                        <div class="flex items-center gap-space-xs mt-space-2xs">
                          <span class="inline-flex items-center gap-1 font-label-sm text-label-sm text-secondary">
                            <span class="material-symbols-outlined text-[14px]">pin_drop</span>
                            {{ $product->cod_location ?? 'Kampus Polimedia' }}
                          </span>
                        </div>
                      </div>
                    </td>
                    <td class="py-space-md px-space-md align-top">
                      <div class="flex flex-col gap-0.5">
                        <span
                          class="font-label-md text-label-md text-on-surface font-semibold">{{ $product->user->name ?? 'Mahasiswa' }}</span>
                        <div class="inline-flex items-center gap-1">
                          <span
                            class="px-space-xs py-0.5 rounded bg-primary-container/20 text-primary font-label-sm text-[10px]">Mahasiswa
                            Aktif</span>
                        </div>
                        <span class="font-body-sm text-body-sm text-outline mt-1">{{ $product->user->email ?? '-' }}</span>
                        <span class="font-body-sm text-body-sm text-on-surface-variant flex items-center gap-1">
                          <span class="material-symbols-outlined text-[13px] text-tertiary">call</span>
                          {{ $product->user->phone ?? '0812-3456-7890' }}
                        </span>
                      </div>
                    </td>
                    <td class="py-space-md px-space-md align-top">
                      <span
                        class="inline-block px-space-sm py-1 rounded-full bg-surface-container-high text-secondary font-label-sm text-label-sm whitespace-nowrap">
                        Katalog Kampus
                      </span>
                    </td>
                    <td class="py-space-md px-space-md align-top text-right tabular-nums whitespace-nowrap">
                      <div class="flex flex-col items-end">
                        <span class="font-price-display text-price-display text-on-surface font-bold">Rp
                          {{ number_format($product->price, 0, ',', '.') }}</span>
                      </div>
                    </td>
                    <td class="py-space-md px-space-md align-top text-outline whitespace-nowrap font-body-sm text-body-sm">
                      {{ $product->created_at->format('d M Y') }}<br><span
                        class="text-on-surface-variant font-medium">{{ $product->created_at->format('H:i') }} WIB</span>
                    </td>
                    <td class="py-space-md px-space-md align-top whitespace-nowrap">
                      <span
                        class="inline-flex items-center gap-1.5 px-space-sm py-1 rounded-full bg-amber-500/15 text-amber-400 font-label-sm text-label-sm">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span> Menunggu Periksa
                      </span>
                    </td>
                    <td class="py-space-md px-space-md align-top text-right whitespace-nowrap">
                      <div class="flex items-center justify-end gap-1.5">
                        <!-- Form Setujui -->
                        <form action="{{ route('admin.products.approve', $product->id) }}" method="POST" class="inline">
                          @csrf
                          <button type="submit"
                            class="h-8 px-2.5 rounded-lg bg-tertiary-container hover:bg-tertiary-container/80 text-on-tertiary-container font-label-sm text-label-sm flex items-center gap-1 transition-all shadow-sm cursor-pointer">
                            <span class="material-symbols-outlined text-[16px]">check</span>
                            <span>Setujui</span>
                          </button>
                        </form>
                        <!-- Form Tolak -->
                        <form action="{{ route('admin.products.reject', $product->id) }}" method="POST" class="inline"
                          onsubmit="return confirm('Tolak dan hapus produk ini?')">
                          @csrf
                          @method('DELETE')
                          <button type="submit"
                            class="h-8 px-2 rounded-lg bg-error-container/30 hover:bg-error-container/50 text-error font-label-sm text-label-sm flex items-center gap-1 transition-all cursor-pointer">
                            <span class="material-symbols-outlined text-[16px]">close</span>
                            <span>Tolak</span>
                          </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- Pagination -->
          <div class="pt-2">
            {{ $pendingProducts->links() }}
          </div>
        @endif

      </div>

      <!-- Tab 2 Preview Section: Antrean Verifikasi KTM Mahasiswa Baru -->
      <div class="flex flex-col gap-space-md mt-space-md">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-xs">
          <div>
            <div class="flex items-center gap-space-xs">
              <h2 class="font-headline-sm text-headline-sm text-on-surface">
                Pratinjau Antrean Cepat: Verifikasi KTM Mahasiswa
              </h2>
              <span class="px-2 py-0.5 rounded-full bg-amber-500/20 text-amber-400 font-label-sm text-label-sm">
                Pending {{ $pendingUsers->count() }}
              </span>
            </div>
            <p class="font-body-sm text-body-sm text-on-surface-variant">
              Validasi identitas mahasiswa Polimedia untuk mengaktifkan akses posting barang dan fitur COD Rekber Kampus.
            </p>
          </div>
        </div>

        @if($pendingUsers->isEmpty())
          <div class="py-10 text-center text-slate-400 text-xs bg-surface-container rounded-2xl">
            <span class="material-symbols-outlined text-3xl mb-2 text-emerald-400">verified_user</span>
            <p>Semua kartu identitas mahasiswa telah berhasil diverifikasi.</p>
          </div>
        @else
          <!-- Modern Review Cards Side-by-Side -->
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-space-lg">
            @foreach($pendingUsers as $user)
              <div class="p-space-lg rounded-2xl bg-surface-container flex flex-col justify-between gap-space-lg shadow-xl"
                id="ktm-card-{{ $user->id }}">
                <div class="flex flex-col gap-space-md">
                  <!-- Header User Info -->
                  <div class="flex items-start justify-between gap-space-sm">
                    <div class="flex items-center gap-space-sm">
                      <div
                        class="w-12 h-12 rounded-full bg-primary-container flex items-center justify-center text-on-primary-container font-headline-sm text-headline-sm">
                        {{ strtoupper(substr($user->name, 0, 2)) }}
                      </div>
                      <div class="flex flex-col">
                        <div class="flex items-center gap-space-xs">
                          <span class="font-headline-sm text-body-lg text-on-surface font-semibold">{{ $user->name }}</span>
                          <span class="material-symbols-outlined text-[16px] text-secondary"
                            title="Email Terkonfirmasi">check_circle</span>
                        </div>
                        <span class="font-body-sm text-body-sm text-outline">NIM: <strong
                            class="text-on-surface font-semibold">{{ $user->nim ?? '2209312048' }}</strong></span>
                        <span class="font-label-sm text-label-sm text-secondary">Mahasiswa Polimedia</span>
                      </div>
                    </div>
                    <span
                      class="px-space-sm py-1 rounded-full bg-amber-500/15 text-amber-400 font-label-sm text-label-sm shrink-0 flex items-center gap-1">
                      <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span> Pending
                    </span>
                  </div>

                  <!-- KTM Preview Mockup Frame (Diperbaiki menggunakan $user->ktm_image) -->
                  <div
                    class="relative w-full h-52 rounded-xl bg-surface-container-low overflow-hidden shadow-inner group flex items-center justify-center">
                    @if($user->ktm_image)
                      <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                        src="{{ asset('storage/' . $user->ktm_image) }}" alt="KTM {{ $user->name }}">
                    @else
                      <div class="text-center p-4">
                        <span class="material-symbols-outlined text-4xl text-outline mb-1">id_card</span>
                        <p class="text-xs text-outline">Kartu Tanda Mahasiswa (KTM) Digital Tidak Tersedia</p>
                      </div>
                    @endif
                  </div>

                  <div class="flex items-center justify-between font-body-sm text-body-sm text-outline px-1">
                    <span>Diunggah: <strong class="text-on-surface-variant">{{ $user->created_at->format('d M Y • H:i') }}
                        WIB</strong></span>
                    <span class="text-tertiary flex items-center gap-1">
                      <span class="material-symbols-outlined text-[14px]">mark_email_read</span> Domain Aktif
                    </span>
                  </div>
                </div>
                <!-- Action Buttons -->
                <div class="grid grid-cols-2 gap-space-sm pt-space-sm">
                  <form action="{{ route('admin.users.verifyKtm', $user->id) }}" method="POST" class="w-full">
                    @csrf
                    <button type="submit"
                      class="w-full h-10 rounded-lg bg-tertiary-container hover:bg-tertiary-container/90 text-on-tertiary-container font-label-md text-label-md flex items-center justify-center gap-space-xs transition-all shadow-sm cursor-pointer">
                      <span class="material-symbols-outlined text-[18px]">verified</span>
                      <span>Verifikasi KTM</span>
                    </button>
                  </form>
                  <form action="{{ route('admin.users.rejectKtm', $user->id) }}" method="POST" class="w-full"
                    onsubmit="return confirm('Tolak verifikasi KTM mahasiswa ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                      class="w-full h-10 rounded-lg bg-surface-container-low hover:bg-error-container/30 text-error font-label-md text-label-md flex items-center justify-center gap-space-xs transition-colors cursor-pointer">
                      <span class="material-symbols-outlined text-[18px]">cancel</span>
                      <span>Tolak KTM</span>
                    </button>
                  </form>
                </div>
              </div>
            @endforeach
          </div>
        @endif
      </div>

      <!-- Security & Admin Audit Footer Note -->
      <div class="p-space-md rounded-xl bg-surface-container-low flex items-center gap-space-md shadow-sm">
        <div class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center text-secondary shrink-0">
          <span class="material-symbols-outlined text-[20px]">security</span>
        </div>
        <div class="flex flex-col gap-0.5">
          <span class="font-label-md text-label-md text-on-surface font-semibold">Audit Trail Kepatuhan Kampus
            Terenkripsi</span>
          <p class="font-body-sm text-body-sm text-on-surface-variant">
            Seluruh tindakan moderasi dicatat dalam Audit Trail Admin Kampus. Pastikan memeriksa keaslian foto dan kartu
            mahasiswa sebelum menyetujui penayangan publik.
          </p>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    document.getElementById('btn-refresh')?.addEventListener('click', function () {
      this.classList.add('animate-pulse');
    });
  </script>
@endpush