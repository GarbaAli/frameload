<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    protected $fillable = ['cycle_id','code_filiere', 'libelle_filiere'];
    public $timestamps = false;

    public function cycle()
    {
        return $this->belongsTo('App\Cycle');
    }

    public function epreuves()
    {
        return $this->hasMany('App\Epreuve');
    }

    public function rapports()
    {
        return $this->hasMany('App\Rapport');
    }
}
