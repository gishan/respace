<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SpaceSubmissionResource\Pages;
use App\Models\SpaceSubmission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SpaceSubmissionResource extends Resource
{
    protected static ?string $model = SpaceSubmission::class;

    protected static ?string $navigationLabel = 'Space Submissions';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('space_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('location')
                    ->required(),
                Forms\Components\Select::make('space_type')
                    ->required()
                    ->options([
                        'retail' => 'Retail Space',
                        'hospitality' => 'Hospitality Venue',
                        'event' => 'Event Space',
                        'mixed-use' => 'Mixed-Use Location',
                        'other' => 'Other',
                    ]),
                Forms\Components\TextInput::make('space_type_other')
                    ->visible(fn ($get) => $get('space_type') === 'other'),
                Forms\Components\Select::make('primary_motivation')
                    ->required()
                    ->options([
                        'revenue' => 'Generate Additional Revenue',
                        'traffic' => 'Increase Foot Traffic',
                        'community' => 'Create Community Engagement',
                        'activate' => 'Activate Underutilized Space',
                        'partnerships' => 'Build Brand Partnerships',
                        'showcase' => 'Showcase Space Potential',
                        'networking' => 'Networking Opportunities',
                    ]),
                Forms\Components\CheckboxList::make('target_demographics')
                    ->required()
                    ->options([
                        'emerging' => 'Emerging Brands',
                        'luxury' => 'Luxury Brands',
                        'local' => 'Local Entrepreneurs',
                        'tech' => 'Tech Startups',
                        'fashion' => 'Fashion Labels',
                        'food' => 'Food & Beverage',
                        'art' => 'Art & Design Brands',
                    ]),
                Forms\Components\Select::make('collaboration_style')
                    ->required()
                    ->options([
                        'short-term' => 'Short-Term Rentals',
                        'rotating' => 'Rotating Brand Experiences',
                        'long-term' => 'Exclusive Long-Term Partnerships',
                        'flexible' => 'Flexible/Open to Negotiation',
                    ]),
                Forms\Components\CheckboxList::make('supported_events')
                    ->required()
                    ->options([
                        'launch' => 'Product Launch',
                        'placement' => 'Product Placement',
                        'popup' => 'Pop-Up Store',
                        'activation' => 'Brand Activation',
                        'workshop' => 'Workshop/Demonstration',
                        'photoshoot' => 'Photo Shoot',
                        'sampling' => 'Sampling Event',
                    ]),
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('contact_name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('contact_email')
                            ->email()
                            ->required(),
                        Forms\Components\TextInput::make('contact_phone')
                            ->required(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('space_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('space_type')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('contact_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('contact_email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSpaceSubmissions::route('/'),
            'create' => Pages\CreateSpaceSubmission::route('/create'),
            'edit' => Pages\EditSpaceSubmission::route('/{record}/edit'),
        ];
    }
}
