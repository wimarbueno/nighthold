<?php


namespace App\Models\Web;


use Illuminate\Database\Eloquent\Model;

class ForumsXF extends Model
{
    protected $connection = 'forums';

    protected $table = 'xf_user';

    protected $guarded = [];

    public $timestamps = false;
}
