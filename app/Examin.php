<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examin extends Model
{
    protected $fillable = [
        'nom'
    ];

    public function structures()
    {
        return $this->belongsToMany(Structure::class, 'examin_structure', 'examin_id', 'structure_id', 'id', 'id');
    }
}
