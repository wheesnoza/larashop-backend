<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers\VariantsRelationManager;
use App\Shared\Models\Product;
use Filament\Forms\Components\HasManyRepeater;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength('255'),
                TextInput::make('description')
                    ->nullable()
                    ->maxLength('255'),
                HasManyRepeater::make('variants')
                    ->relationship('variants')
                    ->schema([
                        TextInput::make('name'),
                        TextInput::make('price')
                            ->integer(),
                        TextInput::make('color')
                            ->required()
                            ->maxLength(20),
                        TextInput::make('height')
                            ->required()
                            ->numeric(),
                        TextInput::make('width')
                            ->required()
                            ->numeric(),
                        TextInput::make('weight')
                            ->required()
                            ->numeric(),
                    ])
                    ->minItems(1)
                    ->columns(2)
                    ->disableItemMovement()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label(__('product.id')),
                Tables\Columns\TextColumn::make('uuid')->label(__('product.uuid')),
                Tables\Columns\TextColumn::make('name')->label(__('product.name')),
                Tables\Columns\TextColumn::make('created_at')->label(__('product.created_at')),
                Tables\Columns\TextColumn::make('updated_at')->label(__('product.updated_at')),
            ])
            ->defaultSort('created_at');
    }

    public static function getRelations(): array
    {
        return [
            VariantsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
