import Vue from 'vue';
import './bootstrap.js';
import App from './components/App.vue';

import store from './store';

new Vue({
    store,
    el: '#app',
    template: '<App/>',
    components: { App },
});
