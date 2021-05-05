<template>
    <div class="modal fade" :id="modalID" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" v-text="title"></h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <p v-text="body"></p>
                </div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="button">Confirm</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['id', 'title', 'body', 'query', 'key'],
        mounted() {
            if (this.param)
            {
                this.getData(this.query, this.key)
            }
        },
        data() {
            return {
                modalID: this.id + "Modal",
                listData: {}
            }
        },
        methods: {
            getData(route, id) {
                axios.get(route + id).then((response) => {
                    console.log(response)
                    this.listData = response.data
                })
            },
        }
    }
</script>
