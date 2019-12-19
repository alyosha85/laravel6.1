/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require( 'pdfmake' );
require( 'datatables.net-dt' )();
require( 'datatables.net-autofill-dt' )();
require( 'datatables.net-buttons-dt' )();
require( 'datatables.net-buttons/js/buttons.colVis.js' )();
require( 'datatables.net-buttons/js/buttons.flash.js' )();
require( 'datatables.net-buttons/js/buttons.html5.js' )();
require( 'datatables.net-buttons/js/buttons.print.js' )();
require( 'datatables.net-colreorder-dt' )();
require( 'datatables.net-responsive-dt' )();
require( 'datatables.net-fixedheader-dt' )();


window.Vue = require('vue');
import $ from 'jquery';
var $  = require( 'jquery' );
import 'datatables.net';
import 'datatables.net/js/jquery.dataTables';
import 'datatables.net-dt/css/jquery.dataTables.css';
import 'datatables.net-buttons/js/dataTables.buttons';
import 'datatables.net-buttons/js/buttons.colVis';
import 'datatables.net-buttons/js/buttons.print';
import 'datatables.net-buttons/js/buttons.flash';
import 'datatables.net-buttons/js/buttons.html5';
import 'datatables.net-responsive/js/dataTables.responsive';
import 'datatables.net-colreorder/js/dataTables.colReorder';
import 'datatables.net-fixedheader/js/dataTables.fixedHeader';




/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
