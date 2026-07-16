{{-- Service Highlights — Interactive Deck (Premium SaaS, no icon/badge/title animation) --}}
<section class="lazy-section py-24 bg-white" id="services" data-sr="fade">
  <div class="px-6 lg:px-10 max-w-[1280px] mx-auto">
    <div class="text-center mb-16">
      <h2 class="font-bold tracking-tight text-slate-900 mx-auto" style="font-size: clamp(2rem, 4vw, 2.75rem); line-height:1.08; letter-spacing:-0.03em;">
        Layanan Cetak Sehari Jadi
      </h2>
    </div>

    @php
      $decks = [
        ['num'=>'01','title'=>'Same Day Service','summary'=>'Selesai kilat hitungan jam, tanpa kurangi kualitas.','detail'=>'Tim in-house + peralatan modern memungkinkan pesanan pagi selesai dan dikirim hari yang sama. Cocok untuk event dadakan atau konferensi.','badge'=>'FAST-TRACK','icon'=>'speed','stats'=>'4-6 Jam','stats_label'=>'Kecepatan produksi','features'=>['Selesai hitungan jam','Tim in-house','Prioritas pengerjaan','Konfirmasi real-time'],'cta'=>'Pesan Sekarang','cta_url'=>'/cara-pemesanan'],
        ['num'=>'02','title'=>'Bebas Ongkir','summary'=>'Gratis ongkir se-Tangerang tanpa minimum.','detail'=>'Gratis ongkir ke Karawaci, Cikokol, BSD, Gading Serpong, dan seluruh Tangerang untuk semua pesanan lanyard custom. Tanpa biaya tersembunyi.','badge'=>'ZERO COST','icon'=>'local_shipping','stats'=>'100% Tangerang','stats_label'=>'Cakupan area','features'=>['Gratis se-Tangerang','Tanpa minimum','Kirim hari yang sama','Lacak status'],'cta'=>'Cek Area','cta_url'=>'/area'],
        ['num'=>'03','title'=>'High Quality Print','summary'=>'Warna tajam, presisi 99% dan tahan lama.','detail'=>'Mesin digital resolusi tinggi menghasilkan warna presisi dan tahan pudar. Setiap lanyard melewati QC ketat sebelum kirim.','badge'=>'PREMIUM','icon'=>'high_quality','stats'=>'99% Akurat','stats_label'=>'Presisi warna','features'=>['Akurasi 99%','Tahan pudar','QC ketat','Bahan premium'],'cta'=>'Lihat Portofolio','cta_url'=>'#'],
        ['num'=>'04','title'=>'No Minimum Order','summary'=>'Pesan 1 pcs sampai ribuan, harga tetap bersaing.','detail'=>'Fleksibel dari sampel 1 pcs, 50 pcs komunitas, hingga ribuan pcs korporasi. Konsultasi gratis untuk hitung kebutuhan terbaik.','badge'=>'FLEKSIBEL','icon'=>'shopping_cart_off','stats'=>'Mulai Rp 1.000','stats_label'=>'Per pcs','features'=>['Mulai 1 pcs','Harga bersaing','Cocok UMKM','Konsultasi gratis'],'cta'=>'Daftar Harga','cta_url'=>'/daftar-harga'],
      ];
    @endphp

    <div id="deck-root" class="deck-layout">
      {{-- KIRI — Fase 3: no on-scroll stagger, cuma container masuk aja --}}
      <div class="flex flex-col gap-4" role="tablist" id="deck-nav" aria-label="Keunggulan layanan">
        @foreach($decks as $i => $d)
        <button type="button" role="tab" data-index="{{ $i }}" aria-selected="{{ $i===0 ? 'true':'false' }}"
          class="deck-nav group text-left flex w-full items-start bg-white rounded-2xl border border-slate-200">
          <div class="deck-icon-wrap">
            <div class="deck-icon-box">
              <span class="material-symbols-outlined deck-icon-glyph">{{ $d['icon'] }}</span>
            </div>
          </div>
          <div class="min-w-0 flex-1">
            <div class="flex items-center gap-2">
              <span class="text-[11px] font-bold tracking-widest text-slate-400">{{ $d['num'] }}</span>
              <span class="h-px w-6 bg-slate-200"></span>
              <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400">{{ $d['badge'] }}</span>
            </div>
            <h3 class="mt-2 text-[17px] font-bold leading-tight tracking-tight text-slate-900">{{ $d['title'] }}</h3>
            <p class="mt-1.5 text-[14px] leading-relaxed text-slate-500 line-clamp-2">{{ $d['summary'] }}</p>
          </div>
        </button>
        @endforeach
      </div>

      {{-- KANAN — Fase 3: no card reveal, internal deck anim tetep (checklist) --}}
      <div class="lg:sticky lg:top-28">
        <div class="bg-white rounded-[2rem] border border-slate-200 p-8 lg:p-10 shadow-[0_20px_40px_-20px_rgba(15,23,42,0.12)]">
          <div id="deck-display"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  .deck-layout{ display:grid; grid-template-columns:1fr; gap:1.5rem; }
  @media(min-width:1024px){ .deck-layout{ grid-template-columns:1fr 1fr; align-items:start; gap:2rem; } }

  /* Card base */
  .deck-nav{
    position:relative;
    overflow:hidden;
    padding:24px;
    gap:0;
    background:#fff;
    border:1px solid #e2e8f0;
    border-radius:16px;
    transition: border-color 220ms ease-out, background-color 220ms ease-out, box-shadow 200ms ease-out, transform 200ms ease-out;
    will-change: transform, box-shadow, border-color;
  }
  .deck-nav:not(.is-active):hover{
    transform: translateY(-2px);
    border-color:#cbd5e1;
    box-shadow:0 12px 24px -12px rgba(15,23,42,0.18);
  }
  .deck-nav.is-active{
    background:#f8fafc;
    border-color:#0f172a;
    box-shadow:0 16px 32px -16px rgba(15,23,42,0.20);
  }

  /* 2. LEFT ACCENT 4px via ::before height animation */
  .deck-nav::before{
    content:'';
    position:absolute;
    left:0; top:0;
    width:4px;
    height:100%;
    background:#0f172a;
    transform-origin:top;
    transform:scaleY(0);
    transition: transform 250ms ease-out;
    will-change: transform;
    border-radius:0 2px 2px 0;
  }
  .deck-nav.is-active::before{ transform:scaleY(1); }

  /* 3. BACKGROUND SWEEP via ::after */
  .deck-nav::after{
    content:'';
    position:absolute;
    inset:0;
    background: linear-gradient(90deg, rgba(15,23,42,0.08) 0%, rgba(15,23,42,0) 62%);
    transform: translateX(-100%);
    opacity:0;
    pointer-events:none;
    will-change: transform, opacity;
  }
  .deck-nav.is-sweeping::after{
    animation: deckSweep 520ms cubic-bezier(0.22,1,0.36,1) forwards;
  }
  @keyframes deckSweep{
    0%{ transform:translateX(-100%); opacity:0; }
    15%{ opacity:1; }
    100%{ transform:translateX(0%); opacity:0; }
  }

  /* Icon box — static, no animation */
  .deck-icon-wrap{ flex-shrink:0; margin-right:18px; }
  .deck-icon-box{
    width:44px; height:44px;
    padding:7px;
    background:#EEF2F7;
    border:1px solid rgba(226,232,240,0.9);
    border-radius:8px;
    display:inline-flex; align-items:center; justify-content:center;
  }
  .deck-icon-glyph{
    font-size:20px !important;
    line-height:1;
    color:#334155;
    font-variation-settings:'FILL' 1, 'wght' 400;
  }

  /* Detail panel */
  #deck-display{
    min-height:420px;
    opacity:1;
    transform: translateY(0);
    will-change: opacity, transform;
  }

  .deck-detail-badge{
    display:inline-flex; align-items:center;
    border-radius:9999px;
    background:#0f172a; color:#fff;
    padding:6px 12px;
    font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:0.14em;
  }
  .deck-detail-icon-box{
    width:44px; height:44px; padding:7px;
    background:#F8FAFC;
    border:1px solid rgba(226,232,240,0.9);
    border-radius:8px;
    display:inline-flex; align-items:center; justify-content:center;
  }
  .deck-detail-icon-glyph{ font-size:20px !important; color:#334155; line-height:1; }

  .deck-features-grid{ display:grid; grid-template-columns:1fr; gap:20px; }
  @media(min-width:640px){ .deck-features-grid{ grid-template-columns:1fr 1fr; column-gap:32px; row-gap:20px; } }

  /* 5. CHECKLIST — only opacity + translateY */
  .deck-feature-item{
    display:flex; align-items:center; gap:12px;
    opacity:0;
    transform: translateY(8px);
    transition: opacity 280ms ease-out, transform 280ms cubic-bezier(0.22,1,0.36,1);
    will-change: opacity, transform;
  }
  .deck-feature-item.is-visible{ opacity:1; transform: translateY(0); }

  .deck-feature-box{
    width:36px; height:36px; padding:7px;
    background:#F8FAFC; border:1px solid rgba(226,232,240,0.8);
    border-radius:8px; display:inline-flex; align-items:center; justify-content:center; flex-shrink:0;
  }
  .deck-feature-glyph{ font-size:14px !important; color:#475569; }

  /* 6. CTA */
  .deck-cta{
    opacity:0;
    transform: scale(0.98);
    transition: opacity 250ms ease-out, transform 250ms cubic-bezier(0.22,1,0.36,1);
    will-change: opacity, transform;
  }
  .deck-cta.is-visible{ opacity:1; transform: scale(1); }
  .deck-cta-arrow{
    display:inline-block;
    transition: transform 250ms cubic-bezier(0.22,1,0.36,1);
    will-change: transform;
  }

  @media(prefers-reduced-motion:reduce){
    .deck-nav, .deck-nav::before, #deck-display, .deck-feature-item, .deck-cta, .deck-cta-arrow{
      transition:none !important; animation:none !important;
    }
  }
</style>

<script>
(() => {
  const decks = @json($decks);
  const navRoot = document.getElementById('deck-nav');
  const display = document.getElementById('deck-display');
  if(!navRoot || !display) return;

  let active = 0;
  let fadeTimer = null;
  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  function buildDetail(idx){
    const d = decks[idx];
    return `
      <div class="flex flex-col">
        <div class="flex items-start justify-between gap-6">
          <span class="deck-detail-badge">${d.badge}</span>
          <span class="deck-detail-icon-box">
            <span class="material-symbols-outlined deck-detail-icon-glyph">${d.icon}</span>
          </span>
        </div>
        <div class="mt-8">
          <h3 class="text-[26px] md:text-[30px] font-bold leading-[1.1] tracking-tight text-slate-900">${d.title}</h3>
          <p class="mt-4 max-w-[46ch] text-[15px] leading-[1.75] text-slate-600">${d.detail}</p>
        </div>
        <div class="mt-8 pt-8 border-t border-slate-100">
          <div class="deck-features-grid">
            ${d.features.map(f=>`
              <div class="deck-feature-item">
                <span class="deck-feature-box"><span class="material-symbols-outlined deck-feature-glyph">check</span></span>
                <span class="text-[14px] leading-6 font-medium text-slate-700">${f}</span>
              </div>`).join('')}
          </div>
        </div>
        <div class="mt-10 rounded-2xl bg-slate-50 border border-slate-200/60 p-5 flex flex-wrap items-center justify-between gap-4 deck-cta" data-cta>
          <div>
            <div class="text-[20px] font-extrabold leading-none tracking-tight text-slate-900">${d.stats}</div>
            <div class="mt-1.5 text-[11px] font-bold uppercase tracking-widest text-slate-400">${d.stats_label}</div>
          </div>
          <a href="${d.cta_url}" class="deck-cta-btn group/btn relative overflow-hidden inline-flex items-center gap-2 rounded-xl bg-slate-800 px-6 py-3.5 text-[14px] font-semibold text-white transition-all before:absolute before:top-1/2 before:left-1/2 before:h-0 before:w-0 before:-translate-x-1/2 before:-translate-y-1/2 before:rounded-full before:bg-white/15 before:duration-700 before:ease-out hover:before:h-[800px] hover:before:w-[800px] active:scale-[0.98]">
            <span class="relative z-10">${d.cta}</span>
            <span class="material-symbols-outlined relative z-10 text-[18px] deck-cta-arrow group-hover/btn:translate-x-0.5 transition-transform duration-300" data-arrow>arrow_forward</span>
          </a>
        </div>
      </div>`;
  }

  function setActive(newIdx){
    if(newIdx===active && display.innerHTML.trim()!=='') return;
    const prevActiveBtn = navRoot.querySelector(`[data-index="${active}"]`);
    const nextBtn = navRoot.querySelector(`[data-index="${newIdx}"]`);
    active = newIdx;

    // nav states + press scale
    navRoot.querySelectorAll('.deck-nav').forEach((el,idx)=>{
      el.classList.remove('is-active','is-sweeping');
      el.setAttribute('aria-selected', idx===newIdx ? 'true' : 'false');
    });
    if(nextBtn){
      nextBtn.classList.add('is-active');
      // trigger reflow for sweep
      void nextBtn.offsetWidth;
      nextBtn.classList.add('is-sweeping');
      // responsive press scale 0.995 -> 1
      if(!prefersReduced && nextBtn.animate){
        nextBtn.animate([{transform:'scale(0.995)'},{transform:'scale(1)'}],{duration:220,easing:'ease-out'});
      }
      setTimeout(()=>{ nextBtn.classList.remove('is-sweeping'); }, 600);
    }

    // panel fade out -> update -> fade in
    if(fadeTimer) clearTimeout(fadeTimer);
    const FADE_OUT = prefersReduced ? 0 : 160;
    const FADE_IN = 300;

    display.style.transition = `opacity ${FADE_OUT}ms ease-out`;
    display.style.opacity = '0';

    fadeTimer = setTimeout(()=>{
      display.innerHTML = buildDetail(newIdx);
      display.style.transform = 'translateY(12px)';
      display.style.opacity = '0';
      display.style.transition = `opacity ${FADE_IN}ms ease-out, transform ${FADE_IN}ms cubic-bezier(0.22,1,0.36,1)`;

      requestAnimationFrame(()=>{
        requestAnimationFrame(()=>{
          display.style.opacity = '1';
          display.style.transform = 'translateY(0)';

          // checklist stagger 0,80,160,240
          const items = display.querySelectorAll('.deck-feature-item');
          items.forEach((it,i)=>{
            it.style.transitionDelay = `${i*80}ms`;
            setTimeout(()=>{ it.classList.add('is-visible'); }, 20 + i*80);
          });

          // CTA scale + arrow
          const cta = display.querySelector('[data-cta]');
          const arrow = display.querySelector('[data-arrow]');
          setTimeout(()=>{
            if(cta) cta.classList.add('is-visible');
            if(arrow && !prefersReduced){
              arrow.style.transform = 'translateX(4px)';
              setTimeout(()=>{ arrow.style.transform = 'translateX(0)'; }, 180);
            }
          }, 260);
        });
      });
    }, FADE_OUT);
  }

  navRoot.addEventListener('click', e=>{
    const btn = e.target.closest('[data-index]');
    if(!btn) return;
    setActive(Number(btn.dataset.index));
  });

  navRoot.addEventListener('keydown', e=>{
    if(e.key==='ArrowDown' || e.key==='ArrowUp'){
      e.preventDefault();
      const dir = e.key==='ArrowDown' ? 1 : -1;
      const next = (active + dir + decks.length) % decks.length;
      setActive(next);
      navRoot.querySelector(`[data-index="${next}"]`)?.focus();
    }
  });

  // init
  display.innerHTML = buildDetail(0);
  display.style.opacity='1';
  display.style.transform='translateY(0)';
  const firstItems = display.querySelectorAll('.deck-feature-item');
  firstItems.forEach((it,i)=>{
    it.style.transitionDelay=`${i*80}ms`;
    setTimeout(()=>it.classList.add('is-visible'), 20 + i*80);
  });
  const firstCta = display.querySelector('[data-cta]');
  setTimeout(()=>{ if(firstCta) firstCta.classList.add('is-visible'); }, 320);
  navRoot.querySelector('[data-index="0"]')?.classList.add('is-active');
})();
</script>
