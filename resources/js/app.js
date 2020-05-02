/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import swal from 'sweetalert2';
window.swal = swal;

const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', swal.stopTimer)
        toast.addEventListener('mouseleave', swal.resumeTimer)
    }
});
window.toast = toast;


// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('choose-product-component', require('./components/chooseProductComponent.vue').default);
Vue.component('register-product-component', require('./components/registerProductComponent').default);
Vue.component('change-user-component', require('./components/changeUserComponent').default);
Vue.component('subjects-component', require('./components/subjectsComponent').default);
Vue.component('students-component', require('./components/studentsComponent').default);
Vue.component('profile-component', require('./components/profileComponent').default);
Vue.component('user-subjects', require('./components/userSubjects').default);
Vue.component('change-orders-component', require('./components/changeOrdersComponent').default);



const app = new Vue({
    el: '#app',
});
