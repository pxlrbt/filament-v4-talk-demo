<?php

namespace App\Filament\Pages;

use App\FormPage;
use Filament\Schemas\Schema;
use Filament\Forms;
use Filament\Support\RawJs;

class Slider extends FormPage
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->schema([
                Forms\Components\Slider::make('slider')
                    ->hiddenLabel()
                    ->range(0, 100)
                    ->step(10)
                    ->tooltips()
                    ->fillTrack()
                    ->pips()
                    ->pipsMode(Forms\Components\Slider\Enums\PipsMode::Steps)
                ->extraAttributes(['style' => 'margin-inline: 1rem'])
        ]);
    }
}
