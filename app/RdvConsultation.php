<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RdvConsultation extends Model
{
    protected $fillable = [
        'id_patient', 'id_structure', 'id_specialite', 'praticien_check', 'id_praticien',
        'ville', 'commune', 'date', 'heure',
        'motif', 'assure', 'assurence', 'autre_assurence', 'status'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'id_patient', 'id');
    }

    public function specialite()
    {
        return $this->belongsTo(Specialite::class, 'id_specialite', 'id');
    }

    public function strPraticien()
    {
        return $this->belongsTo(Strpraticien::class, 'praticien', 'id');
    }

}
