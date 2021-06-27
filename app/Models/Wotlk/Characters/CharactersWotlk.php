<?php

namespace App\Models\Wotlk\Characters;

use Illuminate\Database\Eloquent\Model;

class CharactersWotlk extends Model
{
    protected $connection = 'WotlkChatacters';

    protected $table = 'characters';
}
