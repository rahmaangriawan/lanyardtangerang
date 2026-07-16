{{-- CTA Section — redesigned to match reference image --}}
<section class="lazy-section bg-white" id="cta-section" style="padding-top: clamp(72px, 8vw, 112px); padding-bottom: clamp(72px, 8vw, 112px);" data-sr="fade">
  <div class="px-6 lg:px-10 max-w-[1280px] mx-auto">
  <div class="cta-card relative rounded-[2.5rem] overflow-hidden min-h-[500px] lg:min-h-[560px] flex items-center justify-center lg:justify-start shadow-2xl">
    
    {{-- Dark gradient overlay (hanya aktif di desktop karena gambar hanya ada di desktop) --}}
    <div class="hidden lg:block absolute inset-0 bg-gradient-to-r from-slate-950/95 via-slate-950/50 to-transparent z-0" data-parallax="0.05"></div>

    {{-- Content wrapper — centered on mobile, left-aligned on desktop --}}
    <div class="relative z-10 w-full px-6 py-12 md:px-16 lg:w-7/12 flex flex-col items-center lg:items-start text-center lg:text-left justify-center h-full gap-8 lg:gap-10">
      
      {{-- Top Badge --}}
      <div>
        <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 px-4 py-2 rounded-full backdrop-blur-md">
          <span class="material-symbols-outlined text-white text-sm" style="font-variation-settings: 'FILL' 1;">verified_user</span>
          <span class="text-white text-sm font-semibold tracking-wide">Desain Custom, Hasil Berkualitas</span>
        </div>
      </div>

      {{-- Main copy --}}
      <div class="space-y-4">
        <h2 class="font-bold tracking-tight text-white" style="font-size: clamp(2rem, 4vw, 2.75rem); line-height:1.08; letter-spacing:-0.03em;">
          Siap Tampil Profesional dengan Lanyard Berkualitas?
        </h2>
        <p class="text-white/90 max-w-xl" style="font-size:16px; line-height:1.6; letter-spacing:-0.01em;">
          Konsultasikan kebutuhan Anda sekarang, gratis mockup desain dan nikmati proses produksi cepat untuk kantor, event, sekolah, dan komunitas.
        </p>
      </div>

      {{-- Buttons — centered on mobile, left-aligned on desktop --}}
      <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto justify-center lg:justify-start">
        {{-- Button 1: WhatsApp --}}
        <a
          href="https://wa.me/6282210200700?text=Halo%20Lanyard%20Tangerang%2C%20saya%20mau%20konsultasi%20desain%20lanyard."
          target="_blank"
          rel="noopener noreferrer"
          class="group relative overflow-hidden bg-[#1e293b]/90 hover:bg-[#1e293b] border border-white/10 text-white rounded-2xl px-8 py-4 flex items-center gap-3 transition-all duration-300 font-semibold shadow-lg backdrop-blur-sm whitespace-nowrap w-full sm:w-60 before:absolute before:top-1/2 before:left-1/2 before:-translate-x-1/2 before:-translate-y-1/2 before:h-0 before:w-0 before:rounded-full before:bg-white/20 before:duration-700 before:ease-out hover:before:h-[800px] hover:before:w-[800px] active:scale-[0.98]"
        >
          <div class="flex items-center gap-3 relative z-10">
            <span class="material-symbols-outlined text-white" style="font-variation-settings: 'FILL' 1;">chat</span>
            <span class="hero-btn-text relative z-10 inline-block">Chat via WhatsApp</span>
          </div>
        </a>

        {{-- Button 2: Penawaran --}}
        <a
          href="https://wa.me/6282210200700?text=Halo%20Lanyard%20Tangerang%2C%20saya%20mau%20minta%20penawaran%20harga."
          target="_blank"
          rel="noopener noreferrer"
          class="group relative overflow-hidden bg-white text-slate-900 rounded-2xl px-8 py-4 flex items-center justify-between gap-4 transition-all duration-300 font-semibold shadow-lg whitespace-nowrap w-full sm:w-60 before:absolute before:top-1/2 before:left-1/2 before:-translate-x-1/2 before:-translate-y-1/2 before:h-0 before:w-0 before:rounded-full before:bg-slate-800 before:duration-700 before:ease-out hover:before:h-[800px] hover:before:w-[800px] active:scale-[0.98] hover:text-white"
        >
          <div class="flex items-center gap-3 relative z-10">
            <span class="material-symbols-outlined text-slate-900 group-hover:text-white transition-colors duration-300" style="font-variation-settings: 'FILL' 1;">description</span>
            <span class="hero-btn-text relative z-10 inline-block">Dapatkan Penawaran</span>
          </div>
          <span class="material-symbols-outlined text-sm relative z-10 transition duration-300 group-hover:translate-x-1 group-hover:text-white">arrow_forward_ios</span>
        </a>
      </div>

    </div>
  </div>
  </div>
</section>

<style>
  #cta-section{ content-visibility: visible; }
  .cta-card {
    background-color: #020617; /* bg-slate-950 */
  }

  /* Hanya load background image di desktop (layar besar) */
  @media (min-width: 1024px) {
    .cta-card {
      background-image: url('/uploads/cta-bg.webp');
      background-size: cover;
      background-position: 30% 15%;
    }
  }
</style>
