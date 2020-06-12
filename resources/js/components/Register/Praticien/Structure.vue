<template>
  <div>
      <div class="form-container">
        <table class="w-full text-left">
           <thead>
               <th>Selection vos structures</th>
                <th></th>
                <th>Debut de fonction</th>
                <th></th>
           </thead>
           <tbody>
               <tr>
                    <td>
                        <select v-model="structure_form.name" class="form-control w-full bg-transparent">
                            <option v-for="(structure, index) in structures" :value="structure.id" :key="index">{{ structure.name }}</option>
                        </select>
                    </td>
                    <td></td>
                    <td><input type="date" v-model="structure_form.date" class="form-control w-full"></td>
                    <td class="text-center"><button class="btn-primary" @click="add">Ajouter</button></td>
                </tr>
           </tbody>
       </table>
        <span class="text-red-500 font-semibold" v-if="show_error">Vous devez entrer au moins une specialite</span>
       <table class="border w-full text-left mt-8" v-show="show_table">
           <thead class="bg-blue-400  text-white">
               <th class="p-2" width="45%">Mes Structure</th>
               <th class="p-2" width="45%">Date de debut de fonction</th>
               <th class="p-2" width="10%"></th>
           </thead>
           <tbody>
               <tr v-for="(structure, index) in praticien.structures" :key="index" class="border" :class="{'bg-gray-400 text-white': (index + 1) % 2 == 0}">
                   <td class="p-2" width="45%">{{ structures[structure.name - 1].name }}</td>
                   <td class="p-2" width="45%">{{ structure.date }}</td>
                   <td class="p-2 text-center" width="10%">
                       <button class="bg-red-500 text-white p-1 text-center" @click="remove(structure)">x</button>
                   </td>
               </tr>
           </tbody>
       </table>
    </div>
  </div>
</template>

<script>
export default {
    props:{
        praticien:{
            type: Object,
            required: true
        }
    },
    data(){
        return{
            show_table: false,
            show_error: false,
            structure_form:{
                name:"",
                date:""
            },

            structures: [
              {
                id: 1,
                name: 'Structure 1'
              },
              {
                id: 2,
                name: 'Structure 2'
              },
              {
                id: 3,
                name: 'Structure 3'
              },
              {
                id: 4,
                name: 'Structure 4'
              }
            ]
        }
    },
    methods: {
        add(){
            if(this.structure_form.name == "" && this.structure_form.date == ""){
                this.show_error = true
                return false;
            }

               this.show_table = true
                this.praticien.structures.unshift({
                  'name': this.structure_form.name,
                  'date': this.structure_form.date
                });

                this.structure_form.name = ''
                this.structure_form.date = ''
                this.checkStructure()
                
        },
        remove(value){
            if(value.name != "" && value.date != ""){
               this.praticien.structures.splice(this.praticien.structures.indexOf(value), 1)
               this.checkStructure()
            }
        },

        checkStructure(){
            if(this.praticien.structures.length > 0){
                this.show_error = false 
                return this.$emit('validate-structure', true)
            }
            else{
                this.show_error = true
                return this.$emit('validate-structure', false)
            }
        },
    },
    mounted(){
        if(this.praticien.structures.length > 0){
            return this.$emit('validate-structure', true)
        }
        else{
            return this.$emit('validate-structure', false)
       }
    }
}
</script>

<style>

</style>