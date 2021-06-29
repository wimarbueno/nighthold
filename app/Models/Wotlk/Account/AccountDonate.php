<?php

namespace App\Models\Wotlk\Account;

use Illuminate\Database\Eloquent\Model;

class AccountDonate extends Model
{
    protected $connection = 'WotlkAuth';

    protected $table = 'account_donate';

    protected $guarded = [];

    public $timestamps = false;
}
