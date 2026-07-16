<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    public const CREATED_AT = 'createdAt';
    public const UPDATED_AT = null;

    protected $table = 'media';

    protected $fillable = ['filename', 'filepath', 'mimetype', 'size', 'url'];

    protected function casts(): array
    {
        return [
            'size' => 'integer',
            'createdAt' => 'datetime',
        ];
    }

    /**
     * Resolve legacy database URLs through the current public disk. Records
     * imported from older sites often keep an obsolete absolute URL, while
     * filepath still points at the file that is present in storage.
     */
    public function getPreviewUrlAttribute(): string
    {
        $rawPath = ltrim(str_replace('\\', '/', trim((string) $this->filepath)), '/');

        if (str_starts_with($rawPath, 'public/')) {
            return '/'.substr($rawPath, strlen('public/'));
        }

        if (str_starts_with($rawPath, 'media/')) {
            return '/'.$rawPath;
        }

        $path = $this->disk_path;

        if ($path !== '') {
            return '/storage/'.implode('/', array_map('rawurlencode', explode('/', $path)));
        }

        $url = trim((string) $this->url);

        if ($url !== '') {
            return $url;
        }

        return Storage::disk('public')->url((string) $this->filename);
    }

    public function getDiskPathAttribute(): string
    {
        $path = ltrim(str_replace('\\', '/', trim((string) $this->filepath)), '/');

        if (str_starts_with($path, 'public/') || str_starts_with($path, 'media/')) {
            return '';
        }

        foreach (['storage/app/public/', 'public/storage/', 'storage/', 'public/'] as $prefix) {
            if (str_starts_with($path, $prefix)) {
                $path = substr($path, strlen($prefix));
                break;
            }
        }

        return $path;
    }
}
