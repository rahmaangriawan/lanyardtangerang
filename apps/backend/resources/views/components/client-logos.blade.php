{{-- Client Logos — overlaps hero on scroll, expands from 1000px to 1280px --}}
<section class="relative z-10 py-12 border-y border-slate-200/50 bg-white overflow-hidden" id="client-logos-section">
  <div class="client-logos-inner px-6 lg:px-10 mx-auto will-change-[max-width]" id="client-logos-inner">
    <p data-sr="fade" class="text-center text-label-bold text-slate-500 uppercase tracking-widest mb-10">
      Dipercaya oleh Perusahaan Terkemuka
    </p>

    @php
      $logos = [
        ['src' => '/images/logos/bank-indonesia.svg', 'alt' => 'Bank Indonesia - klien Lanyard custom Tangerang', 'w' => 112, 'h' => 32],
        ['src' => '/images/logos/telkomsel.svg', 'alt' => 'Telkomsel - klien Lanyard custom Tangerang', 'w' => 96, 'h' => 32],
        ['src' => '/images/logos/kemenkes.svg', 'alt' => 'Kemenkes RI - klien Lanyard custom Tangerang', 'w' => 96, 'h' => 32],
        ['src' => '/images/logos/bca.svg', 'alt' => 'BCA - klien Lanyard custom Tangerang', 'w' => 96, 'h' => 32],
        ['src' => '/images/logos/universitas-indonesia.png', 'alt' => 'Universitas Indonesia - klien Lanyard custom Tangerang', 'w' => 104, 'h' => 32],
        ['src' => '/images/logos/bumn.svg', 'alt' => 'BUMN - klien Lanyard custom Tangerang', 'w' => 80, 'h' => 32],
        ['src' => '/images/logos/biznet.svg', 'alt' => 'Biznet - klien Lanyard custom Tangerang', 'w' => 96, 'h' => 32],
        ['src' => '/images/logos/komdigi.svg', 'alt' => 'Komdigi - klien Lanyard custom Tangerang', 'w' => 96, 'h' => 32],
      ];
    @endphp

    {{-- Marquee container --}}
    <div data-sr="fade" data-sr-delay="100" class="logo-marquee" id="logo-marquee">
      <div class="logo-marquee__track" id="logo-track">
        {{-- Render 4 sets for seamless looping --}}
        @foreach ([1, 2, 3, 4] as $set)
        <div class="logo-marquee__set">
          @foreach ($logos as $logo)
          <img
            src="{{ $logo['src'] }}"
            alt="{{ $logo['alt'] }}"
            width="{{ $logo['w'] }}"
            height="{{ $logo['h'] }}"
            class="logo-marquee__img"
            loading="lazy"
            decoding="async"
          />
          @endforeach
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

{{-- width expand reversible handled by scroll-reveal.js --}}
