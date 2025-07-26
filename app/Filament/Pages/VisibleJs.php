<?php

namespace App\Filament\Pages;

use App\FormPage;
use Filament\Schemas\Schema;
use Filament\Forms;

class VisibleJs extends FormPage
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->schema([
                Forms\Components\Toggle::make('published'),

                Forms\Components\DatePicker::make('published_at')
                    ->visibleJs(<<<'JS'
                        $get('published')
                    JS),
        ]);
    }
}
