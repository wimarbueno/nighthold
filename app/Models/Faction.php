<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faction extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $casts = [
        'id' => 'integer',
    ];

    protected $table = "game_faction";
}
