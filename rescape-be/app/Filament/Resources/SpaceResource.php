<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SpaceResource\Pages;
use App\Models\Space;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;

class SpaceResource extends Resource
{
    protected static ?string $model = Space::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationGroup = 'Space Management';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('location')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),

                TagsInput::make('amenities')
                    ->separator(',')
                    ->columnSpanFull(),

                TextInput::make('price_per_day')
                    ->required()
                    ->numeric()
                    ->prefix('$')
                    ->minValue(0)
                    ->maxValue(999999.99),

                Select::make('status')
                    ->options([
                        'available' => 'Available',
                        'unavailable' => 'Unavailable',
                        'maintenance' => 'Under Maintenance',
                    ])
                    ->required()
                    ->default('available'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('location')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('price_per_day')
                    ->money('USD')
                    ->sortable(),

                BadgeColumn::make('status')
                    ->colors([
                        'success' => 'available',
                        'danger' => 'unavailable',
                        'warning' => 'maintenance',
                    ]),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'available' => 'Available',
                        'unavailable' => 'Unavailable',
                        'maintenance' => 'Under Maintenance',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListSpaces::route('/'),
            'create' => Pages\CreateSpace::route('/create'),
            'edit' => Pages\EditSpace::route('/{record}/edit'),
        ];
    }
}
