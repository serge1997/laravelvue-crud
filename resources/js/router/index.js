import { createRouter, createWebHistory } from 'vue-router';
import Login from '../components/Login.vue'
import Dashboard from '../components/Dashboard.vue'
import Profil from '../components/Profil.vue'
import Register from '../components/Register.vue'
import Edit from '../components/Edit.vue'

const routes = [
    {
        path: '/',
        name: 'Login',
        component: Login,
        meta: {guest: true}
    },
    {
        path: '/profil',
        name: 'Profil',
        component: Profil,
        meta: {requiresAuth: true}
    },
    {
        path: '/dashboard',
        name: 'Dashboard',
        component: Dashboard,
        meta: {requiresAuth: true}
    },

    {
        path: '/register',
        name: 'Register',
        component: Register,
        meta: {requiresAuth: true}
    },
    {
        path: '/edit/:id',
        name: 'Edit',
        component: Edit,
        meta: {requiresAuth: true}
    }
]


const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router