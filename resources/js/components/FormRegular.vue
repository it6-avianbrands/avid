<template>
    <div :class="columnClass">
        <label v-text="label" :class="[labelClass, isRequired]" :for="id"></label>
        <input class="form-control" :id="id" :type="type" :value="value" :disabled="disabled" @input="handleInput">
        <span class="help-block required">
            <small v-if="error">
                <i class="fas fa-exclamation-circle pr-1"></i>{{ error }}
            </small>
        </span>
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
            error: String,
            disabled: {
                type: Boolean,
                default: false
            },
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