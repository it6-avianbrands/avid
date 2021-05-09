<template>
    <div :class="columnClass">
        <help-modal :ref="id" :id="id" :title="label" :body="label" :route="modalRoute"></help-modal>
        <label v-text="label" :class="[labelClass, isRequired]" :for="id"></label>
        <div class="input-group">
            <span class="input-group-prepend">
                <button :ref="modalTarget" class="btn btn-primary help-search" type="button" data-toggle="modal" :data-target="modalTarget" @click="handleSearch(id)">
                    <svg class="c-icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                    </svg>
                </button>
            </span>
            <input class="form-control" :id="id" type="text" :autocomplete="id" :value="value" :disabled="disabled" @input="handleInput" @keydown.enter.prevent="showModal(modalTarget)">
        </div>
    </div>
</template>

<style>
    
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
                modalTarget: "#" + this.id + "Modal",
                modalRoute: "/api/" + this.id.toLowerCase().replace("kode", ""),
                labelClass: "col-form-label",
                isRequired: this.required ? "required" : "",
                columnClass: ["col-lg-" + this.size, "col-md-" + this.size].join(" ")
            }
        },
        methods: {
            handleInput(e) {
                this.$emit("input", e.target.value)
            },
            handleSearch(id) {
                this.$refs[id].searchByValue()
            },
            showModal(modal) {
                this.$refs[modal].click()
            }
        }
    }
</script>