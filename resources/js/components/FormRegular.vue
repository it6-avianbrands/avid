<template>
    <div :class="columnClass">
        <label v-text="label" :class="[labelClass, isRequired]" :for="id"></label>
        <input class="form-control" :id="id" :type="type" @input="handleInput"> 
    </div>
</template>

<style>
    
</style>

<script>
    export default {
        props: {
            id: String,
            type: String,
            label: String,
            required: String,
            value: String,
            size: {
                type: Number,
                default: 12
            }
        },
        data: function() {
            return {
                content: this.value,
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