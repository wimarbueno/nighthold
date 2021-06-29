<?php

namespace App\Models\Web;

use App\Models\Characters\Characters;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $fillable = [
        'user_id',
        'ref_id',
        'bonus',
        'reward'
    ];

    public function referrer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function characters(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Characters::class, 'user_id', 'bn_id');
    }
}
