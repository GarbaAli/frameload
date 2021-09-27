<?php

namespace App;

use App\Mail\welcomeUserMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','provider', 'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [ 
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        //  creer un profil lors de la creation dun user
        static::created(function ($user){
             $data = $user->profile()->create([
                'nom_prenom' =>'profil de '.$user->name,
                'tel' => '000',
                'niveau' => 'Niveau etude',
                'filiere' => 'Filiere',
                'etablissement' => 'Etablissement'
            ]); 

            $utilisateurRole = Role::where('name', 'utilisateur')->first(); //recupere id role qui a pour name utilisateur.

            $user->roles()->attach($utilisateurRole); 

            //Envoie de mail
            Mail::to($data->user->email)->send(new welcomeUserMail($data)); 
        });
    }

   public function getRouteKeyName()
   {
       return 'name';
   }


   public function profile()
   {
       return $this->hasOne('App\Profile');
   }

   public function roles()  
   {
       return $this->belongsToMany('App\Role');
   }

   public function posts()
   {
       return $this->hasMany('App\Post');
   }

   public function topics()
   {
       return $this->hasMany('App\Topics');
   }

  



//    verifie si user a pour role admin. elle renvoie vrai si oui et faux si non (AuthServiceProvider pour voir leur declaration)
   public function isAdmin()
   {
       return $this->roles()->where('name', 'Admin')->first();
   }

   public function hasAnyRole(array $roles)
   {
        return $this->roles()->whereIn('name', $roles)->first();
   }

   public function Auteur(array $roles)
   {
        return $this->roles()->whereIn('name', $roles)->first();
   }
}
