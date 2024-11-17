<?php

namespace App\Filament\Resources\AuthTokenResource\Pages;

use App\Filament\Resources\AuthTokenResource;
use App\Models\AuthToken;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAuthTokens extends ListRecords
{
    protected static string $resource = AuthTokenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
            Actions\Action::make('gen_token')->label('Generate API Token')
                ->action('generateToken')
        ];
    }

    public function generateToken()
    {
        $token = auth()->user()->createToken('authToken');
        $plain = $token->plainTextToken;
        AuthToken::create([
            'plain_text' => $plain,
            'user_id' => auth()->user()->id,
        ]);
    }

    // protected function getListe
}
