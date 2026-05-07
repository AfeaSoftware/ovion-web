<?php

namespace App\Filament\Resources;

use Afea\Cms\Core\Filament\Schemas\SeoSchema;
use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
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

    private static function sectionText(string $path): array
    {
        return [
            TextInput::make("{$path}.eyebrow")
                ->label('Üst Etiket (Eyebrow)')
                ->helperText('Küçük üst başlık — örn: Kamera · AI')
                ->maxLength(100),

            TextInput::make("{$path}.title")
                ->label('Başlık')
                ->maxLength(255),

            Textarea::make("{$path}.description")
                ->label('Açıklama')
                ->rows(3)
                ->maxLength(600),
        ];
    }

    private static function featureList(string $path, int $max = 6): Repeater
    {
        return Repeater::make("{$path}.items")
            ->label('Özellik Listesi')
            ->helperText('Sayfada madde madde listelenen özellikler.')
            ->reorderable()
            ->defaultItems(0)
            ->maxItems($max)
            ->addActionLabel('Madde Ekle')
            ->schema([
                Grid::make(1)->schema([
                    TextInput::make('text')
                        ->label('Madde')
                        ->required()
                        ->maxLength(200),
                ]),
            ])
            ->columnSpanFull();
    }

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
                        ->helperText('örn: 50 MP   veya   30 sa')
                        ->maxLength(60),
                ]),

                Grid::make(2)->schema([
                    TextInput::make('title')
                        ->label('Başlık')
                        ->required()
                        ->maxLength(100),

                    TextInput::make('description')
                        ->label('Açıklama')
                        ->maxLength(255),
                ]),
            ])
            ->columnSpanFull();
    }

    private static function statRow(string $path, int $max = 4): Repeater
    {
        return Repeater::make("{$path}.stats")
            ->label('İstatistik Satırı')
            ->reorderable()
            ->defaultItems(0)
            ->maxItems($max)
            ->addActionLabel('İstatistik Ekle')
            ->schema([
                Grid::make(2)->schema([
                    TextInput::make('value')->label('Değer')->required()->maxLength(50),
                    TextInput::make('label')->label('Açıklama')->required()->maxLength(100),
                ]),
            ])
            ->columnSpanFull();
    }

    // ─────────────────────────────────────────────────────────────────────────
    // Form
    // ─────────────────────────────────────────────────────────────────────────

    private static function imageUpload(string $collection, bool $multiple = false, ?string $hint = null): SpatieMediaLibraryFileUpload
    {
        $field = SpatieMediaLibraryFileUpload::make($collection.'_upload')
            ->hiddenLabel()
            ->collection($collection)
            ->image()
            ->multiple()
            ->maxSize(50 * 1024);

        if ($hint) {
            $field->helperText($hint);
        }

        if ($multiple) {
            $field->multiple()->reorderable()->maxFiles(20);
        }

        return $field;
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Grid::make(1)->schema([

                // ── 1. Ürün Tipi & Kimlik (+ Ayarlar) ────────────────────
                Section::make('Ürün Tipi & Kimlik')
                    ->description('Tip seçimi formu dinamik olarak günceller.')
                    ->schema([
                        TextInput::make('name')
                            ->label('Ürün Adı')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function ($state, callable $set, $get): void {
                                if (empty($get('slug'))) {
                                    $set('slug', Str::slug((string) $state));
                                }
                                if (empty($get('seo_slug'))) {
                                    $set('seo_slug', Str::slug((string) $state));
                                }
                            })
                            ->columnSpanFull(),

                        TextInput::make('slug')
                            ->label('Slug (URL)')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->helperText('örn: ovion-v11-lite')
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Grid::make(3)->schema([
                            Select::make('type')
                                ->label('Ürün Tipi')
                                ->options([
                                    'phone' => 'Telefon',
                                    'watch' => 'Akıllı Saat',
                                    'headphone' => 'Kulaklık',
                                ])
                                ->required()
                                ->native(false)
                                ->live()
                                ->columnSpan(1),

                            TextInput::make('order')
                                ->label('Sıra')
                                ->numeric()
                                ->default(0)
                                ->columnSpan(1),

                            Toggle::make('is_active')
                                ->label('Aktif')
                                ->default(true)
                                ->inline(false)
                                ->columnSpan(1),
                        ]),
                    ]),

                // ── 2. Hero Bölümü ────────────────────────────────────────
                Section::make('Hero Bölümü')
                    ->description('Sayfanın en üstündeki ana tanıtım alanı ve ürün görseli.')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('eyebrow')
                                ->label('Üst Etiket (Eyebrow)')
                                ->helperText('örn: Yeni — Telefon')
                                ->maxLength(100),

                            TextInput::make('tagline')
                                ->label('Alt Başlık / Tagline')
                                ->helperText('örn: Gücü hisset.')
                                ->maxLength(255),
                        ]),

                        TextInput::make('content.hero.byline')
                            ->label('Hero Altyazı (Byline)')
                            ->helperText('Hero bölümünün en altındaki küçük açıklama.')
                            ->maxLength(255)
                            ->columnSpanFull(),

                        self::imageUpload('hero', hint: 'Telefon: 900×1100 px · Saat: 600×700 px · Kulaklık: 800×700 px — şeffaf arka plan, PNG önerilir'),
                    ])
                    ->visible(fn (Get $get) => filled($get('type'))),

                // ── 3. Hızlı İstatistik Şeridi ───────────────────────────
                Section::make('Hızlı İstatistik Şeridi')
                    ->description('Hero altındaki küçük istatistik satırı. Maks 6 madde.')
                    ->schema([
                        Repeater::make('strip_stats')
                            ->hiddenLabel()
                            ->reorderable()
                            ->defaultItems(0)
                            ->maxItems(6)
                            ->addActionLabel('İstatistik Ekle')
                            ->schema([
                                Grid::make(2)->schema([
                                    TextInput::make('value')
                                        ->label('Değer')
                                        ->required()
                                        ->maxLength(60)
                                        ->helperText('örn: 6.56″   veya   5000 mAh'),

                                    TextInput::make('label')
                                        ->label('Açıklama')
                                        ->required()
                                        ->maxLength(100)
                                        ->helperText('örn: IPS LCD Ekran'),
                                ]),
                            ]),
                    ])
                    ->visible(fn (Get $get) => filled($get('type')))
                    ->collapsible(),

                // ════════════════════════════════════════════════════════
                //  TELEFON  bölümleri
                // ════════════════════════════════════════════════════════

                Section::make('Kamera Bölümü')
                    ->description('Billboard metni, özellik kartları ve kamera görseli.')
                    ->schema([
                        ...self::sectionText('content.camera'),
                        self::featureCards('content.camera'),
                        self::imageUpload('camera', hint: '1600×900 px — yatay, tam ekran billboard. object-fit: cover'),
                    ])
                    ->visible(fn (Get $get) => $get('type') === 'phone')
                    ->collapsible(),

                Section::make('Ekran Bölümü')
                    ->description('Ekran billboard metni, özellik listesi ve ekran görseli.')
                    ->schema([
                        ...self::sectionText('content.display'),
                        self::featureList('content.display'),
                        self::imageUpload('display', hint: '1000×1250 px — dikey ekran görseli, tam ekran billboard. object-fit: cover'),
                    ])
                    ->visible(fn (Get $get) => $get('type') === 'phone')
                    ->collapsible(),

                Section::make('Tasarım Görselleri (Cinema Kaydırma)')
                    ->description('Kaydırmalı 3D görsel bölümü. Görseller + slayt başlıkları.')
                    ->schema([
                        ...self::sectionText('content.cinema'),
                        self::imageUpload('cinema', multiple: true, hint: '900×1600 px — dikey ürün görseli (arka, yan, ikili vb.). object-fit: contain. Slayt sırasıyla eşleşir.'),
                        Repeater::make('content.cinema.slides')
                            ->label('Slayt Başlıkları')
                            ->helperText('Görseller yükleme sırasına göre eşleştirilir.')
                            ->reorderable()
                            ->defaultItems(0)
                            ->addActionLabel('Slayt Ekle')
                            ->schema([
                                Grid::make(2)->schema([
                                    TextInput::make('eyebrow')
                                        ->label('Üst Etiket')
                                        ->helperText('örn: TUŞLAR')
                                        ->maxLength(100),

                                    TextInput::make('title')
                                        ->label('Başlık')
                                        ->required()
                                        ->maxLength(255),
                                ]),

                                Textarea::make('description')
                                    ->label('Açıklama')
                                    ->rows(2)
                                    ->maxLength(400),
                            ])
                            ->columnSpanFull(),
                    ])
                    ->visible(fn (Get $get) => $get('type') === 'phone')
                    ->collapsible(),

                Section::make('Performans Bölümü')
                    ->description('İşlemci, RAM, şarj hızı vb. özellik kartları.')
                    ->schema([
                        ...self::sectionText('content.performance'),
                        self::featureCards('content.performance'),
                    ])
                    ->visible(fn (Get $get) => $get('type') === 'phone')
                    ->collapsible(),

                Section::make('Pil Bölümü (Telefon)')
                    ->description('Pil kapasitesi, şarj hızı açıklama + liste.')
                    ->schema([
                        ...self::sectionText('content.battery'),
                        self::featureList('content.battery'),
                    ])
                    ->visible(fn (Get $get) => $get('type') === 'phone')
                    ->collapsible(),

                // ════════════════════════════════════════════════════════
                //  SAAT  bölümleri
                // ════════════════════════════════════════════════════════

                Section::make('Sağlık & Fitness Bölümü')
                    ->description('Nabız, SpO2, uyku takibi vb. özellik kartları ve sağlık görseli.')
                    ->schema([
                        ...self::sectionText('content.health'),
                        self::featureCards('content.health'),
                        self::imageUpload('health', hint: '1600×900 px — yatay, tam ekran billboard. object-fit: cover, object-position: center 30%'),
                    ])
                    ->visible(fn (Get $get) => $get('type') === 'watch')
                    ->collapsible(),

                Section::make('Kişiselleştirme Bölümü')
                    ->description('Saat yüzü kartları. Her kart: ad + etiketler.')
                    ->schema([
                        ...self::sectionText('content.customization'),
                        Repeater::make('content.customization.faces')
                            ->label('Saat Yüzleri')
                            ->reorderable()
                            ->defaultItems(0)
                            ->addActionLabel('Saat Yüzü Ekle')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Yüz Adı')
                                    ->required()
                                    ->maxLength(100)
                                    ->helperText('örn: Sport Ring'),

                                TextInput::make('tags')
                                    ->label('Etiketler')
                                    ->maxLength(255)
                                    ->helperText('örn: Aktivite halkaları · Kalp ritmi'),
                            ])
                            ->columnSpanFull(),
                    ])
                    ->visible(fn (Get $get) => $get('type') === 'watch')
                    ->collapsible(),

                Section::make('Tasarım Bölümü (Saat)')
                    ->description('Kasa, kayış, renk seçenekleri özellik listesi ve tasarım görseli.')
                    ->schema([
                        ...self::sectionText('content.design'),
                        self::featureList('content.design'),
                        self::imageUpload('design', hint: '1000×1200 px — dikey split görsel (1:1.2 oranı). object-fit: cover'),
                    ])
                    ->visible(fn (Get $get) => $get('type') === 'watch')
                    ->collapsible(),

                Section::make('Aktivite Bölümü')
                    ->description('Spor modu sayısı, GPS, su geçirmezlik istatistikleri ve görsel.')
                    ->schema([
                        ...self::sectionText('content.activity'),
                        self::statRow('content.activity'),
                        self::imageUpload('activity', hint: '800×800 px — kare, tam ekran billboard. object-fit: cover'),
                    ])
                    ->visible(fn (Get $get) => $get('type') === 'watch')
                    ->collapsible(),

                Section::make('Pil Bölümü (Saat)')
                    ->description('Pil ömrü ve şarj özellikleri.')
                    ->schema([
                        ...self::sectionText('content.battery'),
                        self::featureList('content.battery'),
                        self::imageUpload('battery_img', hint: '800×860 px — neredeyse kare (1:1.08 oranı). object-fit: cover'),
                    ])
                    ->visible(fn (Get $get) => $get('type') === 'watch')
                    ->collapsible(),

                // ════════════════════════════════════════════════════════
                //  KULAKLIK  bölümleri
                // ════════════════════════════════════════════════════════

                Section::make('ANC Bölümü')
                    ->description('Gürültü engelleme. dB değeri, özellik kartları ve görsel.')
                    ->schema([
                        ...self::sectionText('content.anc'),
                        TextInput::make('content.anc.db_value')
                            ->label('ANC Değeri (dB)')
                            ->helperText('örn: 38')
                            ->maxLength(10),
                        self::featureCards('content.anc', 3),
                        self::imageUpload('anc', hint: '1600×900 px — yatay, tam ekran billboard. object-fit: cover'),
                    ])
                    ->visible(fn (Get $get) => $get('type') === 'headphone')
                    ->collapsible(),

                Section::make('Ses Kalitesi Bölümü')
                    ->description('Sürücü boyutu, frekans, Hi-Fi özellik listesi ve görsel.')
                    ->schema([
                        ...self::sectionText('content.sound'),
                        self::featureList('content.sound'),
                        self::imageUpload('sound', hint: '900×900 px — kare split görsel. object-fit: cover'),
                    ])
                    ->visible(fn (Get $get) => $get('type') === 'headphone')
                    ->collapsible(),

                Section::make('Tasarım Bölümü (Kulaklık)')
                    ->description('Ergonomi, ağırlık, malzeme özellik listesi ve tasarım görseli.')
                    ->schema([
                        ...self::sectionText('content.design'),
                        self::featureList('content.design'),
                        self::imageUpload('headphone_design', hint: '900×900 px — kare split görsel. object-fit: cover'),
                    ])
                    ->visible(fn (Get $get) => $get('type') === 'headphone')
                    ->collapsible(),

                Section::make('Pil Bölümü (Kulaklık)')
                    ->description('Pil süresi ve şarj istatistikleri.')
                    ->schema([
                        ...self::sectionText('content.battery'),
                        self::statRow('content.battery'),
                    ])
                    ->visible(fn (Get $get) => $get('type') === 'headphone')
                    ->collapsible(),

                Section::make('Bağlantı Bölümü')
                    ->description('Bluetooth, çoklu bağlantı, multipoint özellik kartları.')
                    ->schema([
                        ...self::sectionText('content.connectivity'),
                        self::featureCards('content.connectivity', 3),
                    ])
                    ->visible(fn (Get $get) => $get('type') === 'headphone')
                    ->collapsible(),

                // ════════════════════════════════════════════════════════
                //  Ortak alt bölümler
                // ════════════════════════════════════════════════════════

                // ════════════════════════════════════════════════════════
                //  Sayfa Bölüm Başlıkları (cross-section sub-headers)
                // ════════════════════════════════════════════════════════
                Section::make('Sayfa Bölüm Başlıkları')
                    ->description('Sayfadaki ara bölüm başlıkları (kart grid, liste, satın alma vb.). Boş bırakılırsa varsayılan çeviriler kullanılır.')
                    ->schema([
                        // Phone-specific
                        Grid::make(2)->schema([
                            TextInput::make('content.camera_cards.eyebrow')->label('Kamera Kart Eyebrow')->maxLength(255),
                            TextInput::make('content.camera_cards.title')->label('Kamera Kart Başlığı')->helperText('HTML kullanılabilir')->maxLength(500),
                            TextInput::make('content.display_list.eyebrow')->label('Ekran Liste Eyebrow')->maxLength(255),
                            TextInput::make('content.display_list.title')->label('Ekran Liste Başlığı')->helperText('HTML kullanılabilir')->maxLength(500),
                        ])->visible(fn (Get $get) => $get('type') === 'phone'),
                        Textarea::make('content.display_list.description')
                            ->label('Ekran Liste Açıklama')
                            ->rows(2)
                            ->columnSpanFull()
                            ->visible(fn (Get $get) => $get('type') === 'phone'),

                        // Watch-specific
                        Grid::make(2)->schema([
                            TextInput::make('content.health_cards.eyebrow')->label('Sağlık Kart Eyebrow')->maxLength(255),
                            TextInput::make('content.health_cards.title')->label('Sağlık Kart Başlığı')->helperText('HTML')->maxLength(500),
                        ])->visible(fn (Get $get) => $get('type') === 'watch'),

                        // Headphone-specific
                        Grid::make(2)->schema([
                            TextInput::make('content.anc_cards.eyebrow')->label('ANC Kart Eyebrow')->maxLength(255),
                            TextInput::make('content.anc_cards.title')->label('ANC Kart Başlığı')->helperText('HTML')->maxLength(500),
                        ])->visible(fn (Get $get) => $get('type') === 'headphone'),

                        // Common (specs + buy)
                        Grid::make(2)->schema([
                            TextInput::make('content.specs_section.eyebrow')->label('Teknik Özellikler Eyebrow')->maxLength(255),
                            TextInput::make('content.specs_section.title')->label('Teknik Özellikler Başlığı')->helperText('HTML')->maxLength(500),
                            TextInput::make('content.buy_section.eyebrow')->label('Satın Al Eyebrow')->maxLength(255),
                            TextInput::make('content.buy_section.title')->label('Satın Al Başlığı')->helperText('HTML')->maxLength(500),
                        ]),
                    ])
                    ->visible(fn (Get $get) => filled($get('type')))
                    ->collapsible()
                    ->collapsed(),

                Section::make('Teknik Özellikler Tablosu')
                    ->description('Sayfanın altındaki tam özellikler tablosu.')
                    ->schema([
                        Repeater::make('specs')
                            ->hiddenLabel()
                            ->reorderable()
                            ->defaultItems(0)
                            ->addActionLabel('Satır Ekle')
                            ->schema([
                                Grid::make(3)->schema([
                                    TextInput::make('key')
                                        ->label('Özellik')
                                        ->required()
                                        ->maxLength(100)
                                        ->helperText('örn: Ekran'),

                                    TextInput::make('value')
                                        ->label('Değer')
                                        ->required()
                                        ->maxLength(255)
                                        ->helperText('örn: 6.56″ IPS 90Hz'),

                                    TextInput::make('note')
                                        ->label('Not')
                                        ->maxLength(255)
                                        ->helperText('örn: Gorilla Glass 5'),
                                ]),
                            ]),
                    ])
                    ->visible(fn (Get $get) => filled($get('type')))
                    ->collapsible(),

                Section::make('Satın Alma')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('price_label')
                                ->label('Fiyat Etiketi')
                                ->helperText('örn: ₺6.499')
                                ->maxLength(50),

                            TextInput::make('price_note')
                                ->label('Fiyat Notu')
                                ->helperText('örn: Ücretsiz kargo · 2 yıl garanti')
                                ->maxLength(255),
                        ]),

                        Grid::make(2)->schema([
                            TextInput::make('cta_primary')
                                ->label('Birincil Buton')
                                ->helperText('örn: Şimdi Satın Al')
                                ->maxLength(100),

                            TextInput::make('buy_url')
                                ->label('Birincil Buton URL')
                                ->url()
                                ->maxLength(2048),

                            TextInput::make('cta_secondary')
                                ->label('İkincil Buton')
                                ->maxLength(100),

                            TextInput::make('cta_secondary_url')
                                ->label('İkincil Buton URL')
                                ->url()
                                ->maxLength(2048),
                        ]),
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

                TextColumn::make('price_label')->label('Fiyat')->toggleable(),
                TextColumn::make('order')->label('Sıra')->alignCenter()->sortable(),

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
}
