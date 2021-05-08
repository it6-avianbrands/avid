<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h1>Master Jenis</h1></div>
                <div class="card-body">
                    <router-link class="btn btn-sm btn-primary" :to="route.add">Add</router-link>
                    <datatable :columns="header" :data="detail">
                        <template slot-scope="{row, columns}">
                            <tr>
                                <td>{{ row.KodeJenis }}</td>
                                <td>{{ row.KeteranganJenis }}</td>
                                <td>
                                    <list-control :id="row.KodeJenis" :url="route.edit.name"></list-control>
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
                        name: 'JenisForm'
                    },
                    edit: {
                        name: 'JenisForm'
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
            this.getListJenis()
        },
        methods: {
            getListJenis() {
                axios.get('/api/jenis').then((response) => {
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