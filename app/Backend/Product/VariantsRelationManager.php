<?php declare(strict_types=1);

namespace App\Backend\Product;

use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

final class VariantsRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'variants';

    protected static ?string $recordTitleAttribute = 'id';

    /**
     * @return string|null
     */
    public static function getPluralLabel(): ?string
    {
        return '種類';
    }

    /**
     * @return string|null
     */
    public static function getLabel(): ?string
    {
        return '種類';
    }

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
}
