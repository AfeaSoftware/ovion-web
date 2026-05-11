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

class Product extends Model implements HasMedia
{
    use HasSeo, HasTranslations, InteractsWithMedia;

    /**
     * Translatable attributes — Spatie stores each as {"tr":..., "en":...}.
     * Includes JSON blocks (strip_stats, content, specs) so every visible
     * piece of copy on the detail page can be edited per-locale.
     */
    public array $translatable = [
        'slug',
        'name',
        'eyebrow',
        'tagline',
        'price_label',
        'price_note',
        'cta_primary',
        'cta_secondary',
        'meta_title',
        'meta_description',
        'strip_stats',
        'content',
        'specs',
    ];

    protected $fillable = [
        'type',
        'slug',
        'name',
        'eyebrow',
        'tagline',
        'strip_stats',
        'content',
        'specs',
        'price',
        'price_label',
        'price_note',
        'cta_primary',
        'cta_secondary',
        'buy_url',
        'cta_secondary_url',
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
        static::saving(function (Product $product): void {
            if ($product->is_spotlight && $product->isDirty('is_spotlight')) {
                static::query()
                    ->when($product->exists, fn ($q) => $q->whereKeyNot($product->getKey()))
                    ->where('is_spotlight', true)
                    ->update(['is_spotlight' => false]);
            }
        });
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
        // Hero & home-page card (every type)
        $this->addMediaCollection('hero')->singleFile();
        $this->addMediaCollection('collection_card')->singleFile();

        // Phone-only
        $this->addMediaCollection('camera')->singleFile();
        $this->addMediaCollection('display')->singleFile();
        $this->addMediaCollection('cinema'); // multi: design scroll

        // Watch-only
        $this->addMediaCollection('health')->singleFile();
        $this->addMediaCollection('design')->singleFile();
        $this->addMediaCollection('activity')->singleFile();
        $this->addMediaCollection('battery_img')->singleFile();

        // Headphone-only
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

    public function getFallbackLocale(): string
    {
        return 'tr';
    }

    public function resolveRouteBinding($value, $field = null)
    {
        $field ??= $this->getRouteKeyName();

        if ($field === 'slug') {
            $locale = app()->getLocale();

            return $this->newQuery()
                ->where(fn ($q) => $q
                    ->where('slug->'.$locale, $value)
                    ->orWhere('slug->tr', $value)
                    ->orWhere('slug->en', $value)
                )
                ->first();
        }

        return parent::resolveRouteBinding($value, $field);
    }

    public function accessories(): BelongsToMany
    {
        return $this->belongsToMany(Accessory::class)->withTimestamps();
    }
}
