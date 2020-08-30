@extends('layouts.app')

@section('content')
@include('structure.partials.header')
<main class="mx-auto container">
    <div class="form-content border shadow-md my-16 mx-40">
        <div class="header py-4 px-4 flex justify-between">
            <h3 class="text-xl font-semibold text-gray-800 uppercase">Prise de rendez-vous</h3>
            <a href="{{ route('rdv_consultation3') }}" class="text-blue-500 font-semibold">Retour</a>
        </div>
        <hr>
        <div class="body py-8 px-4">
            <table class="w-full">
                <tr>
                    <td class="py-3  mb-4" width="50%">
                        <h2 class="uppercase font-semibold text-gray-800">Nom</h2>
                    </td>
                    <td class="py-3  mb-4"  width="50%">
                        <p class="">{{ Str::upper(Auth::user()->nom) }}</p>
                    </td>
                </tr>
                <tr>
                    <td class="py-3  mb-4" width="50%">
                        <h2 class="uppercase font-semibold text-gray-800">Prenom</h2>
                    </td>
                    <td class="py-3  mb-4"  width="50%">
                        <p class="">{{ Str::upper(Auth::user()->prenom) }}</p>
                    </td>
                </tr>
                <tr>
                    <td class="py-3  mb-4" width="50%">
                        <h2 class="uppercase font-semibold text-gray-800">Specialite</h2>
                    </td>
                    <td class="py-3  mb-4"  width="50%">
                        <p class="">{{ Str::upper( $specialite->nom_specialite) }}</p>
                    </td>
                </tr>
                <tr>
                    <td class="py-3  mb-4" width="50%">
                        <h2 class="uppercase font-semibold text-gray-800">Structure</h2>
                    </td>
                    <td class="py-3  mb-4"  width="50%">
                        <p class="">{{ Str::upper($structure->nom) }}</p>
                    </td>
                </tr>
                @if($rdv['step2'][0]['praticien'] !== null)
                <tr>
                    <td class="py-3  mb-4" width="50%">
                        <h2 class="uppercase font-semibold text-gray-800">Specialiste</h2>
                    </td>
                    <td class="py-3  mb-4"  width="50%">
                        <p class="">{{ Str::upper($praticien->str_praticien_nom) }}</p>
                    </td>
                </tr>
                @endif
                <tr>
                    <td class="py-3  mb-4" width="50%">
                        <h2 class="uppercase font-semibold text-gray-800">Jour</h2>
                    </td>
                    <td class="py-3  mb-4"  width="50%">
                        <p class="">{{ Str::upper($rdv['step2'][0]['date']) }}</p>
                    </td>
                </tr>
                
                <tr>
                    <td class="py-3  mb-4" width="50%">
                        <h2 class="uppercase font-semibold text-gray-800">Heure</h2>
                    </td>
                    <td class="py-3  mb-4"  width="50%">
                        <p class="">{{ Str::upper($rdv['step2'][0]['heure']) }} H</p>
                    </td>
                </tr>
                <tr>
                    <td class="py-3  mb-4" width="50%">
                        <h2 class="uppercase font-semibold text-gray-800">Motif</h2>
                    </td>
                    <td class="py-3  mb-4"  width="50%">
                        <p class="">{{ Str::ucfirst($rdv['step2'][0]['motif']) }}</p>
                    </td>
                </tr>
                <tr>
                    <td class="py-3  mb-4" width="50%">
                        <h2 class="uppercase font-semibold text-gray-800">Assuré(e)</h2>
                    </td>
                    <td class="py-3  mb-4"  width="50%">
                        <p class="">{{ Str::upper($rdv['step2'][0]['assure']) }} </p>
                    </td>
                </tr>
                @if($rdv['step2'][0]['assurence'] !== null)
                <tr>
                    <td class="py-3  mb-4" width="50%">
                        <h2 class="uppercase font-semibold text-gray-800">Assurence</h2>
                    </td>
                    <td class="py-3  mb-4"  width="50%">
                        <p class="">{{ Str::upper($rdv['step2'][0]['assurence']) }} </p>
                    </td>
                </tr>
                @endif
                @if($rdv['step2'][0]['other'] !== null)
                <tr>
                    <td class="py-3  mb-4" width="50%">
                        <h2 class="uppercase font-semibold text-gray-800">Autre assurence</h2>
                    </td>
                    <td class="py-3  mb-4"  width="50%">
                        <p class="">{{ Str::upper($rdv['step2'][0]['other']) }} </p>
                    </td>
                </tr>
                @endif
            </table>
            <hr class="mb-4">
            <div class="ml-auto flex justify-end">
                <a href="{{ route("rdv.cancel") }}" class="bg-red-600 text-white p-2 text-center"><i class="fa fa-ban" aria-hidden="true"></i> Annuler</a>
                <a href="{{ route('rdv.store') }}" class="bg-blue-600 text-white p-2 text-center ml-4">Confirmer <i class="fa fa-check" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
 </main>
@endsection


