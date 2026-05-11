<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CartResource\Pages;
use App\Models\Cart;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class CartResource extends Resource
{
    protected static ?string $model = Cart::class;

    protected static string|\UnitEnum|null $navigationGroup = 'Müşteri Yönetimi';

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedShoppingCart;

    protected static ?int $navigationSort = 2;

    public static function getNavigationLabel(): string
    {
        return 'Sepetler';
    }

    public static function getModelLabel(): string
    {
        return 'Sepet';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Sepetler';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('id')->label('#')->sortable(),

                TextColumn::make('user.name')
                    ->label('Müşteri')
                    ->searchable()
                    ->placeholder('— misafir —'),

                TextColumn::make('user.email')
                    ->label('E-posta')
                    ->toggleable()
                    ->searchable(),

                TextColumn::make('user.phone')
                    ->label('Telefon')
                    ->toggleable(),

                TextColumn::make('items_count')
                    ->label('Ürün adedi')
                    ->counts('items')
                    ->alignCenter(),

                TextColumn::make('status')
                    ->label('Durum')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'submitted' => 'success',
                        'open' => 'warning',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'submitted' => 'Talep Gönderildi',
                        'open' => 'Açık',
                        default => $state,
                    })
                    ->sortable(),

                TextColumn::make('submitted_at')
                    ->label('Talep Zamanı')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),

                TextColumn::make('contacted_at')
                    ->label('İletişim')
                    ->badge()
                    ->color(fn ($state): string => $state ? 'success' : 'gray')
                    ->formatStateUsing(fn ($state): string => $state ? 'İletişim Kuruldu' : 'Bekliyor')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Oluşturma')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Durum')
                    ->options([
                        'open' => 'Açık',
                        'submitted' => 'Talep Gönderildi',
                    ])
                    ->native(false),
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make(),
                    Action::make('markContacted')
                        ->label('İletişim Kuruldu')
                        ->icon('heroicon-o-phone')
                        ->color('success')
                        ->visible(fn ($record): bool => $record->contacted_at === null)
                        ->requiresConfirmation()
                        ->action(function ($record): void {
                            $record->contacted_at = now();
                            $record->save();
                            Notification::make()->title('İletişim işaretlendi')->success()->send();
                        }),
                    Action::make('unmarkContacted')
                        ->label('İletişim İptal')
                        ->icon('heroicon-o-arrow-uturn-left')
                        ->color('gray')
                        ->visible(fn ($record): bool => $record->contacted_at !== null)
                        ->action(function ($record): void {
                            $record->contacted_at = null;
                            $record->save();
                        }),
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
            'index' => Pages\ListCarts::route('/'),
            'view' => Pages\ViewCart::route('/{record}'),
        ];
    }
}
