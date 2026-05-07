<?php

declare(strict_types=1);

use Afea\Cms\Settings\Settings\CompanySettings;
use Afea\Cms\Settings\Settings\FooterSettings;
use Afea\Cms\Settings\Settings\MailingSettings;
use Afea\Cms\Settings\Settings\NotificationSettings;
use Afea\Cms\Settings\Settings\SiteSettings;

return [

    /*
    |--------------------------------------------------------------------------
    | Enabled settings groups
    |--------------------------------------------------------------------------
    |
    | Disable groups you don't want to ship. Each maps to a Filament page
    | inside the Settings cluster. Set to `false` to exclude both the page
    | and the migration from loading.
    |
    */

    'groups' => [
        'company' => false,
        'site' => true,
        'footer' => false,
        'mailing' => true,
        'notification' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings classes
    |--------------------------------------------------------------------------
    |
    | Override with a subclass to extend any shipped Settings group.
    |
    */

    'classes' => [
        'company' => CompanySettings::class,
        'site' => SiteSettings::class,
        'footer' => FooterSettings::class,
        'mailing' => MailingSettings::class,
        'notification' => NotificationSettings::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Filament
    |--------------------------------------------------------------------------
    */

    'filament' => [
        'cluster_label' => 'Ayarlar',
        'cluster_navigation_group' => 'Sistem Ayarları',
        'cluster_navigation_sort' => 100,
    ],

];
