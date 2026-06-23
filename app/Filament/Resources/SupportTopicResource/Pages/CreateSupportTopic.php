<?php

namespace App\Filament\Resources\SupportTopicResource\Pages;

use App\Filament\Concerns\HasTranslatableForm;
use App\Filament\Resources\SupportTopicResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSupportTopic extends CreateRecord
{
    use HasTranslatableForm;

    protected static string $resource = SupportTopicResource::class;

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
