<?php

namespace App\Models\Wotlk\Arena;

use Illuminate\Database\Eloquent\Model;

class ArenaWotlk extends Model
{
    protected $connection = 'WotlkChatacters';

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
        return $this->belongsTo(ArenaMember::class, 'arenaTeamId', 'arenaTeamId');
    }

        public function members(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ArenaMember::class, 'arenaTeamId', 'arenaTeamId');
    }
}
