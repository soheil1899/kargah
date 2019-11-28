<template>
    <div class="container">
        <h4 class="my-5 borderright-blue pr-3 py-2"><strong>
            تماس با ما
        </strong></h4>

        <div class="row m-0">
            <div class="col-12 col-lg-6 order-1 mt-5 mt-lg-0 order-lg-0 borderleftlg">

                <div class="row pt-2">
                    <div class="col-3">نام :</div>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" v-model="name">
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col-3">نام خانوادگی :</div>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" v-model="family">
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col-3">موبایل :</div>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="text" v-model="mobile">
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col-3">متن پیام :</div>
                    <div class="col-9">
                        <textarea class="form-control form-control-sm" rows="10" v-model="text"></textarea>
                    </div>
                </div>
                <div class="row pt-4 justify-content-end">
                    <button type="button" class="btn btn-primary" @click="sendmessage">
                        <i class="fas fa-paper-plane ml-2"></i>
                        ارسال پیام
                    </button>
                </div>

            </div>
            <div class="col-12 col-lg-6 order-0 order-lg-1">
                <div class="row m-0">
                    <div class="col-4 p-1">
                        <div class="px-3 py-1 filedbox">
                            <i class="fas fa-map-marker-alt ml-2"></i>
                            آدرس :
                        </div>
                    </div>
                    <div class="col-8 p-1">
                        <div class="px-3 py-1 filedbox">
                            {{setting.address}}
                        </div>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-4 p-1">
                        <div class="px-3 py-1 filedbox">
                            <i class="fas fa-phone-square ml-2"></i>
                            شماره تماس :
                        </div>
                    </div>
                    <div class="col-8 p-1">
                        <div class="px-3 py-1 filedbox">
                            {{setting.tellphone}}
                        </div>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-4 p-1">
                        <div class="px-3 py-1 filedbox">
                            <i class="fas fa-mobile-alt ml-2"></i>
                            شماره موبایل :
                        </div>
                    </div>
                    <div class="col-8 p-1">
                        <div class="px-3 py-1 filedbox">
                            {{setting.mobile}}
                        </div>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-4 p-1">
                        <div class="px-3 py-1 filedbox">
                            <i class="far fa-envelope ml-2"></i>
                            ایمیل :
                        </div>
                    </div>
                    <div class="col-8 p-1">
                        <div class="px-3 py-1 filedbox">
                            {{setting.email}}
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>

</template>

<script>

    import Swal from 'sweetalert2';

    export default {
        name: "ContactCompo",
        data() {
            return {
                setting: [],
                name: null,
                family: null,
                mobile: null,
                text: null,
            }
        },
        comments:{
            Swal,
        },
        methods: {
            sendmessage(){
                let that = this;
                let data = {
                    name: this.name,
                    family: this.family,
                    mobile: this.mobile,
                    text: this.text,
                };
                axios.post('/sendpost', data)
                    .then(function (response) {
                        Swal.fire({
                            text: 'پیام شما با موفقیت ارسال شد!',
                            type: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    });
                setInterval(function(){ window.location = '/'; }, 1500);
            },
            loadpage() {
                let that = this;
                axios.post('/getsetting')
                    .then(function (response) {
                        that.setting = response.data;
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
