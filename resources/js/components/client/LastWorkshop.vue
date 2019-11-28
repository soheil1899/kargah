<template>
    <div class="container mb-5" v-if="workshop.length > 0">
        <h4 class="mt-5 mb-4 borderright-blue pr-3 py-2"><strong>
            آخرین کارگاه های آموزشی
        </strong></h4>

        <div class="row heightfit mt-3 justify-content-center">
            <div class="col-12 col-md-4 col-lg-3 height100 p-1" v-for="item in workshop">
                <div class="row m-0 p-2" style="background-color: #f1f4fd; border-radius: 5px">
                    <div class="row m-0 mb-3">
                        <div class="col-12" v-if="item.poster == 1">
                            <img :src="'/media/workshop/'+item.id+'_poster.png'" width="100%" height="150px">
                        </div>
                        <div class="col-12" v-if="item.poster == 0">
                            <img :src="'/media/cite/workshop.jpg'" width="100%" height="150px">
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="col-12">
                            <a class="worktitle" :href="'/workshop/' + item.id">
                                <h6>
                                    <strong>
                                        {{item.title}}
                                    </strong>
                                </h6>
                            </a>
                            <label class="d-block mb-0">
                                هزینه دوره :
                                <label class="mr-3 mb-0 textgreen">
                                    {{item.price}}
                                    تومان
                                </label>
                            </label>
                            <label class="d-block mb-0">
                                استاد :
                                <label class="mr-3 mb-0 textgreen">
                                    {{item.teacher}}
                                </label>
                            </label>
                            <label class="d-block mb-0">
                                شروع ثبت نام :
                                <label class="mr-3 mb-0 textgreen">
                                    {{item.startregister}}
                                </label>
                            </label>
                            <label class="d-block mb-0">
                                پایان ثبت نام :
                                <label class="mr-3 mb-0 textgreen">
                                    {{item.endregister}}
                                </label>
                            </label>
                            <label class="d-block mb-0">
                                اولین جلسه دوره :
                                <label class="mr-3 mb-0 textgreen">
                                    {{item.firstclass}}
                                </label>
                            </label>
                        </div>
                        <div class="col-12 pt-3">
                            <a :href="'/workshop/'+ item.id" class="btn btn-outline-primary btn-sm float-left">مشاهده جزئیات
                                کارگاه</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "LastWorkshop",
        data() {
            return {
                workshop: [],
            }
        },
        methods: {},
        mounted() {
            let that = this;
            axios.post('/getlastworkshop')
                .then(function (response) {
                    that.workshop = response.data;
                });
        }
    }
</script>

<style scoped>
    .height100{
        height: 100%;
        display: block;
    }
    .heightfit{
        height: fit-content;
    }

</style>
