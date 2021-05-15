<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form id="JenisForm" action="" :method="id ? 'put' : 'post'" enctype="multipart/form-data">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h1>{{ id ? "Edit" : "Add" }} Jenis</h1>
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
                                    <form-regular :size="form.size" :id="form.name" :type="form.type" :label="form.label" :required="form.required" :value="formData[form.name]" :disabled="(form.primary || form.unique) && id" @input="setValue(form.name, $event)" :error="getError(form.name)"></form-regular>
                                </template>
                                <template v-else-if="form.template == 'help'">
                                    <form-help :size="form.size" :id="form.name" :label="form.label" :required="form.required" :value="formData[form.name]" :disabled="(form.primary || form.unique) && id" @input="setValue(form.name, $event)" :error="getError(form.name)"></form-help>
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
                        name: 'JenisList',
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
                            name: "KodeJenis",
                            label: "Kode",
                            required: "required",
                            size: 12
                        }
                    ],
                    [
                        {
                            template: "regular",
                            type: "text",
                            name: "KeteranganJenis",
                            label: "Keterangan",
                            required: "required",
                            size: 12
                        }
                    ]
                ],
                formData: {},
                formErrors: {}
            }
        },
        mounted() {
            let form = [this.id ? "Edit" : "Add", "Jenis"].join(" ")
            if (this.id)
            {
                this.getDataJenis(this.id)
            }
            this.getCurrentRoute(form)
        },
        methods: {
            getDataJenis(id) {
                axios.get('/api/jenis/' + id).then((response) => {
                    console.log(response)
                    this.formData = response.data
                })
            },
            handleSubmit() {
                console.log(this.$data.formData)
                if (this.id)
                {
                    axios.put('/api/jenis/edit/' + this.id, this.$data.formData)
                    .then((response) => {
                        console.log(response)
                        if (response.data.status)
                        {
                            alert("Edit Success")
                            console.log(response.data.message)
                            //openMaster("BarangList")
                            this.$router.push({
                                name: "JenisList",
                            })
                        }
                    })
                    .catch((error) => {
                        if (error.response.status == 422)
                        {
                            console.log(error.response.data)
                            this.formErrors = error.response.data.message
                        }
                        else
                        {
                            alert(error.response.data.message)
                            console.log(error.response.data.message)
                        }
                    })
                }
                else
                {
                    axios.post('/api/jenis/add', this.$data.formData)
                    .then((response) => {
                        console.log(response)
                        if (response.data.status)
                        {
                            alert("Add Success")
                            console.log(response.data.message)
                            //openMaster("BarangList")
                            this.$router.push({
                                name: "JenisList",
                            })
                        }
                    })
                    .catch((error) => {
                        if (error.response.status == 422)
                        {
                            console.log(error.response.data)
                            this.formErrors = error.response.data.message
                        }
                        else
                        {
                            alert(error.response.data.message)
                            console.log(error.response.data.message)
                        }
                    })
                }
            },
            handleDelete() {
                let flag = confirm(["Delete data", this.id, "?"].join(" "))
                if (flag)
                {
                    axios.delete('/api/jenis/delete/' + this.id).then((response) => {
                        console.log(response)
                        if (response.data.status)
                        {
                            alert("Delete Success")
                            console.log(response.data.message)
                            //openMaster("BarangList")
                            this.$router.push({
                                name: "JenisList",
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
            getError(name) {
                let error = this.formErrors[name]
                return error ? error[0] : null
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