<?php

namespace App\Filament\Resources\Galleries\Tables;

use Filament\Tables;
use Filament\Tables\Table;

class GalleriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover')
                    ->label('Корица')
                    ->disk('public'),

                Tables\Columns\TextColumn::make('translated_title')
                    ->label('Заглавие')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Създадено на')
                    ->dateTime('d.m.Y H:i'),
            ]);
    }
}
