@extends('patient.pages.index')

@section('patient.content')
<section class="mt-24">
    <div class="content-header text-center mb-16">
        <h1 class="text-5xl font-semibold text-gray-700 wow fadeIn" data-wow-delay=".3s" data-wow-duration=".7s">Bienvenue sur RVM</h1>
    </div>

    <div class="flex flex-row flex-wrap justify-center">
        <div class="w-1/3 flex justify-center wow fadeIn" data-wow-delay=".3s" data-wow-duration=".9s">
          <a href="{{ route('praticien.login.form') }}" class="card rounded-md bg-white w-4/5  shadow-lg border hover:shadow-md duration-500 ease-in-out text-center  h-full p-3">
              <img src="{{ asset('images/chat1.svg') }}" alt="" class="mx-auto" width="350px" height="350px">
            <div clas="text-center">
                <h1 class="text-xl uppercase mt-4" style="color: #2923AF;">Conseil médical en ligne</h1>
            </div>
          </a>
        </div>
        <div class="w-1/3 flex justify-center wow fadeIn" data-wow-delay=".5s" data-wow-duration=".9s">
          <a href="{{ route('rdv_consultation') }}" class="card rounded-md bg-white text-center shadow-lg border w-4/5 hover:shadow-md duration-500 ease-in-out  h-full p-3">
              <img src="{{ asset('images/patien1.svg') }}" alt="" class="flex self-center" width="300px" height="300px">
              <div clas="text-center">
                  <h1 class="text-xl uppercase mt-4" style="color: #2923AF;">Rendez-vous pour consultation</h1>
              </div>
          </a>
        </div>
    </div>

    <div class="flex flex-row flex-wrap justify-center mt-10 mb-20">
        <a href="{{ route('rdv_examen') }}" class="w-1/3 flex justify-center wow fadeIn" data-wow-delay=".7s" data-wow-duration=".9s">
          <div class="card rounded-md bg-white shadow-lg border  hover:shadow-md duration-500 ease-in-out w-4/5 text-center h-full p-3">
              <img src="{{ asset('images/examen.svg') }}" alt="" class="mx-auto" width="350px" height="350px">
              <div clas="text-center">
                <h1 class="text-xl uppercase mt-4" style="color: #2923AF;">Rendez-vous pour examens biologiques ou radiologiques</h1>
            </div>
          </div>
        </a>
        <div class="w-1/3 flex justify-center wow fadeIn" data-wow-delay=".9s" data-wow-duration=".9s">
          <a href="{{ route('structure.register.form') }}" class="card rounded-md bg-white text-center shadow-lg border  w-4/5 hover:shadow-md duration-500 ease-in-out  h-full p-3">
              <img src="{{ asset('images/medicin1.svg') }}" alt="" class="flex self-center" width="300px" height="300px">
              <div clas="text-center">
                <h1 class="text-xl uppercase mt-4" style="color: #2923AF;">Le suivi de patient hospitalisé</h1>
            </div>
          </a>
        </div>
    </div>
</section>
@endsection