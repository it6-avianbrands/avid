<template>
    <div :class="columnClass">
        <help-modal :ref="id" :id="id" :title="label" :body="label" :route="modalRoute" @confirmed="handleConfirmed" ></help-modal>
        <label v-text="label" :class="[labelClass, isRequired]" :for="id"></label>
        <div class="input-group">
            <span class="input-group-prepend">
                <button :ref="modalTarget" class="btn btn-primary help-search" type="button" data-toggle="modal" :data-target="modalTarget" @click="showModalClick(id)">
                    <svg class="c-icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                    </svg>
                </button>
            </span>
            <input :ref="searchText" class="form-control" :id="id" type="text" :autocomplete="id" :value="value" :disabled="disabled" @input="handleInput" @keydown.enter.prevent="showModalKeyPress(modalTarget, $event)">
            <span class="input-group-append col-7 p-0">
                <span v-text="valueInfo" class="input-group-text col-12"></span>
            </span>
        </div>
    </div>
</template>

<style scoped>
    
</style>

<script>
    import HelpModal from './HelpModal.vue'

    export default {
        props: {
            id: String,
            label: String,
            required: String,
            value: String,
            disabled: {
                type: Boolean,
                default: false
            },
            size: {
                type: Number,
                default: 12
            }
        },
        components: {
            HelpModal
        },
        data: function() {
            return {
                content: this.value,
                valueInfo: null,
                searchText: this.id + "Text",
                modalTarget: "#" + this.id + "Modal",
                modalRoute: "/api/" + this.id.toLowerCase().replace("kode", ""),
                modalQuery: "",
                labelClass: "col-form-label",
                isRequired: this.required ? "required" : "",
                columnClass: ["col-lg-" + this.size, "col-md-" + this.size].join(" ")
            }
        },
        methods: {
            handleInput(e) {
                this.$emit("input", e.target.value)
            },
            handleConfirmed(value) {
                this.value = value.id
                this.valueInfo = value.name
            },
            handleSearch(id) {
                this.$refs[id].searchTerm = null
                this.$refs[id].searchByValue(this.modalQuery)
            },
            showModalClick(id) {
                let query = this.$refs[this.searchText].value
                this.modalQuery = ""
                if (query && query !== "?")
                {
                    this.modalQuery = "/" + ["search", this.id.replace("Kode", "Keterangan"), query].join("/")
                }
                this.handleSearch(id)
            },
            showModalKeyPress(modal, e) {
                if (e.target.value)
                {
                    this.modalQuery = ""
                    if (e.target.value !== "?")
                    {
                        this.modalQuery = "/" + ["search", this.id.replace("Kode", "Keterangan"), e.target.value].join("/")
                    }
                    this.$refs[modal].click()
                }
            }
        }
    }
</script>