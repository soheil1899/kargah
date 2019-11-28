<template>
    <div class="container">
        <h4 class="mt-5 mb-4 borderright-blue pr-3 py-2"><strong>
            لیست کارگاه های آموزشی
        </strong>

            <nav aria-label="Page navigation example" v-if="meta.last_page > 1" class="widthfit float-left">
                <ul class="pagination justify-content-center">
                    <li class="page-item pointer" v-on:click="gobackpage">
                        <a class="page-link pagination-portfolio" tabindex="-1">قبلی</a>
                    </li>
                    <li class="page-item pointer" v-for="i in meta.last_page" v-on:click="loadfunction(i)"><a
                        class="page-link pagination-portfolio" :style="activebtn(i)">{{ i }}</a></li>
                    <li class="page-item pointer" v-on:click="gonextpage">
                        <a class="page-link pagination-portfolio">بعدی</a>
                    </li>
                </ul>
            </nav>
        </h4>

        <div class="row mt-3">
            <div class="col-12 px-4 py-3" v-for="item in workshoplist">
                <div class="row m-0 p-3" style="background-color: #f1f4fd; border-radius: 5px">
                    <div class="col-12 col-md-3" v-if="item.poster == 1">
                        <img :src="'/media/workshop/'+item.id+'_poster.png'" width="100%" height="100%">
                    </div>
                    <div class="col-12 col-md-3" v-if="item.poster == 0">
                        <img :src="'/media/cite/workshop.jpg'" width="100%" height="100%">
                    </div>
                    <div class="col-12 col-md-9 col-lg-7">
                        <a class="worktitle" :href="'/workshop/' + item.id">
                            <h4>
                                <strong>
                                    {{item.title}}
                                </strong>
                            </h4>
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
                            <label class="mr-3 mb-0 textgreen" v-if="item.firstclass">
                                {{item.firstclass}}
                            </label>
                            <label class="mr-3 mb-0 textgreen" v-else>
                                متعاقبا اعلام می شود.
                            </label>
                        </label>
                    </div>
                    <div class="col-12 col-lg-2 align-self-end pb-lg-3">
                        <a :href="'/workshop/'+ item.id" class="btn btn-outline-primary btn-sm">مشاهده جزئیات کارگاه</a>
                    </div>
                </div>
            </div>


            <nav aria-label="Page navigation example" v-if="meta.last_page > 1" class="my-5 mx-auto">
                <ul class="pagination justify-content-center">
                    <li class="page-item pointer" v-on:click="gobackpage">
                        <a class="page-link pagination-portfolio" tabindex="-1">قبلی</a>
                    </li>
                    <li class="page-item pointer" v-for="i in meta.last_page" v-on:click="loadfunction(i)"><a
                        class="page-link pagination-portfolio" :style="activebtn(i)">{{ i }}</a></li>
                    <li class="page-item pointer" v-on:click="gonextpage">
                        <a class="page-link pagination-portfolio">بعدی</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script>
    export default {
        name: "WorkshopList",
        data() {
            return {
                workshoplist: [],
                meta: [],
                currentpage: null,
            }
        },
        methods: {
            loadfunction (page = 1) {
                this.currentpage = page;
                let that = this;
                let data = {
                    page: page,
                };
                axios.post('/getworkshops', data)
                    .then(function (response) {
                        that.workshoplist = response.data.data;
                        that.meta = response.data.meta;
                    });
            },
            gobackpage() {
                if (this.currentpage != 1) {
                    this.loadfunction(this.currentpage - 1);
                }
            },
            gonextpage() {
                if (this.currentpage != this.meta.last_page) {
                    this.loadfunction(this.currentpage + 1);
                }
            },
            activebtn(i) {
                if (i == this.currentpage) {
                    return "background-color: #e3e4e4;";
                }
            },
        },
        mounted() {
            this.loadfunction();
        }
    }
</script>

<style scoped>
    .textgreen {
        color: #4f6577;
        font-weight: bolder;
    }

    .worktitle {
        color: #dc4c48;
    }
    .pagination-portfolio {
        color: #000 !important;
    }
    .widthfit{
        width: fit-content;
        font-size: 13px;
    }

</style>
