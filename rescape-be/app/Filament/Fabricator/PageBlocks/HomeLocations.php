<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class HomeLocations extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('home_locations')
            ->label('Home | Locations')
            ->schema([
                Repeater::make('locations')
                    ->label('Locations')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Location Image')
                            ->image()
                            ->directory('location-images')
                            ->visibility('public')
                            ->preserveFilenames()
                            ->maxSize(5120) // 5MB
                            ->required(),
                        
                        TextInput::make('title1')
                            ->label('Top Title')
                            ->required()
                            ->maxLength(100),
                        
                        TextInput::make('title2')
                            ->label('Bottom Title')
                            ->required()
                            ->maxLength(100),

                        Select::make('col_span')
                            ->label('Column Span')
                            ->options([
                                'col-span-1' => 'Small (1 Column)',
                                'col-span-2' => 'Medium (2 Columns)',
                                'col-span-3' => 'Large (Full Width)',
                            ])
                            ->required()
                            ->default('col-span-1'),
                    ])
                    ->defaultItems(3)
                    ->minItems(1)
                    ->maxItems(6)
                    ->collapsible()
                    ->itemLabel(fn (array $state): ?string => $state['title1'] ?? null),
            ]);
    }

    public static function mutateData(array $data): array
    {
        $defaultLocations = [
            [
                'image' => null,
                'title1' => 'Location Title 1',
                'title2' => 'Location Description 1',
                'col_span' => 'col-span-2'
            ],
            [
                'image' => null,
                'title1' => 'Location Title 2',
                'title2' => 'Location Description 2',
                'col_span' => 'col-span-1'
            ],
            [
                'image' => null,
                'title1' => 'Location Title 3',
                'title2' => 'Location Description 3',
                'col_span' => 'col-span-3'
            ]
        ];

        return [
            ...parent::mutateData($data),
            'locations' => $data['locations'] ?? $defaultLocations,
        ];
    }
}
