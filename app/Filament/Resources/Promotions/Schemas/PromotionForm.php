<?php

namespace App\Filament\Resources\Promotions\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class PromotionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->schema([
                TextInput::make('title')
                    ->label('Заглавие')
                    ->maxLength(255)
                    ->nullable(),

                FileUpload::make('image')
                    ->label('Снимка')
                    ->image()
                    ->disk('public')
                    ->directory('promotions')
                    ->visibility('public')
                    ->required(),

            ]);
    }
}
