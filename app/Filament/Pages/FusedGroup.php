<?php

namespace App\Filament\Pages;

use App\FormPage;
use Filament\Schemas\Schema;
use Filament\Forms;
use Filament\Support\RawJs;
use Illuminate\Support\HtmlString;

class FusedGroup extends FormPage
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->columns(1)
            ->schema([
                \Filament\Schemas\Components\FusedGroup::make()
                    ->label('Phone')
                    ->columns(6)
                    ->schema([
                        Forms\Components\Select::make('prefix')
                            ->placeholder('+xx')
                            ->options([
                                '+41',
                                '+43',
                                '+49',
                            ]),

                        Forms\Components\TextInput::make('phone')
                            ->placeholder('123 345')
                            ->columnSpan(5)
                            ->autocomplete(false),
                    ]),

                new HtmlString(<<<HTML
                    <style>
                    .fi-main {
                        max-width: 50rem !important;
                    }
                    </style>
                HTML)
        ]);
    }
}
