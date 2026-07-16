{{-- Hero Section — Lanyard Tangerang
     Cascading cards + grid background --}}
<section id="hero" class="relative w-full overflow-hidden bg-slate-50 text-slate-900">
  {{-- Grid Pattern Background --}}
  <div
    class="pointer-events-none absolute inset-0"
    style="background-image: linear-gradient(#DDE0E3 1px, transparent 1px), linear-gradient(to right, #DDE0E3 1px, transparent 1px); background-size: 3rem 3rem;"
    aria-hidden="true"
  ></div>

  {{-- Gradient Overlay — fades grid at top and bottom --}}
  <div
    class="pointer-events-none absolute inset-0 bg-gradient-to-b from-slate-50 via-slate-50/60 to-slate-50"
    aria-hidden="true"
  ></div>

  {{-- Content --}}
  <div class="relative mx-auto flex min-h-[85vh] max-w-[1200px] flex-col items-center gap-12 px-6 py-16 lg:flex-row lg:gap-16 lg:py-20">
    {{-- Left: Text --}}
    <div class="flex flex-col items-center text-center lg:w-1/2 lg:items-start lg:text-left">
      <h1 data-sr="title" class="max-w-xl font-bold leading-[1.08] tracking-tight text-slate-900" style="font-size: clamp(2rem, 4vw, 2.75rem); line-height:1.08; letter-spacing:-0.03em;">
        Cetak Lanyard Custom
        <span class="text-slate-700">Premium</span>
        untuk Brand Anda
      </h1>

      <p data-sr="desc" data-sr-delay="90" class="mt-6 max-w-lg text-slate-600" style="font-size:16px; line-height:1.6; letter-spacing:-0.01em;">
        Lanyard berkualitas tinggi dengan desain custom, bahan pilihan, dan
        produksi cepat. Dipercaya ratusan perusahaan, instansi, sekolah, dan
        komunitas di seluruh Indonesia.
      </p>

      <div data-sr="fade" data-sr-delay="160" class="mt-8">
        <a
          href="https://wa.me/6282210200700?text=Halo%20Lanyard%20Tangerang%2C%20saya%20mau%20minta%20quotation%20lanyard%20custom."
          target="_blank"
          rel="noopener noreferrer"
          class="group relative inline-flex items-center justify-center gap-2 overflow-hidden rounded-lg bg-slate-800 px-8 py-3.5 text-base font-semibold text-white shadow-lg shadow-slate-800/20 transition-all before:absolute before:top-1/2 before:left-1/2 before:-translate-x-1/2 before:-translate-y-1/2 before:h-0 before:w-0 before:rounded-full before:bg-white/20 before:duration-700 before:ease-out hover:shadow-black/25 hover:before:h-[800px] hover:before:w-[800px] active:scale-[0.98]"
        >
          <span class="hero-btn-text relative z-10 inline-block">Minta Quotation</span>
          <svg
            class="hero-btn-arrow relative z-10 h-5 w-5 transition duration-300 group-hover:translate-x-1"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <path d="M5 12h14" />
            <path d="m12 5 7 7-7 7" />
          </svg>
        </a>
      </div>
    </div>

    {{-- Right: Cascading Cards — FIX Fase 4: 2 card fan-out guaranteed visible, parallax isolated via wrapper --}}
        <div class="relative flex w-full items-center justify-center lg:w-1/2" style="min-height: 28rem;">
          {{-- Back Card — left fan --}}
          <div class="hero-center absolute left-1/2 top-1/2 z-10" style="transform: translate(-50%, -50%);">
            <div data-parallax="-0.06" class="will-change-transform">
              <div class="hero-fan" style="transform: rotate(-6deg) translateX(-6.5rem);">
                <img
                  class="hero-card-img h-56 w-auto rounded-2xl object-cover shadow-2xl md:h-72"
                  style="aspect-ratio: 4/5;"
                  src="/uploads/hero-lanyard-slider-02.webp"
                  alt="Koleksi lanyard custom Tangerang premium - cetak lanyard tissue & polyester untuk event kantor"
                  loading="eager"
                  fetchpriority="high"
                  decoding="sync"
                  width="230"
                  height="288"
                />
              </div>
            </div>
          </div>

          {{-- Front Card — right fan, 2nd image --}}
          <div class="hero-center absolute left-1/2 top-1/2 z-20" style="transform: translate(-50%, -50%);">
            <div data-parallax="0.08" class="will-change-transform">
              <div class="hero-fan" style="transform: rotate(6deg) translateX(6.5rem);">
                <img
                  class="hero-card-img h-56 w-auto rounded-2xl object-cover shadow-2xl md:h-72"
                  style="aspect-ratio: 4/5;"
                  src="/uploads/hero-lanyard-slider-01.webp"
                  alt="Lanyard custom premium Tangerang - sablon full color bahan berkualitas bebas ongkir"
                  loading="eager"
                  fetchpriority="high"
                  decoding="sync"
                  width="230"
                  height="288"
                />
              </div>
            </div>
          </div>

          <style>
            .hero-card-img {
              transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
              cursor: pointer;
              will-change: transform;
            }
            .hero-card-img:hover {
              transform: scale(1.12);
            }
            .hero-fan{ will-change: transform; }
            .hero-center{ will-change: transform; }
            /* ensure 2 cards visible on all widths — increase gap on desktop */
            @media(min-width:1024px){
              .hero-fan{ transform-origin: center center; }
            }
          </style>
        </div>
  </div>
</section>
