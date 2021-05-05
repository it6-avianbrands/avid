<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form id="ProdukForm" action="" :method="this.id ? 'put' : 'post'" enctype="multipart/form-data">
                    <div class="card-header"><h1>{{ this.id ? "Edit" : "Add" }} Produk</h1></div>
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
                        name: 'ProdukList'
                    }
                },
                formHTML: [
                    [
                        {
                            primary: true,
                            template: "regular",
                            type: "text",
                            name: "KodeProduk",
                            label: "Kode",
                            required: "required",
                            size: 6
                        },
                        {
                            template: "regular",
                            type: "text",
                            name: "InisialProduk",
                            label: "Inisial",
                            required: "required",
                            size: 6
                        }
                    ],
                    [
                        {
                            template: "regular",
                            type: "text",
                            name: "KeteranganProduk",
                            label: "Keterangan",
                            required: "required",
                            size: 12
                        }
                    ]
                ],
                formData: {}
            }
        },
        mounted() {
            if (this.id)
            {
                this.getDataProduk(this.id)
            }
        },
        methods: {
            getDataProduk(id) {
                axios.get('/api/produk/' + id).then((response) => {
                    console.log(response)
                    this.formData = response.data
                })
            },
            handleSubmit() {
                console.log(this.$data.formData)
                if (this.id)
                {
                    axios.put('/api/produk/edit/' + this.id, this.$data.formData)
                    .then((response) => {
                        console.log(response)
                        if (response.data.status)
                        {
                            alert("Edit Success")
                            console.log(response.data.message)
                            //openMaster("BarangList")
                            this.$router.push({
                                name: "ProdukList",
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
                    axios.post('/api/produk/add', this.$data.formData)
                    .then((response) => {
                        console.log(response)
                        if (response.data.status)
                        {
                            alert("Add Success")
                            console.log(response.data.message)
                            //openMaster("BarangList")
                            this.$router.push({
                                name: "ProdukList",
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