<template>
    <div class="form-content border shadow-md my-16 mx-40">
           <div class="header py-4 px-4 flex justify-between">
               <h3 class="text-xl font-semibold text-gray-800 uppercase">Definissez les jours et heures de consultation du praticien</h3>
               <a href="#" class="text-blue-500 font-semibold">Retour</a>
           </div>
           <hr>
           <div class="body py-8 px-4">
                <form method="post">
                    <div class="my-8">
                        <div class="flex justify-between w-full">
                            <div class="w-full">
                                <label for="specialite" class="font-semibold text-sm mb-1 block text-gray-900">Specialité <span class="text-red-600">*</span></label>
                                <select v-model="specialite" id="jour" class="form-control w-full bg-transparent" @change="filter()">
                                    <option v-for="specialite in specialites" :key="specialite.id" :value="specialite.id" class="uppercase">
                                        {{ specialite.nom_specialite }}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-8">
                        <div class="flex justify-between w-full">
                            <div class="w-full">
                                  <label for="jour" class="font-semibold text-sm mb-1 block text-gray-900">Jour de consultation <span class="text-red-600">*</span></label>
                                   <select name="jour" id="jour" class="form-control w-full bg-transparent">
                                        <option value="">Choisir le jour de consultation</option>
                                        <option value="LUNDI" class="uppercase">LUNDI</option>
                                        <option value="MARDI" class="uppercase">MARDI</option>
                                        <option value="MERCREDI" class="uppercase">MERCREDI</option>
                                        <option value="JEUDI" class="uppercase">JEUDI</option>
                                        <option value="VENDREDI" class="uppercase">VENDREDI</option>
                                        <option value="SAMEDI" class="uppercase">SAMEDI</option>
                                        <option value="DIMANCHE" class="uppercase">DIMANCHE</option>
                                   </select>
                            </div>
                        </div>
                   </div>
                  <div class="mb-8">
                      <div class="flex justify-between w-full">
                          <div class="w-full mr-8">
                                <label for="heure_debut" class="font-semibold text-sm mb-1 block text-gray-900">Heure de débbut de consultation <span class="text-red-600">*</span></label>
                                <select name="heure_debut" id="heure_debut" class="form-control w-full bg-transparent @error('heure_debut') border-red-500 @enderror">
                                    <option value="">Choisir l'heure de debut de consultation</option>
                                    <option value="00" class="uppercase">00</option>
                                    <option value="01" class="uppercase">01</option>
                                    <option value="02" class="uppercase">02</option>
                                    <option value="03" class="uppercase">03</option>
                                    <option value="04" class="uppercase">04</option>
                                    <option value="05" class="uppercase">05</option>
                                    <option value="06" class="uppercase">06</option>
                                    <option value="07" class="uppercase">07</option>
                                    <option value="08" class="uppercase">08</option>
                                    <option value="09" class="uppercase">09</option>
                                    <option value="10" class="uppercase">10</option>
                                    <option value="11" class="uppercase">11</option>
                                    <option value="12" class="uppercase">12</option>
                                    <option value="13" class="uppercase">13</option> 
                                    <option value="14" class="uppercase">14</option>
                                    <option value="15" class="uppercase">15</option>
                                    <option value="16" class="uppercase">16</option>
                                    <option value="17" class="uppercase">17</option>
                                    <option value="18" class="uppercase">18</option>
                                    <option value="19" class="uppercase">19</option>
                                    <option value="20" class="uppercase">20</option>
                                    <option value="21" class="uppercase">21</option>
                                    <option value="22" class="uppercase">22</option>
                                    <option value="23" class="uppercase">23</option>
                               </select>
                          </div>
                          <div class="w-full">
                                <label for="heure_fin" class="font-semibold text-sm mb-1 block text-gray-900">Heure de fin de consultation <span class="text-red-600">*</span></label>
                                <select name="heure_fin" id="heure_fin" class="form-control w-full bg-transparent">
                                    <option value="">Choisir l'heure de fin de consultation</option>
                                    <option value="00" class="uppercase">00</option>
                                    <option value="01" class="uppercase">01</option>
                                    <option value="02" class="uppercase">02</option>
                                    <option value="03" class="uppercase">03</option>
                                    <option value="04" class="uppercase">04</option>
                                    <option value="05" class="uppercase">05</option>
                                    <option value="06" class="uppercase">06</option>
                                    <option value="07" class="uppercase">07</option>
                                    <option value="08" class="uppercase">08</option>
                                    <option value="09" class="uppercase">09</option>
                                    <option value="10" class="uppercase">10</option>
                                    <option value="11" class="uppercase">11</option>
                                    <option value="12" class="uppercase">12</option>
                                    <option value="13" class="uppercase">13</option> 
                                    <option value="14" class="uppercase">14</option>
                                    <option value="15" class="uppercase">15</option>
                                    <option value="16" class="uppercase">16</option>
                                    <option value="17" class="uppercase">17</option>
                                    <option value="18" class="uppercase">18</option>
                                    <option value="19" class="uppercase">19</option>
                                    <option value="20" class="uppercase">20</option>
                                    <option value="21" class="uppercase">21</option>
                                    <option value="22" class="uppercase">22</option>
                                    <option value="23" class="uppercase">23</option>
                               </select>
                          </div>
                      </div>
                   </div>
                   
                    <button class="bg-blue-600 text-white p-2 text-center block ml-auto"><i class="fa fa-floppy-o" aria-hidden="true"></i> Enregistrer</button>
                </form>
           </div>
       </div>
</template>

<script>
export default {
   props:{
       patient:{
           type: Object,
           required: true
       }
   },

   data(){
       return{
           specialite: '',
           specialites:[],
           structures: []
       }
   },

   methods:{
       filter(){
          console.log(this.specialite)
       }
   },

   mounted(){
       axios.get('/patient/consultation/records')
            .then((response) => {
                this.specialites = response.data.specialites,
                this.structures = response.data.structures
            })
   }
}
</script>

<style>

</style>