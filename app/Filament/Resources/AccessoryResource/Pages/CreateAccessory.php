<?php

namespace App\Filament\Resources\AccessoryResource\Pages;

use Afea\Cms\Core\Concerns\InteractsWithSeoForm;
use App\Filament\Concerns\HasTranslatableForm;
use App\Filament\Concerns\SyncsSeoSlugFromSlug;
use App\Filament\Resources\AccessoryResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateAccessory extends CreateRecord
{
    use HasTranslatableForm, InteractsWithSeoForm, SyncsSeoSlugFromSlug;

    protected static string $resource = AccessoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ...$this->getLocaleSwitcherActions(),
        ];
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->syncSeoSlugFromData($data);

        return $this->wrapTranslatableDataForCreate($data);
    }

    /**
     * Drop the default Cmd/Ctrl+S shortcut: it can fire a create request before
     * the form (notably media uploads) finishes hydrating, causing an
     * intermittent "page failed to load" error. Saving via the button is safe.
     */
    protected function getCreateFormAction(): Action
    {
        return parent::getCreateFormAction()->keyBindings([]);
    }
}
