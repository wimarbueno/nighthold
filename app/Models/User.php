<?php

namespace App\Models;

use App\Models\Characters\Characters;
use App\Models\Web\Referral;
use App\Models\Wotlk\Account\AccountWotlk;
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
        'answer',
        'free_name'
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'answer',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function accountWotlk() {
        return $this->hasOne(AccountWotlk::class, 'email', 'email');
    }

    public function characters() {
        return $this->hasMany(Characters::class, 'bn_id', 'id');
    }

    public function stream() {
        return $this->belongsTo(Streams::class, 'id', 'id_user');
    }

    public static function setBalance($newBalance) {
        return static::where('id', Auth::user()->id)->update(['balance' => $newBalance]);
    }

    public static function setBalanceVote($newBalanceVote) {
        return static::where('id', Auth::user()->id)->update(['vote_balance' => $newBalanceVote]);
    }

    public static function setBalanceVoteUsers($id, $newBalanceVote) {
        return static::where('id', $id)->update(['vote_balance' => $newBalanceVote]);
    }

    public function referrer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(self::class, 'referred_by');
    }

    public function referrals(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Referral::class, 'ref_id', 'id');
    }

    public function referralsNotComplete(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Referral::class, 'ref_id', 'id');
    }
}
