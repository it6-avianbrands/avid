<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h1>Master Jenis</h1></div>
                <div class="card-body">
                    <router-link :class="route.add.color" class="mb-3" :to="route.add" tag="button">
                        <span v-text="route.add.caption" class="pr-1">Add</span>
                        <i :class="route.add.icon"></i>
                    </router-link>
                    <datatable :columns="header" :data="detail">
                        <template slot-scope="{row, columns}">
                            <tr>
                                <td>{{ row.KodeJenis }}</td>
                                <td>{{ row.KeteranganJenis }}</td>
                                <td>
                                    <list-control :id="row.KodeJenis" :url="route.edit.name" :caption="route.edit.caption" :color="route.edit.color" :icon="route.edit.icon"></list-control>
                                    <list-control :id="row.KodeJenis" :caption="route.delete.caption" :color="route.delete.color" :icon="route.delete.icon"></list-control>
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
                        name: 'JenisForm',
                        caption: "Add",
                        color: 'btn btn-success',
                        icon: 'fas fa-plus'
                    },
                    edit: {
                        name: 'JenisForm',
                        caption: "Edit",
                        color: 'btn btn-primary',
                        icon: 'fas fa-edit'
                    },
                    delete: {
                        caption: "Delete",
                        color: 'btn btn-danger',
                        icon: 'fas fa-trash'
                    }
                },
                header: [
                    {
                        label: "Kode",
                        field: "KodeJenis"
                    },
                    {
                        label: "Keterangan",
                        field: "KeteranganJenis"
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
            this.getListJenis()
        },
        methods: {
            getListJenis() {
                axios.get('/api/jenis').then((response) => {
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