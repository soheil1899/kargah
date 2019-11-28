<template>
    <div class="container">
        <h4 class="my-5 borderright-blue pr-3 py-2"><strong>
            حساب کاربری
        </strong></h4>


        <div class="card">
            <div class="card-header">
                <strong>
                    اطلاعات کاربری
                </strong>
            </div>
            <div class="card-body">

                <div class="row m-0 px-5">
                    <div class="col-12 col-lg-6 row m-0 pr-0">
                        <div class="col-5 p-1">
                            <div class="px-3 py-1 filedbox">
                                نام
                            </div>
                        </div>
                        <div class="col-7 p-1">
                            <div class="px-3 py-1 filedbox">
                                {{showac.name}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 row m-0 pl-0">
                        <div class="col-5 p-1">
                            <div class="px-3 py-1 filedbox">
                                نام خانوادگی
                            </div>
                        </div>
                        <div class="col-7 p-1">
                            <div class="px-3 py-1 filedbox">
                                {{showac.family}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-0 px-5">
                    <div class="col-12 col-lg-6 row m-0 pr-0">
                        <div class="col-5 p-1">
                            <div class="px-3 py-1 filedbox">
                                موبایل
                            </div>
                        </div>
                        <div class="col-7 p-1">
                            <div class="px-3 py-1 filedbox">
                                {{showac.mobile}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 row m-0 pl-0">
                        <div class="col-5 p-1">
                            <div class="px-3 py-1 filedbox">
                                تلفن
                            </div>
                        </div>
                        <div class="col-7 p-1">
                            <div class="px-3 py-1 filedbox">
                                {{showac.phone}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-0 px-5">
                    <div class="col-12 col-lg-6 row m-0 pr-0">
                        <div class="col-5 p-1">
                            <div class="px-3 py-1 filedbox">
                                آدرس
                            </div>
                        </div>
                        <div class="col-7 p-1">
                            <div class="px-3 py-1 filedbox">
                                {{showac.address}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 row m-0 pl-0">
                        <div class="col-5 p-1">
                            <div class="px-3 py-1 filedbox">
                                رشته
                            </div>
                        </div>
                        <div class="col-7 p-1">
                            <div class="px-3 py-1 filedbox">
                                {{showac.major}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-0 px-5">
                    <div class="col-12 col-lg-6 row m-0 pr-0">
                        <div class="col-5 p-1">
                            <div class="px-3 py-1 filedbox">
                                کد ملی
                            </div>
                        </div>
                        <div class="col-7 p-1">
                            <div class="px-3 py-1 filedbox">
                                {{showac.nationalcode}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 row m-0 pl-0">
                        <div class="col-5 p-1">
                            <div class="px-3 py-1 filedbox">
                                دانشگاه
                            </div>
                        </div>
                        <div class="col-7 p-1">
                            <div class="px-3 py-1 filedbox">
                                {{showac.university}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-0 px-5">
                    <div class="col-12 col-lg-6 row m-0 pr-0">
                        <div class="col-5 p-1">
                            <div class="px-3 py-1 filedbox">
                                تاریخ تولد
                            </div>
                        </div>
                        <div class="col-7 p-1">
                            <div class="px-3 py-1 filedbox">
                                {{showac.birthday}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 row m-0 pl-0">
                        <div class="col-5 p-1">
                            <div class="px-3 py-1 filedbox">
                                مدرک
                            </div>
                        </div>
                        <div class="col-7 p-1">
                            <div class="px-3 py-1 filedbox">
                                {{showac.grade}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-0 px-5">
                    <div class="col-12 col-lg-6 row m-0 pr-0">
                        <div class="col-5 p-1">
                            <div class="px-3 py-1 filedbox">
                                جنسیت
                            </div>
                        </div>
                        <div class="col-7 p-1">
                            <div class="px-3 py-1 filedbox">
                                {{showac.gender}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 row m-0 pl-0">
                        <div class="col-5 p-1">
                            <div class="px-3 py-1 filedbox">
                                ایمیل
                            </div>
                        </div>
                        <div class="col-7 p-1">
                            <div class="px-3 py-1 filedbox">
                                {{showac.email}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pt-4 pl-5 justify-content-end">

                    <button @click="edituser"
                            type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal">
                        <i class="far fa-edit ml-2 text-white"></i>
                        ویرایش اطلاعات
                    </button>
                </div>
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
            <div v-if="showac['resworkshops'].length === 0" class="card-body px-5">
                این کاربر هنوز در دوره ای ثبت نام نکرده است.
            </div>
            <div v-for="item in showac['resworkshops']" class="card-body px-5">
                <div class="row alert alert-dark p-2" role="alert">
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
                    <div class="col-3 col-lg-2">زمان ثبت نام :</div>
                    <div class="col-9 col-lg-4">{{item.created_at}}</div>
                    <div class="col-3 col-lg-2">شماره پیگیری :</div>
                    <div class="col-9 col-lg-4">{{item.authority}}</div>
                </div>
            </div>
        </div>


        <!-- Add & Edit Modal -->
        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" v-text="'ویرایش کاربر'"></h5>
                    </div>

                    <div class="modal-body">
                        <error :error="error"></error>
                        <div v-if="passwordfalsediv" class="alert alert-danger" role="alert">
                            تکرار رمز عبور را صحیح وارد کنید.
                        </div>
                        <form>
                            <div class="row m-0">
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <input type="text" v-model="showac['name']" placeholder="نام کاربر"
                                           class="form-control">
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <input type="text" v-model="showac['family']" placeholder="نام خانوادگی"
                                           class="form-control">
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <input type="text" v-model="showac['mobile']" placeholder="موبایل"
                                           class="form-control">
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <input type="text" v-model="showac['phone']" placeholder="تلفن"
                                           class="form-control">
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <input type="text" v-model="showac['address']" placeholder="آدرس"
                                           class="form-control">
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <input type="text" v-model="showac['major']" placeholder="رشته"
                                           class="form-control">
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <input type="text" v-model="showac['nationalcode']" placeholder="کد ملی"
                                           class="form-control">
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <input type="text" v-model="showac['university']" placeholder="دانشگاه"
                                           class="form-control">
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <input type="text" v-model="showac['birthday']" placeholder="تاریخ تولد"
                                           class="form-control">
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <input type="text" v-model="showac['grade']" placeholder="مدرک"
                                           class="form-control">
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <select class="form-control" v-model="showac['gender']">
                                        <option value="مرد">مرد</option>
                                        <option value="زن">زن</option>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <input type="email" v-model="showac['email']" placeholder="ایمیل"
                                           class="form-control"
                                           name="email">

                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <input type="checkbox" class="form-check-input publish-checkbox mr-2"
                                           v-model="passwordedit">
                                    <label class="form-check-label pr-2 mt-1 mr-4">قصد تغییر رمزعبور را دارید؟</label>
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1" v-if="passwordedit">
                                    <input type="password" v-model="lastpass" placeholder="رمز عبور فعلی"
                                           class="form-control">
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1" v-if="passwordedit">
                                    <input type="password" v-model="password" placeholder="رمز عبور جدید"
                                           :class="{ 'border-green': passwordflag }"
                                           @keyup="checkpassword" class="form-control" name="password">
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1" v-if="passwordedit">
                                    <input type="password" :class="{ 'border-green': passwordflag }"
                                           v-model="confirmpassword" @keyup="checkpassword" class="form-control"
                                           name="confirmpassword" placeholder="تکرار رمز عبور جدید">
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" @click="saveuser" class="btn btn-primary btn-sm px-4">ذخیره</button>
                        <button type="button" class="btn btn-secondary btn-sm px-4" @click="closemodal">بستن</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>


    export default {
        name: "AccountComponent",
        data() {
            return {
                showac: [],

                lastpass: null,
                password: null,
                confirmpassword: null,

                error: [],
                passwordedit: false,
                passwordflag: false,
                passwordfalsediv: false,
            }
        },
        methods: {
            closemodal() {
                $('#Modal').modal('hide');
                this.loadpage();
            },
            saveuser() {
                if ((this.passwordedit == true && this.passwordflag == true) || this.passwordedit == false) {
                    let that = this;
                    let data = {
                        account: this.showac,
                        passwordedit: this.passwordedit,
                        lastpass: this.lastpass,
                        password: this.password,
                        confirmpassword: this.confirmpassword,
                    };
                    axios.post('/saveaccount', data)
                        .then(function (response) {
                            $('#Modal').modal('hide');
                            that.loadpage();
                        }).catch((error) => {
                        that.error = error.response.data.errors;
                    });
                } else {
                    this.passwordfalsediv = true;
                }


            },
            checkpassword() {
                if (this.password == this.confirmpassword) {
                    this.passwordflag = true;
                } else {
                    this.passwordflag = false;
                }
                this.passwordfalsediv = false;
            },
            edituser() {
                this.lastpass = null;
                this.password = null;
                this.confirmpassword = null;
                this.passwordedit = false;
                this.passwordfalsediv = false;
            },
            loadpage() {
                let that = this;
                axios.post('/getaccount')
                    .then(function (response) {
                        that.showac = response.data;
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
