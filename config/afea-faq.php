<?php

declare(strict_types=1);

use Afea\Cms\Faq\Models\Faq;
use Afea\Cms\Faq\Models\FaqCategory;

return [

    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    */

    'models' => [
        'faq' => Faq::class,
        'faq_category' => FaqCategory::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Filament
    |--------------------------------------------------------------------------
    */

    'filament' => [
        'navigation_group' => 'İçerik',
        'navigation_sort' => 7,

        /*
        | FAQ categories are hidden from the sidebar by default — they are
        | usually managed through the FAQ form. Flip to `true` to pin them
        | as a top-level item.
        */
        'categories_in_navigation' => false,
    ],

];
