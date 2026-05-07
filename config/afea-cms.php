<?php

declare(strict_types=1);

use Afea\Cms\Core\Filament\RichContent\Blocks\YoutubeBlock;
use Afea\Cms\Core\Models\Form;
use Afea\Cms\Core\Models\FormQuestion;
use Afea\Cms\Core\Models\FormQuestionOption;
use Afea\Cms\Core\Models\FormSubmission;
use Afea\Cms\Core\Models\FormSubmissionAnswer;
use Afea\Cms\Core\Models\SeoMetadata;

return [

    /*
    |--------------------------------------------------------------------------
    | Filament panel
    |--------------------------------------------------------------------------
    |
    | The id of the Filament panel that CMS modules should register their
    | plugins into. Override in application config to target a different
    | panel (e.g. 'cms' vs 'admin').
    |
    */

    'panel' => 'admin',

    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    |
    | Every model shipped by the core package can be swapped with an
    | application-level subclass. Extend the shipped class, bind it here
    | and the package will resolve your model everywhere.
    |
    */

    'models' => [
        'seo_metadata' => SeoMetadata::class,
        'form' => Form::class,
        'form_question' => FormQuestion::class,
        'form_question_option' => FormQuestionOption::class,
        'form_submission' => FormSubmission::class,
        'form_submission_answer' => FormSubmissionAnswer::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Media
    |--------------------------------------------------------------------------
    |
    | Default disk used by Spatie media collections across modules. Individual
    | modules may override this via their own configuration.
    |
    */

    'media' => [
        'disk' => env('AFEA_CMS_MEDIA_DISK', 'public'),
        'private_disk' => env('AFEA_CMS_PRIVATE_DISK', 'local'),
    ],

    /*
    |--------------------------------------------------------------------------
    | SEO
    |--------------------------------------------------------------------------
    */

    'seo' => [
        'sitemap_cache_key' => 'sitemap:urls',
    ],

    /*
    |--------------------------------------------------------------------------
    | Forms
    |--------------------------------------------------------------------------
    |
    | File uploads captured through submissions are stored on this disk by
    | default. Recipients receive temporary URLs with the configured TTL.
    |
    */

    'forms' => [
        'submissions_disk' => env('AFEA_CMS_SUBMISSIONS_DISK', 'local'),
        'temporary_url_ttl_minutes' => 60,
    ],

    /*
    |--------------------------------------------------------------------------
    | Rich content
    |--------------------------------------------------------------------------
    |
    | Custom blocks available inside every `Filament\Forms\Components\RichEditor`
    | across CMS modules. Modules read this list to configure their editors,
    | so adding a block here enables it everywhere at once.
    |
    */

    'rich_content' => [
        'blocks' => [
            YoutubeBlock::class,
        ],
    ],

];
