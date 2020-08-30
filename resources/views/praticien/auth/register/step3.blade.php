@extends('praticien.auth.register.layout')

@section('register-content')
<div class="mb-8">
    <h3 class="text-xl font-semibold mb-3 text-center">Sélectionner une photo de profile</h3>
    <div class="w-full">
       <form action="{{ route('praticien.register.store3') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="image-content mb-12">
                <div class="mx-auto w-48 h-48 mb-2 border rounded-full relative bg-gray-100 shadow-inset">
                    <img id="preview-image" class="object-cover w-full h-48 rounded-full" src="{{ asset('images/avatar.svg') }}" />
                </div>
                <div class="mx-auto border w-48 px-1 py-1 shadow-md rounded bg-white text-sm border-blue-500 relative">
                    <span class="text-lg text-center text-blue-500 font-semibold  w-full h-full absolute z-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-flex flex-shrink-0 w-6 h-6 -mt-1 mr-1" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                            <path d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                            <circle cx="12" cy="13" r="3" />
                        </svg>	
                        Parcourir
                    </span>
                    <input type="file" onchange="loadFile(event,'preview-image')" name="photo" id="photo" class="w-full h-full z-20 opacity-0 @error('photo') border-red-500 @enderror" value="{{ old('photo') }}">
                    @error('photo')
                        <small class="text-red-500 font-semibold">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                </div>
            </div>
            <a href="{{ route("praticien.register.form2") }}" class="btn-primary my-4 inline-block ml-auto shadow border border-transparent">Retour</a>
            <button type="submit" class="btn-primary inline-block  shadow border border-transparent">Suivant</button>
       </form>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        loadFile = function(event, id) {
            var output = document.getElementById(id);
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endpush
  
