<?php

namespace App\Models\Characters;

use App\Models\Account;
use Illuminate\Database\Eloquent\Model;

class Arena extends Model
{
    protected $connection = 'characters';

    protected $table = 'character_brackets_info';

    protected $fillable = [
        "guid",
        "bracket",
        "rating",
        "oldRating",
        "best",
        "oldBest",
        "bestWeek",
        "mmr",
        "oldMmr",
        "games",
        "oldGames",
        "wins",
        "oldWins",
        "weekGames",
        "weekWins",
        "bestWeekLast",
    ];

    public function characters() {
        return $this->belongsTo(Characters::class, 'guid', 'guid');
    }

    public function account() {
        return $this->belongsTo(Account::class, 'guid', 'id');
    }
}
