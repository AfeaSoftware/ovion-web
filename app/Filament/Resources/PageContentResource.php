<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageContentResource\Pages;
use App\Models\PageContent;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PageContentResource extends Resource
{
    protected static ?string $model = PageContent::class;

    protected static string|\UnitEnum|null $navigationGroup = 'İçerik';

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'type';

    public static function getNavigationLabel(): string
    {
        return 'Sayfa İçerikleri';
    }

    public static function getModelLabel(): string
    {
        return 'Sayfa İçeriği';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Sayfa İçerikleri';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Grid::make(1)->schema([

                Section::make('Sayfa Tipi & Dil')
                    ->description('Hangi sayfanın hangi dildeki içeriğini düzenliyorsun.')
                    ->schema([
                        Grid::make(2)->schema([
                            Select::make('type')
                                ->label('Sayfa')
                                ->options([
                                    'home' => 'Anasayfa',
                                    'about' => 'Hakkımızda',
                                    'support' => 'Destek',
                                ])
                                ->required()
                                ->native(false)
                                ->live()
                                ->disabledOn('edit'),

                            Select::make('locale')
                                ->label('Dil')
                                ->options([
                                    'tr' => 'Türkçe',
                                    'en' => 'English',
                                ])
                                ->required()
                                ->native(false)
                                ->live()
                                ->disabledOn('edit'),
                        ]),
                    ]),

                // ════════════════════════════════════════
                //  ANASAYFA
                // ════════════════════════════════════════

                Section::make('Stat Strip — Sayılar')
                    ->description('Hero altındaki sayı şeridi (max 4). Boş bırakılırsa varsayılanlar görünür.')
                    ->schema([
                        Repeater::make('content.home_stats')
                            ->hiddenLabel()
                            ->maxItems(4)
                            ->reorderable()
                            ->defaultItems(0)
                            ->addActionLabel('Sayı Ekle')
                            ->schema([
                                Grid::make(3)->schema([
                                    TextInput::make('value')->label('Değer')->required()->maxLength(20)->helperText('örn: 81'),
                                    TextInput::make('suffix')->label('Sonek')->maxLength(20)->helperText('örn: + veya  yıl'),
                                    TextInput::make('label')->label('Etiket')->required()->maxLength(100),
                                ]),
                            ]),
                    ])
                    ->visible(fn (Get $get): bool => $get('type') === 'home')
                    ->collapsible(),

                Section::make('Scroll Showcase — Kategori Kartları')
                    ->description('Kaydırmalı kategori bölümü. Her kart için görsel + içerik.')
                    ->schema([
                        Repeater::make('content.home_scroll')
                            ->hiddenLabel()
                            ->reorderable()
                            ->defaultItems(0)
                            ->addActionLabel('Kart Ekle')
                            ->schema([
                                FileUpload::make('image')
                                    ->label('Görsel')
                                    ->helperText('Önerilen: 900×1100 px (PNG, şeffaf arka plan)')
                                    ->image()
                                    ->disk('public')
                                    ->directory('page-content/home/scroll')
                                    ->visibility('public')
                                    ->maxSize(10 * 1024)
                                    ->columnSpanFull(),
                                Grid::make(2)->schema([
                                    TextInput::make('eyebrow')->label('Üst Etiket')->maxLength(150),
                                    TextInput::make('title')->label('Başlık')->required()->maxLength(150),
                                ]),
                                Textarea::make('description')->label('Açıklama')->rows(3)->columnSpanFull(),
                                Grid::make(2)->schema([
                                    TextInput::make('btn_text')->label('Buton Metni')->maxLength(100),
                                    TextInput::make('btn_url')->label('Buton URL')->maxLength(500),
                                ]),
                            ])
                            ->columns(1),
                    ])
                    ->visible(fn (Get $get): bool => $get('type') === 'home')
                    ->collapsible(),

                Section::make('Feature Bento — Neden Ovion')
                    ->description('Bento grid kartları (max 6). Wide kartlar 2 kolon kaplar.')
                    ->schema([
                        TextInput::make('content.home_feat_title')
                            ->label('Bölüm Başlığı')
                            ->helperText('HTML kullanılabilir, satır kırılması için <br>')
                            ->maxLength(500)
                            ->columnSpanFull(),
                        Repeater::make('content.home_feat_cards')
                            ->label('Kartlar')
                            ->maxItems(6)
                            ->reorderable()
                            ->defaultItems(0)
                            ->addActionLabel('Kart Ekle')
                            ->schema([
                                Grid::make(3)->schema([
                                    Select::make('size')
                                        ->label('Boyut')
                                        ->options(['narrow' => 'Dar', 'wide' => 'Geniş'])
                                        ->default('narrow')
                                        ->native(false)
                                        ->required(),
                                    Select::make('color')
                                        ->label('Görsel Rengi')
                                        ->options([
                                            'none' => 'Yok',
                                            'amber' => 'Amber',
                                            'indigo' => 'İndigo',
                                            'emerald' => 'Yeşil',
                                            'rose' => 'Pembe',
                                        ])
                                        ->default('none')
                                        ->native(false),
                                    Toggle::make('reverse')->label('Görsel Sağda')->inline(false),
                                ]),
                                FileUpload::make('image')
                                    ->label('Görsel (opsiyonel)')
                                    ->helperText('Önerilen: 800×500 px (geniş kartlar için yatay görsel)')
                                    ->image()
                                    ->disk('public')
                                    ->directory('page-content/home/feat')
                                    ->visibility('public')
                                    ->maxSize(10 * 1024)
                                    ->columnSpanFull(),
                                TextInput::make('title')->label('Başlık')->required()->maxLength(150)->columnSpanFull(),
                                Textarea::make('description')->label('Açıklama')->rows(3)->columnSpanFull(),
                            ])
                            ->columns(1)
                            ->columnSpanFull(),
                    ])
                    ->visible(fn (Get $get): bool => $get('type') === 'home')
                    ->collapsible(),

                Section::make('Güvence Bölümü')
                    ->description('Garanti, servis, üretim, destek kartları.')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('content.home_trust_eyebrow')->label('Üst Etiket')->maxLength(255),
                            TextInput::make('content.home_trust_title')
                                ->label('Bölüm Başlığı')
                                ->helperText('HTML kullanılabilir')
                                ->maxLength(500),
                        ]),
                        Repeater::make('content.home_trust_cards')
                            ->label('Kartlar')
                            ->maxItems(8)
                            ->reorderable()
                            ->defaultItems(0)
                            ->addActionLabel('Kart Ekle')
                            ->schema([
                                Grid::make(2)->schema([
                                    TextInput::make('title')->label('Başlık')->required()->maxLength(150),
                                    TextInput::make('link_url')->label('Bağlantı URL (opsiyonel)')->maxLength(500),
                                ]),
                                Textarea::make('description')->label('Açıklama')->rows(3)->required()->columnSpanFull(),
                                TextInput::make('link_text')
                                    ->label('Bağlantı Metni')
                                    ->maxLength(100)
                                    ->helperText('URL doluysa kart tıklanabilir hale gelir')
                                    ->columnSpanFull(),
                            ])
                            ->columns(1)
                            ->columnSpanFull(),
                    ])
                    ->visible(fn (Get $get): bool => $get('type') === 'home')
                    ->collapsible(),

                Section::make('Buy Bölümü — Satışa Yönelik')
                    ->description('Anasayfa altındaki satın alma çağrısı.')
                    ->schema([
                        TextInput::make('content.home_buy_title')->label('Başlık')->maxLength(255)->columnSpanFull(),
                        Grid::make(2)->schema([
                            TextInput::make('content.home_buy_price')->label('Fiyat')->maxLength(100)->helperText('örn: ₺4.999\'dan başlayan'),
                            TextInput::make('content.home_buy_shipping')->label('Kargo / Garanti Notu')->maxLength(255),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('content.home_buy_cta1_text')->label('Birincil Buton')->maxLength(100),
                            TextInput::make('content.home_buy_cta1_url')->label('Birincil Buton URL')->maxLength(500),
                            TextInput::make('content.home_buy_cta2_text')->label('İkincil Buton')->maxLength(100),
                            TextInput::make('content.home_buy_cta2_url')->label('İkincil Buton URL')->maxLength(500),
                        ]),
                    ])
                    ->visible(fn (Get $get): bool => $get('type') === 'home')
                    ->collapsible(),

                // ════════════════════════════════════════
                //  HAKKIMIZDA
                // ════════════════════════════════════════

                Section::make('Hero Bölümü')
                    ->description('Sayfanın en üstündeki ana başlık alanı.')
                    ->schema([
                        TextInput::make('content.hero_eyebrow')
                            ->label('Üst Etiket')
                            ->helperText('Boş bırakılırsa varsayılan çeviri kullanılır.')
                            ->maxLength(255),
                        TextInput::make('content.hero_title')
                            ->label('Başlık')
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Textarea::make('content.hero_lede')
                            ->label('Açıklama')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->visible(fn (Get $get): bool => $get('type') === 'about')
                    ->collapsible(),

                Section::make('İstatistikler')
                    ->description('Hero altındaki sayı şeridi (max 4). Boş bırakılırsa varsayılan istatistikler görünür.')
                    ->schema([
                        Repeater::make('content.stats')
                            ->hiddenLabel()
                            ->maxItems(4)
                            ->reorderable()
                            ->defaultItems(0)
                            ->addActionLabel('İstatistik Ekle')
                            ->schema([
                                Grid::make(2)->schema([
                                    TextInput::make('value')->label('Değer')->required()->maxLength(50),
                                    TextInput::make('label')->label('Etiket')->required()->maxLength(100),
                                ]),
                            ]),
                    ])
                    ->visible(fn (Get $get): bool => $get('type') === 'about')
                    ->collapsible(),

                Section::make('Hikaye')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('content.story_year')->label('Yıl')->maxLength(20),
                            TextInput::make('content.story_year_lbl')->label('Yıl Etiketi')->maxLength(100),
                        ]),
                        TextInput::make('content.story_eyebrow')
                            ->label('Üst Etiket')
                            ->maxLength(255),
                        TextInput::make('content.story_title')
                            ->label('Başlık')
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Textarea::make('content.story_p1')->label('Paragraf 1')->rows(4)->columnSpanFull(),
                        Textarea::make('content.story_p2')->label('Paragraf 2')->rows(4)->columnSpanFull(),
                    ])
                    ->visible(fn (Get $get): bool => $get('type') === 'about')
                    ->collapsible(),

                Section::make('Değerler')
                    ->description('3 değer kartı. Boş bırakılırsa varsayılanlar görünür.')
                    ->schema([
                        TextInput::make('content.values_eyebrow')->label('Üst Etiket')->maxLength(255),
                        TextInput::make('content.values_title')->label('Başlık')->maxLength(255)->columnSpanFull(),
                        Repeater::make('content.values')
                            ->label('Değer Kartları')
                            ->maxItems(3)
                            ->reorderable()
                            ->defaultItems(0)
                            ->addActionLabel('Değer Ekle')
                            ->schema([
                                TextInput::make('title')->label('Başlık')->required()->maxLength(100),
                                Textarea::make('desc')->label('Açıklama')->rows(2)->required(),
                            ])
                            ->columnSpanFull(),
                    ])
                    ->visible(fn (Get $get): bool => $get('type') === 'about')
                    ->collapsible(),

                Section::make('Üretim (Made in Turkey)')
                    ->schema([
                        TextInput::make('content.made_eyebrow')->label('Üst Etiket')->maxLength(255),
                        TextInput::make('content.made_title')->label('Başlık')->maxLength(255)->columnSpanFull(),
                        Textarea::make('content.made_sub')->label('Açıklama')->rows(3)->columnSpanFull(),
                    ])
                    ->visible(fn (Get $get): bool => $get('type') === 'about')
                    ->collapsible(),

                Section::make('Kilometre Taşları (Timeline)')
                    ->schema([
                        TextInput::make('content.tl_eyebrow')->label('Üst Etiket')->maxLength(255),
                        TextInput::make('content.tl_title')->label('Başlık')->maxLength(255)->columnSpanFull(),
                        Repeater::make('content.timeline')
                            ->label('Olaylar')
                            ->reorderable()
                            ->defaultItems(0)
                            ->addActionLabel('Olay Ekle')
                            ->schema([
                                Grid::make(3)->schema([
                                    TextInput::make('year')->label('Yıl')->required()->maxLength(20),
                                    TextInput::make('title')->label('Başlık')->required()->maxLength(150)->columnSpan(2),
                                ]),
                                Textarea::make('desc')->label('Açıklama')->rows(2)->required(),
                            ])
                            ->columnSpanFull(),
                    ])
                    ->visible(fn (Get $get): bool => $get('type') === 'about')
                    ->collapsible(),

                Section::make('CTA Bölümü')
                    ->schema([
                        TextInput::make('content.cta_eyebrow')->label('Üst Etiket')->maxLength(255),
                        TextInput::make('content.cta_title')->label('Başlık')->maxLength(255)->columnSpanFull(),
                        Textarea::make('content.cta_sub')->label('Açıklama')->rows(2)->columnSpanFull(),
                        Grid::make(2)->schema([
                            TextInput::make('content.cta_btn1_text')->label('Buton 1 Metni')->maxLength(100),
                            TextInput::make('content.cta_btn1_url')->label('Buton 1 URL')->url()->maxLength(2048),
                        ]),
                        TextInput::make('content.cta_btn2_text')->label('Buton 2 Metni')->maxLength(100),
                    ])
                    ->visible(fn (Get $get): bool => $get('type') === 'about')
                    ->collapsible(),

                // ════════════════════════════════════════
                //  DESTEK
                // ════════════════════════════════════════

                Section::make('Hero Bölümü')
                    ->schema([
                        TextInput::make('content.hero_eyebrow')->label('Üst Etiket')->maxLength(255),
                        TextInput::make('content.hero_title')->label('Başlık')->maxLength(255)->columnSpanFull(),
                        Textarea::make('content.hero_sub')->label('Alt Açıklama')->rows(3)->columnSpanFull(),
                    ])
                    ->visible(fn (Get $get): bool => $get('type') === 'support')
                    ->collapsible(),

                Section::make('Hızlı Erişim')
                    ->description('6 hızlı erişim kartının başlık ve açıklamaları.')
                    ->schema([
                        TextInput::make('content.quick_eyebrow')->label('Üst Etiket')->maxLength(255),
                        TextInput::make('content.quick_title')->label('Bölüm Başlığı')->maxLength(255)->columnSpanFull(),
                        Grid::make(2)->schema([
                            TextInput::make('content.act1_title')->label('1. Kart Başlığı')->maxLength(150),
                            Textarea::make('content.act1_desc')->label('1. Kart Açıklama')->rows(2),
                            TextInput::make('content.act2_title')->label('2. Kart Başlığı')->maxLength(150),
                            Textarea::make('content.act2_desc')->label('2. Kart Açıklama')->rows(2),
                            TextInput::make('content.act3_title')->label('3. Kart Başlığı')->maxLength(150),
                            Textarea::make('content.act3_desc')->label('3. Kart Açıklama')->rows(2),
                            TextInput::make('content.act4_title')->label('4. Kart Başlığı')->maxLength(150),
                            Textarea::make('content.act4_desc')->label('4. Kart Açıklama')->rows(2),
                            TextInput::make('content.act5_title')->label('5. Kart Başlığı')->maxLength(150),
                            Textarea::make('content.act5_desc')->label('5. Kart Açıklama')->rows(2),
                            TextInput::make('content.act6_title')->label('6. Kart Başlığı')->maxLength(150),
                            Textarea::make('content.act6_desc')->label('6. Kart Açıklama')->rows(2),
                        ]),
                    ])
                    ->visible(fn (Get $get): bool => $get('type') === 'support')
                    ->collapsible(),

                Section::make('Garanti Bölümü')
                    ->schema([
                        TextInput::make('content.war_eyebrow')->label('Üst Etiket')->maxLength(255),
                        TextInput::make('content.war_title')->label('Başlık')->maxLength(255)->columnSpanFull(),
                        Textarea::make('content.war_desc')->label('Açıklama')->rows(3)->columnSpanFull(),
                        Repeater::make('content.warranty_list')
                            ->label('Garanti Maddeleri')
                            ->maxItems(5)
                            ->reorderable()
                            ->defaultItems(0)
                            ->addActionLabel('Madde Ekle')
                            ->schema([
                                TextInput::make('text')->label('Madde')->required()->maxLength(255),
                            ])
                            ->columnSpanFull(),

                        Grid::make(3)->schema([
                            TextInput::make('content.war_badge')->label('Rozet Metni')->maxLength(100),
                            TextInput::make('content.war_months')->label('Ay Sayısı')->maxLength(10),
                            TextInput::make('content.war_unit')->label('Birim Etiketi')->maxLength(50)->helperText('örn: AY GARANTİ'),
                        ]),
                        TextInput::make('content.war_sub')->label('Alt Metin')->maxLength(255)->columnSpanFull(),

                        Grid::make(2)->schema([
                            TextInput::make('content.war_row1_lbl')->label('1. Satır Etiket'),
                            TextInput::make('content.war_row1_val')->label('1. Satır Değer'),
                            TextInput::make('content.war_row2_lbl')->label('2. Satır Etiket'),
                            TextInput::make('content.war_row2_val')->label('2. Satır Değer'),
                            TextInput::make('content.war_row3_lbl')->label('3. Satır Etiket'),
                            TextInput::make('content.war_row3_val')->label('3. Satır Değer'),
                        ]),
                    ])
                    ->visible(fn (Get $get): bool => $get('type') === 'support')
                    ->collapsible(),

                Section::make('Servis Süreci')
                    ->description('Servis adımları (max 4). Boş bırakılırsa varsayılanlar görünür.')
                    ->schema([
                        TextInput::make('content.steps_eyebrow')->label('Üst Etiket')->maxLength(255),
                        TextInput::make('content.steps_title')->label('Başlık')->maxLength(255)->columnSpanFull(),
                        Repeater::make('content.service_steps')
                            ->label('Adımlar')
                            ->maxItems(4)
                            ->reorderable()
                            ->defaultItems(0)
                            ->addActionLabel('Adım Ekle')
                            ->schema([
                                TextInput::make('title')->label('Başlık')->required()->maxLength(150),
                                Textarea::make('desc')->label('Açıklama')->rows(2)->required(),
                            ])
                            ->columnSpanFull(),
                    ])
                    ->visible(fn (Get $get): bool => $get('type') === 'support')
                    ->collapsible(),

                Section::make('İletişim Bölümü')
                    ->description('Telefon ve email "Şirket Ayarları"ndan otomatik gelir; burada sadece başlıklar düzenlenir.')
                    ->schema([
                        TextInput::make('content.contact_eyebrow')->label('Üst Etiket')->maxLength(255),
                        TextInput::make('content.contact_title')->label('Başlık')->maxLength(255)->columnSpanFull(),
                    ])
                    ->visible(fn (Get $get): bool => $get('type') === 'support')
                    ->collapsible(),

            ])->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('type')
                    ->label('Sayfa')
                    ->badge()
                    ->formatStateUsing(fn (?string $state): string => match ($state) {
                        'home' => 'Anasayfa',
                        'about' => 'Hakkımızda',
                        'support' => 'Destek',
                        default => $state ?? '-',
                    })
                    ->sortable(),

                TextColumn::make('locale')
                    ->label('Dil')
                    ->badge()
                    ->formatStateUsing(fn (?string $state): string => match ($state) {
                        'tr' => 'Türkçe',
                        'en' => 'English',
                        default => $state ?? '-',
                    })
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->label('Son Güncelleme')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->label('Sayfa')
                    ->options([
                        'home' => 'Anasayfa',
                        'about' => 'Hakkımızda',
                        'support' => 'Destek',
                    ])
                    ->native(false),
                SelectFilter::make('locale')
                    ->label('Dil')
                    ->options([
                        'tr' => 'Türkçe',
                        'en' => 'English',
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
            'index' => Pages\ListPageContents::route('/'),
            'create' => Pages\CreatePageContent::route('/create'),
            'edit' => Pages\EditPageContent::route('/{record}/edit'),
        ];
    }
}
