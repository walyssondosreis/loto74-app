import { RouteRecordRaw, createRouter, createWebHashHistory } from "vue-router";
import Inicio from "../views/Inicio.vue";

const routes: RouteRecordRaw[] = [{
    path: '/',
    name: 'Inicio',
    component: Inicio
}];

const router = createRouter({
    history: createWebHashHistory(),
    routes: routes
});

export default router;
