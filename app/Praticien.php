<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Praticien extends Authenticatable implements HasMedia
{    

    use Notifiable;
    use InteractsWithMedia;
    
    protected $fillable = [
        'user_id',
        'commune_id',
        'praticien_nom',
        'praticien_prenom',
        'email',
        'verified',
        'praticien_date_naissance',
        'praticien_sexe',
        'praticien_numero_professionnel',
        'praticien_presentation',
        'praticien_telephone',
        'praticien_lieu_naissance',
        'praticien_lieu_residence',
        'password',
        'avatar',
        'praticien_status'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function verifyPraticien()
    {
        return $this->hasOne(verifyPraticienEmail::class, 'praticien_id');
    }

    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }

    public function specialites()
    {
        return $this->belongsToMany(Specialite::class, 'praticien_specialite', 'praticien_id', 'specialite_id');
    }

    public function structures()
    {
        return $this->belongsToMany(Structure::class, 'praticien_structure', 'praticien_id', 'structure_id');
    }

}
