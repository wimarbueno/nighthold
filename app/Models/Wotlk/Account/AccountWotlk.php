<?php

namespace App\Models\Wotlk\Account;

use App\Models\Characters\Characters;
use App\Services\Srp6;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AccountWotlk extends Model
{
    protected $connection = 'WotlkAuth';

    protected $table = 'account';

    protected $guarded = [];

    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'sha_pass_hash'
    ];

    public function banned(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(AccountBanned::class, 'id', 'id');
    }

    public static function newPasswordChangeEmail($user, $password)
    {

    }


    public function path() {
        return route('games.view', [$this->id, $this->username]);
    }

    public function characters() {
        return $this->hasMany(Characters::class, 'account', 'id');
    }

    public static function newPassword($user, $password) {
        $hashed_pass = strtoupper(sha1(strtoupper($user . ':' . $password)));
        self::where('username', $user)->update([
            'sha_pass_hash' => $hashed_pass,
        ]);
    }
}
