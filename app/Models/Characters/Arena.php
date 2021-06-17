<?php

namespace App\Models\Characters;

use App\Models\Account;
use Illuminate\Database\Eloquent\Model;

class Arena extends Model
{
    protected $connection = 'characters';

    protected $table = 'arena_team_member';

    protected $fillable = [
        "guid",
        "slot",
        "rating",
        "bestRatingOfWeek",
        "bestRatingOfSeason",
        "matchMakerRating",
        "weekGames",
        "weekWins",
        "prevWeekGames",
        "prevWeekWins",
        "seasonGames",
        "seasonWins"
    ];

    public function characters() {
        return $this->belongsTo(Characters::class, 'guid', 'guid');
    }

    public function account() {
        return $this->belongsTo(Account::class, 'guid', 'id');
    }
}
