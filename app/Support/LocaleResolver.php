<?php

namespace App\Support;

use Illuminate\Support\Facades\App;
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
        'destek'      => 'support',
        'aksesuarlar' => 'accessories',
    ];

    public static function altUrl(?string $currentRoute, string $locale): string
    {
        $altRoute = self::altRouteName($currentRoute, $locale);

        try {
            return route($altRoute);
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

        return 'en.' . $en;
    }
}
