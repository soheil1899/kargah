<template>
    <div class="row m-0 justify-content-center py-4">
        <div class="card col-12 col-lg-7">
            <div class="card-body">
                <h5 class="card-title border-right-blue pr-3 py-2"><strong>
                    ایجاد حساب کاربری
                </strong></h5>
                <error :error="error"></error>

                <div class="row m-0 px-5 mt-5">

                    <div class="form-group col-3 mb-1">
                        <label>* نام کاربر :</label>
                    </div>
                    <div class="form-group col-9 mb-1">
                        <input type="text" v-model="name" class="form-control form-control-sm">
                    </div>
                    <div class="form-group col-3 mb-1">
                        <label>* نام خانوادگی :</label>
                    </div>
                    <div class="form-group col-9 mb-1">
                        <input type="text" v-model="family" class="form-control form-control-sm">
                    </div>
                    <div class="form-group col-3 mb-1">
                        <label>* موبایل :</label>
                    </div>
                    <div class="form-group col-9 mb-1">
                        <input type="number" v-model="mobile" class="form-control form-control-sm">
                    </div>
                    <div class="form-group col-3 mb-1">
                        <label>تلفن :</label>
                    </div>
                    <div class="form-group col-9 mb-1">
                        <input type="number" v-model="phone" class="form-control form-control-sm">
                    </div>
                    <div class="form-group col-3 mb-1">
                        <label>آدرس :</label>
                    </div>
                    <div class="form-group col-9 mb-1">
                        <input type="text" v-model="address" class="form-control form-control-sm">
                    </div>
                    <div class="form-group col-3 mb-1">
                        <label>رشته :</label>
                    </div>
                    <div class="form-group col-9 mb-1">
                        <input type="text" v-model="major" class="form-control form-control-sm">
                    </div>
                    <div class="form-group col-3 mb-1">
                        <label>کد ملی :</label>
                    </div>
                    <div class="form-group col-9 mb-1">
                        <input type="number" v-model="nationalcode" class="form-control form-control-sm">
                    </div>
                    <div class="form-group col-3 mb-1">
                        <label>دانشگاه :</label>
                    </div>
                    <div class="form-group col-9 mb-1">
                        <input type="text" v-model="university" class="form-control form-control-sm">
                    </div>
                    <div class="form-group col-3 mb-1">
                        <label>تاریخ تولد :</label>
                    </div>
                    <div class="form-group col-9 mb-1">
                        <input type="text" v-model="birthday" class="form-control form-control-sm">
                    </div>
                    <div class="form-group col-3 mb-1">
                        <label>مدرک :</label>
                    </div>
                    <div class="form-group col-9 mb-1">
                        <input type="text" v-model="grade" class="form-control form-control-sm">
                    </div>
                    <div class="form-group col-3 mb-1">
                        <label>جنسیت :</label>
                    </div>
                    <div class="form-group col-9 mb-1">
                        <select class="form-control form-control-sm" v-model="gender">
                            <option value="مرد">مرد</option>
                            <option value="زن">زن</option>
                        </select>
                    </div>
                    <div class="form-group col-3 mb-1">
                        <label>ایمیل :</label>
                    </div>
                    <div class="form-group col-9 mb-1">
                        <input type="email" v-model="email" class="form-control form-control-sm"
                               name="email">
                    </div>
                    <div class="form-group col-3 mb-1">
                        <label>* رمز عبور :</label>
                    </div>
                    <div class="form-group col-9 mb-1">
                        <input type="password" v-model="password"
                               :class="{ 'border-green': passwordflag }"
                               @keyup="checkpassword" class="form-control form-control-sm" name="password">
                    </div>
                    <div class="form-group col-3 mb-1">
                        <label>* تکرار رمز عبور :</label>
                    </div>
                    <div class="form-group col-9 mb-1">
                        <input type="password" :class="{ 'border-green': passwordflag }"
                               v-model="confirmpassword" @keyup="checkpassword" class="form-control form-control-sm"
                               name="confirmpassword">
                    </div>

                </div>
                <div class="mt-5">
                    <input @click="saveuser" class="btn btn-primary float-left pointer" value="ایجاد حساب کاربری">

                    <a :href="'/loginwu'" class="pointer textblue"><strong class="textblue">
                        قبلا ثبت نام کرده اید، وارد شوید
                    </strong></a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "RegisterWuser",
        data() {
            return {
                error: [],

                name: null,
                family: null,
                mobile: null,
                phone: null,
                address: null,
                major: null,
                nationalcode: null,
                university: null,
                birthday: null,
                grade: null,
                gender: 'مرد',
                email: null,
                password: null,
                confirmpassword: null,
                passwordflag: false,
            }
        },

        methods: {
            checkpassword() {
                if (this.password == this.confirmpassword) {
                    this.passwordflag = true;
                } else {
                    this.passwordflag = false;
                }
                this.passwordfalsediv = false;
            },


            saveuser() {
                if (this.passwordflag == true) {
                    let that = this;
                    let data = {
                        name: this.name,
                        family: this.family,
                        mobile: this.mobile,
                        phone: this.phone,
                        address: this.address,
                        major: this.major,
                        nationalcode: this.nationalcode,
                        university: this.university,
                        birthday: this.birthday,
                        grade: this.grade,
                        gender: this.gender,
                        email: this.email,
                        password: this.password,
                    };
                    axios.post('/registerwuser', data)
                        .then(function (response) {
                            window.location = '/';
                        }).catch((error) => {
                        that.error = error.response.data.errors;
                    });
                } else {
                    this.passwordfalsediv = true;
                }

            },
        },
    }
</script>

<style scoped>


</style>
