<?php

namespace App\Filament\Resources\Locations\Resources\Meetups\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MeetupForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),

                DateTimePicker::make('start')
                    ->required(),
            ]);
    }
}
