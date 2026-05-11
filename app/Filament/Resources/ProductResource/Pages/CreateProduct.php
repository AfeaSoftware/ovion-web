<?php

namespace App\Filament\Resources\ProductResource\Pages;

use Afea\Cms\Core\Concerns\InteractsWithSeoForm;
use App\Filament\Concerns\HasTranslatableForm;
use App\Filament\Resources\ProductResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    use HasTranslatableForm, InteractsWithSeoForm;

    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ...$this->getLocaleSwitcherActions(),
        ];
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $this->wrapTranslatableDataForCreate($data);
    }
}
