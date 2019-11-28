<template>
    <div>
        <h4 class="admin-title py-3 px-4"> لیست کارگاه ها </h4>

        <input type="button" @click="addworkshop" class="btn btn-success btn-sm my-2" data-toggle="modal"
               data-target="#Modal" value="افزودن کارگاه جدید">
        <input type="button" @click="reloadPage" class="btn btn-dark btn-sm my-2 mr-1" value="بازخوانی">

        <a :href="'../dashboard'" class="back-btn btn btn-sm btn-dark my-2 mr-1">داشبورد</a>


        <table class="table table-hover table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">عنوان کارگاه</th>
                <th scope="col">وضعیت</th>
                <th scope="col">ظرفیت</th>
                <th scope="col">جنسیت</th>
                <th scope="col">شروع ث</th>
                <th scope="col">پایان ث</th>
                <th scope="col">زمان</th>
                <th scope="col">استاد</th>
                <th scope="col">هزینه</th>
                <th scope="col">تعداد</th>
                <th scope="col" v-if="admintype == 'admin'">نمایش</th>
                <th scope="col" width="10%" class="p-0">
                    <i class="fas fa-cogs fa-2x mb-2"></i>
                </th>

            </tr>
            </thead>
            <tbody>
            <tr v-for="(item, index) in this.workshoplist" :key="item.id">
                <th class="py-2" scope="row">{{index + 1}}</th>
                <td class="py-2">{{item.title}}</td>
                <td class="py-2">{{item.status}}</td>
                <td class="py-2">{{item.capacity}}</td>
                <td class="py-2">{{item.gender}}</td>
                <td class="py-2">{{item.startregister}}</td>
                <td class="py-2">{{item.endregister}}</td>
                <td class="py-2">{{item.date}}</td>
                <td class="py-2">{{item.teacher}}</td>
                <td class="py-2">{{item.price}}</td>
                <td class="py-2">{{item.resworkshops.length}}</td>
                <td class="py-2" v-if="admintype == 'admin'">
                    <i @click="changepublish(item.id ,0)" class="far fa-check-circle fa-lg ml-2 pointer mt-2"
                       v-if="item.publish == 1"></i>
                    <i @click="changepublish(item.id ,1)" class="fas fa-ban fa-lg ml-2 pointer mt-2" v-else></i>
                </td>
                <td class="py-1 icons">
                    <i title="شاگردان" @click="getusers(item.id, item.title)" class="fas fa-users fa-lg mt-2 mx-1"></i>
                    <i title="ویرایش" class="far fa-edit fa-lg mt-2 mx-1" data-toggle="modal" data-target="#Modal"
                       @click="edituser(item.id, item.title, item.status, item.time, item.target, item.capacity, item.gender, item.startregister, item.endregister, item.place, item.date, item.firstclass, item.teacher, item.price, item.poster)"></i>
                    <i title="توضیحات" class="far fa-keyboard fa-lg mt-2 mx-1"
                       @click="setdes(item.id, item.title, item.description)"></i>
                    <i title="پوستر" class="far fa-image fa-lg mt-2 mx-1" @click="browsefile2(item.id)"></i>
                    <i v-if="item.resworkshops.length == 0" title="حذف" class="far fa-trash-alt fa-lg mt-2 mx-1" @click="deleteworkshop(item.id)"></i>
                </td>
            </tr>

            </tbody>
        </table>
        <input type="file" class="d-none" id="browse2" ref="image2"
               @change="selectimage2" accept=".jpg, .png, .jpeg">


        <!-- Add & Edit Modal -->
        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" v-if="editflag == true" v-text="'ویرایش کارگاه'"></h5>
                        <h5 class="modal-title" v-else v-text="'افزودن کارگاه جدید'"></h5>
                    </div>

                    <div class="modal-body">
                        <error :error="error"></error>

                        <form>
                            <div class="row m-0">
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <input type="text" v-model="title" placeholder="عنوان کارگاه"
                                           class="form-control">
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <select class="form-control" v-model="status">
                                        <option value="ثبت نام">ثبت نام</option>
                                        <option value="تکمیل ظرفیت">تکمیل ظرفیت</option>
                                        <option value="پایان ثبت نام">پایان ثبت نام</option>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <input type="number" v-model="time" placeholder="مدت آموزش"
                                           class="form-control">
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <input type="text" v-model="target" placeholder="گروه هدف"
                                           class="form-control">
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <input type="number" v-model="capacity" placeholder="ظرفیت کارگاه"
                                           class="form-control">
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <select class="form-control" v-model="gender">
                                        <option value="مختلط">مختلط</option>
                                        <option value="آقایان">آقایان</option>
                                        <option value="بانوان">بانوان</option>
                                    </select>
                                </div>
                                <div class="form-group col-5 col-lg-3 mb-1 pt-1 pl-1">
                                    تاریخ شروع ثبت نام:
                                </div>
                                <div class="form-group col-7 col-lg-3 mb-1 pr-1">
                                    <date-picker v-model="startregister"></date-picker>
                                </div>
                                <div class="form-group col-5 col-lg-3 mb-1 pt-1 pl-1">
                                    تاریخ پایان ثبت نام:
                                </div>
                                <div class="form-group col-7 col-lg-3 mb-1 pr-1">
                                    <date-picker v-model="endregister"></date-picker>
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <input type="text" v-model="place" placeholder="مکان کلاس ها"
                                           class="form-control">
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <input type="text" v-model="date" placeholder="زمان کلاس ها"
                                           class="form-control">
                                </div>
                                <div class="form-group col-5 col-lg-3 mb-1 pt-1 pl-1">
                                    اولین جلسه کارگاه:
                                </div>

                                <div class="form-group col-7 col-lg-3 mb-1 pr-1">
                                    <date-picker v-model="firstclass"></date-picker>
                                </div>
                                <div class="form-group col-7 push-5 push-lg-0 col-lg-6 mb-1 pt-1 pl-1">
                                    <div class="form-check">
                                        <input class="form-check-input mr-0" type="checkbox" v-model="firstclassflag" @change="changefirstclass">
                                        <label class="form-check-label">
                                            متعاقبا اعلام می شود.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <input type="text" v-model="teacher" placeholder="استاد"
                                           class="form-control">
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-1">
                                    <input type="number" v-model="price" placeholder="هزینه کارگاه"
                                           class="form-control">
                                </div>

                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button @click="saveworkshop" type="button" class="btn btn-primary btn-sm px-4">
                            ذخیره
                        </button>
                        <button type="button" class="btn btn-secondary btn-sm px-4" data-dismiss="modal">
                            بستن
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="naghdmodal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">توضیحات مربوط به کارگاه
                            {{title}}
                        </h5>
                    </div>

                    <div class="modal-body row">
                        <div class="col-12 col-lg-9" style="direction: ltr">
                            <editor v-model="text" ref="editor"
                                    api-key="qc1sdre33bdx4lkj24aw4ffoeyx1rvbohr9ow2hzhjgfu2mi"
                                    :init="{ height: 300 ,plugins: 'link fullscreen table','directionality' : 'rtl',toolbar: 'undo redo | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | fontselect fontsizeselect |  outdent indent | link | ltr rtl', }"></editor>
                        </div>

                        <div class="col-12 col-lg-3">
                            <div class="card">
                                <div class="card-header row m-0 p-1 pt-2">
                                    <div class="col-7">
                                        مدیریت فایل
                                    </div>
                                    <div class="col-4 icons">
                                        <i @click="browsefile" class="fas fa-plus-square fa-2x"
                                           style="color: #5BB760"></i>
                                    </div>
                                    <input type="file" style="display: none" id="browse" ref="imagetext"
                                           @change="selecttextimage">
                                </div>
                                <div class="card-body p-2">
                                    <div v-for="(file, index) in filemanagerids" :key="file.id"
                                         class="m-1 float-right position-relative icons">
                                        <img :src="file.small" @click="selectImage(file.original)">
                                        <i title="پاک کردن" class="fas fa-trash position-absolute delete-filemanager"
                                           @click="deletefilemanager(file.small, file.original, index)"></i>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-sm px-4" @click="savedes">ذخیره</button>
                        <button type="button" class="btn btn-secondary btn-sm px-4" data-dismiss="modal">بستن</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="ModalUsers" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">اسامی ثبت نام کنندگان در کارگاه
                            {{title}}
                        </h5>
                    </div>

                    <div class="modal-body px-5">
                        <table class="table table-sm" v-if="registerusers.length > 0">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نام و نام خانوادگی</th>
                                <th scope="col">شماره موبایل</th>
                                <th scope="col">تاریخ ثبت نام</th>
                                <th scope="col">زمان ثبت نام</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(item, index) in registerusers">
                                <th scope="row">{{index +1}}</th>
                                <td>{{item.wuser.name + ' ' + item.wuser.family}}</td>
                                <td>{{item.wuser.mobile}}</td>
                                <td>{{item.date}}</td>
                                <td>{{item.time}}</td>
                            </tr>

                            </tbody>
                        </table>
                        <div class="alert alert-danger" role="alert" v-else>
                            تاکنون کسی در این کارگاه ثبت نام نکرده است
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm px-4" data-dismiss="modal">بستن</button>
                    </div>
                </div>
            </div>
        </div>

        <nav aria-label="Page navigation example" v-if="meta.last_page > 1" class="my-5 mx-auto">
            <ul class="pagination justify-content-center">
                <li class="page-item pointer" v-on:click="gobackpage">
                    <a class="page-link pagination-portfolio" tabindex="-1">قبلی</a>
                </li>
                <li class="page-item pointer" v-for="i in meta.last_page" v-on:click="reloadPage(i)"><a
                    class="page-link pagination-portfolio" :style="activebtn(i)">{{ i }}</a></li>
                <li class="page-item pointer" v-on:click="gonextpage">
                    <a class="page-link pagination-portfolio">بعدی</a>
                </li>
            </ul>
        </nav>

    </div>

</template>

<script>
    import moment from 'jalali-moment';
    import Editor from '@tinymce/tinymce-vue';
    import VuePersianDatetimePicker from 'vue-persian-datetime-picker';


    export default {
        name: "WorkshopComponent",
        props: ['adminflag'],
        data() {
            return {
                editflag: false,
                workshoplist: [],

                id: null,
                title: null,
                status: 'ثبت نام',
                time: null,
                target: null,
                capacity: null,
                gender: 'مختلط',
                startregister: null,
                endregister: null,
                place: null,
                date: null,
                firstclass: null,
                firstclassflag: false,
                teacher: null,
                price: null,
                poster: 0,
                text: '',
                description: '',

                admintype: '',

                filemanagerids: [],

                error: [],

                registerusers: [],
                meta: [],
                currentpage: null,

            }
        },
        components: {
            'editor': Editor,
            datePicker: VuePersianDatetimePicker,
        },
        methods: {
            deleteworkshop(id){
                let that = this;
                let data = {
                    id: id,
                };
                axios.post('/dashboard/deleteworkshop', data)
                    .then(function (response) {
                        that.registerusers = response.data;
                        that.reloadPage();
                    });
            },
            changefirstclass(){
                if (this.firstclassflag){
                    this.firstclass = null;
                }
            },
            getusers(id, title) {
                this.id = id;
                this.title = title;
                let that = this;
                let data = {
                    id: id,
                };
                axios.post('/dashboard/getworkshopusers', data)
                    .then(function (response) {
                        that.registerusers = response.data;
                        for (var i = 0; i < that.registerusers.length; i++) {
                            that.registerusers[i]['time'] = (that.registerusers[i]['created_at']).slice(11, 16);
                            that.registerusers[i]['date'] = moment((that.registerusers[i]['created_at']).slice(0, 10), 'YYYY/MM/DD').locale('fa').format('YYYY/MM/DD');

                        }
                        console.log(response.data);
                        $('#ModalUsers').modal('show');
                    });
            },
            changepublish(id, changeto) {
                let that = this;
                let data = {
                    id: id,
                    publish: changeto,
                };

                axios.post('/dashboard/changepublishworkshop', data)
                    .then(function (response) {
                        that.reloadPage();
                    });
            },

            browsefile2(id) {
                this.id = id;
                document.getElementById("browse2").click();
            },

            selectimage2() {
                let that = this;
                let formData = new FormData();
                formData.append('image', this.$refs.image2[0].files[0]);
                formData.append('workshopid', this.id);

                axios.post('/dashboard/savewrokshopimage'
                    , formData
                    , {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(function (response) {
                        that.reloadPage();
                    });
            },


            browsefile() {
                document.getElementById("browse").click();
            },
            selectImage(original) {
                let Imagetag = '<img src="' + original + '" width="200px">';
                this.text += Imagetag;
            },
            selecttextimage() {
                let that = this;
                let formData = new FormData();
                formData.append('image', this.$refs.imagetext.files[0]);
                formData.append('productid', this.id);
                axios.post('/dashboard/savefile'
                    , formData
                    , {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }

                    })
                    .then(function (response) {
                        let newfile = [];
                        newfile['small'] = '/media/filemanager/product/' + that.id + '/itemsmall_' + response.data + '.png';
                        newfile['original'] = '/media/filemanager/product/' + that.id + '/item_' + response.data + '.png';
                        that.filemanagerids.push(newfile);
                    });
            },
            setdes(id, title, des) {
                this.title = title;
                this.id = id;
                this.text = des;
                if (des == null) {
                    this.text = '';
                }
                let that = this;
                let data = {
                    productid: this.id,
                };
                axios.post('/dashboard/getfilemanager', data)
                    .then(function (response) {
                        try {
                            that.filemanagerids = [];
                            for (var i = 0; i < response.data.length; i++) {
                                let newfile = [];
                                newfile['small'] = '/media/filemanager/product/' + id + '/itemsmall_' + response.data[i]['randomnum'] + '.png';
                                newfile['original'] = '/media/filemanager/product/' + id + '/item_' + response.data[i]['randomnum'] + '.png';
                                that.filemanagerids.push(newfile);
                            }
                        } catch (e) {

                        }
                    });
                $('#naghdmodal').modal('show');

            },
            savedes() {
                let that = this;
                let data = {
                    workshopid: this.id,
                    des: this.text,
                };
                axios.post('/dashboard/savedescription', data)
                    .then(function (response) {
                        $('#naghdmodal').modal('hide');
                        that.reloadPage();
                    });
            },


            addworkshop() {
                this.error = [];
                this.editflag = false;

                this.id = null;
                this.title = null;
                this.status = 'ثبت نام';
                this.time = null;
                this.target = null;
                this.capacity = null;
                this.gender = 'مختلط';
                this.firstclassflag = false;
                this.startregister = null;
                this.endregister = null;
                this.place = null;
                this.date = null;
                this.firstclass = null;
                this.teacher = null;
                this.price = null;
                this.poster = 0;
                this.description = null;
            },
            edituser(id, title, status, time, target, capacity, gender, startregister, endregister, place, date, firstclass, teacher, price, poster) {
                this.error = [];
                this.editflag = true;

                this.id = id;
                this.title = title;
                this.status = status;
                this.time = time;
                this.target = target;
                this.capacity = capacity;
                this.gender = gender;
                this.startregister = startregister;
                this.endregister = endregister;
                this.place = place;
                this.date = date;
                this.teacher = teacher;
                this.price = price;
                this.poster = poster;
            },
            saveworkshop() {
                let that = this;
                let data = {
                    id: this.id,
                    editflag: this.editflag,
                    title: this.title,
                    status: this.status,
                    time: this.time,
                    target: this.target,
                    capacity: this.capacity,
                    gender: this.gender,
                    startregister: this.startregister,
                    endregister: this.endregister,
                    place: this.place,
                    date: this.date,
                    firstclass: this.firstclass,
                    teacher: this.teacher,
                    price: this.price,
                    poster: this.poster,
                    description: this.description,
                };
                axios.post('/dashboard/saveworkshop', data)
                    .then(function (response) {
                        $('#Modal').modal('hide');
                        that.reloadPage();
                    }).catch((error) => {
                    that.error = error.response.data.errors;
                });
            },

            reloadPage(page = 1) {
                this.currentpage = page;
                let data = {
                    page: page,
                };
                let that = this;
                axios.post('/dashboard/workshops', data)
                    .then(function (response) {
                        that.workshoplist = response.data.data;
                        that.meta = response.data.meta;
                    });
            },
            gobackpage() {
                if (this.currentpage != 1) {
                    this.reloadPage(this.currentpage - 1);
                }
            },
            gonextpage() {
                if (this.currentpage != this.meta.last_page) {
                    this.reloadPage(this.currentpage + 1);
                }
            },
            activebtn(i) {
                if (i == this.currentpage) {
                    return "background-color: #e3e4e4;";
                }
            },
        },
        mounted() {
            if (this.adminflag == 1) {
                this.admintype = 'admin';
            } else {
                this.admintype = 'subadmin';
            }

            this.reloadPage();
        }
    }
</script>

<style scoped>

</style>
