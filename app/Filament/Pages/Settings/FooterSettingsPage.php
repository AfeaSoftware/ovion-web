<?php

namespace App\Filament\Pages\Settings;

use Afea\Cms\Settings\Filament\Pages\AbstractSettingsPage;
use Afea\Cms\Settings\Settings\FooterSettings;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class FooterSettingsPage extends AbstractSettingsPage
{
    protected string $view = 'filament.pages.settings.with-spacing';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBars3BottomLeft;

    protected static ?int $navigationSort = 15;

    public static function getNavigationLabel(): string
    {
        return 'Footer Ayarları';
    }

    public function getTitle(): string
    {
        return 'Footer Ayarları';
    }

    protected function settingsClass(): string
    {
        return (string) config('afea-settings.classes.footer', FooterSettings::class);
    }

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Footer Blokları')
                ->description("Footer'da gösterilecek blokları ekleyin ve sıralayın (en fazla 10 blok)")
                ->schema([
                    Repeater::make('blocks')
                        ->hiddenLabel()
                        ->reorderable()
                        ->collapsible()
                        ->collapsed()
                        ->itemLabel(fn (array $state): ?string => $state['title_tr'] ?? null)
                        ->maxItems(10)
                        ->addActionLabel('Blok ekle')
                        ->schema([
                            Grid::make(2)->schema([
                                TextInput::make('title_tr')
                                    ->label('Blok başlığı (TR)')
                                    ->required()
                                    ->maxLength(150),
                                TextInput::make('title_en')
                                    ->label('Blok başlığı (EN)')
                                    ->maxLength(150),
                            ])->columnSpanFull(),

                            Grid::make(2)->schema([
                                TextInput::make('grid_size')
                                    ->label('Grid size')
                                    ->numeric()
                                    ->minValue(1)
                                    ->maxValue(12)
                                    ->default(2)
                                    ->required()
                                    ->helperText('Frontend grid boyutu (1-12)'),

                                TextInput::make('colspan')
                                    ->label('Colspan')
                                    ->numeric()
                                    ->minValue(1)
                                    ->maxValue(12)
                                    ->default(2)
                                    ->required()
                                    ->helperText("Frontend'de kaç kolon kaplanacak (1-12)"),
                            ]),

                            Grid::make(2)->schema([
                                Select::make('block_type')
                                    ->label('Blok tipi')
                                    ->options([
                                        'static' => 'Statik Bağlantılar',
                                        'dynamic' => 'Dinamik İçerik',
                                        'contact' => 'İletişim (Şirket Bilgileri)',
                                        'brand' => 'Marka / Açıklama',
                                    ])
                                    ->default('static')
                                    ->native(false)
                                    ->required()
                                    ->live(),

                                Select::make('model')
                                    ->label('Model')
                                    ->options([
                                        'product_phones' => 'Ürünler — Telefonlar',
                                        'product_watches' => 'Ürünler — Saatler',
                                        'product_headphones' => 'Ürünler — Kulaklıklar',
                                        'blog_posts' => 'Blog Yazıları',
                                    ])
                                    ->native(false)
                                    ->visible(fn (Get $get): bool => $get('block_type') === 'dynamic')
                                    ->required(fn (Get $get): bool => $get('block_type') === 'dynamic'),
                            ]),

                            Toggle::make('all_records')
                                ->label('Tüm Kayıtlar')
                                ->default(true)
                                ->inline(false)
                                ->live()
                                ->helperText('Açıkken tüm kayıtlar listelenir; kapalıyken kayıt sayısı alanından sınır seçilir.')
                                ->visible(fn (Get $get): bool => $get('block_type') === 'dynamic'),

                            TextInput::make('limit')
                                ->label('Kayıt sayısı')
                                ->numeric()
                                ->minValue(1)
                                ->maxValue(100)
                                ->default(5)
                                ->visible(fn (Get $get): bool => $get('block_type') === 'dynamic' && $get('all_records') === false),

                            Grid::make(2)->schema([
                                Select::make('order_field')
                                    ->label('Sıralama alanı')
                                    ->options([
                                        'order' => 'Sıra',
                                        'name' => 'Ad',
                                        'title' => 'Başlık',
                                        'created_at' => 'Oluşturma tarihi',
                                        'updated_at' => 'Güncelleme tarihi',
                                    ])
                                    ->default('order')
                                    ->native(false)
                                    ->visible(fn (Get $get): bool => $get('block_type') === 'dynamic'),

                                Select::make('order_dir')
                                    ->label('Sıralama yönü')
                                    ->options([
                                        'asc' => 'Artan',
                                        'desc' => 'Azalan',
                                    ])
                                    ->default('asc')
                                    ->native(false)
                                    ->visible(fn (Get $get): bool => $get('block_type') === 'dynamic'),
                            ]),

                            Repeater::make('links')
                                ->label('Bağlantılar')
                                ->reorderable()
                                ->defaultItems(0)
                                ->addActionLabel('Bağlantı ekle')
                                ->schema([
                                    Grid::make(2)->schema([
                                        TextInput::make('label_tr')->label('Etiket (TR)')->required()->maxLength(150),
                                        TextInput::make('label_en')->label('Etiket (EN)')->maxLength(150),
                                        TextInput::make('url_tr')->label('URL (TR)')->required()->maxLength(500),
                                        TextInput::make('url_en')->label('URL (EN)')->maxLength(500),
                                    ]),
                                ])
                                ->columnSpanFull()
                                ->visible(fn (Get $get): bool => $get('block_type') === 'static'),

                            FileUpload::make('image')
                                ->label('Marka Görseli')
                                ->helperText('PNG veya SVG önerilir. Boş bırakılırsa varsayılan Ovion logosu gösterilir.')
                                ->image()
                                ->disk('public')
                                ->directory('footer/brand')
                                ->visibility('public')
                                ->maxSize(5 * 1024)
                                ->columnSpanFull()
                                ->visible(fn (Get $get): bool => $get('block_type') === 'brand'),

                            Grid::make(2)->schema([
                                Textarea::make('description_tr')
                                    ->label('Açıklama (TR)')
                                    ->rows(3)
                                    ->maxLength(500),
                                Textarea::make('description_en')
                                    ->label('Açıklama (EN)')
                                    ->rows(3)
                                    ->maxLength(500),
                            ])
                                ->columnSpanFull()
                                ->visible(fn (Get $get): bool => $get('block_type') === 'brand'),
                        ]),
                ])
                ->collapsible(),
        ])->statePath('data');
    }
}
