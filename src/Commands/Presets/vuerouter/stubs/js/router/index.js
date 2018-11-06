import Vue from 'vue';
import VueRouter from 'vue-router';
import { sync } from 'vuex-router-sync';

import Home from '../components/pages/Home.vue';
import NotFound from '../components/pages/NotFound.vue';

import store from '../store';

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home,
        meta: {
            guest: true,
        },
    },
    {
        path: '*',
        component: NotFound,
    },
];

const router = new VueRouter({
    routes,
    mode: 'history',
    saveScrollPosition: false,
});

// router.beforeEach((to, from, next) => {
//     if (to.matched.some(record => record.meta.auth) && !store.getters['logged']) {
//         /**
//          * If the user is not authenticated and visits
//          * a page that requires authentication, redirect to the login page
//          */
//         next({
//             name: 'auth.login',
//             query: {
//                 redirect: to.fullPath,
//             },
//         });
//     } else if (to.matched.some(record => record.meta.guest) && store.getters['logged']) {
//         /**
//          * If the user is authenticated and visits
//          * an guest page, redirect to the homepage
//          */
//         next({
//             name: 'home',
//         });
//     } else {
//         next();
//     }
// });

sync(store, router);

export default router;