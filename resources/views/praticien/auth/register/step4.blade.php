@extends('praticien.auth.register.layout')

@section('register-content')
<form action="{{ route('praticien.register.store4') }}" method="post" class="">
    @csrf
    <div class="mb-6">
        <div class="flex w-1/2 mb-16">
            <input type="checkbox" class="w-64 mt-2" name="conseil_medical">
            <span class=" ml-3 text-gray-800">
                Conseil médical en ligne. Cette option
                donne droit à l’usager d’avoir un conseil médical avec le praticien qui
                sera payant. Elle donne également droit à tout praticien de bénéficier d’un
                appui au diagnostique et à la prise en charge gratuitement
            </span>
        </div>

        <div class="flex w-1/2 mb-6">
            <input type="checkbox" class="w-64 mt-2" name="suivie_patient">
            <span class=" ml-3 text-gray-800">
                Le suivi de patient, permets à un patient de bénéficier
                pendant son séjour à l’hôpital de l’accompagnement d’un professionnel
                de santé faisant office de médecin conseil pour faciliterles interactions
                avec le système
            </span>
        </div>
    </div>

    <a href="{{ route("praticien.register.form3") }}" class="btn-primary my-4 inline-block ml-auto shadow border border-transparent">Retour</a>
    <button type="submit" class="btn-primary my-4 inline-block  shadow border border-transparent">Suivant</button>
</form>

@endsection
