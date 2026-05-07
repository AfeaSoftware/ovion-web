<?php

namespace App\Support;

use Illuminate\Support\Collection;

/**
 * Helper for resolving page content fields with translation fallback.
 *
 * Used by `@pc('key', 'ui.translation.fallback')` and `@pcRaw(...)` Blade
 * directives. Returns the DB-stored value when present, otherwise falls back
 * to the translation key (or any plain string passed as a literal).
 */
class PageContentHelper
{
    public static function text(?Collection $content, string $key, string $fallback): string
    {
        return e(self::resolve($content, $key, $fallback));
    }

    public static function raw(?Collection $content, string $key, string $fallback): string
    {
        return self::resolve($content, $key, $fallback);
    }

    private static function resolve(?Collection $content, string $key, string $fallback): string
    {
        $value = data_get($content?->all() ?? [], $key);

        if (is_string($value) && trim($value) !== '') {
            return $value;
        }

        // Looks like a translation key (contains a dot AND has a known prefix).
        if (preg_match('/^(ui|afea-|[a-z_]+)\./', $fallback)) {
            $translated = (string) __($fallback);

            return $translated === $fallback ? $fallback : $translated;
        }

        return $fallback;
    }
}
