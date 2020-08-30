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
  @include('praticien.partials.sidebare')
<main class="ml-56">
  @include('praticien.partials.header')
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

        <section>
          <div class="w-full px-2 mt-20">
            <div class="w-full px-2 mt-20">
              <div class="border-t-4 border-purple-500">
                 <div class="card-header px-4 py-2 border">
                   <h4 class="text-md text-gray-800 font-semibold"><i class="fa fa-calendar" aria-hidden="true"></i> Nouvelles demandes de consultation</h4>
                 </div>
                 <div class="card-body">
                   <table class="table-auto w-full border">
                     <thead class="border-b">
                       <tr>
                         <th class="px-4 py-2 text-md text-left">#</th>
                         <th class="px-4 py-2 text-md text-left">Date</th>
                         <th class="px-4 py-2 text-md text-left">Heure</th>
                         <th class="px-4 py-2 text-md text-left">Speciaite</th>
                         <th class="px-4 py-2 text-md text-left">Nom et Prenom</th>
                         <th class="px-4 py-2 text-md text-left">Motif du rdv</th>
                         <th class="px-4 py-2 text-md text-left">Action</th>
                       </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td class="px-4 py-2 text-md">1</td>
                           <td class="px-4 py-2 text-md">05 sept</td>
                           <td class="px-4 py-2 text-md">10H </td>
                           <td class="px-4 py-2 text-md">Churigie</td>
                           <td class="px-4 py-2 text-md">Patient 1</td>
                           <td class="px-4 py-2 text-md">Lorem ipsum dolor sit amet consectetur adipisicing</td>
                           <td><a href="#" class="bg-blue-400 p-1 shadow-md rounded-md text-center text-white"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                        </tr>
                     </tbody>
                   </table>
                 </div>
              </div>
            </div>
          </div>
        </section>
        
        <section>
           <div class="px-2 mt-16 w-2/3">
            <div class="border-t-4 border-red-500">
              <div class="card-header px-4 py-2 border flex flex-row justify-between">
                <h4 class="text-sm text-gray-800 font-semibold"><i class="fa fa-user-md" aria-hidden="true"></i>  Connaissez-vous peut-etre</h4>
                <a href="#" class="text-blue-500 text-sm">Voir plus</a>
              </div>
              <div class="card-body">
                <table class="table-auto w-full border">
                  <tbody>
                    @foreach($praticiens as $praticien)
                      <tr class="border">
                        <td class="px-4 py-2 text-sm"><img src="{{ $praticien->avatar }}" class="w-10 h-10 rounded-full" alt=""></td>
                        <td class="px-4 py-2 text-sm text-left">{{ $praticien->praticien_nom }} {{ $praticien->praticien_prenom }}</td>
                        <td class="px-4 py-2 text-xs">
                          <span class="bg-blue-500 text-white px-1 py-1 rounded-lg">Churigie</span>
                          <span class="bg-red-500 text-white px-1 py-1 rounded-lg">Généraliste</span>
                        </td>
                        <td class="px-4 py-2 text-sm">Clinique les oliviers</td>
                        <td><a href="#" class="bg-blue-400 p-1 shadow-md rounded-md text-center text-white"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
           </div>
           </div>
        </section>
    </section>
</main>
 @endsection
