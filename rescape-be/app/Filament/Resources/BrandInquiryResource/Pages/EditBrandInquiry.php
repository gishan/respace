<?php

namespace App\Filament\Resources\BrandInquiryResource\Pages;

use App\Filament\Resources\BrandInquiryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBrandInquiry extends EditRecord
{
    protected static string $resource = BrandInquiryResource::class;

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
