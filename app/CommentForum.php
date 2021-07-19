<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentForum extends Model
{
    protected $guarded = [];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function commentsForum()
    {
        return $this->morphMany('App\CommentForum', 'commentable');
    }
}
