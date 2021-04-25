<template>
    <section>
        <label v-text="label" :class="[labelClass, isRequired]" :for="id"></label>
        <input class="form-control" :id="id" :type="type" v-model="value"> 
    </section>
</template>

<style>
    
</style>

<script>
    export default {
        props: ["id", "name", "type", "label", "required"],
        data: function() {
            return {
                value: this.name,
                labelClass: "col-form-label",
                isRequired: this.required ? "required" : ""
            }
        }
    }
</script>