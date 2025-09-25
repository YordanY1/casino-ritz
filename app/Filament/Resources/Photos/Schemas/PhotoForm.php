<?php

namespace App\Filament\Resources\Photos\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;

class PhotoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->schema([
                Forms\Components\Select::make('album_id')
                    ->label('Албум')
                    ->relationship('album', 'title')
                    ->required(),

                Forms\Components\FileUpload::make('path')
                    ->label('Снимка')
                    ->image()
                    ->disk('public')
                    ->directory('albums/photos')
                    ->visibility('public')
                    ->required(),
            ]);
    }
}
