@extends('layouts.app')

@section('styles')
    <style>
        .display-drop{
            opacity: 1;
            display: block;
            transition: all 300ms ease-in-out;
        }
    </style>
@endsection
@section('content')
    @include('patient.partials.header')
    @include('utils.flash')
    <main class="container">
        @yield('patient.content')    
    </main>
@endsection