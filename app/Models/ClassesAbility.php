<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassesAbility extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function raceId()
    {
        return $this->belongsTo(Classes::class, 'race_id', 'id');
    }
}
