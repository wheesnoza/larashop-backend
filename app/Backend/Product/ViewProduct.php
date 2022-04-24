<?php declare(strict_types=1);

namespace App\Backend\Product;

use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Pages\ViewRecord;

final class ViewProduct extends ViewRecord
{
    protected static string $resource = ProductResource::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('description')
                    ->nullable()
                    ->maxLength(255),
            ]);
    }
}
