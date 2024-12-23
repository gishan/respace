<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class HomePartnershipsBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('home_partnerships')
            ->label('Home | Partnerships')
            ->schema([
                Repeater::make('partnerships')
                    ->label('Partnerships')
                    ->schema([
                        TextInput::make('title')
                            ->label('Title')
                            ->required()
                            ->maxLength(100),
                        
                        FileUpload::make('image')
                            ->label('Partnership Image')
                            ->image()
                            ->directory('partnership-images')
                            ->visibility('public')
                            ->preserveFilenames()
                            ->required(),
                    ])
                    ->defaultItems(5)
                    ->maxItems(5)
                    ->columnSpanFull()
            ]);
    }
}
