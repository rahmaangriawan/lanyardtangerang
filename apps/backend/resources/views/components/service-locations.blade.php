{{-- Service Locations — Premium Editorial — consistent design system (font scale & tokens) --}}
<section class="lazy-section bg-[#f8fafc] relative overflow-hidden" id="locations" style="padding-top: clamp(72px, 8vw, 104px); padding-bottom: clamp(72px, 8vw, 104px); content-visibility: visible;">
  <div class="pointer-events-none absolute inset-0" aria-hidden="true">
    <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, rgba(15,23,42,0.05) 1px, transparent 0); background-size: 22px 22px;"></div>
    <div class="absolute -left-24 top-20 h-[320px] w-[320px] rounded-full bg-white blur-[64px] opacity-80"></div>
    <div class="absolute -right-24 bottom-10 h-[360px] w-[360px] rounded-full bg-slate-200/60 blur-[72px] opacity-60"></div>
  </div>

  <div class="relative px-4 sm:px-6 lg:px-10 max-w-[1280px] mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 xl:gap-20 items-start">
    {{-- Left: Editorial --}}
    <div data-sr="loc-left" class="relative">
      <h2 class="font-bold tracking-tight text-slate-900 text-balance" style="font-size: clamp(2rem, 4vw, 2.75rem); line-height: 1.08; letter-spacing: -0.03em;">
        Area Jangkauan Tangerang
      </h2>
      <p class="text-slate-600 mt-4 max-w-[46ch]" style="font-size: 16px; line-height: 1.65; letter-spacing: -0.01em;">
        Kami melayani pengiriman gratis dan Same Day Service untuk seluruh wilayah Tangerang Raya — tanpa minimum order.
      </p>

      <div class="loc-list mt-8 grid grid-cols-2 gap-4">
        @php
          $areas = [
            ['Tangerang Kota','Kota'], ['Tangerang Selatan','Tangsel'], ['Kab. Tangerang','Kabupaten'],
            ['BSD & Gading Serpong','BSD'], ['Bintaro','Bintaro'], ['Ciputat & Pamulang','Pamulang']
          ];
        @endphp
        @foreach ($areas as $i => $row)
        <div class="loc-row group flex items-center gap-3" style="gap: 12px; --loc-i: {{ $i }};">
          <span class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-slate-100 text-slate-400 group-hover:bg-slate-900 group-hover:text-white transition-colors duration-300">
            <span class="material-symbols-outlined text-[16px]">location_on</span>
          </span>
          <div class="min-w-0">
            <div class="text-[15px] font-semibold tracking-tight text-slate-900 leading-snug">{{ $row[0] }}</div>
            <div class="text-[13px] font-medium text-slate-400 mt-0.5">{{ $row[1] }} • bebas ongkir</div>
          </div>
        </div>
        @endforeach
      </div>

      <div data-sr="loc-info" data-sr-delay="360" class="mt-8 rounded-xl bg-white p-5 flex items-start gap-4 border border-slate-100 shadow-sm">
        <span class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-slate-900 text-white">
          <span class="material-symbols-outlined text-[18px]">info</span>
        </span>
        <div class="min-w-0">
          <p class="text-[15px] font-semibold text-slate-900">Butuh Kirim Luar Kota?</p>
          <p class="mt-1.5 text-[14px] leading-relaxed text-slate-500">Kami juga melayani ke seluruh Indonesia via ekspedisi terpercaya — estimasi H+1 s/d H+3 dengan packing aman.</p>
        </div>
      </div>
    </div>

    {{-- Right: Map --}}
    <div data-sr="loc-map" class="relative lg:sticky lg:top-28">
      <div class="loc-map-card relative aspect-[4/3] lg:aspect-[4/3.2] bg-white rounded-[24px] lg:rounded-[28px] overflow-hidden shadow-[0_20px_50px_-24px_rgba(15,23,42,0.22)] border border-slate-200/80">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126933.05761299953!2d106.56763281062354!3d-6.176510539059861!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f8e853d2e38d%3A0x301576d14feb9c0!2sTangerang%2C%20Tangerang%20City%2C%20Banten!5e0!3m2!1sen!2sid!4v1783924433662!5m2!1sen!2sid"
          class="w-full h-full"
          style="border:0; filter: saturate(0.9) contrast(1.05);"
          title="Peta Area Jangkauan Lanyard Tangerang Raya - Gratis Ongkir"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="strict-origin-when-cross-origin"
        ></iframe>
        <div class="pointer-events-none absolute inset-0 ring-1 ring-inset ring-slate-900/[0.04] rounded-[inherit]"></div>
        <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-slate-900/[0.06] via-transparent to-transparent"></div>
      </div>

      {{-- Floating badge — glass --}}
      <div class="hidden sm:flex absolute -bottom-5 -right-4 lg:-right-6 items-center gap-3 rounded-[16px] bg-white/85 backdrop-blur-xl border border-white shadow-[0_12px_24px_-12px_rgba(15,23,42,0.25)] p-3.5 pr-4">
        <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-slate-900 text-white shadow-sm">
          <span class="material-symbols-outlined text-[20px]">local_shipping</span>
        </span>
        <div>
          <p class="text-[13.5px] font-bold tracking-tight text-slate-900 leading-none">Bebas Ongkir!</p>
          <p class="text-[11px] font-medium text-slate-500 mt-1 tracking-wide">Tangerang Raya • hari ini</p>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  /* Consistent motion system — same easing as other sections */
  [data-sr="loc-left"]{ --sr-x: -24px; opacity:0; transform: translateX(var(--sr-x)) translateZ(0); transition: opacity 700ms cubic-bezier(0.16,1,0.3,1), transform 780ms cubic-bezier(0.16,1,0.3,1); will-change: transform, opacity; }
  [data-sr="loc-left"].is-in{ opacity:1; transform: translateX(0) translateZ(0); }
  [data-sr="loc-left"].is-out{ opacity:0; transform: translateX(-14px) translateZ(0); }

  .loc-row{ --loc-i:0; opacity:0; transform: translateX(-10px); transition: opacity 520ms cubic-bezier(0.16,1,0.3,1), transform 560ms cubic-bezier(0.16,1,0.3,1), background-color 300ms ease, border-color 300ms ease, box-shadow 300ms ease; transition-delay: calc(80ms + var(--loc-i)*70ms); }
  [data-sr="loc-left"].is-in .loc-row{ opacity:1; transform: translateX(0); }
  [data-sr="loc-left"].is-out .loc-row{ opacity:0; transform: translateX(-8px); transition-delay: 0ms; }

  [data-sr="loc-info"]{ opacity:0; transform: translateY(12px) scale(0.985); transition: opacity 560ms ease, transform 640ms cubic-bezier(0.16,1,0.3,1); transition-delay: var(--sr-delay,0ms); will-change: transform, opacity; }
  [data-sr="loc-info"].is-in{ opacity:1; transform: translateY(0) scale(1); }
  [data-sr="loc-info"].is-out{ opacity:0; transform: translateY(-6px) scale(0.985); }

  .loc-map-card{ --sr-scale:0.96; --sr-y:16px; clip-path: inset(0 12% 0 0 round 28px); transition: clip-path 860ms cubic-bezier(0.16,1,0.3,1) 80ms, transform 820ms cubic-bezier(0.16,1,0.3,1), opacity 640ms ease; will-change: clip-path, transform, opacity; }
  [data-sr="loc-map"]{ opacity:0; transform: translateY(var(--sr-y)) scale(var(--sr-scale)); transition: opacity 700ms cubic-bezier(0.16,1,0.3,1), transform 820ms cubic-bezier(0.16,1,0.3,1); }
  [data-sr="loc-map"].is-in{ opacity:1; transform: translateY(0) scale(1); }
  [data-sr="loc-map"].is-in .loc-map-card{ clip-path: inset(0 0 0 0 round 28px); }
  [data-sr="loc-map"].is-out{ opacity:0; transform: translateY(-8px) scale(0.97); }

  @media(prefers-reduced-motion:reduce){
    [data-sr="loc-left"], .loc-row, [data-sr="loc-info"], [data-sr="loc-map"], .loc-map-card{ transition:none !important; opacity:1 !important; transform:none !important; clip-path:none !important; }
  }
</style>
