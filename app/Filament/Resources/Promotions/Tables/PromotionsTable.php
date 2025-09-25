<?php

namespace App\Filament\Resources\Promotions\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class PromotionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Заглавие')
                    ->default('-')
                    ->searchable(),

                Tables\Columns\ImageColumn::make('image')
                    ->label('Снимка')
                    ->square()
                    ->size(120),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Качено на')
                    ->dateTime('d.m.Y H:i'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
