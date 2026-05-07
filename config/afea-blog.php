<?php

declare(strict_types=1);

use Afea\Cms\Blog\Http\Controllers\BlogController;
use Afea\Cms\Blog\Models\BlogPost;
use Afea\Cms\Blog\Models\Category;
use Afea\Cms\Blog\Models\Tag;
use App\Models\User;

return [

    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    |
    | Extend any shipped model and bind the subclass here to customize
    | behavior without forking the package.
    |
    */

    'models' => [
        'blog_post' => BlogPost::class,
        'category' => Category::class,
        'tag' => Tag::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | User model
    |--------------------------------------------------------------------------
    |
    | The Authenticatable model used as the blog post author. Defaults to the
    | standard Laravel User model.
    |
    */

    'user_model' => User::class,

    /*
    |--------------------------------------------------------------------------
    | Routing
    |--------------------------------------------------------------------------
    |
    | Public URL strategy — one of:
    |   slug       -> /{slug}         (site root, low-priority)
    |   resource   -> /{prefix}/{slug} (default)
    |   localized  -> /{locale}/{prefix}/{slug}
    |
    */

    'routing_strategy' => env('AFEA_BLOG_ROUTING_STRATEGY', 'resource'),
    'prefix' => env('AFEA_BLOG_PREFIX', 'blog'),
    'middleware' => ['web'],
    'controller' => BlogController::class,
    'locale_pattern' => '[a-z]{2}',

    /*
    |--------------------------------------------------------------------------
    | Views
    |--------------------------------------------------------------------------
    |
    | The Blade views rendered by the shipped controller. Publish the package
    | views (`--tag=afea-blog-views`) and point here at your own templates
    | for a custom theme.
    |
    */

    'views' => [
        'index' => 'afea-blog::index',
        'show' => 'afea-blog::show',
    ],

    /*
    |--------------------------------------------------------------------------
    | Media
    |--------------------------------------------------------------------------
    */

    'media' => [
        'disk' => env('AFEA_BLOG_MEDIA_DISK', null),
        'thumbnail_collection' => 'blog-posts/thumbnails',
        'preview_size' => [300, 300],
    ],

    /*
    |--------------------------------------------------------------------------
    | Filament
    |--------------------------------------------------------------------------
    */

    'filament' => [
        'navigation_group' => 'Content',
        'navigation_sort' => 8,

        /*
        | Taxonomy resources (categories & tags) are hidden from the sidebar
        | by default — they are usually managed through the blog post form.
        | Flip these to `true` to pin them as top-level items.
        */
        'categories_in_navigation' => false,
        'tags_in_navigation' => false,
    ],

];
