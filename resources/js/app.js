import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';

// Import components
import App from './components/App.vue';
import ExampleVue from './components/ExampleComponent.vue';
import Arara from './components/MeuComponente.vue';
// const router = createRouter({
//     history: createWebHistory(),
//     routes: [
//         { path: '/', component: ProductList },
//         { path: '/products/create', component: ProductForm },
//         { path: '/products/:id', component: Product },
//         { path: '/products/:id/edit', component: ProductForm },
//     ]
// });
const app = createApp(Arara);
// app.use(router);
app.mount('#app');
