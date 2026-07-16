<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach($urls as $u)
  <url>
    <loc>{{ rtrim($base, '/') }}{{ $u['loc'] }}</loc>
    @if(isset($u['lastmod']))
    <lastmod>{{ $u['lastmod']->toAtomString() }}</lastmod>
    @endif
    @if(isset($u['freq']))
    <changefreq>{{ $u['freq'] }}</changefreq>
    @endif
    @if(isset($u['priority']))
    <priority>{{ $u['priority'] }}</priority>
    @endif
  </url>
@endforeach
@foreach($products as $p)
  <url>
    <loc>{{ rtrim($base, '/') }}/produk/{{ $p->slug }}</loc>
    @if(isset($p->updatedAt) && $p->updatedAt)
    <lastmod>{{ \Carbon\Carbon::parse($p->updatedAt)->toAtomString() }}</lastmod>
    @endif
    <changefreq>weekly</changefreq>
    <priority>0.7</priority>
  </url>
@endforeach
@foreach($posts as $post)
  <url>
    <loc>{{ rtrim($base, '/') }}/blog/{{ $post->slug }}</loc>
    @if(isset($post->updatedAt) && $post->updatedAt)
    <lastmod>{{ \Carbon\Carbon::parse($post->updatedAt)->toAtomString() }}</lastmod>
    @endif
    <changefreq>weekly</changefreq>
    <priority>0.8</priority>
  </url>
@endforeach
</urlset>
