<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class ForBrandsHeroBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('for_brands_hero')
            ->label('For Brands | Hero')
            ->schema([
                TextInput::make('title')
                    ->label('Main Title')
                    ->required()
                    ->default('ALL entrepreneurs deserve the opportunity to connect with customers IRL.')
                    ->maxLength(255),
                Textarea::make('description')
                    ->label('Description')
                    ->required()
                    ->default("No leases. No brokers. No hassle.\n\nUpon approval, find spaces that match with your values as a brand. Your brand can plug-in to excess wall, floor, or shelf space, and take advantage of the high foot traffic already in place.")
                    ->rows(4),
                Repeater::make('icons')
                    ->label('Icons')
                    ->schema([
                        TextInput::make('icon')
                            ->label('Icon Class')
                            ->required()
                            ->placeholder('fa-solid fa-store')
                            ->helperText('FontAwesome icon class (e.g., fa-solid fa-store)')
                    ])
                    ->defaultItems(3)
                    ->minItems(1)
                    ->maxItems(6)
                    ->columns(1),
                FileUpload::make('background_image')
                    ->label('Background Image')
                    ->image()
                    ->required()
                    ->directory('hero-images')
                    ->maxSize(5120) // 5MB
                    ->helperText('Recommended size: 1920x1080px. Max size: 5MB'),
            ]);
    }

    public static function mutateData(array $data): array
    {
        // Transform the icons array to match the frontend format
        if (isset($data['icons']) && is_array($data['icons'])) {
            $data['icons'] = array_map(function ($item) {
                return $item['icon'];
            }, $data['icons']);
        }

        return $data;
    }
}
