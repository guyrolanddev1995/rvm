<template>
  <div class="notifications flex justify-evenly">
            <div class="card px-2 w-1/4 py-2 shadow-md mx-2 bg-white flex border-t-4 border-purple-400 rounded-sm">
               <div class="h-full"><img src="/images/calendar.svg" alt="" width="120px" height="120px"></div>
               <div class="w-full text-right">
                 <span class="text-5xl font-bold text-gray-700">{{ unreadConsultations }}</span>
                 <p class="text-sm">Nouvelle Demande de consultation</p>
               </div>
            </div>
            <div class="card px-2 w-1/4 py-2 shadow-md mx-2 bg-white flex border-t-4 border-red-300 rounded-sm">
                <div class="h-full"><img src='/images/medical-appointment.svg' alt="" width="120px" height="120px"></div>
                <div class="w-full text-right">
                  <span class="text-5xl font-bold text-gray-700">{{ readConsultations }}</span>
                  <p class="text-sm">Demande de consultation confirmée</p>
                </div>
            </div>
            <div class="card px-2 w-1/4 py-2 shadow-md bg-white mx-2 flex border-t-4 border-blue-500 rounded-sm">
                <div class="h-full"><img src="/images/homework.svg" alt="" width="120px" height="120px"></div>
                <div class="w-full text-right">
                  <span class="text-5xl font-bold text-gray-700">{{ unreadExamens }}</span>
                  <p class="text-sm">Nouvelle Demande d'examen</p>
                </div>
             </div>
             <div class="card px-2 w-1/4 py-2 shadow-md mx-2 bg-white flex border-t-4 border-red-500 rounded-sm">
                <div class="h-full"><img src='/images/calendar (1).svg' alt="" width="120px" height="120px"></div>
                <div class="w-full text-right">
                  <span class="text-5xl font-bold text-gray-700">{{ readExamens }}</span>
                  <p class="text-sm">Demande d'examen confirmée</p>
                </div>
             </div>
        </div>
</template>

<script>
export default {
    data(){
      return{
        unreadConsultations: 0,
        readConsultations: 0,
        unreadExamens: 0,
        readExamens: 0
      }
    },

    methods:{
      getConsultations(){
        axios.get('/structure/consultationsNotification')
           .then((response) => {
             this.unreadConsultations = response.data.unreadConsultations
             this.readConsultations = response.data.readConsultations
             this.unreadExamens = response.data.unreadExamens,
             this.readExamens = response.data.readExamens
           })
      }
    },

    mounted(){
       this.getConsultations()
        setInterval(() => {
         this.getConsultations()
     }, 5000)
    }
}
</script>

<style>

</style>