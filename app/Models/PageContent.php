<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class PageContent extends Model
{
    protected $fillable = [
        'type',
        'locale',
        'content',
    ];

    protected function casts(): array
    {
        return [
            'content' => 'array',
        ];
    }

    public static function contentFor(string $type, string $locale): Collection
    {
        $record = static::query()
            ->where('type', $type)
            ->where('locale', $locale)
            ->first();

        return collect($record?->content ?? []);
    }

    public static function existsFor(string $type, string $locale): bool
    {
        return static::query()
            ->where('type', $type)
            ->where('locale', $locale)
            ->exists();
    }
}
