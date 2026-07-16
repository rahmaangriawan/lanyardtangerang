<?php

namespace Tests\Unit;

use App\Models\Media;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class MediaTest extends TestCase
{
    public function test_numeric_legacy_media_uses_the_matching_storage_image(): void
    {
        Storage::fake('public');
        Storage::disk('public')->put('1791/lanyard-custom-bogor.webp', 'image');

        $media = new Media([
            'filename' => '1791',
            'filepath' => '/media/1791',
            'mimetype' => 'image/webp',
            'url' => '/media/1791',
        ]);

        $this->assertSame(
            '/storage/1791/lanyard-custom-bogor.webp',
            $media->preview_url,
        );
    }
}
