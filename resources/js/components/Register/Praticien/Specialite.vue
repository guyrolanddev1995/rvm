<template>
    <div class="form-container">
      <div class="flex flex-col lg:flex-row mb-16">
         <div class="input-group w-full">
            <label for="num_ordre" 
                   :class="{'text-red-500': $v.praticien.numero_ordre.$error}"
                   class="input-label">Numéro d'inscription à l'ordre <span class="required-input">*</span></label>
            <input v-model="$v.praticien.numero_ordre.$model"
                type="text" 
                class="form-control w-full" id="num_ordre">
            <small v-if="$v.praticien.numero_ordre.$error && !$v.praticien.numero_ordre.required"
                :class="{'text-red-500 font-bold': $v.praticien.numero_ordre.$error}">
                Ce champs est requit
            </small>
            <small v-if="$v.praticien.numero_ordre.$error && !$v.praticien.numero_ordre.minLength"
                :class="{'text-red-500 font-bold': $v.praticien.numero_ordre.$error}">
                Le numero de l'ordre doit contenir au moins {{ $v.praticien.numero_ordre.$params.minLength.min }} caractères
            </small>
         </div>
      </div>
       
       <table class="w-full text-left">
           <tr>
                <th>Ajouter vos specialités</th>
                <th></th>
                <th>Date de debut d'exercice</th>
                <th></th>
           </tr>
           <tr>
              <td>
                  <select v-model="specialite_form.name" class="form-control w-full bg-transparent">
                      <option v-for="(specialite, index) in specialites" :value="specialite.id" :key="index">{{ specialite.name }}</option>
                  </select>
              </td>
              <td></td>
              <td><input type="date" v-model="specialite_form.date" class="form-control w-full"></td>
              <td class="text-center"><button class="btn-primary" @click="add">Ajouter</button></td>
           </tr>
       </table>
       
       <span class="text-red-500 font-semibold" v-if="show_error">Vous devez entrer au moins une specialite</span>
       <table class="border w-full text-left mt-8" v-show="show_table">
           <thead class="bg-blue-400  text-white">
               <th class="p-2" width="45%">Mes specialite</th>
               <th class="p-2" width="45%">Date de debut de fonction</th>
               <th class="p-2" width="10%"></th>
           </thead>
           <tbody>
               <tr v-for="(specialite, index) in praticien.specialites" :key="index" class="border" :class="{'bg-gray-400 text-white': (index + 1) % 2 == 0}">
                   <td class="p-2" width="45%">{{ specialites[specialite.name - 1].name }}</td>
                   <td class="p-2" width="45%">{{ specialite.date }}</td>
                   <td class="p-2 text-center" width="10%">
                       <button class="bg-red-500 text-white p-1 text-center" @click="remove(specialite)">x</button>
                   </td>
               </tr>
           </tbody>
       </table>
    </div>
</template>

<script>
import {validationMixin} from 'vuelidate'
import { required, minLength, } from 'vuelidate/lib/validators'

export default {
    mixins: [validationMixin],
    props:{
        praticien:{
            type: Object,
            required: true
        },
    },

    data(){
        return{
            show_table: false,
            show_error: false,
            specialite_form:{
                name:"",
                date:""
            },
            specialites:[
                {
                    id: 1,
                    name: "SPECIALITE 1"
                },
                {
                    id: 2,
                    name: "SPECIALITE 2"
                },
                {
                    id: 3,
                    name: "SPECIALITE 3"
                },
                {
                    id: 4,
                    name: "SPECIALITE 1"
                }
            ]
        }
    },
    methods: {
        add(){
            if(this.specialite_form.name == "" && this.specialite_form.date == ""){
                this.show_error = true
            }

                this.show_table = true
                this.praticien.specialites.unshift({
                  'name': this.specialite_form.name,
                  'date': this.specialite_form.date
                });

                this.specialite_form.name = ''
                this.specialite_form.date = ''
                this.checkStructure()
        },
        remove(value){
            if(value.name != "" && value.date != ""){
               this.praticien.specialites.splice(this.praticien.specialites.indexOf(value), 1)
               this.checkStructure()
            }
        },
        checkStructure(){
            if(this.praticien.specialites.length > 0){
                this.show_error = false 
                return this.$emit('validate-specialite', true)
            }
            else{
                this.show_error = true
                return this.$emit('validate-specialite', false)
            }
        },
    },
    validations:{
       praticien:{
           numero_ordre:{
              required,
              minLength: minLength(8)
           }
       }
    },
    watch:{
       $v:{
         handler: function(val){
            if(!val.$invalid){
              this.$emit('can-continue-step-2', {
                error: val.$anyError,
                invalid: false
              })
            }
            else{
              this.$emit('can-continue-step-2', {
                'error': val.$anyError,
                'invalid': true
              })
            }
         },

         deep: true
       }
    },
    mounted() {
       this.$emit('can-continue-step-2', {
          'error': this.$v.$anyError,
          'invalid': this.$v.$invalid
       })

       if(this.praticien.specialites.length > 0){
            return this.$emit('validate-specialite', true)
        }
        else{
            return this.$emit('validate-specialite', false)
       }
    }

}
</script>

<style>

</style>