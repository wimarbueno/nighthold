<?php

namespace App\Models\Wotlk\Arena;

use App\Models\Characters\Characters;
use Illuminate\Database\Eloquent\Model;

class ArenaMember extends Model
{
    protected $connection = 'WotlkChatacters';

    protected $table = 'arena_team_member';

    protected $fillable = [
        "arenaTeamId",
        "guid",
        "weekGames",
        "weekWins",
        "seasonGames",
        "seasonWins",
        "personalRating"
    ];

    public function characters(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Characters::class, 'guid', 'guid');
    }
}
