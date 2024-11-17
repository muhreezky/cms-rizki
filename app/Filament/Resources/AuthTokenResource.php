<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AuthTokenResource\Pages;
use App\Filament\Resources\AuthTokenResource\RelationManagers;
use App\Models\AuthToken;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AuthTokenResource extends Resource
{
    protected static ?string $model = AuthToken::class;

    protected static ?string $navigationIcon = 'heroicon-s-key';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\Select::make('user_id')
                //     ->required()->native(false)->searchable()
                //     ->relationship('user', 'name')
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->user()->id);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('plain_text'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public function generateToken()
    {
        auth()->user()->createToken('authToken');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function canEdit(Model $record): bool 
    {
        return false;
    }

    public static function canDelete(Model $record): bool 
    {
        return true;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAuthTokens::route('/'),
            'create' => Pages\CreateAuthToken::route('/create'),
            'edit' => Pages\EditAuthToken::route('/{record}/edit'),
        ];
    }
}
