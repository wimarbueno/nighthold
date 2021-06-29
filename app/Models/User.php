<?php

namespace App\Models;

use App\Models\Characters\Characters;
use App\Models\Shadowlands\Account\Account;
use App\Models\Web\Referral;
use App\Models\Wotlk\Account\AccountWotlk;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;

class User extends \TCG\Voyager\Models\User implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'name',
        'lastName',
        'firstName',
        'dobDay',
        'dobMonth',
        'dobYear',
        'dobPlain',
        'country',
        'phoneNumber',
        'email',
        'password',
        'vote_balance',
        'referred_by',
        'question',
        'answer'
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'answer',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function account() {
        return $this->hasOne(Account::class, 'email', 'email');
    }

    public function accountWotlk() {
        return $this->hasOne(AccountWotlk::class, 'email', 'email');
    }

    public function characters() {
        return $this->hasMany(Characters::class, 'bn_id', 'id');
    }

    public function stream() {
        return $this->belongsTo(Streams::class, 'id', 'id_user');
    }

    public function topics() {
        return $this->hasMany(Thread::class);
    }

    protected function getPostsCountAttribute() {
        return $this->topics->count();
    }

    public function read($thread) {
        try {
            return cache()->forever($this->visitedThreadCacheKey($thread), Carbon::now());
        } catch (\Exception $e) {
            return response()->json($e);
        }
    }

    public function visitedThreadCacheKey($thread) {
        return sprintf("users.%s.visits.%s", $this->id, $thread);
    }

    public static function setBalance($newBalance) {
        return static::where('id', Auth::user()->id)->update(['balance' => $newBalance]);
    }

    public static function setBalanceVote($newBalanceVote) {
        return static::where('id', Auth::user()->id)->update(['vote_balance' => $newBalanceVote]);
    }

    public function referrer()
    {
        return $this->belongsTo(self::class, 'referred_by');
    }

    public function referrals()
    {
        return $this->hasMany(Referral::class, 'ref_id', 'id');
    }
}
