<?php

namespace App\Support;

use Afea\Cms\Blog\Models\BlogPost;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

/**
 * Resolves FooterSettings.blocks entries into renderable structures.
 *
 * Each block dict contains:
 *   - title (string)
 *   - grid_size (1-12)        → frontend column hint
 *   - colspan (1-12)          → footer cell width
 *   - block_type              → static | dynamic | contact | brand
 *   - model (when dynamic)    → product_phones, accessories, campaigns, ...
 *   - all_records / limit     → dynamic record count
 *   - order_field / order_dir → dynamic ordering
 *   - links[]                 → static link list
 *   - description             → brand block
 *
 * Output: list of arrays with `title`, `grid_size`, `colspan`, `links` (or
 * `description` for brand). Frontend just iterates.
 */
class FooterRenderer
{
    public static function blocks(?array $rawBlocks, bool $isEnglish = false): Collection
    {
        $rawBlocks ??= [];

        return collect($rawBlocks)
            ->map(fn (array $block): ?array => self::resolve($block, $isEnglish))
            ->filter()
            ->values();
    }

    private static function resolve(array $block, bool $isEnglish): ?array
    {
        $gridSize = (int) ($block['grid_size'] ?? 2);
        $colspan = (int) ($block['colspan'] ?? 2);
        $type = $block['block_type'] ?? 'static';

        $base = [
            'title' => self::localized($block, 'title', $isEnglish),
            'grid_size' => $gridSize,
            'colspan' => $colspan,
            'type' => $type,
        ];

        return match ($type) {
            'static' => $base + ['links' => self::staticLinks($block['links'] ?? [], $isEnglish)],
            'dynamic' => $base + ['links' => self::dynamicLinks($block, $isEnglish)],
            'brand' => $base + [
                'description' => self::localized($block, 'description', $isEnglish),
                'image' => $block['image'] ?? null,
            ],
            'contact' => $base + ['contact' => true],
            default => null,
        };
    }

    /**
     * Resolves a possibly bilingual field. Supports locale-specific values under
     * `{$key}_tr` / `{$key}_en` and falls back to a legacy single-string `$key`.
     *
     * @param  array<string, mixed>  $data
     */
    private static function localized(array $data, string $key, bool $isEnglish): string
    {
        $primary = $isEnglish ? ($data["{$key}_en"] ?? null) : ($data["{$key}_tr"] ?? null);
        $secondary = $isEnglish ? ($data["{$key}_tr"] ?? null) : ($data["{$key}_en"] ?? null);
        $legacy = is_string($data[$key] ?? null) ? $data[$key] : null;

        foreach ([$primary, $secondary, $legacy] as $candidate) {
            if (is_string($candidate) && $candidate !== '') {
                return $candidate;
            }
        }

        return '';
    }

    /**
     * @param  array<int, array<string, mixed>>  $rawLinks
     * @return array<int, array{label: string, url: string}>
     */
    private static function staticLinks(array $rawLinks, bool $isEnglish): array
    {
        return collect($rawLinks)
            ->filter(fn ($link) => is_array($link))
            ->map(fn (array $link): array => [
                'label' => self::localized($link, 'label', $isEnglish),
                'url' => self::localized($link, 'url', $isEnglish),
            ])
            ->filter(fn (array $link): bool => $link['label'] !== '' && $link['url'] !== '')
            ->values()
            ->all();
    }

    /**
     * @return array<int, array{label: string, url: string}>
     */
    private static function dynamicLinks(array $block, bool $isEnglish): array
    {
        $model = $block['model'] ?? null;
        $allRecords = $block['all_records'] ?? true;
        $limit = (int) ($block['limit'] ?? 5);
        $orderField = $block['order_field'] ?? 'order';
        $orderDir = $block['order_dir'] ?? 'asc';

        $query = self::queryFor($model);
        if ($query === null) {
            return [];
        }

        $query->orderBy($orderField, $orderDir);

        if (! $allRecords) {
            $query->limit($limit);
        }

        return $query->get()
            ->map(fn ($record) => self::mapToLink($record, $model, $isEnglish))
            ->filter()
            ->values()
            ->all();
    }

    private static function queryFor(?string $model): ?Builder
    {
        return match ($model) {
            'product_phones' => Product::query()->active()->ofType('phone'),
            'product_watches' => Product::query()->active()->ofType('watch'),
            'product_headphones' => Product::query()->active()->ofType('headphone'),
            'blog_posts' => BlogPost::query()->published(),
            default => null,
        };
    }

    /**
     * @return array{label: string, url: string}|null
     */
    private static function mapToLink($record, ?string $model, bool $isEnglish): ?array
    {
        $prefix = $isEnglish ? 'en.' : '';

        return match ($model) {
            'product_phones' => [
                'label' => $record->name,
                'url' => route("{$prefix}phones.show", ['slug' => $record->slug]),
            ],
            'product_watches' => [
                'label' => $record->name,
                'url' => route("{$prefix}watches.show", ['slug' => $record->slug]),
            ],
            'product_headphones' => [
                'label' => $record->name,
                'url' => route("{$prefix}headphones.show", ['slug' => $record->slug]),
            ],
            'blog_posts' => [
                'label' => $record->title,
                'url' => method_exists($record, 'publicUrl') ? $record->publicUrl() : '#',
            ],
            default => null,
        };
    }
}
