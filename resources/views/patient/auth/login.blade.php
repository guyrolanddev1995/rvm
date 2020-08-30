@extends('layouts.app')

@section('content')
@include('partials.header')
   <div class="w-screen h-screen" style="background-color: #ADD8E6">
       <div class="flex flex-row">
          <div class="w-1/2 h-screen pt-16">
            <img src="{{ asset('images/patient.svg') }}" alt="" class="wow bounceIn" data-wow-delay=".5s" data-wow-duration=".9s">
          </div>
          <div class="w-1/2 h-screen">
              <div class="form-container flex flex-col items-center justify-center w-auto h-full">
                 <div class="card-form bg-white shadow border p-4 w-2/3 wow fadeIn" data-wow-delay=".7s" data-wow-duration="1s">
                     <div class="card-header text-center">
                        <h1 class="text-3xl font-bold text-gray-800 mb-1">Bienvenue</h1>
                        <h2 class="text-md font-semibold text-gray-700">Connectez-vous</h2>
                     </div>
                     
                     <form action="{{ route('patient.login.store') }}" method="post" class="mt-10">
                        @csrf
                        <div class="mb-6">
                            <label for="email" class="font-semibold text-md text-gray-900">Addresse E-mail</label>
                            <input name="email" type="email" class="form-control w-full  mt-2 @error('email') border-red-500 @enderror" value="{{ old('email') }}" id="email" required placeholder="Entrer votre addresse email">
                            
                            @error('email')
                                <span class="text-red-500 font-semibold">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="font-semibold text-md text-gray-900">Mot de passe</label>
                            <input name="password" type="password" class="form-control w-full  mt-2 @error('password') border-red-500 @enderror" id="password" required placeholder="Entrer votre mot de passe">

                            @error('password')
                                <span class="text-red-500 font-semibold">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mt-6 flex items-center justify-between">
                            <div>
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Se souvenir de moi
                            </div>
                            <div>
                                <a href="#">Mot de passe oublié ?</a>
                            </div>
                        </div>

                        <button type="submit" class="btn-primary mt-6 mb-4">Se connecter</button> <br>
                        <small>Vous n'avez pas de compte? cliquer <a href="{{ route('patient.register.form') }}" class="text-blue-600"> ici</a></small>
                     </form>
                 </div>
              </div>
          </div>
       </div>
   </div>
@endsection