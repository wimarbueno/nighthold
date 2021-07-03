<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Channel extends Model
    {

        protected $guarded = [];
        protected $dates = ['expired_at'];

        public function categories(): \Illuminate\Database\Eloquent\Relations\HasMany
        {
            return $this->hasMany(Channel::class, 'id', 'parent_id')
                ->where('parent_id', '!=', 0);
        }

        public function childrenCategories(): \Illuminate\Database\Eloquent\Relations\HasMany
        {
            return $this->hasMany(Channel::class, 'id', 'parent_id')->with('categories')
                ->where('parent_id', '!=', 0);
        }

        public function threads(): \Illuminate\Database\Eloquent\Relations\HasMany
        {
            return $this->hasMany(Thread::class);
        }

        public function forums(): \Illuminate\Database\Eloquent\Relations\HasMany
        {
            return $this->hasMany(Channel::class, 'parent_id');
        }

        public function parentId(): \Illuminate\Database\Eloquent\Relations\BelongsTo
        {
            return $this->belongsTo(self::class);
        }
    }
