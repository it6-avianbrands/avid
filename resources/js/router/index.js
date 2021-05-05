import Vue from 'vue'

import VueRouter from 'vue-router'

Vue.use(VueRouter)

import BarangList from '../pages/master/list/BarangList.vue'
import BarangForm from '../pages/master/form/BarangForm.vue'

import ProdukList from '../pages/master/list/ProdukList.vue'
import ProdukForm from '../pages/master/form/ProdukForm.vue'

const routes = [
    {
        name: 'BarangList',
        path: '/barang',
        component: BarangList
    },
    {
        name: 'BarangForm',
        path: '/barang/form/:id?',
        component: BarangForm,
        props: true
    },
    {
        name: 'ProdukList',
        path: '/produk',
        component: ProdukList
    },
    {
        name: 'ProdukForm',
        path: '/produk/form/:id?',
        component: ProdukForm,
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