<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h1>Master Merk</h1></div>
                <div class="card-body">
                    <router-link class="btn btn-sm btn-primary" :to="route.add">Add</router-link>
                    <datatable :columns="header" :data="detail">
                        <template slot-scope="{row, columns}">
                            <tr>
                                <td>{{ row.KodeMerk }}</td>
                                <td>{{ row.KeteranganMerk }}</td>
                                <td>
                                    <list-control :id="row.KodeMerk" :url="route.edit.name"></list-control>
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
                        name: 'MerkForm'
                    },
                    edit: {
                        name: 'MerkForm'
                    }
                },
                header: [
                    {
                        label: "Kode",
                        field: "KodeMerk"
                    },
                    {
                        label: "Keterangan",
                        field: "KeteranganMerk"
                    },
                    {
                        label: "Action"
                    }
                ],
                detail: []
            }
        },
        mounted() {
            this.getListMerk()
        },
        methods: {
            getListMerk() {
                axios.get('/api/merk').then((response) => {
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