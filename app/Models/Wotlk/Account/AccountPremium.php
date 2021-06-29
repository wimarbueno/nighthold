<?php

namespace App\Models\Wotlk\Account;

use Illuminate\Database\Eloquent\Model;

class AccountPremium extends Model
{
    protected $connection = 'WotlkAuth';

    protected $table = 'account_premium';

    protected $guarded = [];

    public $timestamps = false;
}
