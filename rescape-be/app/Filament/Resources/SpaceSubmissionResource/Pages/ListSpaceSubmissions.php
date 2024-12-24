<?php

namespace App\Filament\Resources\SpaceSubmissionResource\Pages;

use App\Filament\Resources\SpaceSubmissionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSpaceSubmissions extends ListRecords
{
    protected static string $resource = SpaceSubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
