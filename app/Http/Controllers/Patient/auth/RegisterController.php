<?php

namespace App\Http\Controllers\Patient\auth;

use App\Confirmemail;
use App\Http\Controllers\Controller;
use App\Mail\ConfirmPatientMail;
use App\Patient;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
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
        return view('patient.auth.register');
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:patients'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nom' => ['required', 'min:2'],
            'prenom' => ['required'],
            'sexe' => ['required'],
            'age' => ['required', 'numeric'],
            'phone' => ['required', 'numeric'],
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
        $patient = Patient::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'age' => $data['age'],
            'sexe' => $data['sexe'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password'])
        ]);

        Confirmemail::create([
            'token' => sha1(time()),
            'confirmemailable_id' => $patient->id,
            'confirmemailable_type' => Patient::class
        ]);

        $this->sendEmailVerification($patient);

        return $patient;
    }

    public function sendEmailVerification($patient)
    {
        Mail::to($patient->email)->send(new ConfirmPatientMail($patient));
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = $this->create($request->all());
        
        if($user){
            event(new Registered($user));
            return view('utils.success');
        }
    }

    public function confirmEmail($token)
    {
        
        $verifyToken = Confirmemail::where('token', $token)->first();

        if($verifyToken){
            $patient = $verifyToken->confirmemailable;
            
            if(!$patient->verified){
                $patient->verified = 1;
                $patient->save();
                
                return redirect()->route('patient.login.form')->with('success', 'Félicitation, votre compte a bien été confirmé. Connectez-vous à présent');
            }
            else{
               return redirect()->route('patient.login.form')->with('info', 'Votre compte a déjà été confirmé, connectez-vous à présent');
            }
        }
        else{
           return redirect()->route('patient.login.form')->with('error', 'Impossible de confirmer votre compte');
        }

    }
}
