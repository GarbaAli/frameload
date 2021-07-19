<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentPost extends Model
{
    protected $guarded = [];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
