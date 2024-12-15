<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class NewsletterBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('newsletter')
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
                TextInput::make('button_text')
                    ->required()
                    ->default('Subscribe')
                    ->maxLength(50),
                TextInput::make('success_message')
                    ->required()
                    ->default('Thank you for subscribing!')
                    ->maxLength(255),
                TextInput::make('placeholder_text')
                    ->required()
                    ->default('Enter your email')
                    ->maxLength(100),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
