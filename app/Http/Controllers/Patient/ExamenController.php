<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\RdvExamen;
use App\Repositories\BaseRepository;
use App\Repositories\Structure\StrPraticienRepository;
use App\Repositories\Structure\StructureRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class ExamenController extends Controller
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
        $examens = $this->baseRepository->getExamens();
        $villes = $this->baseRepository->getVilles();
        $communes = $this->baseRepository->getCommunes();

        return view('rdv.examen.step1', compact('examens', 'villes', 'communes'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'examen' => 'required|not_in:0',
            'ville' => 'required|not_in:0',
            'commune' => 'required|not_in:0',
        ]);

        Session::put('examen', $request->except('_token'));

        return redirect()->route('rdv_examen2');
    }

    public function stepForm2()
    {
       
        $ville = session('examen')['ville'];
        $commune = session('examen')['commune'];
        $examen = session('examen')['examen'];

        $examen = $this->baseRepository->findExamen($examen);
        $structures = $examen->structures()
                             ->where(function($query) use ($ville, $commune) {
                                 $query->where('ville', $ville)
                                        ->orWhere('commune', $commune);
                             })
                             ->orderBy('nom', 'asc')
                             ->get();
            
        return view('rdv.examen.step2', compact('structures'));
    }

    public function storeStep2(Request $request)
    {
        $this->validate($request, [
            'structure' => 'required|not_in:0'
        ]);

        if($request->session()->exists('examen.step1')){
            Session::forget('examen.step1');
        }

        Session::push('examen.step1', $request->structure);
        
        return redirect()->route('rdv_examen3');
    }

    public function stepForm3()
    {
        $structure = $this->structureRepository->findStructure(session('examen.step1')[0]);
  
        $praticiens = $structure->strPraticiens()
                                // ->whereHas('specialites', function($query){
                                //     $query->where('specialites.id', session('rdv')['specialite']);
                                // })
                                ->orderBy('str_praticien_nom', 'asc')
                                ->get();


        return view('rdv.examen.step3', compact('praticiens'));
    }

    public function storeStep3(Request $request)
    {
        $this->validate($request, [
            "date" => "required|date",
            "heure" => "required|not_in:0",
            "motif" => "required",
            "has_specialist" => "required",
            "praticien" => Rule::requiredIf($request->has_specialist === 'oui'),
            "assure" => "required",
            "assurence" => Rule::requiredIf($request->assure === 'oui'),
        ]);

        if($request->session()->exists('examen.step2')){
            Session::forget('examen.step2');
        }

        $collection = collect($request->except('_token'));
        $praticien = $collection->has('praticien') ? $request->praticien : null;
        $assurence = $collection->has('assurence') ? $request->assurence : null;
        $other = $collection->has('other') ? $request->other : null;

        $merge = $collection->merge(compact('praticien', 'assurence', 'other'));

        Session::push('examen.step2', $merge->toArray());

        return redirect()->route('examen_racap');
    }

    public function recap(Request $request)
    {
        $praticien = null;

        $data = session('examen');
       
        $praticien_id = $data['step2'][0]['praticien'];

        $structure = $this->structureRepository->findStructure($data['step1'][0]);
        $examen = $this->baseRepository->findExamen($data['examen']);

        if($praticien_id != null){
            $praticien = $this->strPraticienRepository->findById($praticien_id);
        }
        
        return view('rdv.examen.step4', compact('data', 'praticien', 'examen', 'structure'));
    }

    public function storeRecap(Request $request)
    {
       
        if(!$request->session()->exists('examen')){
            return redirect()->route('patient.home');
        }

        $data = session('examen');
       
        $result = RdvExamen::create([
            'id_patient' => Auth::id(),
            'id_examen' => $data['examen'],
            'id_structure' => $data['step1'][0],
            'praticien_check' => $data['step2'][0]['has_specialist'] ? 1 : 0,
            'id_praticien' => $data['step2'][0]['praticien'],
            'ville' => $data['ville'],
            'commune' => $data['commune'],
            'date' => $data['step2'][0]['date'],
            'heure' => $data['step2'][0]['heure'],
            'motif' => $data['step2'][0]['motif'],
            'assure' => $data['step2'][0]['assure'] ? 1 : 0,
            'assurence' => $data['step2'][0]['assurence'],
            'autre_assurence' => $data['step2'][0]['other']
        ]);

        if($result){
            $request->session()->forget('examen');
            return redirect()->route('patient.home')->with('success', 'Votre de prise de rendez-vous a été prise en compte, Vous recevrez une confirmation');
        }
        
        return redirect()->route('patient.home')->with('error', 'Une erreur est survenue lors du traitement de votre demande. Veuillez reessayer');

    }

    public function cancel(Request $request)
    {
        if($request->session()->exists('examen')){
            $request->session()->forget('examen');
        }

        return redirect()->route('patient.home')->with('error', 'Votre demmande de rendez-vous a été annulé');
    }
}
