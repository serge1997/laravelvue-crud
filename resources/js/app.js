
import './bootstrap';
import { createApp } from 'vue';
import App from './App.vue';
import router from './router/index'
import Toaster from '@meforma/vue-toaster'
import VueSweetalert2 from 'vue-sweetalert2'
import 'sweetalert2/dist/sweetalert2.min.css'

const options = {
    confirmButtonColor: '#777'
}

function loggedIn(){
    return localStorage.getItem('token')
    //return false
}

router.beforeEach((to, from, next) => {
    // instead of having to check every route record with
    // to.matched.some(record => record.meta.requiresAuth)
    if (to.matched.some(record => record.meta.requiresAuth)) {
      if (!loggedIn()){
        next({
            path:'/',
            query: { redirect: to.fullPath },
        })

      }else{
        next()
      }
    }else if(to.matched.some(record => record.meta.guest)) {
        if (loggedIn()){
            next({
                path:'/dashboard',
                query: { redirect: to.fullPath },
            })
    
          }else{
            next()
          }
        
    }else{
        next()
    }
  })
  
createApp(App).use(router).use(Toaster, {position: 'top'}).use(VueSweetalert2, options).mount('#app')



 
