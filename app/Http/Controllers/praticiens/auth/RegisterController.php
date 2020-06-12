<?php

namespace App\Http\Controllers\praticiens\auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifyPraticienAccount;
use App\Praticien;
use App\verifyPraticienEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register_form()
    {
        return view('praticien.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        $validator =  Validator::make($data['praticien'], [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nom' => ['required', 'min:2'],
            'prenom' => ['required'],
            'sexe' => ['required'],
            'lieu_naissance' => ['required'],
            'date_naissance' => ['required'],
            'telephone' => ['required', 'numeric'],
            'bio' => ['required'],
            'numero_ordre' => ['required', 'min:8']
        ]);

        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $praticien = [];

        try {
            $query = DB::transaction(function () use ($data, $praticien) {
                $praticien = Praticien::create([
                    'email' => $data['praticien']['email'],
                    'password' => Hash::make($data['praticien']['password']),
                    'avatar' => $data['praticien']['profile_file'] ?? '',
                    'commune_id' => 1,
                    'praticien_nom' => $data['praticien']['nom'],
                    'praticien_prenom' => $data['praticien']['prenom'],
                    'praticien_date_naissance' => $data['praticien']['date_naissance'],
                    'praticien_sexe' => $data['praticien']['sexe'],
                    'praticien_numero_professionnel' => $data['praticien']['numero_ordre'],
                    'praticien_presentation' => $data['praticien']['bio'],
                    'praticien_telephone' => $data['praticien']['telephone'],
                    'praticien_lieu_residence' => $data['praticien']['lieu_residence'],
                    'praticien_lieu_naissance' => $data['praticien']['lieu_naissance'],
                    'praticien_status' => 'BROUILLON' 
                ]);

                foreach($data['praticien']['specialites'] as $specialite){
                    $praticien->specialites()->sync([
                        $specialite['name'] => [
                            'specialite_praticien_date_debut' => $specialite['date'],
                        ]
                    ]);
    
                }
    
                foreach($data['praticien']['structures'] as $structure){
                    $praticien->structures()->sync([
                        $structure['name'] => [
                            'structure_praticien_date_debut' => $structure['date'],
                        ]
                    ]);
                }
    
                $verifyPraticien = verifyPraticienEmail::create([
                    'praticien_id' => $praticien->id,
                    'token' => sha1(time())
                ]);
    
                return $praticien;
            });

        } catch (\Exception $e) {
            return false;
        }
          
        if($query != []){
            $this->sendEmailVerification($query);
        }
        else{
            return false;
        }

        return true;    
    }

    public function sendEmailVerification($praticien)
    {
        Mail::to($praticien->email)->send(new VerifyPraticienAccount($praticien));
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return response()->json([
            'success' => 1
        ]);
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }

    public function verifyAccount($token)
    {
        $verifyToken = verifyPraticienEmail::where('token', $token)->first();
        if($verifyToken){
            $praticien = $verifyToken->praticien;

            if(!$praticien->verified){
                $verifyToken->praticien->verified = 1;
                $verifyToken->praticien->save();
                
                return redirect()->route('praticien-login')->with('success', 'Votre E-mail a été verifié . Connectez-vous à présent');
            }
            else{
               return redirect()->route('praticien-login')->with('success', 'Votre E-mail a déjà été vérfié, connectez-vous à présent');
            }
        }
        else{
           
           return redirect()->route('praticien-login')->with('error', 'Impossible de valider votre email');
        }

    }

    public function uploadOneFile(Request $request){

        $validator = Validator::make($request->all(),[
            'file'  =>  'image|mimes:jpeg,png,gif,jpg|max:2048'
        ]);

        if ($validator->fails()) {
           return response()->json(['errors'=>$validator->errors()]);
        }

        $file = $request->file('file');
        $name = basename($file->storePublicly('praticiens/profiles', ['disk' => 'public']));
 
        return response()->json([
            'success' => true,
            'name' => $name
        ]);
    }
}
