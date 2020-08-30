<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeStructure extends Model
{
    protected $fillable = [
        'nom'
    ];

    public function structures()
    {
        return $this->hasMany(Structure::class, 'type_id');
    }
}
