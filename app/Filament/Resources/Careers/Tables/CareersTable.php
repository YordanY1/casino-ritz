<?php

namespace App\Filament\Resources\Careers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class CareersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Име')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('email')
                    ->label('Имейл')
                    ->sortable()
                    ->copyable(),

                TextColumn::make('phone')
                    ->label('Телефон')
                    ->sortable(),

                TextColumn::make('position')
                    ->label('Позиция')
                    ->sortable()
                    ->badge(),

                TextColumn::make('cv')
                    ->label('CV')
                    ->url(fn($record) => \Storage::url($record->cv), true)
                    ->openUrlInNewTab()
                    ->icon('heroicon-m-document-text'),

                TextColumn::make('created_at')
                    ->label('Подадена на')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
