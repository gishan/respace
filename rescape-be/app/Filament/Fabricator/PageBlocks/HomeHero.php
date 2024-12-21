<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class HomeHero extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('home_hero')
            ->label('Home | Hero')
            ->schema([
                TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->default('Activate Your Excess Space.')
                    ->maxLength(100)
                    ->helperText('The main heading for the hero section'),

                Textarea::make('description')
                    ->label('Description')
                    ->required()
                    ->default('WeStock is the one-stop platform for connecting your brand directly with your audience, so your community online can translate to your success on store shelves and beyond.')
                    ->maxLength(300)
                    ->helperText('A brief description below the title'),

                TextInput::make('button_text')
                    ->label('Button Text')
                    ->required()
                    ->default('Find My Space')
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
                    ->helperText('The main image to display in the hero section (recommended size: 720x600px)')
            ]);
    }

    public static function mutateData(array $data): array
    {
        return [
            ...parent::mutateData($data),
            'title' => $data['title'] ?? 'Activate Your Excess Space.',
            'description' => $data['description'] ?? 'WeStock is the one-stop platform for connecting your brand directly with your audience, so your community online can translate to your success on store shelves and beyond.',
            'button_text' => $data['button_text'] ?? 'Find My Space',
            'button_link' => $data['button_link'] ?? '/contact',
            'image' => $data['image'] ?? null,
        ];
    }
}
