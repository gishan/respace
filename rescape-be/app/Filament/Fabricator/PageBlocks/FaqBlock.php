<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class FaqBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('faq')
            ->schema([
                Select::make('type')
                    ->options([
                        'brand' => 'Brand FAQs',
                        'space' => 'Space FAQs',
                    ])
                    ->required(),
                
                Repeater::make('faqs')
                    ->schema([
                        TextInput::make('question')
                            ->required()
                            ->maxLength(255),
                        RichEditor::make('answer')
                            ->required()
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'link',
                                'bulletList',
                                'orderedList',
                            ]),
                    ])
                    ->collapsible()
                    ->defaultItems(1)
                    ->reorderable()
                    ->required()
                    ->minItems(1),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
