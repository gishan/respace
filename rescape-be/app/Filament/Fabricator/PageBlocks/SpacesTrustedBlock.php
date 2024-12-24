<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class SpacesTrustedBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('spaces-trusted')
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->default('Trusted by Leading Brands'),
                TextInput::make('subtitle')
                    ->required()
                    ->maxLength(255)
                    ->default('Join the brands that trust us with their retail presence'),
                Repeater::make('brands')
                    ->schema([
                        FileUpload::make('logo')
                            ->image()
                            ->required()
                            ->directory('brand-logos')
                            ->maxSize(1024) // 1MB
                            ->helperText('Recommended size: 128x64px. Max size: 1MB'),
                        TextInput::make('name')
                            ->required()
                            ->maxLength(100),
                        TextInput::make('link')
                            ->url(),
                    ])
                    ->defaultItems(4)
                    ->maxItems(8)
                    ->collapsible()
                    ->itemLabel(fn (array $state): ?string => $state['name'] ?? null),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
