<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    protected $fillable = [
        'nom_specialite'
    ];

    public function praticiens()
    {
        return $this->belongsToMany(Praticien::class, 'praticien_specialite', 'praticien_id', 'specialite_id');
    }

    public function structures()
    {
        return $this->belongsToMany(Structure::class, 'specialite_structure', 'specialite_id', 'structure_id', 'id', 'id');
    }

    public function strPraticiens()
    {
        return $this->belongsToMany(Strpraticien::class, 'specialite_str_praticien', 'specialite_id', 'str_praticien_id');
    }

    public function rdv_consultations()
    {
        return $this->hasMany(RdvConsultation::class, 'id_specialite', 'id');
    }
}
