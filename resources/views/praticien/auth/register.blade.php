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
<praticien-register></praticien-register>
@endsection
