<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h1>Master Ukuran</h1></div>
                <div class="card-body">
                    <router-link :class="route.add.color" class="mb-3" :to="route.add" tag="button">
                        <span v-text="route.add.caption" class="pr-1">Add</span>
                        <i :class="route.add.icon"></i>
                    </router-link>
                    <datatable :columns="header" :data="detail">
                        <template slot-scope="{row, columns}">
                            <tr>
                                <td>{{ row.KodeUkuran }}</td>
                                <td>{{ row.KeteranganUkuran }}</td>
                                <td>
                                    <list-control :id="row.KodeUkuran" :url="route.edit.name" :caption="route.edit.caption" :color="route.edit.color" :icon="route.edit.icon"></list-control>
                                    <list-control :id="row.KodeUkuran" :caption="route.delete.caption" :color="route.delete.color" :icon="route.delete.icon"></list-control>
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
                        name: 'UkuranForm',
                        caption: "Add",
                        color: 'btn btn-success',
                        icon: 'fas fa-plus'
                    },
                    edit: {
                        name: 'UkuranForm',
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
                        field: "KodeUkuran"
                    },
                    {
                        label: "Keterangan",
                        field: "KeteranganUkuran"
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
            this.getListUkuran()
        },
        methods: {
            getListUkuran() {
                axios.get('/api/ukuran').then((response) => {
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