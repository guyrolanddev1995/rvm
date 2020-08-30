<?php
namespace App\Repositories;

use App\Commune;
use App\Examin;
use App\Specialite;
use App\Ville;

class BaseRepository
{
    public function getVilles()
    {
        return Ville::orderBy('nom', 'asc')->get();
    }

    public function getCommunes()
    {
        return Commune::orderBy('nom', 'asc')->get();
    }



    public function getSpecialites()
    {
        return Specialite::orderBy('nom_specialite', 'asc')->get();
    }

    public function findSpecialite($id)
    {
        return Specialite::findOrFail($id);
    }


    /**
     * Examen Repositorie
     */
    public function getExamens()
    {
        return Examin::orderBy('nom', 'asc')->get();
    }

    public function findExamen($id)
    {
        return Examin::findOrFail($id);
    }
}