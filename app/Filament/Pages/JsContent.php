<?php

namespace App\Filament\Pages;

use App\FormPage;
use Filament\Schemas\Schema;
use Filament\Forms;

class JsContent extends FormPage
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->schema([
                Forms\Components\TextInput::make('name')
                  ->maxLength(20)
                  ->hint(\Filament\Schemas\JsContent::make(<<<'JS'
                      ($get('name')?.length ?? 0) + '/20'
                  JS)),
        ]);
    }
}
