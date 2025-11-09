<?php

namespace App\Filament\Resources\Promotions\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Illuminate\Support\Facades\Storage;

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
                    ->disk('public')
                    ->getStateUsing(fn ($record) => Storage::disk('public')->url($record->image))
                    ->square()
                    ->size(120)
                    ->extraImgAttributes(['style' => 'object-fit: cover; border-radius: 8px;']),

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
