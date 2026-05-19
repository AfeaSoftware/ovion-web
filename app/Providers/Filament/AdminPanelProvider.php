<?php

namespace App\Providers\Filament;

use Afea\Cms\Blog\Filament\BlogPlugin;
use Afea\Cms\Faq\Filament\FaqPlugin;
use Afea\Cms\Popup\Filament\PopupPlugin;
use Afea\Cms\Testimonials\Filament\TestimonialsPlugin;
use App\Filament\Pages\Settings\CompanyInfoPage;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\AccountWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->brandName('Ovion')
            ->login()
            ->userMenuItems([
                'settings' => MenuItem::make()
                    ->label('Ayarlar')
                    ->icon(Heroicon::OutlinedCog6Tooth)
                    ->url(fn (): string => CompanyInfoPage::getUrl()),
            ])
            ->colors([
                'primary' => Color::Slate,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->discoverClusters(
                in: base_path('vendor/afea/filament-settings/src/Filament/Clusters'),
                for: 'Afea\Cms\Settings\Filament\Clusters',
            )
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                ValidateCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->plugin(BlogPlugin::make())
            ->plugin(PopupPlugin::make())
            ->plugin(FaqPlugin::make())
            ->plugin(TestimonialsPlugin::make());
    }
}
