<?php

namespace App\Models\Wotlk\Gm;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $connection = 'WotlkChatacters';

    protected $table = 'gm_ticket';

    protected $guarded = [];

    public $timestamps = false;
}
