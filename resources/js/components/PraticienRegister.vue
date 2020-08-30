<template>
    <div class="w-screen h-full flex items-center overflow-hidden" style="background-color: #ADD8E6">
        <div class="container mx-auto px-16 flex flex-col justify-center">
            <div class="flex h-full register-card shadow rounded border">
                <div class="w-2/5 image-cover border-transparent bg-blue-700" :style="{backgroundImage: 'url(/images/nurse.jpg)'}">
                </div>
                <div class="w-3/5 bg-white overflow-y-auto">
                    <div class="form-container flex flex-col justify-center w-full">
                        <div class="card w-full h-full rounded py-2">
                            <div class="card-header border-b border-gray-200 px-4 py-2 flex justify-between items-center">
                                <h1 class="text-lg font-bold text-gray-800 uppercase">creation de compte praticien</h1>
                                <a :href="login" class="text-blue-600">Se connecter</a>
                            </div>
                            <div class="card-main txt-sm px-4 py-4">
                                <ol class="step-indicator">
                                <li v-for='(step, index) in steps' :key="index">
                                    <div :class="{'active': step.id == currentStep, 'complete': step.id < currentStep}">
                                    <div class="step">{{ index + 1}}</div>
                                    <div class="caption hidden-xs hidden-sm">Step <span v-text="step.id"></span>: <span v-text="step.title"></span></div>
                                    </div>
                                </li>
                            </ol>

                            <div class="px-8 pt-12">
                                <InfoPerson v-show="currentStep == 1" :praticien="praticien" @can-continue="validate1"/>
                                <Specialite v-show="currentStep == 2" :praticien="praticien" @can-continue-step-2="validate2" @validate-specialite="validateSpecialite"/>
                                <Document v-show="currentStep == 3" :praticien="praticien"/>
                                <Structure v-show="currentStep == 4" :praticien="praticien" @validate-structure="validateStructure"/>
                            </div>
                            </div>
                            <div class="card-footer px-12">
                                <div class="step-wrapper" :class="stepWrapperClass">
                                    <button type="button" class="btn-primary mr-2" v-show=" !firststep" @click="lastStep" :disabled="firststep">
                                        Retour
                                    </button>
                                    <button type="button" class="mr-2 btn-primary" v-show=" !laststep" @click.prevent="nextStep" :disabled="laststep">
                                        Continuer
                                    </button>
                                    <button type="submit" class="btn-primary" v-if="laststep" @click="send">
                                        S'enregisrer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
   
</template>

<script>
    import InfoPerson from './Register/Praticien/InforPerson.vue'
    import Specialite from './Register/Praticien/Specialite.vue'
    import Document from './Register/Praticien/Document.vue'
    import Structure from './Register/Praticien/Structure.vue'
    export default {
        props:{
            login:{
                type: String
            }
        }
        ,
        components:{
            InfoPerson,
            Specialite,
            Document,
            Structure
        },
       data: () => {
            return{
            invalid1: false,
            invalid2: false,
            invalid3: false,
            invalid4: false,
            validSrtuct: false,
            valideSpec: false,
            praticien:{
                nom: '',
                prenom:'',
                sexe: '',
                lieu_residence: '',
                date_naissance: '',
                lieu_naissance: '',
                telephone: '',
                bio: '',
                email:'',
                password:'',
                password_confirmation: '',
                numero_ordre:'',
                profile_file:'',
                specialites: [],
                
            },
            currentStep: 1,
            steps:[
                {
                    id: 1,
                    title: "Informations personnelles",
                    icon_class: "fa fa-user-circle-o"
                },
                {
                    id: 2,
                    title: "Spécialité",
                    icon_class: "fa fa-th-list"
                },
                {
                    id: 3,
                    title: "Profile",
                    icon_class: "fa fa-paper-plane"
                },
                {
                    id: 4,
                    title: "Structure",
                    icon_class: "fa fa-paper-plane"
                },
                {
                    id: 5,
                    title: "Récap",
                    icon_class: "fa fa-paper-plane"
                }
            ],
            errors: [],
            }
        },
        computed:{
            active(){
            return this.steps[this.currentStep - 1].id == this.currentStep
            },
            firststep(){
            return this.currentStep == 1;
            },
            laststep(){
              return this.currentStep == this.steps.length
            },
            stepWrappperClass(){
            return{
                active: this.active
            }
            },
            indicatorclass(){
            return{
                active: this.steps[this.currentStep - 1].id == this.currentStep,
                complete: this.currentStep > this.steps[this.currentStep - 1].id
            }
            },
            stepWrapperClass(){
            return{
                active: this.active
            }
            }
        },
        methods:{
            nextStep(){
                if(this.currentStep == 1){
                   if(this.invalid1){
                       this.notify('Vous devez remplir tous champs marqués par (*) avant de continuer', 'error')
                       console.log(this.invalid1)
                       return false
                   }
                   else{
                       this.currentStep += 1
                   }
                }
                
                if(this.currentStep == 2){
                     
                     if(this.invalid2 == false && this.valideSpec){
                         this.currentStep += 1
                     }
                     else{
                         return false;
                     }
                }
                if(this.currentStep == 3){

                     if(this.praticien.profile_file == '' ||  this.praticien.profile_file == null){
                         return false
                     }
                     
                    this.currentStep += 1
                }
                if(this.currentStep == 4){
                    this.currentStep += 1
                }
            }, 
            lastStep(){
                console.log('current-step:'+ this.currentStep)
                this.currentStep -= 1;
                console.log('prev-step:' + this.currentStep)
            },
            validate1(value){
                 this.invalid1 = value.invalid
            },
            validate2(value){
               this.invalid2 = value.invalid
            },
            validate4(value){
               this.invalid4 = value.invalid
            },
            validateSpecialite(value){
                this.valideSpec = value
            },
        
            send(){
                if(this.praticien != {}){
                    axios.post('/praticien/register', {
                        praticien: this.praticien
                    })
                    .then((response) => {
                     console.log(response.data)
                       if(response.data.success == 1){
                           window.location.href = '/praticien/register/success'
                       }
                       else{
                           this.notify('Erreur interne du serveur', 'error')
                       }
                    })
                    .catch((error) => {
                       if(error.status == 422){
                            let errors = Object.values(error.response.data.errors)
                            errors = errors.flat()
                            errors.forEach(error => {
                                this.notify(error, 'error')
                            })
                       }
                    })
                }
            },
            notify(message, title){
                this.$toast.error({
                    title:'Error',
                    message: message,
                    closeButton: true,
                    progressBar: true,
                    position: 'top right',
                    timeOut: '10000'
                })
            }
        }
    }
</script>
<style lang="scss">
$wizard-color-neutral: #ccc !default;
$wizard-color-active: #4183D7 !default;
$wizard-color-complete: #87D37C !default;
$wizard-step-width-height: 55px !default;
$wizard-step-font-size: 18px !default;
@import 'https://fonts.googleapis.com/css?family=Roboto';
body {
    padding: 0;
    margin: 0;
    background-color: #fff;
    font-family: 'Roboto', sans-serif;
}
.step-wrapper {
    padding: 20px 0;
    display: none;
    
    &.active {
        display: block;
    }
}
.step-indicator {
    border-collapse: separate;
    display: table;
    margin-left: 0px;
    position: relative;
    table-layout: fixed;
    text-align: center;
    vertical-align: middle;
    padding-left: 0;
    padding-top: 20px;
    
    li {
        display: table-cell;
        position: relative;
        float: none;
        padding: 0;
        width: 1%;
        
        &:after {
            background-color: $wizard-color-neutral;
            content: "";
            display: block;
            height: 1px;
            position: absolute;
            width: 100%;
            top: $wizard-step-width-height/2;
        }
        
        &:after {
            left: 50%;
        }
        
        &:last-child {
            &:after {
                display: none;
            }
        }
        
        
    }
    .active {
      .step {
        border-color: $wizard-color-active;
        color: $wizard-color-active;
      }
            
      .caption {
          color: $wizard-color-active;
      }
    }
    .invalid {
      .step {
        border-color: red;
        color: red
      }
            
      .caption {
          color: red;
      }
    }
    
        
    .complete {
      &:after {
        background-color: $wizard-color-complete;
      }
            
      .step {
        border-color: $wizard-color-complete;
        color: $wizard-color-complete;
      }
            
      .caption {
         color: $wizard-color-complete;
      }
    }
    .step {
        background-color: #fff;
        border-radius: 50%;
        border: 1px solid $wizard-color-neutral;
        color: $wizard-color-neutral;
        font-size: $wizard-step-font-size;
        height: $wizard-step-width-height;
        line-height: $wizard-step-width-height;
        margin: 0 auto;
        position: relative;
        width: $wizard-step-width-height;
        z-index: 1;
        
        &:hover {
            cursor: pointer;
        }
    }
    
    .caption {
        color: $wizard-color-neutral;
        padding: 11px 16px;
    }
}
  
</style>