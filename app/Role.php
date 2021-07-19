<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}


/*
Admin => Acces au panel d'administration;
Auteur => Acces au blog pour rediger des articles
livre => Librairie-livre
logiciel => librairie-logiciel
epreuve => librairie-epreuve
utilisateur => User normal - aucun acces au panel 


*/