<?php

namespace App\Models\Shadowlands\Account;

use Illuminate\Database\Eloquent\Model;

class Banned extends Model
{
    protected $connection = 'ShadowlandsAuth';

    protected $table = 'account_banned';

    public $timestamps = false;
}
