<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class, 'channel_user')->withPivot('minutes_watched', 'date');
    }
}
