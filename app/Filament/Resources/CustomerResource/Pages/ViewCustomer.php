<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use App\Models\CustomerNote;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ViewCustomer extends ViewRecord
{
    protected static string $resource = CustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('addNote')
                ->label('Not / Geçmiş Ekle')
                ->icon('heroicon-o-plus-circle')
                ->schema([
                    Select::make('type')
                        ->label('Tip')
                        ->options([
                            'sale' => 'Satış',
                            'contact' => 'İletişim',
                            'note' => 'Not',
                        ])
                        ->default('sale')
                        ->required()
                        ->native(false),
                    Grid::make(2)->schema([
                        TextInput::make('product_label')
                            ->label('Ürün / Konu')
                            ->placeholder('örn: V11 Lite'),
                        TextInput::make('amount_label')
                            ->label('Tutar / Etiket')
                            ->placeholder('örn: ₺4.999'),
                    ]),
                    DatePicker::make('occurred_on')
                        ->label('Tarih')
                        ->default(now())
                        ->native(false),
                    Textarea::make('body')
                        ->label('Açıklama')
                        ->rows(3),
                ])
                ->action(function (array $data): void {
                    CustomerNote::create([
                        'user_id' => $this->record->id,
                        'type' => $data['type'],
                        'product_label' => $data['product_label'] ?? null,
                        'amount_label' => $data['amount_label'] ?? null,
                        'body' => $data['body'] ?? null,
                        'occurred_on' => $data['occurred_on'] ?? now()->toDateString(),
                    ]);

                    Notification::make()->title('Kayıt eklendi')->success()->send();
                }),
            EditAction::make(),
        ];
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Müşteri Bilgileri')
                ->schema([
                    TextEntry::make('name')->label('Ad Soyad'),
                    TextEntry::make('email')->label('E-posta'),
                    TextEntry::make('phone')->label('Telefon')->placeholder('—'),
                    TextEntry::make('created_at')->label('Kayıt')->dateTime('d.m.Y H:i'),
                ])
                ->columns(2),

            Section::make('Geçmiş & Notlar')
                ->description('Müşteri ile ilgili satış, iletişim veya genel notları takip et.')
                ->schema([
                    RepeatableEntry::make('notes')
                        ->hiddenLabel()
                        ->schema([
                            Grid::make(4)->schema([
                                TextEntry::make('type')
                                    ->label('Tip')
                                    ->badge()
                                    ->formatStateUsing(fn (string $state): string => match ($state) {
                                        'sale' => 'Satış',
                                        'contact' => 'İletişim',
                                        'note' => 'Not',
                                        default => $state,
                                    })
                                    ->color(fn (string $state): string => match ($state) {
                                        'sale' => 'success',
                                        'contact' => 'info',
                                        default => 'gray',
                                    }),
                                TextEntry::make('occurred_on')->label('Tarih')->date('d.m.Y')->placeholder('—'),
                                TextEntry::make('product_label')->label('Ürün / Konu')->placeholder('—'),
                                TextEntry::make('amount_label')->label('Tutar')->placeholder('—'),
                            ]),
                            TextEntry::make('body')->label('Açıklama')->placeholder('—')->columnSpanFull(),
                        ]),
                ])
                ->visible(fn () => $this->record->notes()->exists()),

            Section::make('Sepetler')
                ->schema([
                    RepeatableEntry::make('carts')
                        ->hiddenLabel()
                        ->schema([
                            Grid::make(4)->schema([
                                TextEntry::make('id')->label('#'),
                                TextEntry::make('status')
                                    ->label('Durum')
                                    ->badge()
                                    ->formatStateUsing(fn (string $state): string => match ($state) {
                                        'submitted' => 'Talep',
                                        'open' => 'Açık',
                                        default => $state,
                                    }),
                                TextEntry::make('contacted_at')->label('İletişim')->dateTime('d.m.Y H:i')->placeholder('—'),
                                TextEntry::make('created_at')->label('Oluşturma')->dateTime('d.m.Y H:i'),
                            ]),
                        ]),
                ])
                ->visible(fn () => $this->record->carts()->exists()),
        ]);
    }
}
