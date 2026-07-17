{{-- Two‑column layout with contact card matching reference image — Fase 4: container only --}}
<section class="lazy-section bg-white" id="faq" data-sr="fade" style="padding-top: clamp(64px, 8vw, 96px); padding-bottom: clamp(64px, 8vw, 96px);">
  
  {{-- Header --}}
  <div class="px-6 lg:px-10 max-w-[1280px] mx-auto">
  <div class="text-center max-w-2xl mx-auto" style="margin-bottom: clamp(32px, 4.5vw, 64px);">
    <h2 class="font-bold tracking-tight text-slate-900" style="font-size: clamp(2rem, 4vw, 2.75rem); line-height:1.08; letter-spacing:-0.03em;">
      Pertanyaan <span class="text-slate-800">Umum</span>
    </h2>
    <p class="mt-4 text-slate-500 max-w-xl mx-auto" style="font-size:16px; line-height:1.6; letter-spacing:-0.01em;">
      Jawaban cepat untuk pertanyaan yang sering diajukan seputar pemesanan cetak lanyard custom, pengiriman, dan layanan kami di Tangerang.
    </p>
  </div>

  {{-- Two‑column layout --}}
  <div class="grid lg:grid-cols-[1fr_380px] gap-8 items-start">

    {{-- Accordion List — no on-scroll per item, fase 4 container only --}}
    <div id="faq-accordion" class="flex flex-col gap-5" role="region" aria-label="Pertanyaan Umum Seputar Lanyard Custom Tangerang">
      @php
        $faqs = [
          [
            'q' => 'Apa itu lanyard custom dan bagaimana cara memesannya?',
            'a' => 'Lanyard custom adalah tali ID card yang bisa didesain sesuai keinginan Anda, mulai dari warna, logo, hingga pemilihan bahan. Anda cukup menghubungi tim kami melalui WhatsApp, mengirimkan desain atau referensi, lalu kami akan memberikan mockup gratis sebelum produksi dimulai. Proses pemesanannya mudah dan transparan.',
          ],
          [
            'q' => 'Berapa minimal kuantitas pemesanan di Lanyard Tangerang?',
            'a' => 'Tidak ada batas minimal! Anda bisa memesan mulai dari 1 pcs untuk sampel, namun kami menawarkan harga yang lebih ekonomis untuk pemesanan dalam jumlah besar (bulk order). Semakin banyak kuantitas, semakin hemat biaya per unitnya.',
          ],
          [
            'q' => 'Pilihan bahan lanyard apa saja yang tersedia?',
            'a' => 'Kami menyediakan material premium seperti polyester double layer (tebal & timbul), satin glossy (elegan), nylon premium, dan woven (anyaman permanen). Semua bahan bisa dikonsultasikan sesuai kebutuhan event, branding perusahaan, atau merchandise.',
          ],
          [
            'q' => 'Berapa lama waktu produksi dan apakah bisa lebih cepat?',
            'a' => 'Standar produksi adalah 3-5 hari kerja. Kami juga menyediakan layanan Same Day Service di mana pesanan selesai di hari yang sama jika file desain disetujui sebelum jam 11:00 WIB, cocok untuk kebutuhan mendesak.',
          ],
          [
            'q' => 'Apakah Bebas Ongkir benar-benar berlaku tanpa syarat?',
            'a' => 'Tentu saja! Layanan Bebas Ongkir berlaku otomatis untuk pengiriman ke alamat di wilayah Kota Tangerang, Tangerang Selatan, dan Kabupaten Tangerang, tanpa ada minimum transaksi.',
          ],
        ];
      @endphp

      @foreach ($faqs as $i => $faq)
      <details class="faq-item group bg-white rounded-xl border border-slate-200 overflow-hidden" {{ $i === 0 ? 'open' : '' }} aria-labelledby="faq-q-{{ $i }}">
        <summary id="faq-q-{{ $i }}" class="flex justify-between items-center px-6 py-5 cursor-pointer font-semibold text-[15px] sm:text-base select-none list-none text-slate-900 transition-colors hover:bg-slate-50" aria-controls="faq-a-{{ $i }}">
          <span class="pr-4">{{ $faq['q'] }}</span>
          <span class="material-symbols-outlined text-slate-400 shrink-0 group-open:rotate-180 transition-transform duration-300" aria-hidden="true">expand_more</span>
        </summary>
        <div id="faq-a-{{ $i }}" class="px-6 pb-6 pt-0 text-slate-500 text-[15px] leading-relaxed">
          {{ $faq['a'] }}
        </div>
      </details>
      @endforeach
    </div>

    {{-- Contact Card --}}
    <div class="bg-white rounded-2xl border border-slate-200 p-8 lg:p-10 text-center shadow-sm sticky top-28">
      <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-slate-100 mb-6">
        <span class="material-symbols-outlined text-3xl text-slate-800" style="font-variation-settings: 'FILL' 1;">chat</span>
      </div>
      <h3 class="text-xl font-bold text-slate-800 mb-3">Punya pertanyaan lain?</h3>
      <p class="text-slate-500 text-sm leading-relaxed mb-8">
        Tidak menemukan jawaban yang Anda cari? Tim kami siap membantu dan akan merespons secepat mungkin dengan jawaban yang jelas untuk kebutuhan Anda.
      </p>
      <a
        href="https://wa.me/6282210200700?text=Halo%20Lanyard%20Tangerang%2C%20saya%20mau%20bertanya%20soal..."
        target="_blank"
        rel="noopener noreferrer"
        class="group relative overflow-hidden inline-flex w-full items-center justify-center rounded-xl bg-slate-800 px-6 min-h-12 text-sm font-bold text-white transition-all hover:bg-slate-900 active:scale-95 before:absolute before:top-1/2 before:left-1/2 before:-translate-x-1/2 before:-translate-y-1/2 before:h-0 before:w-0 before:rounded-full before:bg-white/20 before:duration-700 before:ease-out hover:before:h-[800px] hover:before:w-[800px]"
      >
        <span class="hero-btn-text relative z-10 inline-block">Hubungi Kami</span>
      </a>
    </div>

  </div>
  </div>
</section>
