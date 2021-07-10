<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $connection = 'mysql';
    protected $fillable = ['account_id', 'notification_id', 'retries', 'max_retries', 'delivery_at'];

    protected $casts = [
        'delivery_at' => 'datetime',
        'retries' => 'integer',
        'max_retries' => 'integer',
        'notification_id' => 'integer'
    ];

    public $timestamps = false;
}
