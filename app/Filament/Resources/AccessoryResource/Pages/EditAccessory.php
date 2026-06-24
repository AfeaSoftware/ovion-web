<?php

namespace App\Filament\Resources\AccessoryResource\Pages;

use Afea\Cms\Core\Concerns\InteractsWithSeoForm;
use App\Filament\Concerns\HasTranslatableForm;
use App\Filament\Concerns\SyncsSeoSlugFromSlug;
use App\Filament\Resources\AccessoryResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAccessory extends EditRecord
{
    use HasTranslatableForm, InteractsWithSeoForm, SyncsSeoSlugFromSlug {
        InteractsWithSeoForm::mutateFormDataBeforeFill as protected mutateSeoFormDataBeforeFill;
    }

    protected static string $resource = AccessoryResource::class;

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
        $this->syncSeoSlugFromData($data);

        return $this->persistTranslatableData($data);
    }

    /**
     * Drop the default Cmd/Ctrl+S shortcut: it can fire a save request before
     * the form (notably media uploads) finishes hydrating, causing an
     * intermittent "page failed to load" error. Saving via the button is safe.
     */
    protected function getSaveFormAction(): Action
    {
        return parent::getSaveFormAction()->keyBindings([]);
    }
}
