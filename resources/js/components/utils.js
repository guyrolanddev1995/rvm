window.Vue = require('vue');

import CxltToastr from 'cxlt-vue2-toastr'

Vue.use(CxltToastr)

import 'cxlt-vue2-toastr/dist/css/cxlt-vue2-toastr.css'

function hello(message, title){
    console.log(toast)
    // this.$toast.error({
    //     title: title,
    //     message: message,
    //     closeButton: true,
    //     progressBar: true,
    //     position: 'top right',
    //     timeOut: '10000'
    // })
}


export default hello;