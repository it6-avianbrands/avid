<template>
    <div class="modal fade" :id="modalID" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" v-text="title"></h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <table class="table table-responsive-sm table-sm">
                        <thead>
                            <tr>
                                <th v-for="(value, name) in listData[0]">
                                    <span v-if="isColumnVisible(name)">{{ name }}</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="data in listData">
                                <td v-for="(value, name) in data">
                                    <span v-if="isColumnVisible(name)">{{ value }}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="button">Confirm</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            id: String,
            title: String,
            route: String,
            query: {
                type: String,
                default: ""
            }
        },
        data() {
            return {
                modalID: this.id + "Modal",
                listData: {}
            }
        },
        methods: {
            getData(route, id) {
                axios.get(route + id).then((response) => {
                    console.log(response)
                    this.listData = response.data
                })
            },
            searchByValue() {
                this.getData(this.route, this.query)
            },
            isColumnVisible(name) {
                return !name.includes("_at")
            }
        }
    }
</script>
