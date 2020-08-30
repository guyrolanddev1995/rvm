<?php

namespace App\Http\Controllers\Structure;

use App\Http\Controllers\Controller;
use App\Repositories\Structure\StructureRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StructureController extends Controller
{
    protected $structureRepository;

    public function __construct(StructureRepository $structureRepository)
    {
        $this->structureRepository = $structureRepository;
    }
    public function index()
    {
       
        return view('structure.pages.dashbord');
    }

    public function records()
    {
        $consultations = $this->structureRepository->getUnConfirmConsultations(Auth::id());
        $examens = $this->structureRepository->getUnreadExamens(Auth::id());

        return response()->json([
            'consultations' => $consultations,
            'examens' => $examens
        ]);
    }

    public function unReadConsultations()
    {
        $unreadConsultations = $this->structureRepository->unreadConsultations(Auth::id());
        $readConsultations = $this->structureRepository->readConsultations(Auth::id());
        $unreadExamens = $this->structureRepository->unreadExamens(Auth::id());
        $readExamens = $this->structureRepository->readExamens(Auth::id());

        return response()->json([
            'unreadConsultations' => $unreadConsultations,
            'readConsultations' => $readConsultations,
            'unreadExamens' => $unreadExamens,
            'readExamens' => $readExamens
        ]);
    }

    public function getAllConsultations() 
    {
        $consultations = $this->structureRepository->getAllConsultations(Auth::id());
        return view('structure.pages.consultations.index', compact('consultations'));
    }

    public function showConsultation($consultation)
    {
        $consultation = $this->structureRepository->findConsultation($consultation);
        return view('structure.pages.consultations.show', compact('consultation'));
    }

    public function confirmConsultation($consultation)
    {
        $result = $this->structureRepository->confirmConsultation($consultation);
        if(!$result){
            return redirect()->route('structure.consultations')->with('error', 'Erreur survenue lors de la confirmation de la demande.Réessayer');
        }

        return redirect()->route('structure.consultations')->with('success', 'Demande de rendez-vous confirmée avec succès');
    }

    public function getAllExamens()
    {
        $examens = $this->structureRepository->getAllExamens(Auth::id());
        return view('structure.pages.examens.index', compact('examens'));
    }

    public function showExamen($examen)
    {
        $examen = $this->structureRepository->findExamen($examen);
        return view('structure.pages.examens.show', compact('examen'));
    }

    public function confirmExamen($examen)
    {
        $result = $this->structureRepository->confirmExamen($examen);
        if(!$result){
            return redirect()->route('structure.examens')->with('error', 'Erreur survenue lors de la confirmation de la demande.Réessayer');
        }

        return redirect()->route('structure.examens')->with('success', 'Demande de rendez-vous confirmée avec succès');
    }

}
