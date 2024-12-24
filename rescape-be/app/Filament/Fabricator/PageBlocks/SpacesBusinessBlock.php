<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class SpacesBusinessBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('spaces-business')
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->default('Ready to Get Started?'),
                TextInput::make('subtitle')
                    ->required()
                    ->maxLength(255)
                    ->default('Take the first step towards your perfect retail space'),
                TextInput::make('description')
                    ->required()
                    ->maxLength(255)
                    ->default('Connect with our team to find the ideal space for your brand.'),
                TextInput::make('button_text')
                    ->required()
                    ->maxLength(50)
                    ->default('Contact Us'),
                TextInput::make('button_link')
                    ->required()
                    ->url()
                    ->default('/contact'),
                FileUpload::make('image')
                    ->image()
                    ->directory('business-images')
                    ->maxSize(5120) // 5MB
                    ->helperText('Recommended size: 16:9 ratio. Max size: 5MB'),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
