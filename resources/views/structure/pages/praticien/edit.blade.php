@extends('structure.pages.index')

@section('structure-content')
    <div class="dashbord-content">
        @include('utils.flash')
       <div class="form-content border shadow-md my-16 mx-24">
           <div class="header py-4 px-4 flex justify-between">
               <h3 class="text-xl font-semibold text-gray-800 uppercase">Modification du praticien #{{ $praticien->str_praticien_nom }} {{ $praticien->str_praticien_prenom }}</h3>
               <a href="{{ route('structure.praticiens.index') }}" class="text-blue-500 font-semibold">Retour</a>
           </div>
           <hr>
           <div class="body py-8 px-4">
                <form action="{{ route('structure.praticiens.update', $praticien) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-8">
                        <div class="flex justify-between w-full">
                            <div class="w-full mr-8">
                                  <label for="nom" class="font-semibold text-sm mb-1 block text-gray-900">Nom <span class="text-red-600">*</span></label>
                                  <input name="nom" type="text" class="form-control w-full @error('nom') border-red-500 @enderror" value="{{ old('nom', $praticien->str_praticien_nom) }}" id="nom" placeholder="Entrer le nom du praticien">
                                  
                                  @error('nom')
                                      <span class="text-red-500 font-semibold">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                            </div>
                            <div class="w-full">
                                  <label for="prenom" class="font-semibold text-sm mb-1 block text-gray-900">Prenom <span class="text-red-600">*</span></label>
                                  <input name="prenom" type="text" class="form-control w-full @error('prenom') border-red-500 @enderror" value="{{ old('prenom', $praticien->str_praticien_prenom) }}" id="prenom" placeholder="Entrer le prenom du praticien">
                                      
                                  @error('prenom')
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
                                <input name="email" type="email" class="form-control w-full @error('email') border-red-500 @enderror" value="{{ old('email', $praticien->str_praticien_email) }}" id="email" placeholder="Entrer l'email de la structure">
                                
                                @error('email')
                                    <span class="text-red-500 font-semibold">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          </div>
                          <div class="w-full">
                                <label for="phone" class="font-semibold text-sm mb-1 block text-gray-900">Telephone <span class="text-red-600">*</span></label>
                                <input name="phone" type="number" class="form-control w-full @error('phone') border-red-500 @enderror" value="{{ old('phone', $praticien->str_praticien_telephone) }}" id="phone" placeholder="Entrer le numero de telephone">
                                    
                                @error('phone')
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
                               
                                <label for="type_specialite" class="font-semibold text-sm mb-1 block text-gray-900">Quelles sont vos specialités <span class="text-red-600">*</span></label>
                                <select name="specialites[]" id="specialites" class="form-control w-full @error('specialites') border-red-500 @enderror" multiple>
                                    @foreach($specialites as $specialite)
                                        @php $check = in_array($specialite->id, $praticien->specialites->pluck('id')->toArray()) ? 'selected' : ''@endphp
                                        <option value="{{ $specialite->id }}" {{ $check }}>{{ $specialite->nom_specialite }}</option>
                                    @endforeach
                                </select>
                                
                                @error('specialites')
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
                                <label for="date_naissance" class="font-semibold text-sm mb-1 block text-gray-900">Date de naissance <span class="text-red-600">*</span></label>
                                <input name="date_naissance" type="date" class="form-control w-full @error('date_naissance') border-red-500 @enderror" value="{{ old('date_naissance', $praticien->str_praticien_date_naissance) }}" id="date_naissance" placeholder="Entrer la date de naissance du praticien">
                                
                                @error('date_naissance')
                                    <span class="text-red-500 font-semibold">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="lieu_naissance" class="font-semibold text-sm mb-1 block text-gray-900">Lieux de naissance <span class="text-red-600">*</span></label>
                                <input name="lieu_naissance" type="text" class="form-control w-full @error('lieu_naissance') border-red-500 @enderror" value="{{ old('lieu_naissance', $praticien->str_praticien_lieu_naissance) }}" id="lieu_naissance" placeholder="Entrer le lieux de naissance du praticien">
                                    
                                @error('lieu_naissance')
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
                                <label for="prenom" class="font-semibold text-sm mb-1 block text-gray-900">Sexe <span class="text-red-600">*</span></label>
                                <select name="sexe" id="sexe" class="form-control w-full @error('sexe') border-red-500 @enderror" required>
                                        <option value="M" {{ $praticien->str_praticien_sexe == "M" ? 'selected' : '' }}>Homme</option>
                                        <option value="F" {{ $praticien->str_praticien_sexe == "F" ? 'selected' : '' }}>Femme</option>
                                </select>
                                    
                                @error('prenom')
                                    <span class="text-red-500 font-semibold">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="lieu_residence" class="font-semibold text-sm mb-1 block text-gray-900">Lieux de résidence <span class="text-red-600">*</span></label>
                                <input name="lieu_residence" type="text" class="form-control w-full @error('lieu_residence') border-red-500 @enderror" value="{{ old('lieu_residence', $praticien->str_praticien_lieu_residence) }}" id="lieu_residence" placeholder="Entrer le lieux de residence du praticien">
                                    
                                @error('lieu_residence')
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
                                <label for="region" class="font-semibold text-sm mb-1 block text-gray-900">Région <span class="text-red-600">*</span></label>
                                <select name="region" id="region" class="form-control w-full @error('region') border-red-500 @enderror">
                                    <option value="">Selectionner votre région</option>
                                    <option value="1">Région 1</option>
                                    <option value="3">Région 2</option>
                                </select>
                                
                                @error('region')
                                    <span class="text-red-500 font-semibold">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="ville" class="font-semibold text-sm mb-1 block text-gray-900">Ville <span class="text-red-600">*</span></label>
                                <select name="ville" id="ville" class="form-control w-full @error('ville') border-red-500 @enderror">
                                    <option value="">Selectionner votre ville</option>
                                    <option value="1">Ville 1</option>
                                    <option value="3">Ville 2</option>
                                </select>
                                
                                @error('ville')
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
                                <label for="commune" class="font-semibold text-sm mb-1 block text-gray-900">Commune</label>
                                <select name="commune" id="commune" class="form-control w-full @error('commune') border-red-500 @enderror">
                                    <option value="">Selectionner votre commune</option>
                                    <option value="1">commune 1</option>
                                    <option value="3">commune 2</option>
                                </select>
                                
                                @error('commune')
                                    <span class="text-red-500 font-semibold">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="quartier" class="font-semibold text-sm mb-1 block text-gray-900">Quartier</label>
                                <select name="quartier" id="quartier" class="form-control w-full @error('quartier') border-red-500 @enderror">
                                    <option value="">Selectionner votre quartier</option>
                                    <option value="1">Quartier 1</option>
                                    <option value="3">Quartier 2</option>
                                </select>
                                
                                @error('quarier')
                                    <span class="text-red-500 font-semibold">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button class="bg-blue-600 text-white p-2 text-center block ml-auto"><i class="fa fa-floppy-o" aria-hidden="true"></i> Mettre à jour</button>
                </form>
           </div>
       </div>
    </div>
@endsection
