<?php

namespace App\Filament\Resources\BrandInquiryResource\Pages;

use App\Filament\Resources\BrandInquiryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBrandInquiry extends CreateRecord
{
    protected static string $resource = BrandInquiryResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
