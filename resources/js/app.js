/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import router from "./routes.js";
window.Vue = require('vue');

//custome imports
// Import Bootstrap and BootstrapVue CSS files (order is important)
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
require("./store/subscriber");

import store from "./store";
import axios from "axios";


axios.defaults.baseURL = "http://localhost:8000/api/";
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('example-component', require('./components/HomeComponent.vue').default);

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//Vue.component('example-component', require('./components/UploadFile2.vue').default);
//Vue.component('example-component', require('./components/Test.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

store.dispatch("auth/attempt", localStorage.getItem("token")).then(() => {
    const app = new Vue({
        el: "#app",
        router,
        store,
    });
});
