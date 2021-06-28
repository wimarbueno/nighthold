<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $fillable = [
        'user_id',
        'ref_id',
        'bonus',
        'reward'
    ];
}
