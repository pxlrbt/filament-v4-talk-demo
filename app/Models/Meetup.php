<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Meetup extends Model
{
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function attendees(): BelongsToMany
    {
        return $this->belongsToMany(Attendee::class);
    }
}
