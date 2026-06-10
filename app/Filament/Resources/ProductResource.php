<?php

namespace App\Filament\Resources;

use Afea\Cms\Core\Filament\Schemas\SeoSchema;
use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers\AccessoriesRelationManager;
use App\Models\Product;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static string|\UnitEnum|null $navigationGroup = 'Ürün Yönetimi';

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedDevicePhoneMobile;

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getNavigationLabel(): string
    {
        return 'Ürünler';
    }

    public static function getModelLabel(): string
    {
        return 'Ürün';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Ürünler';
    }

    // ─────────────────────────────────────────────────────────────────────────
    // Helpers
    // ─────────────────────────────────────────────────────────────────────────

    protected static function isSecondaryLocale(mixed $livewire): bool
    {
        $locale = is_object($livewire) && property_exists($livewire, 'activeLocale')
            ? $livewire->activeLocale
            : null;

        return $locale !== null && $locale !== 'tr';
    }

    /**
     * @return array<string, string>
     */
    public static function typeOptions(): array
    {
        return [
            'phone' => 'Telefon',
            'watch' => 'Akıllı Saat',
            'headphone' => 'Kulaklık',
        ];
    }

    /**
     * Eyebrow + title + description trio used by every billboard / split block.
     *
     * @return array<int, mixed>
     */
    private static function sectionTextBlock(string $path): array
    {
        return [
            Grid::make(2)->schema([
                TextInput::make("{$path}.eyebrow")
                    ->label('Üst Etiket (Eyebrow)')
                    ->maxLength(150)
                    ->columnSpan(1),

                TextInput::make("{$path}.title")
                    ->label('Başlık')
                    ->helperText('HTML kullanılabilir (örn: <br/>).')
                    ->maxLength(500)
                    ->columnSpan(1),
            ]),
        ];
    }

    /**
     * Sub-headings shown above a card grid / list (eyebrow + title).
     *
     * @return array<int, mixed>
     */
    private static function subHeading(string $path, string $label): array
    {
        return [
            Grid::make(2)->schema([
                TextInput::make("{$path}.eyebrow")
                    ->label("{$label} — Üst Etiket")
                    ->maxLength(150),

                TextInput::make("{$path}.title")
                    ->label("{$label} — Başlık")
                    ->helperText('HTML kullanılabilir.')
                    ->maxLength(500),
            ]),
        ];
    }

    private static function featureList(string $path, int $max = 6): Repeater
    {
        return Repeater::make("{$path}.items")
            ->label('Liste Maddeleri')
            ->reorderable()
            ->collapsed()
            ->itemLabel(fn (array $state): ?string => $state['text'] ?? null)
            ->defaultItems(0)
            ->maxItems(6)
            ->addActionLabel('Madde Ekle')
            ->schema([
                TextInput::make('text')
                    ->label('Madde')
                    ->required()
                    ->maxLength(255),
            ])
            ->columnSpanFull();
    }

    /**
     * @return array<string, string>
     */
    private static function iconOptions(): array
    {
        return [
            'bolt' => 'Bolt',
            'star' => 'Star',
            'camera' => 'Camera',
            'battery' => 'Battery',
            'heart' => 'Heart',
            'shield' => 'Shield',
            'eye' => 'Eye',
            'wifi' => 'WiFi',
            'music' => 'Music',
            'clock' => 'Clock',
            'moon' => 'Moon',
            'mic' => 'Mic',
            'globe' => 'Globe',
            'cpu' => 'CPU',
            'headphone' => 'Headphone',
            'drop' => 'Drop',
            'speaker' => 'Speaker',
        ];
    }

    private static function featureCards(string $path, int $max = 6): Repeater
    {
        return Repeater::make("{$path}.cards")
            ->label('Özellik Kartları')
            ->reorderable()
            ->collapsed()
            ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
            ->defaultItems(0)
            ->maxItems($max)
            ->addActionLabel('Kart Ekle')
            ->schema([
                Grid::make(2)->schema([
                    Select::make('icon')
                        ->label('İkon')
                        ->options(self::iconOptions())
                        ->placeholder('Seç…')
                        ->searchable(),

                    TextInput::make('metric')
                        ->label('Metrik / Büyük Değer')
                        ->helperText('örn: 50 MP   ya da   30 saat')
                        ->maxLength(60),
                ]),

                TextInput::make('title')
                    ->label('Başlık')
                    ->required()
                    ->maxLength(150),

                Textarea::make('description')
                    ->label('Açıklama')
                    ->rows(2)
                    ->maxLength(500),
            ])
            ->columnSpanFull();
    }

    private static function statRow(string $path, int $max = 4): Repeater
    {
        return Repeater::make("{$path}.stats")
            ->label('İstatistikler')
            ->reorderable()
            ->collapsed()
            ->itemLabel(fn (array $state): ?string => $state['label'] ?? null)
            ->defaultItems(0)
            ->maxItems($max)
            ->addActionLabel('İstatistik Ekle')
            ->schema([
                Grid::make(2)->schema([
                    TextInput::make('value')->label('Değer')->required()->maxLength(60),
                    TextInput::make('label')->label('Açıklama')->required()->maxLength(150),
                ]),
            ])
            ->columnSpanFull();
    }

    private static function imageUpload(string $collection, ?string $hint = null, bool $multiple = false): SpatieMediaLibraryFileUpload
    {
        $field = SpatieMediaLibraryFileUpload::make($collection.'_upload')
            ->hiddenLabel()
            ->collection($collection)
            ->disk('public')
            ->visibility('public')
            ->image()
            ->imageEditor()
            ->optimize('webp')
            ->maxSize(50 * 1024)
            ->columnSpanFull();

        if ($hint) {
            $field->helperText($hint);
        }

        if ($multiple) {
            $field->multiple()->reorderable()->maxFiles(20);
        }

        return $field;
    }

    // ─────────────────────────────────────────────────────────────────────────
    // Form
    // ─────────────────────────────────────────────────────────────────────────

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Grid::make(1)->schema([

                // ── 1. Ürün Kimliği ─────────────────────────────────────
                Section::make('Ürün Kimliği')
                    ->description('Tip, ad ve görünürlük ayarları.')
                    ->schema([
                        Grid::make(3)->schema([
                            Select::make('type')
                                ->label('Ürün Tipi')
                                ->options(self::typeOptions())
                                ->required()
                                ->native(false)
                                ->live()
                                ->disabled(fn ($livewire): bool => self::isSecondaryLocale($livewire))
                                ->columnSpan(1),

                            TextInput::make('order')
                                ->label('Sıra')
                                ->numeric()
                                ->default(0)
                                ->disabled(fn ($livewire): bool => self::isSecondaryLocale($livewire))
                                ->columnSpan(1),

                            Toggle::make('is_active')
                                ->label('Aktif')
                                ->default(true)
                                ->inline(false)
                                ->disabled(fn ($livewire): bool => self::isSecondaryLocale($livewire))
                                ->columnSpan(1),
                        ]),

                        Toggle::make('is_spotlight')
                            ->label('Öne Çıkan')
                            ->helperText('Anasayfa "Tüm Ürünler" showcase bölümünde büyük kart olarak en başta gösterilir. Aynı anda yalnızca 1 ürün öne çıkarılabilir; bu seçildiğinde diğeri otomatik kapanır.')
                            ->default(false)
                            ->inline(false)
                            ->disabled(fn ($livewire): bool => self::isSecondaryLocale($livewire))
                            ->columnSpanFull(),

                        TextInput::make('name')
                            ->label('Ürün Adı')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (?string $state, callable $set): void {
                                if (! is_string($state) || $state === '') {
                                    return;
                                }

                                $slug = Str::slug($state);
                                $set('slug', $slug);
                                $set('seo_slug', $slug);
                            })
                            ->columnSpanFull(),

                        Hidden::make('slug'),
                    ]),

                // ── 2. Anasayfa "Tüm Ürünler" Kart Görseli ──────────────
                Section::make('Anasayfa "Tüm Ürünler" Kartı')
                    ->description('Anasayfadaki "Tüm Ürünler" gridinde görünen kart. Detay sayfasındaki Hero görselinden ayrıdır — istersen farklı bir görsel yükleyebilirsin.')
                    ->schema([
                        self::imageUpload(
                            'collection_card',
                            hint: 'Önerilen: 1:1 oranında, tercihen 800×800 px veya daha büyük kare görseller. Yüklenen görsel, anasayfa kartında kırpılarak gösterilir.',
                        ),

                        Textarea::make('content.collection_card.description')
                            ->label('Kart Açıklaması')
                            ->helperText('Kart altındaki kısa açıklama (örn: 90 Hz · 50 MP AI Kamera · 5000 mAh).')
                            ->rows(2)
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ])
                    ->visible(fn (Get $get) => filled($get('type')))
                    ->collapsible(),

                // ── 3. Hero Bölümü ───────────────────────────────────────
                Section::make('Hero Bölümü')
                    ->description('Sayfanın en üstündeki ana tanıtım alanı.')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('eyebrow')
                                ->label('Üst Etiket')
                                ->helperText('örn: Yeni — 2026')
                                ->maxLength(150),

                            TextInput::make('tagline')
                                ->label('Tagline / Alt Başlık')
                                ->helperText('HTML kullanılabilir. örn: İnce. Akıllı. <br/>Türkiye\'nin.')
                                ->maxLength(500),
                        ]),

                        TextInput::make('content.hero.byline')
                            ->label('Hero Altyazı (Byline)')
                            ->helperText('Hero alanının altındaki küçük yazı. (sadece telefon)')
                            ->maxLength(255)
                            ->columnSpanFull()
                            ->visible(fn (Get $get) => $get('type') === 'phone'),

                        self::imageUpload(
                            'hero',
                            hint: 'Önerilen: 1920x1080px boyutlarında, ürünün öne çıkan özelliklerini göstermek için kullanılır. Yüklenen görsel, sayfanın üst kısmında hero alanında gösterilir.',
                        ),
                    ])
                    ->visible(fn (Get $get) => filled($get('type')))
                    ->collapsible(),

                // ── 4. Hızlı İstatistik Şeridi ──────────────────────────
                Section::make('Hızlı İstatistik Şeridi')
                    ->description('Hero altındaki küçük istatistik satırı (maks 6).')
                    ->schema([
                        Repeater::make('strip_stats')
                            ->hiddenLabel()
                            ->reorderable()
                            ->collapsed()
                            ->itemLabel(fn (array $state): ?string => $state['label'] ?? null)
                            ->defaultItems(0)
                            ->maxItems(6)
                            ->addActionLabel('İstatistik Ekle')
                            ->schema([
                                Grid::make(2)->schema([
                                    TextInput::make('value')
                                        ->label('Değer')
                                        ->required()
                                        ->maxLength(60)
                                        ->helperText('örn: 6.56″   ya da   5000 mAh'),

                                    TextInput::make('label')
                                        ->label('Açıklama')
                                        ->required()
                                        ->maxLength(150)
                                        ->helperText('örn: HD+ · 90 Hz'),
                                ]),
                            ]),
                    ])
                    ->visible(fn (Get $get) => filled($get('type')))
                    ->collapsible(),

                // ════════════════════════════════════════════════════════
                //  TELEFON (sırasıyla: Kamera → Ekran → Tasarım → Performans → Pil)
                // ════════════════════════════════════════════════════════

                Section::make('Telefon · Kamera Bölümü')
                    ->description('Billboard metni + alt kart grid.')
                    ->schema([
                        ...self::sectionTextBlock('content.camera'),

                        ...self::subHeading('content.camera_cards', 'Kamera Kartları'),
                        self::featureCards('content.camera'),
                    ])
                    ->visible(fn (Get $get) => $get('type') === 'phone')
                    ->collapsible(),

                Section::make('Telefon · Ekran Bölümü')
                    ->description('Ekran teknolojisi içerik + liste.')
                    ->schema([
                        ...self::sectionTextBlock('content.display'),
                        self::featureList('content.display'),
                    ])
                    ->visible(fn (Get $get) => $get('type') === 'phone')
                    ->collapsible(),

                Section::make('Telefon · Performans Bölümü')
                    ->description('İşlemci, RAM, şarj vb. özellik kartları.')
                    ->schema([
                        ...self::sectionTextBlock('content.performance'),
                        self::featureCards('content.performance'),
                    ])
                    ->visible(fn (Get $get) => $get('type') === 'phone')
                    ->collapsible(),

                Section::make('Telefon · Pil Bölümü')
                    ->description('Pil kapasitesi ve şarj özellik listesi.')
                    ->schema([
                        ...self::sectionTextBlock('content.battery'),
                        self::featureList('content.battery'),
                    ])
                    ->visible(fn (Get $get) => $get('type') === 'phone')
                    ->collapsible(),

                Section::make('Telefon · Tasarım (Cinema Kaydırma)')
                    ->description('Kaydırmalı 3D ürün görselleri ve slayt başlıkları.')
                    ->schema([
                        self::imageUpload('cinema', multiple: true, hint: '900×1600 px dikey görseller. Yükleme sırası slayt sırasıyla eşleşir.'),

                        Repeater::make('content.cinema.slides')
                            ->label('Slayt Başlıkları')
                            ->helperText('Görsellerle aynı sırada eşleşir.')
                            ->reorderable()
                            ->collapsed()
                            ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
                            ->defaultItems(0)
                            ->addActionLabel('Slayt Ekle')
                            ->schema([
                                Grid::make(2)->schema([
                                    TextInput::make('eyebrow')->label('Üst Etiket')->maxLength(150),
                                    TextInput::make('title')->label('Başlık')->required()->helperText('HTML kullanılabilir.')->maxLength(500),
                                ]),
                                Textarea::make('description')->label('Açıklama')->rows(2)->maxLength(500),
                            ])
                            ->columnSpanFull(),
                    ])
                    ->visible(fn (Get $get) => $get('type') === 'phone')
                    ->collapsible(),

                // ════════════════════════════════════════════════════════
                //  SAAT (sırasıyla: Sağlık → Yüzler → Tasarım → Aktivite → Pil)
                // ════════════════════════════════════════════════════════

                Section::make('Saat · Sağlık Bölümü')
                    ->description('Nabız/SpO2/uyku kart grid.')
                    ->schema([
                        ...self::sectionTextBlock('content.health'),

                        ...self::subHeading('content.health_cards', 'Sağlık Kartları'),
                        self::featureCards('content.health'),
                    ])
                    ->visible(fn (Get $get) => $get('type') === 'watch')
                    ->collapsible(),

                Section::make('Saat · Kişiselleştirme (Saat Yüzleri)')
                    ->description('Saat yüzü kartları.')
                    ->schema([
                        ...self::sectionTextBlock('content.customization'),
                        Repeater::make('content.customization.faces')
                            ->label('Saat Yüzleri')
                            ->reorderable()
                            ->collapsed()
                            ->itemLabel(fn (array $state): ?string => $state['name'] ?? null)
                            ->defaultItems(0)
                            ->addActionLabel('Saat Yüzü Ekle')
                            ->schema([
                                Grid::make(2)->schema([
                                    TextInput::make('name')->label('Yüz Adı')->required()->maxLength(150)->helperText('örn: Sport Ring'),
                                    TextInput::make('tags')->label('Etiketler')->maxLength(255)->helperText('örn: Aktivite halkaları · Kalp ritmi'),
                                ]),
                            ])
                            ->columnSpanFull(),
                    ])
                    ->visible(fn (Get $get) => $get('type') === 'watch')
                    ->collapsible(),

                Section::make('Saat · Tasarım Bölümü')
                    ->description('Kasa, kayış, ekran özellik listesi.')
                    ->schema([
                        ...self::sectionTextBlock('content.design'),
                        self::featureList('content.design'),
                    ])
                    ->visible(fn (Get $get) => $get('type') === 'watch')
                    ->collapsible(),

                Section::make('Saat · Aktivite Bölümü')
                    ->description('Spor modu sayısı, GPS, su geçirmezlik istatistikleri.')
                    ->schema([
                        ...self::sectionTextBlock('content.activity'),
                        self::statRow('content.activity'),
                    ])
                    ->visible(fn (Get $get) => $get('type') === 'watch')
                    ->collapsible(),

                Section::make('Saat · Pil Bölümü')
                    ->description('Pil ömrü, şarj listesi.')
                    ->schema([
                        ...self::sectionTextBlock('content.battery'),
                        self::featureList('content.battery'),
                    ])
                    ->visible(fn (Get $get) => $get('type') === 'watch')
                    ->collapsible(),

                // ════════════════════════════════════════════════════════
                //  KULAKLIK (sırasıyla: ANC → Ses → Tasarım → Pil → Bağlantı)
                // ════════════════════════════════════════════════════════

                Section::make('Kulaklık · ANC Bölümü')
                    ->description('Gürültü engelleme alt kart grid + dB slider.')
                    ->schema([
                        ...self::sectionTextBlock('content.anc'),

                        ...self::subHeading('content.anc_cards', 'ANC Kartları'),
                        self::featureCards('content.anc', 3),

                        TextInput::make('content.anc.db_value')
                            ->label('ANC Slider — dB Değeri')
                            ->helperText('Slider üst sınırı. örn: 38')
                            ->maxLength(10)
                            ->columnSpanFull(),
                    ])
                    ->visible(fn (Get $get) => $get('type') === 'headphone')
                    ->collapsible(),

                Section::make('Kulaklık · Ses Kalitesi Bölümü')
                    ->description('Sürücü, frekans, codec özellik listesi.')
                    ->schema([
                        ...self::sectionTextBlock('content.sound'),
                        self::featureList('content.sound'),
                    ])
                    ->visible(fn (Get $get) => $get('type') === 'headphone')
                    ->collapsible(),

                Section::make('Kulaklık · Tasarım Bölümü')
                    ->description('Ergonomi, ağırlık, malzeme listesi.')
                    ->schema([
                        ...self::sectionTextBlock('content.design'),
                        self::featureList('content.design'),
                    ])
                    ->visible(fn (Get $get) => $get('type') === 'headphone')
                    ->collapsible(),

                Section::make('Kulaklık · Pil Bölümü')
                    ->description('Pil süresi ve şarj istatistikleri.')
                    ->schema([
                        ...self::sectionTextBlock('content.battery'),
                        self::statRow('content.battery'),
                    ])
                    ->visible(fn (Get $get) => $get('type') === 'headphone')
                    ->collapsible(),

                Section::make('Kulaklık · Bağlantı Bölümü')
                    ->description('Bluetooth, multipoint, USB-C kart grid.')
                    ->schema([
                        ...self::sectionTextBlock('content.connectivity'),
                        self::featureCards('content.connectivity', 3),
                    ])
                    ->visible(fn (Get $get) => $get('type') === 'headphone')
                    ->collapsible(),

                // ════════════════════════════════════════════════════════
                //  ORTAK ALT BÖLÜMLER (Specs · Buy · SEO)
                // ════════════════════════════════════════════════════════

                Section::make('Teknik Özellikler Tablosu')
                    ->description('Sayfanın altındaki tam özellikler listesi.')
                    ->schema([
                        ...self::subHeading('content.specs_section', 'Bölüm Başlığı'),

                        Repeater::make('specs')
                            ->label('Satırlar')
                            ->reorderable()
                            ->collapsed()
                            ->itemLabel(fn (array $state): ?string => $state['key'] ?? null)
                            ->defaultItems(0)
                            ->addActionLabel('Satır Ekle')
                            ->schema([
                                Grid::make(3)->schema([
                                    TextInput::make('key')->label('Özellik')->required()->maxLength(150)->helperText('örn: Ekran'),
                                    TextInput::make('value')->label('Değer')->required()->maxLength(255)->helperText('örn: 6.56″ IPS 90Hz'),
                                    TextInput::make('note')->label('Not')->maxLength(255)->helperText('örn: Gorilla Glass 5'),
                                ]),
                            ])
                            ->columnSpanFull(),
                    ])
                    ->visible(fn (Get $get) => filled($get('type')))
                    ->collapsible(),

                Section::make('Satın Alma Bölümü')
                    ->description('Fiyat, butonlar ve kapanış başlığı.')
                    ->schema([
                        ...self::subHeading('content.buy_section', 'Bölüm Başlığı'),

                        TextInput::make('price')
                            ->label('Fiyat (₺)')
                            ->helperText('KDV dahil sayısal değer (örn: 6499.00).')
                            ->numeric()
                            ->minValue(0)
                            ->step('0.01')
                            ->columnSpanFull(),

                        TextInput::make('price_note')
                            ->label('Fiyat Notu')
                            ->helperText('örn: Türkiye geneli ücretsiz kargo')
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ])
                    ->visible(fn (Get $get) => filled($get('type')))
                    ->collapsible(),

                Section::make('SEO')
                    ->schema(SeoSchema::make())
                    ->visible(fn (Get $get) => filled($get('type')))
                    ->collapsible()
                    ->collapsed(),

            ])->columnSpanFull(),
        ]);
    }

    // ─────────────────────────────────────────────────────────────────────────
    // Table
    // ─────────────────────────────────────────────────────────────────────────

    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('order')
            ->defaultSort('order')
            ->columns([
                SpatieMediaLibraryImageColumn::make('hero')
                    ->label('Görsel')
                    ->collection('hero')
                    ->conversion('thumb')
                    ->imageSize(60)
                    ->toggleable(),

                TextColumn::make('name')
                    ->label('Ürün Adı')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('type')
                    ->label('Tip')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'phone' => 'info',
                        'watch' => 'success',
                        'headphone' => 'warning',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'phone' => 'Telefon',
                        'watch' => 'Saat',
                        'headphone' => 'Kulaklık',
                        default => $state,
                    })
                    ->sortable(),

                TextColumn::make('price')
                    ->label('Fiyat')
                    ->money('TRY')
                    ->toggleable(),

                TextColumn::make('order')
                    ->label('Sıra')
                    ->alignCenter()
                    ->sortable(),

                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean()
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->label('Ürün Tipi')
                    ->options([
                        'phone' => 'Telefon',
                        'watch' => 'Akıllı Saat',
                        'headphone' => 'Kulaklık',
                    ])
                    ->native(false),
            ])
            ->recordActions([
                ActionGroup::make([
                    EditAction::make(),
                    DeleteAction::make(),
                ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    public static function getRelations(): array
    {
        return [
            AccessoriesRelationManager::class,
        ];
    }
}
