<template>
    <div :class="columnClass">
        <help-modal :id="id" :title="label" :content="label"></help-modal>
        <label v-text="label" :class="[labelClass, isRequired]" :for="id"></label>
        <div class="input-group">
            <span class="input-group-prepend">
                <button class="btn btn-primary help-search" type="button" data-toggle="modal" :data-target="modalTarget">
                    <svg class="c-icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                    </svg>
                </button>
            </span>
            <input class="form-control" :id="id" type="text" :autocomplete="id" @input="handleInput">
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
                labelClass: "col-form-label",
                isRequired: this.required ? "required" : "",
                columnClass: ["col-lg-" + this.size, "col-md-" + this.size].join(" ")
            }

        },
        methods: {
            handleInput(e) {
                this.$emit("input", e.target.value)
            }
        }
    }
</script>