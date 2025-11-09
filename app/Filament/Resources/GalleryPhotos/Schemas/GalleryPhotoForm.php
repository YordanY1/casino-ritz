<?php

namespace App\Filament\Resources\GalleryPhotos\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;

class GalleryPhotoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->schema([
                Forms\Components\Select::make('gallery_id')
                    ->label('Галерия')
                    ->relationship('gallery', 'id')
                    ->getOptionLabelFromRecordUsing(fn($record) => $record->display_title)
                    ->required(),


                Forms\Components\FileUpload::make('path')
                    ->label('Снимки')
                    ->image()
                    ->multiple()
                    ->reorderable()
                    ->appendFiles()
                    ->disk('public')
                    ->directory('gallery/photos')
                    ->visibility('public')
                    ->required(),
            ]);
    }
}
