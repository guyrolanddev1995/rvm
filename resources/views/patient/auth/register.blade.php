@extends('layouts.app')
@section('styles')
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
        <div class="flex w-full register-card shadow rounded-lg border">
            <div class="w-2/5 image-cover border-transparent" style="background-image: url({{ asset('images/nurse.jpg') }});">
            </div>
            <div class="w-3/5 bg-white overflow-y-auto">
                <div class="form-container flex flex-col justify-center w-full">
                   <div class="card-form px-8 py-4">
                       <div class="card-header text-center mt-10">
                          <h1 class="text-3xl font-bold text-gray-800 mb-4 uppercase wow bounceIn" data-wow-delay=".7s" data-wow-duration="1s">Bienvenue sur notre espace patient</h1>
                          <h2 class="text-sm mb-1 block font-semibold text-gray-700">Créer un nouveau compte</h2>
                       </div>
                       
                       <form action="{{ route('patient.register.store') }}" method="post" class="mt-16">
                          @csrf
                          <div class="mb-6">
                              <div class="flex justify-between w-full">
                                  <div class="w-full mr-8">
                                        <label for="nom" class="font-semibold text-sm mb-1 block text-gray-900">Nom <span class="text-red-600">*</span></label>
                                        <input name="nom" type="nom" class="form-control w-full @error('nom') border-red-500 @enderror" value="{{ old('nom') }}" id="nom" required placeholder="Entrer votre addresse email">
                                        
                                        @error('nom')
                                            <span class="text-red-500 font-semibold">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                  </div>
                                  <div class="w-full">
                                        <label for="prenom" class="font-semibold text-sm mb-1 block text-gray-900">Prenom <span class="text-red-600">*</span></label>
                                        <input name="prenom" type="text" class="form-control w-full @error('prenom') border-red-500 @enderror" value="{{ old('prenom') }}" id="email" required placeholder="Entrer votre addresse email">
                                            
                                        @error('prenom')
                                            <span class="text-red-500 font-semibold">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                  </div>
                              </div>
                          </div>
                          <div class="mb-6">
                                <div class="flex justify-between w-full">
                                    <div class="w-full">
                                        <label for="email" class="font-semibold text-sm mb-1 block text-gray-900">Email <span class="text-red-600">*</span></label>
                                        <input name="email" type="email" class="form-control w-full @error('email') border-red-500 @enderror" value="{{ old('email') }}" id="email" required placeholder="Entrer votre addresse email">
                                        
                                        @error('email')
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
                                        <label for="age" class="font-semibold text-sm mb-1 block text-gray-900">Age <span class="text-red-600">*</span></label>
                                        <input name="age" type="number" class="form-control w-full @error('age') border-red-500 @enderror" value="{{ old('age') }}" id="age" required placeholder="Entrer votre addresse email">
                                        
                                        @error('age')
                                            <span class="text-red-500 font-semibold">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="w-full">
                                        <label for="prenom" class="font-semibold text-sm mb-1 block text-gray-900">Sexe <span class="text-red-600">*</span></label>
                                        <select name="sexe" id="sexe" class="form-control w-full @error('sexe') border-red-500 @enderror" required>
                                                <option value="M">Homme</option>
                                                <option value="F">Femme</option>
                                        </select>
                                            
                                        @error('prenom')
                                            <span class="text-red-500 font-semibold">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6">
                                <div class="flex justify-between w-full">
                                    <div class="w-full">
                                        <label for="phone" class="font-semibold text-sm mb-1 block text-gray-900">Téléphone <span class="text-red-600">*</span></label>
                                        <input name="phone" type="number" class="form-control w-full @error('phone') border-red-500 @enderror" value="{{ old('phone') }}" id="phone" required placeholder="Entrer votre addresse phone">
                                        
                                        @error('phone')
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
                                        <label for="password" class="font-semibold text-sm mb-1 block text-gray-900">Mot de passe <span class="text-red-600">*</span></label>
                                        <input name="password" type="password" class="form-control w-full @error('password') border-red-500 @enderror" value="{{ old('password') }}" id="password" required placeholder="Entrer votre addresse email">
                                        
                                        @error('password')
                                            <span class="text-red-500 font-semibold">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="w-full">
                                        <label for="password_confirmation" class="font-semibold text-sm mb-1 block text-gray-900">Confirmer votre mot de passe <span class="text-red-600">*</span></label>
                                        <input name="password_confirmation" type="password" class="form-control w-full @error('password_confirmation') border-red-500 @enderror" value="{{ old('password_confirmation') }}" id="password_confirmation" required placeholder="Entrer votre addresse email">
                                        
                                        @error('password_confirmation')
                                            <span class="text-red-500 font-semibold">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
  
                          <button type="submit" class="btn-primary mt-4 rounded mb-4">Je m'inscris</button>
                          <div>
                              <small class="text-gray-700 font-semibold"><a href="{{ route('patient.login.form') }}" class="text-blue-500">J'ai déjà un compte</a></small>
                          </div>
                       </form>
                   </div>
                </div>
            </div>
         </div>
       </div>
   </div>
@endsection
