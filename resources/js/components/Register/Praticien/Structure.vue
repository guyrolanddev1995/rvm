<template>
 <div class="mb-6">
        <div class="flex w-2/3 mb-16">
            <input type="checkbox" class="w-64 mt-2" v-model="praticien.conseil_medical">
            <span class=" ml-3 text-gray-800">
                Conseil médical en ligne. Cette option
                donne droit à l’usager d’avoir un conseil médical avec le praticien qui
                sera payant. Elle donne également droit à tout praticien de bénéficier d’un
                appui au diagnostique et à la prise en charge gratuitement
            </span>
        </div>

        <div class="flex w-2/3 mb-6">
            <input type="checkbox" class="w-64 mt-2" v-model="praticien.suivie_patient">
            <span class=" ml-3 text-gray-800">
                Le suivi de patient, permets à un patient de bénéficier
                pendant son séjour à l’hôpital de l’accompagnement d’un professionnel
                de santé faisant office de médecin conseil pour faciliterles interactions
                avec le système
            </span>
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