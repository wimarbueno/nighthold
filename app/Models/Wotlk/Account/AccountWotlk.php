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

    public static function newPasswordChangeEmail($user, $password)
    {
        $accountHash = strtoupper(bin2hex(strrev(hex2bin(strtoupper(hash("sha256",strtoupper(hash("sha256", strtoupper($user)).":".strtoupper($password))))))));
        DB::connection('auth')
            ->table('battlenet_accounts')
            ->where('email', auth()->user()->email)
            ->update(['sha_pass_hash' => $accountHash]);
        $bnetInfo = DB::connection('auth')->table('battlenet_accounts')->where('email', $user)->first();
        $accountGameHash = strtoupper(bin2hex(strrev(hex2bin(strtoupper(hash("sha256",strtoupper(hash("sha256", strtoupper($bnetInfo->id)) . '#1' . ":".strtoupper($password))))))));
        $accountGame = DB::connection('auth')
            ->table('account')
            ->where('email', auth()->user()->email)
            ->update(['sha_pass_hash' => $accountGameHash]);
    }


    public function path() {
        return route('games.view', [$this->id, $this->username]);
    }

    public function characters() {
        return $this->hasMany(Characters::class, 'account', 'id');
    }

    public static function createBattleNet($email, $password) {
        $accountBnet = DB::connection('auth')->table('battlenet_accounts')->insert(['email' => $email, 'sha_pass_hash' => strtoupper(bin2hex(strrev(hex2bin(strtoupper(hash("sha256",strtoupper(hash("sha256", strtoupper($email)).":".strtoupper($password)))))))), 'last_login' => date("Y-m-d H:i:s")]);
        $bnetInfo = DB::connection('auth')->table('battlenet_accounts')->where('email', $email)->first();
        $accountGame = DB::connection('auth')->table('account')->insert(['username' => $bnetInfo->id.'#1', 'sha_pass_hash' =>
            strtoupper(bin2hex(strrev(hex2bin(strtoupper(hash("sha256",strtoupper(hash("sha256", strtoupper($bnetInfo->id)) . '#1' . ":".strtoupper($password)))))))), 'email' => $email, 'last_login' => date("Y-m-d H:i:s"), 'expansion' => '7', 'battlenet_account' => $bnetInfo->id, 'battlenet_index' => '1']);
    }

    public static function newPasswordBnet($user, $password) {
        $accountHash = strtoupper(bin2hex(strrev(hex2bin(strtoupper(hash("sha256",strtoupper(hash("sha256", strtoupper($user)).":".strtoupper($password))))))));
        $accountBnet = DB::connection('auth')
            ->table('battlenet_accounts')
            ->where('email', $user)
            ->update(['sha_pass_hash' => $accountHash]);
        $bnetInfo = DB::connection('auth')->table('battlenet_accounts')->where('email', $user)->first();
        $accountGameHash = strtoupper(bin2hex(strrev(hex2bin(strtoupper(hash("sha256",strtoupper(hash("sha256", strtoupper($bnetInfo->id)) . '#1' . ":".strtoupper($password))))))));
        $accountGame = DB::connection('auth')
            ->table('account')
            ->where('email', $user)
            ->update(['sha_pass_hash' => $accountGameHash]);
    }

    public static function newPasswordBnetSrp6($email, $password)
    {
        $bnet_hashed_pass = strtoupper(bin2hex(strrev(hex2bin(strtoupper(hash('sha256', strtoupper(hash('sha256', strtoupper($email)) . ':' . strtoupper($password))))))));
        $accountBnet = DB::connection('auth')
            ->table('battlenet_accounts')
            ->where('email', $email)
            ->update(['sha_pass_hash' => $bnet_hashed_pass]);
        list($salt, $verifier) = Srp6::getRegistrationData($email, $password);
        DB::connection('auth')
            ->table('account')
            ->where('email', $email)
            ->update([
                'salt' => $salt,
                'verifier' => $verifier
            ]);
    }

    public static function newEmailBnet($email)
    {
        DB::connection('auth')
            ->table('battlenet_accounts')
            ->where('email', auth()->user()->email)
            ->update(['email' => $email]);
        DB::connection('auth')
            ->table('account')
            ->where('email', auth()->user()->email)
            ->update(['email' => $email]);
    }
}
