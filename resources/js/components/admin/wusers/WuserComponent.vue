<template>

    <div>
        <h4 class="admin-title py-3 px-4"> لیست کاربران </h4>

        <input type="button" @click="adduser" class="btn btn-success btn-sm my-2" data-toggle="modal"
               data-target="#Modal" value="افزودن کاربر جدید">
        <input type="button" @click="reloadPage" class="btn btn-dark btn-sm my-2 mr-1" value="بازخوانی">

        <a :href="'../dashboard'" class="back-btn btn btn-sm btn-dark my-2 mr-1">داشبورد</a>


        <table class="table table-hover table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">#</th>
                <th scope="col">نام کاربر</th>
                <th scope="col">موبایل</th>
                <th scope="col">ایمیل</th>
                <th scope="col">رشته</th>
                <th scope="col">مدرک</th>
                <th scope="col" class="p-0">
                    <i class="fas fa-cogs fa-2x mb-2"></i>
                </th>

            </tr>
            </thead>
            <tbody>
            <tr v-for="(item, index) in this.userlist" :key="item.id">
                <th class="py-2" scope="row">{{index + 1}}</th>
                <td class="py-2">{{item.name + ' ' + item.family}}</td>
                <td class="py-2">{{item.mobile}}</td>
                <td class="py-2">{{item.email}}</td>
                <td class="py-2">{{item.major}}</td>
                <td class="py-2">{{item.grade}}</td>
                <td class="py-1 icons">

                    <i title="ویرایش" class="far fa-edit fa-lg mt-2 mx-1" data-toggle="modal" data-target="#Modal"
                       @click="edituser(item.id, item.name, item.family, item.mobile, item.phone, item.address, item.major, item.nationalcode, item.university, item.email, item.birthday, item.grade, item.gender)"></i>
                    <a :href="'wuser/'+item.id">
                        <i title="جزئیات" class="fas fa-info-circle fa-lg mt-2 mx-1"></i>
                    </a>
                </td>
            </tr>

            </tbody>
        </table>


        <!-- Add & Edit Modal -->
        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" v-if="editflag == true" v-text="'ویرایش کاربر'"></h5>
                        <h5 class="modal-title" v-else v-text="'افزودن کاربر جدید'"></h5>
                    </div>

                    <div class="modal-body">
                        <error :error="error"></error>
                        <div v-if="passwordfalsediv" class="alert alert-danger" role="alert">
                            تکرار رمز عبور را صحیح وارد کنید.
                        </div>
                        <form>
                            <div class="row m-0">
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <input type="text" v-model="name" placeholder="نام کاربر" class="form-control">
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <input type="text" v-model="family" placeholder="نام خانوادگی" class="form-control">
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <input type="text" v-model="mobile" placeholder="موبایل" class="form-control">
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <input type="text" v-model="phone" placeholder="تلفن" class="form-control">
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <input type="text" v-model="address" placeholder="آدرس" class="form-control">
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <input type="text" v-model="major" placeholder="رشته" class="form-control">
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <input type="text" v-model="nationalcode" placeholder="کد ملی" class="form-control">
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <input type="text" v-model="university" placeholder="دانشگاه" class="form-control">
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <input type="text" v-model="birthday" placeholder="تاریخ تولد" class="form-control">
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <input type="text" v-model="grade" placeholder="مدرک" class="form-control">
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <select class="form-control" v-model="gender">
                                        <option value="مرد">مرد</option>
                                        <option value="زن">زن</option>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <input type="email" v-model="email" placeholder="ایمیل" class="form-control"
                                           name="email">

                                </div>
                                <div class="form-group col-12 mb-1" v-if="editflag">
                                    <input type="checkbox" class="form-check-input publish-checkbox mr-2"
                                            v-model="passwordedit">
                                    <label class="form-check-label pr-2 mt-1 mr-4">قصد تغییر رمزعبور را دارید؟</label>
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1" v-if="passwordedit">
                                    <input type="password" v-model="password" placeholder="رمز عبور"
                                           :class="{ 'border-green': passwordflag }"
                                           @keyup="checkpassword" class="form-control" name="password">
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1" v-if="passwordedit">
                                    <input type="password" :class="{ 'border-green': passwordflag }"
                                           v-model="confirmpassword" @keyup="checkpassword" class="form-control"
                                           name="confirmpassword" placeholder="تکرار رمز عبور">
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button @click="saveuser" type="button" class="btn btn-primary btn-sm px-4">ذخیره</button>
                        <button type="button" class="btn btn-secondary btn-sm px-4" data-dismiss="modal">بستن</button>
                    </div>
                </div>
            </div>
        </div>


    </div>


</template>

<script>

    export default {
        name: "WuserComponent",
        data() {
            return {
                editflag: false,
                userlist: [],

                userid: null,
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

                passwordedit: false,
                error: [],
                passwordflag: false,
                passwordfalsediv: false,

            }
        },
        methods: {
            reloadPage() {
                let that = this;
                axios.post('/dashboard/wusers')
                    .then(function (response) {
                        that.userlist = response.data;
                    });
            },

            adduser() {
                this.error = [];
                this.editflag = false;

                this.userid = null;
                this.name = null;
                this.family = null;
                this.mobile = null;
                this.phone = null;
                this.address = null;
                this.major = null;
                this.nationalcode = null;
                this.university = null;
                this.birthday = null;
                this.grade = null;
                this.gender = 'مرد';
                this.email = null;
                this.password = null;
                this.confirmpassword = null;

                this.passwordflag = false;
                this.passwordfalsediv = false;
                this.passwordedit = true;
            },

            edituser(id, name, family, mobile, phone, address, major, nationalcode, university, email, birthday, grade, gender) {
                this.error = [];
                this.editflag = true;

                this.userid = id;
                this.name = name;
                this.family = family;
                this.mobile = mobile;
                this.phone = phone;
                this.address = address;
                this.major = major;
                this.nationalcode = nationalcode;
                this.university = university;
                this.birthday = birthday;
                this.grade = grade;
                this.gender = gender;
                this.email = email;

                this.passwordedit = false;
                this.passwordfalsediv = false;
            },


            saveuser() {
                if (this.passwordedit == true) {
                    if (this.passwordflag == true) {
                        let that = this;
                        let data = {
                            id: this.userid,
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
                            passwordedit: this.passwordedit,
                            password: this.password,
                            editflag: this.editflag,
                        };
                        axios.post('/dashboard/savewuser', data)
                            .then(function (response) {
                                $('#Modal').modal('hide');
                                that.reloadPage();
                            }).catch((error) => {
                            that.error = error.response.data.errors;
                        });
                    } else {
                        this.passwordfalsediv = true;
                    }
                } else {
                    let that = this;
                    let data = {
                        id: this.userid,
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
                        editflag: this.editflag,
                    };
                    axios.post('/dashboard/savewuser', data)
                        .then(function (response) {
                            $('#Modal').modal('hide');
                            that.reloadPage();
                        }).catch((error) => {
                        that.error = error.response.data.errors;
                    });
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
        }
        ,

        mounted() {
            this.reloadPage();
        }


    }

</script>

<style scoped>


</style>
