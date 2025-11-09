<?php

namespace App\Filament\Resources\Albums\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;
use Illuminate\Support\Str;
use App\Models\Gallery;

class AlbumForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->schema([
                Forms\Components\Select::make('gallery_id')
                    ->label('Галерия')
                    ->options(Gallery::pluck('title->bg', 'id')->toArray())
                    ->searchable()
                    ->required(),

                Forms\Components\TextInput::make('title')
                    ->label('Заглавие')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),

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
