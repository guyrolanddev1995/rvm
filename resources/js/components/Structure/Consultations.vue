<template>
    <div>
        <div class="w-full px-2 mt-20">
             <div class="border-t-4 border-purple-500">
                <div class="card-header px-4 py-2 border">
                  <h4 class="text-md text-gray-800 font-semibold"><i class="fa fa-calendar" aria-hidden="true"></i> Nouvelles demandes de consultation</h4>
                </div>
                <div class="card-body">
                  <table class="table-auto w-full border">
                    <thead class="border-b">
                      <tr>
                        <th class="px-4 py-2 text-md text-left">#</th>
                        <th class="px-4 py-2 text-md text-left">Date</th>
                        <th class="px-4 py-2 text-md text-left">Heure</th>
                        <th class="px-4 py-2 text-md text-left">Speciaite</th>
                        <th class="px-4 py-2 text-md text-left">Nom et Prenom</th>
                        <th class="px-4 py-2 text-md text-left">Motif du rdv</th>
                        <th class="px-4 py-2 text-md text-left">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                       <tr v-for="(consultation, index) in consultations" :key="consultation.id">
                          <td class="px-4 py-2 text-md">{{ index + 1 }}</td>
                          <td class="px-4 py-2 text-md">{{ consultation.date | formatDate}}</td>
                          <td class="px-4 py-2 text-md">{{ consultation.heure}} H </td>
                          <td class="px-4 py-2 text-md">{{ consultation.specialite.nom_specialite | capitalize }} </td>
                          <td class="px-4 py-2 text-md">{{ consultation.patient.nom | capitalize }} {{ consultation.patient.prenom | capitalize}}</td>
                          <td class="px-4 py-2 text-md">{{ consultation.motif | truncate}} </td>
                          <td><a href="#" class="bg-blue-400 p-1 shadow-md rounded-md text-center text-white"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                       </tr>
                    </tbody>
                  </table>
                </div>
             </div>
    </div>

    <div class="w-full px-2 mt-20">
            <div class="border-t-4 border-blue-500">
               <div class="card-header px-4 py-2 border">
                 <h4 class="text-md text-gray-800 font-semibold"><i class="fa fa-calendar" aria-hidden="true"></i> Nouvelles demandes d'examen Radiologique / Biologique</h4>
               </div>
               <div class="card-body">
                 <table class="table-auto w-full border">
                   <thead class="border-b">
                     <tr>
                       <th class="px-4 py-2 text-md text-left">#</th>
                       <th class="px-4 py-2 text-md text-left">Date</th>
                       <th class="px-4 py-2 text-md text-left">Heure</th>
                        <th class="px-4 py-2 text-md text-left">Type</th>
                       <th class="px-4 py-2 text-md text-left">Examen</th>
                       <th class="px-4 py-2 text-md text-left">Nom et Prenom</th>
                        <th class="px-4 py-2 text-md text-left">Motif</th>
                       <th class="px-4 py-2 text-md text-left">Action</th>
                     </tr>
                   </thead>
                   <tbody>
                      <tr v-for="(examen, index) in examens" :key="examen.id">
                         <td class="px-4 py-2 text-md">{{ index + 1 }}</td>
                         <td class="px-4 py-2 text-md">{{ examen.date | formatDate}}</td>
                         <td class="px-4 py-2 text-md">{{ examen.heure }} H</td>
                         <td class="px-4 py-2 text-md">Radiologie</td>
                         <td class="px-4 py-2 text-md">{{ examen.examen.nom }}</td>
                         <td class="px-4 py-2 text-md">{{ examen.patient.nom }} {{ examen.patient.prenom }}</td>
                         <td class="px-4 py-2 text-md">{{ examen.motif | truncate }}</td>
                         <td><a href="#" class="bg-blue-400 p-1 shadow-md rounded-md text-center text-white"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                      </tr>
                   </tbody>
                 </table>
               </div>
            </div>
         </div>
    </div>
</template>

<script>
import moment from 'moment'

moment.locale('fr')
export default {
  data(){
      return{
          consultations: null,
          examens: null
      }
  },
  methods:{
      getConsultations(){
        axios.get('/structure/getRecords')
          .then((response) => {
              this.consultations = response.data.consultations
              this.examens = response.data.examens
          })
      }
  },
  mounted(){
     this.getConsultations()

     setInterval(() => {
         this.getConsultations()
     }, 15000)
  },


  filters: {
      capitalize(value){
          if(!value) return ''
          value = value.toString()
          return value.charAt(0).toUpperCase() + value.slice(1)
      },

      formatDate(value){
          if(!value) return ''
          return moment(String(value)).format('DD MMM YYYY')
      },

      truncate(value){
          if(!value) return ''
          value = value.toString()
          return value.substring(0, 20) + '...'
      }
  }
}
</script>

<style>

</style>