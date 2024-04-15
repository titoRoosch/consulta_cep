import { createRouter, createWebHistory } from "vue-router";


const routes = [
    {
        path: "/",
        component: () => import("./components/Home.vue"),
    },
    {
        path: "/main",
        component: () => import("./components/Main.vue"),
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});