<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h1>Master Barang</h1></div>
                <div class="card-body">
                    <datatable :columns="header" :data="detail"></datatable>
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
                    /*{
                        label: "Action",
                        representedAs: ({KodeBarang}) => "<button class='btn btn-primary' id='" + KodeBarang + "' @click='openFormEdit'>Edit</button>",
                        interpolate: true
                    }*/
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
            }
        }
    }
</script>