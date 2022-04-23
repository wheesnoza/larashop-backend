<?php declare(strict_types=1);

namespace App\Backend\Order;

use Filament\Resources\Pages\ListRecords;

final class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;
}
