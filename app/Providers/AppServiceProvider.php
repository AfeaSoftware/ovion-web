<?php

namespace App\Providers;

use App\Support\LocaleResolver;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        View::composer('*', function ($view) {
            $locale = App::getLocale();
            $altUrl = LocaleResolver::altUrl(Route::currentRouteName(), $locale);

            $view->with(['locale' => $locale, 'altUrl' => $altUrl]);
        });
    }
}
