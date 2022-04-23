<?php declare(strict_types=1);

namespace App\Backend\Product;

use Filament\Resources\Pages\CreateRecord;

final class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;
}
