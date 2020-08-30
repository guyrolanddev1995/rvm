<?php 
namespace App\Repositories;

use App\Specialite;

class SpecialiteRepository
{
    public function all()
    {
        return Specialite::orderBy('nom_specialite', 'asc')
                        ->get();
    }
}