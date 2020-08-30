<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Strpraticien extends Model
{
    protected $fillable = [
        'structure_id', 'str_praticien_nom', 'str_praticien_prenom',
        'str_praticien_date_naissance', 'str_praticien_sexe',
        'str_praticien_lieu_naissance', 'str_praticien_lieu_residence',
        'str_praticien_telephone', 'str_praticien_email',
        'ville', 'commune'
    ];

    public function specialites()
    {
        return $this->belongsToMany(Specialite::class, 'specialite_strpraticien', 'str_praticien_id', 'specialite_id');
    }

    public function structure()
    {
        return $this->belongsTo(Structure::class, 'structure_id');
    }

    public function consultations()
    {
        return $this->hasMany(StrConsultation::class, 'id_praticien', 'id');
    }
}
