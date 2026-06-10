<?php

namespace App\Filament\Resources;

use Afea\Cms\Core\Filament\Schemas\SeoSchema;
use App\Filament\Resources\AccessoryResource\Pages;
use App\Models\Accessory;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class AccessoryResource extends Resource
{
    protected static ?string $model = Accessory::class;

    protected static string|\UnitEnum|null $navigationGroup = 'Ürün Yönetimi';

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedSquares2x2;

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getNavigationLabel(): string
    {
        return 'Aksesuarlar';
    }

    public static function getModelLabel(): string
    {
        return 'Aksesuar';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Aksesuarlar';
    }

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
    public static function categoryOptions(): array
    {
        return [
            'kilif' => 'Kılıf',
            'ekran' => 'Ekran Koruyucu',
            'sarj' => 'Şarj & Kablo',
            'kayis' => 'Kayış',
            'diger' => 'Diğer',
        ];
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Grid::make(1)->schema([

                Section::make('Aksesuar Kimliği')
                    ->schema([
                        Grid::make(3)->schema([
                            Select::make('category')
                                ->label('Kategori')
                                ->options(self::categoryOptions())
                                ->required()
                                ->native(false)
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
                            ->helperText('Aksesuarlar sayfasında üstteki büyük spotlight kartında gösterilir. Aynı anda yalnızca 1 aksesuar öne çıkarılabilir; bu seçildiğinde diğeri otomatik kapanır.')
                            ->default(false)
                            ->inline(false)
                            ->disabled(fn ($livewire): bool => self::isSecondaryLocale($livewire))
                            ->columnSpanFull(),

                        TextInput::make('name')
                            ->label('Aksesuar Adı')
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

                        TextInput::make('slug')
                            ->label('Slug (URL)')
                            ->required()
                            ->maxLength(255)
                            ->helperText(fn ($livewire): string => self::isSecondaryLocale($livewire)
                                ? 'Bu dile özel slug. Boş bırakılırsa Türkçe slug kullanılır.'
                                : 'Türkçe URL slug\'ı. Her dil için ayrı slug verilebilir.'
                            )
                            ->columnSpanFull(),
                    ]),

                Section::make('Görsel')
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('image_upload')
                            ->hiddenLabel()
                            ->collection('image')
                            ->disk('public')
                            ->visibility('public')
                            ->image()
                            ->optimize('webp')
                            ->maxSize(50 * 1024)
                            ->helperText('Önerilen: 800×800 px transparan PNG.')
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                Section::make('İçerik')
                    ->schema([
                        TextInput::make('summary')
                            ->label('Kısa Özet')
                            ->helperText('Kart altyazısı (örn: Mat dokulu silikon).')
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->label('Açıklama')
                            ->helperText('Detay sayfasında gösterilen kısa açıklama.')
                            ->rows(4)
                            ->maxLength(2000)
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                Section::make('Fiyat')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('price')
                                ->label('Fiyat (₺)')
                                ->numeric()
                                ->minValue(0)
                                ->step('0.01'),

                            TextInput::make('buy_url')
                                ->label('Satın Alma URL')
                                ->url()
                                ->maxLength(2048),
                        ]),

                        TextInput::make('price_note')
                            ->label('Fiyat Notu')
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                Section::make('SEO')
                    ->schema(SeoSchema::make())
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
                SpatieMediaLibraryImageColumn::make('image')
                    ->label('Görsel')
                    ->collection('image')
                    ->conversion('thumb')
                    ->imageSize(60)
                    ->toggleable(),

                TextColumn::make('name')
                    ->label('Aksesuar')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'kilif' => 'info',
                        'ekran' => 'success',
                        'sarj' => 'warning',
                        'kayis' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => self::categoryOptions()[$state] ?? $state)
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

                IconColumn::make('is_spotlight')
                    ->label('Öne Çıkan')
                    ->boolean()
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->label('Kategori')
                    ->options(self::categoryOptions())
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
            'index' => Pages\ListAccessories::route('/'),
            'create' => Pages\CreateAccessory::route('/create'),
            'edit' => Pages\EditAccessory::route('/{record}/edit'),
        ];
    }
}
