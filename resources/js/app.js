/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require("./bootstrap");

window.Vue = require('vue');
import Vue from 'vue'
import Vuetify from 'vuetify'

Vue.use(Vuetify)

import 'vuetify/dist/vuetify.min.css' // Ensure you are using css-loader

import Vueditor from 'vueditor' 
import 'vueditor/dist/style/vueditor.min.css' 
let config = { toolbar: [ 'removeFormat', 'undo', '|', 'elements', 'fontName', 'fontSize', 'foreColor', 'backColor', 'divider', 'bold', 'italic', 'underline', 'strikeThrough', 'links', 'divider', 'subscript', 'superscript', 'divider', 'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull', '|', 'indent', 'outdent', 'insertOrderedList', 'insertUnorderedList' ], fontName: [ {val: 'arial black'}, {val: 'times new roman'}, {val: 'Courier New'} ], fontSize: ['12px', '14px', '16px', '18px', '0.8rem', '1.0rem', '1.2rem', '1.5rem', '2.0rem'], uploadUrl: '' }; 
Vue.use(Vueditor, config);

Vue.component('login-form', require('./components/LoginForm.vue').default);

Vue.component('create-post-form', require('./components/CreatePost.vue').default);
Vue.component('nav-bar', require('./components/NavBar.vue').default);
Vue.component('feed-page', require('./components/FeedPage.vue').default);
Vue.component('app-footer', require('./components/AppFooter.vue').default);
Vue.component('post', require('./components/Post.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
