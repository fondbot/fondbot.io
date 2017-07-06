import FlagIcon from 'vue-flag-icon';

require('./bootstrap');

window.Vue = require('vue');

Vue.use(FlagIcon);

Vue.component('DocsMenu', require('./components/Docs/Menu.vue'));

const app = new Vue({
    el: '#app'
});
