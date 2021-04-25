<template>
    <section>
        <div>
            <label class="c-switch c-switch-pill c-switch-primary">
                <input class="c-switch-input" :id="id" type="checkbox" v-model="value">
                <span class="c-switch-slider"></span>
            </label>
        </div>
    </section>
</template>

<style>
    
</style>

<script>
    export default {
        props: ["id", "name", "label"],
        data: function() {
            return {
                value: this.name
            }
        }
    }
</script>