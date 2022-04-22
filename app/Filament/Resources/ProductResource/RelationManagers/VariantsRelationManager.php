<?php

namespace App\Filament\Resources\ProductResource\RelationManagers;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class VariantsRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'variants';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('price')->money('jpy'),
                Tables\Columns\TextColumn::make('color'),
                Tables\Columns\TextColumn::make('height'),
                Tables\Columns\TextColumn::make('width'),
                Tables\Columns\TextColumn::make('weight'),
                Tables\Columns\BooleanColumn::make('active'),
            ])
            ->filters([
                Filter::make('active')
                    ->query(fn (Builder $query): Builder => $query->where('active', true)),
                Filter::make('price')
                    ->form([
                        TextInput::make('price')->numeric()
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when($data['price'], fn (Builder $query, $price): Builder => $query->wherePrice('price', '>=', $price));
                    })
            ]);
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['uuid'] = Str::uuid();

        return $data;
    }
}
