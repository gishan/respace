<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class HomeNewsletterBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('home_newsletter')
            ->label('Home | Newsletter')
            ->schema([
                TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->default('Subscribe to Our Newsletter')
                    ->maxLength(100),

                Textarea::make('description')
                    ->label('Description')
                    ->required()
                    ->default('Stay updated with our latest spaces and exclusive offers. Join our community today!')
                    ->maxLength(200),

                TextInput::make('buttonText')
                    ->label('Button Text')
                    ->required()
                    ->default('Subscribe')
                    ->maxLength(50),

                TextInput::make('inputPlaceholder')
                    ->label('Input Placeholder')
                    ->required()
                    ->default('Enter your email')
                    ->maxLength(50),

                TextInput::make('successMessage')
                    ->label('Success Message')
                    ->required()
                    ->default('Thank you for subscribing! 🎉')
                    ->maxLength(100),

                TextInput::make('errorMessage')
                    ->label('Error Message')
                    ->required()
                    ->default('Oops! Something went wrong. Please try again.')
                    ->maxLength(100),

                TextInput::make('loadingText')
                    ->label('Loading Text')
                    ->required()
                    ->default('Subscribing...')
                    ->maxLength(50),
            ]);
    }
}
