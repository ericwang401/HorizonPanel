/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import Vue from 'vue';
import Vuetify from '@/plugins/vuetify';
import Route from '@/js/routes.js';
import App from '@/js/App.vue';
import i18n from '@/plugins/multilanguage'

const app = new Vue({
    vuetify: Vuetify,
    el: '#app',
    router: Route,
    i18n,
    render: h => h(App)
});

export default app;