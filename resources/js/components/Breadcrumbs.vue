<template>
    <div class="c-subheader px-3">
        <!-- Breadcrumb-->
        <ol class="breadcrumb border-0 m-0">
            <!--Breadcrumb Menu-->
            <li v-for="(crumb, index) in crumbs" :key="index" class="breadcrumb-item">
                <router-link :to="crumb.link" :class="{ disabled: isLast(index) }" :disabled="isLast(index)" @selected="selected(crumb.link)">{{ crumb.text }}</router-link>
            </li>
        </ol>
    </div>
</template>

<style scoped>
    .disabled {
        color: gray;
        pointer-events: none;
    }
</style>

<script>
    export default {
        props: {
            crumbs: {
                type: Array,
                default: []
            }
        },
        data() {
            return {
                
            }
        },
        methods: {
            isLast(index) {
                return index === this.crumbs.length - 1
            },
            selected(crumb) {
                this.$emit("selected", crumb)
            } 
        }
    }
</script>