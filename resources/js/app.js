
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('es6-promise').polyfill();

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('dictionary-component', require('./components/DictionaryComponent.vue'));
Vue.component('word-component', require('./components/WordComponent.vue'));
Vue.component('word-translate-component', require('./components/WordTranslateComponent.vue'));
Vue.component('repeat-word-component', require('./components/RepeatWordComponent.vue'));

Vue.component('reader-component', require('./components/ReaderComponent.vue'));
Vue.component('reader-hand-component', require('./components/ReaderHandComponent.vue'));

Vue.component('attention-component', require('./components/AttentionComponent.vue'));
Vue.component('picture-component', require('./components/PictureComponent.vue'));

Vue.component('words-list-component', require('./components/WordsListComponent.vue'));

const app = new Vue({
    el: '#app'
});
