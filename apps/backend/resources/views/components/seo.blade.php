@props([
  'title' => null,
  'description' => null,
  'canonical' => null,
  'ogImage' => null,
  'type' => 'website',
  'noindex' => false,
  'publishedTime' => null,
  'modifiedTime' => null,
])
@php
  // Avoid ?? and ?-> per pitfall note — canonical fix + prod domain fallback
  $siteUrlRaw = config('app.url');
  if (empty($siteUrlRaw)) {
    $siteUrlRaw = url('/');
  }
  $siteUrl = rtrim($siteUrlRaw, '/');
  if (empty($siteUrl)) {
    $siteUrl = url('/');
  }
  // Force production domain if config is localhost / 127 / empty to avoid indexing dev
  if (strpos($siteUrl, 'localhost') !== false || strpos($siteUrl, '127.0.0.1') !== false) {
    $siteUrl = 'https://lanyardtangerang.com';
  }
  if (!preg_match('/^https?:\/\//', $siteUrl)) {
    $siteUrl = 'https://lanyardtangerang.com';
  }
  $siteUrl = rtrim($siteUrl, '/');

  $defaultTitle = 'Lanyard Tangerang | Cetak Lanyard Custom Cepat & Berkualitas';
  $defaultDesc = 'Cetak lanyard custom premium di Tangerang dengan pilihan bahan berkualitas, desain profesional, dan layanan pemesanan mudah. Bebas ongkir Tangerang Raya.';

  $incomingTitle = isset($title) && $title !== '' ? $title : null;
  $incomingDesc = isset($description) && $description !== '' ? $description : null;
  $incomingCanonical = isset($canonical) && $canonical !== '' ? $canonical : null;
  $incomingOgImage = isset($ogImage) && $ogImage !== '' ? $ogImage : null;

  $finalTitle = $incomingTitle ? $incomingTitle : $defaultTitle;
  $finalDesc = $incomingDesc ? $incomingDesc : $defaultDesc;

  // canonical: always build from $siteUrl + path, strip query string ?q, ?page, utm_, etc.
  $rawCanonical = $incomingCanonical ? $incomingCanonical : url()->current();
  if (strpos($rawCanonical, '?') !== false) {
    $rawCanonical = strtok($rawCanonical, '?');
  }
  $parsedPath = parse_url($rawCanonical, PHP_URL_PATH);
  if ($parsedPath === false || $parsedPath === null || $parsedPath === '') {
    $parsedPath = '/';
  }
  $parsedPath = '/' . trim($parsedPath, '/');
  if ($parsedPath === '//') { $parsedPath = '/'; }
  // special handling: if path is empty, treat as home
  if ($parsedPath === '/' || $parsedPath === '') {
    $finalCanonical = $siteUrl . '/';
  } else {
    $finalCanonical = $siteUrl . rtrim($parsedPath, '/');
  }
  // edge: ensure home always trailing slash
  if ($finalCanonical === $siteUrl) {
    $finalCanonical = $siteUrl . '/';
  }

  $ogImagePath = \App\Support\AssetUrl::relative(
    $incomingOgImage,
    '/uploads/lanyardtangerang-logo.webp'
  );
  if (strpos($ogImagePath, 'http') === 0) {
    $finalImage = $ogImagePath;
  } else {
    $finalImage = $siteUrl . '/' . ltrim($ogImagePath, '/');
  }

  // Limit helpers (no ??)
  if (function_exists('mb_strlen')) {
    $descLen = mb_strlen($finalDesc);
  } else {
    $descLen = strlen($finalDesc);
  }
  if ($descLen > 160) {
    if (function_exists('mb_substr')) {
      $trimmedDesc = mb_substr($finalDesc, 0, 157) . '...';
    } else {
      $trimmedDesc = substr($finalDesc, 0, 157) . '...';
    }
  } else {
    $trimmedDesc = $finalDesc;
  }

  if (function_exists('mb_strlen')) {
    $titleLen = mb_strlen($finalTitle);
  } else {
    $titleLen = strlen($finalTitle);
  }
  // Keep original if slightly over, but hint in comment
  $finalTitleDisplay = $finalTitle;

  $robotsContent = $noindex ? 'noindex, follow' : 'index, follow, max-image-preview:large';

  // Escape for HTML attribute
  $eTitle = e($finalTitleDisplay);
  $eDesc = e($trimmedDesc);
  $eCanonical = e($finalCanonical);
  $eImage = e($finalImage);
@endphp
{{-- Base SEO --}}
<title>{{ $finalTitleDisplay }}</title>
<meta name="description" content="{{ $trimmedDesc }}">
<link rel="canonical" href="{{ $finalCanonical }}">
<meta name="robots" content="{{ $robotsContent }}">
<meta name="author" content="Lanyard Tangerang">
<meta name="theme-color" content="#0f172a">

{{-- Open Graph --}}
<meta property="og:site_name" content="Lanyard Tangerang">
<meta property="og:locale" content="id_ID">
<meta property="og:title" content="{{ $finalTitleDisplay }}">
<meta property="og:description" content="{{ $trimmedDesc }}">
<meta property="og:url" content="{{ $finalCanonical }}">
<meta property="og:type" content="{{ $type }}">
<meta property="og:image" content="{{ $finalImage }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="{{ $finalTitleDisplay }}">

{{-- Twitter --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $finalTitleDisplay }}">
<meta name="twitter:description" content="{{ $trimmedDesc }}">
<meta name="twitter:image" content="{{ $finalImage }}">

{{-- OG published/modified for article --}}
@if($type === 'article')
  @if($publishedTime)
  <meta property="article:published_time" content="{{ $publishedTime }}">
  @endif
  @if($modifiedTime)
  <meta property="article:modified_time" content="{{ $modifiedTime }}">
  @endif
@endif
