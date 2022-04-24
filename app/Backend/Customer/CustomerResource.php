<?php declare(strict_types=1);

namespace App\Backend\Customer;

use App\Shared\Models\Customer;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

final class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function getLabel(): string
    {
        return '顧客';
    }

    public static function getPluralLabel(): string
    {
        return '顧客';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Toggle::make('suspended')
                    ->label('アカウント停止する')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID'),
                Tables\Columns\TextColumn::make('full_name')->label('氏名'),
                Tables\Columns\TextColumn::make('email')->label('メールアドレス'),
                Tables\Columns\BooleanColumn::make('suspended')
                    ->trueIcon('heroicon-o-x-circle')
                    ->falseIcon('heroicon-o-check-circle')
                    ->trueColor('danger')
                    ->falseColor('success')
                    ->label('有効'),
                Tables\Columns\TextColumn::make('created_at')->label('登録日時'),
                Tables\Columns\TextColumn::make('updated_at')->label('更新日時'),
            ])
            ->defaultSort('created_at');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCustomers::route('/'),
            'edit' => EditCustomer::route('/{record}/edit'),
        ];
    }
}
