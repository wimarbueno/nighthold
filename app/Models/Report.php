<?php

    namespace App\Models;

    use App\Models\Thread;
    use Illuminate\Database\Eloquent\Model;

    class Report extends Model {

        protected $fillable = [
                'topic_id',
                'type',
                'reason',
                'user_add'
        ];

        protected $table = 'report_forums';

        public function user() {
            return $this->belongsTo(User::class, 'user_add', 'id');
        }

        public function messages() {
            return $this->belongsTo(Thread::class, 'topic_id', 'id');
        }

        public function theads() {
            return $this->belongsTo(Thread::class, 'topic_id', 'id');
        }
    }
