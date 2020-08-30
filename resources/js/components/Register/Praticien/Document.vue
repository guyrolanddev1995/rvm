<template>
  <div>
      <div>
        <div class="image-content">
            <h3 class="text-xl font-semibold mb-3 text-center">Sélectionner une photo de profile</h3>
            <div class="mx-auto w-48 h-48 mb-2 border rounded-full relative bg-gray-100 shadow-inset">
                <img id="preview-image" ref="preview" class="object-cover w-full h-48 rounded-full" src="/images/avatar.svg" />
            </div>
            <div class="mx-auto border w-48 py-1 mb-4 shadow-md rounded bg-white text-sm border-blue-500 relative">
                <span class="text-center text-blue-500 font-semibold  w-full h-full absolute z-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-flex flex-shrink-0 w-6 h-6 -mt-1 mr-1" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                <path d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                                <circle cx="12" cy="13" r="3" />
                    </svg>	
                    Cliquer ici
                </span>
                <input type="file" name="photo" ref="file" id="photo" class="w-full h-full z-20 opacity-0" @change="previewImage()">
            </div>
            <button class="p-2 bg-blue-500 block mx-auto rounded shadow mt-10 text-white text-center" v-if="file != ''" @click="uploadFile()">Télécharger</button>
        </div>
      </div>
  </div>
</template>

<script>
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
export default {
    props:{
          praticien:{
              type: Object,
              required: true
          },
      },

    components: {
        vueDropzone: vue2Dropzone
    },
    data: function () {
        return {
            file: '',
            documentsOptions: {
                url: '/praticien/uploadDocs',
                maxFilesize: 10,
                thumbnailWidth: 150,
                headers:{
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            },
            
        }
     },

     methods:{
       previewImage(){
         let preview = this.$refs.preview
         let file = this.$refs.file.files[0]
         if(file){
           this.file = file;
           let reader = new FileReader()
           reader.onload = () => {
             preview.src = reader.result
           }

           reader.readAsDataURL(file)
         }
       }
       ,

       uploadFile(){
         let formData = new FormData()
         formData.append('photo', this.file)
         axios.post('/praticien/uploadImage' , formData, {
           header:{
             'Content-Type': 'multipart/form-data'
           }
         }).then((response) => {
           if(response.data.success == 1){
                this.$toast.success({
                    title:'success',
                    message: 'Photo téléchargée avec succèss',
                    closeButton: true,
                    progressBar: true,
                    position: 'top right',
                    timeOut: '10000'
                })
                this.praticien.profile_file = response.data.name
                console.log(this.praticien.profile_file)
           }
           else{
              this.$toast.error({
                      title:'error',
                      message: 'Erreur interne du serveur',
                      closeButton: true,
                      progressBar: true,
                      position: 'top right',
                      timeOut: '10000'
              })
           }
         })
       }
     }
}
</script>

<style>
.dropzone-custom-content {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

.dropzone-custom-title {
  margin-top: 0;
}

.subtitle {
  color: #314b5f;
}

.vue-dropzone{
    position: relative;
}
</style>