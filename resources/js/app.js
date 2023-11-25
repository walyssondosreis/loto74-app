// Axios
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// AlpineJS
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

