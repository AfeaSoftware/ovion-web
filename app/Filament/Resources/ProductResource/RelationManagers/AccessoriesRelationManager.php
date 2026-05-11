<?php

namespace App\Filament\Resources\ProductResource\RelationManagers;

use App\Filament\Resources\AccessoryResource;
use Filament\Actions\AttachAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DetachAction;
use Filament\Actions\DetachBulkAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class AccessoriesRelationManager extends RelationManager
{
    protected static string $relationship = 'accessories';

    protected static ?string $title = 'Uyumlu Aksesuarlar';

    protected static ?string $modelLabel = 'aksesuar';

    protected static ?string $pluralModelLabel = 'aksesuarlar';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                SpatieMediaLibraryImageColumn::make('image')
                    ->label('Görsel')
                    ->collection('image')
                    ->conversion('thumb')
                    ->imageSize(50),

                TextColumn::make('name')
                    ->label('Aksesuar')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category')
                    ->label('Kategori')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => AccessoryResource::categoryOptions()[$state] ?? $state),

                TextColumn::make('price')
                    ->label('Fiyat')
                    ->money('TRY')
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->label('Kategori')
                    ->options(AccessoryResource::categoryOptions())
                    ->native(false),
            ])
            ->headerActions([
                AttachAction::make()
                    ->label('Aksesuar Bağla')
                    ->preloadRecordSelect()
                    ->multiple(),
            ])
            ->recordActions([
                DetachAction::make()->label('Kaldır'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DetachBulkAction::make()->label('Seçilenleri Kaldır'),
                ]),
            ]);
    }
}
