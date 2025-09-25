<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;
use Illuminate\Support\Str;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->schema([
                Forms\Components\KeyValue::make('title')
                    ->label('Заглавие (многоезично)')
                    ->keyLabel('Език')
                    ->valueLabel('Заглавие')
                    ->default([
                        'bg' => '',
                        'en' => '',
                        'tr' => '',
                        'el' => '',
                    ])
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        if (isset($state['en']) && $state['en']) {
                            $set('slug', Str::slug($state['en']));
                        }
                    }),

                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                Forms\Components\FileUpload::make('cover')
                    ->label('Корица')
                    ->image()
                    ->disk('public')
                    ->directory('galleries')
                    ->visibility('public')
                    ->maxSize(2048),
            ]);
    }
}
