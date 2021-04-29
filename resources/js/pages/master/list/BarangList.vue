<template>
    <div class="card">
        <div class="card-header"><h1>Master Barang</h1></div>
        <div class="card-body">
            <datatable :columns="header" :data="detail"></datatable>
        </div>
        <div class="card-footer"></div>
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
                    }
                ],
                detail: [
                    {
                        KodeBarang: "KodeBarang_1",
                        KodeProduk: "KodeProduk_1",
                        NamaBarang: "NamaBarang_1",
                        KodeMerk: "KodeMerk_1",
                        KodeJenis: "KodeJenis_1",
                        KodeUkuran: "KodeUkuran_1",
                        KodeModelSatuan: "KodeModelSatuan_1",
                        SatuanColi: "SatuanColi_1",
                        DiscGroupBarang: "DiscGroupBarang_1",
                        ProdukGroup: "ProdukGroup_1",
                        IsHadiah: true,
                        IsBarangCabang: false
                    },
                    {
                        KodeBarang: "KodeBarang_2",
                        KodeProduk: "KodeProduk_2",
                        NamaBarang: "NamaBarang_2",
                        KodeMerk: "KodeMerk_2",
                        KodeJenis: "KodeJenis_2",
                        KodeUkuran: "KodeUkuran_2",
                        KodeModelSatuan: "KodeModelSatuan_2",
                        SatuanColi: "SatuanColi_2",
                        DiscGroupBarang: "DiscGroupBarang_2",
                        ProdukGroup: "ProdukGroup_2",
                        IsHadiah: true,
                        IsBarangCabang: false
                    }
                ]
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
        }
    }
</script>