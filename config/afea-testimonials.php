<?php

declare(strict_types=1);

use Afea\Cms\Testimonials\Models\Testimonial;

return [

    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    */

    'models' => [
        'testimonial' => Testimonial::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Media
    |--------------------------------------------------------------------------
    |
    | Collections: `thumbnail_collection` holds a single portrait photo per
    | testimonial. `video_collection` holds an optional video file. Both
    | honor the configured disk.
    |
    */

    'media' => [
        'disk' => env('AFEA_TESTIMONIALS_MEDIA_DISK', null),
        'thumbnail_collection' => 'testimonials/thumbnails',
        'video_collection' => 'testimonials/videos',
        'preview_size' => [300, 300],
        'video_max_kb' => 50_000,
        'video_mime_types' => ['video/mp4', 'video/avi', 'video/mov', 'video/wmv', 'video/webm'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Filament
    |--------------------------------------------------------------------------
    */

    'filament' => [
        'navigation_group' => 'Content',
        'navigation_sort' => 6,
    ],

];
