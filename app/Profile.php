<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
 
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getImage()
    {
        $image_name = $this->image ?? 'avatar.png';

        return "/storage/avatars/". $image_name;
    }

    public function getCouverture()
    {
        $couverture_name = $this->couverture ?? 'couverture.jpg';

        return "/storage/couverture/". $couverture_name;
    }
}
