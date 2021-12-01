import Router from 'vue-router'
import Upload from './components/Upload/UploadComponent'
import Uploads from './components/Upload/UploadsComponent'
import Register from './components/Auth/RegisterComponent'
import Login from './components/Auth/LoginComponent'
import Home from './components/HomeComponent'
import Lost from './components/LostComponent'

import store from './store'

let router = new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: Home,
            name: 'home'
        },
        {
            path: '/upload',
            component: Upload,
            name: 'upload',
            meta: {
                requiresAuth: true,
            }
        },
        {
            path: '/uploads',
            component: Uploads,
            name: 'uploads',
            meta: {
                requiresAuth: true,
            }
        },
        {
            path: '/login',
            component: Login,
            name: 'login'
        },
        {
            path: '/register',
            component: Register,
            name: 'register'
        },
        {
            path: '*',
            component: Lost,
            name: 'Lost'
        }
    ]
})

// Check is logged in
function isLoggedIn(){
    let loggedIn = store.state.user

    return !Object.keys(loggedIn).length == 0
}


// Handle authentication
router.beforeEach((to, from, next) =>{
    const url = to.path

    console.log(url)
    // check if user is authenticated
    if( to.matched.some(record => record.meta.requiresAuth) && !isLoggedIn()) next({name: 'login', query: {from: to}})
    // Proceed to route
    else next()
  
})

export default router