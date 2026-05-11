<?php

namespace App\Filament\Resources\AccessoryResource\Pages;

use Afea\Cms\Core\Concerns\InteractsWithSeoForm;
use App\Filament\Concerns\HasTranslatableForm;
use App\Filament\Resources\AccessoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAccessory extends CreateRecord
{
    use HasTranslatableForm, InteractsWithSeoForm;

    protected static string $resource = AccessoryResource::class;

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
