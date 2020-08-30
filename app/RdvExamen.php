<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RdvExamen extends Model
{
    protected $fillable = [
        'id_patient', 'id_examen', 'id_structure', 'id_praticien', 'praticien_check',
        'ville', 'commune', 'date', 'heure', 'motif',
        'assure', 'assurence', 'autr_assurence', 'status',
    ];

    public function structure()
    {
        return $this->belongsTo(Structure::class, 'id_structure', 'id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'id_patient', 'id');
    }

    public function examen()
    {
        return $this->belongsTo(Examin::class, 'id_examen', 'id');
    }

    public function strPraticien()
    {
        return $this->belongsTo(Strpraticien::class, 'id_praticien', 'id');
    }
}
