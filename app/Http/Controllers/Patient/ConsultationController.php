<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\RdvConsultation;
use App\Repositories\BaseRepository;
use App\Repositories\Structure\StrPraticienRepository;
use App\Repositories\Structure\StructureRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class ConsultationController extends Controller
{
    protected $baseRepository;
    protected $structureRepository;
    protected $strPraticienRepository;

    public function __construct(
        BaseRepository $baseRepository, 
        StructureRepository $structure, 
        StrPraticienRepository $strPraticienRepository)
    {
        $this->baseRepository = $baseRepository;
        $this->structureRepository = $structure;
        $this->strPraticienRepository = $strPraticienRepository;
    }

    public function stepForm1()
    {
        $specialites = $this->baseRepository->getSpecialites();
        $villes = $this->baseRepository->getVilles();
        $communes = $this->baseRepository->getCommunes();

        return view('rdv.consultation.step1', compact('specialites', 'villes', 'communes'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'specialite' => 'required|not_in:0',
            'ville' => 'required|not_in:0',
            'commune' => 'required|not_in:0',
        ]);

        Session::put('rdv', $request->except('_token'));

        return redirect()->route('rdv_consultation2');
    }

    public function stepForm2()
    {
       
        $ville = session('rdv')['ville'];
        $commune = session('rdv')['commune'];
        $specialite = session('rdv')['specialite'];

        $specialite = $this->baseRepository->findSpecialite($specialite);

        $structures = $specialite->structures()
                             ->where(function($query) use ($ville, $commune) {
                                 $query->where('ville', $ville)
                                        ->orWhere('commune', $commune);
                             })
                             ->orderBy('nom', 'asc')
                             ->get();

        return view('rdv.consultation.step2', compact('structures'));
    }

    public function storeStep2(Request $request)
    {
        $this->validate($request, [
            'structure' => 'required|not_in:0'
        ]);

        if($request->session()->exists('rdv.step1')){
            Session::forget('rdv.step1');
        }

        Session::push('rdv.step1', $request->structure);
        
        return redirect()->route('rdv_consultation3');
    }

    public function stepForm3()
    {
        $structure = $this->structureRepository->findStructure(session('rdv.step1')[0]);
        $praticiens = $structure->strPraticiens()
                                // ->whereHas('specialites', function($query){
                                //     $query->where('specialites.id', session('rdv')['specialite']);
                                // })
                                ->orderBy('str_praticien_nom', 'asc')
                                ->get();


        return view('rdv.consultation.step3', compact('praticiens'));
    }

    public function storeStep3(Request $request)
    {
        $this->validate($request, [
            "date" => "required|date",
            "heure" => "required|not_in:0",
            "motif" => "required",
            "praticien" => Rule::requiredIf($request->has_specialist === 'oui'),
            "assure" => "required",
            "assurence" => Rule::requiredIf($request->assure === 'oui'),
        ]);

        if($request->session()->exists('rdv.step2')){
            Session::forget('rdv.step2');
        }

        $collection = collect($request->except('_token'));
        $praticien = $collection->has('praticien') ? $request->praticien : null;
        $assurence = $collection->has('assurence') ? $request->assurence : null;
        $other = $collection->has('other') ? $request->other : null;

        $merge = $collection->merge(compact('praticien', 'assurence', 'other'));

        Session::push('rdv.step2', $merge->toArray());
        

        return redirect()->route('rdv_recap');
    }

    public function recap()
    {
        $praticien = null;

        $rdv = session('rdv');
        $praticien_id = session('rdv.step2')[0]['praticien'];

       
        $structure = $this->structureRepository->findStructure($rdv['step1'][0]);
        $specialite = $this->baseRepository->findSpecialite($rdv['specialite']);

        if($praticien_id != null){
            $praticien = $this->strPraticienRepository->findById($praticien_id);
        }

        return view('rdv.consultation.step4', compact('rdv', 'praticien', 'specialite', 'structure'));
    }

    public function storeRecap(Request $request)
    {
        if(!$request->session()->exists('rdv')){
            return redirect()->route('patient.home');
        }
        $rdv = session('rdv');
       
        $result = RdvConsultation::create([
            'id_patient' => Auth::id(),
            'id_structure' => $rdv['step1'][0],
            'id_specialite' => $rdv['specialite'],
            'praticien_check' => $rdv['step2'][0]['has_specialist'] ? 1 : 0,
            'id_praticien' => $rdv['step2'][0]['praticien'],
            'ville' => $rdv['ville'],
            'commune' => $rdv['commune'],
            'date' => $rdv['step2'][0]['date'],
            'heure' => $rdv['step2'][0]['heure'],
            'motif' => $rdv['step2'][0]['motif'],
            'assure' => $rdv['step2'][0]['assure'] ? 1 : 0,
            'assurence' => $rdv['step2'][0]['assurence'],
            'autre_assurence' => $rdv['step2'][0]['other']
        ]);

        if($result){
            $request->session()->forget('rdv');
            return redirect()->route('patient.home')->with('success', 'Votre de prise de rendez-vous a été prise en compte, Vous recevrez une confirmation');
        }
        
        return redirect()->route('patient.home')->with('error', 'Une erreur est survenue lors du traitement de votre demande. Veuillez reessayer');

    }

    public function cancel(Request $request)
    {
        if($request->session()->exists('rdv')){
            $request->session()->forget('rdv');
        }

        return redirect()->route('patient.home')->with('error', 'Votre demmande de consultation a été annulé');
    }
}
