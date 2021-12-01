import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'


Vue.use(Vuex)

const baseURL = process.env.MIX_API_URL


export default new Vuex.Store({
    // state
    state: {
        user: '',
        uploads: ''
    },

    mutations: {
        LOGIN(state, user){
            state.user = user
        },
        LOAD_UPLOADS(state, uploads){
            state.uploads = uploads
        }
    },

    actions: {
        async login({commit}, data){
            // Make sure its a valid SPA making api calls
            await axios.get('sanctum/csrf-cookie')

            let response = await axios.post(`${baseURL}/auth/login`, data)

            commit('LOGIN', response.data)

            return response
        },

        async register({commit}, data) {
            // 
            let response = await axios.post(`${baseURL}/auth/register`, data)
        },

        // Upload the excel file for storage
        async upload({commit}, data) {
            // 
            let response = await axios.post(`${baseURL}/uploads`, data)
        },

        async fetchUploads({commit}){
            // Get uploads
            let response = await axios.get(`${baseURL}/uploads`)

            // 
            commit('LOAD_UPLOADS', response.data)
        }
    }
})