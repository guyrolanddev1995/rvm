@extends('structure.pages.index')

@section('structure-content')
    <section class="dashbord-content pt-20 mx-auto">
        <structure-notifications></structure-notifications>
        <section>
          <structure-consultations></structure-consultations>
        </section>
    </section>
@endsection
