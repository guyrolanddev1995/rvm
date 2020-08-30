@extends('patient.pages.index')

@section('patient.content')
<div class="form-content border shadow-md my-16 mx-24">
    <div class="header py-4 px-4 flex justify-between">
        <h3 class="text-xl font-semibold text-gray-800 uppercase">Prise de rendez-vous pour examen radiologique/biologique</h3>
        <a href="{{ route('rdv_examen2') }}" class="text-blue-500 font-semibold">Retour</a>
    </div>
    <hr>
    <div class="body py-8 px-4">
         <form action="{{ route('rdv_examen2_store') }}" method="post">
             @csrf
             <div class="mt-8 mb-10">
                <div class="flex justify-between w-full">
                    <div class="w-full">
                        <label for="structure" class="font-semibold mb-2 block text-gray-900">Dans quelle structure voulez-vous faire la consultation? <span class="text-red-600">*</span></label>
                        <select name="structure" id="structure" class="form-control bg-transparent w-full @error('structure') border-red-500 @enderror">
                            <option value="">Séléctionner une structure sanitaire</option>
                            @foreach($structures as $structure)
                                <option value="{{ $structure->id }}">{{ $structure->nom }}</option>
                            @endforeach
                        </select>
                        
                        @error('structure')
                            <span class="text-red-500 font-semibold">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="ml-auto flex justify-end">
                <a href="{{ route("rdv_consultation") }}" class="bg-blue-600 text-white p-2 text-center"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</a>
                <button class="bg-blue-600 text-white p-2 text-center ml-4">Suivant <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
            </div>
         </form>
    </div>
</div>
@endsection
