<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confirmemail extends Model
{
    protected $fillable = [
        'confirmemailable_id', 'confirmemailable_type', 'token'
    ];

    public function confirmemailable()
    {
        return $this->morphTo();
    }
}
