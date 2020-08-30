@extends('structure.pages.index')

@section('structure-content')
    <div class="dashbord-content">
        @include('utils.flash')
        
        <section>
            <div class="w-full px-2 mt-10">
                <div class="flex justify-between">
                  <h1 class="text-3xl uppercase mb-6">Liste des consultations</h1>
                </div>
                <table class="table-auto w-full" id="myTable">
                    <thead class="border-b">
                      <tr>
                        <th class="px-4 py-2 text-md text-left">#</th>
                        <th class="px-4 py-2 text-md text-left">Date</th>
                        <th class="px-4 py-2 text-md text-left">Heure</th>
                        <th class="px-4 py-2 text-md text-left">Type d'examen</th>
                        <th class="px-4 py-2 text-md text-left">Examen</th>
                        <th class="px-4 py-2 text-md text-left">Nom et Prenom</th>
                        <th class="px-4 py-2 text-md text-left">Motif du rdv</th>
                        <th class="px-4 py-2 text-md text-left">Status</th>
                        <th class="px-4 py-2 text-md text-left">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                       @foreach($examens as $key => $examen)
                        <tr>
                            <td class="px-4 py-2 text-md">{{ $key + 1 }}</td>
                            <td class="px-4 py-2 text-md">{{ $examen->date }}</td>
                            <td class="px-4 py-2 text-md">{{ $examen->heure}} H </td>
                            <td class="px-4 py-2 text-md">Radiologie</td>
                            <td class="px-4 py-2 text-md">{{ $examen->examen->nom }}</td>
                            <td class="px-4 py-2 text-md">{{ $examen->patient->nom }} {{ $examen->patient->prenom }}</td>
                            <td class="px-4 py-2 text-md">{{ $examen->motif }} </td>
                            <td class="px-4 py-2 text-md">
                              @if($examen->status == "valide")
                                  <small class="bg-green-600 px-2 text-xs text-white rounded-full p-1">Validée</small>
                              @else
                                  <small class="bg-red-600 text-xs px-2 text-white rounded-full p-1">En attente</small>
                              @endif
                          </td>
                            <td><a href="{{ route('structure.examen.show', $examen) }}" class="bg-blue-400 p-1 shadow-md rounded-md text-center text-white"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                        </tr>
                       @endforeach
                    </tbody>
                  </table>
              </div>
          </section>
    </div>
@endsection
