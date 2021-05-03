<template>
    <router-link class="btn btn-sm btn-primary" :to="route.edit">Edit</router-link>
</template>

<script>
    export default {
        props: ["id"],
        data() {
            return {
                route: {
                    edit: {
                        name: 'BarangForm',
                        params: 
                        {
                            id: this.id
                        }
                    }
                }
            }
        },
        methods: {
            openFormEdit() {
                this.$router.push({
                    name: 'BarangForm',
                    params: 
                    {
                        id: this.id
                    }
                })
            }
        }
    }
</script>