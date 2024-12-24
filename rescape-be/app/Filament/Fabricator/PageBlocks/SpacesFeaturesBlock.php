<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class SpacesFeaturesBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('spaces-features')
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                TextInput::make('subtitle')
                    ->required()
                    ->maxLength(255),
                Repeater::make('features')
                    ->schema([
                        TextInput::make('icon')
                            ->required()
                            ->maxLength(100),
                        TextInput::make('title')
                            ->required()
                            ->maxLength(100),
                        TextInput::make('description')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->defaultItems(3)
                    ->maxItems(6)
                    ->collapsible()
                    ->itemLabel(fn (array $state): ?string => $state['title'] ?? null),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
