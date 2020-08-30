@extends('structure.pages.index')

@section('structure-content')
    <div class="dashbord-content">
        @include('utils.flash')
       <div class="form-content border shadow-md my-16 mx-24">
           <div class="header py-4 px-4 flex justify-between">
               <h3 class="text-xl font-semibold text-gray-800 uppercase">Modifier les jours et heures de consultation du praticien</h3>
               <a href="{{ route('structure.praticiens.index') }}" class="text-blue-500 font-semibold">Annuler</a>
           </div>
           <hr>
           <div class="body py-8 px-4">
                <form action="{{ route('structure.praticien.consultation.update', [$praticien, $consultation]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="my-8">
                        <div class="flex justify-between w-full">
                            <div class="w-full">
                                <label for="specialite" class="font-semibold text-sm mb-1 block text-gray-900">Specialité <span class="text-red-600">*</span></label>
                                <select name="specialite" id="specialite" class="form-control bg-transparent w-full @error('specialite') border-red-500 @enderror">
                                    <option value="">Selectionner la specialite</option>
                                    @foreach($praticien->specialites as $specialite)
                                        <option value="{{ $specialite->id }}" {{ $consultation->id_specialite === $specialite->id ? 'selected' : ''}}>{{ $specialite->nom_specialite }}</option>
                                    @endforeach
                                </select>
                                
                                @error('specialite')
                                    <span class="text-red-500 font-semibold">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-8">
                        <div class="flex justify-between w-full">
                            <div class="w-full">
                                  <label for="jour" class="font-semibold text-sm mb-1 block text-gray-900">Jour de consultation <span class="text-red-600">*</span></label>
                                   <select name="jour" id="jour" class="form-control w-full bg-transparent @error('jour') border-red-500 @enderror">
                                        <option value="">Choisir le jour de consultation</option>
                                        <option value="LUNDI" class="uppercase" {{ $consultation->jour == 'LUNDI' ? 'selected' : '' }}>LUNDI</option>
                                        <option value="MARDI" class="uppercase" {{ $consultation->jour == 'MARDI' ? 'selected' : '' }}>MARDI</option>
                                        <option value="MERCREDI" class="uppercase" {{ $consultation->jour == 'MERCREDI' ? 'selected' : '' }}>MERCREDI</option>
                                        <option value="JEUDI" class="uppercase" {{ $consultation->jour == 'JEUDI' ? 'selected' : '' }}>JEUDI</option>
                                        <option value="VENDREDI" class="uppercase" {{ $consultation->jour == 'VENDREDI' ? 'selected' : '' }}>VENDREDI</option>
                                        <option value="SAMEDI" class="uppercase" {{ $consultation->jour == 'SAMEDI' ? 'selected' : '' }}>SAMEDI</option>
                                        <option value="DIMANCHE" class="uppercase" {{ $consultation->jour == 'DIMANCHE' ? 'selected' : '' }}>DIMANCHE</option>
                                   </select>
                                  
                                  @error('jour')
                                      <span class="text-red-500 font-semibold">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                            </div>
                        </div>
                  </div>
                  <div class="mb-8">
                      <div class="flex justify-between w-full">
                          <div class="w-full mr-8">
                                <label for="heure_debut" class="font-semibold text-sm mb-1 block text-gray-900">Heure de débbut de consultation <span class="text-red-600">*</span></label>
                                <select name="heure_debut" id="heure_debut" class="form-control w-full bg-transparent @error('heure_debut') border-red-500 @enderror">
                                    <option value="">Choisir l'heure de debut de consultation</option>
                                    <option value="00" class="uppercase" {{ $consultation->heure_debut == '00' ? 'selected' : '' }}>00</option>
                                    <option value="01" class="uppercase" {{ $consultation->heure_debut == '01' ? 'selected' : '' }}>01</option>
                                    <option value="02" class="uppercase" {{ $consultation->heure_debut == '02' ? 'selected' : '' }}>02</option>
                                    <option value="03" class="uppercase" {{ $consultation->heure_debut == '03' ? 'selected' : '' }}>03</option>
                                    <option value="04" class="uppercase" {{ $consultation->heure_debut == '04' ? 'selected' : '' }}>04</option>
                                    <option value="05" class="uppercase" {{ $consultation->heure_debut == '05' ? 'selected' : '' }}>05</option>
                                    <option value="06" class="uppercase" {{ $consultation->heure_debut == '06' ? 'selected' : '' }}>06</option>
                                    <option value="07" class="uppercase" {{ $consultation->heure_debut == '07' ? 'selected' : '' }}>07</option>
                                    <option value="08" class="uppercase" {{ $consultation->heure_debut == '08' ? 'selected' : '' }}>08</option>
                                    <option value="09" class="uppercase" {{ $consultation->heure_debut == '09' ? 'selected' : '' }}>09</option>
                                    <option value="10" class="uppercase" {{ $consultation->heure_debut == '10' ? 'selected' : '' }}>10</option>
                                    <option value="11" class="uppercase" {{ $consultation->heure_debut == '11' ? 'selected' : '' }}>11</option>
                                    <option value="12" class="uppercase" {{ $consultation->heure_debut == '12' ? 'selected' : '' }}>12</option>
                                    <option value="13" class="uppercase" {{ $consultation->heure_debut == '13' ? 'selected' : '' }}>13</option> 
                                    <option value="14" class="uppercase" {{ $consultation->heure_debut == '14' ? 'selected' : '' }}>14</option>
                                    <option value="15" class="uppercase" {{ $consultation->heure_debut == '15' ? 'selected' : '' }}>15</option>
                                    <option value="16" class="uppercase" {{ $consultation->heure_debut == '16' ? 'selected' : '' }}>16</option>
                                    <option value="17" class="uppercase" {{ $consultation->heure_debut == '17' ? 'selected' : '' }}>17</option>
                                    <option value="18" class="uppercase" {{ $consultation->heure_debut == '18' ? 'selected' : '' }}>18</option>
                                    <option value="19" class="uppercase" {{ $consultation->heure_debut == '19' ? 'selected' : '' }}>19</option>
                                    <option value="20" class="uppercase" {{ $consultation->heure_debut == '20' ? 'selected' : '' }}>20</option>
                                    <option value="21" class="uppercase" {{ $consultation->heure_debut == '21' ? 'selected' : '' }}>21</option>
                                    <option value="22" class="uppercase" {{ $consultation->heure_debut == '22' ? 'selected' : '' }}>22</option>
                                    <option value="23" class="uppercase" {{ $consultation->heure_debut == '24' ? 'selected' : '' }}>23</option>
                               </select>
                                
                                @error('heure_debut')
                                    <span class="text-red-500 font-semibold">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          </div>
                          <div class="w-full">
                                <label for="heure_fin" class="font-semibold text-sm mb-1 block text-gray-900">Heure de fin de consultation <span class="text-red-600">*</span></label>
                                <select name="heure_fin" id="heure_fin" class="form-control w-full bg-transparent @error('heure_fin') border-red-500 @enderror">
                                    <option value="">Choisir l'heure de fin de consultation</option>
                                    <option value="00" class="uppercase" {{ $consultation->heure_fin == '00' ? 'selected' : '' }}>00</option>
                                    <option value="01" class="uppercase" {{ $consultation->heure_fin == '01' ? 'selected' : '' }}>01</option>
                                    <option value="02" class="uppercase" {{ $consultation->heure_fin == '02' ? 'selected' : '' }}>02</option>
                                    <option value="03" class="uppercase" {{ $consultation->heure_fin == '03' ? 'selected' : '' }}>03</option>
                                    <option value="04" class="uppercase" {{ $consultation->heure_fin == '04' ? 'selected' : '' }}>04</option>
                                    <option value="05" class="uppercase" {{ $consultation->heure_fin == '05' ? 'selected' : '' }}>05</option>
                                    <option value="06" class="uppercase" {{ $consultation->heure_fin == '06' ? 'selected' : '' }}>06</option>
                                    <option value="07" class="uppercase" {{ $consultation->heure_fin == '07' ? 'selected' : '' }}>07</option>
                                    <option value="08" class="uppercase" {{ $consultation->heure_fin == '08' ? 'selected' : '' }}>08</option>
                                    <option value="09" class="uppercase" {{ $consultation->heure_fin == '09' ? 'selected' : '' }}>09</option>
                                    <option value="10" class="uppercase" {{ $consultation->heure_fin == '10' ? 'selected' : '' }}>10</option>
                                    <option value="11" class="uppercase" {{ $consultation->heure_fin == '11' ? 'selected' : '' }}>11</option>
                                    <option value="12" class="uppercase" {{ $consultation->heure_fin == '12' ? 'selected' : '' }}>12</option>
                                    <option value="13" class="uppercase" {{ $consultation->heure_fin == '13' ? 'selected' : '' }}>13</option> 
                                    <option value="14" class="uppercase" {{ $consultation->heure_fin == '14' ? 'selected' : '' }}>14</option>
                                    <option value="15" class="uppercase" {{ $consultation->heure_fin == '15' ? 'selected' : '' }}>15</option>
                                    <option value="16" class="uppercase" {{ $consultation->heure_fin == '16' ? 'selected' : '' }}>16</option>
                                    <option value="17" class="uppercase" {{ $consultation->heure_fin == '17' ? 'selected' : '' }}>17</option>
                                    <option value="18" class="uppercase" {{ $consultation->heure_fin == '18' ? 'selected' : '' }}>18</option>
                                    <option value="19" class="uppercase" {{ $consultation->heure_fin == '19' ? 'selected' : '' }}>19</option>
                                    <option value="20" class="uppercase" {{ $consultation->heure_fin == '20' ? 'selected' : '' }}>20</option>
                                    <option value="21" class="uppercase" {{ $consultation->heure_fin == '21' ? 'selected' : '' }}>21</option>
                                    <option value="22" class="uppercase" {{ $consultation->heure_fin == '22' ? 'selected' : '' }}>22</option>
                                    <option value="23" class="uppercase" {{ $consultation->heure_fin == '24' ? 'selected' : '' }}>23</option>
                               </select>
                                    
                                @error('heure_fin')
                                    <span class="text-red-500 font-semibold">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          </div>
                      </div>
                   </div>
                   
                    <button class="bg-blue-600 text-white p-2 text-center block ml-auto"><i class="fa fa-floppy-o" aria-hidden="true"></i> Mettre à jour</button>
                </form>
           </div>
       </div>
    </div>
@endsection
