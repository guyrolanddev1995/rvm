@extends('structure.pages.index')

@section('structure-content')
    <div class="dashbord-content">
        @include('utils.flash')
       <div class="form-content border shadow-md my-16 mx-24">
           <div class="header py-4 px-4 flex justify-between">
               <h3 class="text-lg font-semibold text-gray-800 uppercase">Détails du praticien</h3>
               <a href="{{ route('structure.praticiens.index') }}" class="text-blue-500 font-semibold">Retour</a>
           </div>
           <hr>
           <div class="body w-full py-8 px-4">
              <h2 class="text-lg font-semibold text-gray-800 mb-4">Mes Informations Personnelles</h2>
              <table class="w-full">
                <tr>
                    <td class="py-3  mb-4" width="50%">
                        <h2 class=" font-semibold text-gray-800">Nom</h2>
                    </td>
                    <td class="py-3  mb-4"  width="50%">
                        <p class="">{{ $praticien->str_praticien_nom }}</p>
                    </td>
                </tr>
                <tr>
                    <td class="py-3  mb-4" width="50%">
                        <h2 class=" font-semibold text-gray-800">Prenom</h2>
                    </td>
                    <td class="py-3  mb-4"  width="50%">
                        <p class="">{{ $praticien->str_praticien_prenom }}</p>
                    </td>
                </tr>
                <tr>
                    <td class="py-3  mb-4" width="50%">
                        <h2 class=" font-semibold text-gray-800">Adresse E-mail</h2>
                    </td>
                    <td class="py-3  mb-4"  width="50%">
                        <p class="">{{ $praticien->str_praticien_email }}</p>
                    </td>
                </tr>
                <tr>
                    <td class="py-3  mb-4" width="50%">
                        <h2 class=" font-semibold text-gray-800">Téléphone</h2>
                    </td>
                    <td class="py-3  mb-4"  width="50%">
                        <p class="">{{ $praticien->str_praticien_telephone }}</p>
                    </td>
                </tr>
                <tr>
                    <td class="py-3  mb-4" width="50%">
                        <h2 class=" font-semibold text-gray-800">Date de naissance</h2>
                    </td>
                    <td class="py-3  mb-4"  width="50%">
                        <p class="">{{ $praticien->str_praticien_date_naissance }}</p>
                    </td>
                </tr>
                <tr>
                    <td class="py-3  mb-4" width="50%">
                        <h2 class=" font-semibold text-gray-800">Lieu de naissance</h2>
                    </td>
                    <td class="py-3  mb-4"  width="50%">
                        <p class="">{{ $praticien->str_praticien_lieu_naissance }}</p>
                    </td>
                </tr>
                <tr>
                    <td class="py-3  mb-4" width="50%">
                        <h2 class=" font-semibold text-gray-800">Lieu de résidence</h2>
                    </td>
                    <td class="py-3  mb-4"  width="50%">
                        <p class="">{{ $praticien->str_praticien_lieu_residence}}</p>
                    </td>
                </tr>
                <tr>
                    <td class="py-3  mb-4" width="50%">
                        <h2 class=" font-semibold text-gray-800">Sexe</h2>
                    </td>
                    <td class="py-3  mb-4"  width="50%">
                        <p class="">{{ $praticien->str_praticien_sexe }}</p>
                    </td>
                </tr>
              </table>
              <hr>
              <div class="my-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-6">Mes Specialites</h2>
                <div class="w-full">
                    @foreach($praticien->specialites as $specialite)
                        <span class="bg-blue-500  text-white rounded-full p-1">{{ $specialite->nom_specialite }}</span>
                    @endforeach
                </div>
              </div>
              <hr>
              <div>
                <h2 class="text-lg font-semibold text-gray-800 mt-4 mb-6">Informations Géographiques d'Exercice</h2>
                <table class="w-full">
                    <tr>
                        <td class="py-3  mb-4" width="50%">
                            <h2 class=" font-semibold text-gray-800">Ville</h2>
                        </td>
                        <td class="py-3  mb-4"  width="50%">
                            <p class="">{{ $praticien->ville }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-3  mb-4" width="50%">
                            <h2 class=" font-semibold text-gray-800">Commune</h2>
                        </td>
                        <td class="py-3  mb-4"  width="50%">
                            <p class="">{{ $praticien->commune }}</p>
                        </td>
                    </tr>
                </table>
              </div>
           </div>
       </div>

       <div class="form-content border shadow-md my-16 mx-24">
            <div class="header py-4 px-4 flex justify-between">
                <h3 class="text-lg font-semibold text-gray-800 uppercase">Mes consultations</h3>
                <a href="{{ route('structure.praticien.consultation.create', $praticien) }}" class="h-10 bg-green-600 text-white py-2 px-3">Ajouter une consultation</a>
            </div>
            <hr>
            <div class="body w-full py-8 px-4">
                <table class="w-full border">
                    <thead class="border">
                        <th class="uppercase border-r text-left pl-3 py-3">Specialite</th>
                        <th class="uppercase border-r text-left pl-3 py-3">Jour</th>
                        <th class="uppercase border-r text-left pl-3 py-3">Heure de debut</th>
                        <th class="uppercase border-r text-left pl-3 py-3">Heure de fin</th>
                        <th class="uppercase text-left pl-3 py-3">Action</th>
                    </thead>
                    <tbody>
                        @foreach($consultations as $consultation)
                            <tr class="border">
                                <td class="border-r pl-3 py-3">{{ $consultation->specialite->nom_specialite }}</td>
                                <td class="border-r pl-3 py-3">{{ $consultation->jour }}</td>
                                <td class="border-r pl-3 py-3">{{ $consultation->heure_debut }}H</td>
                                <td class="border-r pl-3 py-3">{{ $consultation->heure_fin }}H</td>
                                <td class="pl-3 py-3">
                                    <a href="{{ route('structure.praticien.consultation.edit', [$praticien,$consultation]) }}" class="bg-blue-500 p-1 shadow-md rounded-md text-center text-white"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a href="{{ route('structure.praticien.show', $praticien) }}" class="bg-red-600 p-1 shadow-md rounded-md text-center text-white"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
