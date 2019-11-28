<template>
    <div class="container">
        <div v-if="workshop.poster == 1">
            <img :src="'/media/workshop/'+workshop.id+'_poster.png'" width="100%" height="450px">
        </div>
        <div class="row m-0">
            <div class="col-12 col-lg-9">
                <h4 class="mt-5 mb-4 borderright-blue pr-3 py-2"><strong>
                    {{workshop.title}}
                </strong></h4>
            </div>
            <div class="col-12 col-lg-3" v-if="workshop.status == 'ثبت نام'">
                <a :href="'/reserveworkshop/'+ workshop.id" class="float-left mt-5 mb-4 px-5 btn btn-success text-white">ثبت نام در کارگاه</a>
            </div>
        </div>


        <div class="row m-0 px-5">
            <div class="col-3 p-1">
                <div class="px-3 py-1 filedbox">
                    وضعیت دوره
                </div>
            </div>
            <div class="col-9 p-1">
                <div class="px-3 py-1 filedbox">
                    {{workshop.status}}
                </div>
            </div>
        </div>
        <div class="row m-0 px-5">
            <div class="col-3 p-1">
                <div class="px-3 py-1 filedbox">
                    مدت زمان آموزش
                </div>
            </div>
            <div class="col-9 p-1">
                <div class="px-3 py-1 filedbox">
                    {{workshop.time}}
                    ساعت
                </div>
            </div>
        </div>
        <div class="row m-0 px-5">
            <div class="col-3 p-1">
                <div class="px-3 py-1 filedbox">
                    گروه هدف
                </div>
            </div>
            <div class="col-9 p-1">
                <div class="px-3 py-1 filedbox">
                    {{workshop.target}}
                </div>
            </div>
        </div>
        <div class="row m-0 px-5">
            <div class="col-3 p-1">
                <div class="px-3 py-1 filedbox">
                    ظرفیت کارگاه
                </div>
            </div>
            <div class="col-9 p-1">
                <div class="px-3 py-1 filedbox">
                    {{workshop.capacity}}
                    نفر
                </div>
            </div>
        </div>
        <div class="row m-0 px-5">
            <div class="col-3 p-1">
                <div class="px-3 py-1 filedbox">
                    جنسیت دوره
                </div>
            </div>
            <div class="col-9 p-1">
                <div class="px-3 py-1 filedbox">
                    {{workshop.gender}}
                </div>
            </div>
        </div>
        <div class="row m-0 px-5">
            <div class="col-3 p-1">
                <div class="px-3 py-1 filedbox">
                    شروع ثبت نام
                </div>
            </div>
            <div class="col-9 p-1">
                <div class="px-3 py-1 filedbox">
                    {{workshop.startregister}}
                </div>
            </div>
        </div>
        <div class="row m-0 px-5">
            <div class="col-3 p-1">
                <div class="px-3 py-1 filedbox">
                    پایان ثبت نام
                </div>
            </div>
            <div class="col-9 p-1">
                <div class="px-3 py-1 filedbox">
                    {{workshop.endregister}}
                </div>
            </div>
        </div>
        <div class="row m-0 px-5">
            <div class="col-3 p-1">
                <div class="px-3 py-1 filedbox">
                    مکان برگزاری دوره
                </div>
            </div>
            <div class="col-9 p-1">
                <div class="px-3 py-1 filedbox">
                    {{workshop.place}}
                </div>
            </div>
        </div>
        <div class="row m-0 px-5">
            <div class="col-3 p-1">
                <div class="px-3 py-1 filedbox">
                    زمان برگزاری دوره
                </div>
            </div>
            <div class="col-9 p-1">
                <div class="px-3 py-1 filedbox">
                    {{workshop.date}}
                </div>
            </div>
        </div>
        <div class="row m-0 px-5">
            <div class="col-3 p-1">
                <div class="px-3 py-1 filedbox">
                    اولین جلسه کارگاه
                </div>
            </div>
            <div class="col-9 p-1">
                <div class="px-3 py-1 filedbox" v-if="workshop.firstclass">
                    {{workshop.firstclass}}
                </div>
                <div class="px-3 py-1 filedbox" v-else>
                    متعاقبا اعلام می شود.
                </div>
            </div>
        </div>
        <div class="row m-0 px-5">
            <div class="col-3 p-1">
                <div class="px-3 py-1 filedbox">
                    استاد دوره
                </div>
            </div>
            <div class="col-9 p-1">
                <div class="px-3 py-1 filedbox">
                    {{workshop.teacher}}
                </div>
            </div>
        </div>
        <div class="row m-0 px-5">
            <div class="col-3 p-1">
                <div class="px-3 py-1 filedbox">
                    هزینه ثبت نام
                </div>
            </div>
            <div class="col-9 p-1">
                <div class="px-3 py-1 filedbox">
                    {{workshop.price}}
                    تومان
                </div>
            </div>
        </div>
        <div class="row m-0 px-5 mt-5">
            <p v-html="workshop.description"></p>
        </div>
        <div class="row m-0" v-if="workshop.status == 'ثبت نام'">
            <a :href="'/reserveworkshop/'+ workshop.id" class="mr-auto mt-3 mb-4 px-5 btn btn-success text-white">ثبت نام در کارگاه</a>
        </div>

    </div>
</template>

<script>
    export default {
        name: "WorkshopInfo",
        props: ['workshopid'],
        data() {
            return {
                workshop: [],
            }
        },
        methods: {

            loadpage() {
                let that = this;
                let data = {
                    id: this.workshopid,
                };
                axios.post('/getworkshopinfo', data)
                    .then(function (response) {
                        that.workshop = response.data;
                    });
            },
        },
        mounted() {
            this.loadpage();
        }
    }
</script>

<style scoped>


</style>
