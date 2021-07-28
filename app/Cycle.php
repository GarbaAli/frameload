<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    protected $fillable = ['code_cycle','libelle_cycle'];
    public $timestamps = false;

    public function filieres()
    {
        return $this->hasMany('App\Filiere');
    }
}
