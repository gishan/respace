<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class ForBrandsMainHeroBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('for_brands_main_hero')
            ->label('For Brands | Main Hero')
            ->schema([
                TextInput::make('title')
                    ->default("Activate Your\nExcess Space.")
                    ->required(),

                Textarea::make('description')
                    ->default("WeStock is the one-stop platform for connecting your brand directly with your audience, so your community online can translate to your success on store shelves and beyond.")
                    ->required(),

                TextInput::make('buttonText')
                    ->default("Find My Space")
                    ->required(),

                TextInput::make('buttonLink')
                    ->default("/contact")
                    ->required(),

                FileUpload::make('image')
                    ->image()
                    ->directory('hero-images')
                    ->nullable(),

                FileUpload::make('bgImage')
                    ->image()
                    ->directory('hero-images')
                    ->nullable(),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
