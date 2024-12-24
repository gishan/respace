<?php

namespace App\Filament\Resources\SpaceSubmissionResource\Pages;

use App\Filament\Resources\SpaceSubmissionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSpaceSubmission extends EditRecord
{
    protected static string $resource = SpaceSubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
