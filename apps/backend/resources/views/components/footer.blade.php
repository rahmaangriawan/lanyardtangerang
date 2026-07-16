{{-- Footer — 4-column responsive --}}
<footer class="bg-slate-900 w-full pt-16 pb-8" id="site-footer" data-sr="fade" style="content-visibility: visible;">
  <div class="grid grid-cols-1 md:grid-cols-4 gap-8 px-6 lg:px-10 max-w-[1280px] mx-auto">
    {{-- Brand --}}
    <div class="md:col-span-1">
      <div class="flex items-center gap-3 mb-6">
        <a href="/" aria-label="Lanyard Tangerang Beranda">
          <img src="/uploads/lanyardtangerang-logo-header.webp" alt="Lanyard Tangerang - Cetak Lanyard Custom Premium" class="h-12 w-auto object-contain" style="filter: brightness(0) invert(1)" width="160" height="48" loading="lazy" decoding="async" />
        </a>
      </div>
      <p class="text-slate-400 text-body-md leading-relaxed">
        Solusi cetak lanyard custom tercepat dan termurah di Tangerang dengan standar kualitas industri. Bebas ongkir Tangerang Raya, Same Day Service.
      </p>
      <div class="mt-6 flex flex-wrap gap-2">
        <a href="/produk" class="inline-flex items-center gap-1.5 rounded-full border border-slate-700 bg-slate-800/50 px-3 py-1.5 text-xs font-semibold text-slate-300 hover:bg-slate-800 hover:text-white transition-colors">Produk Lanyard</a>
        <a href="/area" class="inline-flex items-center gap-1.5 rounded-full border border-slate-700 bg-slate-800/50 px-3 py-1.5 text-xs font-semibold text-slate-300 hover:bg-slate-800 hover:text-white transition-colors">Area Jangkauan</a>
        <a href="/blog" class="inline-flex items-center gap-1.5 rounded-full border border-slate-700 bg-slate-800/50 px-3 py-1.5 text-xs font-semibold text-slate-300 hover:bg-slate-800 hover:text-white transition-colors">Blog & Tips</a>
      </div>
    </div>

    {{-- Informasi --}}
    <div class="md:col-span-1">
      <h4 class="text-xs font-bold text-slate-300 uppercase tracking-widest mb-5">Informasi</h4>
      <ul class="space-y-3">
        <li><a href="/cara-pemesanan" class="text-slate-400 hover:text-white transition-colors text-sm">Cara Pemesanan Lanyard Custom</a></li>
        <li><a href="/daftar-harga" class="text-slate-400 hover:text-white transition-colors text-sm">Daftar Harga Lanyard Tangerang</a></li>
        <li><a href="/promo" class="text-slate-400 hover:text-white transition-colors text-sm">Promo Spesial Lanyard</a></li>
        <li><a href="/area" class="text-slate-400 hover:text-white transition-colors text-sm">Area Layanan Tangerang Raya</a></li>
      </ul>
    </div>

    {{-- Layanan --}}
    <div class="md:col-span-1">
      <h4 class="text-xs font-bold text-slate-300 uppercase tracking-widest mb-5">Layanan</h4>
      <ul class="space-y-3">
        <li><a href="/produk" class="text-slate-400 hover:text-white transition-colors text-sm">Katalog Produk Lanyard</a></li>
        <li><a href="/kebijakan" class="text-slate-400 hover:text-white transition-colors text-sm">Privacy Policy</a></li>
        <li><a href="/syarat-ketentuan" class="text-slate-400 hover:text-white transition-colors text-sm">Terms of Service</a></li>
        <li><a href="/pengiriman" class="text-slate-400 hover:text-white transition-colors text-sm">Info Pengiriman Nasional</a></li>
      </ul>
    </div>

    {{-- Kontak --}}
    <div class="md:col-span-1">
      <h4 class="text-xs font-bold text-slate-300 uppercase tracking-widest mb-5">Kontak Kami</h4>
      <ul class="space-y-3">
        <li class="flex items-start gap-2.5">
          <span class="material-symbols-outlined text-slate-400 shrink-0 text-lg">pin_drop</span>
          <span class="text-slate-400 text-sm leading-relaxed">Jl. Sudirman No. 123, Tangerang Kota, Banten 15111</span>
        </li>
        <li class="flex items-center gap-2.5">
          <span class="material-symbols-outlined text-slate-400 text-lg">phone</span>
          <a href="tel:+6282210200700" class="text-slate-400 hover:text-white transition-colors text-sm">+62 822-1020-0700</a>
        </li>
        <li class="flex items-center gap-2.5">
          <span class="material-symbols-outlined text-slate-400 text-lg">mail</span>
          <a href="mailto:hello@lanyardtangerang.id" class="text-slate-400 hover:text-white transition-colors text-sm">hello@lanyardtangerang.id</a>
        </li>
      </ul>
    </div>
  </div>

  {{-- Bottom bar --}}
  <div class="mt-16 pt-8 border-t border-slate-800 px-6 lg:px-10 max-w-[1280px] mx-auto flex flex-col md:flex-row justify-between items-center gap-4">
    <p class="text-slate-500 text-sm">© {{ date('Y') }} Lanyard Tangerang. Precision in Every Print.</p>
    <span class="text-slate-500 text-xs">Pembayaran Aman</span>
  </div>
</footer>
