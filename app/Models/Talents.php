<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talents extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function classId() {
        return $this->belongsTo(Classes::class, 'class_id', 'id');
    }
}
