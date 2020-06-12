<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Praticien;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Response;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data['praticien'], [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'email' => $data['praticien']['email'],
            'password' => Hash::make($data['praticien']['password']),
            'avatar' => 'avatar.jpg'
        ]);


        $praticien = Praticien::create([
            "user_id" => $user->id,
            'commune_id' => 1,
            'praticien_nom' => $data['praticien']['nom'],
            'praticien_prenom' => $data['praticien']['prenom'],
            'praticien_date_naisssance' => $data['praticien']['date_naissance'],
            'praticien_sexe' => $data['praticien']['sexe'],
            'praticien_numero_professionnel' => $data['praticien']['numero_ordre'],
            'praticien_presentation' => $data['praticien']['bio'],
            'praticien_telephone' => $data['praticien']['telephone'],
            'praticien_lieu_residence' => $data['praticien']['lieu_residence'],
            'praticien_lieu_naissance' => $data['praticien']['lieu_naissance'],
            'praticien_status' => 'BROUILLON' 
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard('praticien')->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new Response('', 201)
                    : redirect($this->redirectPath());
    }
}
