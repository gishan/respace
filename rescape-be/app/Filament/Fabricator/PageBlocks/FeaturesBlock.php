<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class FeaturesBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('features')
            ->schema([
                TextInput::make('section_title')
                    ->required()
                    ->maxLength(255),
                RichEditor::make('section_description')
                    ->required()
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'link',
                    ]),
                Repeater::make('features')
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
                        FileUpload::make('icon')
                            ->image()
                            ->required()
                            ->directory('feature-icons')
                            ->maxSize(1024) // 1MB
                            ->helperText('Recommended size: 64x64px. Max size: 1MB'),
                    ])
                    ->collapsible()
                    ->defaultItems(3)
                    ->reorderable()
                    ->required()
                    ->minItems(1)
                    ->maxItems(6),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
