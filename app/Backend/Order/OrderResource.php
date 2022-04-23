<?php declare(strict_types=1);

namespace App\Backend\Order;

use App\Shared\Models\Order;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

final class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function getLabel(): string
    {
        return '注文';
    }

    public static function getPluralLabel(): string
    {
        return '注文';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID'),
                Tables\Columns\TextColumn::make('uuid')->label('UUID')->limit(8),
                Tables\Columns\BadgeColumn::make('state')->enum([
                    1 => '注文済',
                    2 => '準備中',
                    3 => '配送済',
                    4 => '配達済',
                ])->label('状態'),
                Tables\Columns\BadgeColumn::make('priority')->enum([
                    1 => '高',
                    2 => '中',
                    3 => '低'
                ])->colors([
                    'danger' => 1,
                    'warning' => 2,
                    'success' => 3
                ])->label('優先度'),
                Tables\Columns\TextColumn::make('quantity')->label('注文数'),
                Tables\Columns\TextColumn::make('created_at')->label('注文日時'),
                Tables\Columns\TextColumn::make('updated_at')->label('更新日時'),
            ])
            ->defaultSort('created_at');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListOrders::route('/'),
        ];
    }
}
