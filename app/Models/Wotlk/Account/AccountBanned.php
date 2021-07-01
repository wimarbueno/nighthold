<?php

namespace App\Models\Wotlk\Account;

use Illuminate\Database\Eloquent\Model;

class AccountBanned extends Model
{
    protected $connection = 'WotlkAuth';

    protected $table = 'account_banned';

    public $timestamps = false;
}
