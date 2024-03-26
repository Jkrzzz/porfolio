import { createRouter, createWebHistory } from "vue-router";

import Home from "../components/Home/Home.vue";
import Blog from "../components//Blog/Blog.vue";
import Project from "../components/Project/Project.vue";

const router = createRouter({
    history: createWebHistory("/"),
    routes: [
        { path: "/", component: Home },
        { path: "/blogs", component: Blog },
        { path: "/projects", component: Project },
    ],
});

export default router;
