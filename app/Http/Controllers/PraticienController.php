<?php

namespace App\Http\Controllers;

use App\Praticien;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PraticienController extends Controller
{
    public function register()
    {
        return view('praticien.register');
    }

    public function save(Request $request)
    {
        
       DB::transaction(function () use ($request) {
            $user = User::create([
                'email' => $request['praticien']['email'],
                'password' => Hash::make($request['praticien']['password']),
                'avatar' => 'avatar.jpg'
            ]);

            $praticien = Praticien::create([
                "user_id" => $user->id,
                'commune_id' => 1,
                'praticien_nom' => $request['praticien']['nom'],
                'praticien_prenom' => $request['praticien']['prenom'],
                'praticien_date_naissance' => $request['praticien']['date_naissance'],
                'praticien_sexe' => $request['praticien']['sexe'],
                'praticien_numero_professionnel' => $request['praticien']['numero_ordre'],
                'praticien_presentation' => $request['praticien']['bio'],
                'praticien_telephone' => $request['praticien']['telephone'],
                'praticien_lieu_residence' => $request['praticien']['lieu_residence'],
                'praticien_lieu_naissance' => $request['praticien']['lieu_naissance'],
                'praticien_status' => 'BROUILLON' 
            ]);

            
       });
       
    }
}
