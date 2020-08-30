<?php

namespace App\Http\Controllers\Structure;

use App\Http\Controllers\Controller;
use App\Repositories\BaseRepository;
use App\Repositories\Structure\StrPraticienRepository;
use App\Specialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PraticienController extends Controller
{
    protected $strPraticienRepository;
    protected $baseRepository;

    public function __construct(StrPraticienRepository $strPraticienRepository, BaseRepository $baseRepository)
    {
        $this->strPraticienRepository = $strPraticienRepository;
        $this->baseRepository = $baseRepository;
    }

    public function index()
    {
        $praticiens = $this->strPraticienRepository->all();
        
        return view('structure.pages.praticien.index', compact('praticiens'));
    }

    public function show($praticien)
    {
        $praticien = $this->strPraticienRepository->findById($praticien);
        $consultations = $praticien->consultations()->with('specialite')->get();

        return view('structure.pages.praticien.show', compact('praticien', 'consultations'));
    }

    /**
     * Afficher la page d'enregistrement d'un praticien
     * 
     */
    public function create()
    {
        $specialites = $this->baseRepository->getSpecialites();
        $villes = $this->baseRepository->getVilles();
        $communes = $this->baseRepository->getCommunes();

        return view('structure.pages.praticien.create', compact('specialites', 'villes', 'communes'));
    }

    public function store(Request $request)
    {
        $this->validator($request);

        $praticien = $this->strPraticienRepository->store($request->all(), Auth::id());

        return redirect()->route('structure.praticien.consultation.create', $praticien->id)->with('success', 'Praticien ajouté avec succèss');
    }

    public function edit($praticien)
    {
        $praticien = $this->strPraticienRepository->findById($praticien);
        $praticien->load('specialites');

        $specialites = $this->baseRepository->getSpecialites();

        return view('structure.pages.praticien.edit', compact('praticien', 'specialites'));
    }

    public function update(Request $request, $praticien)
    {
        $this->validator($request);
        $this->strPraticienRepository->update($request, $praticien);

        return redirect()->route('structure.praticiens.index')->with('success', 'Profile du praticien mise à jour avec success');
    }

    protected function  validator($data)
    {
       return $this->validate($data, [
            'nom' => ['required'],
            'prenom' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'date_naissance' => ['required', 'date'],
            'lieu_naissance' => ['required'],
            'lieu_residence' => ['required'],
            'sexe' => ['required'],
            'specialites' => ['required', 'array', 'min:1'],
            'commune' => ['required', 'not_in:0'],
            'ville' => ['required', 'not_in:0']
        ]);
    }

    /** ************** ***** ******* ***** ******
     *   Nous créeons des methods destinées a   *
     *  la logique du systeme de consultation   *
     *   des praticiens                         * 
     *  -consultationForm                       *
     *  -storeConsultation                      *
     *******************************************/

    public function consultationForm($praticien)
    {
        $praticien = $this->strPraticienRepository->findById($praticien);
        $specialites = $praticien->specialites;
        return view('structure.pages.praticien.planings.create', compact('specialites', 'praticien'));
    }

    public function storeConsultation(Request $request, $praticien)
    {
        $this->validate($request, [
            'specialite' => 'required|not_in:0',
            'jour' => 'required',
            'heure_debut' => 'required',
            'heure_fin' => 'required'
        ]);
        $this->strPraticienRepository->storeConsultation($request->all(), $praticien);
        return redirect()->back()->with('success', 'Données de consultation mises à jour avec succèss');
    }

    public function editConsultation($praticien, $consultation)
    {
        $params = [
            'id' => $consultation,
            'id_str_praticien' => $praticien
        ];

        $consultation = $this->strPraticienRepository->findConsultationBy($params);
        $praticien = $this->strPraticienRepository->findById($praticien);
        $praticien->load('specialites');

        return view('structure.pages.praticien.planings.edit', compact('consultation', 'praticien'));
    }

    public function UpdateConsultation(Request $request, $praticien, $consultation)
    {
        $this->validate($request, [
            'specialite' => 'required|not_in:0',
            'jour' => 'required',
            'heure_debut' => 'required',
            'heure_fin' => 'required'
        ]);

        $params = [
            'id' => $consultation,
            'id_str_praticien' => $praticien
        ];

        $this->strPraticienRepository->updateConsultation($request->all(), $params);

        return redirect()->route('structure.praticien.show', $praticien)->with('success', 'Consultation mise à jour avec succèss');
    }
}
