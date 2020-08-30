<div class="sidebare overflow-y-auto fixed left-0 top-0 h-screen bg-white shadow w-56">
    <div class="sidebare-header h-48 flex flex-col justify-center items-center bg-blue-500">
      <img src="{{ asset('praticiens/profiles/'.Auth::user()->avatar) }}" alt="" class="rounded-full w-24 h-24 mb-4">
      <div class="text-center">
         <p class="text-white font-semibold">{{ Auth::user()->praticien_nom }}  {{ Auth::user()->praticien_prenom }}</p>
         <p class="text-white text-xs">{{ Auth::user()->email }}</p>
      </div>
    </div>
  
    <div class="sidebare-links ">
        <ul>
          <li class=" text-gray-800 w-full">
              <a href="" class="p-4 text-md hover:bg-blue-500 block w-full h-full hover:text-white duration-150 ease-linear"><i class="fa fa-tachometer" aria-hidden="true"></i> Tableau de bord</a>
          </li>
          <li class=" text-gray-800 p-4 text-md hover:bg-blue-500 hover:text-white duration-150 ease-linear"><i class="fa fa-user-md" aria-hidden="true"></i></i> Praticiens</li>
          <li class=" text-gray-800 p-4 text-md hover:bg-blue-500 hover:text-white duration-150 ease-linear"><i class="fa fa-calendar" aria-hidden="true"></i> Rendez-vous</li>
          <li class=" text-gray-800 p-4 text-md hover:bg-blue-500 hover:text-white duration-150 ease-linear"><i class="fa fa-hospital-o" aria-hidden="true"></i> Structure Sanitaire</li>
          <li class=" text-gray-800 p-4 text-md hover:bg-blue-500 hover:text-white duration-150 ease-linear"><i class="fa fa-flask" aria-hidden="true"></i> Laboratoires</li>
        </ul>
    </div>
  </div>