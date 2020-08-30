@extends('patient.pages.index')

@section('patient.content')
<div class="form-content border shadow-md my-16 mx-24">
    <div class="header py-4 px-4 flex justify-between">
        <h3 class="text-xl font-semibold text-gray-800 uppercase">Prise de rendez-vous</h3>
        <a href="{{ route('patient.home') }}" class="text-blue-500 font-semibold">Retour</a>
    </div>
    <hr>
    <div class="body py-8 px-4">
         <form action="{{ route('rdv_consltation_store') }}" method="post">
             @csrf
             <div class="mt-8 mb-10">
                 <div class="flex justify-between w-full">
                     <div class="w-full">
                         <label for="specialite" class="font-semibold mb-2 block text-gray-900">Dans quelle spécialité voulez-vous prendre un rendez-vous? <span class="text-red-600">*</span></label>
                         <select name="specialite" id="specialite" class="form-control bg-transparent w-full @error('specialite') border-red-500 @enderror">
                             @foreach($specialites as $specialite)
                                 <option value="{{ $specialite->id }}">{{ $specialite->nom_specialite }}</option>
                             @endforeach
                         </select>
                         
                         @error('specialite')
                             <span class="text-red-500 font-semibold">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                     </div>
                 </div>
             </div>
           <div class="mb-8">
               <div class="flex justify-between w-full">
                   <div class="w-full mr-8">
                         <label for="ville" class="font-semibold mb-2 block text-gray-900">Dans quelle ville voulez-vous prendre ce rendez-vous ? <span class="text-red-600">*</span></label>
                         <select name="ville" id="ville" class="form-control w-full bg-transparent @error('ville') border-red-500 @enderror">
                             <option value="" class="text-gray-600">Choisissez une ville</option>
                             @foreach($villes as $ville)
                                <option value="{{ $ville->nom }}" class="uppercase">{{ $ville->nom }}</option>
                             @endforeach
                             
                        </select>
                         
                         @error('ville')
                             <span class="text-red-500 font-semibold">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                   </div>
                   <div class="w-full">
                         <label for="commune" class="font-semibold mb-2 block text-gray-900">Dans quelle commune voulez-vous prendre ce rendez-vous ? <span class="text-red-600">*</span></label>
                         <select name="commune" id="commune" class="form-control w-full bg-transparent @error('commune') border-red-500 @enderror">
                             <option value="">Choisissez un quartier</option>
                             @foreach($communes as $commune)
                                <option value="{{ $commune->nom }}" class="uppercase">{{ $commune->nom }}</option>
                             @endforeach
                        </select>
                             
                         @error('commune')
                             <span class="text-red-500 font-semibold">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                   </div>
               </div>
            </div>        
            <div class="ml-auto flex justify-end">
                <button class="bg-blue-600 text-white p-2 text-center">Suivant <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
            </div>
         </form>
    </div>
</div>
@endsection
