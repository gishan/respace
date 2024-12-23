<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class HomeFeaturesBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('home_features')
            ->label('Home | Features')
            ->schema([
                Repeater::make('features')
                    ->label('Features')
                    ->schema([
                        TextInput::make('icon')
                            ->label('Icon Name')
                            ->required()
                            ->helperText('Icon component name (e.g., fa fa-store, fa fa-truck, etc.)'),
                        
                        TextInput::make('title')
                            ->label('Title')
                            ->required()
                            ->maxLength(100),
                        
                        Textarea::make('description')
                            ->label('Description')
                            ->required()
                            ->maxLength(200),
                    ])
                    ->defaultItems(4)
                    ->maxItems(4)
                    ->columnSpanFull()
            ]);
    }
}
