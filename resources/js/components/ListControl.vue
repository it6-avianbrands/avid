<template>
    <router-link class="btn btn-sm btn-primary" :to="route.edit">Edit</router-link>
</template>

<script>
    export default {
        props: ["id", "url"],
        data() {
            return {
                route: {
                    edit: {
                        name: this.url,
                        params: 
                        {
                            id: this.id
                        }
                    }
                }
            }
        }
    }
</script>