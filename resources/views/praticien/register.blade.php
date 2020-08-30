@extends('layouts.app')

@section('styles')
  <style>
    .overlay{
      position: absolute;
      height: 100%; width: 100%;
      background: black;
      opacity: 0.1;
      z-index: 2;
    }

    .cover-register{
      background-position: center;
      background-size: cover;
    }
  </style>
@endsection
@section('content')
  @include('partials.header')
  <div class="cover-register w-screen py-4 bg-black h-full relative" style="background-image: url({{ asset("images/nurse.jpg") }})">
    <div class="overlay"></div>
    <praticien-register login="{{ route('praticien-login') }}"></praticien-register>
  </div>
@endsection