<?php

namespace App\Models\Characters;

use Illuminate\Database\Eloquent\Model;

class Guild extends Model {

    protected $connection = 'ShadowlandsChatacters';

    protected $table = 'guild';

    public  function scopeLike($query, $field, $value){
        return $query->where($field, 'LIKE', "%$value%");
    }
}
