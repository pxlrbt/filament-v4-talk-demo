<?php

namespace App\Filament\Resources\Locations\Resources\Meetups;

use App\Filament\Resources\Locations\LocationResource;
use App\Filament\Resources\Locations\Resources\Meetups\Pages\CreateMeetup;
use App\Filament\Resources\Locations\Resources\Meetups\Pages\EditMeetup;
use App\Filament\Resources\Locations\Resources\Meetups\Pages\ViewMeetup;
use App\Filament\Resources\Locations\Resources\Meetups\RelationManagers\AttendeesRelationManager;
use App\Filament\Resources\Locations\Resources\Meetups\Schemas\MeetupForm;
use App\Filament\Resources\Locations\Resources\Meetups\Tables\MeetupsTable;
use App\Models\Meetup;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MeetupResource extends Resource
{
    protected static ?string $model = Meetup::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $parentResource = LocationResource::class;

    public static function form(Schema $schema): Schema
    {
        return MeetupForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MeetupsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            AttendeesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'create' => CreateMeetup::route('/create'),
            'edit' => EditMeetup::route('/{record}/edit'),
            'view' => ViewMeetup::route('/{record}/'),
        ];
    }
}
