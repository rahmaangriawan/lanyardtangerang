@php
  $siteUrlRaw = config('app.url');
  if (empty($siteUrlRaw)) { $siteUrlRaw = url('/'); }
  $siteUrl = rtrim($siteUrlRaw, '/');
  $logoUrl = $siteUrl . '/uploads/lanyardtangerang-logo.webp';
  $logoHeaderUrl = $siteUrl . '/uploads/lanyardtangerang-logo-header.webp';

  $orgSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    '@id' => $siteUrl . '/#organization',
    'name' => 'Lanyard Tangerang',
    'url' => $siteUrl . '/',
    'logo' => [
      '@type' => 'ImageObject',
      'url' => $logoUrl,
      'width' => 512,
      'height' => 512,
    ],
    'image' => $logoUrl,
    'telephone' => '+6282210200700',
    'email' => 'hello@lanyardtangerang.id',
    'description' => 'Cetak lanyard custom premium di Tangerang dengan pilihan bahan berkualitas, desain profesional, dan layanan pemesanan mudah. Bebas ongkir Tangerang Raya.',
    'sameAs' => [
      'https://wa.me/6282210200700',
    ],
    'address' => [
      '@type' => 'PostalAddress',
      'addressLocality' => 'Tangerang',
      'addressRegion' => 'Banten',
      'addressCountry' => 'ID',
    ],
  ];

  $localBusinessSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'LocalBusiness',
    '@id' => $siteUrl . '/#localbusiness',
    'name' => 'Lanyard Tangerang',
    'url' => $siteUrl . '/',
    'logo' => $logoUrl,
    'image' => $logoHeaderUrl,
    'telephone' => '+6282210200700',
    'priceRange' => 'Rp 1000 - Rp 50000',
    'description' => 'Cetak lanyard custom premium di Tangerang dengan Same Day Service dan gratis ongkir Tangerang Raya.',
    'address' => [
      '@type' => 'PostalAddress',
      'streetAddress' => 'Jl. Sudirman No. 123',
      'addressLocality' => 'Tangerang',
      'addressRegion' => 'Banten',
      'postalCode' => '15111',
      'addressCountry' => 'ID',
    ],
    'geo' => [
      '@type' => 'GeoCoordinates',
      'latitude' => -6.1765,
      'longitude' => 106.63,
    ],
    'openingHours' => 'Mo-Sa 08:00-20:00',
    'areaServed' => [
      ['@type' => 'City', 'name' => 'Tangerang'],
      ['@type' => 'City', 'name' => 'Tangerang Selatan'],
      ['@type' => 'AdministrativeArea', 'name' => 'Kabupaten Tangerang'],
      ['@type' => 'City', 'name' => 'BSD'],
      ['@type' => 'City', 'name' => 'Bintaro'],
    ],
  ];

  $websiteSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'WebSite',
    '@id' => $siteUrl . '/#website',
    'url' => $siteUrl . '/',
    'name' => 'Lanyard Tangerang',
    'publisher' => ['@id' => $siteUrl . '/#organization'],
    'inLanguage' => 'id-ID',
    'potentialAction' => [
      [
        '@type' => 'SearchAction',
        'target' => [
          '@type' => 'EntryPoint',
          'urlTemplate' => $siteUrl . '/produk?q={search_term_string}',
        ],
        'query-input' => 'required name=search_term_string',
      ],
      [
        '@type' => 'SearchAction',
        'target' => [
          '@type' => 'EntryPoint',
          'urlTemplate' => $siteUrl . '/blog?q={search_term_string}',
        ],
        'query-input' => 'required name=search_term_string',
      ],
    ],
  ];

  $breadcrumbSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
      [
        '@type' => 'ListItem',
        'position' => 1,
        'name' => 'Home',
        'item' => $siteUrl . '/',
      ],
    ],
  ];

  $faqSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => [
      [
        '@type' => 'Question',
        'name' => 'Apa itu lanyard custom dan bagaimana cara memesannya?',
        'acceptedAnswer' => [
          '@type' => 'Answer',
          'text' => 'Lanyard custom adalah tali ID card yang bisa didesain sesuai keinginan Anda, mulai dari warna, logo, hingga pemilihan bahan. Anda cukup menghubungi tim kami melalui WhatsApp, mengirimkan desain atau referensi, lalu kami akan memberikan mockup gratis sebelum produksi dimulai.',
        ],
      ],
      [
        '@type' => 'Question',
        'name' => 'Berapa minimal kuantitas pemesanan di Lanyard Tangerang?',
        'acceptedAnswer' => [
          '@type' => 'Answer',
          'text' => 'Tidak ada batas minimal! Anda bisa memesan mulai dari 1 pcs untuk sampel, namun kami menawarkan harga yang lebih ekonomis untuk pemesanan dalam jumlah besar. Semakin banyak kuantitas, semakin hemat biaya per unitnya.',
        ],
      ],
      [
        '@type' => 'Question',
        'name' => 'Pilihan bahan lanyard apa saja yang tersedia?',
        'acceptedAnswer' => [
          '@type' => 'Answer',
          'text' => 'Kami menyediakan material premium seperti polyester double layer, satin glossy, nylon premium, dan woven. Semua bahan bisa dikonsultasikan sesuai kebutuhan event, branding perusahaan, atau merchandise.',
        ],
      ],
      [
        '@type' => 'Question',
        'name' => 'Berapa lama waktu produksi dan apakah bisa lebih cepat?',
        'acceptedAnswer' => [
          '@type' => 'Answer',
          'text' => 'Standar produksi adalah 3-5 hari kerja. Kami juga menyediakan layanan Same Day Service di mana pesanan selesai di hari yang sama jika file desain disetujui sebelum jam 11:00 WIB, cocok untuk kebutuhan mendesak.',
        ],
      ],
      [
        '@type' => 'Question',
        'name' => 'Apakah Bebas Ongkir benar-benar berlaku tanpa syarat?',
        'acceptedAnswer' => [
          '@type' => 'Answer',
          'text' => 'Tentu saja! Layanan Bebas Ongkir berlaku otomatis untuk pengiriman ke alamat di wilayah Kota Tangerang, Tangerang Selatan, dan Kabupaten Tangerang, tanpa ada minimum transaksi.',
        ],
      ],
    ],
  ];
@endphp
<script type="application/ld+json">{!! json_encode($orgSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
<script type="application/ld+json">{!! json_encode($localBusinessSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
<script type="application/ld+json">{!! json_encode($websiteSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
<script type="application/ld+json">{!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
