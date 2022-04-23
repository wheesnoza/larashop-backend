<?php declare(strict_types=1);

namespace App\Backend\Customer;

use Filament\Resources\Pages\ListRecords;

final class ListCustomers extends ListRecords
{
    protected static string $resource = CustomerResource::class;
}
