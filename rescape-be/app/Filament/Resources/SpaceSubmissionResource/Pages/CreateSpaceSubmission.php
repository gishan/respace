<?php

namespace App\Filament\Resources\SpaceSubmissionResource\Pages;

use App\Filament\Resources\SpaceSubmissionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSpaceSubmission extends CreateRecord
{
    protected static string $resource = SpaceSubmissionResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
