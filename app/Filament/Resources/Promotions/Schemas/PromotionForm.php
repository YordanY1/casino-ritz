<?php

namespace App\Filament\Resources\Promotions\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;


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

                Select::make('locale')
                    ->label('Език')
                    ->options([
                        'bg' => '🇧🇬 Български',
                        'en' => '🇬🇧 English',
                        'tr' => '🇹🇷 Türkçe',
                        'el' => '🇬🇷 Ελληνικά',
                    ])
                    ->default('bg')
                    ->required(),
            ]);
    }
}
