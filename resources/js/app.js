/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Toasted from 'vue-toasted';

require('./bootstrap');;
import vue from 'vue';
window.Vue = vue;

import App from './components/App.vue';

//Importando axios
import VueAxios from 'vue-axios';
import axios from 'axios';

//Importando y configurando el vue-router

import VueRouter from 'vue-router';
import { routes } from './routes.js';

Vue.use(routes);
Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(Toasted, {
    duration: 3000
});

axios.defaults.baseUrl='http://127.0.0.1:8000/';
var token= localStorage.getItem('token');
if(token){
    axios.defaults.headers.common['Authorization'] = 'Bearer' + token;
}
const router = new VueRouter({
    mode :'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    router:router,
    render: h => h(App)
});

