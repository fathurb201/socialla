/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import App from './App.vue';
import VueAxios from 'vue-axios';
import VueRouter from 'vue-router';
import axios from 'axios';
import { routes } from './routes';

// CSS


import '../../public/assets/css/bootstrap.css'
import '../../public/assets/css/reset.css'
import '../../public/assets/css/style.css'
import '../../public/assets/css/responsive.css'

import '../../public/assets/css/magnific-popup.min.css'
import '../../public/assets/css/font-awesome.css'
import '../../public/assets/css/jquery.fancybox.min.css'
import '../../public/assets/css/themify-icons.css'
import '../../public/assets/css/animate.css'
import '../../public/assets/css/flex-slider.min.css'
import '../../public/assets/css/owl-carousel.css'

import '../../public/assets/css/niceselect.css'
import '../../public/assets/css/slicknav.min.css'

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.use(VueRouter)
Vue.use(VueAxios, axios)

 const router = new VueRouter({
    mode: 'hash',
    routes: routes
});

const app = new Vue({
    el: '#app',
    router,
    render: h => h(App)
});
