<template>
    <div class="container">
        <h4 class="mt-5 mb-4 borderright-blue pr-3 py-2"><strong>
            پرداخت آنلاین و ثبت نام در کارگاه
        </strong></h4>

        <div class="card">
            <div class="card-header">
                <strong>
                    اطلاعات مربوط به کارگاه انتخابی
                </strong>
            </div>
            <div class="card-body">
                <div class="row mx-0 px-5 mb-3">
                    <div class="col-12 p-1">
                        <div class="px-3 py-1 filedbox text-center">
                            <strong>
                                {{workshop.title}}
                            </strong>
                        </div>
                    </div>
                </div>
                <div class="row m-0 px-5">
                    <div class="col-12 col-lg-6 row m-0 pr-0">
                        <div class="col-5 p-1">
                            <div class="px-3 py-1 filedbox">
                                وضعیت دوره
                            </div>
                        </div>
                        <div class="col-7 p-1">
                            <div class="px-3 py-1 filedbox">
                                {{workshop.status}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 row m-0 pl-0">
                        <div class="col-5 p-1">
                            <div class="px-3 py-1 filedbox">
                                مدت زمان آموزش
                            </div>
                        </div>
                        <div class="col-7 p-1">
                            <div class="px-3 py-1 filedbox">
                                {{workshop.time}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-0 px-5">
                    <div class="col-12 col-lg-6 row m-0 pr-0">
                        <div class="col-5 p-1">
                            <div class="px-3 py-1 filedbox">
                                گروه هدف
                            </div>
                        </div>
                        <div class="col-7 p-1">
                            <div class="px-3 py-1 filedbox">
                                {{workshop.target}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 row m-0 pl-0">
                        <div class="col-5 p-1">
                            <div class="px-3 py-1 filedbox">
                                ظرفیت کارگاه
                            </div>
                        </div>
                        <div class="col-7 p-1">
                            <div class="px-3 py-1 filedbox">
                                {{workshop.capacity}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-0 px-5">
                    <div class="col-12 col-lg-6 row m-0 pr-0">
                        <div class="col-5 p-1">
                            <div class="px-3 py-1 filedbox">
                                جنسیت دوره
                            </div>
                        </div>
                        <div class="col-7 p-1">
                            <div class="px-3 py-1 filedbox">
                                {{workshop.gender}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 row m-0 pl-0">
                        <div class="col-5 p-1">
                            <div class="px-3 py-1 filedbox">
                                شروع ثبت نام
                            </div>
                        </div>
                        <div class="col-7 p-1">
                            <div class="px-3 py-1 filedbox">
                                {{workshop.startregister}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-0 px-5">
                    <div class="col-12 col-lg-6 row m-0 pr-0">
                        <div class="col-5 p-1">
                            <div class="px-3 py-1 filedbox">
                                پایان ثبت نام
                            </div>
                        </div>
                        <div class="col-7 p-1">
                            <div class="px-3 py-1 filedbox">
                                {{workshop.endregister}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 row m-0 pl-0">
                        <div class="col-5 p-1">
                            <div class="px-3 py-1 filedbox">
                                مکان برگزاری دوره
                            </div>
                        </div>
                        <div class="col-7 p-1">
                            <div class="px-3 py-1 filedbox">
                                {{workshop.place}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-0 px-5">
                    <div class="col-12 col-lg-6 row m-0 pr-0">
                        <div class="col-5 p-1">
                            <div class="px-3 py-1 filedbox">
                                زمان برگزاری دوره
                            </div>
                        </div>
                        <div class="col-7 p-1">
                            <div class="px-3 py-1 filedbox">
                                {{workshop.date}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 row m-0 pl-0">
                        <div class="col-5 p-1">
                            <div class="px-3 py-1 filedbox">
                                اولین جلسه کارگاه
                            </div>
                        </div>
                        <div class="col-7 p-1">
                            <div class="px-3 py-1 filedbox">
                                {{workshop.firstclass}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-0 px-5">
                    <div class="col-12 col-lg-6 row m-0 pr-0">
                        <div class="col-5 p-1">
                            <div class="px-3 py-1 filedbox">
                                استاد دوره
                            </div>
                        </div>
                        <div class="col-7 p-1">
                            <div class="px-3 py-1 filedbox">
                                {{workshop.teacher}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 row m-0 pl-0">
                        <div class="col-5 p-1">
                            <div class="px-3 py-1 filedbox">
                                هزینه ثبت نام
                            </div>
                        </div>
                        <div class="col-7 p-1">
                            <div class="px-3 py-1 filedbox">
                                {{workshop.price}}
                                تومان
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="px-5 mx-5">
            <div class="alert alert-success mt-5 mb-2 text-center mx-5" role="alert">
                <strong>
                    هزینه قابل پرداخت :
                    {{workshop.price}}
                </strong>
            </div>
        </div>
        <div class="row m-0 justify-content-center">
            <input type="button" class="btn btn-success btn-lg" @click="onlinepay" value="پرداخت آنلاین">
        </div>
    </div>
</template>

<script>
    import Swal from 'sweetalert2';

    export default {
        name: "ReserveDetail",
        props: ['id'],
        data() {
            return {
                workshop: [],
            }
        },
        comments: {
            Swal,
        },
        methods: {
            onlinepay() {
                let that = this;
                let data = {
                    workshop: this.workshop,
                };
                axios.post('/onlinepay', data)
                    .then(function (response) {
                        if (response.data == 'nopay') {
                            Swal.fire({
                                text: 'ظرفیت این کارگاه تکمیل شده است!',
                                type: 'error',
                                confirmButtonText: 'بستن'
                            });
                        }else if(response.data == 'duplicate'){
                            Swal.fire({
                                text: 'شما قبلا در این کارگاه ثبت نام کرده اید!',
                                type: 'error',
                                confirmButtonText: 'بستن'
                            });
                        }else if(response.data == 'pay'){
                            window.location = '/zarinpay';
                        }
                    });
            },
            loadpage() {
                let that = this;
                let data = {
                    id: this.id,
                };
                axios.post('/getworkshopinfo', data)
                    .then(function (response) {
                        that.workshop = response.data;
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
