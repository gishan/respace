<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class PopupBenefitsBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('popup_benefits')
            ->label('For Brands | Popup Benefits')
            ->schema([
                TextInput::make('title')
                    ->label('Section Title')
                    ->required()
                    ->default('WHY DO A POP UP SHOP?')
                    ->maxLength(255),
                Repeater::make('benefits')
                    ->schema([
                        TextInput::make('icon')
                            ->required()
                            ->maxLength(50)
                            ->helperText('Icon name or class'),
                        TextInput::make('title')
                            ->required()
                            ->maxLength(100),
                        TextInput::make('description')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->defaultItems(4)
                    ->minItems(1)
                    ->maxItems(8),
                TextInput::make('cta_text')
                    ->label('Button Text')
                    ->required()
                    ->default('GET A FREE POP UP QUOTE')
                    ->maxLength(50),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
