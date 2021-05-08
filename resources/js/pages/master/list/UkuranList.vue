<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h1>Master Ukuran</h1></div>
                <div class="card-body">
                    <router-link class="btn btn-sm btn-primary" :to="route.add">Add</router-link>
                    <datatable :columns="header" :data="detail">
                        <template slot-scope="{row, columns}">
                            <tr>
                                <td>{{ row.KodeUkuran }}</td>
                                <td>{{ row.KeteranganUkuran }}</td>
                                <td>
                                    <list-control :id="row.KodeUkuran" :url="route.edit.name"></list-control>
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
                        name: 'UkuranForm'
                    },
                    edit: {
                        name: 'UkuranForm'
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
            this.getListUkuran()
        },
        methods: {
            getListUkuran() {
                axios.get('/api/ukuran').then((response) => {
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