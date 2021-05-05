<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h1>Master Produk</h1></div>
                <div class="card-body">
                    <router-link class="btn btn-sm btn-primary" :to="route.add">Add</router-link>
                    <datatable :columns="header" :data="detail">
                        <template slot-scope="{row, columns}">
                            <tr>
                                <td>{{ row.KodeProduk }}</td>
                                <td>{{ row.InisialProduk }}</td>
                                <td>{{ row.KeteranganProduk }}</td>
                                <td>
                                    <list-control :id="row.KodeProduk" :url="route.edit.name"></list-control>
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
                        name: 'ProdukForm'
                    },
                    edit: {
                        name: 'ProdukForm'
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
            this.getListProduk()
        },
        methods: {
            getListProduk() {
                axios.get('/api/produk').then((response) => {
                    console.log(response.data)
                    this.detail = response.data
                })
            },
            selected(crumb) {
                console.log(crumb)
            }
        }
    }
</script>