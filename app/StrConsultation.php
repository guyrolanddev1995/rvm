<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StrConsultation extends Model
{
    protected $fillable = [
        'id_structure', 'id_str_praticien',
        'id_specialite', 'jour', 'heure_debut', 'heure_fin'
    ];

    public function structure()
    {
        return $this->belongsTo(Structure::class, 'id_structure');
    }

    public function strpraticien()
    {
        return $this->belongsTo(Strpraticien::class, 'id_str_praticien', 'id');
    }

    public function specialite()
    {
        return $this->belongsTo(Specialite::class, 'id_specialite');
    }    
}
