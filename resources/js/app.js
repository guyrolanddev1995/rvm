
window.Vue = require('vue');

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


Vue.component('praticien-register', require('./components/PraticienRegister.vue').default);
Vue.component('rdv-consultation', require('./components/RdvConsultation.vue').default);
Vue.component('structure-consultations', require('./components/Structure/Consultations.vue').default);
Vue.component('structure-notifications', require('./components/Structure/Notifications').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Vuelidate from 'vuelidate'
import CxltToastr from 'cxlt-vue2-toastr'

Vue.use(CxltToastr)

import 'cxlt-vue2-toastr/dist/css/cxlt-vue2-toastr.css'

Vue.use(Vuelidate)

const app = new Vue({
    el: '#app',
});