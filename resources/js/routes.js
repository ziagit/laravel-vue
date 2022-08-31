window.Vue = require("vue");
import Vue from "vue";
import VueRouter from "vue-router";
import Login from "./components/auth/Login";
import Register from "./components/auth/Register";
import Dashboard from "./components/auth/Dashboard";


Vue.use(VueRouter);
export default new VueRouter({
    mode: "history",
    hash: false,
    routes: [
        {
            name: 'login',
            path: '/login',
            component: Login
        },
        {
            name: 'register',
            path: '/register',
            component: Register,
        },
        {
            name: 'dashboard',
            path: '/dashboard',
            component: Dashboard
        }
    ]
});