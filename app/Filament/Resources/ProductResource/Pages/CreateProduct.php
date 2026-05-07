<?php

namespace App\Filament\Resources\ProductResource\Pages;

use Afea\Cms\Core\Concerns\InteractsWithSeoForm;
use App\Filament\Resources\ProductResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    use InteractsWithSeoForm;

    protected static string $resource = ProductResource::class;
}
