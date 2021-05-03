<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h1>Master Barang</h1></div>
                <div class="card-body">
                    <router-link class="btn btn-sm btn-primary" :to="route.add">Add</router-link>
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
                                    <list-control :id="row.KodeBarang"></list-control>
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
    export default {
        data() {
            return {
                route: {
                    add: {
                        name: 'BarangForm'
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
            this.getListBarang()
        },
        methods: {
            getListBarang() {
                axios.get('/api/barang').then((response) => {
                    console.log(response.data)
                    this.detail = response.data
                })
            },
            openFormEdit(e) {
                alert(e)
            },
            selected(crumb) {
                console.log(crumb)
            }
        }
    }
</script>