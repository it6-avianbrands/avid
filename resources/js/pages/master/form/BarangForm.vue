<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form id="BarangForm" action="" :method="id ? 'put' : 'post'" enctype="multipart/form-data">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h1>{{ id ? "Edit" : "Add" }} Barang</h1>
                            </div>
                            <div class="col d-flex align-items-center justify-content-end">
                                <router-link class="close text-dark" :to="route.master">
                                    <i :class="route.master.alt"></i>
                                </router-link>
                            </div>
                        </div>
                    </div>
                    <!--CSRF Token-->
                    <slot></slot>
                    <div class="card-body">
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
                        <router-link :class="route.master.color" :to="route.master">
                            <i :class="route.master.icon"></i>
                            <span v-text="route.master.caption" class="pr-1"></span>
                        </router-link>
                        <button v-if="id" :class="route.delete.color" type="button" @click="handleDelete">
                            <span v-text="route.delete.caption" class="pr-1"></span>
                            <i :class="route.delete.icon"></i>
                        </button>
                        <button :class="route.save.color" type="submit" @click.prevent="handleSubmit">
                            <span v-text="route.save.caption" class="pr-1"></span>
                            <i :class="route.save.icon"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import EventBus from '../../../bus'

    export default {
        props: ['id'],
        data() {
            return {
                route: {
                    master: {
                        name: 'BarangList',
                        caption: "Back",
                        color: 'btn btn-secondary',
                        icon: 'fas fa-chevron-left',
                        alt: 'fas fa-times'
                    },
                    save: {
                        caption: 'Save',
                        color: 'btn btn-success float-right',
                        icon: 'fas fa-save'
                    },
                    delete: {
                        caption: 'Delete',
                        color: 'btn btn-danger',
                        icon: 'fas fa-trash'
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
            let form = [this.id ? "Edit" : "Add", "Barang"].join(" ")
            if (this.id)
            {
                this.getDataBarang(this.id)
            }
            this.getCurrentRoute(form)
        },
        methods: {
            getDataBarang(id) {
                axios.get('/api/barang/' + id).then((response) => {
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
            handleDelete() {
                let flag = confirm(["Delete data", this.id, "?"].join(" "))
                if (flag)
                {
                    axios.delete('/api/barang/delete/' + this.id).then((response) => {
                        console.log(response)
                        if (response.data.status)
                        {
                            alert("Delete Success")
                            console.log(response.data.message)
                            //openMaster("BarangList")
                            this.$router.push({
                                name: "BarangList",
                            })
                        }
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
            },
            getCurrentRoute(form) {
                let currentRoute = this.$router.currentRoute.meta.breadcrumbs
                let lastItem = currentRoute[currentRoute.length - 1]
                lastItem.name = form
                EventBus.$emit('route', this.$router.currentRoute.meta.breadcrumbs)
            }
        }
    }
</script>