<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Structure extends Authenticatable 
{
    use Notifiable;

    protected $fillable = [
        'nom', 'email', 'password', 'type_id',
        'date_creation', 'nombre_chambres', 'nombre_lits',
        'telephone', 'ville', 'commune', 'type_assurence', 'verified'
    ];

    public function confirmemail()
    {
        return $this->morphOne(Confirmemail::class, 'confirmemailable');
    }

    public function examins()
    {
        return $this->belongsToMany(Examin::class, 'examin_structure', 'structure_id', 'examin_id', 'id', 'id');
    }

    public function specialites()
    {
        return $this->belongsToMany(Specialite::class, 'specialite_structure', 'structure_id', 'specialite_id', 'id', 'id');
    }

    public function Praticiens()
    {
        return $this->belongsToMany(Praticien::class, 'praticien_structure', 'praticien_id', 'structure_id');
    }

    public function typeStructure()
    {
        return $this->belongsTo(TypeStructure::class, 'type_id');
    }

    public function strPraticiens()
    {
        return $this->hasMany(Strpraticien::class, 'structure_id');
    }

    public function rdv_consultations()
    {
        return $this->hasMany(RdvConsultation::class, 'id_structure', 'id');
    }

    public function rdv_examens()
    {
        return $this->hasMany(RdvExamen::class, 'id_structure', 'id');
    }

}
