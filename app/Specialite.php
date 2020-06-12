<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    protected $fillable = [
        'specialite_nom'
    ];

    public function specialites()
    {
        return $this->belongsToMany(Specialite::class, 'praticien_specialite', 'praticien_id', 'specialite_id');
    }
}
