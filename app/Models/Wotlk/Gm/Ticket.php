<?php

namespace App\Models\Wotlk\Gm;

use App\Models\Characters\Characters;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $connection = 'WotlkChatacters';

    protected $table = 'gm_ticket';

    protected $guarded = [];

    public $timestamps = false;

    protected $dates = ['createTime', 'lastModifiedTime'];

    public function characters() {
        return $this->hasOne(Characters::class, 'guid', 'assignedTo')->where('realmId', 2);
    }

}
