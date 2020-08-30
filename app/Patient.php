<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Patient extends Authenticatable
{
    use Notifiable;
    
    protected $fillable = [
        'nom', 'prenom', 'email', 'age', 'sexe', 'phone', 'password', 'verified'
    ];

    public function confirmemail()
    {
        return $this->morphOne(Confirmemail::class, 'confirmemailable');
    }

    public function rdv_consultation()
    {
        return $this->hasMany(RdvConsultation::class, 'id_paticien', 'id');
    }
}
