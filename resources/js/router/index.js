import { createRouter, createWebHistory } from "vue-router";

import Home from "../components/Home/Home.vue";
import Blog from "../components/Blog/Blog.vue";
import BlogDetail from "../components/Blog/BlogDetail.vue";
import Project from "../components/Project/Project.vue";
import NotFound from "../components/NotFound.vue";

const routes = [
    { path: "/", component: Home },
    { path: "/blogs", component: Blog },
    { path: "/blogs/:slug", component: BlogDetail },
    { path: "/projects", component: Project },
    {
        path: "/:pathMatch(.*)",
        component: NotFound,
    },
];

const router = createRouter({
    history: createWebHistory("/"),
    routes: routes,
});

export default router;
