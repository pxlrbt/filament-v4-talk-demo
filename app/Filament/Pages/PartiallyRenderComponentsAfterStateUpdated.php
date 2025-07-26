<?php

namespace App\Filament\Pages;

use App\Actions\GetLogs;
use App\FormPage;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Forms;
use Filament\Infolists;

class PartiallyRenderComponentsAfterStateUpdated extends FormPage
{
public function form(Schema $schema): Schema
{
    return $schema
        ->statePath('data')
        ->components([
            Forms\Components\Select::make('level')
                ->live()
                ->hint('Rendered: '. now()->toTimeString())
                ->partiallyRenderComponentsAfterStateUpdated(['logs'])
                ->default('error')
                ->selectablePlaceholder(false)
                ->options([
                    'debug' => 'Debug',
                    'error' => 'Error',
                ]),

            Infolists\Components\CodeEntry::make('logs')
                ->hint('Rendered: '. now()->toTimeString())
                ->state(fn (Get $get) => (new GetLogs)($get('level'))),
    ]);
}
}
