<template>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" :data-slide-to="index" :class="myactive(index)" v-for="(item, index) in sliderimage"></li>
        </ol>
        <div class="carousel-inner">
            <div :class="'carousel-item' + myactive(index)" v-for="(item, index) in sliderimage">
                <img :src="'/media/slider/1/original_'+ item.image +'.png'" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</template>

<script>
    export default {
        name: "FirstpageSlider",
        data(){
            return{
                sliderimage: null,
            }
        },
        methods:{
            myactive(index){
                if (index == 0){
                    return ' active';
                }else{
                    return '';
                }
            }
        },
        mounted() {
            let that = this;
            axios.post('/getslider')
                .then(function (response) {
                    that.sliderimage = response.data;
                });
        }
    }
</script>

<style scoped>
    #carouselExampleIndicators{
        height: 450px;
    }
    .carousel-inner, .carousel-item, .carousel-item img{
        height: 100%;
    }
    .carousel-control-next-icon, .carousel-control-prev-icon{
        width: 50px;
        height: 50px;
    }
    .carousel-indicators li{
        height: 10px !important;
        border-radius: 4px !important;
        border: none !important;
    }
    .carousel-control-prev{
        background: linear-gradient(to right, #000, transparent);
    }
    .carousel-control-next{
        background: linear-gradient(to left, #000, transparent);
    }

</style>
