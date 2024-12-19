<?php

namespace App\Filament\Resources\BrandInquiryResource\Pages;

use App\Filament\Resources\BrandInquiryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBrandInquiries extends ListRecords
{
    protected static string $resource = BrandInquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
