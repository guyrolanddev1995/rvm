@extends('praticien.auth.register.layout')

@section('register-content')
<h1 class="text-center uppercase text-gray-800 text-lg font-semibold">Informations personnelles</h1>
<form action="{{ route('praticien.register.store') }}" method="post" class="mt-10 wow fadeIn" data-wow-delay=".3s" data-wow-duration=".9s">
    @csrf
    <div class="mb-6">
        <div class="flex justify-between w-full">
            <div class="w-full mr-8">
                <label for="nom" class="font-semibold text-sm mb-1 block text-gray-900">Nom <span class="text-red-600">*</span></label>
                <input name="nom" type="text" class="form-control w-full @error('nom') border-red-500 @enderror" value="{{ old('nom') }}" id="nom"  placeholder="Entrer votre nom">
                
                @error('nom')
                    <span class="text-red-500 font-semibold">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="w-full">
                <label for="prenom" class="font-semibold text-sm mb-1 block text-gray-900">Prenom <span class="text-red-600">*</span></label>
                <input name="prenom" type="text" class="form-control w-full @error('prenom') border-red-500 @enderror" value="{{ old('prenom') }}" id="prenom"  placeholder="Entrer votre prenom">
                    
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
            <div class="w-full mr-8">
                <label for="sexe" class="font-semibold text-sm mb-1 block text-gray-900">Sexe <span class="text-red-600">*</span></label>
                <select name="sexe" id="sexe" class="form-control w-full @error('sexe') border-red-500 @enderror">
                        <option value="M">Homme</option>
                        <option value="F">Femme</option>
                </select>
                    
                @error('sexe')
                    <span class="text-red-500 font-semibold">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="w-full">
                <label for="lieu_residence" class="font-semibold text-sm mb-1 block text-gray-900">Lieu de résidence <span class="text-red-600">*</span></label>
                <input name="lieu_residence" type="text" class="form-control w-full @error('lieu_residence') border-red-500 @enderror" value="{{ old('lieu_residence') }}" id="age"  placeholder="Ou residez-vous?">
                @error('lieu_residence')
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
                <label for="date_naissance" class="font-semibold text-sm mb-1 block text-gray-900">Date de naissance <span class="text-red-600">*</span></label>
                <input name="date_naissance" type="date" class="form-control w-full @error('date_naissance') border-red-500 @enderror" value="{{ old('date_naissance') }}" id="date_naissance"  placeholder="Entrer votre date de naisssance">
                
                @error('date_naissance')
                    <span class="text-red-500 font-semibold">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="w-full">
                <label for="lieu_naissance" class="font-semibold text-sm mb-1 block text-gray-900">Lieu de naissance <span class="text-red-600">*</span></label>
                <input name="lieu_naissance" type="text" class="form-control w-full @error('lieu_naissance') border-red-500 @enderror" value="{{ old('lieu_naissance') }}" id="lieu_naissance"  placeholder="Entrer votre lieu de naissance">
                    
                @error('lieu_naissance')
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
                <label for="phone" class="font-semibold text-sm mb-1 block text-gray-900">Téléphone <span class="text-red-600">*</span></label>
                <input name="phone" type="number" class="form-control w-full @error('phone') border-red-500 @enderror" value="{{ old('phone') }}" id="phone"  placeholder="Entrer votre numero de téléphone">
                
                @error('phone')
                    <span class="text-red-500 font-semibold">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="w-full">
                <label for="email" class="font-semibold text-sm mb-1 block text-gray-900">Email <span class="text-red-600">*</span></label>
                <input name="email" type="email" class="form-control w-full @error('email') border-red-500 @enderror" value="{{ old('email') }}" id="email"  placeholder="Entrer votre addresse email">
                
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
            <div class="w-full">
                <label for="presentation" class="font-semibold text-sm mb-1 block text-gray-900">Présentation <span class="text-red-600">*</span></label>
                <textarea name="presentation" class="form-control w-full @error('presentation') border-red-500 @enderror" id="presentation"  placeholder="Dites quelque chose à propos de vous">{{ old('presentation') }}</textarea>
                
                @error('presentation')
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
                <input name="password" type="password" class="form-control w-full @error('password') border-red-500 @enderror" value="{{ old('password') }}" id="password"  placeholder="Entrer votre mot de passe">
                
                @error('password')
                    <span class="text-red-500 font-semibold">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="w-full">
                <label for="password_confirmation" class="font-semibold text-sm mb-1 block text-gray-900">Confirmer votre mot de passe <span class="text-red-600">*</span></label>
                <input name="password_confirmation" type="password" class="form-control w-full @error('password_confirmation') border-red-500 @enderror" value="{{ old('password_confirmation') }}" id="password_confirmation"  placeholder="Retapez votre mot de passe">
                
                @error('password_confirmation')
                    <span class="text-red-500 font-semibold">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <button type="submit" class="btn-primary my-4 block ml-auto shadow border border-transparent">Suivant</button>
</form>

@endsection