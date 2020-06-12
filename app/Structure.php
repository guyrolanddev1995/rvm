<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    protected $fillable = [
        'structure_nom'
    ];

    public function praticiens()
    {
        return $this->belongsToMany(
            Praticien::class, 
            'praticien_structure', 
            'praticien_id', 'structure_id'
        );
    }
}
