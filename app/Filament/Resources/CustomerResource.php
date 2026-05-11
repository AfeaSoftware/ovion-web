<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Models\User;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class CustomerResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|\UnitEnum|null $navigationGroup = 'Müşteri Yönetimi';

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getNavigationLabel(): string
    {
        return 'Müşteriler';
    }

    public static function getModelLabel(): string
    {
        return 'Müşteri';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Müşteriler';
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery();
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Müşteri Bilgileri')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('name')->label('Ad Soyad')->required()->maxLength(255),
                        TextInput::make('email')->label('E-posta')->email()->required()->unique(ignoreRecord: true),
                        TextInput::make('phone')->label('Telefon')->maxLength(30),
                    ]),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('name')->label('Ad Soyad')->searchable()->sortable(),
                TextColumn::make('email')->label('E-posta')->searchable()->toggleable(),
                TextColumn::make('phone')->label('Telefon')->toggleable(),
                TextColumn::make('carts_count')->label('Sepet Sayısı')->counts('carts')->alignCenter(),
                TextColumn::make('notes_count')->label('Kayıt')->counts('notes')->alignCenter()->toggleable(),
                IconColumn::make('email_verified_at')->label('Doğrulandı')->boolean()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')->label('Kayıt')->dateTime('d.m.Y H:i')->sortable()->toggleable(),
            ])
            ->filters([
                TernaryFilter::make('email_verified_at')->label('Doğrulanmış')->nullable(),
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomers::route('/'),
            'view' => Pages\ViewCustomer::route('/{record}'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
