<template>
    <div class="c-subheader px-3">
        <!-- Breadcrumb-->
        <ol class="breadcrumb border-0 m-0">
            <!--Breadcrumb Menu-->
            <li v-for="(crumb, index) in breadcrumb" :key="index" class="breadcrumb-item">
                <router-link :to="hasLink(crumb)" :class="{ disabled: !crumb.link }" :disabled="!crumb.link">{{ crumb.name }}</router-link>
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
    import EventBus from '../bus'

    export default {
        mounted() {
            EventBus.$on('route', (route) => {
                this.setBreadcrumb(route)
            })
        },
        data() {
            return {
                breadcrumb: null
            }
        },
        methods: {
            hasLink(breadcrumb) {
                return breadcrumb.link || ''
            },
            setBreadcrumb(breadcrumb) {
                this.breadcrumb = breadcrumb
                console.log(this.breadcrumb)
            } 
        }
    }
</script>