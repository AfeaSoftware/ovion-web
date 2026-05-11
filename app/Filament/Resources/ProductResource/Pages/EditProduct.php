<?php

namespace App\Filament\Resources\ProductResource\Pages;

use Afea\Cms\Core\Concerns\InteractsWithSeoForm;
use App\Filament\Concerns\HasTranslatableForm;
use App\Filament\Resources\ProductResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    use HasTranslatableForm, InteractsWithSeoForm {
        InteractsWithSeoForm::mutateFormDataBeforeFill as protected mutateSeoFormDataBeforeFill;
    }

    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ...$this->getLocaleSwitcherActions(),
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data = $this->mutateSeoFormDataBeforeFill($data);

        return $this->fillTranslatableData($data);
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return $this->persistTranslatableData($data);
    }
}
