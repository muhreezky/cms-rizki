<?php

namespace App\Filament\Resources\AuthTokenResource\Pages;

use App\Filament\Resources\AuthTokenResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAuthToken extends EditRecord
{
    protected static string $resource = AuthTokenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
