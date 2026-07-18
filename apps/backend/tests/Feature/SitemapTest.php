<?php

namespace Tests\Feature;

use App\Models\CityPage;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SitemapTest extends TestCase
{
    use RefreshDatabase;

    public function test_sitemap_index_lists_clickable_category_sitemaps(): void
    {
        $this->get('/sitemap.xml')
            ->assertOk()
            ->assertHeader('Content-Type', 'application/xml; charset=UTF-8')
            ->assertSee('<?xml-stylesheet type="text/xsl" href="/sitemap.xsl"?>', false)
            ->assertSee('/page-sitemap.xml')
            ->assertSee('/product-sitemap.xml')
            ->assertSee('/post-sitemap.xml')
            ->assertSee('/city-sitemap.xml');
    }

    public function test_page_sitemap_contains_the_public_static_pages(): void
    {
        $this->get('/page-sitemap.xml')
            ->assertOk()
            ->assertSee('/produk')
            ->assertSee('/cara-pemesanan')
            ->assertSee('/blog');
    }

    public function test_product_and_post_sitemaps_only_include_published_content(): void
    {
        Product::query()->create(['sku' => 'SITEMAP-1', 'name' => 'Produk Aktif', 'slug' => 'produk-aktif', 'published' => true]);
        Product::query()->create(['sku' => 'SITEMAP-2', 'name' => 'Produk Draft', 'slug' => 'produk-draft', 'published' => false]);
        Post::query()->create(['title' => 'Post Aktif', 'slug' => 'post-aktif', 'content' => 'Isi', 'published' => true]);
        Post::query()->create(['title' => 'Post Draft', 'slug' => 'post-draft', 'content' => 'Isi', 'published' => false]);

        $this->get('/product-sitemap.xml')->assertOk()->assertSee('/produk/produk-aktif')->assertDontSee('/produk/produk-draft');
        $this->get('/post-sitemap.xml')->assertOk()->assertSee('/blog/post-aktif')->assertDontSee('/blog/post-draft');
    }

    public function test_city_sitemap_and_public_city_page_only_expose_published_cities(): void
    {
        CityPage::query()->create([
            'title' => 'Lanyard Tangerang Selatan',
            'slug' => 'tangerang-selatan',
            'content' => '<p>Layanan Tangerang Selatan.</p>',
            'published' => true,
        ]);
        CityPage::query()->create([
            'title' => 'Lanyard Draft',
            'slug' => 'kota-draft',
            'content' => '<p>Draft.</p>',
            'published' => false,
        ]);

        $this->get('/city-sitemap.xml')->assertOk()->assertSee('/area/tangerang-selatan')->assertDontSee('/area/kota-draft');
        $this->get('/area/tangerang-selatan')->assertOk()->assertSee('Layanan Tangerang Selatan.');
        $this->get('/area/kota-draft')->assertNotFound();
    }
}
