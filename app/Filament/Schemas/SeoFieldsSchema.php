<?php

declare(strict_types=1);

namespace App\Filament\Schemas;

use Afea\Cms\Core\Filament\Schemas\SeoSchema;
use App\Filament\Concerns\SyncsSeoSlugFromSlug;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

/**
 * SEO form fields WITHOUT the slug field.
 *
 * The vendor {@see SeoSchema} ships a required
 * `seo_slug` input. We intentionally drop it: each resource owns a single
 * dynamic `slug` field next to its title, and that value is mirrored into the
 * SEO metadata slug on save via {@see SyncsSeoSlugFromSlug}.
 */
final class SeoFieldsSchema
{
    /**
     * @return array<int, Component|Field>
     */
    public static function make(): array
    {
        return [
            TextInput::make('seo_title')
                ->label(__('afea-cms::seo.title'))
                ->maxLength(255),

            Textarea::make('seo_description')
                ->label(__('afea-cms::seo.description_field'))
                ->rows(3)
                ->maxLength(500),

            Textarea::make('seo_keywords')
                ->label(__('afea-cms::seo.keywords'))
                ->rows(2),

            TextInput::make('seo_canonical')
                ->label(__('afea-cms::seo.canonical'))
                ->url()
                ->maxLength(255),

            Checkbox::make('seo_noindex')
                ->label(__('afea-cms::seo.noindex'))
                ->default(false),
        ];
    }
}
