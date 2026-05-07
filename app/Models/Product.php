<?php

namespace App\Models;

use Afea\Cms\Core\Concerns\HasSeo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use HasSeo, InteractsWithMedia;

    protected $fillable = [
        'type',
        'name',
        'slug',
        'eyebrow',
        'tagline',
        'price_label',
        'price_note',
        'buy_url',
        'cta_primary',
        'cta_secondary',
        'cta_secondary_url',
        'strip_stats',
        'content',
        'specs',
        'is_active',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'strip_stats' => 'array',
            'content' => 'array',
            'specs' => 'array',
            'is_active' => 'boolean',
            'order' => 'integer',
        ];
    }

    public function registerMediaCollections(): void
    {
        // Common
        $this->addMediaCollection('hero')->singleFile();

        // Phone
        $this->addMediaCollection('camera')->singleFile();
        $this->addMediaCollection('cinema');
        $this->addMediaCollection('display')->singleFile();

        // Watch
        $this->addMediaCollection('health')->singleFile();
        $this->addMediaCollection('design')->singleFile();
        $this->addMediaCollection('activity')->singleFile();
        $this->addMediaCollection('battery_img')->singleFile();

        // Headphone
        $this->addMediaCollection('anc')->singleFile();
        $this->addMediaCollection('sound')->singleFile();
        $this->addMediaCollection('headphone_design')->singleFile();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        if ($media === null) {
            return;
        }

        if (! in_array($media->mime_type, ['image/jpeg', 'image/png', 'image/webp', 'image/gif'], true)) {
            return;
        }

        $this->addMediaConversion('webp')
            ->format('webp')
            ->nonQueued();

        $this->addMediaConversion('thumb')
            ->fit(Fit::Crop, 600, 600)
            ->format('webp')
            ->nonQueued();
    }

    public function heroUrl(?string $conversion = null): ?string
    {
        $url = $this->getFirstMediaUrl('hero', $conversion ?? '');
        $url = $url !== '' ? $url : null;

        return $url ? preg_replace('#^https?://[^/]+#', '', $url) : null;
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('order');
    }

    public function scopeOfType(Builder $query, string $type): Builder
    {
        return $query->where('type', $type);
    }
}
