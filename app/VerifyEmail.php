<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifyEmail extends Model
{
    protected $fillable = [
        'token', 'verify_emailable_id', 'verify_emailable_type'
    ];

    public function verifyEmailable()
    {
        return $this->morphTo();
    }
}
