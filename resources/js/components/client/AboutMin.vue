<template>

    <div class="backabout mb-5">
        <h3 class="aboutmin" v-html="setting.aboutus">

        </h3>

    </div>

</template>

<script>
    export default {
        name: "LastWorkshop",
        data() {
            return {
                setting: [],
            }
        },
        methods: {},
        mounted() {
            let that = this;
            axios.post('/getsetting')
                .then(function (response) {
                    that.setting = response.data;
                    console.log(response.data);
                });
        }
    }
</script>

<style scoped>
    .backabout {
        height: auto;
        background-attachment: fixed;
        padding-top: 70px;
        padding-bottom: 70px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-image: url('/media/cite/about.png');
        overflow: hidden;
    }

    .backabout h3 {
        font-weight: bolder;
        line-height: 40px;
        background-color: rgba(255, 255, 255, 0.5);
    }

    @media (min-width: 768px) {
        .aboutmin {
            padding: 25px 175px;
        }
    }
    @media (min-width: 544px) {
        .aboutmin {
            padding: 25px 100px;
        }
    }
    @media (max-width: 540px) {
        .aboutmin {
            padding: 25px;
        }
    }

</style>
