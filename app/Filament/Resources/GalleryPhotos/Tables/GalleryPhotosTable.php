<?php

namespace App\Filament\Resources\GalleryPhotos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class GalleryPhotosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('path')
                    ->label('Снимка')
                    ->disk('public')
                    ->circular(),

                TextColumn::make('gallery.title')
                    ->label('Галерия')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('Качена на')
                    ->dateTime('d.m.Y H:i'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
