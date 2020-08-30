@extends('structure.pages.index')

@section('structure-content')
    <div class="dashbord-content">
        @include('utils.flash')
       <div class="form-content border shadow-md my-16 mx-24">
           <div class="header py-4 px-4 flex justify-between">
               <h3 class="text-lg font-semibold text-gray-800 uppercase">Examens</h3>
               <a href="{{ route('structure.consultations') }}" class="text-blue-500 font-semibold">Retour</a>
           </div>
           <hr>
           <div class="body w-full py-8 px-4">
              <h2 class="font-semibold text-gray-800 mb-4">Informations relatives au patient</h2>
              <table class="w-full">
                <tr>
                    <td class="py-3  mb-4" width="50%">
                        <h2 class=" font-semibold text-gray-800">Nom</h2>
                    </td>
                    <td class="py-3  mb-4"  width="50%">
                        <p class="">{{ Str::ucfirst($examen->patient->nom) }}</p>
                    </td>
                </tr>
                <tr>
                    <td class="py-3  mb-4" width="50%">
                        <h2 class=" font-semibold text-gray-800">Prenom</h2>
                    </td>
                    <td class="py-3  mb-4"  width="50%">
                        <p class="">{{ Str::ucfirst($examen->patient->prenom) }}</p>
                    </td>
                </tr>
                <tr>
                    <td class="py-3  mb-4" width="50%">
                        <h2 class=" font-semibold text-gray-800">Adresse E-mail</h2>
                    </td>
                    <td class="py-3  mb-4"  width="50%">
                        <p class="">{{ $examen->patient->email}}</p>
                    </td>
                </tr>
                <tr>
                    <td class="py-3  mb-4" width="50%">
                        <h2 class=" font-semibold text-gray-800">Téléphone</h2>
                    </td>
                    <td class="py-3  mb-4"  width="50%">
                        <p class="">{{ $examen->patient->phone }}</p>
                    </td>
                </tr>
                <tr>
                    <td class="py-3  mb-4" width="50%">
                        <h2 class=" font-semibold text-gray-800">Assuré(e)</h2>
                    </td>
                    <td class="py-3  mb-4"  width="50%">
                        <p class="">{{ $examen->assure ? 'Oui' : "Non" }}</p>
                    </td>
                </tr>
                @if($examen->assurence != null)
                    <tr>
                        <td class="py-3  mb-4" width="50%">
                            <h2 class=" font-semibold text-gray-800">Type d'assurence</h2>
                        </td>
                        <td class="py-3  mb-4"  width="50%">
                            <p class="">{{ Str::ucfirst($examen->assurence) }}</p>
                        </td>
                    </tr>
                @endif
              </table>
              <hr class="my-6">
              
              <div>
                <h2 class="font-semibold text-gray-800 mb-4">Informations à la consultation</h2>
                <table class="w-full">
                  <tr>
                      <td class="py-3  mb-4" width="50%">
                          <h2 class=" font-semibold text-gray-800">Date</h2>
                      </td>
                      <td class="py-3  mb-4"  width="50%">
                          <p class="">{{ Str::ucfirst($examen->date) }}</p>
                      </td>
                  </tr>
                  <tr>
                      <td class="py-3  mb-4" width="50%">
                          <h2 class=" font-semibold text-gray-800">Heure</h2>
                      </td>
                      <td class="py-3  mb-4"  width="50%">
                          <p class="">{{ Str::ucfirst($examen->heure) }}H</p>
                      </td>
                  </tr>
                  <tr>
                    <td class="py-3  mb-4" width="50%">
                        <h2 class=" font-semibold text-gray-800">Ville</h2>
                    </td>
                    <td class="py-3  mb-4"  width="50%">
                        <p class="">{{ Str::ucfirst($examen->ville) }}</p>
                    </td>
                 </tr>
                 <tr>
                    <td class="py-3  mb-4" width="50%">
                        <h2 class=" font-semibold text-gray-800">Commune</h2>
                    </td>
                    <td class="py-3  mb-4"  width="50%">
                        <p class="">{{ Str::ucfirst($examen->commune) }}</p>
                    </td>
                 </tr>
                  <tr>
                    <td class="py-3  mb-4" width="50%">
                        <h2 class=" font-semibold text-gray-800">Motif</h2>
                    </td>
                    <td class="py-3  mb-4"  width="50%">
                        <p class="">{{ $examen->motif }}</p>
                    </td>
                </tr>
                  <tr>
                      <td class="py-3  mb-4" width="50%">
                          <h2 class=" font-semibold text-gray-800">Spécialite</h2>
                      </td>
                      <td class="py-3  mb-4"  width="50%">
                          <p class="">{{ Str::ucfirst($examen->examen->nom)}}</p>
                      </td>
                  </tr>
                  @if($examen->strPraticien != null)
                   <tr>
                        <td class="py-3  mb-4" width="50%">
                            <h2 class=" font-semibold text-gray-800">Praticien</h2>
                        </td>
                        <td class="py-3  mb-4"  width="50%">
                            <p class="">{{ $examen->strPraticien->str_praticien_nom }}</p>
                        </td>
                    </tr>
                  @endif
                  <tr>
                    <td class="py-3  mb-4" width="50%">
                        <h2 class=" font-semibold text-gray-800">Status</h2>
                    </td>
                    <td class="py-3  mb-4"  width="50%">
                        @if($examen->status == "valide")
                            <span class="bg-green-600 px-4 text-xs text-white rounded-full p-1">Validée</span>
                        @else
                            <span class="bg-red-600 px-4 text-xs text-white rounded-full p-1">En attente</span>
                         @endif
                    </td>
                </tr>
                </table>
                @if($examen->status == 'en attente')
                    <hr class="mb-4">
                    <div class="ml-auto flex justify-end">
                        
                        <a href="{{ route('structure.examen.confirm', $examen) }}" class="bg-blue-600 text-white p-2 text-center ml-4">Confirmer <i class="fa fa-check" aria-hidden="true"></i></a>
                    </div>
                @endif
              </div>
           </div>
       </div>
    </div>
@endsection
