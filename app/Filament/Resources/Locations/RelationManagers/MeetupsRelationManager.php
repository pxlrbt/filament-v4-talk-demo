<?php

namespace App\Filament\Resources\Locations\RelationManagers;

use App\Filament\Resources\Locations\Resources\Meetups\MeetupResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class MeetupsRelationManager extends RelationManager
{
    protected static string $relationship = 'meetups';

    protected static ?string $inverseRelationship = 'location';

    protected static ?string $relatedResource = MeetupResource::class;

    public function table(Table $table): Table
    {
        return $table;
    }
}
