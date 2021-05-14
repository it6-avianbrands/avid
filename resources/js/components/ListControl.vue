<template>
    <router-link v-if="url" :class="color" :to="route">
        <span v-text="caption" class="pr-1"></span>
        <i :class="icon"></i>
    </router-link>
    <button v-else :class="color" type="button" @click="handleDelete">
        <span v-text="caption" class="pr-1"></span>
        <i :class="icon"></i>
    </button>
</template>

<script>
    export default {
        props: ["id", "url", "caption", "color", "icon"],
        data() {
            return {
                route: {
                    name: this.url,
                    params: 
                    {
                        id: this.id
                    }
                }
            }
        },
        methods: {
            getRequestURL() {
                return "/api" + this.$router.currentRoute.path + ["/delete", this.id].join("/")
            },
            handleDelete() {
                let flag = confirm([this.caption, "data", this.id, "?"].join(" "))
                if (flag)
                {
                    axios.delete(this.getRequestURL()).then((response) => {
                        console.log(response)
                        if (response.data.status)
                        {
                            alert("Delete Success")
                            console.log(response.data.message)
                            this.$router.go()
                        }
                    })
                }
            }
        }
    }
</script>