import Vue from 'vue'

import VueRouter from 'vue-router'

Vue.use(VueRouter)

import BarangList from '../pages/master/list/BarangList.vue'
import BarangForm from '../pages/master/form/BarangForm.vue'

const routes = [
    {
        name: 'BarangList',
        path: '/barang',
        component: BarangList
    },
    {
        name: 'BarangForm',
        path: '/barang/:id?',
        component: BarangForm,
        props: true
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