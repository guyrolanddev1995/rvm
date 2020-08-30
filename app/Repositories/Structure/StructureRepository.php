<?php
namespace App\Repositories\Structure;

use App\RdvConsultation;
use App\RdvExamen;
use App\Structure;

class StructureRepository
{
    public function all()
    {
        return Structure::orderBy('nom', 'asc')->get();
    }

    public function filterStructurByCities($param1, $param2)
    {
        return Structure::with('strPraticiens')
                        ->where('verified', 1)
                        ->where(function($query) use ($param2, $param1){
                            $query->where('ville', $param1)
                                  ->orWhere('commune', $param2);
                        })
                        ->orderBy("nom", 'asc')
                        ->get();

    }

    public function findStructure($id)
    {
        return Structure::where('verified', 1)
                        ->where('id', $id)
                        ->first();
    }

    public function consulationQueryBuilder($id)
    {
        $structure = $this->findStructure($id);
        return $structure->rdv_consultations();
    }

    public function findConsultation($id)
    {
        $consultation =  RdvConsultation::find($id);
        $consultation->load('specialite', 'strPraticien', 'patient');

        return $consultation;

    }

    public function confirmConsultation($id)
    {
        $consultation = $this->findConsultation($id);
        return $consultation->update([
            'status' => 'valide'
        ]);
    }

    public function getAllConsultations($id)
    {
        return $this->consulationQueryBuilder($id)
                              ->with('specialite', 'patient')
                              ->orderBy('created_at', 'desc')
                              ->get();
    }

    public function getUnConfirmConsultations($id)
    {
        return $this->consulationQueryBuilder($id)
                    ->with('specialite', 'strPraticien', 'patient')
                    ->where('status', 'en attente')
                    ->orderBy('created_at', 'desc')
                    ->take(10)
                    ->get();
    }

    public function unreadConsultations($id)
    {
        return $this->consulationQueryBuilder($id)
                    ->where('status', 'en attente')
                    ->count();
    }

    public function readConsultations($id)
    {
        return $this->consulationQueryBuilder($id)
                    ->where('status', 'valide')
                    ->count();
    }



    public function examensQueryBuilder($id)
    {
        $structure = $this->findStructure($id);
        return $structure->rdv_examens();
    }

    public function getAllExamens($id)
    {
        return $this->examensQueryBuilder($id)
                              ->with('examen', 'strPraticien')
                              ->orderBy('created_at', 'desc')
                              ->get();
    }

    public function getUnreadExamens($id)
    {
        return $this->examensQueryBuilder($id)
                    ->with('examen', 'strPraticien', 'patient')
                    ->where('status', 'en attente')
                    ->orderBy('created_at', 'desc')
                    ->take(10)
                    ->get();
    }

    public function unreadExamens($id)
    {
        return $this->examensQueryBuilder($id)
                    ->where('status', 'en attente')
                    ->count();
    }

    public function readExamens($id)
    {
        return $this->examensQueryBuilder($id)
                    ->where('status', 'valide')
                    ->count();
    }

    public function findExamen($id)
    {
        $examen =  RdvExamen::find($id);
        $examen->load('examen', 'strPraticien', 'patient');

        return $examen;

    }

    public function confirmExamen($id)
    {
        $examen = $this->findExamen($id);
        return $examen->update([
            'status' => 'valide'
        ]);
    }

}