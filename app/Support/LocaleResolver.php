<?php

namespace App\Support;

use App\Models\Accessory;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/**
 * Resolves the alternate-locale URL for the current route.
 *
 * Convention: TR route name `foo.bar` ↔ EN route name `en.foo.bar`.
 * Renames (e.g. `destek` ↔ `support`) are listed in $renames and applied
 * after stripping/adding the `en.` prefix.
 */
class LocaleResolver
{
    private const RENAMES = [
        'destek' => 'support',
        'aksesuarlar' => 'accessories',
        'aksesuarlar.show' => 'accessories.show',
        'arama' => 'search',
    ];

    private const PRODUCT_SLUG_ROUTES = [
        'phones.show', 'watches.show', 'headphones.show',
        'en.phones.show', 'en.watches.show', 'en.headphones.show',
    ];

    private const ACCESSORY_SLUG_ROUTES = [
        'aksesuarlar.show', 'en.accessories.show',
    ];

    public static function altUrl(?string $currentRoute, string $locale): string
    {
        $altRoute = self::altRouteName($currentRoute, $locale);
        $params = self::currentRouteParameters($currentRoute, $locale);

        try {
            return route($altRoute, $params);
        } catch (\Throwable) {
            return $locale === 'en' ? url('/') : url('/en');
        }
    }

    public static function altRouteName(?string $currentRoute, string $locale): string
    {
        $currentRoute ??= $locale === 'en' ? 'en.home' : 'home';

        return $locale === 'en'
            ? self::stripEnPrefix($currentRoute)
            : self::addEnPrefix($currentRoute);
    }

    private static function stripEnPrefix(string $name): string
    {
        $tr = str_starts_with($name, 'en.') ? substr($name, 3) : $name;

        return array_search($tr, self::RENAMES, true) ?: $tr;
    }

    private static function addEnPrefix(string $name): string
    {
        $en = self::RENAMES[$name] ?? $name;

        return 'en.'.$en;
    }

    /**
     * Pass current route parameters (slug, etc.) through to the alt-locale route.
     */
    private static function currentRouteParameters(?string $currentRoute, string $altLocale): array
    {
        $route = Route::current();
        if (! $route) {
            return [];
        }

        $params = $route->parameters();

        $params = array_map(
            fn ($v) => is_object($v) && method_exists($v, 'getRouteKey') ? $v->getRouteKey() : $v,
            $params,
        );

        if (isset($params['slug']) && is_string($params['slug']) && $currentRoute !== null) {
            $translated = self::translateSlug($currentRoute, $params['slug'], $altLocale);
            if ($translated !== null) {
                $params['slug'] = $translated;
            }
        }

        return $params;
    }

    private static function translateSlug(string $currentRoute, string $slug, string $altLocale): ?string
    {
        $currentLocale = $altLocale === 'en' ? 'tr' : 'en';

        if (in_array($currentRoute, self::PRODUCT_SLUG_ROUTES, true)) {
            $product = Product::query()
                ->where('slug->'.$currentLocale, $slug)
                ->orWhere('slug->'.$altLocale, $slug)
                ->first();

            return $product?->getTranslation('slug', $altLocale, false) ?: $product?->getTranslation('slug', $currentLocale, false);
        }

        if (in_array($currentRoute, self::ACCESSORY_SLUG_ROUTES, true)) {
            $accessory = Accessory::query()
                ->where('slug->'.$currentLocale, $slug)
                ->orWhere('slug->'.$altLocale, $slug)
                ->first();

            return $accessory?->getTranslation('slug', $altLocale, false) ?: $accessory?->getTranslation('slug', $currentLocale, false);
        }

        return null;
    }
}
