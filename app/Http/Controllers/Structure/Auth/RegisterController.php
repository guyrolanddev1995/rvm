<?php

namespace App\Http\Controllers\Structure\Auth;

use App\Commune;
use App\Confirmemail as AppConfirmemail;
use App\Examin;
use App\Http\Controllers\Controller;
use App\Mail\ConfirmEmail;
use App\Repositories\BaseRepository;
use App\Specialite;
use App\Structure;
use App\Ville;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    protected $baseRepository;

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BaseRepository $baseRepository)
    {
        $this->middleware('guest:structure');
        $this->baseRepository = $baseRepository;
    }

    public function register_form()
    {
        $specialites = $this->baseRepository->getSpecialites();
        $examins = Examin::all();
        $villes = $this->baseRepository->getVilles();
        $communes = $this->baseRepository->getCommunes();
        $examins = $this->baseRepository->getExamens();
        
        return view('structure.auth.register', compact('specialites', 'examins', 'villes', 'communes'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        $validator =  Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:structures'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nom' => ['required', 'min:2'],
            'type_structure' => ['required', 'not_in:0'],
            'date_creation' => ['required'],
            'nombre_chambre' => ['required'],
            'nombre_lits' => ['required'],
            'ville' => ['required', 'not_in:0'],
            'commune' => ['required', 'not_in:0'],
            'phone' => ['required', 'numeric'],
            'examin' => ['required', 'array', 'min:1'],
            'type_specialite' => ['required', 'array', 'min:1']
        ]);

        return $validator;
    }

    /**
     * Cree une nouvelle instance apres la validation des donnees.
     *
     * @param  array  $data
     * @return \App\Structure
     */
    protected function create(array $data)
    {
        $structure = Structure::create([
            'nom' => $data['nom'],
            'email' => $data['email'],
            'telephone' => $data['phone'],
            'password' => bcrypt($data['password']),
            'date_creation' => $data['date_creation'],
            'type_id' => $data['type_structure'],
            'nombre_lits' => $data['nombre_lits'],
            'nombre_chambres' => $data['nombre_chambre'],
            'ville' => $data['ville'],
            'commune' => $data['commune'],
            'long' => $data['long'],
            'lat' => $data['lat'],
            'type_assurence' => $data['assurence']
        ]);

        $structure->specialites()->sync($data['type_specialite']);
        $structure->examins()->sync($data['examin']);

        AppConfirmemail::create([
            'token' => sha1(time()),
            'confirmemailable_id' => $structure->id,
            'confirmemailable_type' => Structure::class
        ]);

        $this->sendEmailVerification($structure);

        return $structure;
    }

    public function sendEmailVerification($structure)
    {
        Mail::to($structure->email)->send(new ConfirmEmail($structure));
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $structure = $this->create($request->all());

        if($structure){
            event(new Registered($structure));
            return view('utils.success');
        }
    }

    public function confirmEmail($token)
    {
        
        $verifyToken = AppConfirmEmail::where('token', $token)->first();

        if($verifyToken){
            $structure = $verifyToken->confirmemailable;
            
            if(!$structure->verified){
                $structure->verified = 1;
                $structure->save();
                
                return redirect()->route('structure.login.form')->with('success', 'Félicitation, votre compte a bien été confirmé. Connectez-vous à présent');
            }
            else{
               return redirect()->route('structure.login.form')->with('info', 'Votre compte a déjà été confirmé, connectez-vous à présent');
            }
        }
        else{
           return redirect()->route('structure.login.form')->with('error', 'Impossible de confirmer votre compte');
        }

    }
}
