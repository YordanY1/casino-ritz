<?php

namespace App\Filament\Resources\Albums\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;
use Illuminate\Support\Str;

class AlbumForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->schema([
                Forms\Components\Select::make('gallery_id')
                    ->label('Галерия')
                    ->relationship('gallery', 'title')
                    ->required(),

                Forms\Components\TextInput::make('title')
                    ->label('Заглавие')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function ($state, callable $set) {
                        $set('slug', Str::slug($state));
                    }),

                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->disabled()
                    ->dehydrated(),

                Forms\Components\FileUpload::make('cover')
                    ->label('Корица')
                    ->image()
                    ->disk('public')
                    ->directory('albums/covers')
                    ->visibility('public')
                    ->maxSize(2048),
            ]);
    }
}
