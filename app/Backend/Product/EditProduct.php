<?php declare(strict_types=1);

namespace App\Backend\Product;

use Filament\Resources\Pages\EditRecord;

final class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;
}
