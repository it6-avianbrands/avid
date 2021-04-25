<template>
    <section>
        <help-modal :id="name" :title="label" :content="label"></help-modal>
        <label v-text="label" :class="[labelClass, isRequired]" :for="id"></label>
        <div class="input-group">
            <span class="input-group-prepend">
                <button class="btn btn-primary help-search" type="button" data-toggle="modal" :data-target="modalTarget">
                    <svg class="c-icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                    </svg>
                </button>
            </span>
            <input class="form-control" :id="id" type="text" v-model="value" :autocomplete="id">
        </div>
    </section>
</template>

<style>
    
</style>

<script>
    import HelpModal from './HelpModal.vue'

    export default {
        props: ["id", "name", "label", "required"],
        components: {
            HelpModal
        },
        data: function() {
            return {
                value: this.name,
                modalTarget: "#" + this.name + "Modal",
                labelClass: "col-form-label",
                isRequired: this.required ? "required" : ""
            }

        }
    }
</script>