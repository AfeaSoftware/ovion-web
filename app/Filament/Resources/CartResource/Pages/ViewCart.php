<?php

namespace App\Filament\Resources\CartResource\Pages;

use App\Filament\Resources\CartResource;
use Filament\Actions\DeleteAction;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ViewCart extends ViewRecord
{
    protected static string $resource = CartResource::class;

    protected function getHeaderActions(): array
    {
        return [DeleteAction::make()];
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Müşteri')
                ->schema([
                    TextEntry::make('user.name')->label('Ad Soyad')->placeholder('— misafir —'),
                    TextEntry::make('user.email')->label('E-posta')->placeholder('—'),
                    TextEntry::make('user.phone')->label('Telefon')->placeholder('—'),
                ])
                ->columns(3),

            Section::make('Sepet')
                ->schema([
                    TextEntry::make('status')
                        ->label('Durum')
                        ->badge()
                        ->formatStateUsing(fn (string $state): string => match ($state) {
                            'submitted' => 'Talep Gönderildi',
                            'open' => 'Açık',
                            default => $state,
                        }),
                    TextEntry::make('submitted_at')->label('Talep Zamanı')->dateTime('d.m.Y H:i'),
                    TextEntry::make('created_at')->label('Oluşturma')->dateTime('d.m.Y H:i'),
                ])
                ->columns(3),

            Section::make('Ürünler')
                ->schema([
                    RepeatableEntry::make('items')
                        ->hiddenLabel()
                        ->schema([
                            TextEntry::make('snapshot_name')
                                ->label('Ürün')
                                ->getStateUsing(fn ($record) => $record->snapshot_name ?: ($record->product?->name ?? '—')),
                            TextEntry::make('quantity')->label('Adet'),
                            TextEntry::make('snapshot_price')->label('Fiyat')->placeholder('—'),
                        ])
                        ->columns(3),
                ]),
        ]);
    }
}
