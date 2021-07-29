<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    public $table = 'rapport_stages';
    protected $fillable = ['filiere_id', 'auteur_rapport','theme_rapport','annee_rapport','description','prix','rapport','photo_rapport','telecharger_rapport','statut','date_insertion'];
    public $timestamps = false;

    public function filiere()
    {
        return $this->belongsTo('App\Filiere');
    }

    public function getAnneeRapportAttribute($attribute)
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

    public function getStatutAttribute($attribute)
    {
        return $this->getStatutOption()[$attribute];
    }

    public function getStatutOption()
    {
        return[
            '0'=>'Valider',
            '1'=>'En attente'
        ];
    }
}
