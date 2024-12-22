<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class HomeNewsletter extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('home_newsletter')
            ->label('Home | Newsletter')
            ->schema([
                TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->maxLength(100)
                    ->default('Subscribe to Our Newsletter'),

                Textarea::make('description')
                    ->label('Description')
                    ->required()
                    ->maxLength(200)
                    ->default('Stay updated with our latest spaces and exclusive offers. Join our community today!'),

                TextInput::make('button_text')
                    ->label('Button Text')
                    ->required()
                    ->maxLength(50)
                    ->default('Subscribe'),

                TextInput::make('input_placeholder')
                    ->label('Email Input Placeholder')
                    ->required()
                    ->maxLength(100)
                    ->default('Enter your email'),

                TextInput::make('success_message')
                    ->label('Success Message')
                    ->required()
                    ->maxLength(100)
                    ->default('Thank you for subscribing! 🎉'),

                TextInput::make('error_message')
                    ->label('Error Message')
                    ->required()
                    ->maxLength(100)
                    ->default('Oops! Something went wrong. Please try again.'),

                TextInput::make('loading_text')
                    ->label('Loading Text')
                    ->required()
                    ->maxLength(50)
                    ->default('Subscribing...'),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return [
            ...parent::mutateData($data),
            'title' => $data['title'] ?? 'Subscribe to Our Newsletter',
            'description' => $data['description'] ?? 'Stay updated with our latest spaces and exclusive offers. Join our community today!',
            'button_text' => $data['button_text'] ?? 'Subscribe',
            'input_placeholder' => $data['input_placeholder'] ?? 'Enter your email',
            'success_message' => $data['success_message'] ?? 'Thank you for subscribing! 🎉',
            'error_message' => $data['error_message'] ?? 'Oops! Something went wrong. Please try again.',
            'loading_text' => $data['loading_text'] ?? 'Subscribing...',
        ];
    }
}
