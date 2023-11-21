// Axios
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// VueJS
import { createApp } from 'vue';
import App from './components/App.vue';
// const app = createApp(App);
// app.mount('#app');

// AlpineJS
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

