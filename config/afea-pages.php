<?php

declare(strict_types=1);

use Afea\Cms\Pages\Http\Controllers\PageController;
use Afea\Cms\Pages\Models\CustomPage;

return [

    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    */

    'models' => [
        'custom_page' => CustomPage::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Routing
    |--------------------------------------------------------------------------
    |
    | Public URL strategy. `slug` is a natural fit for marketing-style URLs
    | (/about, /contact). `resource` keeps them under a prefix (/pages/about).
    |
    */

    'routing_strategy' => env('AFEA_PAGES_ROUTING_STRATEGY', 'slug'),
    'prefix' => env('AFEA_PAGES_PREFIX', 'pages'),
    'middleware' => ['web'],
    'controller' => PageController::class,
    'locale_pattern' => '[a-z]{2}',

    /*
    |--------------------------------------------------------------------------
    | Views
    |--------------------------------------------------------------------------
    */

    'views' => [
        'show' => 'afea-pages::show',
    ],

    /*
    |--------------------------------------------------------------------------
    | Table of contents
    |--------------------------------------------------------------------------
    |
    | Tags the TOC extractor scans. Order matters — `h2` first, `h3` nested.
    |
    */

    'toc' => [
        'tags' => ['h2', 'h3'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Filament
    |--------------------------------------------------------------------------
    */

    'filament' => [
        'navigation_group' => 'İçerik',
        'navigation_sort' => 4,
    ],

];
