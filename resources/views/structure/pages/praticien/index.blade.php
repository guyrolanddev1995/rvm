@extends('structure.pages.index')

@section('structure-content')
    <div class="dashbord-content">
        @include('utils.flash')
        
        <section>
            <div class="w-full px-2 mt-10">
                <div class="flex justify-between">
                  <h1 class="text-3xl uppercase mb-6">Liste des praticiens</h1>
                  <a href="{{ route('structure.praticiens.create') }}" class="h-10 bg-green-600 text-white py-2 px-3">Nouveau praticien</a>
                </div>
                <table class="table-auto w-full" id="myTable">
                    <thead class="border-b">
                      <tr>
                        <th class="px-4 py-2 text-md text-left" width="15%">Nom</th>
                        <th class="px-4 py-2 text-md text-left" width="15%">Prenom</th>
                        <th  class="px-4 py-2 text-md text-left" width="10%">Sexe</th>
                        <th class="px-4 py-2 text-md text-left" width="15%">Email</th>
                        <th class="px-4 py-2 text-md text-left" width="30%">Spécialité</th>
                        <th class="px-4 py-2 text-md text-left">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                       @foreach($praticiens as $praticien)
                          <tr>
                              <td class="px-4 py-2 text-md">{{ $praticien->str_praticien_nom }}</td>
                              <td class="px-4 py-2 text-md">{{ $praticien->str_praticien_prenom  }} </td>
                              <td class="px-4 py-2 text-md">
                                @if($praticien->str_praticien_sexe == 'M')
                                    <small class="bg-blue-500 text-xs text-white rounded-full p-1">Homme</small>
                                @else
                                    <small class="bg-red-500 text-xs text-white rounded-full p-1">Femme</small>
                                @endif
                              </td>
                              <td class="px-4 py-2 text-md">{{ $praticien->str_praticien_email }}</td>
                              <td class="px-4 py-2 text-md">
                                @foreach($praticien->specialites as $specialite)
                                    <small class="bg-blue-500 text-xs text-white rounded-full p-1">{{ $specialite->nom_specialite }}</small>
                                @endforeach
                              </td>
                              <td>
                                <a href="{{ route('structure.praticien.show', $praticien) }}" class="bg-green-600 p-1 shadow-md rounded-md text-center text-white"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a href="{{ route('structure.praticiens.edit', $praticien) }}" class="bg-blue-500 p-1 shadow-md rounded-md text-center text-white"><i class="fa fa-edit" aria-hidden="true"></i></a>
                              </td>
                          </tr>
                       @endforeach
                    </tbody>
                  </table>
              </div>
          </section>
    </div>
@endsection
