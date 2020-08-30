@extends('praticien.auth.register.layout')

@section('register-content')
<h1 class="text-center uppercase text-gray-800 text-lg font-semibold">Numero d'ordre et specialites</h1>
<form action="{{ route('praticien.register.store2') }}" method="post" class="mt-16">
    @csrf
    
    <div class="mb-8">
        <div class="flex justify-between w-full">
            <div class="w-full">
                <label for="num_ordre" class="font-semibold text-sm mb-1 block text-gray-900">Numéro d'inscription à l'ordre <span class="text-red-600">*</span></label>
                <input name="num_ordre" type="num_ordre" class="form-control w-full @error('num_ordre') border-red-500 @enderror" value="{{ old('num_ordre') }}" id="num_ordre" required placeholder="Entrer votre numero de l'ordre des medecins">
                
                @error('num_ordre')
                    <span class="text-red-500 font-semibold">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <h1 class="text-center my-6 text-sm text-red-600">Vous devez choisir au moins une spécialite</h1>
    <div class="mb-6">
       
        <div class="flex justify-between w-full">
            <div class="w-full mr-8">
                  <label for="specialite" class="font-semibold text-sm mb-1 block text-gray-900">Spécialite 1 <span class="text-red-600">*</span></label>
                  <select name="specialite[]" id="type_structure" class="form-control bg-transparent w-full @error('type_structure') border-red-500 @enderror" required>
                        <option value="">Selectionner votre spécialite</option>
                        @foreach($specialites as $specialite)
                            <option value="{{ $specialite->id }}">{{ $specialite->nom_specialite }}</option>
                        @endforeach
                 </select>
                
                  @error('specialite')
                      <span class="text-red-500 font-semibold">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
            </div>
            <div class="w-full">
                  <label for="date_exercice" class="font-semibold text-sm mb-1 block text-gray-900">date d'exercice <span class="text-red-600">*</span></label>
                  <input name="date_exercice[]" type="date" class="form-control w-full @error('date_exercice') border-red-500 @enderror" value="{{ old('date_exercice') }}" id="date_exercice" required>
                      
                  @error('date_exercice')
                      <span class="text-red-500 font-semibold">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
            </div>
        </div>
    </div>
    <div class="mb-6">
        <div class="flex justify-between w-full">
            <div class="w-full mr-8">
                  <label for="specialite" class="font-semibold text-sm mb-1 block text-gray-900">Spécialite 2 </label>
                  <select name="specialite[]" id="type_structure" class="form-control bg-transparent w-full @error('type_structure') border-red-500 @enderror" >
                        <option value="">Selectionner votre spécialité</option>
                        @foreach($specialites as $specialite)
                            <option value="{{ $specialite->id }}">{{ $specialite->nom_specialite }}</option>
                        @endforeach
                 </select>
                
                  @error('specialite')
                      <span class="text-red-500 font-semibold">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
            </div>
            <div class="w-full">
                  <label for="date_exercice" class="font-semibold text-sm mb-1 block text-gray-900">date d'exercice </label>
                  <input name="date_exercice[]" type="date" class="form-control w-full @error('date_exercice') border-red-500 @enderror" value="{{ old('date_exercice') }}" id="date_exercice">
                      
                  @error('date_exercice')
                      <span class="text-red-500 font-semibold">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
            </div>
        </div>
    </div>

    <a href="{{ route("praticien.register.form") }}" class="btn-primary my-4 inline-block ml-auto shadow border border-transparent">Retour</a>
    <button type="submit" class="btn-primary my-4 inline-block  shadow border border-transparent">Suivant</button>
</form>

@endsection
