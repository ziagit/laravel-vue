window.Vue = require("vue");
import Vue from "vue";
import VueRouter from "vue-router";
import Login from "./components/auth/Login";
import Register from "./components/auth/Register"
import Dashboard from "./components/Dashboard"

Vue.use(VueRouter);
export default new VueRouter({
    mode: "history",
    hash: false,
    routes: [
        {
            name: 'Login',
            path: "/login",
            component: Login
        }, {
            name: 'Register',
            path: "/register",
            component: Register
        },
        {
            name: 'Dashboard',
            path: "/dashboard",
            component: Dashboard
        }
    ]
});