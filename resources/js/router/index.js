import Vue from 'vue'

import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Dashboard from '../pages/Dashboard.vue'
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
        name: 'Dashboard',
        path: '/',
        component: Dashboard,
        meta: {
            breadcrumbs: [
                { name: "Home" }
            ]
        }
    },
    {
        name: 'BarangList',
        path: '/barang',
        component: BarangList,
        meta: {
            breadcrumbs: [
                { name: "Home", link: "/" },
                { name: "Master Barang" }
            ]
        }
    },
    {
        name: 'BarangForm',
        path: '/barang/form/:id?',
        component: BarangForm,
        props: true,
        meta: {
            breadcrumbs: [
                { name: "Home", link: "/" },
                { name: "Master Barang", link: "/barang" },
                { name: "Form Barang" }
            ]
        }
    },
    {
        name: 'ProdukList',
        path: '/produk',
        component: ProdukList,
        meta: {
            breadcrumbs: [
                { name: "Home", link: "/" },
                { name: "Master Produk" }
            ]
        }
    },
    {
        name: 'ProdukForm',
        path: '/produk/form/:id?',
        component: ProdukForm,
        props: true,
        meta: {
            breadcrumbs: [
                { name: "Home", link: "/" },
                { name: "Master Produk", link: "/produk" },
                { name: "Form Produk" }
            ]
        }
    },
    {
        name: 'MerkList',
        path: '/merk',
        component: MerkList,
        meta: {
            breadcrumbs: [
                { name: "Home", link: "/" },
                { name: "Master Merk" }
            ]
        }
    },
    {
        name: 'MerkForm',
        path: '/merk/form/:id?',
        component: MerkForm,
        props: true,
        meta: {
            breadcrumbs: [
                { name: "Home", link: "/" },
                { name: "Master Merk", link: "/merk" },
                { name: "Form Merk" }
            ]
        }
    },
    {
        name: 'JenisList',
        path: '/jenis',
        component: JenisList,
        meta: {
            breadcrumbs: [
                { name: "Home", link: "/" },
                { name: "Master Jenis" }
            ]
        }
    },
    {
        name: 'JenisForm',
        path: '/jenis/form/:id?',
        component: JenisForm,
        props: true,
        meta: {
            breadcrumbs: [
                { name: "Home", link: "/" },
                { name: "Master Jenis", link: "/jenis" },
                { name: "Form Jenis" }
            ]
        }
    },
    {
        name: 'UkuranList',
        path: '/ukuran',
        component: UkuranList,
        meta: {
            breadcrumbs: [
                { name: "Home", link: "/" },
                { name: "Master Ukuran" }
            ]
        }
    },
    {
        name: 'UkuranForm',
        path: '/ukuran/form/:id?',
        component: UkuranForm,
        props: true,
        meta: {
            breadcrumbs: [
                { name: "Home", link: "/" },
                { name: "Master Ukuran", link: "/ukuran" },
                { name: "Form Ukuran" }
            ]
        }
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