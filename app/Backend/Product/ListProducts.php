<?php declare(strict_types=1);

namespace App\Backend\Product;

use Filament\Resources\Pages\ListRecords;

final class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;
}
