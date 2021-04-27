<template>
    <div :class="columnClass">
        <div class="input-group">
            <label class="c-switch c-switch-pill c-switch-primary">
                <input class="c-switch-input" :id="id" type="checkbox" @input="handleInput">
                <span class="c-switch-slider"></span>
            </label>
            <strong><span v-text="label"></span></strong>
        </div>
    </div>
</template>

<style>
    
</style>

<script>
    export default {
        props: {
            id: String,
            label: String,
            value: String,
            size: {
                type: Number,
                default: 12
            }
        },
        data: function() {
            return {
                content: this.value,
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