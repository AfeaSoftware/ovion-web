<?php

namespace App\Filament\Concerns;

use Illuminate\Database\Eloquent\Model;

/**
 * Mirrors the model's primary-locale `slug` into the SEO metadata slug.
 *
 * The SEO section no longer renders its own slug field, but the underlying
 * `seo_metadata.slug` column is required and unique. This concern keeps it
 * populated automatically from the single slug managed next to the title, so
 * there is exactly one slug per record and saving never fails on an empty
 * SEO slug. Requires {@see HasTranslatableForm} for locale resolution.
 */
trait SyncsSeoSlugFromSlug
{
    /**
     * @param  array<string, mixed>  $data
     */
    protected function syncSeoSlugFromData(array $data): void
    {
        $slug = $this->resolveSeoSlug($data);

        if (is_string($slug) && $slug !== '') {
            $this->data['seo_slug'] = $slug;
        }
    }

    /**
     * Resolve the slug to persist as the SEO slug, always preferring the
     * primary (default) locale so the canonical SEO slug stays stable when
     * editing a secondary locale.
     *
     * @param  array<string, mixed>  $data
     */
    protected function resolveSeoSlug(array $data): ?string
    {
        $primaryLocale = $this->getDefaultActiveLocale();
        $activeLocale = $this->activeLocale ?? $primaryLocale;

        $dataSlug = is_string($data['slug'] ?? null) ? $data['slug'] : null;

        if ($activeLocale === $primaryLocale) {
            return $dataSlug;
        }

        $record = method_exists($this, 'getRecord') ? $this->getRecord() : null;

        $primarySlug = $record instanceof Model
            ? $record->getTranslation('slug', $primaryLocale, false)
            : null;

        return is_string($primarySlug) && $primarySlug !== '' ? $primarySlug : $dataSlug;
    }
}
