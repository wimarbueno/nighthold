<?php

    namespace App\Models\Characters;

    use App\Models\CharactersTalent;
    use App\Models\User;
    use Illuminate\Database\Eloquent\Model;

    class Characters extends Model {

        public $timestamps = false;

        protected $connection = 'mysql';

        protected $table = 'user_characters';

        protected $guarded = [];
        
        public  function scopeLike($query, $field, $value){
            return $query->where($field, 'LIKE', "%$value%");
        }

        public function user() {
            return $this->hasOne(User::class, 'id', 'bn_id')->select('id', 'name');
        }

    }
