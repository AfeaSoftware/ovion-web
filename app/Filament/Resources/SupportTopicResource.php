<?php

namespace App\Filament\Resources;

use Afea\Cms\Settings\Filament\Clusters\SettingsCluster;
use App\Filament\Resources\SupportTopicResource\Pages;
use App\Models\SupportTopic;
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
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class SupportTopicResource extends Resource
{
    protected static ?string $model = SupportTopic::class;

    protected static ?string $cluster = SettingsCluster::class;

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedLifebuoy;

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'title';

    public static function getNavigationLabel(): string
    {
        return 'Destek Sayfaları';
    }

    public static function getModelLabel(): string
    {
        return 'Destek Sayfası';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Destek Sayfaları';
    }

    /**
     * @return array<string, string>
     */
    public static function iconOptions(): array
    {
        return [
            'doc' => 'Döküman (Belge)',
            'book' => 'Kitap (Kılavuz)',
            'shield' => 'Kalkan (Garanti)',
            'wrench' => 'Anahtar (Servis)',
            'question' => 'Soru (SSS)',
            'chat' => 'Sohbet (Destek)',
            'pin' => 'Konum (Bayi/Servis)',
            'phone' => 'Telefon',
            'mail' => 'E-posta',
        ];
    }

    protected static function isSecondaryLocale(mixed $livewire): bool
    {
        $locale = is_object($livewire) && property_exists($livewire, 'activeLocale')
            ? $livewire->activeLocale
            : null;

        return $locale !== null && $locale !== 'tr';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Grid::make(1)->schema([

                Section::make('Başlık & Kart')
                    ->description('Destek sayfasındaki "Hızlı Erişim" alanında kart olarak gösterilir; karta tıklanınca detay sayfası açılır.')
                    ->schema([
                        Grid::make(3)->schema([
                            Select::make('icon')
                                ->label('İkon')
                                ->options(self::iconOptions())
                                ->default('doc')
                                ->native(false)
                                ->required()
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

                        TextInput::make('title')
                            ->label('Başlık')
                            ->required()
                            ->maxLength(150)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (?string $state, callable $set, $livewire): void {
                                if (self::isSecondaryLocale($livewire) || ! is_string($state) || $state === '') {
                                    return;
                                }

                                $set('slug', Str::slug($state));
                            })
                            ->columnSpanFull(),

                        TextInput::make('slug')
                            ->label('Slug (URL)')
                            ->required()
                            ->maxLength(150)
                            ->helperText(fn ($livewire): string => self::isSecondaryLocale($livewire)
                                ? 'Bu dile özel slug. Boş bırakılırsa Türkçe slug kullanılır.'
                                : 'Türkçe URL slug\'ı (örn: /destek/kullanim-kilavuzlari).'
                            )
                            ->columnSpanFull(),

                        Textarea::make('summary')
                            ->label('Kart Açıklaması')
                            ->helperText('Kartın altında ve detay sayfasının üstünde görünen kısa açıklama.')
                            ->rows(2)
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ]),

                Section::make('Detay Sayfası İçeriği')
                    ->schema([
                        Textarea::make('intro')
                            ->label('Giriş Metni (opsiyonel)')
                            ->helperText('Detay sayfasında belgelerin üstünde gösterilen açıklama.')
                            ->rows(4)
                            ->maxLength(2000)
                            ->columnSpanFull(),

                        Repeater::make('documents')
                            ->label('Belgeler (PDF)')
                            ->helperText('İndirilebilir PDF dökümanları. Her dil için ayrı belge yükleyebilirsin.')
                            ->addActionLabel('Belge Ekle')
                            ->reorderable()
                            ->collapsible()
                            ->collapsed()
                            ->itemLabel(fn (array $state): ?string => $state['label'] ?? null)
                            ->defaultItems(0)
                            ->schema([
                                TextInput::make('label')
                                    ->label('Belge Adı')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpanFull(),

                                FileUpload::make('file')
                                    ->label('PDF Dosyası')
                                    ->disk('public')
                                    ->directory('support/documents')
                                    ->visibility('public')
                                    ->acceptedFileTypes(['application/pdf'])
                                    ->maxSize(50 * 1024)
                                    ->downloadable()
                                    ->openable()
                                    ->columnSpanFull(),
                            ])
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                Section::make('SEO')
                    ->schema([
                        TextInput::make('meta_title')
                            ->label('SEO Başlığı')
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Textarea::make('meta_description')
                            ->label('SEO Açıklaması')
                            ->rows(2)
                            ->maxLength(500)
                            ->columnSpanFull(),
                    ])
                    ->collapsible()
                    ->collapsed(),

            ])->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('order')
            ->defaultSort('order')
            ->columns([
                TextColumn::make('title')
                    ->label('Başlık')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slug')
                    ->label('Slug')
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

                TextColumn::make('updated_at')
                    ->label('Son Güncelleme')
                    ->dateTime('d.m.Y H:i')
                    ->toggleable()
                    ->sortable(),
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
            'index' => Pages\ListSupportTopics::route('/'),
            'create' => Pages\CreateSupportTopic::route('/create'),
            'edit' => Pages\EditSupportTopic::route('/{record}/edit'),
        ];
    }
}
