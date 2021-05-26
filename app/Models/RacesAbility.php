<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RacesAbility extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function raceId()
    {
        return $this->belongsTo(Races::class, 'race_id', 'id');
    }
}
