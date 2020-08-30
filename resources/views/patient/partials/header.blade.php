<div class="header flex flex-row justify-between px-16 items-center shadow-md bg-white h-16 w-full border-b">
    <a href="{{ route('main-home') }}"  class="text-red-500 text-xl">RVM</a >
    <div class="user-info flex items-center relative">
        <div class="links flex w-auto mr-16">
            <a href="#" class="text-lg mr-6 text-gray-700">Structures</a>
            <a href="#" class="text-lg mr-6 text-gray-700">Mes Examens</a>
            <a href="#" class="text-lg text-gray-700">Mes consultations</a>
        </div>
        <div class="flex flex-row">
             <p class="text-md ml-2 text-gray-600 mr-2">{{ Auth::user()->nom }}</p>
             <button id="dropdown-btn">
               <img src="{{ asset('images/arrow_down.svg') }}" alt="" width="15px" height="15px" >
             </button>
        </div>
        
        <ul class="absolute hidden opacity-0 bg-white shadow-md rounded top-0 right-0 mt-12 z-10 w-48" id="dropdown">
                <li class="text-gray-600 text-md px-3 py-2 gray-gray-400 hover:bg-gray-300">
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Mon Profil </a>
                </li>
                <li class="text-gray-600 text-md px-3 py-2 hover:bg-gray-300">
                    <a href="#"><i class="fa fa-cog" aria-hidden="true"></i> Parametre</a>
                </li>
                <hr>
                <li class="text-gray-600 text-md px-3 py-2 hover:bg-gray-300">
                    <a href="{{ route('patient.logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Se deconnecter</a>
                </li>
        </ul>
    </div>
</div>


