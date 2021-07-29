<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    protected $fillable = ['code_ets', 'libelle_ets', 'image', 'description'];
    public $timestamps = false;

    public function epreuves()
    {
        return $this->hasMany('App\Epreuve');
    }
}
