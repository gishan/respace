<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class BeforeAfterBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('before_after')
            ->schema([
                Grid::make(2)
                    ->schema([
                        // Before Section
                        Grid::make(1)
                            ->schema([
                                TextInput::make('before_title')
                                    ->label('Before Title')
                                    ->default('Life before Breezy')
                                    ->required()
                                    ->maxLength(255),
                                RichEditor::make('before_content')
                                    ->label('Before Content')
                                    ->required()
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'link',
                                    ]),
                                FileUpload::make('before_image')
                                    ->label('Before Image')
                                    ->image()
                                    ->required()
                                    ->directory('before-after-images')
                                    ->maxSize(5120) // 5MB
                                    ->helperText('Recommended size: 800x600px. Max size: 5MB'),
                                TextInput::make('before_image_alt')
                                    ->label('Before Image Alt Text')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('before_highlight')
                                    ->label('Highlighted Text')
                                    ->required()
                                    ->default('35% of their time')
                                    ->maxLength(255),
                            ]),

                        // After Section
                        Grid::make(1)
                            ->schema([
                                TextInput::make('after_title')
                                    ->label('After Title')
                                    ->default('Life after Breezy')
                                    ->required()
                                    ->maxLength(255),
                                RichEditor::make('after_content')
                                    ->label('After Content')
                                    ->required()
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'link',
                                    ]),
                                FileUpload::make('after_image')
                                    ->label('After Image')
                                    ->image()
                                    ->required()
                                    ->directory('before-after-images')
                                    ->maxSize(5120) // 5MB
                                    ->helperText('Recommended size: 800x600px. Max size: 5MB'),
                                TextInput::make('after_image_alt')
                                    ->label('After Image Alt Text')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('after_highlight')
                                    ->label('Highlighted Text')
                                    ->required()
                                    ->default('way more quickly')
                                    ->maxLength(255),
                            ]),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
