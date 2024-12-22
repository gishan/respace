<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class AboutUsReviews extends PageBlock
{   
    public static function getBlockSchema(): Block
    {
        return Block::make('about_us_reviews')
            ->label('About Us | Reviews')
            ->schema([
                Repeater::make('reviews')
                    ->schema([
                        FileUpload::make('image')
                            ->image()
                            ->imageCropAspectRatio("1:1") // Crop images to this certain aspect ratio when they are uploaded, e.g: '1:1'.
                            ->imagePreviewHeight(50) // Set the height of the image preview in pixels.
                            ->imageResizeTargetHeight(50) // Resize images to this height (in pixels) when they are uploaded.
                            ->imageResizeTargetWidth(50) 
                            ->directory('reviews')
                            ->required()
                            ->helperText('Reviewer\'s profile image'),
                        Textarea::make('content')
                            ->required()
                            ->maxLength(500)
                            ->helperText('The review content')
                    ])
                    ->defaultItems(1)
                    ->reorderable()
                    ->collapsible()
                    ->itemLabel(fn (array $state): ?string => substr($state['content'] ?? '', 0, 50) . '...')
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
