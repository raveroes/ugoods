@extends('layouts.app')

@section('title', 'Kontak & Pusat Bantuan Mahasiswa - ugoods')

@section('content')
<div class="flex flex-col w-full">
<!-- Interactive Navigation Highlight Script -->

<!-- Hero Header Section -->
<section class="relative w-full overflow-hidden pt-space-xl pb-space-lg">
<!-- Ambient Radial Glow Accent -->
<div class="pointer-events-none absolute top-0 left-1/2 -translate-x-1/2 w-[700px] h-[320px] bg-primary-container/10 blur-[120px] rounded-full"></div>
<div class="pointer-events-none absolute -top-12 right-12 w-64 h-64 bg-secondary-container/10 blur-[90px] rounded-full"></div>
<div class="max-w-[1280px] mx-auto px-margin md:px-margin-tablet lg:px-margin-desktop relative">
<!-- Breadcrumb Bar -->
<nav aria-label="Breadcrumb" class="flex items-center gap-space-xs text-on-surface-variant font-label-md text-label-md mb-space-md">
<a class="hover:text-on-surface transition-colors" href="#">Beranda</a>
<span class="material-symbols-outlined text-[14px] text-outline">chevron_right</span>
<a class="hover:text-on-surface transition-colors" href="#">Bantuan</a>
<span class="material-symbols-outlined text-[14px] text-outline">chevron_right</span>
<span class="text-on-surface font-medium">Kontak Kami</span>
</nav>
<!-- Pill Badge -->
<div class="inline-flex items-center gap-space-xs px-3 py-1 rounded-full bg-surface-container border border-surface-variant mb-space-sm shadow-sm">
<span class="text-xs">💬</span>
<span class="font-label-sm text-label-sm tracking-wider uppercase text-primary">Pusat Bantuan Kampus</span>
</div>
<!-- Main Section Header -->
<div class="max-w-3xl">
<h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">Hubungi Tim ugoods</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant mt-space-xs leading-relaxed">
          Punya pertanyaan tentang cara jual-beli, verifikasi KTM, atau kendala transaksi? Kami siap membantu seluruh civitas akademika Polimedia &amp; kampus mitra.
        </p>
</div>
</div>
</section>
<!-- Main Content - 2-Column Responsive Grid -->
<section class="w-full pb-space-2xl"><div class="max-w-[1280px] mx-auto px-margin md:px-margin-tablet lg:px-margin-desktop"><div class="grid grid-cols-1 md:grid-cols-3 gap-gutter-desktop"><!-- Card 1: WhatsApp CS --><div class="rounded-xl bg-surface-container-low border border-surface-variant p-space-md transition-all duration-300 hover:border-outline-variant shadow-sm flex flex-col justify-between"><div><div class="flex items-center justify-between mb-space-2xs"><div class="flex items-center gap-space-xs"><span class="material-symbols-outlined text-tertiary text-[20px]">chat</span><h2 class="font-headline-sm text-headline-sm text-on-surface">Layanan CS WhatsApp</h2></div><span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full bg-tertiary/10 text-tertiary font-label-sm text-label-sm"><span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span>Online • Respon Cepat</span></div><div class="font-price-display text-price-display text-on-surface tracking-wide mt-space-xs">+62 812-3456-7890</div><p class="font-body-sm text-body-sm text-on-surface-variant mt-1 leading-relaxed">Tersedia jam 08.00 - 17.00 WIB untuk respon instan seputar pembayaran, penahanan dana, dan kendala akun.</p></div><div class="mt-space-sm pt-space-xs border-t border-surface-variant"><a class="inline-flex items-center gap-1.5 text-secondary hover:text-secondary-fixed transition-colors font-label-md text-label-md group" href="https://wa.me/6281234567890" rel="noopener noreferrer" target="_blank"><span class="">Chat WhatsApp Sekarang</span><span class="material-symbols-outlined text-[16px] group-hover:translate-x-1 transition-transform">arrow_forward</span></a></div></div><!-- Card 2: Email Support --><div class="rounded-xl bg-surface-container-low border border-surface-variant p-space-md transition-all duration-300 hover:border-outline-variant shadow-sm flex flex-col justify-between"><div><div class="flex items-center gap-space-xs mb-space-2xs"><span class="material-symbols-outlined text-primary text-[20px]">mail</span><h2 class="font-headline-sm text-headline-sm text-on-surface">Email Resmi Support</h2></div><a class="font-price-display text-price-display text-primary hover:text-primary-fixed-dim transition-colors tracking-wide inline-block mt-space-xs" href="mailto:support@ugoods.id">support@ugoods.id</a><p class="font-body-sm text-body-sm text-on-surface-variant mt-1 leading-relaxed">Untuk kerjasama BEM/HIMA kampus, audit moderasi, atau pelaporan insiden formal tingkat dekanat.</p></div><div class="mt-space-sm pt-space-xs border-t border-surface-variant"><a class="inline-flex items-center gap-1.5 text-primary hover:text-primary-fixed-dim transition-colors font-label-md text-label-md group" href="mailto:support@ugoods.id"><span class="">Kirim Email Resmi</span><span class="material-symbols-outlined text-[16px] group-hover:translate-x-1 transition-transform">arrow_forward</span></a></div></div><!-- Card 3: Jam Operasional Desk Bantuan --><div class="rounded-xl bg-surface-container-low border border-surface-variant p-space-md transition-all duration-300 hover:border-outline-variant shadow-sm flex flex-col justify-between"><div><div class="flex items-center gap-space-xs mb-space-2xs"><span class="material-symbols-outlined text-outline text-[20px]">schedule</span><h2 class="font-headline-sm text-headline-sm text-on-surface">Jam Operasional Desk Bantuan</h2></div><div class="space-y-1.5 font-body-sm text-body-sm text-on-surface-variant mt-space-xs"><div class="flex justify-between items-center"><span class="">Senin - Jumat:</span><span class="text-on-surface font-medium">08:00 - 17:00 WIB</span></div><div class="flex justify-between items-start gap-4"><span class="">Sabtu - Minggu &amp; Libur:</span><span class="text-right text-outline">Pelayanan via tiket offline</span></div></div></div><div class="mt-space-sm pt-space-xs border-t border-surface-variant flex items-center gap-2 text-tertiary"><span class="material-symbols-outlined text-[16px]">lock</span><span class="font-label-sm text-label-sm">Keamanan data &amp; privasi mahasiswa terlindungi enkripsi.</span></div></div></div></div></section>
<!-- FAQ Accordion Section (Pusat Bantuan & Tanya Jawab Cepat) -->
<section class="w-full pb-space-2xl">
<div class="max-w-[1280px] mx-auto px-margin md:px-margin-tablet lg:px-margin-desktop">
<!-- FAQ Section Header -->
<div class="text-center max-w-2xl mx-auto mb-space-xl">
<div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container border border-surface-variant font-label-sm text-label-sm text-secondary mb-space-xs">
<span class="material-symbols-outlined text-[14px]">help_center</span>
<span class="">BANTUAN CEPAT</span>
</div>
<h2 class="font-headline-lg text-headline-lg text-on-surface">Pertanyaan yang Sering Diajukan (FAQ)</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-space-xs">
          Jawaban kilat untuk pertanyaan teknis, verifikasi identitas, dan mekanisme transaksi yang paling sering ditanyakan mahasiswa.
        </p>
</div>
<!-- FAQ Accordion List -->
<div class="max-w-3xl mx-auto flex flex-col gap-space-sm" id="faq-accordion">
<!-- FAQ Item 1 -->
<div class="faq-item rounded-xl bg-surface-container-low border border-surface-variant overflow-hidden transition-all duration-200">
<button aria-expanded="false" class="w-full p-5 text-left flex items-center justify-between gap-4 font-headline-sm text-headline-sm text-on-surface hover:text-white transition-colors" onclick="toggleFaq(this)" type="button">
<span class="">Berapa lama proses verifikasi KTM mahasiswa?</span>
<span class="material-symbols-outlined text-outline transition-transform duration-200 text-[20px] shrink-0">expand_more</span>
</button>
<div class="faq-content hidden px-5 pb-5 pt-0 border-t border-surface-variant/40 text-on-surface-variant font-body-md text-body-md leading-relaxed">
<p class="pt-3">
              Biasanya tim admin kampus memvalidasi foto KTM dalam waktu <strong>1-3 jam kerja</strong> di hari perkuliahan (Senin-Jumat). Pastikan foto KTM terlihat jelas, tidak buram, dan nama lengkap serta NIM terbaca tanpa terpotong.
            </p>
</div>
</div>
<!-- FAQ Item 2 -->
<div class="faq-item rounded-xl bg-surface-container-low border border-surface-variant overflow-hidden transition-all duration-200">
<button aria-expanded="false" class="w-full p-5 text-left flex items-center justify-between gap-4 font-headline-sm text-headline-sm text-on-surface hover:text-white transition-colors" onclick="toggleFaq(this)" type="button">
<span class="">Apakah transaksi COD di kampus dikenakan biaya pengiriman?</span>
<span class="material-symbols-outlined text-outline transition-transform duration-200 text-[20px] shrink-0">expand_more</span>
</button>
<div class="faq-content hidden px-5 pb-5 pt-0 border-t border-surface-variant/40 text-on-surface-variant font-body-md text-body-md leading-relaxed">
<p class="pt-3">
<strong>Gratis 100%!</strong> Semua transaksi serah terima barang di titik COD resmi kampus (seperti Kantin Kreatif atau Lobi Gedung Terpadu) tidak dikenakan biaya pengiriman kurir maupun biaya platform tambahan.
            </p>
</div>
</div>
<!-- FAQ Item 3 -->
<div class="faq-item rounded-xl bg-surface-container-low border border-surface-variant overflow-hidden transition-all duration-200">
<button aria-expanded="false" class="w-full p-5 text-left flex items-center justify-between gap-4 font-headline-sm text-headline-sm text-on-surface hover:text-white transition-colors" onclick="toggleFaq(this)" type="button">
<span class="">Bagaimana jika barang preloved tidak sesuai dengan deskripsi foto?</span>
<span class="material-symbols-outlined text-outline transition-transform duration-200 text-[20px] shrink-0">expand_more</span>
</button>
<div class="faq-content hidden px-5 pb-5 pt-0 border-t border-surface-variant/40 text-on-surface-variant font-body-md text-body-md leading-relaxed">
<p class="pt-3">
              Kamu berhak <strong>menolak barang</strong> saat sesi pengecekan fisik di spot COD kampus sebelum menekan tombol konfirmasi pelepasan dana. Dana transaksi kamu akan tetap tertahan aman di sistem Rekber dan dapat direfund utuh.
            </p>
</div>
</div>
<!-- FAQ Item 4 -->
<div class="faq-item rounded-xl bg-surface-container-low border border-surface-variant overflow-hidden transition-all duration-200">
<button aria-expanded="false" class="w-full p-5 text-left flex items-center justify-between gap-4 font-headline-sm text-headline-sm text-on-surface hover:text-white transition-colors" onclick="toggleFaq(this)" type="button">
<span class="">Bagaimana cara menjadi penjual terverifikasi (Verified Student Seller)?</span>
<span class="material-symbols-outlined text-outline transition-transform duration-200 text-[20px] shrink-0">expand_more</span>
</button>
<div class="faq-content hidden px-5 pb-5 pt-0 border-t border-surface-variant/40 text-on-surface-variant font-body-md text-body-md leading-relaxed">
<p class="pt-3">
              Cukup daftarkan akun dengan email kampus atau email pribadi aktif, lalu unggah foto Kartu Tanda Mahasiswa (KTM) yang masih berlaku pada menu <em>Profil &gt; Verifikasi Identitas</em>. Badge verified akan otomatis aktif di etalase tokomu.
            </p>
</div>
</div>
</div>
<!-- Quick Assistance Footer CTA -->

</div>
</section>
<!-- Client-side Interactive Behaviors -->

</div>
@endsection

@push('scripts')
<script>

    document.addEventListener('DOMContentLoaded', () => {
      const navLinks = document.querySelectorAll('header nav a[data-path]');
      navLinks.forEach(link => {
        if (link.getAttribute('data-path') === 'kontak') {
          link.classList.remove('text-slate-300', 'font-medium');
          link.classList.add('text-white', 'font-semibold', 'relative');
          const indicator = document.createElement('span');
          indicator.className = 'absolute -bottom-1 left-0 w-full h-[2px] bg-primary-container rounded-full';
          link.appendChild(indicator);
        }
      });
    });
  


    function toggleFaq(btn) {
      const content = btn.nextElementSibling;
      const icon = btn.querySelector('.material-symbols-outlined');
      const isExpanded = btn.getAttribute('aria-expanded') === 'true';

      // Toggle state
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

    function handleFormSubmit() {
      const btn = document.getElementById('submit-btn');
      const successBox = document.getElementById('form-success');
      
      btn.disabled = true;
      btn.innerHTML = `<span class="material-symbols-outlined text-[18px] animate-spin">refresh</span><span>Mengirim Pesan...</span>`;

      setTimeout(() => {
        btn.classList.add('hidden');
        successBox.classList.remove('hidden');
        document.getElementById('contact-form').reset();
      }, 900);
    }
  
</script>
@endpush
