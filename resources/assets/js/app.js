import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import App from "./views/App";
import Home from "./views/Home";
import Login from "./views/Login";
import Register from "./views/Register";
import SingleProduct from "./views/SingleProduct";
import Checkout from "./views/Checkout";
import Confirmation from "./views/Confirmation";
import UserBoard from "./views/UserBoard";
import Admin from "./views/Admin";

const router = new VueRouter({
    mode: history,
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/login",
            name: "login",
            component: Login
        },
        {
            path: "/register",
            name: "register",
            component: Register
        },
        {
            path: "/products/:id",
            name: "single-product",
            component: SingleProduct
        },
        {
            path: "/confirmation",
            name: "confirmation",
            component: Confirmation
        },
        {
            path: "/checkout",
            name: "checkout",
            component: Checkout,
            props: route => ({ pid: route.query.pid })
        },
        {
            path: "/dashboard",
            name: "userboard",
            component: UserBoard,
            meta: {
                requiresAuth: true,
                is_user: true
            }
        },
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/",
            name: "home",
            component: Home
        }
    ]
});
