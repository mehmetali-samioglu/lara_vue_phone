require('./bootstrap');
window.Vue = require('vue');


import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);


let Myheader = require('./components/Myheader');
let Myfooter = require('./components/Myfooter');

let Home =  require('./components/Home');
let About = require('./components/About');


//"vue routes" sayfasından gelenler
const routes = [
    { path: '/phonebook/home', component: Home },
    { path: '/phonebook/about', component: About }
]
const router = new VueRouter({
    mode:'history', // urldeki "/#/" işaretini kaldırıyor. Ama güncelleyince boş sayfa görünüyor.web.php ile düzeltildi.
    routes // short for `routes: routes`
})




const app = new Vue({
    el: '#app',
    router,
    components:{Myheader,Myfooter}
});
