<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form id="BarangForm" action="" :method="this.id ? 'put' : 'post'" enctype="multipart/form-data">
                    <div class="card-header"><h1>{{ this.id ? "Edit" : "Add" }} Barang</h1></div>
                    <!--CSRF Token-->
                    <slot></slot>
                    <div class="card-body">
                        <router-link class="btn btn-sm btn-primary" :to="route.master">Back</router-link>
                        <div v-for="formRow in formHTML" class="form-group row">
                            <template v-for="form in formRow">
                                <template v-if="form.template == 'regular'">
                                    <form-regular :size="form.size" :id="form.name" :type="form.type" :label="form.label" :required="form.required" :value="formData[form.name]" :disabled="form.primary && id" @input="setValue(form.name, $event)"></form-regular>
                                </template>
                                <template v-else-if="form.template == 'help'">
                                    <form-help :size="form.size" :id="form.name" :label="form.label" :required="form.required" :value="formData[form.name]" :disabled="form.primary && id" @input="setValue(form.name, $event)"></form-help>
                                </template>
                                <template v-else>
                                    <form-check :size="form.size" :id="form.name" :label="form.label" :value="formData[form.name]" @input="setValue(form.name, $event)"></form-check>
                                </template>
                            </template>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit" @click.prevent="handleSubmit"> Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['id'],
        data() {
            return {
                route: {
                    master: {
                        name: 'BarangList'
                    }
                },
                formHTML: [
                    [
                        {
                            primary: true,
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
                formData: {}
            }
        },
        mounted() {
            if (this.id)
            {
                this.getDataBarang(this.id)
            }
        },
        methods: {
            getDataBarang(id) {
                axios.get('/api/barang/' + this.id).then((response) => {
                    console.log(response)
                    this.formData = response.data
                })
            },
            handleSubmit() {
                console.log(this.$data.formData)
                if (this.id)
                {
                    axios.put('/api/barang/edit/' + this.id, this.$data.formData)
                    .then((response) => {
                        console.log(response)
                        if (response.data.status)
                        {
                            alert("Edit Success")
                            console.log(response.data.message)
                            //openMaster("BarangList")
                            this.$router.push({
                                name: "BarangList",
                            })
                        }
                    })
                    .catch((error) => {
                        alert(error.response.data.message)
                        console.log(error.response.data.message)
                    })
                }
                else
                {
                    axios.post('/api/barang/add', this.$data.formData)
                    .then((response) => {
                        console.log(response)
                        if (response.data.status)
                        {
                            alert("Add Success")
                            console.log(response.data.message)
                            //openMaster("BarangList")
                            this.$router.push({
                                name: "BarangList",
                            })
                        }
                    })
                    .catch((error) => {
                        alert(error.response.data.message)
                        console.log(error.response.data.message)
                    })
                }
                
            },
            openMaster(route) {
                this.$router.push({
                    name: route,
                })
            },
            setValue(key, e) {
                this.formData[key] = e
            }
        }
    }
</script>