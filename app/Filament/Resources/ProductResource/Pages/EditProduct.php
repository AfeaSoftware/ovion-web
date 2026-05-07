<?php

namespace App\Filament\Resources\ProductResource\Pages;

use Afea\Cms\Core\Concerns\InteractsWithSeoForm;
use App\Filament\Resources\ProductResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    use InteractsWithSeoForm;

    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
