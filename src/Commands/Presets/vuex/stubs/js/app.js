import Vue from 'vue';

import './bootstrap.js';
import router from './router';
import store from './store';

import App from './components/App.vue';

new Vue({
    router,
    store,
    el: '#app',
    template: '<App/>',
    components: { App },
});
