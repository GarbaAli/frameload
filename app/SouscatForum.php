<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SouscatForum extends Model
{
    protected $guarded = [];

    public function categorie()
    {
        return $this->belongsTo('App\CategorieForum');
    }

    public function topics()
    {
        return $this->hasMany('App\Topics');
    }

    public function getImage()
    {
        $image_name = $this->image ?? 'default.jpeg';

        return "/storage/forums/". $image_name;
    }
} 
