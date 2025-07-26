<?php

namespace App\Filament\Pages;

use App\FormPage;
use Filament\Schemas\Schema;
use Filament\Forms;
use Filament\Support\RawJs;

class TableRepeater extends FormPage
{
    public function mount(): void
    {
        $this->form->fill([
            'table' => false,
            'members' => [
                [
                    'name' => 'Dan',
                    'role' => 'member'
                ],
                [
                    'name' => 'Dennis',
                    'role' => 'supporter'
                ]
            ]
        ]);
    }
    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->schema([
                Forms\Components\Toggle::make('table')->live(),
                Forms\Components\Repeater::make('members')
                    ->hiddenLabel()
                    ->table(fn ($get) => $get('table') ? [
                        Forms\Components\Repeater\TableColumn::make('Name')
                            ->alignLeft(),

                        Forms\Components\Repeater\TableColumn::make('Role')
                            ->alignEnd()
                            ->markAsRequired()
                    ] : null)
                    ->schema([
                        Forms\Components\TextInput::make('name'),
                        Forms\Components\Select::make('role')
                            ->options([
                                'member' => 'Member',
                                'administrator' => 'Administrator',
                                'supporter' => 'Supporter',
                            ])
                            ->required(),
                    ])
        ]);
    }
}
