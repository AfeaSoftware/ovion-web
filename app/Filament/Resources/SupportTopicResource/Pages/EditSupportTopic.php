<?php

namespace App\Filament\Resources\SupportTopicResource\Pages;

use App\Filament\Concerns\HasTranslatableForm;
use App\Filament\Resources\SupportTopicResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSupportTopic extends EditRecord
{
    use HasTranslatableForm;

    protected static string $resource = SupportTopicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ...$this->getLocaleSwitcherActions(),
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return $this->fillTranslatableData($data);
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return $this->persistTranslatableData($data);
    }
}
