require('./bootstrap');
window.Vue = require('vue');

import Droplets from './components/Droplets.vue';

Vue.component('droplets', Droplets);

var digitaloceana = new Vue({
    el: '#digitalocean',
    data: {
        message: 'Hellos Vue!'
    }
})