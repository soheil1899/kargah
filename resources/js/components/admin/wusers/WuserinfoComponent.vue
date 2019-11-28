<template>
    <div>
        <h4 class="admin-title py-3 px-4">
            {{userinfo['name'] + ' ' + userinfo['family']}}

            <a :href="'/dashboard/wuser'" class="back-btn btn btn-secondary btn-sm px-4 float-left">برگشت</a>
        </h4>


        <div class="card mt-4">
            <div class="card-header py-1" id="headingOne">
                <h5 class="m-2">
                    <strong>
                        مشخصات
                    </strong>
                </h5>
            </div>
            <div class="card-body row px-5">
                <div class="col-3 col-lg-2">نام :</div>
                <div class="col-9 col-lg-4">{{userinfo['name']}}</div>
                <div class="col-3 col-lg-2">نام خانوادگی :</div>
                <div class="col-9 col-lg-4">{{userinfo['family']}}</div>
                <div class="col-3 col-lg-2">موبایل :</div>
                <div class="col-9 col-lg-4">{{userinfo['mobile']}}</div>
                <div class="col-3 col-lg-2">ایمیل :</div>
                <div class="col-9 col-lg-4">{{userinfo['email']}}</div>
                <div class="col-3 col-lg-2">شماره تماس :</div>
                <div class="col-9 col-lg-4">{{userinfo['phone']}}</div>
                <div class="col-3 col-lg-2">جنسیت :</div>
                <div class="col-9 col-lg-4">{{userinfo['gender']}}</div>
                <div class="col-3 col-lg-2">آدرس :</div>
                <div class="col-9 col-lg-4">{{userinfo['address']}}</div>
                <div class="col-3 col-lg-2">رشته :</div>
                <div class="col-9 col-lg-4">{{userinfo['major']}}</div>
                <div class="col-3 col-lg-2">کد ملی :</div>
                <div class="col-9 col-lg-4">{{userinfo['nationalcode']}}</div>
                <div class="col-3 col-lg-2">دانشگاه :</div>
                <div class="col-9 col-lg-4">{{userinfo['university']}}</div>
                <div class="col-3 col-lg-2">تاریخ تولد :</div>
                <div class="col-9 col-lg-4">{{userinfo['birthday']}}</div>
                <div class="col-3 col-lg-2">مدرک :</div>
                <div class="col-9 col-lg-4">{{userinfo['grade']}}</div>
            </div>
        </div>


        <div class="card mt-4">
            <div class="card-header py-1" id="headingTwo">
                <h5 class="m-2">
                    <strong>
                        کارگاه ها
                    </strong>
                </h5>
            </div>
            <div v-if="userinfo['resworkshops'].length == 0" class="card-body px-5">
                این کاربر هنوز در دوره ای ثبت نام نکرده است.
            </div>
            <div v-for="item in userinfo['resworkshops']" class="card-body row px-5">
                <div class="col-3 col-lg-2"><strong>
                    عنوان کارگاه :
                </strong></div>
                <div class="col-9 col-lg-10"><strong>
                    {{item.workshop.title}}
                </strong></div>
                <div class="col-3 col-lg-2">مدت دوره :</div>
                <div class="col-9 col-lg-4">{{item.workshop.time}}</div>
                <div class="col-3 col-lg-2">مکان برگزاری :</div>
                <div class="col-9 col-lg-4">{{item.workshop.place}}</div>
                <div class="col-3 col-lg-2">زمان برگزاری :</div>
                <div class="col-9 col-lg-4">{{item.workshop.date}}</div>
                <div class="col-3 col-lg-2">استاد کارگاه :</div>
                <div class="col-9 col-lg-4">{{item.workshop.teacher}}</div>
                <div class="col-3 col-lg-2">هزینه دوره :</div>
                <div class="col-9 col-lg-4">{{item.workshop.price}}</div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "WuserinfoComponent",
        props: ['wuserid'],
        data() {
            return {
                userinfo: [],
            }
        },
        methods: {
            loadpage() {
                let that = this;
                let data = {
                    id: this.wuserid,
                };
                axios.post('/dashboard/getwuserinfo', data)
                    .then(function (response) {
                        that.userinfo = response.data;
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
