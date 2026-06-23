<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Spatie\Translatable\HasTranslations;

class SupportTopic extends Model
{
    use HasTranslations;

    /**
     * Translatable attributes — Spatie stores each as {"tr":..., "en":...}.
     * `documents` is a translatable JSON block so each locale can ship its
     * own set of PDFs (e.g. a Turkish vs. English manual).
     */
    public array $translatable = [
        'slug',
        'title',
        'summary',
        'intro',
        'documents',
        'meta_title',
        'meta_description',
    ];

    protected $fillable = [
        'icon',
        'slug',
        'title',
        'summary',
        'intro',
        'documents',
        'meta_title',
        'meta_description',
        'is_active',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'order' => 'integer',
        ];
    }

    /**
     * Documents for the current locale as a clean, file-bearing collection.
     *
     * @return Collection<int, array{label: ?string, file: string}>
     */
    public function documentList(): Collection
    {
        return collect($this->documents ?? [])
            ->filter(fn ($doc): bool => is_array($doc) && ! empty($doc['file']))
            ->values();
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('order');
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
                ->where('is_active', true)
                ->where(fn ($q) => $q
                    ->where('slug->'.$locale, $value)
                    ->orWhere('slug->tr', $value)
                    ->orWhere('slug->en', $value)
                )
                ->first();
        }

        return parent::resolveRouteBinding($value, $field);
    }
}
