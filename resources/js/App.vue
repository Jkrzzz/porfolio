<template>
    <div>
        <Nav :scrollTo="scrollTo"></Nav>
        <router-view></router-view>
        <Footer :scrollTo="scrollTo" />
        <Scrollup />
    </div>
</template>

<script setup>
import Nav from "./components/Nav.vue";
import Footer from "./components/Footer.vue";
import Scrollup from "./components/Scrollup.vue";

const scrollDowm = (target) => {
    const element = document.querySelector(target);
    if (element) {
        element.scrollIntoView({ behavior: "smooth" });
    }
};

const scrollTo = (target) => {
    if (router.currentRoute.value.path !== "/") {
        setTimeout(() => {
            scrollDowm(target);
        }, 100);
    } else {
        scrollDowm(target);
    }
};
</script>

<style>
body {
    font-family: "Nova Square", sans-serif;
}
html {
    scroll-behavior: smooth;
}
</style>
