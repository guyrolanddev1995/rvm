@extends('layouts.app')
@section('styles')
  <style>
      .mailContainer{
        background-repeat: no-repeat;
        background-position: 95% 80%, 3% 5%;
        background-size: 20%, 20%;
        height: 90vh;
      }
  </style>
@endsection
@section('content')
  @include('partials.header')
  <div class="w-screen mailContainer flex h-full overflow-y-hidden justify-center pt-32" style="background-image: url({{ asset('images/mail2.svg') }}), url({{ asset('images/mail1.svg') }})">
    <div class="font-semibold bg-white shadow-lg border rounded-lg px-4 py-3 wow bounceIn" data-wow-delay=".7s" data-wow-duration=".7s" style="height: 40vh; width: 60% ">
        <h1 class="text-3xl text-center text-green-600 mb-6">Compte créé avec succès.</h1>
        <p class="px-6 text-xl mb-6">
          Félicitation votre compte a été bien créé. Un email de confirmation vous a été
          envoyé. Veuillez vérifier votre boîte mail.
        </p>

        <a href="{{ route('main-home') }}" class="px-6 text-blue-600">Retour</a>
    </div>
  </div>
@endsection