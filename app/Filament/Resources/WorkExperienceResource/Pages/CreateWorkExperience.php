<?php

namespace App\Filament\Resources\WorkExperienceResource\Pages;

use App\Filament\Resources\WorkExperienceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWorkExperience extends CreateRecord
{
    protected static string $resource = WorkExperienceResource::class;

    public function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->user()->id;
        return $data;
    }
}
