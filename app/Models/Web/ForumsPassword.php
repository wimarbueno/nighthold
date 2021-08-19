<?php


namespace App\Models\Web;


use Illuminate\Database\Eloquent\Model;

class ForumsPassword extends Model
{
    protected $connection = 'forums';

    protected $table = 'xf_user_authenticate';

    protected $primaryKey = 'user_id';

    protected $guarded = [];

    public $timestamps = false;
}
