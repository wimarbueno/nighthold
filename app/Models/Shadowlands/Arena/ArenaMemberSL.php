<?php


namespace App\Models\Shadowlands\Arena;


use App\Models\Characters\Characters;
use Illuminate\Database\Eloquent\Model;

class ArenaMemberSL extends Model
{
    protected $connection = 'ShadowlandsChatacters';

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
