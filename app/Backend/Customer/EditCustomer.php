<?php declare(strict_types=1);

namespace App\Backend\Customer;

use Filament\Resources\Pages\EditRecord;

final class EditCustomer extends EditRecord
{
    protected static string $resource = CustomerResource::class;
}
