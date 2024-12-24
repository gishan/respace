<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class SpacesHeroBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('spaces-hero')
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                TextInput::make('subtitle')
                    ->required()
                    ->maxLength(255),
                TextInput::make('button_text')
                    ->required()
                    ->maxLength(50),
                TextInput::make('button_link')
                    ->required()
                    ->url(),
                FileUpload::make('image')
                    ->image()
                    ->directory('spaces-hero-images')
                    ->maxSize(5120) // 5MB
                    ->helperText('Recommended size: 1920x1080px. Max size: 5MB'),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
