import Vue from 'vue'

import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Barang from '../pages/master/Barang.vue'
import Customer from '../pages/master/Customer.vue'

const routes = [
    {
        name: 'Barang',
        path: '/barang',
        component: Barang
    },
    {
        name: 'Customer',
        path: '/customer',
        component: Customer
    }
    /*{
        path: '*',
        component: NotFound
    }*/

]

const router = new VueRouter({
    mode: 'history',
    routes
})

export default router