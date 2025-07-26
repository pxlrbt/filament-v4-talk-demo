<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    protected $guarded = [];

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }
}
