@extends('layouts.app')
@section('styles')
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
 <style>
     .image-cover{
         background-position: center;
         background-size: cover;
     }

     .register-card{
         height: 80vh;
     }
 </style>
@endsection
@section('content')

   <div class="w-screen h-screen overflow-x-hidden" style="background-color: #ADD8E6">
    @include('partials.header')
       @include('utils.flash')
       
       <div class="container h-full w-full mx-auto px-16 py-6 flex items-center justify-center">
        <div class="flex register-card w-full shadow rounded-lg border">
            <div class="w-2/5 image-cover border-transparent" style="background-image: url({{ asset('images/nurse.jpg') }});">
            </div>
            <div class="w-3/5 bg-white overflow-y-auto">
                <div class="form-container flex flex-col justify-center w-full">
                   <div class="card-form px-8 py-4">
                       <div class="card-header text-center mt-10">
                          <h1 class="text-3xl font-bold text-gray-800 mb-4 uppercase wow bounceIn" data-wow-delay=".7s" data-wow-duration="1s">Bienvenue sur notre espace structure sanitaire</h1>
                          <h2 class="text-sm mb-1 block font-semibold text-gray-700">Créer un nouveau compte</h2>
                       </div>
                       
                       <form action="{{ route('structure.register.store') }}" method="post" class="mt-16">
                          @csrf
                            <div class="mb-8">
                                <div class="flex justify-between w-full">
                                    <div class="w-full">
                                        <label for="nom" class="font-semibold text-sm mb-1 block text-gray-900">Nom de la structure <span class="text-red-600">*</span></label>
                                        <input name="nom" type="text" class="form-control w-full @error('nom') border-red-500 @enderror" value="{{ old('nom') }}" id="nom" placeholder="Entrer le nom de la structure">
                                        
                                        @error('nom')
                                            <span class="text-red-500 font-semibold">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                          <div class="mb-8">
                              <div class="flex justify-between w-full">
                                  <div class="w-full mr-8">
                                        <label for="email" class="font-semibold text-sm mb-1 block text-gray-900">Email <span class="text-red-600">*</span></label>
                                        <input name="email" type="email" class="form-control w-full @error('email') border-red-500 @enderror" value="{{ old('email') }}" id="email" placeholder="Entrer l'email de la structure">
                                        
                                        @error('email')
                                            <span class="text-red-500 font-semibold">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                  </div>
                                  <div class="w-full">
                                        <label for="phone" class="font-semibold text-sm mb-1 block text-gray-900">Telephone <span class="text-red-600">*</span></label>
                                        <input name="phone" type="number" class="form-control w-full @error('phone') border-red-500 @enderror" value="{{ old('phone') }}" id="phone" placeholder="Entrer le numero de telephone">
                                            
                                        @error('phone')
                                            <span class="text-red-500 font-semibold">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                  </div>
                              </div>
                          </div>
                           <div class="mb-8">
                                <div class="flex justify-between w-full">
                                    <div class="w-full mr-8">
                                        <label for="password" class="font-semibold text-sm mb-1 block text-gray-900">Mot de passe <span class="text-red-600">*</span></label>
                                        <input name="password" type="password" class="form-control w-full @error('password') border-red-500 @enderror" value="{{ old('password') }}" id="password" placeholder="Entrer votre mot de passe">
                                        
                                        @error('password')
                                            <span class="text-red-500 font-semibold">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="w-full">
                                        <label for="password_confirmation" class="font-semibold text-sm mb-1 block text-gray-900">Confirmer votre mot de passe <span class="text-red-600">*</span></label>
                                        <input name="password_confirmation" type="password" class="form-control w-full @error('password_confirmation') border-red-500 @enderror" value="{{ old('password_confirmation') }}" id="password_confirmation" placeholder="Entrer votre mot de passe">
                                        
                                        @error('password_confirmation')
                                            <span class="text-red-500 font-semibold">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                          
                          <hr>

                          <div class="my-8">
                                <div class="flex justify-between w-full">
                                    <div class="w-full">
                                        <label for="type_structure" class="font-semibold text-sm mb-1 block text-gray-900">Type de la structure sanitaire <span class="text-red-600">*</span></label>
                                        <select name="type_structure" id="type_structure" class="form-control bg-transparent w-full @error('type_structure') border-red-500 @enderror">
                                            <option value="">Selectionner le type de votre structure sanitaire</option>
                                            <option value="1">Structure 1</option>
                                            <option value="3">Structure 2</option>
                                        </select>
                                        
                                        @error('type_structure')
                                            <span class="text-red-500 font-semibold">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                         </div>
                         <div class="mb-8">
                            <div class="flex justify-between w-full">
                                <div class="w-full mr-8">
                                    <label for="date_creation" class="font-semibold text-sm mb-1 block text-gray-900">Date de creation de votre structure <span class="text-red-600">*</span></label>
                                    <input name="date_creation" type="date" class="form-control w-full @error('date_creation') border-red-500 @enderror" value="{{ old('date_creation') }}" id="date_creation" placeholder="Entrer votre mot de passe">
                                    
                                    @error('date_creation')
                                        <span class="text-red-500 font-semibold">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="assurence" class="font-semibold text-sm mb-1 block text-gray-900">Type d'assurence</label>
                                    <input name="assurence" type="text" class="form-control w-full @error('assurence') border-red-500 @enderror" value="{{ old('assurence') }}" id="assurence" placeholder="Entrer les types d'assurences pris en compte">
                                    
                                    @error('assurence')
                                        <span class="text-red-500 font-semibold">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-8">
                            <div class="flex justify-between w-full">
                                <div class="w-full mr-8">
                                    <label for="nombre_chambre" class="font-semibold text-sm mb-1 block text-gray-900">Capacité de chambre <span class="text-red-600">*</span></label>
                                    <input name="nombre_chambre" type="number" class="form-control w-full @error('nombre_chambre') border-red-500 @enderror" value="{{ old('nombre_chambre') }}" id="nombre_chambre" placeholder="Entrer le nombre de chambre">
                                    
                                    @error('nombre_chambre')
                                        <span class="text-red-500 font-semibold">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="nombre_lits" class="font-semibold text-sm mb-1 block text-gray-900">Capacité de lits <span class="text-red-600">*</span></label>
                                    <input name="nombre_lits" type="number" class="form-control w-full @error('nombre_lits') border-red-500 @enderror" value="{{ old('nombre_lits') }}" id="nombre_lits" placeholder="Entrer le nombre de lits">
                                    
                                    @error('nombre_lits')
                                        <span class="text-red-500 font-semibold">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-8">
                            <div class="flex w-full">
                                <div class="w-full relative">
                                    <label for="type_specialite" class="font-semibold text-sm mb-1 block text-gray-900">Selectionner les type de spécialité médicale disponible <span class="text-red-600">*</span></label>
                                    <select name="type_specialite[]" id="type_specialite" class="form-control w-full @error('type_specialite') border-red-500 @enderror" multiple>
                                        @foreach($specialites as $specialite)
                                            <option value="{{ $specialite->id }}">{{ $specialite->nom_specialite }}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('type_specialite')
                                        <span class="text-red-500 font-semibold">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-8">
                            <div class="flex w-full">
                                <div class="w-full relative">
                                    <label for="examin" class="font-semibold text-sm mb-1 block text-gray-900">Séléctionner les type d’examens médicaux et radiologiques disponibles  <span class="text-red-600">*</span></label>
                                    <select name="examin[]" id="examin" class="form-control w-full @error('examin') border-red-500 @enderror" multiple>
                                        @foreach($examins as $examin)
                                            <option value="{{ $examin->id }}">{{ $examin->nom }}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('examin')
                                        <span class="text-red-500 font-semibold">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="my-8">
                            <div class="flex relative justify-between w-full">
                                <div class="w-full mr-8">
                                    <label for="ville" class="font-semibold text-sm mb-1 block text-gray-900">Ville <span class="text-red-600">*</span></label>
                                    <select name="ville" id="ville" class="form-control p-2 w-full @error('ville') border-red-500 @enderror">
                                        <option value="">Selectionner votre ville</option>
                                        @foreach($villes as $ville)
                                            <option value="{{ $ville->nom }}">{{ $ville->nom }}</option>
                                        @endforeach 
                                    </select>
                                    
                                    @error('ville')
                                        <span class="text-red-500 font-semibold">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="commune" class="font-semibold text-sm mb-1 block text-gray-900">Commune</label>
                                    <select name="commune" id="commune" class="form-control w-full @error('commune') border-red-500 @enderror">
                                        <option value="">Selectionner votre commune</option>
                                        @foreach($communes as $commune)
                                            <option value="{{ $commune->nom }}">{{ $commune->nom }}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('commune')
                                        <span class="text-red-500 font-semibold">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="my-8">
                            <div class="flex justify-between w-full">
                                <div class="w-full mr-8">
                                    <label for="long" class="font-semibold text-sm mb-1 block text-gray-900">Longitude <span class="text-red-600">*</span></label>
                                    <input name="long" type="number" class="form-control w-full @error('long') border-red-500 @enderror" value="{{ old('long') }}" id="long" placeholder="ex -56422">
                                    
                                    @error('long')
                                        <span class="text-red-500 font-semibold">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="lat" class="font-semibold text-sm mb-1 block text-gray-900">Latitude <span class="text-red-600">*</span></label>
                                    <input name="lat" type="number" class="form-control w-full @error('lat') border-red-500 @enderror" value="{{ old('lat') }}" id="lat" placeholder="ex 458562">
                                    
                                    @error('lat')
                                        <span class="text-red-500 font-semibold">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                          <button type="submit" class="btn-primary mt-4 rounded mb-4">Je m'inscris</button>
                          <div>
                              <small class="text-gray-700 font-semibold"><a href="{{ route('structure.login.form') }}" class="text-blue-500">J'ai déjà un compte</a></small>
                          </div>
                       </form>
                   </div>
                </div>
            </div>
       </div>
   </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function(){
       $("#type_specialite").select2({});
       $("#ville").select2()
       $("#commune").select2()
       $("#examin").select2()
    })
</script>
@endpush
