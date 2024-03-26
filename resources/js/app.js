import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";

import "./bootstrap";
import "./app.css";

import Home from "./components/Home/Home.vue";
import Blog from "./components//Blog/Blog.vue";
import Project from "./components/Project/Project.vue";

const app = createApp(App);
app.use(router);
app.mount("#app");
