<?php declare(strict_types=1);

namespace App\Backend\Order;

use Filament\Resources\Pages\ViewRecord;

final class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;
}
