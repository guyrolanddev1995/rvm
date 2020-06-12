<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class verifyPraticienEmail extends Model
{
    protected $fillable = [
        'praticien_id', 'token'
    ];
    
    public function praticien()
    {
        return $this->belongsTo(Praticien::class, 'praticien_id');
    }
}
