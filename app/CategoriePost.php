<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriePost extends Model
{
    protected $guarded = [];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
