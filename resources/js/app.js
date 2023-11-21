// AXIOS
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// JQUERY
import jQuery from 'jquery';
window.$ = jQuery;

// VUE
import { createApp } from 'vue';
import App from './components/App.vue';
// const app = createApp(App);
// app.mount('#app');

// ALPINE
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

// PERSONALIZADO
import './loto';
