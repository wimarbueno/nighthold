<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Races extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $casts = [
        'faction' => 'integer',
    ];

    public function ability()
    {
        return $this->hasMany(RacesAbility::class, 'race_id', 'id');
    }

    public function factions() {
        return $this->belongsTo(Faction::class, 'faction', 'id');
    }

    public function faction() {
        return $this->belongsTo(Faction::class, 'faction', 'id');
    }

    public function classes() {
        return $this->belongsToMany(Classes::class, 'races_classes', 'races_id');
    }
}
