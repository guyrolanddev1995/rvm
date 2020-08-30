@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
 <style>
     .dropzone {
        border: 2px dashed #0087F7;
        border-radius: 5px;
        background: white;
     }
     .image-cover{
         background-position: center;
         background-size: cover;
     }

     .register-card{
         height: 79vh;
     }
 </style>
@endsection
@section('content')
@include('partials.header')
<div class="w-screen h-full flex items-center overflow-hidden" style="background-color: #ADD8E6">
    <div class="container mx-auto px-16 flex flex-col justify-center">
        <div class="flex h-full register-card shadow rounded border">
            <div class="w-2/5 image-cover border-transparent bg-blue-700" style="backgroundImage: url({{ asset('images/nurse.jpg') }})">
            </div>
            <div class="w-3/5 bg-white overflow-y-auto">
                <div class="form-container flex flex-col justify-center w-full">
                    <div class="card w-full h-full rounded py-2">
                        <div class="card-header border-b border-gray-200 px-4 py-2 flex justify-between items-center">
                            <h1 class="text-lg font-bold text-gray-800 uppercase">creation de compte praticien</h1>
                            <a class="text-blue-600">Se connecter</a>
                        </div>

                        <div class="card-main txt-sm px-4 pt-10">
                            @yield('register-content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

