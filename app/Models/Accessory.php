<?php

namespace App\Models;

use Afea\Cms\Core\Concerns\HasSeo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

class Accessory extends Model implements HasMedia
{
    use HasSeo, HasTranslations, InteractsWithMedia;

    public array $translatable = [
        'slug',
        'name',
        'summary',
        'description',
        'price_note',
        'meta_title',
        'meta_description',
    ];

    protected $fillable = [
        'category',
        'slug',
        'name',
        'summary',
        'description',
        'price',
        'price_note',
        'buy_url',
        'meta_title',
        'meta_description',
        'is_active',
        'is_spotlight',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'is_active' => 'boolean',
            'is_spotlight' => 'boolean',
            'order' => 'integer',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (Accessory $accessory): void {
            if ($accessory->is_spotlight && $accessory->isDirty('is_spotlight')) {
                static::query()
                    ->when($accessory->exists, fn ($q) => $q->whereKeyNot($accessory->getKey()))
                    ->where('is_spotlight', true)
                    ->update(['is_spotlight' => false]);
            }
        });
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }

    public function priceLabel(): ?string
    {
        if ($this->price === null) {
            return null;
        }

        return '₺'.number_format((float) $this->price, 2, ',', '.');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')->singleFile();
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

    public function imageUrl(?string $conversion = null): ?string
    {
        $url = $this->getFirstMediaUrl('image', $conversion ?? '');
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

    public function scopeOfCategory(Builder $query, string $category): Builder
    {
        return $query->where('category', $category);
    }

    public function scopeSpotlight(Builder $query): Builder
    {
        return $query->where('is_spotlight', true);
    }

    public function getFallbackLocale(): string
    {
        return 'tr';
    }
}
