require('./bootstrap');
import Vue from 'vue'
import Vuex from 'vuex'
import VueRouter from 'vue-router';
import router from './routes'
import store from './store'


Vue.use(Vuex)
Vue.use(VueRouter)

import App from './components/AppComponent'

const app = new Vue({
    el: '#app',
    components: {App},
    router,
    store
})