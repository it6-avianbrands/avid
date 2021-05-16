<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h1>Master Barang</h1></div>
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
                                <td>{{ row.KodeBarang }}</td>
                                <td>{{ row.KodeProduk }}</td>
                                <td>{{ row.NamaBarang }}</td>
                                <td>{{ row.KodeMerk }}</td>
                                <td>{{ row.KodeJenis }}</td>
                                <td>{{ row.KodeUkuran }}</td>
                                <td>{{ row.KodeModelSatuan }}</td>
                                <td>{{ row.SatuanColi }}</td>
                                <td>{{ row.DiscGroupBarang }}</td>
                                <td>{{ row.ProdukGroup }}</td>
                                <td>
                                    <svg v-if="row.IsHadiah" class="c-icon">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-check-alt"></use>
                                    </svg>
                                    <svg v-else class="c-icon">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-x"></use>
                                    </svg>
                                </td>
                                <td>
                                    <svg v-if="row.IsBarangCabang" class="c-icon">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-check-alt"></use>
                                    </svg>
                                    <svg v-else class="c-icon">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-x"></use>
                                    </svg>
                                </td>
                                <td>
                                    <list-control :id="row.KodeBarang" :url="route.edit.name" :caption="route.edit.caption" :color="route.edit.color" :icon="route.edit.icon"></list-control>
                                    <list-control :id="row.KodeBarang" :caption="route.delete.caption" :color="route.delete.color" :icon="route.delete.icon"></list-control>
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
                        name: 'BarangForm',
                        caption: "Add",
                        color: 'btn btn-success',
                        icon: 'fas fa-plus'
                    },
                    edit: {
                        name: 'BarangForm',
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
                        name: '/excel/barang',
                        caption: "Export Excel",
                        color: 'btn btn-dark',
                        icon: 'fas fa-file-excel'
                    }
                },
                header: [
                    {
                        label: "Kode",
                        field: "KodeBarang"
                    },
                    {
                        label: "Produk",
                        field: "KodeProduk"
                    },
                    {
                        label: "Nama",
                        field: "NamaBarang"
                    },
                    {
                        label: "Merk",
                        field: "KodeMerk"
                    },
                    {
                        label: "Jenis",
                        field: "KodeJenis"
                    },
                    {
                        label: "Ukuran",
                        field: "KodeUkuran"
                    },
                    {
                        label: "Kemasan",
                        field: "KodeModelSatuan"
                    },
                    {
                        label: "Satuan Coli",
                        field: "SatuanColi"
                    },
                    {
                        label: "Diskon Group",
                        field: "DiscGroupBarang"
                    },
                    {
                        label: "Produk Group",
                        field: "ProdukGroup"
                    },
                    {
                        label: "Hadiah",
                        field: "IsHadiah"
                    },
                    {
                        label: "Barang Cabang",
                        field: "IsBarangCabang"
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
            this.getListBarang()
        },
        methods: {
            getListBarang() {
                axios.get('/api/barang').then((response) => {
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