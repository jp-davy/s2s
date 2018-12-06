
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Errors from './components/errors';
import Form from './components/form';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

Vue.component('example-component', require('./components/ExampleComponent.vue'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/*import moment from 'moment';

var formatter = {
    date: function (value, format) { 
        if (value) {
            return moment(String(value)).format(format || 'MM.DD.YYYY')
        }
    },
    time: function (value, format) {
        if (value) {
            return moment(String(value)).format(format || 'h:mm A');
        }
    }
};

Vue.component('format', {
    template: `<span>{{ formatter[fn](value, format) }}</span>`,
    props: ['value', 'fn', 'format'],
    computed: {
        formatter() {
            return formatter;
        }
    }
});*/

const app = new Vue({
    el: '#app'
});
