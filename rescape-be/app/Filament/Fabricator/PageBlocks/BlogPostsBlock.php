<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class BlogPostsBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('blog_posts')
            ->schema([
                // Section Header
                Grid::make(1)
                    ->schema([
                        TextInput::make('section_title')
                            ->label('Section Title')
                            ->default('Latest Blog Posts')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('section_description')
                            ->label('Section Description')
                            ->default('Stay informed with our latest articles and insights')
                            ->required()
                            ->maxLength(255),
                    ]),

                // Blog Posts
                Repeater::make('posts')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        RichEditor::make('excerpt')
                            ->required()
                            ->maxLength(500)
                            ->toolbarButtons([
                                'bold',
                                'italic',
                            ]),
                        FileUpload::make('image')
                            ->image()
                            ->required()
                            ->directory('blog-images')
                            ->maxSize(5120) // 5MB
                            ->helperText('Recommended size: 800x600px. Max size: 5MB'),
                        TextInput::make('author')
                            ->required()
                            ->maxLength(255),
                        DatePicker::make('date')
                            ->required()
                            ->displayFormat('d/m/Y'),
                        TextInput::make('read_time')
                            ->required()
                            ->default('5 min read')
                            ->maxLength(50),
                        TextInput::make('category')
                            ->required()
                            ->maxLength(50),
                        TextInput::make('link')
                            ->label('Post Link')
                            ->required()
                            ->url()
                            ->maxLength(255),
                    ])
                    ->defaultItems(3)
                    ->reorderable()
                    ->collapsible()
                    ->itemLabel(fn (array $state): ?string => $state['title'] ?? null),

                // View All Button
                Grid::make(2)
                    ->schema([
                        TextInput::make('view_all_text')
                            ->label('View All Button Text')
                            ->default('View All Posts')
                            ->required()
                            ->maxLength(50),
                        TextInput::make('view_all_link')
                            ->label('View All Button Link')
                            ->required()
                            ->url()
                            ->maxLength(255),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        // Format dates for frontend
        if (isset($data['posts'])) {
            foreach ($data['posts'] as &$post) {
                if (isset($post['date'])) {
                    $post['date'] = date('Y-m-d', strtotime($post['date']));
                }
            }
        }
        return $data;
    }
}
