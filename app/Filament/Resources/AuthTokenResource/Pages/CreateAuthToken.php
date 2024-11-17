<?php

namespace App\Filament\Resources\AuthTokenResource\Pages;

use App\Filament\Resources\AuthTokenResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAuthToken extends CreateRecord
{
    protected static string $resource = AuthTokenResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['plain_text'] = auth()->user()->createToken('authToken')->plainTextToken;
        $data['user_id'] = auth()->user()->id;
        return $data;
    }
}
