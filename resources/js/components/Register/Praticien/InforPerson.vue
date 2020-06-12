<template>
  <div class="form-container">
      <div class="flex flex-col lg:flex-row mb-6">
         <div class="input-group w-full lg:w-1/2  mb-6 mr-0 lg:mr-8">
            <label for="" class="input-label"
                :class="{'text-red-500': $v.praticien.nom.$error}">
                  Nom <span class="required-input">*</span></label>
            <input v-model.trim="$v.praticien.nom.$model"
                 type="text" 
                :class="{'border-red-500': $v.praticien.nom.$error}" 
                class="form-control" id="nom" required>
            <small v-if="$v.praticien.nom.$error && !$v.praticien.nom.required"
                :class="{'text-red-500 font-bold': $v.praticien.nom.$error}">
                Ce champ est requit
            </small>
         </div>

         <div class="input-group w-full lg:w-1/2">
            <label for="prenom" 
                   class="input-label"
                   :class="{'text-red-500': $v.praticien.prenom.$error}">
                    Prénom <span class="required-input">*</span></label>
            <input v-model="$v.praticien.prenom.$model"
              type="text" 
              :class="{'border-red-500': $v.praticien.prenom.$error}" 
              class="form-control" id="prenom" require>
            <small v-if="$v.praticien.prenom.$error && !$v.praticien.prenom.required"
                :class="{'text-red-500 font-bold': $v.praticien.prenom.$error}">
                Ce champ est requit
            </small>
         </div>
      </div>

      <div class="flex flex-col lg:flex-row mb-6">
         <div class="input-group w-full lg:w-1/2 mb-6 mr-0 lg:mr-8">
            <label for="sexe" 
                  class="input-label"
                  :class="{'text-red-500': $v.praticien.sexe.$error}">
                    Sexe <span class="required-input">*</span></label>
            <select v-model="$v.praticien.sexe.$model"
              class="form-control bg-transparent"
              :class="{'border-red-500': $v.praticien.sexe.$error}" 
              id="sexe" required>
                <option value="M">Masculin</option>
                <option value="F">Feminin</option>
            </select>
            <small v-if="$v.praticien.sexe.$error && !$v.praticien.sexe.required"
                :class="{'text-red-500 font-bold': $v.praticien.sexe.$error}">
                Ce champ est requit
            </small>
         </div>

         <div class="input-group w-full lg:w-1/2">
            <label for="lieux" 
                   :class="{'text-red-500': $v.praticien.lieu_residence.$error}"
                  class="input-label">
                    Lieu de résidence <span class="required-input">*</span></label>
            <input v-model="$v.praticien.lieu_residence.$model"
              type="text" 
              :class="{'border-red-500': $v.praticien.lieu_residence.$error}" 
              class="form-control" require>
            <small v-if="$v.praticien.lieu_residence.$error && !$v.praticien.lieu_residence.required"
                :class="{'text-red-500 font-bold': $v.praticien.lieu_residence.$error}">
                Ce champ est requit
            </small>
         </div>
      </div>

      <div class="flex flex-col lg:flex-row mb-6">
         <div class="input-group w-full lg:w-1/2 mb-6 mr-0 lg:mr-8">
            <label for="date_naissance" 
                    :class="{'text-red-500': $v.praticien.date_naissance.$error}"
                   class="input-label">
                   Date de naissance <span class="required-input">*</span></label>
            <input v-model="$v.praticien.date_naissance.$model"
               type="date" 
               :class="{'border-red-500': $v.praticien.date_naissance.$error}" 
               class="form-control" id="date_naissance" required>
            <small v-if="$v.praticien.date_naissance.$error && !$v.praticien.date_naissance.required"
                :class="{'text-red-500 font-bold': $v.praticien.date_naissance.$error}">
                Entrer une date valide
            </small>
         </div>

         <div class="input-group w-full lg:w-1/2">
            <label for="lieux_naissance" 
                   :class="{'text-red-500': $v.praticien.lieu_naissance.$error}"
                  class="input-label">
                  Lieu de naissance <span class="required-input">*</span></label>
            <input v-model="$v.praticien.lieu_naissance.$model"
               type="text" 
                :class="{'border-red-500': $v.praticien.lieu_naissance.$error}" 
               class="form-control" required>
            <small v-if="$v.praticien.lieu_naissance.$error && !$v.praticien.lieu_naissance.required"
                :class="{'text-red-500 font-bold': $v.praticien.lieu_naissance.$error}">
                Ce champs est requit
            </small>
         </div>
      </div>

      <div class="flex flex-col lg:flex-row mb-6">
         <div class="input-group w-full lg:w-1/2 mb-6 mr-0 lg:mr-8">
            <label for="telephone" 
                   :class="{'text-red-500': $v.praticien.telephone.$error}"
                  class="input-label">
                    Téléphone <span class="required-input">*</span></label>
            <input v-model="$v.praticien.telephone.$model" 
                type="text" 
                :class="{'border-red-500': $v.praticien.telephone.$error}" 
                class="form-control" id="telephone" required>
            <small v-if="$v.praticien.telephone.$error && !$v.praticien.telephone.required"
                :class="{'text-red-500 font-bold': $v.praticien.telephone.$error}">
                Ce champs est requit
            </small>
            <small v-if="$v.praticien.telephone.$error && !$v.praticien.telephone.numeric"
                :class="{'text-red-500 font-bold': $v.praticien.telephone.$error}">
                Le numero de telephone ne doit contenir que des chiffres
            </small>
         </div>

         <div class="input-group w-full lg:w-1/2">
            <label for="email" 
                  :class="{'text-red-500': $v.praticien.email.$error}"
                  class="input-label">
                     Addresse E-Mail <span class="required-input">*</span></label>
            <input v-model="$v.praticien.email.$model"
                type="email" 
                :class="{'border-red-500': $v.praticien.email.$error}" 
                class="form-control" id="email" required>
            <small v-if="$v.praticien.email.$error && !$v.praticien.email.required"
                :class="{'text-red-500 font-bold': $v.praticien.email.$error}">
                Ce champs est requit
            </small>
            <small v-if="$v.praticien.email.$error && !$v.praticien.email.email"
                :class="{'text-red-500 font-bold': $v.praticien.email.$error}">
                Entrer une addresse E-mail valide
            </small>
         </div>
      </div>

      <div class="flex flex-col lg:flex-row mb-6">
         <div class="input-group w-full">
            <label for="presentation" 
                  :class="{'text-red-500': $v.praticien.bio.$error}"
                  class="input-label">Présentation <span class="required-input">*</span></label>
            <input v-model="$v.praticien.bio.$model" 
                type="text" 
                 :class="{'border-red-500': $v.praticien.bio.$error}" 
                class="form-control w-full" id="presentation" required>
            <small v-if="$v.praticien.bio.$error && !$v.praticien.bio.required"
                :class="{'text-red-500 font-bold': $v.praticien.bio.$error}">
                Veuillez saisir quelque chose à propos de vous
            </small>
         </div>
      </div>

       <div class="flex flex-col lg:flex-row">
         <div class="input-group mb-6 mr-0 lg:mr-8 w-full lg:w-1/2">
            <label for="password" 
                   :class="{'text-red-500': $v.praticien.password.$error}"
                   class="input-label">Mot de passe <span class="required-input">*</span></label>
            <input v-model="$v.praticien.password.$model" 
                :class="{'border-red-500': $v.praticien.password.$error}" 
                type="password" 
                class="form-control" id="password" required>
            <small v-if="$v.praticien.password.$error && !$v.praticien.password.required"
                :class="{'text-red-500 font-bold': $v.praticien.password.$error}">
                Ce champ est requit
            </small>
            <small v-if="$v.praticien.password.$error && !$v.praticien.password.minLength"
                :class="{'text-red-500 font-bold': $v.praticien.password.$error}">
                Le mot de passe doit contenir au moins {{ $v.praticien.password.$params.minLength.min }} caractères
            </small>
         </div>

         <div class="input-group mb-6 mr-0 lg:mr-8 w-full lg:w-1/2">
            <label for="password" 
                   :class="{'text-red-500': $v.praticien.password_confirmation.$error}"
                   class="input-label">Confirmer le mot de passe <span class="required-input">*</span></label>
            <input v-model="$v.praticien.password_confirmation.$model" 
                :class="{'border-red-500': $v.praticien.password_confirmation.$error}" 
                type="password" 
                class="form-control" id="password_confirmation" required>
            <small v-if="$v.praticien.password_confirmation.$error && !$v.praticien.password_confirmation.minLength"
                :class="{'text-red-500 font-bold': $v.praticien.password_confirmation.$error}">
               Les deux mots de passes doivent etre identiques
            </small>
         </div>
      </div>
  </div>
</template>

<script>
import {validationMixin} from 'vuelidate'
import { required, numeric, email, minLength, sameAs } from 'vuelidate/lib/validators'

export default {
    mixins: [validationMixin],
    props:{
        praticien:{
            type: Object,
            required: true
        }
    },

    validations:{
       praticien:{
           nom:{
              required
           },

           prenom:{
              required
           },

           sexe:{
            required
           },

           lieu_residence:{
            required
           },

           date_naissance:{
            required
           },

           lieu_naissance:{
             required
           },

           telephone:{
             required,
             numeric
           },

           email:{
             required,
             email
           },

           bio:{
             required
           },

           password:{
              required,
              minLength: minLength(8)
           },

           password_confirmation:{
              sameAsPassword: sameAs('password')
           }
      }
    },
    watch:{
       $v:{
         handler: function(val){
            if(!val.$invalid){
              this.$emit('can-continue', {
                'error': val.$anyError,
                'invalid': false
              })
            }
            else{
              this.$emit('can-continue', {
                'error': val.$anyError,
                'invalid': true
              })
            }
         },

         deep: true
       }
    },
    mounted() {
       this.$emit('can-continue', {
          'error': this.$v.$anyError,
          'invalid': this.$v.$invalid
       })
    }
}
</script>

<style>

</style>