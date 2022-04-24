<?php declare(strict_types=1);

namespace App\Backend\Administrator;

use App\Shared\Models\Administrator;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;

final class AdministratorResource extends Resource
{
    protected static ?string $model = Administrator::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function getLabel(): string
    {
        return '管理者';
    }

    public static function getPluralLabel(): string
    {
        return '管理者';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('email')->email()->required()->label('メールアドレス')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID'),
                TextColumn::make('name')->label('氏名'),
                TextColumn::make('email')->label('メールアドレス'),
                TextColumn::make('created_at')->label('登録日時'),
                TextColumn::make('updated_at')->label('更新日時'),
            ])
            ->defaultSort('created_at');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAdministrators::route('/'),
        ];
    }
}
