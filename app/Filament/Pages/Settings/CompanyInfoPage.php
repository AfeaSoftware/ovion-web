<?php

namespace App\Filament\Pages\Settings;

use Afea\Cms\Settings\Filament\Pages\AbstractSettingsPage;
use Afea\Cms\Settings\Settings\CompanySettings;
use BackedEnum;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class CompanyInfoPage extends AbstractSettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice2;

    protected static ?int $navigationSort = 5;

    public static function getNavigationLabel(): string
    {
        return 'Şirket Bilgileri';
    }

    public function getTitle(): string
    {
        return 'Şirket Bilgileri';
    }

    protected function settingsClass(): string
    {
        return (string) config('afea-settings.classes.company', CompanySettings::class);
    }

    public function mount(): void
    {
        $settings = app($this->settingsClass());
        $data = $settings->toArray();

        $data['working_hours'] = self::ensureWeekDays($data['working_hours'] ?? []);

        $this->form->fill($data);
    }

    /**
     * @param  array<int, array{day?: string, is_open?: bool, open_time?: ?string, close_time?: ?string}>  $existing
     * @return array<int, array{day: string, is_open: bool, open_time: ?string, close_time: ?string}>
     */
    private static function ensureWeekDays(array $existing): array
    {
        $weekdays = [
            'Pazartesi',
            'Salı',
            'Çarşamba',
            'Perşembe',
            'Cuma',
            'Cumartesi',
            'Pazar',
        ];

        $byDay = [];
        foreach ($existing as $row) {
            if (! empty($row['day'])) {
                $byDay[$row['day']] = $row;
            }
        }

        $output = [];
        foreach ($weekdays as $day) {
            $output[] = [
                'day' => $day,
                'is_open' => $byDay[$day]['is_open'] ?? (! in_array($day, ['Cumartesi', 'Pazar'], true)),
                'open_time' => $byDay[$day]['open_time'] ?? '09:00',
                'close_time' => $byDay[$day]['close_time'] ?? '18:00',
            ];
        }

        return $output;
    }

    public function form(Schema $schema): Schema
    {
        return $schema->components([

            Section::make('İletişim Bilgileri')
                ->description('İletişim için gerekli bilgiler')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('email')
                            ->label('E-posta')
                            ->email()
                            ->prefixIcon(Heroicon::OutlinedEnvelope)
                            ->maxLength(255),

                        TextInput::make('phone')
                            ->label('Telefon')
                            ->tel()
                            ->prefix('🇹🇷')
                            ->placeholder('0501 234 56 78')
                            ->maxLength(50),

                        TextInput::make('whatsapp')
                            ->label('WhatsApp Hattı')
                            ->tel()
                            ->prefix('🇹🇷')
                            ->placeholder('0501 234 56 78')
                            ->maxLength(50),

                        TextInput::make('address_street')
                            ->label('Adres')
                            ->prefixIcon(Heroicon::OutlinedMapPin)
                            ->maxLength(255),

                        TextInput::make('address_city')
                            ->label('Şehir')
                            ->maxLength(100),

                        TextInput::make('address_district')
                            ->label('İlçe')
                            ->maxLength(100),

                        TextInput::make('address_postal_code')
                            ->label('Posta Kodu')
                            ->maxLength(20),

                        TextInput::make('address_country')
                            ->label('Ülke')
                            ->default('Türkiye')
                            ->maxLength(100),
                    ]),
                ])
                ->collapsible(),

            Section::make('Çalışma Saatleri')
                ->description('Haftalık çalışma saatleri')
                ->schema([
                    Repeater::make('working_hours')
                        ->hiddenLabel()
                        ->schema([
                            TextInput::make('day')
                                ->label('Gün')
                                ->disabled()
                                ->dehydrated(),
                            Toggle::make('is_open')
                                ->label('Durum')
                                ->inline(false),
                            TimePicker::make('open_time')
                                ->label('Açılış')
                                ->seconds(false)
                                ->displayFormat('H:i'),
                            TimePicker::make('close_time')
                                ->label('Kapanış')
                                ->seconds(false)
                                ->displayFormat('H:i'),
                        ])
                        ->columns(4)
                        ->reorderable(false)
                        ->addable(false)
                        ->deletable(false)
                        ->collapsible(false),
                ])
                ->collapsible(),

            Section::make('Konum')
                ->description('Harita ve koordinat bilgileri')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('location_latitude')
                            ->label('Enlem')
                            ->numeric(),
                        TextInput::make('location_longitude')
                            ->label('Boylam')
                            ->numeric(),
                    ]),
                    TextInput::make('location_map_link')
                        ->label('Harita Linki')
                        ->url()
                        ->columnSpanFull(),
                    TextInput::make('location_iframe_url')
                        ->label('Embed URL')
                        ->url()
                        ->columnSpanFull(),
                ])
                ->collapsible()
                ->collapsed(),

            Section::make('Sosyal Ağlar')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('social_facebook')->label('Facebook')->url()->prefixIcon(Heroicon::OutlinedGlobeAlt),
                        TextInput::make('social_twitter')->label('Twitter / X')->url()->prefixIcon(Heroicon::OutlinedGlobeAlt),
                        TextInput::make('social_instagram')->label('Instagram')->url()->prefixIcon(Heroicon::OutlinedGlobeAlt),
                        TextInput::make('social_linkedin')->label('LinkedIn')->url()->prefixIcon(Heroicon::OutlinedGlobeAlt),
                        TextInput::make('social_youtube')->label('YouTube')->url()->prefixIcon(Heroicon::OutlinedGlobeAlt),
                    ]),
                ])
                ->collapsible()
                ->collapsed(),

            Section::make('Yasal Bilgiler')
                ->schema([
                    Grid::make(3)->schema([
                        TextInput::make('legal_name')->label('Ünvan')->maxLength(255),
                        TextInput::make('tax_number')->label('Vergi No')->maxLength(50),
                        TextInput::make('registration_number')->label('Sicil No')->maxLength(50),
                    ]),
                ])
                ->collapsible()
                ->collapsed(),

        ])->statePath('data');
    }
}
