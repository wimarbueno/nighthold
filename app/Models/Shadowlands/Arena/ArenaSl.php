<?php

namespace App\Models\Shadowlands\Arena;

use Illuminate\Database\Eloquent\Model;

class ArenaSl extends Model
{
    protected $connection = 'ShadowlandsChatacters';

    protected $table = 'arena_team';

    protected $fillable = [
        "arenaTeamId",
        "name",
        "captainGuid",
        "type",
        "rating",
        "seasonGames",
        "seasonWins",
        "weekGames",
        "weekWins",
        "rank",
        "backgroundColor",
        "emblemStyle",
        "emblemColor",
        "borderStyle",
        "borderColor"
    ];

    public function team_member(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ArenaMemberSL::class, 'arenaTeamId', 'arenaTeamId');
    }
}
