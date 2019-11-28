
require('./bootstrap');

window.Vue = require('vue');
window.axios=require('axios');



Vue.component('firstpage-slider', require('./components/client/FirstpageSlider.vue').default);
Vue.component('last-workshop', require('./components/client/LastWorkshop.vue').default);
Vue.component('about-min', require('./components/client/AboutMin.vue').default);
Vue.component('register-wuser', require('./components/client/RegisterWuser.vue').default);
Vue.component('workshop-list', require('./components/client/WorkshopList.vue').default);
Vue.component('workshop-info', require('./components/client/WorkshopInfo.vue').default);
Vue.component('reservedetail', require('./components/client/ReserveDetail.vue').default);
Vue.component('gallery-workshop', require('./components/client/GalleryWorkshop.vue').default);
Vue.component('about-compo', require('./components/client/AboutCompo.vue').default);
Vue.component('contact-compo', require('./components/client/ContactCompo.vue').default);
Vue.component('account-component', require('./components/client/AccountComponent.vue').default);



Vue.component('error', require('./components/custom/error.vue').default);



const app = new Vue({
    el: '#client',
});





/* npms

npm install verte --save


*/
