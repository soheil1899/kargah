<template>
    <div class="container">
        <h4 class="mt-5 mb-4 borderright-blue pr-3 py-2"><strong>
            گالری تصاویر
        </strong></h4>
        <div class="container" v-for="item in gallery">
            <h6 class="mt-5 mb-4 border-right-blue pr-3"><strong>
                {{item.title}}
            </strong></h6>

            <div class="row mx-0 my-5 px-5">
                <div class="col-6 col-lg-3 pb-2" v-for="(image, i) in images" @click="onClick(i)" v-if="image.galleryid === item.id">
                    <img class="image" :src="image.name" width="100%" height="100%">
                </div>

            </div>




            <div dir="ltr">
            <vue-gallery-slideshow :images="allimages" :index="index" @close="index = null"></vue-gallery-slideshow>
            </div>



        </div>

        <nav aria-label="Page navigation example" v-if="meta.last_page > 1" class="my-5 mx-auto">
            <ul class="pagination justify-content-center">
                <li class="page-item pointer" @click="gobackpage">
                    <a class="page-link pagination-portfolio" tabindex="-1">قبلی</a>
                </li>
                <li class="page-item pointer" v-for="i in meta.last_page" @click="loadfunction(i)"><a
                    class="page-link pagination-portfolio" :style="activebtn(i)">{{ i }}</a></li>
                <li class="page-item pointer" @click="gonextpage">
                    <a class="page-link pagination-portfolio">بعدی</a>
                </li>
            </ul>
        </nav>
    </div>

</template>

<script>

    import VueGallerySlideshow from 'vue-gallery-slideshow'

    export default {
        name: "GalleryWorkshop",
        data() {
            return {
                gallery: [],
                images: [],
                allimages:[],
                meta: [],
                currentpage: null,
                index: null,
            }
        },
        components: {
            VueGallerySlideshow
        },
        methods: {
            onClick(i) {
                this.index = i;
            },

            loadfunction (page = 1) {
                this.currentpage = page;
                let that = this;
                let data = {
                    page: page,
                };
                axios.post('/getgallery', data)
                    .then(function (response) {
                        that.gallery = response.data.data;
                        var counter = 1;
                        for (var i = 0; i < that.gallery.length; i++) {
                            for (var j = 0; j < that.gallery[i]['galleries'].length; j++) {
                                var newarr = [];
                                newarr['id'] = counter;
                                newarr['galleryid'] = that.gallery[i]['id'];
                                newarr['name'] = '/media/article/' + that.gallery[i]['id'] + '/gallery/gallery_' + that.gallery[i]['galleries'][j]['image'] + '.png';
                                that.images.push(newarr);
                                that.allimages.push('/media/article/' + that.gallery[i]['id'] + '/gallery/gallery_' + that.gallery[i]['galleries'][j]['image'] + '.png');
                                counter++;
                            }
                        }
                        console.log(that.images);

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
    .pagination-portfolio {
        color: #000 !important;
    }
</style>
