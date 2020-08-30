<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RVM</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    

    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">

     <!-- Scripts -->
     

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css"/>
     <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/>

</head>
<body class="overflow-x-hidden">
    <div id="preloader">
        <div class='preloader'>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    @include('partials.header')
    
    @include('partials.banner')
    <main class="mx-auto container">
       <section class="my-24">
           <div class="content-header text-center mb-32">
               <h1 class="text-5xl font-semibold text-gray-700 wow bounceInDown" data-wow-delay=".3s" data-wow-duration=".7s">Bienvenue sur RVM</h1>
               <p class="text-xl text-gray-600 wow fadeInRight" data-wow-delay=".5s" data-wow-duration=".9s">
                Votre plateforme de prise de Rendez-Vous
                Médical
               </p>
           </div>
           <div class="flex flex-row flex-wrap justify-center">
               <div class="w-1/3 flex justify-center wow fadeIn" data-wow-delay=".3s" data-wow-duration=".9s">
                 <a href="{{ route('praticien.login.form') }}" class="card rounded-lg bg-white w-4/5  shadow-lg border hover:shadow-md duration-500 ease-in-out text-center  h-full p-3">
                     <img src="{{ asset('images/doctor_b.svg') }}" alt="" class="mx-auto" width="350px" height="350px">
                    <div clas="text-center mt-4">
                        <h1 class="text-xl uppercase mb-4" style="color: #2923AF;">Espace Praticien</h1>
                        <p class="text-gray-600 text-md">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem, rerum?</p>
                    </div>
                 </a>
               </div>
               <div class="w-1/3 flex justify-center wow fadeIn" data-wow-delay=".5s" data-wow-duration=".9s">
                 <a href="{{ route('patient.login.form') }}" class="card bg-white text-center shadow-lg border w-4/5 hover:shadow-md duration-500 ease-in-out  h-full p-3">
                     <img src="{{ asset('images/patien1.svg') }}" alt="" class="flex self-center" width="300px" height="300px">
                     <div clas="text-center mt-4">
                         <h1 class="text-xl uppercase mb-4" style="color: #2923AF;">Espace Patient</h1>
                         <p class="text-gray-600 text-md">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem, rerum?</p>
                     </div>
                  </a>
               </div>
           </div>
    
           <div class="flex flex-row flex-wrap justify-center mt-20">
             <div class="w-1/3 flex justify-center wow fadeIn" data-wow-delay=".7s" data-wow-duration=".9s">
               <div class="card bg-white shadow-lg border  hover:shadow-md duration-500 ease-in-out w-4/5 text-center h-full p-3">
                   <img src="{{ asset('images/labo.svg') }}" alt="" class="mx-auto" width="350px" height="350px">
                   <div clas="text-center mt-4">
                     <h1 class="text-xl uppercase mb-4" style="color: #2923AF;">Espace Laboratoire</h1>
                     <p class="text-gray-600 text-md">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem, rerum?</p>
                  </div>
               </div>
             </div>
             <div class="w-1/3 flex justify-center wow fadeIn" data-wow-delay=".9s" data-wow-duration=".9s">
               <a href="{{ route('structure.login.form') }}" class="card bg-white text-center shadow-lg border  w-4/5 hover:shadow-md duration-500 ease-in-out  h-full p-3">
                   <img src="{{ asset('images/medicin1.svg') }}" alt="" class="flex self-center" width="300px" height="300px">
                   <div clas="text-center mt-4">
                     <h1 class="text-xl uppercase mb-4" style="color: #2923AF;">Espace Structure Sanitaire</h1>
                     <p class="text-gray-600 text-md">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem, rerum?</p>
                  </div>
                </a>
             </div>
         </div>
       </section>
    </main>
    
    <footer class="bg-gray-900 mt-20 mx-auto text-center text-white center px-4 py-4">
        Copyright 2020
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>
    <script src="{{ asset('js/wow/dist/wow.min.js') }}" defer></script>
    <script src="{{ asset('js/init.js') }}"></script>
   
</body>
</html>
