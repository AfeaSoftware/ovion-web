<?php

declare(strict_types=1);

use Afea\Cms\Partners\Models\Partner;
use Afea\Cms\Partners\Models\Reference;

return [

    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    */

    'models' => [
        'partner' => Partner::class,
        'reference' => Reference::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Media
    |--------------------------------------------------------------------------
    |
    | Single logo per record, stored on the configured disk.
    |
    */

    'media' => [
        'disk' => env('AFEA_PARTNERS_MEDIA_DISK', null),
        'partner_logo_collection' => 'partners/logos',
        'reference_logo_collection' => 'references/logos',
    ],

    /*
    |--------------------------------------------------------------------------
    | Filament
    |--------------------------------------------------------------------------
    */

    'filament' => [
        'navigation_group' => 'Corporate',
        'navigation_sort' => 10,
    ],

];
