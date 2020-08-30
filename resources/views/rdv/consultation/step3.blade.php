@extends('layouts.app')

@section('content')
@include('structure.partials.header')
<main class="mx-auto container">
    <div class="form-content border shadow-md my-16 mx-24">
        <div class="header py-4 px-4 flex justify-between">
            <h3 class="text-xl font-semibold text-gray-800 uppercase">Prise de rendez-vous</h3>
            <a href="{{ route('rdv_consultation2') }}" class="text-blue-500 font-semibold">Retour</a>
        </div>
        <hr>
        <div class="body py-8 px-4">
             <form action="{{ route("rdv_consltation_store3") }}" method="post">
                 @csrf

                 <div class="my-8">
                    <div class="flex justify-between w-full">
                        <div class="w-full mr-8">
                            <label for="date" class="font-semibold mb-2 block text-gray-900">Date d'examen <span class="text-red-600">*</span></label>
                            <input type="date" name="date" class="form-control w-full @error('date') border-red-500 @enderror" placeholder="Entrer la date d'examen" value={{ old('date') }}>
                            @error('date')
                                <span class="text-red-500 font-semibold">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                        <div class="w-full">
                              <label for="heure" class="font-semibold mb-2 block text-gray-900">Heure d'examen <span class="text-red-600">*</span></label>
                              <select name="heure" id="heure" class="form-control w-full bg-transparent @error('heure') border-red-500 @enderror">
                                  <option value="">Choisissez l'heure de l'examen</option>
                                  <option value="01" {{ old('heure') == '01' ? "selected" : '' }} class="uppercase">01</option>
                                  <option value="02" {{ old('heure') == '02' ? "selected" : '' }} class="uppercase">02</option>
                                  <option value="03" {{ old('heure') == '03' ? "selected" : '' }} class="uppercase">03</option>
                                  <option value="04" {{ old('heure') == '04' ? "selected" : '' }} class="uppercase">04</option>
                                  <option value="05" {{ old('heure') == '05' ? "selected" : '' }} class="uppercase">05</option>
                                  <option value="06" {{ old('heure') == '06' ? "selected" : '' }} class="uppercase">06</option>
                                  <option value="07" {{ old('heure') == '07' ? "selected" : '' }} class="uppercase">07</option>
                                  <option value="08" {{ old('heure') == '08' ? "selected" : '' }} class="uppercase">08</option>
                                  <option value="09" {{ old('heure') == '09' ? "selected" : '' }} class="uppercase">09</option>
                                  <option value="10" {{ old('heure') == '10' ? "selected" : '' }} class="uppercase">10</option>
                                  <option value="11" {{ old('heure') == '11' ? "selected" : '' }} class="uppercase">11</option>
                                  <option value="12" {{ old('heure') == '12' ? "selected" : '' }} class="uppercase">12</option>
                                  <option value="13" {{ old('heure') == '13' ? "selected" : '' }} class="uppercase">13</option> 
                                  <option value="14" {{ old('heure') == '14' ? "selected" : '' }} class="uppercase">14</option>
                                  <option value="15" {{ old('heure') == '15' ? "selected" : '' }} class="uppercase">15</option>
                                  <option value="16" {{ old('heure') == '16' ? "selected" : '' }} class="uppercase">16</option>
                                  <option value="17" {{ old('heure') == '17' ? "selected" : '' }} class="uppercase">17</option>
                                  <option value="18" {{ old('heure') == '18' ? "selected" : '' }} class="uppercase">18</option>
                                  <option value="19" {{ old('heure') == '19' ? "selected" : '' }} class="uppercase">19</option>
                                  <option value="20" {{ old('heure') == '20' ? "selected" : '' }} class="uppercase">20</option>
                                  <option value="21" {{ old('heure') == '21' ? "selected" : '' }} class="uppercase">21</option>
                                  <option value="22" {{ old('heure') == '22' ? "selected" : '' }} class="uppercase">22</option>
                                  <option value="23" {{ old('heure') == '23' ? "selected" : '' }} class="uppercase">23</option>
                                  <option value="24" {{ old('heure') == '24' ? "selected" : '' }} class="uppercase">24</option>
                             </select>
                                  
                              @error('heure')
                                  <span class="text-red-500 font-semibold">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <div class="flex justify-between w-full">
                        <div class="w-full">
                            <label for="motif" class="font-semibold mb-2 block text-gray-900">Motif d'examen <span class="text-red-600">*</span></label>
                            <textarea name="motif" id="" rows="6" class="form-control w-full resize-none" placeholder="Decriver ici vos maux ou autres situations">{{ old('motif') }}</textarea>
                            
                            @error('motif')
                                <span class="text-red-500 font-semibold">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <div class="flex justify-between w-full">
                        <div class="w-full">
                            <label for="has_specialist" class="font-semibold mb-2 block text-gray-900">Connaissez-vous un specialiste dans cette structure ? <span class="text-red-600">*</span></label>
                            <div>
                                <input type="radio" name="has_specialist" value="oui" {{ old('has_specialist') == "oui" ? 'checked='.'"'.'checked'.'"' : '' }} onchange="handleClick(this)">
                                Oui
                            </div>
                            <div class="mt-2">
                                <input type="radio" name="has_specialist" value="non" {{ old('has_specialist') == "non" ? 'checked='.'"'.'checked'.'"' : '' }}onchange="handleClick(this)">
                                Non
                            </div>
                            
                            @error('has_specialist')
                                <span class="text-red-500 font-semibold">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <div class="flex justify-between w-full" id="specialiste">
                        <div class="w-full" id="praticien_container ">
                            <label for="praticien" class="font-semibold mb-2 block text-gray-900">Choisissez votre specialiste si vous en avez</label>
                            <select name="praticien" {{ old('has_specialist') == "oui" ? 'enabled' : 'disabled' }} id="praticien" class="form-control bg-transparent w-full @error('praticien') border-red-500 @enderror">
                                <option value=""></option>
                                @foreach($praticiens as $praticien)
                                    <option value="{{ $praticien->id }}">{{ $praticien->str_praticien_nom }}</option>
                                @endforeach
                            </select>
                            
                            @error('praticien')
                                <span class="text-red-500 font-semibold">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <div class="flex justify-between w-full">
                        <div class="w-full">
                            <label for="assure" class="font-semibold mb-2 block text-gray-900">Etes-vous assuré(e) ? <span class="text-red-600">*</span></label>
                            <div>
                                <input type="radio" name="assure" value="oui" {{ old('assure') == "oui" ? 'checked='.'"'.'checked'.'"' : '' }} onchange="handlAssurenceChoices(this)">
                                Oui
                            </div>
                            <div class="mt-2">
                                <input type="radio" name="assure" value="non" {{ old('assure') == "non" ? 'checked='.'"'.'checked'.'"' : '' }} onchange="handlAssurenceChoices(this)">
                                Non
                            </div>
                            
                            @error('assure')
                                <span class="text-red-500 font-semibold">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mt-8 mb-10">
                    <div class="flex justify-between w-full" id="specialiste">
                        <div class="w-full mr-8">
                            <label for="assurence" class="font-semibold mb-2 block text-gray-900">Selectionner le type d'assurence </label>
                            <select name="assurence" {{ old('assure') == "oui" ? 'enabled' : 'disabled' }} id="assurence" class="form-control bg-transparent w-full @error('assurence') border-red-500 @enderror">
                                <option value=""></option>
                                <option value="assurence1">Assurence 1</option>
                                <option value="assurence2">Assurence 2</option>
                                <option value="assurence3">Assurence 3</option>
                                <option value="assurence4">Assurence 4</option>
                                <option value="assurence5">Assurence 5</option>
                            </select>
                            
                            @error('assurence')
                                <span class="text-red-500 font-semibold">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="other" class="font-semibold mb-2 block text-gray-900">Autre type d'assurence</label>   
                            <input type="text" {{ old('assure') == "oui" ? 'enabled' : 'disabled' }} id="other" name="other" class="form-control w-full @error('other') border-red-500 @enderror"> 
                            <small class="text-red-500">Si votre assurence ne figure pas dans la liste des assurences, mentionner la ici</small>    
                            @error('other')
                                <span class="text-red-500 font-semibold">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="ml-auto flex justify-end">
                    <a href="{{ route("rdv_consultation2") }}" class="bg-blue-600 text-white p-2 text-center"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</a>
                    <button class="bg-blue-600 text-white p-2 text-center ml-4">Suivant <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                </div>
          </div>
     </div>
 </main>
@endsection

@push('scripts')
    <script>
        function handleClick(o) {
            var field = document.getElementById('praticien')
           
            if(o.value == 'oui'){
               field.classList.remove('bg-gray-300')
               field.removeAttribute('disabled', '')
               field.setAttribute('enabled', '')
            }
            else{
               field.value = null
               field.removeAttribute('enabled', '')
               field.setAttribute('disabled', '')
               field.classList.add('bg-gray-300')
            }
        }

        function handlAssurenceChoices(o) {
            var field = document.getElementById('assurence')
            var field2 = document.getElementById('other')
           
            if(o.value == 'oui'){
               field.classList.remove('bg-gray-300')
               field.removeAttribute('disabled', '')
               field.setAttribute('enabled', '')

               field2.classList.remove('bg-gray-300')
               field2.removeAttribute('disabled', '')
               field2.setAttribute('enabled', '')
            }
            else{
               field.value = null
               field.removeAttribute('enabled', '')
               field.setAttribute('disabled', '')
               field.classList.add('bg-gray-300')

               field2.value = null
               field2.removeAttribute('enabled', '')
               field2.setAttribute('disabled', '')
               field2.classList.add('bg-gray-300')
            }
        }

    </script>
@endpush


