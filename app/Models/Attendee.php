<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Attendee extends Model
{
    public function meetups(): BelongsToMany
    {
        return $this->belongsToMany(Meetup::class);
    }
}
