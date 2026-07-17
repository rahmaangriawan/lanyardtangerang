{{-- Header — Floating pill on scroll + animated hamburger --}}
<header class="site-header" id="site-header">
  <nav class="site-header__nav">
    {{-- Logo --}}
    <a href="/" class="site-header__logo" aria-label="Lanyard Tangerang - Beranda">
      <img
        src="/uploads/lanyardtangerang-logo-header.webp"
        alt="Lanyard Tangerang - Cetak Lanyard Custom Premium Tangerang"
        width="160"
        height="40"
        loading="eager"
        fetchpriority="high"
      />
    </a>

    {{-- Desktop Links --}}
    <nav class="site-header__links" aria-label="Navigasi utama">
      <a href="/" class="site-header__link" aria-current="{{ request()->is('/') ? 'page' : 'false' }}">Beranda</a>
      <a href="/produk" class="site-header__link" aria-current="{{ request()->is('produk*') ? 'page' : 'false' }}">Produk</a>
      <a href="/area" class="site-header__link" aria-current="{{ request()->is('area*') ? 'page' : 'false' }}">Area</a>
      <a href="/cara-pemesanan" class="site-header__link" aria-current="{{ request()->is('cara-pemesanan*') ? 'page' : 'false' }}">Pemesanan</a>
      <a href="/blog" class="site-header__link" aria-current="{{ request()->is('blog*') ? 'page' : 'false' }}">Blog</a>
    </nav>

    {{-- Desktop Actions --}}
    <div class="site-header__actions">
      <a
        href="https://wa.me/6282210200700?text=Halo%20Lanyard%20Tangerang%2C%20saya%20mau%20minta%20quotation%20lanyard%20custom."
        target="_blank"
        rel="noopener noreferrer"
        class="group relative overflow-hidden site-header__btn site-header__btn--primary before:absolute before:top-1/2 before:left-1/2 before:-translate-x-1/2 before:-translate-y-1/2 before:h-0 before:w-0 before:rounded-full before:bg-white/20 before:duration-700 before:ease-out hover:before:h-[800px] hover:before:w-[800px]"
      >
        <span class="hero-btn-text relative z-10 inline-block">Hubungi Kami</span>
      </a>
    </div>

    {{-- Mobile Hamburger — animated MenuToggleIcon SVG --}}
    <button
      class="site-header__hamburger md:hidden"
      id="menu-toggle"
      aria-label="Toggle menu"
      aria-expanded="false"
    >
      <span class="hamburger-line hamburger-line--top"></span>
      <span class="hamburger-line hamburger-line--middle"></span>
      <span class="hamburger-line hamburger-line--bottom"></span>
    </button>
  </nav>

  {{-- Mobile Menu Overlay --}}
  <div class="site-header__mobile" id="mobile-menu">
    <div class="site-header__mobile-inner" id="mobile-inner" data-slot="closed">
      <div class="site-header__mobile-links">
        <a href="/" class="site-header__link site-header__link--mobile">Beranda</a>
        <a href="/produk" class="site-header__link site-header__link--mobile">Produk</a>
        <a href="/area" class="site-header__link site-header__link--mobile">Area</a>
        <a href="/cara-pemesanan" class="site-header__link site-header__link--mobile">Pemesanan</a>
        <a href="/blog" class="site-header__link site-header__link--mobile">Blog</a>
      </div>
      <div class="site-header__mobile-actions">
        <a
          href="https://wa.me/6282210200700?text=Halo%20Lanyard%20Tangerang%2C%20saya%20mau%20minta%20quotation%20lanyard%20custom."
          target="_blank"
          rel="noopener noreferrer"
          class="group relative overflow-hidden site-header__btn site-header__btn--primary site-header__btn--full before:absolute before:top-1/2 before:left-1/2 before:-translate-x-1/2 before:-translate-y-1/2 before:h-0 before:w-0 before:rounded-full before:bg-white/20 before:duration-700 before:ease-out hover:before:h-[800px] hover:before:w-[800px]"
        >
          <span class="hero-btn-text relative z-10 inline-block">Hubungi Kami</span>
        </a>
      </div>
    </div>
  </div>
</header>
