<?php

namespace App\Filament\Pages;

use App\FormPage;
use App\Livewire\DemoComponent;
use Filament\Actions\Action;
use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Livewire;
use Filament\Schemas\Schema;
use Filament\Forms;

class CombinedSchema extends FormPage
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([
                Actions::make([
                    Action::make('First')->action(fn ($set) => $set('gif', asset('noice.gif'))),

                    Action::make('Second')->action(fn ($set) => $set('gif', asset('noice-2.gif'))),

                    Action::make('Special')->action(fn ($set) => $set('gif', asset('rick-roll.gif'))),
                ]),

                Forms\Components\Select::make('gif')
                    ->live()
                    ->partiallyRenderComponentsAfterStateUpdated(['image'])
                    ->options([
                        asset('noice.gif') => 'Noice 1',
                        asset('noice-2.gif') => 'Noice 2',
                    ]),

                ImageEntry::make('image')
                    ->imageSize(100)
                    ->state(fn ($get) => $get('gif'))
                    ->placeholder('Select a gif …'),

                Livewire::make(DemoComponent::class)
        ]);
    }
}
