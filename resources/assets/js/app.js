require('./bootstrap');

window.Vue = require('vue');

Vue.component('DocsMenu', require('./components/Docs/Menu.vue'));

const app = new Vue({
    el: '#app'
});
