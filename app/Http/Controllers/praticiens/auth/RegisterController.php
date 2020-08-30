<?php

namespace App\Http\Controllers\praticiens\auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifyPraticienAccount;
use App\Praticien;
use App\Repositories\BaseRepository;
use App\Traits\UploadFile;
use App\verifyPraticienEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use UploadFile;

    protected $baseRepository;
    

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BaseRepository $baseRepository)
    {
        $this->middleware('guest:praticien');

        $this->baseRepository = $baseRepository;
    }

    public function registerForm()
    {
        return view('praticien.auth.register.step1');
    }

    public function storeForm(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nom' => ['required', 'min:2'],
            'prenom' => ['required'],
            'sexe' => ['required'],
            'lieu_naissance' => ['required'],
            'lieu_residence' => ['required'],
            'date_naissance' => ['required', 'date'],
            'phone' => ['required', 'numeric'],
            'presentation' => ['required'],
        ]);

        $request->session()->put('praticien', $request->except('_token'));

        return redirect()->route('praticien.register.form2');
    }

    public function registerForm2()
    {
        $specialites = $this->baseRepository->getSpecialites();
        return view('praticien.auth.register.step2', compact('specialites'));
    }

    public function storeForm2(Request $request)
    {
       
        $this->validate($request, [
            'num_ordre' => ['required', 'min:8'],
            'specialite' => ['required', 'array', 'min:1'],
            'date_exercice' => ['required', 'array', 'min:1'],
        ]);

        if($request->session()->exists('praticien.step')){
            $request->session()->forget('praticien.step');
        }

        $request->session()->push('praticien.step', $request->except('_token'));

        return redirect()->route('praticien.register.form3');
    }


    public function registerForm3()
    {
        return view('praticien.auth.register.step3');
    }

    public function storeForm3(Request $request)
    {
       
        $file = $this->uploadOneFile($request);

        if($request->session()->exists('praticien.step1')){
            $request->session()->forget('praticien.step1');
        }

        $request->session()->push('praticien.step1', $file);

        return redirect()->route('praticien.register.form4');
    }

    public function registerForm4()
    {
        return view('praticien.auth.register.step4');
    }

    public function storeForm4(Request $request)
    {
       
        if($request->session()->exists('praticien.step3')){
            $request->session()->forget('praticien.step3');
        }

        $collection = collect($request->except('_token'));
        $conseil_medical = $collection->has('conseil_medical') ? $request->conseil_medical : null;
        $suivie_patient = $collection->has('suivie_patient') ? $request->suivie_patient : null;
       
        $merge = $collection->merge(compact('conseil_medical', 'suivie_patient'));

        $request->session()->push('praticien.step3', $merge->toArray());

        return redirect()->route('praticien.register.form5');
    }

    public function registerForm5()
    {
        $praticien = session('praticien');
        $specialites = $this->baseRepository->getSpecialites();
        return view('praticien.auth.register.step5', compact('praticien', 'specialites'));
    }

    public function storeForm5()
    {
        $data = session('praticien');
        
        $praticien = Praticien::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar' => $data['step1'][0] ?? '',
            'praticien_nom' => $data['nom'],
            'praticien_prenom' => $data['prenom'],
            'praticien_date_naissance' => $data['date_naissance'],
            'praticien_sexe' => $data['sexe'],
            'praticien_numero_professionnel' => $data['step'][0]['num_ordre'],
            'praticien_presentation' => $data['presentation'],
            'praticien_telephone' => $data['phone'],
            'praticien_lieu_residence' => $data['lieu_residence'],
            'praticien_lieu_naissance' => $data['lieu_naissance'],
            'conseil_medical' => $data['step3'][0]['conseil_medical'] == 'on' ? true : false,
            'suivie_patient' => $data['step3'][0]['suivie_patient'] == 'on' ? true : false,
            'praticien_status' => 'BROUILLON' 
        ]);

        return $praticien;
    }

    public function register(Request $request)
    {
        
        $user = $this->storeForm5();

        if($user){
            if($request->session()->exists('praticien')){
                $request->session()->forget('praticien');
                return redirect()->route('success-page');
            }
        } 
    }

    public function uploadOneFile(Request $request){

        $validator = Validator::make($request->all(),[
            'photo'  =>  'image|mimes:jpeg,png,gif,jpg|max:1024'
        ]);

        if ($validator->fails()) {
           return response()->json(['errors'=>$validator->errors()]);
        }

        $file = $request->file('photo');

        $name = $this->uploadOne($file, 'praticiens/profiles');
 
        return  $name;
    }
}
