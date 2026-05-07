<?php

namespace App\Providers;

use Afea\Cms\Popup\Models\Popup;
use Afea\Cms\Settings\Settings\CompanySettings;
use Afea\Cms\Settings\Settings\FooterSettings;
use App\Support\LocaleResolver;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $existing = (array) config('settings.settings', []);
        $additions = [FooterSettings::class, CompanySettings::class];

        foreach ($additions as $class) {
            if (! in_array($class, $existing, true)) {
                $existing[] = $class;
            }
        }

        config(['settings.settings' => array_values($existing)]);
    }

    public function boot(): void
    {
        View::addNamespace('afea-settings', [
            resource_path('views/vendor/afea-settings'),
            base_path('vendor/afea/filament-settings/resources/views'),
        ]);

        Blade::directive('pc', function (string $expression): string {
            return "<?php echo \\App\\Support\\PageContentHelper::text(\$content ?? null, {$expression}); ?>";
        });

        Blade::directive('pcRaw', function (string $expression): string {
            return "<?php echo \\App\\Support\\PageContentHelper::raw(\$content ?? null, {$expression}); ?>";
        });

        View::composer('*', function ($view) {
            $locale = App::getLocale();
            $altUrl = LocaleResolver::altUrl(Route::currentRouteName(), $locale);

            $view->with(['locale' => $locale, 'altUrl' => $altUrl]);
        });

        View::composer('main', function ($view) {
            try {
                $path = request()->getPathInfo();
                $popups = Popup::active()
                    ->orderBy('order')
                    ->get()
                    ->filter(fn (Popup $popup) => $popup->matchesPath($path))
                    ->values();
            } catch (\Throwable) {
                $popups = collect();
            }

            $view->with('popups', $popups);
        });
    }
}
