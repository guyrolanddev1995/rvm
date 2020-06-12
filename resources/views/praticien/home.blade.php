 @extends('layouts.app')

 @section('content')
 <div class="sidebare overflow-y-auto fixed left-0 top-0 h-screen bg-white shadow w-56">
  <div class="sidebare-header h-48 flex flex-col justify-center items-center bg-blue-500">
    <img src="{{ asset('images/calendar.svg') }}" alt="" width="100px" height="100px" class="rounded-full mb-4">
    <div class="text-center">
       <p class="text-white font-semibold">{{ Auth::user()->praticien_nom }}  {{ Auth::user()->praticien_prenom }}</p>
       <p class="text-white text-xs">{{ Auth::user()->email }}</p>
    </div>
  </div>

  <div class="sidebare-links ">
      <ul>
        <li class=" text-gray-800 p-4 text-md hover:bg-blue-500 hover:text-white duration-150 ease-linear"><i class="fa fa-tachometer" aria-hidden="true"></i> Tableau de bord</li>
        <li class=" text-gray-800 p-4 text-md hover:bg-blue-500 hover:text-white duration-150 ease-linear"><i class="fa fa-user-md" aria-hidden="true"></i></i> Praticiens</li>
        <li class=" text-gray-800 p-4 text-md hover:bg-blue-500 hover:text-white duration-150 ease-linear"><i class="fa fa-calendar" aria-hidden="true"></i> Rendez-vous</li>
        <li class=" text-gray-800 p-4 text-md hover:bg-blue-500 hover:text-white duration-150 ease-linear"><i class="fa fa-hospital-o" aria-hidden="true"></i> Structure Sanitaire</li>
        <li class=" text-gray-800 p-4 text-md hover:bg-blue-500 hover:text-white duration-150 ease-linear"><i class="fa fa-flask" aria-hidden="true"></i> Laboratoires</li>
      </ul>
  </div>
</div>
<main class="ml-56">
    <div class="header flex flex-row justify-end px-4 items-center shadow-md bg-white h-16 w-full border-b">
       <div x-data="dropdown()"
         class="user-info flex items-center relative w-64 justify-end">
          <div class="flex flex-row">
            <p class="text-md ml-2 text-gray-600 mr-2">{{ Auth::user()->praticien_nom }}</p>
            <button  x-on:click="open">
              <img src="{{ asset('images/arrow_down.svg') }}" alt="" width="15px" height="15px" >
            </button>
          </div>
         
          <div class="absolute bg-white shadow-md rounded top-0 right-0 mt-12 z-10 w-48">
            <ul x-show="isOpen()" x-on:click.away="close">
                  <li class="text-gray-600 text-md px-3 py-2 gray-gray-400 hover:bg-gray-300">
                      <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Mon Profil </a>
                  </li>
                  <li class="text-gray-600 text-md px-3 py-2 hover:bg-gray-300">
                      <a href="#"><i class="fa fa-cog" aria-hidden="true"></i> Parametre</a>
                  </li>
                  <hr>
                  <li class="text-gray-600 text-md px-3 py-2 hover:bg-gray-300">
                    <a href="{{ route('praticien-logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Se deconnecter</a>
                  </li>
            </ul>
          </div>
       </div>
    </div>

    <section class="content px-6 mx-auto bg-gray-200 h-screen pt-20" style="background-color: #fcfcfc;">
        <div class="notifications flex justify-evenly">
            <div class="card px-2 w-1/4 py-2 shadow-md mx-2 bg-white flex border-t-4 border-purple-400 rounded-sm">
               <div class="h-full"><img src="{{ asset('images/calendar.svg') }}" alt="" width="120px" height="120px"></div>
               <div class="w-full text-right">
                 <span class="text-5xl font-bold text-gray-700">20</span>
                 <p class="text-sm">Nouvelle Demande de rendez-vous</p>
               </div>
            </div>
            <div class="card px-2 w-1/4 py-2 shadow-md mx-2 bg-white flex border-t-4 border-red-300 rounded-sm">
                <div class="h-full"><img src="{{ asset('images/medical-appointment.svg') }}" alt="" width="120px" height="120px"></div>
                <div class="w-full text-right">
                  <span class="text-5xl font-bold text-gray-700">15</span>
                  <p class="text-sm">Rendez-vous Confirmés</p>
                </div>
            </div>
            <div class="card px-2 w-1/4 py-2 shadow-md bg-white mx-2 flex border-t-4 border-blue-500 rounded-sm">
                <div class="h-full"><img src="{{ asset('images/homework.svg') }}" alt="" width="120px" height="120px"></div>
                <div class="w-full text-right">
                  <span class="text-5xl font-bold text-gray-700">5</span>
                  <p class="text-sm">Rendez-vous en attente</p>
                </div>
             </div>
             <div class="card px-2 w-1/4 py-2 shadow-md mx-2 bg-white flex border-t-4 border-red-500 rounded-sm">
                <div class="h-full"><img src="{{ asset('images/calendar (1).svg') }}" alt="" width="120px" height="120px"></div>
                <div class="w-full text-right">
                  <span class="text-5xl font-bold text-gray-700">20</span>
                  <p class="text-sm">Rendez-vous réjetés</p>
                </div>
             </div>
        </div>
    </section>
</main>
 @endsection

 @section('scripts')
   <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js" defer></script>
   <script>
      function dropdown() {
        return {
            show: false,
            open() { this.show = true },
            close() { this.show = false },
            isOpen() { return this.show === true },
        }
      }
   </script>
 @endsection