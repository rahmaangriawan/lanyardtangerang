{{-- Product Showcase — Gallery Premium + Splide.js --}}
@php
  use App\Models\Product;
  $products = Cache::remember('home_products', 3600, fn() => Product::where('published', true)->orderBy('sortOrder')->take(8)->get());
  if ($products->isEmpty()) {
    $products = collect([
      (object) ['name'=>'Tissue Premium','slug'=>'lanyard-tissue','featuredImage'=>'/uploads/hero-lanyard-slider-01.webp'],
      (object) ['name'=>'Polyester','slug'=>'lanyard-polyester','featuredImage'=>'/uploads/hero-lanyard-slider-02.webp'],
      (object) ['name'=>'Nylon','slug'=>'lanyard-nylon','featuredImage'=>'/uploads/aset-produk.webp'],
      (object) ['name'=>'ID Card Holder','slug'=>'id-card-holder','featuredImage'=>'/uploads/hero-lanyard-slider-01.webp'],
      (object) ['name'=>'Hook Premium','slug'=>'hook-premium','featuredImage'=>'/uploads/hero-lanyard-slider-02.webp'],
      (object) ['name'=>'Aksesoris','slug'=>'aksesoris','featuredImage'=>'/uploads/aset-produk.webp'],
      (object) ['name'=>'Double Kait','slug'=>'double-kait','featuredImage'=>'/uploads/hero-lanyard-slider-01.webp'],
      (object) ['name'=>'Custom Print','slug'=>'custom-print','featuredImage'=>'/uploads/hero-lanyard-slider-02.webp'],
    ]);
  }
  $img = fn ($src) => \App\Support\AssetUrl::relative($src);
  $gallery = $products->values()->map(fn($p) => [
    'name'=>$p->name,'slug'=>$p->slug,'image'=>$img($p->featuredImage) ?? '/uploads/hero-lanyard-slider-01.webp'
  ])->toArray();
  
@endphp

<section class="lazy-section bg-white" id="products" style="padding-top: 96px; padding-bottom: 96px;">
  <div class="px-6 lg:px-10 max-w-[1280px] mx-auto">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6" style="margin-bottom: 30px;">
      <h2 data-sr="title" class="font-bold tracking-tight text-slate-900" style="font-size: clamp(2rem, 4vw, 2.75rem); line-height:1.08; letter-spacing:-0.03em;">
        Pilihan Produk Unggulan
      </h2>
      <a data-sr="fade" data-sr-delay="80" href="/produk" class="group inline-flex items-center gap-2 text-[14px] font-semibold text-slate-700 hover:text-slate-900">
        <span>Lihat semua</span>
        <span class="material-symbols-outlined text-[18px] transition-transform duration-300 group-hover:translate-x-0.5">arrow_forward</span>
      </a>
    </div>
  </div>

  <div data-sr="fade" data-sr-delay="140" class="product-gallery-wrap">
    <div class="product-gallery-fade is-left" aria-hidden="true"></div>
    <div class="product-gallery-fade is-right" aria-hidden="true"></div>

    <div id="product-gallery" class="product-splide" role="region" aria-label="Galeri produk, geser untuk melihat produk lainnya" tabindex="0">
      <div class="product-gallery-track">
        <ul class="product-gallery-list">
          @foreach($gallery as $g)
          <li class="product-slide">
            <a href="/produk/{{ $g['slug'] }}" class="product-card group" draggable="false">
              <div class="product-card-imgwrap">
                <img src="{{ $g['image'] }}" alt="{{ $g['name'] }} - Lanyard custom Tangerang cetak premium berkualitas" class="product-card-img" width="400" height="500" loading="lazy" decoding="async" draggable="false" />
              </div>
              <div class="product-card-foot">
                <span class="product-card-name">{{ $g['name'] }}</span>
                <span class="product-card-arrow">
                  <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                </span>
              </div>
            </a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>

    <div class="product-gallery-hint lg:hidden">
      <span class="material-symbols-outlined text-[16px]">swipe</span>
      <span class="text-[11px] font-medium tracking-wide">GESER UNTUK LIHAT LAINNYA</span>
    </div>
  </div>
</section>

<style>
  .product-gallery-wrap{
    position:relative;
    width:100%;
    overflow:hidden;
    padding-top: 0;
    margin-top: 0;
  }
  /* Fase 4 fix FINAL: jarak title -> slider 30px exact (inline margin-bottom 30px di header) + top padding minimal untuk shadow */
  .product-splide{
    width:100%;
    overflow-x:auto;
    overflow-y:hidden;
    padding: 6px max(24px, calc((100vw - 1280px)/2 + 24px)) 32px max(24px, calc((100vw - 1280px)/2 + 24px));
    touch-action:auto;
    cursor: grab;
    -webkit-tap-highlight-color: transparent;
    user-select:none;
    scroll-snap-type:x proximity;
    scrollbar-width:none;
    overscroll-behavior-inline:contain;
    scroll-behavior:smooth;
  }
  .product-splide::-webkit-scrollbar{ display:none; }
  .product-gallery-track{ width:max-content; }
  .product-gallery-list{ display:flex; align-items:stretch; gap:20px; }
  .product-splide.is-dragging,
  .product-splide.is-dragging *{ cursor:grabbing !important; }
  @media(min-width:1024px){
    .product-splide{
      padding-left:max(40px, calc((100vw - 1280px)/2 + 40px));
      padding-right:max(40px, calc((100vw - 1280px)/2 + 40px));
    }
  }
  /* override splide defaults biar hover shadow gak kepotong */
  .product-slide{ width:272px; flex:0 0 auto; scroll-snap-align:start; }
  @media(min-width:640px){ .product-slide{ width:286px; } }
  @media(min-width:1024px){ .product-slide{ width:292px; } }

  .product-gallery-fade{
    position:absolute; top:0; bottom:32px; width:140px;
    pointer-events:none; z-index:3;
    transition: opacity 220ms ease-out;
  }
  .product-gallery-fade.is-left{
    left:0; background: linear-gradient(90deg, #fff 22%, rgba(255,255,255,0) 100%);
  }
  .product-gallery-fade.is-right{
    right:0; background: linear-gradient(270deg, #fff 22%, rgba(255,255,255,0) 100%);
  }
  .product-gallery-fade.is-hidden{ opacity:0; }
  /* mobile: no fade shadow left/right */
  @media (max-width: 1023px){
    .product-gallery-fade{ display:none !important; }
  }

  .product-card{
    display:flex; flex-direction:column;
    height:100%;
    border-radius:16px; background:#fff; border:1px solid #f1f5f9;
    overflow:hidden;
    transition: border-color 250ms ease-out, box-shadow 250ms ease-out, transform 250ms cubic-bezier(0.22,1,0.36,1);
    will-change: transform, box-shadow, border-color;
  }
  .product-card:hover{
    transform: translateY(-4px);
    border-color:#e2e8f0;
    box-shadow:0 16px 32px -16px rgba(15,23,42,0.16);
  }
  .product-splide.is-dragging .product-card{ transform:none !important; }
  .product-card-imgwrap{
    position:relative; aspect-ratio:4/5; background:#fcfcfd; overflow:hidden;
    display:flex; align-items:center; justify-content:center; padding:22px;
  }
  .product-card-img{
    width:100%; height:100%; object-fit:contain;
    transition: transform 450ms cubic-bezier(0.22,1,0.36,1);
    will-change: transform;
    pointer-events:none;
  }
  .product-card:hover .product-card-img{ transform: scale(1.05); }
  .product-splide.is-dragging .product-card-img{ transform:none !important; }
  .product-card-foot{
    display:flex; align-items:center; justify-content:space-between; gap:12px;
    padding:14px 16px 16px; border-top:1px solid #f8fafc; background:#fff;
  }
  .product-card-name{
    font-size:13px; font-weight:600; letter-spacing:-0.01em; line-height:1.35; color:#0f172a;
    transition: transform 250ms cubic-bezier(0.22,1,0.36,1);
  }
  .product-card:hover .product-card-name{ transform: translateY(-2px); }
  .product-card-arrow{
    width:28px; height:28px; border-radius:9999px;
    display:inline-flex; align-items:center; justify-content:center;
    background:#f8fafc; border:1px solid #f1f5f9; color:#334155; flex-shrink:0;
    transition: transform 250ms cubic-bezier(0.22,1,0.36,1), background-color 200ms ease-out, border-color 200ms ease-out, color 200ms ease-out;
  }
  .product-card:hover .product-card-arrow{
    transform: translateX(6px);
    background:#0f172a; color:#fff; border-color:#0f172a;
  }

  .product-gallery-hint{
    display:flex; align-items:center; justify-content:center; gap:6px;
    margin-top:4px; color:#94a3b8; user-select:none;
  }

  @media(prefers-reduced-motion:reduce){
    .product-card, .product-card-img, .product-card-name, .product-card-arrow, .product-gallery-fade{ transition:none !important; }
    .product-gallery-list{ transition:none !important; }
  }
</style>

{{-- Legacy Splide implementation retained in source history; native CSS scrolling replaces it.
(() => {
  const root = document.getElementById('product-splide');
  if(!root) return;

  function waitSplide(cb){
    if(typeof Splide !== 'undefined'){ cb(); return; }
    let t=0; (function tick(){
      if(typeof Splide !== 'undefined'){ cb(); return; }
      if(t++>80) return; requestAnimationFrame(tick);
    })();
  }

  waitSplide(() => {
    const wrap = root.closest('.product-gallery-wrap');
    const fadeL = wrap?.querySelector('.product-gallery-fade.is-left');
    const fadeR = wrap?.querySelector('.product-gallery-fade.is-right');

    const splide = new Splide(root, {
      type: 'loop',              // infinite loop tanpa putus
      autoWidth: true,
      gap: '20px',
      perMove: 1,
      focus: 0,
      trimSpace: false,
      drag: 'free',
      snap: false,
      flickPower: 700,
      flickMaxPages: 6,
      easing: 'cubic-bezier(0.22,1,0.36,1)',
      speed: 620,
      dragMinThreshold: { mouse: 5, touch: 8 },
      arrows: false,
      pagination: false,
      keyboard: true,
      wheel: false,
      waitForTransition: false,
      updateOnMove: true,
      mediaQuery: 'min',
    });

    // loop = gak ada ujung, fades selalu hidup biar premium
    function updateFades(){
      if(!fadeL && !fadeR) return;
      // ketika loop selalu show, kecuali kalau track gak overflow
      try{
        const list = root.querySelector('.splide__list');
        const track = root.querySelector('.splide__track');
        if(!list || !track) return;
        if(list.scrollWidth <= track.clientWidth + 4){
          fadeL?.classList.add('is-hidden');
          fadeR?.classList.add('is-hidden');
        }else{
          fadeL?.classList.remove('is-hidden');
          fadeR?.classList.remove('is-hidden');
        }
      }catch(e){}
    }

    // block click kalau habis swipe jauh
    let blockClick = false, startX = 0, dx = 0;
    splide.on('drag', () => {
      root.classList.add('is-dragging');
      blockClick = false;
    });
    splide.on('dragging', () => {
      root.classList.add('is-dragging');
    });
    splide.on('dragged', () => {
      root.classList.remove('is-dragging');
      if(Math.abs(dx) > 18){ blockClick = true; setTimeout(()=>{ blockClick=false; }, 380); }
      updateFades();
    });
    splide.on('move drag scroll', updateFades);
    splide.on('mounted', () => {
      requestAnimationFrame(updateFades);
      setTimeout(updateFades, 150);
    });

    root.addEventListener('pointerdown', (e) => {
      startX = e.clientX; dx = 0;
    });
    root.addEventListener('pointermove', (e) => {
      if(e.buttons === 1 || e.pointerType === 'touch') dx = e.clientX - startX;
    }, {passive:true});

    root.addEventListener('click', (e) => {
      if(blockClick){
        e.preventDefault(); e.stopPropagation();
      }
    }, true);

    // wheel: vertical -> horizontal, loop jadi gak ada edge check
    const trackEl = root.querySelector('.splide__track');
    let wheelLock = false;
    if(trackEl){
      trackEl.addEventListener('wheel', (e) => {
        const absY = Math.abs(e.deltaY);
        const absX = Math.abs(e.deltaX);
        if(absY > absX && absY > 6 && !e.ctrlKey){
          e.preventDefault();
          if(wheelLock) return;
          wheelLock = true;
          if(e.deltaY > 0) splide.go('>');
          else splide.go('<');
          setTimeout(()=>{ wheelLock=false; }, 80);
        }
      }, {passive:false});
    }

    splide.mount();

    // refresh pas image load + resize
    const imgs = root.querySelectorAll('img');
    imgs.forEach(img => {
      if(!img.complete) img.addEventListener('load', () => { splide.refresh(); updateFades(); }, {once:true});
    });
    window.addEventListener('resize', () => { splide.refresh(); updateFades(); });
    requestAnimationFrame(() => { splide.refresh(); updateFades(); });
  });
})();
--}}

<script>
(() => {
  const gallery = document.getElementById('product-gallery');
  if (!gallery || gallery.dataset.sliderReady === 'true') return;
  gallery.dataset.sliderReady = 'true';

  const wrap = gallery.closest('.product-gallery-wrap');
  const fadeLeft = wrap?.querySelector('.product-gallery-fade.is-left');
  const fadeRight = wrap?.querySelector('.product-gallery-fade.is-right');
  const list = gallery.querySelector('.product-gallery-list');
  const originalSlides = list ? Array.from(list.children) : [];
  let loopWidth = 0;
  let loopStart = 0;
  let frame = 0;
  let normalizing = false;
  let dragging = false;
  let moved = false;
  let suppressClick = false;
  let startX = 0;
  let startScrollLeft = 0;
  let activePointerId = null;
  let wheelTimer = 0;

  const setScrollPosition = (left) => {
    const previousBehavior = gallery.style.scrollBehavior;
    gallery.style.scrollBehavior = 'auto';
    gallery.scrollLeft = left;
    if (previousBehavior) gallery.style.scrollBehavior = previousBehavior;
    else gallery.style.removeProperty('scroll-behavior');
  };

  const normalizeLoop = () => {
    if (normalizing || loopWidth <= 0) return 0;

    const minimum = loopStart;
    const maximum = loopStart + loopWidth;
    let target = gallery.scrollLeft;

    while (target < minimum) target += loopWidth;
    while (target >= maximum) target -= loopWidth;

    const correction = target - gallery.scrollLeft;
    if (Math.abs(correction) < 1) return 0;

    normalizing = true;
    setScrollPosition(target);
    normalizing = false;

    // Posisi acuan drag ikut dipindah agar gerakan tidak meloncat saat loop berulang.
    if (dragging) startScrollLeft += correction;
    return correction;
  };

  const updateFades = () => {
    frame = 0;
    normalizeLoop();
    fadeLeft?.classList.remove('is-hidden');
    fadeRight?.classList.remove('is-hidden');
  };

  const scheduleFadeUpdate = () => {
    if (!frame) frame = requestAnimationFrame(updateFades);
  };

  const makeClone = (slide) => {
    const clone = slide.cloneNode(true);
    clone.setAttribute('aria-hidden', 'true');
    clone.querySelectorAll('a, button, input, select, textarea, [tabindex]').forEach((element) => element.setAttribute('tabindex', '-1'));
    return clone;
  };

  if (list && originalSlides.length > 1) {
    const nextClones = originalSlides.map(makeClone);
    nextClones.forEach((slide) => list.appendChild(slide));
    [...originalSlides].reverse().forEach((slide) => list.prepend(makeClone(slide)));
    requestAnimationFrame(() => {
      loopStart = originalSlides[0].offsetLeft;
      loopWidth = nextClones[0].offsetLeft - loopStart;
      setScrollPosition(loopStart);
    });
  }

  gallery.addEventListener('scroll', scheduleFadeUpdate, { passive: true });

  gallery.addEventListener('wheel', (event) => {
    if (event.ctrlKey) return;

    const delta = Math.abs(event.deltaX) > Math.abs(event.deltaY)
      ? event.deltaX
      : event.deltaY;
    if (Math.abs(delta) < 0.5) return;

    event.preventDefault();
    gallery.style.scrollBehavior = 'auto';
    gallery.style.scrollSnapType = 'none';
    gallery.scrollLeft += delta;
    normalizeLoop();
    scheduleFadeUpdate();

    window.clearTimeout(wheelTimer);
    wheelTimer = window.setTimeout(() => {
      if (dragging) return;
      gallery.style.removeProperty('scroll-behavior');
      gallery.style.removeProperty('scroll-snap-type');
    }, 140);
  }, { passive: false });

  gallery.addEventListener('pointerdown', (event) => {
    if (event.pointerType === 'touch' || event.button !== 0) return;
    dragging = true;
    moved = false;
    activePointerId = event.pointerId;
    startX = event.clientX;
    startScrollLeft = gallery.scrollLeft;
    gallery.classList.add('is-dragging');
    gallery.style.scrollBehavior = 'auto';
    gallery.style.scrollSnapType = 'none';
    gallery.setPointerCapture(event.pointerId);
  });

  gallery.addEventListener('pointermove', (event) => {
    if (!dragging || event.pointerId !== activePointerId) return;
    const distance = event.clientX - startX;
    if (Math.abs(distance) > 4) moved = true;
    gallery.scrollLeft = startScrollLeft - distance;
    normalizeLoop();
    if (moved) event.preventDefault();
  });

  const stopDragging = (event) => {
    if (!dragging || (event.pointerId !== undefined && event.pointerId !== activePointerId)) return;
    dragging = false;
    gallery.classList.remove('is-dragging');
    gallery.style.removeProperty('scroll-behavior');
    gallery.style.removeProperty('scroll-snap-type');
    if (activePointerId !== null && gallery.hasPointerCapture(activePointerId)) {
      gallery.releasePointerCapture(activePointerId);
    }
    activePointerId = null;
    if (moved) {
      suppressClick = true;
      setTimeout(() => { suppressClick = false; }, 250);
    }
    scheduleFadeUpdate();
  };

  gallery.addEventListener('pointerup', stopDragging);
  gallery.addEventListener('pointercancel', stopDragging);
  gallery.addEventListener('lostpointercapture', (event) => {
    if (!dragging || event.pointerId !== activePointerId) return;
    stopDragging(event);
  });

  gallery.addEventListener('click', (event) => {
    if (!suppressClick) return;
    event.preventDefault();
    event.stopPropagation();
  }, true);

  gallery.addEventListener('keydown', (event) => {
    if (event.key !== 'ArrowLeft' && event.key !== 'ArrowRight') return;
    event.preventDefault();
    const card = gallery.querySelector('.product-slide');
    const step = (card?.getBoundingClientRect().width || 280) + 20;
    gallery.scrollBy({ left: event.key === 'ArrowRight' ? step : -step, behavior: 'smooth' });
  });

  requestAnimationFrame(updateFades);
})();
</script>
