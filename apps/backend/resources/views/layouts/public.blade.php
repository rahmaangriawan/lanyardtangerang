<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- SEO Foundation: Base component, fallback to legacy yields --}}
    @php
      $__seoTitle = null;
      $__seoDesc = null;
      $__seoCanonical = null;
      if (View::hasSection('title')) { $__seoTitle = trim($__env->yieldContent('title')); }
      if (View::hasSection('meta_description')) { $__seoDesc = trim($__env->yieldContent('meta_description')); }
      if (View::hasSection('seo_title')) { $__seoTitle = trim($__env->yieldContent('seo_title')); }
      if (View::hasSection('seo_desc')) { $__seoDesc = trim($__env->yieldContent('seo_desc')); }
      if (View::hasSection('seo_canonical')) { $__seoCanonical = trim($__env->yieldContent('seo_canonical')); }
      $__seoNoIndex = false;
      if (View::hasSection('seo_noindex')) { $__seoNoIndex = true; }
      $__seoType = 'website';
      if (View::hasSection('seo_type')) { $__seoType = trim($__env->yieldContent('seo_type')); if ($__seoType === '') $__seoType = 'website'; }
      $__seoOgImage = null;
      if (View::hasSection('seo_og_image')) { $__seoOgImage = trim($__env->yieldContent('seo_og_image')); }
    @endphp
    @include('components.seo', [
      'title' => $__seoTitle ?: null,
      'description' => $__seoDesc ?: null,
      'canonical' => $__seoCanonical ?: null,
      'ogImage' => $__seoOgImage ?: null,
      'type' => $__seoType,
      'noindex' => $__seoNoIndex,
    ])
    @stack('seo')

    {{-- Favicon ICO --}}
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="shortcut icon" href="/favicon.ico">

    {{-- Favicon PNG multi-size --}}
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">

    {{-- Apple Touch Icon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">

    {{-- Web App Manifest --}}
    <link rel="manifest" href="/site.webmanifest">

    {{-- Preload Critical Fonts --}}
    <link rel="preload" href="/fonts/geist/Geist-400.ttf" as="font" type="font/ttf" crossorigin>
    <link rel="preload" href="/fonts/geist/Geist-700.ttf" as="font" type="font/ttf" crossorigin>
    <link rel="preload" href="/fonts/material-symbols/MaterialSymbolsOutlined.woff2" as="font" type="font/woff2" crossorigin>

    {{-- Bundled CSS: Tailwind + colors + global + header + hero + fonts (minified) --}}
    @php
        $assetsVersion = \Illuminate\Support\Facades\Cache::remember('assets_version_hashes', 86400, function () {
            $appCssPath = public_path('css/app.min.css');
            $srCssPath = public_path('vendor/scroll/scroll-reveal.css');
            $srJsPath = public_path('vendor/scroll/scroll-reveal.js');
            return [
                'appCssV' => file_exists($appCssPath) ? filemtime($appCssPath) : 1,
                'srCssV' => file_exists($srCssPath) ? filemtime($srCssPath) : 1,
                'srJsV' => file_exists($srJsPath) ? filemtime($srJsPath) : 1,
            ];
        });
        $appCssV = $assetsVersion['appCssV'];
        $srCssV = $assetsVersion['srCssV'];
        $srJsV = $assetsVersion['srJsV'];
        $inlinePublicCss = \Illuminate\Support\Facades\Cache::remember(
            'inline_public_css_'.$appCssV.'_'.$srCssV,
            86400,
            fn () => (file_get_contents(public_path('css/app.min.css')) ?: '')
                .(file_get_contents(public_path('vendor/scroll/scroll-reveal.css')) ?: '')
        );
    @endphp
    <style data-public-critical-css>{!! $inlinePublicCss !!}</style>
    {{-- Scroll Reveal — Mode A Vanilla Light --}}

    {{-- Legacy sections support: blog show pakai @section('head') untuk article CSS (harus tetap dirender) --}}
    @hasSection('head')
      @yield('head')
    @endif
    @stack('head')

    <style>
      .bento-item { transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1); }
      .bento-item:hover { transform: translateY(-4px); }
      .glass { backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); }
      .no-scrollbar::-webkit-scrollbar { display: none; }
      .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
      /* Optimization: Lazy render offscreen sections — disable for first hero to allow reveal */
      .lazy-section { content-visibility: auto; contain-intrinsic-size: auto 500px; }
      #hero { content-visibility: visible; }
      /* Pre-allocate logo space to prevent CLS */
      .site-header__logo img { aspect-ratio: 4/1; object-fit: contain; }
    </style>

    @stack('schema')
</head>
<body class="bg-slate-50 text-slate-900">

    @include('components.header')

    <main>
        @yield('content')
    </main>

    @yield('scripts')
    {{-- Scroll Reveal Engine — Mode A --}}
    <script src="/vendor/scroll/scroll-reveal.js?v={{ $srJsV }}" defer></script>
</body>
</html>
