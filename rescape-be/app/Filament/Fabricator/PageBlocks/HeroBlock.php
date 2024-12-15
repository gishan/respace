<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class HeroBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('hero')
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                RichEditor::make('description')
                    ->required()
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'link',
                    ]),
                FileUpload::make('background_image')
                    ->image()
                    ->required()
                    ->directory('hero-images')
                    ->maxSize(5120) // 5MB
                    ->helperText('Recommended size: 1920x1080px. Max size: 5MB'),
                TextInput::make('cta_text')
                    ->label('Call to Action Text')
                    ->required()
                    ->maxLength(50),
                TextInput::make('cta_link')
                    ->label('Call to Action Link')
                    ->required()
                    ->url(),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
