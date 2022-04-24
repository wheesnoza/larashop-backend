<?php declare(strict_types=1);

namespace App\Backend\Administrator;

use Filament\Resources\Pages\ListRecords;

final class ListAdministrators extends ListRecords
{
    protected static string $resource = AdministratorResource::class;
}
