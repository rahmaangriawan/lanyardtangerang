{{-- Dipercaya Berbagai Instansi — Final Premium Editorial + Scroll Reveal Reversible --}}
@php
  $testimonials = [
    ['name'=>'Rizky Pratama','role'=>'Event Officer, Bank Indonesia','quote'=>'Hasil printing tajam, bahan nyaman dipakai, dan pengerjaan lanyard untuk event kami selesai cepat.','avatar'=>'/images/testimonials/rizky-pratama.webp','logo'=>'/images/logos/bank-indonesia.svg'],
    ['name'=>'Dewi Lestari','role'=>'Marcom, Telkomsel','quote'=>'Desain sesuai request dan hasilnya rapi. Timnya responsif dari mockup sampai pengiriman.','avatar'=>'/images/testimonials/dewi-lestari.webp','logo'=>'/images/logos/telkomsel.svg'],
    ['name'=>'Farhan Ramadhan','role'=>'Koordinator Acara, UI','quote'=>'Pesanan untuk event kampus memuaskan. Warna cerah, bahan tebal, dan semuanya tepat waktu.','avatar'=>'/images/testimonials/farhan-ramadhan.webp','logo'=>'/images/logos/universitas-indonesia.png'],
    ['name'=>'Septiana Andini','role'=>'Procurement, BCA','quote'=>'Pelayanan ramah, cetakan rapi, dan pengiriman aman sampai tujuan. Prosesnya terasa mudah.','avatar'=>'/images/testimonials/septiana-andini.webp','logo'=>'/images/logos/bca.svg'],
    ['name'=>'Amanda Putri','role'=>'Humas, Kemenkes RI','quote'=>'Pemesanan lanyard instansi dalam jumlah besar selesai tepat waktu dengan kualitas yang seragam.','avatar'=>'/images/testimonials/amanda-putri.webp','logo'=>'/images/logos/kemenkes.svg'],
  ];
@endphp

<section class="lazy-section bg-white relative" style="padding-top: clamp(24px,3.6vw,52px); padding-bottom: clamp(68px,8vw,112px); overflow:hidden;" id="trusted">
  <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
    <div class="absolute inset-0" style="background-image: linear-gradient(to right, rgba(15,23,42,0.028) 1px, transparent 1px); background-size: 160px 100%; background-position: center top;"></div>
    <div class="absolute" style="top:-80px; left:50%; transform:translateX(-50%); width:680px; height:420px; border-radius:48px; background:#f8fafc; filter:blur(36px); opacity:0.9;"></div>
    <div class="absolute" style="top:20px; left:-80px; width:360px; height:240px; border-radius:9999px; background:#f8fafc; filter:blur(44px); opacity:0.7;"></div>
    <div class="absolute" style="top:10px; right:-60px; width:380px; height:260px; border-radius:9999px; background:#f8fafc; filter:blur(48px); opacity:0.7;"></div>
    <div class="absolute inset-0" style="background: linear-gradient(to bottom, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0.7) 60%, #fff 100%);"></div>
  </div>

  <div class="relative w-full mx-auto px-4 sm:px-6 lg:px-10" style="max-width:1440px;">
    {{-- SKY — parallax reversible, wheel up/down tetep jalan — 5 trust images baru --}}
    <div class="relative w-full select-none" id="trust-sky" style="height: clamp(284px, 32vw, 362px);" aria-label="Dokumentasi klien">
      <div class="t-float t-f1" data-parallax="0.04" data-parallax-rotate="1" style="--rot:-3.2deg"><img src="/images/testimonials/farhan-ramadhan.webp" alt="Testimoni Farhan Ramadhan koordinator acara UI - lanyard custom Tangerang" width="86" height="110" loading="lazy" decoding="async" /></div>
      <div class="t-float t-f2" data-parallax="0.08" style="--rot:2.1deg"><img src="/images/trust/trust-1.webp" alt="Lanyard custom Tangerang - hasil cetak event Bank Indonesia dan korporat" width="154" height="108" loading="lazy" decoding="async" /></div>
      <div class="t-float t-logo t-f3" data-parallax="0.06" style="--rot:-2.4deg"><img src="/images/logos/bank-indonesia.svg" alt="Bank Indonesia - klien Lanyard custom Tangerang" loading="lazy" /></div>
      <div class="t-float t-f4" data-parallax="0.10" style="--rot:2.8deg"><img src="/images/trust/trust-2.webp" alt="Lanyard custom premium Tangerang - produksi cepat untuk event kampus UI" width="176" height="116" loading="lazy" decoding="async" /></div>
      <div class="t-float t-logo t-f5" data-parallax="0.05" style="--rot:-3.8deg"><img src="/images/logos/telkomsel.svg" alt="Telkomsel - klien Lanyard custom Tangerang" loading="lazy" /></div>
      <div class="t-float t-f6" data-parallax="0.12" data-parallax-rotate="1" style="--rot:4.2deg"><img src="/images/testimonials/dewi-lestari.webp" alt="Testimoni Dewi Lestari Marcom Telkomsel - layanan lanyard Tangerang memuaskan" width="108" height="134" loading="lazy" decoding="async" /></div>
      <div class="t-float t-f7" data-parallax="0.07" style="--rot:-2.8deg"><img src="/images/trust/trust-3.webp" alt="Cetak lanyard custom Tangerang Selatan - dokumentasi klien Telkomsel & BCA" width="148" height="102" loading="lazy" decoding="async" /></div>
      <div class="t-float t-logo t-f8" data-parallax="0.05" style="--rot:2.6deg"><img src="/images/logos/bca.svg" alt="BCA - klien Lanyard custom Tangerang" loading="lazy" /></div>
      <div class="t-float t-id t-f9" data-parallax="0.09" data-parallax-rotate="1" style="--rot:-3.6deg"><div class="t-idbar"></div><div class="t-idline" style="width:76%"></div><div class="t-idline" style="width:62%"></div><div class="t-idline" style="width:84%"></div><span class="t-cap">ID CARD • LANYARD</span></div>
      <div class="t-float t-logo t-f10" data-parallax="0.06" style="--rot:1.6deg"><img src="/images/logos/universitas-indonesia.png" alt="Universitas Indonesia - klien Lanyard custom Tangerang" loading="lazy" /></div>
      <div class="t-float t-f11" data-parallax="0.08" style="--rot:-1.8deg"><img src="/images/trust/trust-4.webp" alt="Lanyard custom untuk instansi pemerintah - hasil produksi Tangerang" width="158" height="104" loading="lazy" decoding="async" /></div>
      <div class="t-float t-logo t-f12" data-parallax="0.05" style="--rot:3.1deg"><img src="/images/logos/kemenkes.svg" alt="Kemenkes RI - klien Lanyard custom Tangerang" loading="lazy" /></div>
      {{-- trust-5 new floating — masuk di area bawah sky biar padat --}}
      <div class="t-float t-f13" data-parallax="0.06" style="--rot:1.9deg"><img src="/images/trust/trust-5.webp" alt="Lanyard sablon full color custom Tangerang - koleksi terbaru 2026" width="144" height="100" loading="lazy" decoding="async" /></div>
    </div>

    <div class="relative z-10 mx-auto text-center" style="max-width:680px; margin-top:-10px;">
      <h2 data-sr="title" class="font-bold tracking-tight text-slate-900" style="font-size: clamp(2rem, 4vw, 2.75rem); line-height:1.08; letter-spacing:-0.03em; text-wrap:balance; overflow-wrap:break-word;">
        Dipercaya Ratusan Instansi<br/>untuk Produksi Lanyard Custom
      </h2>
      <p data-sr="desc" data-sr-delay="110" class="mx-auto text-slate-600" style="margin-top:14px; max-width:46ch; font-size:16px; line-height:1.6; letter-spacing:-0.01em; text-wrap:balance;">
        Dokumentasi nyata dari hasil produksi, proses kerja, dan klien yang telah mempercayakan kebutuhan lanyard kepada kami.
      </p>
    </div>

    {{-- Fase 4.2: reveal per-card urut 1-1 biar animasi keliatan, bukan bareng — IO stagger + custom per-card --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-6 mx-auto" style="margin-top:64px; max-width:1280px;" id="trust-cards">
      @foreach($testimonials as $i => $t)
      <div data-sr="trust-card" data-sr-delay="{{ $i * 140 }}" class="t-card group relative bg-white border border-slate-200/80" style="border-radius:20px; padding:24px; box-shadow:0 1px 2px rgba(15,23,42,0.04),0 10px 28px -18px rgba(15,23,42,0.14);">
        <div class="flex items-center justify-between" style="margin-bottom:16px;">
          <div class="flex items-center justify-center bg-slate-50 border border-slate-200/70" style="width:30px; height:30px; border-radius:9999px;">
            <span class="material-symbols-outlined" style="font-size:15px; color:#94a3b8;">format_quote</span>
          </div>
          <img src="{{ $t['logo'] }}" alt="{{ $t['name'] }} - klien Lanyard custom Tangerang di {{ $t['role'] }}" style="height:19px; width:auto; object-fit:contain; opacity:0.68; filter:grayscale(100%);" loading="lazy" />
        </div>
        <p style="font-size:14px; line-height:1.72; letter-spacing:-0.01em; color:#334155;">“{{ $t['quote'] }}”</p>
        <div class="flex items-center gap-3" style="margin-top:24px; padding-top:16px; border-top:1px solid #f1f5f9;">
          <img src="{{ $t['avatar'] }}" alt="{{ $t['name'] }}" width="40" height="40" style="width:40px; height:40px; border-radius:9999px; object-fit:cover; border:1px solid rgba(226,232,240,0.7);" loading="lazy" />
          <div style="min-width:0;">
            <div style="font-size:13px; font-weight:600; line-height:1.2; letter-spacing:-0.01em; color:#0f172a; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $t['name'] }}</div>
            <div style="font-size:12px; line-height:1.3; color:#64748b; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $t['role'] }}</div>
          </div>
        </div>
      </div>
      @endforeach

      <div data-sr="trust-card" data-sr-delay="760" class="t-card relative overflow-hidden" style="border-radius:20px; padding:1px;">
        <div class="absolute inset-0" style="background: linear-gradient(135deg, rgba(226,232,240,0.8) 0%, rgba(226,232,240,0.4) 50%, rgba(226,232,240,0.8) 100%); opacity:0.8;"></div>
        <div class="relative h-full flex flex-col justify-between overflow-hidden bg-slate-900" style="min-height:212px; border-radius:19px; padding:24px;">
          <div class="absolute inset-0" style="background: radial-gradient(120% 120% at 20% 10%, #1e293b 0%, #0f172a 55%, #020617 100%);"></div>
          <div class="absolute" style="right:-80px; top:-80px; width:280px; height:280px; border-radius:9999px; background:rgba(255,255,255,0.05);"></div>
          <div class="relative z-10">
            <div class="inline-flex bg-white/10 text-white" style="border:1px solid rgba(255,255,255,0.15); padding:4px 10px; border-radius:9999px; font-size:10px; font-weight:700; letter-spacing:0.12em;">500+ KLIEN AKTIF</div>
            <h3 class="font-bold text-white" style="margin-top:16px; font-size:18px; line-height:1.26; letter-spacing:-0.02em; text-wrap:balance;">Bergabung dengan ratusan perusahaan yang sudah mempercayakan lanyard mereka.</h3>
          </div>
          <div class="relative z-10" style="margin-top:24px;">
            <a href="https://wa.me/6282210200700?text=Halo%20Lanyard%20Tangerang,%20mau%20konsultasi%20lanyard%20custom" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 bg-white text-slate-900 font-semibold" style="border-radius:12px; padding:10px 16px; font-size:13px; letter-spacing:-0.01em;">
              <span>Konsultasi Gratis</span>
              <span class="material-symbols-outlined" style="font-size:16px;">arrow_forward</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  .t-float{
    position:absolute; background:#fff; border:1px solid rgba(226,232,240,0.88); border-radius:19px; overflow:hidden;
    box-shadow: 0 1px 2px rgba(15,23,42,0.04), 0 12px 30px -18px rgba(15,23,42,0.16);
    transform: rotate(var(--rot,0deg));
    transition: box-shadow 280ms ease;
    will-change: transform;
  }
  .t-float:hover{ box-shadow: 0 8px 22px rgba(15,23,42,0.06), 0 24px 48px -20px rgba(15,23,42,0.20); z-index:8; }
  .t-float img{ display:block; width:100%; height:100%; object-fit:cover; }
  .t-logo{ display:flex; align-items:center; justify-content:center; padding:10px 14px; background:#fff; }
  .t-logo img{ width:auto; height:auto; max-width:116px; max-height:28px; object-fit:contain; }
  .t-id{ width:106px; height:134px; padding:12px 10px 0 10px; background: linear-gradient(180deg,#ffffff 0%, #fbfdff 60%, #f8fafc 100%); }
  .t-idbar{ width:26px; height:6px; border-radius:9999px; background:#0f172a; margin-bottom:10px; }
  .t-idline{ height:6px; border-radius:9999px; background:#e2e8f0; margin-bottom:6px; }
  .t-cap{ display:block; margin-top:8px; font-size:8.5px; font-weight:800; letter-spacing:0.08em; color:#94a3b8; border-top:1px solid #f1f5f9; padding-top:6px; }
  .t-f1{ left:1%; top:14%; width:70px; height:90px; } .t-f2{ left:18%; top:0%; width:106px; height:74px; } .t-f3{ left:41.5%; top:10%; width:92px; height:42px; border-radius:18px; } .t-f4{ right:1%; top:-1%; width:116px; height:80px; } .t-f5{ right:0%; top:36%; width:82px; height:38px; border-radius:18px; } .t-f6{ left:1.5%; top:48%; width:74px; height:96px; } .t-f7{ left:22%; top:44%; width:102px; height:76px; } .t-f8, .t-f10, .t-f11, .t-f12, .t-f13{ display:none; } .t-f9{ left:50%; top:38%; width:86px; height:108px; }
  @media(min-width:640px){ .t-f1{ left:2%; width:76px; height:96px; } .t-f2{ left:18%; width:118px; height:82px; } .t-f3{ left:42%; width:104px; height:46px; } .t-f4{ width:132px; height:92px; } .t-f9{ width:92px; height:116px; } .t-f13{ display:block; left:42%; top:48%; width:96px; height:68px; } }
  @media(min-width:1024px){
    .t-f1{ left:4.5%; top:10%; width:86px; height:110px; } .t-f2{ left:11.8%; top:0%; width:152px; height:108px; } .t-f3{ left:23.6%; top:9%; width:132px; height:52px; border-radius:20px; display:flex; } .t-f4{ left:36.2%; top:-2%; width:184px; height:122px; right:auto; } .t-f5{ left:51.2%; top:5%; width:124px; height:50px; border-radius:20px; right:auto; display:flex; } .t-f6{ left:63.4%; top:0%; width:110px; height:138px; } .t-f7{ left:76%; top:6.5%; width:152px; height:110px; } .t-f8{ right:3.8%; top:12%; width:102px; height:46px; border-radius:20px; display:flex; } .t-f9{ left:18%; top:40%; width:106px; height:134px; display:block; } .t-f10{ left:31.8%; top:46%; width:134px; height:52px; display:flex; border-radius:20px; } .t-f11{ left:46%; top:38%; width:164px; height:108px; display:block; } .t-f12{ left:65%; top:42%; width:122px; height:48px; display:flex; border-radius:20px; } .t-f13{ left:78.5%; top:46%; width:148px; height:102px; display:block; }
  }
  @media(min-width:1280px){ .t-f2{ width:164px; } .t-f4{ width:196px; } .t-f7{ width:164px; } .t-f11{ width:176px; } .t-f13{ width:160px; } }
  .t-card{ transition: box-shadow 220ms ease, transform 220ms cubic-bezier(0.16,1,0.3,1); }
  .t-card:hover{ transform: translateY(-3px); box-shadow:0 8px 20px -12px rgba(15,23,42,0.1),0 22px 44px -22px rgba(15,23,42,0.16) !important; }
  @media(prefers-reduced-motion:reduce){ .t-float, [data-sr="trust-card"]{ transition:none !important; } }
</style>
