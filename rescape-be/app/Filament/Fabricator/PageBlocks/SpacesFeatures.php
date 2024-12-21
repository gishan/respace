<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class SpacesFeatures extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('spaces_features')
            ->label('Spaces | Features')
            ->schema([
                TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->default('Why Choose Our Spaces')
                    ->maxLength(100)
                    ->helperText('The main heading for the features section'),

                TextInput::make('subtitle')
                    ->label('Subtitle')
                    ->required()
                    ->default('Everything you need for a successful brand activation')
                    ->maxLength(200)
                    ->helperText('A brief description below the title'),

                Repeater::make('features')
                    ->label('Features')
                    ->schema([
                        FileUpload::make('icon')
                            ->label('Feature Icon')
                            ->image()
                            ->directory('feature-icons')
                            ->visibility('public')
                            ->preserveFilenames()
                            ->maxSize(1024), // 1MB

                        TextInput::make('title')
                            ->label('Feature Title')
                            ->required()
                            ->maxLength(100),

                        TextInput::make('description')
                            ->label('Feature Description')
                            ->required()
                            ->maxLength(200),
                    ])
                    ->defaultItems(6)
                    ->minItems(1)
                    ->maxItems(6)
                    ->collapsible()
                    ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
            ]);
    }

    public static function mutateData(array $data): array
    {
        $defaultFeatures = [
            [
                'icon' => null,
                'title' => 'Increase traffic to your venue',
                'description' => 'Drive more footfall to your location'
            ],
            [
                'icon' => null,
                'title' => 'Opportunity to upsell',
                'description' => 'Increase your revenue with additional sales'
            ],
            [
                'icon' => null,
                'title' => 'Build customer loyalty',
                'description' => 'Create lasting relationships with your customers'
            ],
            [
                'icon' => null,
                'title' => 'Free advertising',
                'description' => 'Get exposure through our marketing channels'
            ],
            [
                'icon' => null,
                'title' => 'Higher average spend',
                'description' => 'Customers tend to spend more on unique experiences'
            ],
            [
                'icon' => null,
                'title' => 'Free marketing',
                'description' => 'Benefit from our extensive marketing efforts'
            ]
        ];

        return [
            ...parent::mutateData($data),
            'title' => $data['title'] ?? 'Why Choose Our Spaces',
            'subtitle' => $data['subtitle'] ?? 'Everything you need for a successful brand activation',
            'features' => $data['features'] ?? $defaultFeatures,
        ];
    }
}
