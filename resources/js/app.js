/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
//window.Vue = require('vue').default;

import router from './router'

import { VuejsDatatableFactory } from 'vuejs-datatable'

Vue.use(VuejsDatatableFactory)

VuejsDatatableFactory
    .registerTableType('datatable', tableType => tableType.mergeSettings({
            table: {
                class: 'table table-responsive-sm table-bordered table-striped table-sm',
                sorting: {
                    sortAsc:  '<i class="c-icon c-icon-2xl mt-5 mb-2 cil-sort-ascending" title="Sort ascending"></i>',
                    sortDesc: '<i class="c-icon c-icon-2xl mt-5 mb-2 cil-sort-descending" title="Sort descending"></i>',
                    sortNone: '<i class="c-icon c-icon-2xl mt-5 mb-2 cil-sort-ascending" title="Sort"></i>',
                },
            }
        })
    );
//import datatables from './datatables'

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('form-regular', require('./components/FormRegular.vue').default);
Vue.component('form-help', require('./components/FormHelp.vue').default);
Vue.component('form-check', require('./components/FormCheck.vue').default);

Vue.component('barang-page', require('./pages/master/Barang.vue').default);
Vue.component('barang-list', require('./pages/master/list/BarangList.vue').default);
Vue.component('barang-form', require('./pages/master/form/BarangForm.vue').default);

Vue.component('customer-page', require('./pages/master/Customer.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
