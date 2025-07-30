<?php

namespace App\Filament\Resources\Locations\Resources\Meetups\Pages;

use App\Filament\Resources\Locations\Resources\Meetups\MeetupResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\ViewRecord;

class ViewMeetup extends ViewRecord
{
    protected static string $resource = MeetupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
