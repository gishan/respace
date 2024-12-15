<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Tabs;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class TermsTabsBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('terms_tabs')
            ->schema([
                Tabs::make('Content')
                    ->tabs([
                        Tabs\Tab::make('Terms of Service')
                            ->schema([
                                Repeater::make('terms')
                                    ->schema([
                                        TextInput::make('title')
                                            ->required()
                                            ->maxLength(255),
                                        RichEditor::make('content')
                                            ->required()
                                            ->toolbarButtons([
                                                'bold',
                                                'italic',
                                                'link',
                                                'bulletList',
                                                'orderedList',
                                                'h2',
                                                'h3',
                                            ]),
                                    ])
                                    ->collapsible()
                                    ->defaultItems(1)
                                    ->reorderable()
                                    ->required()
                                    ->minItems(1),
                            ]),
                        
                        Tabs\Tab::make('Privacy Policy')
                            ->schema([
                                Repeater::make('privacy')
                                    ->schema([
                                        TextInput::make('title')
                                            ->required()
                                            ->maxLength(255),
                                        RichEditor::make('content')
                                            ->required()
                                            ->toolbarButtons([
                                                'bold',
                                                'italic',
                                                'link',
                                                'bulletList',
                                                'orderedList',
                                                'h2',
                                                'h3',
                                            ]),
                                    ])
                                    ->collapsible()
                                    ->defaultItems(1)
                                    ->reorderable()
                                    ->required()
                                    ->minItems(1),
                            ]),
                    ]),
                TextInput::make('initial_tab')
                    ->default('terms')
                    ->required()
                    ->in(['terms', 'privacy'])
                    ->helperText('Which tab should be active by default? (terms or privacy)'),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
