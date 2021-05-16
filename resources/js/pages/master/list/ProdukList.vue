<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h1>Master Produk</h1></div>
                <div class="card-body">
                    <section class="mb-3">
                        <router-link :class="route.add.color" :to="route.add" tag="button">
                            <span v-text="route.add.caption" class="pr-1"></span>
                            <i :class="route.add.icon"></i>
                        </router-link>
                        <a :class="route.excel.color" :href="route.excel.name">
                            <span v-text="route.excel.caption" class="pr-1"></span>
                            <i :class="route.excel.icon"></i>
                        </a>
                    </section>
                    <datatable :columns="header" :data="detail">
                        <template slot-scope="{row, columns}">
                            <tr>
                                <td>{{ row.KodeProduk }}</td>
                                <td>{{ row.InisialProduk }}</td>
                                <td>{{ row.KeteranganProduk }}</td>
                                <td>
                                    <list-control :id="row.KodeProduk" :url="route.edit.name" :caption="route.edit.caption" :color="route.edit.color" :icon="route.edit.icon"></list-control>
                                    <list-control :id="row.KodeProduk" :caption="route.delete.caption" :color="route.delete.color" :icon="route.delete.icon"></list-control>
                                </td>
                            </tr>
                        </template>
                    </datatable>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</template>

<script>
    import EventBus from '../../../bus'

    export default {
        data() {
            return {
                route: {
                    add: {
                        name: 'ProdukForm',
                        caption: "Add",
                        color: 'btn btn-success',
                        icon: 'fas fa-plus'
                    },
                    edit: {
                        name: 'ProdukForm',
                        caption: "Edit",
                        color: 'btn btn-primary',
                        icon: 'fas fa-edit'
                    },
                    delete: {
                        caption: "Delete",
                        color: 'btn btn-danger',
                        icon: 'fas fa-trash'
                    },
                    excel: {
                        name: '/excel/produk',
                        caption: "Export Excel",
                        color: 'btn btn-dark',
                        icon: 'fas fa-file-excel'
                    }
                },
                header: [
                    {
                        label: "Kode",
                        field: "KodeProduk"
                    },
                    {
                        label: "Inisial",
                        field: "InisialProduk"
                    },
                    {
                        label: "Keterangan",
                        field: "KeteranganProduk"
                    },
                    {
                        label: "Action"
                    }
                ],
                detail: []
            }
        },
        mounted() {
            this.getCurrentRoute()
            this.getListProduk()
        },
        methods: {
            getListProduk() {
                axios.get('/api/produk').then((response) => {
                    console.log(response.data)
                    this.detail = response.data
                })
            },
            getCurrentRoute() {
                EventBus.$emit('route', this.$router.currentRoute.meta.breadcrumbs)
            }
        }
    }
</script>