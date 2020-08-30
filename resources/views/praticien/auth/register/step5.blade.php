
@extends('praticien.auth.register.layout')

@section('register-content')
<table class="w-full">
    <tr>
        <td class="py-3  mb-4" width="50%">
            <h2 class="uppercase font-semibold text-gray-800">Nom</h2>
        </td>
        <td class="py-3  mb-4"  width="50%">
            <p class="">{{ $praticien['nom'] }}</p>
        </td>
    </tr>
    <tr>
        <td class="py-3  mb-4" width="50%">
            <h2 class="uppercase font-semibold text-gray-800">Prenom</h2>
        </td>
        <td class="py-3  mb-4"  width="50%">
            <p class="">{{ $praticien['prenom'] }}</p>
        </td>
    </tr>
    <tr>
        <td class="py-3  mb-4" width="50%">
            <h2 class="uppercase font-semibold text-gray-800">Email</h2>
        </td>
        <td class="py-3  mb-4" width="50%">
            <p class="">{{ $praticien['email'] }}</p>
        </td>
    </tr>
    <tr>
        <td class="py-3  mb-4" width="50%">
            <h2 class="uppercase font-semibold text-gray-800">Telephone</h2>
        </td>
        <td class="py-3  mb-4" width="50%">
            <p class="">{{ $praticien['phone'] }}</p>
        </td>
    </tr>
    <tr>
        <td class="py-3  mb-4" width="50%">
            <h2 class="uppercase font-semibold text-gray-800">Sexe</h2>
        </td>
        <td class="py-3  mb-4"  width="50%">
            <p class="">
                {{ $praticien['sexe'] == 'M' ? 'Homme' : 'Femme' }}
            </p>
        </td>
    </tr>
    <tr>
        <td class="py-3  mb-4" width="50%">
            <h2 class="uppercase font-semibold text-gray-800">Date de naissance</h2>
        </td>
        <td class="py-3  mb-4"  width="50%">
            <p class="">
                {{ $praticien['date_naissance'] }}
            </p>
        </td>
    </tr>
    <tr>
        <td class="py-3  mb-4" width="50%">
            <h2 class="uppercase font-semibold text-gray-800">Lieu de naissance</h2>
        </td>
        <td class="py-3  mb-4"  width="50%">
            <p class="">
                {{ $praticien['lieu_naissance'] }}
            </p>
        </td>
    </tr>
    <tr>
        <td class="py-3  mb-4" width="50%">
            <h2 class="uppercase font-semibold text-gray-800">Lieu de residence</h2>
        </td>
        <td class="py-3  mb-4"  width="50%">
            <p class="">
                {{ $praticien['lieu_residence'] }}
            </p>
        </td>
    </tr>
    <tr>
        <td class="py-3  mb-4" width="50%">
            <h2 class="uppercase font-semibold text-gray-800">Presentation</h2>
        </td>
        <td class="py-3  mb-4"  width="50%">
            <p class="">
                {{ $praticien['presentation'] }}
            </p>
        </td>
    </tr> 
    <tr>
        <td class="py-3  mb-4" width="50%">
            <h2 class="uppercase font-semibold text-gray-800">Suivi du patient</h2>
        </td>
        <td class="py-3  mb-4"  width="50%">
            <p class="">
                {{ $praticien['step3'][0]['suivie_patient'] == 'on' ? 'Oui' : 'Non' }}
            </p>
        </td>
    </tr>
    <tr>
        <td class="py-3  mb-4" width="50%">
            <h2 class="uppercase font-semibold text-gray-800">Conseil medical</h2>
        </td>
        <td class="py-3  mb-4"  width="50%">
            <p class="">
                {{ $praticien['step3'][0]['conseil_medical'] == 'on' ? 'Oui' : 'Non' }}
            </p>
        </td>
    </tr>
</table>

<hr>
<table class="w-full mt-4">
    @foreach($praticien['step'][0]['specialite'] as $key => $value)
        @if($value != null)
            <tr>
                <td class="py-3  mb-4" width="25%">
                    <h2 class="uppercase font-semibold text-gray-800">Specialite</h2>
                </td>
                <td class="py-3  mb-4"  width="25%">
                    {{ Str::ucfirst($specialites[$value]['nom_specialite']) }}
                </td>
                <td class="py-3  mb-4" width="25%">
                    <h2 class="uppercase font-semibold text-gray-800">Date d'exercice</h2>
                </td>
                <td class="py-3  mb-4"  width="25%">
                {{ $praticien['step'][0]['date_exercice'][$key] }}
                </td>
            </tr>
        @endif
@endforeach  
</table>
<hr class="mb-4">
<div class="ml-auto flex justify-end">
    {{-- <a href="{{ route("cancel") }}" class="bg-red-600 text-white p-2 text-center"><i class="fa fa-ban" aria-hidden="true"></i> Annuler</a> --}}
    <a href="{{ route('praticien.register.store5') }}" class="bg-blue-600 text-white p-2 text-center ml-4">S'inscrire <i class="fa fa-check" aria-hidden="true"></i></a>
</div>

 
@endsection
