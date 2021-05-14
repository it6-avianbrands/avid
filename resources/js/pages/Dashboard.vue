<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h1>Dashboard</h1></div>
                <div class="card-body">
                    Hello world
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</template>

<script>
    import EventBus from '../bus'

    export default {
        data() {
            return {
                
            }
        },
        mounted() {
            this.getCurrentRoute()
        },
        methods: {
            getCurrentRoute() {
                EventBus.$emit('route', this.$router.currentRoute.meta.breadcrumbs)
            }
        }
    }
</script>