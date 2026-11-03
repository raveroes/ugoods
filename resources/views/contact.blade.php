@extends('layouts.app')

@section('title', 'Kontak & Pusat Bantuan Mahasiswa - ugoods')

@section('content')
<div class="flex flex-col w-full">
<!-- Interactive Navigation Highlight Script -->

<!-- Hero Header Section -->
<section class="relative w-full overflow-hidden pt-8 pb-6">
<!-- Ambient Radial Glow Accent -->
<div class="pointer-events-none absolute top-0 left-1/2 -translate-x-1/2 w-[700px] h-[320px] bg-purple-200/30 blur-[120px] rounded-full"></div>
<div class="pointer-events-none absolute -top-12 right-12 w-64 h-64 bg-pink-200/20 blur-[90px] rounded-full"></div>
<div class="max-w-[1280px] mx-auto px-4 md:px-8 relative">
<!-- Breadcrumb Bar -->
<nav aria-label="Breadcrumb" class="flex items-center gap-2 text-sm text-[#7E70A6] mb-4">
<a class="hover:text-[#5B47E0] transition-colors" href="{{ route('home') }}">Beranda</a>
<span class="material-symbols-outlined text-[14px] text-[#9D93B8]">chevron_right</span>
<span class="text-[#7E70A6]">Bantuan</span>
<span class="material-symbols-outlined text-[14px] text-[#9D93B8]">chevron_right</span>
<span class="text-[#1A0D3F] font-semibold">Kontak Kami</span>
</nav>
<!-- Pill Badge -->
<div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white border border-[#E4DCFA] mb-3 shadow-xs">
<span class="text-xs">💬</span>
<span class="font-bold text-xs tracking-wider uppercase text-[#5B47E0]">Pusat Bantuan Kampus</span>
</div>
<!-- Main Section Header -->
<div class="max-w-3xl">
<h1 class="text-3xl md:text-4xl font-extrabold text-[#1A0D3F] tracking-tight">Hubungi Tim ugoods</h1>
<p class="text-base text-[#4A3B75] mt-2 leading-relaxed">
          Punya pertanyaan tentang cara jual-beli, verifikasi KTM, atau kendala transaksi? Kami siap membantu seluruh civitas akademika Polimedia &amp; kampus mitra.
        </p>
</div>
</div>
</section>
<!-- Main Content - 3-Column Responsive Grid -->
<section class="w-full pb-12">
<div class="max-w-[1280px] mx-auto px-4 md:px-8">
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<!-- Card 1: WhatsApp CS -->
<div class="rounded-2xl bg-white border border-[#E4DCFA] p-6 transition-all duration-300 hover:border-[#C4B5FD] shadow-md shadow-purple-100/50 flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-3">
<div class="flex items-center gap-2.5">
<div class="w-9 h-9 rounded-xl bg-emerald-50 border border-emerald-200 flex items-center justify-center text-emerald-600">
<span class="material-symbols-outlined text-[20px]">chat</span>
</div>
<h2 class="text-lg font-bold text-[#1A0D3F]">CS WhatsApp</h2>
</div>
<span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-100 text-emerald-800 border border-emerald-200 text-xs font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-emerald-600 animate-pulse"></span>Online
</span>
</div>
<div class="text-2xl font-bold font-mono text-[#1A0D3F] tracking-wide mt-2">+62 812-3456-7890</div>
<p class="text-sm text-[#4A3B75] mt-2 leading-relaxed">Tersedia jam 08.00 - 17.00 WIB untuk respon instan seputar pembayaran, penahanan dana, dan kendala akun.</p>
</div>
<div class="mt-6 pt-4 border-t border-[#E4DCFA]">
<a class="inline-flex items-center gap-1.5 text-[#5B47E0] hover:text-[#4A35D0] font-semibold text-sm group transition-colors" href="https://wa.me/6281234567890" rel="noopener noreferrer" target="_blank">
<span>Chat WhatsApp Sekarang</span>
<span class="material-symbols-outlined text-[16px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
</a>
</div>
</div>

<!-- Card 2: Email Support -->
<div class="rounded-2xl bg-white border border-[#E4DCFA] p-6 transition-all duration-300 hover:border-[#C4B5FD] shadow-md shadow-purple-100/50 flex flex-col justify-between">
<div>
<div class="flex items-center gap-2.5 mb-3">
<div class="w-9 h-9 rounded-xl bg-purple-50 border border-[#D6C7FF] flex items-center justify-center text-[#5B47E0]">
<span class="material-symbols-outlined text-[20px]">mail</span>
</div>
<h2 class="text-lg font-bold text-[#1A0D3F]">Email Resmi</h2>
</div>
<a class="text-2xl font-bold text-[#5B47E0] hover:text-[#4A35D0] tracking-wide inline-block mt-2 transition-colors" href="mailto:support@ugoods.id">support@ugoods.id</a>
<p class="text-sm text-[#4A3B75] mt-2 leading-relaxed">Untuk kerjasama BEM/HIMA kampus, audit moderasi, atau pelaporan insiden formal tingkat dekanat.</p>
</div>
<div class="mt-6 pt-4 border-t border-[#E4DCFA]">
<a class="inline-flex items-center gap-1.5 text-[#5B47E0] hover:text-[#4A35D0] font-semibold text-sm group transition-colors" href="mailto:support@ugoods.id">
<span>Kirim Email Resmi</span>
<span class="material-symbols-outlined text-[16px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
</a>
</div>
</div>

<!-- Card 3: Jam Operasional Desk Bantuan -->
<div class="rounded-2xl bg-white border border-[#E4DCFA] p-6 transition-all duration-300 hover:border-[#C4B5FD] shadow-md shadow-purple-100/50 flex flex-col justify-between">
<div>
<div class="flex items-center gap-2.5 mb-3">
<div class="w-9 h-9 rounded-xl bg-amber-50 border border-amber-200 flex items-center justify-center text-amber-600">
<span class="material-symbols-outlined text-[20px]">schedule</span>
</div>
<h2 class="text-lg font-bold text-[#1A0D3F]">Jam Operasional Desk</h2>
</div>
<div class="space-y-2 text-sm text-[#4A3B75] mt-3">
<div class="flex justify-between items-center">
<span>Senin - Jumat:</span>
<span class="text-[#1A0D3F] font-bold">08:00 - 17:00 WIB</span>
</div>
<div class="flex justify-between items-start gap-4">
<span>Sabtu - Minggu &amp; Libur:</span>
<span class="text-right text-[#7E70A6] font-medium">Tiket offline</span>
</div>
</div>
</div>
<div class="mt-6 pt-4 border-t border-[#E4DCFA] flex items-center gap-2 text-emerald-700 text-xs font-medium">
<span class="material-symbols-outlined text-[16px]">verified_user</span>
<span>Privasi mahasiswa terlindungi &amp; terenkripsi.</span>
</div>
</div>
</div>
</div>
</section>

<!-- FAQ Accordion Section (Pusat Bantuan & Tanya Jawab Cepat) -->
<section class="w-full pb-16">
<div class="max-w-[1280px] mx-auto px-4 md:px-8">
<!-- FAQ Section Header -->
<div class="text-center max-w-2xl mx-auto mb-10">
<div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white border border-[#E4DCFA] text-xs font-bold text-[#5B47E0] mb-3 shadow-xs">
<span class="material-symbols-outlined text-[14px]">help_center</span>
<span>BANTUAN CEPAT</span>
</div>
<h2 class="text-2xl md:text-3xl font-extrabold text-[#1A0D3F]">Pertanyaan yang Sering Diajukan (FAQ)</h2>
<p class="text-sm md:text-base text-[#4A3B75] mt-2">
          Jawaban kilat untuk pertanyaan teknis, verifikasi identitas, dan mekanisme transaksi yang paling sering ditanyakan mahasiswa.
        </p>
</div>
<!-- FAQ Accordion List -->
<div class="max-w-3xl mx-auto flex flex-col gap-3" id="faq-accordion">
<!-- FAQ Item 1 -->
<div class="faq-item rounded-xl bg-white border border-[#E4DCFA] shadow-xs overflow-hidden transition-all duration-200">
<button aria-expanded="false" class="w-full p-5 text-left flex items-center justify-between gap-4 text-base font-bold text-[#1A0D3F] hover:text-[#5B47E0] transition-colors" onclick="toggleFaq(this)" type="button">
<span>Berapa lama proses verifikasi KTM mahasiswa?</span>
<span class="material-symbols-outlined text-[#7E70A6] transition-transform duration-200 text-[20px] shrink-0">expand_more</span>
</button>
<div class="faq-content hidden px-5 pb-5 pt-0 border-t border-[#E4DCFA] text-[#4A3B75] text-sm md:text-base leading-relaxed">
<p class="pt-3">
              Biasanya tim admin kampus memvalidasi foto KTM dalam waktu <strong>1-3 jam kerja</strong> di hari perkuliahan (Senin-Jumat). Pastikan foto KTM terlihat jelas, tidak buram, dan nama lengkap serta NIM terbaca tanpa terpotong.
            </p>
</div>
</div>
<!-- FAQ Item 2 -->
<div class="faq-item rounded-xl bg-white border border-[#E4DCFA] shadow-xs overflow-hidden transition-all duration-200">
<button aria-expanded="false" class="w-full p-5 text-left flex items-center justify-between gap-4 text-base font-bold text-[#1A0D3F] hover:text-[#5B47E0] transition-colors" onclick="toggleFaq(this)" type="button">
<span>Apakah transaksi COD di kampus dikenakan biaya pengiriman?</span>
<span class="material-symbols-outlined text-[#7E70A6] transition-transform duration-200 text-[20px] shrink-0">expand_more</span>
</button>
<div class="faq-content hidden px-5 pb-5 pt-0 border-t border-[#E4DCFA] text-[#4A3B75] text-sm md:text-base leading-relaxed">
<p class="pt-3">
<strong>Gratis 100%!</strong> Semua transaksi serah terima barang di titik COD resmi kampus (seperti Kantin Kreatif atau Lobi Gedung Terpadu) tidak dikenakan biaya pengiriman kurir maupun biaya platform tambahan.
            </p>
</div>
</div>
<!-- FAQ Item 3 -->
<div class="faq-item rounded-xl bg-white border border-[#E4DCFA] shadow-xs overflow-hidden transition-all duration-200">
<button aria-expanded="false" class="w-full p-5 text-left flex items-center justify-between gap-4 text-base font-bold text-[#1A0D3F] hover:text-[#5B47E0] transition-colors" onclick="toggleFaq(this)" type="button">
<span>Bagaimana jika barang preloved tidak sesuai dengan deskripsi foto?</span>
<span class="material-symbols-outlined text-[#7E70A6] transition-transform duration-200 text-[20px] shrink-0">expand_more</span>
</button>
<div class="faq-content hidden px-5 pb-5 pt-0 border-t border-[#E4DCFA] text-[#4A3B75] text-sm md:text-base leading-relaxed">
<p class="pt-3">
              Kamu berhak <strong>menolak barang</strong> saat sesi pengecekan fisik di spot COD kampus sebelum menekan tombol konfirmasi pelepasan dana. Dana transaksi kamu akan tetap tertahan aman di sistem Rekber dan dapat direfund utuh.
            </p>
</div>
</div>
<!-- FAQ Item 4 -->
<div class="faq-item rounded-xl bg-white border border-[#E4DCFA] shadow-xs overflow-hidden transition-all duration-200">
<button aria-expanded="false" class="w-full p-5 text-left flex items-center justify-between gap-4 text-base font-bold text-[#1A0D3F] hover:text-[#5B47E0] transition-colors" onclick="toggleFaq(this)" type="button">
<span>Bagaimana cara menjadi penjual terverifikasi (Verified Student Seller)?</span>
<span class="material-symbols-outlined text-[#7E70A6] transition-transform duration-200 text-[20px] shrink-0">expand_more</span>
</button>
<div class="faq-content hidden px-5 pb-5 pt-0 border-t border-[#E4DCFA] text-[#4A3B75] text-sm md:text-base leading-relaxed">
<p class="pt-3">
              Cukup daftarkan akun dengan email kampus atau email pribadi aktif, lalu unggah foto Kartu Tanda Mahasiswa (KTM) yang masih berlaku pada menu <em>Profil &gt; Verifikasi Identitas</em>. Badge verified akan otomatis aktif di etalase tokomu.
            </p>
</div>
</div>
</div>

</div>
</section>

</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
      const navLinks = document.querySelectorAll('header nav a[data-path]');
      navLinks.forEach(link => {
        if (link.getAttribute('data-path') === 'kontak') {
          link.classList.remove('text-[#4A3B75]', 'font-medium');
          link.classList.add('text-[#5B47E0]', 'font-bold', 'relative');
          const indicator = document.createElement('span');
          indicator.className = 'absolute -bottom-1 left-0 w-full h-[2px] bg-[#5B47E0] rounded-full';
          link.appendChild(indicator);
        }
      });
    });

    function toggleFaq(btn) {
      const content = btn.nextElementSibling;
      const icon = btn.querySelector('.material-symbols-outlined');
      const isExpanded = btn.getAttribute('aria-expanded') === 'true';

      if (isExpanded) {
        content.classList.add('hidden');
        btn.setAttribute('aria-expanded', 'false');
        icon.classList.remove('rotate-180');
      } else {
        content.classList.remove('hidden');
        btn.setAttribute('aria-expanded', 'true');
        icon.classList.add('rotate-180');
      }
    }
</script>
@endpush
