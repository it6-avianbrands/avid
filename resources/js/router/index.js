import Vue from 'vue'

import VueRouter from 'vue-router'

Vue.use(VueRouter)

import BarangList from '../pages/master/list/BarangList.vue'
import BarangForm from '../pages/master/form/BarangForm.vue'
import ProdukList from '../pages/master/list/ProdukList.vue'
import ProdukForm from '../pages/master/form/ProdukForm.vue'
import MerkList from '../pages/master/list/MerkList.vue'
import MerkForm from '../pages/master/form/MerkForm.vue'
import JenisList from '../pages/master/list/JenisList.vue'
import JenisForm from '../pages/master/form/JenisForm.vue'
import UkuranList from '../pages/master/list/UkuranList.vue'
import UkuranForm from '../pages/master/form/UkuranForm.vue'

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
    },
    {
        name: 'MerkList',
        path: '/merk',
        component: MerkList
    },
    {
        name: 'MerkForm',
        path: '/merk/form/:id?',
        component: MerkForm,
        props: true
    },
    {
        name: 'JenisList',
        path: '/jenis',
        component: JenisList
    },
    {
        name: 'JenisForm',
        path: '/jenis/form/:id?',
        component: JenisForm,
        props: true
    },
    {
        name: 'UkuranList',
        path: '/ukuran',
        component: UkuranList
    },
    {
        name: 'UkuranForm',
        path: '/ukuran/form/:id?',
        component: UkuranForm,
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