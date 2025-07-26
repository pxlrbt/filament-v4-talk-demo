<?php

namespace App\Filament\Pages;

use App\FormPage;
use Filament\Schemas\Schema;
use Filament\Forms;

class AfterStateUpdated extends FormPage
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->afterStateUpdatedJs(<<<'JS'
                        slugify = str => str.toLowerCase().replace(/\W+/g, '-').replace(/^-+|-+$/g, '');

                        $set('slug', slugify($state));
                    JS),

                Forms\Components\TextInput::make('slug')
                    ->readOnly(),
        ]);
    }
}
