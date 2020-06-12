<template>
  <div>
      <div>
        
          <vue-dropzone 
            ref="myVueDropzone" 
            id="dropzone" 
            :options="dropzoneOptions" 
            :useCustomSlot=true
            @vdropzone-success="uploadedImage"
            @vdropzone-removed-file="removedImage">
                    <div class="dropzone-custom-content">
                        <h3 class="dropzone-custom-title text-2xl font-semibold text-blue-500">Déposer votre photo ici</h3>
                    </div>
         </vue-dropzone>
      </div>

     <div class="mt-10">
         <vue-dropzone 
            ref="myVueDropzone" 
            id="photo_identite" 
            :options="documentsOptions" 
            :useCustomSlot=true>
                    <div class="dropzone-custom-content">
                        <h3 class="dropzone-custom-title text-2xl font-semibold text-blue-500">Déposer votre pièce d'identité ou autre document ici</h3>
                    </div>
        </vue-dropzone>
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
            dropzoneOptions: {
                url: '/praticien/uploadImage',
                thumbnailWidth: 150,
                maxFilesize: 2,
                addRemoveLinks: true,
                acceptedFiles: 'images/jpg,image/png,image/gif,image/jpeg',
                maxFiles: 1,
                headers:{
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

               
            },
            documentsOptions: {
                url: '/uploadFile',
                thumbnailWidth: 150,
                maxFilesize: 10,
                thumbnailWidth: 150,
                maxFilesize: 10,
                headers:{
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            },
            
        }
     },

     methods:{
       uploadedImage(file, response){
         this.praticien.profile_file = response.name
         console.log(this.praticien.profile_file)
       },

       removedImage(file, error, xhr){
         this.praticien.profile_file = ''
         console.log(this.praticien.profile_file)
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