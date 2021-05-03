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
                    sortAsc:  '<svg v-if="row.IsHadiah" class="c-icon"><use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-sort-ascending"></use></svg>',
                    sortDesc: '<svg v-if="row.IsHadiah" class="c-icon"><use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-sort-descending"></use></svg>',
                    sortNone: '<svg v-if="row.IsHadiah" class="c-icon"><use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-sort-ascending"></use></svg>',
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

Vue.component('page-header', require('./components/Header.vue').default);
Vue.component('page-footer', require('./components/Footer.vue').default);
Vue.component('page-sidebar', require('./components/Sidebar.vue').default);

Vue.component('form-regular', require('./components/FormRegular.vue').default);
Vue.component('form-help', require('./components/FormHelp.vue').default);
Vue.component('form-check', require('./components/FormCheck.vue').default);
Vue.component('list-control', require('./components/ListControl.vue').default);
Vue.component('breadcrumbs', require('./components/Breadcrumbs.vue').default);

Vue.component('barang-list', require('./pages/master/list/BarangList.vue').default);
Vue.component('barang-form', require('./pages/master/form/BarangForm.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
