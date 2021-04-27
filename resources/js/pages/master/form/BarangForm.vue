<template>
    <div class="card">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="card-header"><h1>Add/Edit Barang</h1></div>
            <div class="card-body">
                <div v-for="formRow in formHTML" class="form-group row">
                    <template v-for="form in formRow">
                        <template v-if="form.template == 'regular'">
                            <form-regular :size="form.size" :id="form.name" :type="form.type" :label="form.label" :required="form.required"></form-regular>
                        </template>
                        <template v-else-if="form.template == 'help'">
                            <form-help :size="form.size" :id="form.name" :label="form.label" :required="form.required"></form-help>
                        </template>
                        <template v-else>
                            <form-check :size="form.size" :id="form.name" :label="form.label"></form-check>
                        </template>
                    </template>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" type="submit" @click.prevent="handleSubmit"> Submit</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                formHTML: [
                    [
                        {
                            template: "regular",
                            type: "text",
                            name: "KodeBarang",
                            label: "Kode",
                            required: "required",
                            size: 6
                        },
                        {
                            template: "help",
                            type: "text",
                            name: "KodeProduk",
                            label: "Produk",
                            required: "required",
                            size: 6
                        }
                    ],
                    [
                        {
                            template: "regular",
                            type: "text",
                            name: "NamaBarang",
                            label: "Nama",
                            required: "required",
                            size: 12
                        }
                    ],
                    [
                        {
                            template: "regular",
                            type: "text",
                            name: "Keterangan",
                            label: "Keterangan",
                            required: "",
                            size: 12
                        }
                    ],
                    [
                        {
                            template: "help",
                            type: "text",
                            name: "KodeWarna",
                            label: "Warna",
                            required: "required",
                            size: 6
                        },
                        {
                            template: "regular",
                            type: "text",
                            name: "Barcode",
                            label: "Barcode",
                            required: "",
                            size: 6
                        }
                    ],
                    [
                        {
                            template: "help",
                            type: "text",
                            name: "KodeMerk",
                            label: "Merk",
                            required: "required",
                            size: 6
                        },
                        {
                            template: "help",
                            type: "text",
                            name: "KodeJenis",
                            label: "Jenis",
                            required: "required",
                            size: 6
                        }
                    ],
                    [
                        {
                            template: "help",
                            type: "text",
                            name: "KodeUkuran",
                            label: "Ukuran",
                            required: "required",
                            size: 6
                        },
                        {
                            template: "help",
                            type: "text",
                            name: "KodeModelSatuan",
                            label: "Kemasan",
                            required: "required",
                            size: 6
                        }
                    ],
                    [
                        {
                            template: "help",
                            type: "text",
                            name: "KodeSatuan",
                            label: "Satuan",
                            required: "required",
                            size: 3
                        },
                        {
                            template: "regular",
                            type: "number",
                            name: "QtySatuan",
                            label: "Quantity",
                            required: "",
                            size: 3
                        },
                        {
                            template: "regular",
                            type: "number",
                            name: "BeratSatuan",
                            label: "Berat",
                            required: "",
                            size: 3
                        },
                        {
                            template: "regular",
                            type: "number",
                            name: "QtyColi",
                            label: "Qty Coli",
                            required: "",
                            size: 3
                        }
                    ],
                    [
                        {
                            template: "help",
                            type: "text",
                            name: "SatuanColi",
                            label: "Satuan Coli",
                            required: "required",
                            size: 4
                        },
                        {
                            template: "help",
                            type: "text",
                            name: "DiscGroupBarang",
                            label: "Diskon Group",
                            required: "required",
                            size: 4
                        },
                        {
                            template: "help",
                            type: "text",
                            name: "ProdukGroup",
                            label: "Produk Group",
                            required: "required",
                            size: 4
                        }
                    ],
                    [
                        {
                            template: "regular",
                            type: "text",
                            name: "Group1",
                            label: "Group 1",
                            required: "required",
                            size: 3
                        },
                        {
                            template: "regular",
                            type: "text",
                            name: "Group2",
                            label: "Group 2",
                            required: "required",
                            size: 3
                        },
                        {
                            template: "regular",
                            type: "text",
                            name: "Group3",
                            label: "Group 3",
                            required: "required",
                            size: 3
                        },
                        {
                            template: "regular",
                            type: "text",
                            name: "Group4",
                            label: "Group 4",
                            required: "required",
                            size: 3
                        },
                        {
                            template: "regular",
                            type: "text",
                            name: "GroupA",
                            label: "Group A",
                            required: "required",
                            size: 2
                        },
                        {
                            template: "regular",
                            type: "text",
                            name: "GroupB",
                            label: "Group B",
                            required: "required",
                            size: 2
                        },
                        {
                            template: "regular",
                            type: "text",
                            name: "GroupC",
                            label: "Group C",
                            required: "required",
                            size: 2
                        },
                        {
                            template: "regular",
                            type: "text",
                            name: "GroupD",
                            label: "Group D",
                            required: "required",
                            size: 2
                        },
                        {
                            template: "regular",
                            type: "text",
                            name: "GroupDX",
                            label: "Group DX",
                            required: "required",
                            size: 4
                        }
                    ],
                    [
                        {
                            template: "check",
                            type: "",
                            name: "IsHadiah",
                            label: "Hadiah",
                            required: "",
                            size: 6
                        },
                        {
                            template: "check",
                            type: "",
                            name: "IsBarangCabang",
                            label: "Barang Cabang",
                            required: "",
                            size: 6
                        }
                    ]
                ],
                formData: {
                    KodeBarang: "testKodeBarang",
                    KodeProduk: "testKodeProduk",
                    NamaBarang: "testNamaBarang",
                    Keterangan: "testKeterangan",
                    KodeWarna: "testKodeWarna",
                    Barcode: "testBarcode",
                    KodeMerk: "testKodeMerk",
                    KodeJenis: "testKodeJenis",
                    KodeUkuran: "testKodeUkuran",
                    KodeModelSatuan: "testKodeModelSatuan",
                    KodeSatuan: "testKodeSatuan",
                    QtySatuan: "0",
                    BeratSatuan: "0",
                    QtyColi: "0",
                    SatuanColi: "testSatuanColi",
                    DiscGroupBarang: "testDiscGroupBarang",
                    ProdukGroup: "testProdukGroup",
                    Group1: "testGroup1",
                    Group2: "testGroup2",
                    Group3: "testGroup3",
                    Group4: "testGroup4",
                    GroupA: "testGroupA",
                    GroupB: "testGroupB",
                    GroupC: "testGroupC",
                    GroupD: "testGroupD",
                    GroupDX: "testGroupDX",
                    IsHadiah: 1,
                    IsBarangCabang: 1
                }
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            handleSubmit() {
                console.log(this.$data.formData)
            }
        }
    }
</script>