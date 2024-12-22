<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class AboutUsBeforeAfter extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('about_us_before_after')
            ->label('About Us | Before After')
            ->schema([
                TextInput::make('before_title')
                    ->label('Before Title')
                    ->required()
                    ->maxLength(100)
                    ->default('Life at Rescape')
                    ->helperText('Title for both sections'),
                
                Textarea::make('before_content')
                    ->label('Before Content')
                    ->required()
                    ->maxLength(500)
                    ->default('Our automated discovery engine helps you find and organise relevant partners quickly, all in one place.')
                    ->helperText('Content for both sections'),

                FileUpload::make('before_image')
                    ->label('Before Image')
                    ->image()
                    ->imageCropAspectRatio('720:600')
                    ->imageResizeTargetWidth(720)
                    ->imageResizeTargetHeight(600)
                    ->directory('before-after')
                    ->required()
                    ->helperText('Image for both sections'),
                
                TextInput::make('after_title')
                    ->label('After Title')
                    ->required()
                    ->maxLength(100)
                    ->default('Life at Rescape')
                    ->helperText('Title for both sections'),
                
                Textarea::make('after_content')
                    ->label('After Content')
                    ->required()
                    ->maxLength(500)
                    ->default('Our automated discovery engine helps you find and organise relevant partners quickly, all in one place.')
                    ->helperText('Content for both sections'),

                FileUpload::make('after_image')
                    ->label('After Image')
                    ->image()
                    ->imageCropAspectRatio('720:600')
                    ->imageResizeTargetWidth(720)
                    ->imageResizeTargetHeight(600)
                    ->directory('before-after')
                    ->required()
                    ->helperText('Image for both sections'),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
