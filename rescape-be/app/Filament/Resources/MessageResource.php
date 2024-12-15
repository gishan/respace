<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MessageResource\Pages;
use App\Models\Message;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;

class MessageResource extends Resource
{
    protected static ?string $model = Message::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static ?string $navigationGroup = 'Communication';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('sender_id')
                    ->relationship('sender', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),

                Select::make('receiver_id')
                    ->relationship('receiver', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),

                Textarea::make('content')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sender.name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('receiver.name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('content')
                    ->limit(50)
                    ->searchable(),

                TextColumn::make('read_at')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\Filter::make('unread')
                    ->query(fn (Builder $query): Builder => $query->whereNull('read_at')),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('mark_as_read')
                    ->action(function (Message $record): void {
                        $record->update(['read_at' => now()]);
                    })
                    ->visible(fn (Message $record): bool => is_null($record->read_at))
                    ->icon('heroicon-o-check')
                    ->color('success'),
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
            'index' => Pages\ListMessages::route('/'),
            'create' => Pages\CreateMessage::route('/create'),
            'edit' => Pages\EditMessage::route('/{record}/edit'),
        ];
    }
}
