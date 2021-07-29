<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Epreuve extends Model
{
    protected $fillable = ['etablissement_id','filiere_id','libelle_epreuve','type','annee_epreuve','photo_epreuve','pdf_epreuve','date_ajout'];
    public $timestamps = false;

    public function etablissement()
    {
        return $this->belongsTo('App\Etablissement');
    }

    public function filiere()
    {
        return $this->belongsTo('App\Filiere');
    }

    public function getAnneeEpreuveAttribute($attribute)
    {
        return $this->getAnneeOption()[$attribute];
    }

    public function getAnneeOption()
    {
        return[
            '0'=>'2021',
            '1'=>'2020',
            '2'=>'2019',
            '3'=>'2018'
        ];
    }

}
