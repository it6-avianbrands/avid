<template>
    <div class="modal fade" :id="modalID" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" v-text="title"></h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span v-text="filter" class="input-group-text"></span>
                            </span>
                            <input class="form-control" type="text" v-model="searchTerm" @keydown.enter.prevent="handleSearch">
                            <span class="input-group-append">
                                <button class="btn btn-primary help-search" type="button" @click="handleSearch">
                                    <svg class="c-icon">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                                    </svg>
                                </button>
                            </span>
                        </div>
                    </div>
                    <table class="table table-responsive-sm table-sm">
                        <thead>
                            <tr>
                                <th v-for="(value, name) in listData[0]" @click="setFilter(name)">
                                    <span v-if="isColumnVisible(name)" style="cursor: pointer;">
                                        <span v-text="name"></span>
                                        <svg class="c-icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                                        </svg>
                                    </span>
                                </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr :class="getSelectedClass(getRowIDValue(data))" v-for="data in listData">
                                <td v-for="(value, name) in data">
                                    <span v-if="isColumnVisible(name)">{{ value }}</span>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" :id="[getRowID(data), getRowIDValue(data)].join('_')" type="radio" :checked="isRadioChecked(getRowIDValue(data))" @change="handleChange(getRowIDValue(data), getRowNameValue(data))" @keydown.enter.prevent="handleConfirm">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <span v-text="warning" class="help-block help-warning"></span>
                    <button class="btn btn-secondary" :ref="modalID" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="button" @click="handleConfirm">Confirm</button>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .help-warning {
        margin-right: auto;
        color: red;
    }
</style>

<script>
    export default {
        props: {
            id: String,
            title: String,
            route: String
        },
        data() {
            return {
                modalID: this.id + "Modal",
                filter: null,
                searchTerm: null,
                listData: {},
                selectedID: null,
                selectedData: {},
                warning: null
            }
        },
        methods: {
            getData(route, id) {
                axios.get(route + id).then((response) => {
                    console.log(response)
                    this.listData = response.data
                    if (!this.filter)
                    {
                        this.filter = this.getRowName(this.listData[0])
                    }
                })
            },
            handleConfirm() {
                if (this.selectedID === null)
                {
                    this.warning = "Please enter a value."
                }
                else
                {
                    this.$emit("confirmed", this.selectedData)
                    this.$refs[this.modalID].click()
                }
            },
            handleChange(id, name) {
                this.warning = null
                this.selectedID = id
                this.selectedData.id = id
                this.selectedData.name = name
            },
            handleSearch() {
                this.searchByValue("/" + ["search", this.filter, this.searchTerm].join("/"))
            },
            isRadioChecked(value) {
                return this.selectedID === value
            },
            searchByValue(query) {
                this.warning = null
                this.getData(this.route, query)
            },
            isColumnVisible(name) {
                return !name.includes("_at")
            },
            setFilter(name) {
                this.filter = name
            },
            getRowID(data) {
                return Object.keys(data)[0]
            },
            getRowIDValue(data) {
                return data[this.getRowID(data)]
            },
            getRowName(data) {
                return Object.keys(data)[1]
            },
            getRowNameValue(data) {
                return data[this.getRowName(data)]
            },
            getSelectedClass(value) {
                return {
                    "table-info": this.isRadioChecked(value)
                }
            }
        }
    }
</script>
