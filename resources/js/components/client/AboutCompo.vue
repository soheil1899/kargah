<template>
    <div class="container">
        <h4 class="my-5 borderright-blue pr-3 py-2"><strong>
            درباره ما
        </strong></h4>
        <div class="container px-5">
            <div v-for="item in about">
                <div class="row m-0" v-if="item['article_type_id'] == 1">
                    <h5><strong>
                        {{item.text}}
                    </strong></h5>
                </div>
                <div class="row m-0" v-if="item['article_type_id'] ==2">
                    <p v-html="item.text"></p>
                </div>
                <div class="row m-0" v-if="item['article_type_id'] ==3">
                    <img :src="'/media/article/' + item.article_id + '/content/' + item.text + '_original.png'" width="100%" height="100%">
                </div>
            </div>
        </div>
    </div>

</template>

<script>


    export default {
        name: "AboutCompo",
        data() {
            return {
                about: [],
            }
        },
        methods: {
            loadpage() {
                let that = this;
                axios.post('/getabout')
                    .then(function (response) {
                        that.about = response.data['contents'];
                    });
            }
        },
        mounted() {
            this.loadpage();
        }
    }
</script>

<style scoped>

</style>
