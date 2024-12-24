<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tabs;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class LayoutBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('layout')
            ->label('Layout Configuration')
            ->schema([
                Tabs::make('Layout Configuration')
                    ->tabs([
                        // Header/Navigation Tab
                        Tabs\Tab::make('Header')
                            ->schema([
                                TextInput::make('logo_text')
                                    ->label('Logo Text')
                                    ->required()
                                    ->default('Respace')
                                    ->maxLength(50),
                                Repeater::make('nav_links')
                                    ->label('Navigation Links')
                                    ->schema([
                                        TextInput::make('label')
                                            ->required()
                                            ->maxLength(50),
                                        TextInput::make('url')
                                            ->required()
                                            ->maxLength(100),
                                    ])
                                    ->defaultItems(5)
                                    ->default([
                                        ['label' => 'Home', 'url' => '/'],
                                        ['label' => 'About', 'url' => '/about'],
                                        ['label' => 'Terms & Privacy', 'url' => '/terms'],
                                        ['label' => 'FAQ', 'url' => '/faq'],
                                        ['label' => 'Contact Us', 'url' => '/contact'],
                                    ])
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => $state['label'] ?? null),
                            ]),

                        // Footer Tab
                        Tabs\Tab::make('Footer')
                            ->schema([
                                // Company Info Section
                                TextInput::make('footer_company_name')
                                    ->label('Company Name')
                                    ->required()
                                    ->default('Rescape')
                                    ->maxLength(50),
                                TextInput::make('footer_company_description')
                                    ->label('Company Description')
                                    ->required()
                                    ->default('Your ultimate destination for finding the perfect space for your needs.')
                                    ->maxLength(200),

                                // Quick Links Section
                                Repeater::make('quick_links')
                                    ->label('Quick Links')
                                    ->schema([
                                        TextInput::make('label')
                                            ->required()
                                            ->maxLength(50),
                                        TextInput::make('url')
                                            ->required()
                                            ->maxLength(100),
                                    ])
                                    ->defaultItems(2)
                                    ->default([
                                        ['label' => 'About Us', 'url' => '/about'],
                                        ['label' => 'Terms & Privacy', 'url' => '/terms'],
                                    ])
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => $state['label'] ?? null),

                                // Services Section
                                Repeater::make('services')
                                    ->label('Services')
                                    ->schema([
                                        TextInput::make('label')
                                            ->required()
                                            ->maxLength(50),
                                        TextInput::make('url')
                                            ->required()
                                            ->maxLength(100),
                                    ])
                                    ->defaultItems(4)
                                    ->default([
                                        ['label' => 'Space Rental', 'url' => '#'],
                                        ['label' => 'Event Venues', 'url' => '#'],
                                        ['label' => 'Office Spaces', 'url' => '#'],
                                        ['label' => 'Meeting Rooms', 'url' => '#'],
                                    ])
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => $state['label'] ?? null),

                                // Contact Info Section
                                TextInput::make('contact_address_line1')
                                    ->label('Address Line 1')
                                    ->default('123 Business Street')
                                    ->maxLength(100),
                                TextInput::make('contact_address_line2')
                                    ->label('Address Line 2')
                                    ->default('City, State 12345')
                                    ->maxLength(100),
                                TextInput::make('contact_email')
                                    ->label('Email')
                                    ->email()
                                    ->default('contact@rescape.com')
                                    ->maxLength(100),
                                TextInput::make('contact_phone')
                                    ->label('Phone')
                                    ->tel()
                                    ->default('(123) 456-7890')
                                    ->maxLength(20),

                                // Social Media Links
                                Repeater::make('social_links')
                                    ->label('Social Media Links')
                                    ->schema([
                                        TextInput::make('platform')
                                            ->required()
                                            ->maxLength(50),
                                        TextInput::make('url')
                                            ->required()
                                            ->url()
                                            ->maxLength(200),
                                        TextInput::make('icon')
                                            ->required()
                                            ->default('fa fa-facebook')
                                            ->maxLength(50)
                                            ->helperText('Font Awesome class name (e.g., fa fa-facebook)'),
                                    ])
                                    ->defaultItems(4)
                                    ->default([
                                        ['platform' => 'Facebook', 'url' => '#', 'icon' => 'fa fa-facebook'],
                                        ['platform' => 'Twitter', 'url' => '#', 'icon' => 'fa fa-twitter'],
                                        ['platform' => 'Instagram', 'url' => '#', 'icon' => 'fa fa-instagram'],
                                        ['platform' => 'LinkedIn', 'url' => '#', 'icon' => 'fa fa-linkedin'],
                                    ])
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => $state['platform'] ?? null),
                            ]),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return [
            ...parent::mutateData($data),
            'logo_text' => $data['logo_text'] ?? 'Respace',
            'nav_links' => $data['nav_links'] ?? [],
            'footer_company_name' => $data['footer_company_name'] ?? 'Rescape',
            'footer_company_description' => $data['footer_company_description'] ?? 'Your ultimate destination for finding the perfect space for your needs.',
            'quick_links' => $data['quick_links'] ?? [],
            'services' => $data['services'] ?? [],
            'contact_address_line1' => $data['contact_address_line1'] ?? '123 Business Street',
            'contact_address_line2' => $data['contact_address_line2'] ?? 'City, State 12345',
            'contact_email' => $data['contact_email'] ?? 'contact@rescape.com',
            'contact_phone' => $data['contact_phone'] ?? '(123) 456-7890',
            'social_links' => $data['social_links'] ?? [],
        ];
    }
}
