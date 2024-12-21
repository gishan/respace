<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class SpacesHero extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('spaces_hero')
            ->label('Spaces | Hero')
            ->schema([
                TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->default('Find Your Perfect Space')
                    ->maxLength(100)
                    ->helperText('The main heading for the spaces hero section'),

                TextInput::make('subtitle')
                    ->label('Subtitle')
                    ->required()
                    ->default('Discover unique retail spaces for your brand')
                    ->maxLength(200)
                    ->helperText('A brief description below the title'),

                TextInput::make('button_text')
                    ->label('Button Text')
                    ->required()
                    ->default('Get Started')
                    ->maxLength(50)
                    ->helperText('Text to display on the call-to-action button'),

                TextInput::make('button_link')
                    ->label('Button Link')
                    ->required()
                    ->default('/contact')
                    ->maxLength(255)
                    ->helperText('URL where the button should link to'),

                FileUpload::make('image')
                    ->label('Hero Image')
                    ->image()
                    ->directory('hero-images')
                    ->visibility('public')
                    ->preserveFilenames()
                    ->maxSize(5120) // 5MB
                    ->helperText('The main image to display in the hero section (recommended size: 800x600px)')
            ]);
    }

    public static function mutateData(array $data): array
    {
        return [
            ...parent::mutateData($data),
            'title' => $data['title'] ?? 'Find Your Perfect Space',
            'subtitle' => $data['subtitle'] ?? 'Discover unique retail spaces for your brand',
            'button_text' => $data['button_text'] ?? 'Get Started',
            'button_link' => $data['button_link'] ?? '/contact',
            'image' => $data['image'] ?? null,
        ];
    }
}
