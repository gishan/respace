<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class HomePartnerships extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('home_partnerships')
            ->label('Home | Partnerships')
            ->schema([
                Repeater::make('partnerships')
                    ->label('Partnerships')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Partnership Image')
                            ->image()
                            ->directory('partnership-images')
                            ->visibility('public')
                            ->preserveFilenames()
                            ->maxSize(5120) // 5MB
                            ->required()
                            ->helperText('Background image for the partnership card'),
                        
                        TextInput::make('title')
                            ->label('Title')
                            ->required()
                            ->maxLength(100)
                            ->helperText('Title to display on the bottom left of the image'),
                    ])
                    ->defaultItems(5)
                    ->minItems(1)
                    ->maxItems(5)
                    ->collapsible()
                    ->itemLabel(fn (array $state): ?string => $state['title'] ?? null),
            ]);
    }

    public static function mutateData(array $data): array
    {
        $defaultPartnerships = array_map(
            fn($i) => [
                'image' => null,
                'title' => "Partnership " . ($i + 1),
            ],
            range(0, 4)
        );

        return [
            ...parent::mutateData($data),
            'partnerships' => $data['partnerships'] ?? $defaultPartnerships,
        ];
    }
}
