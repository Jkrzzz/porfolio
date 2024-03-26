<template>
    <a
        href="#"
        class="scrollup"
        :class="{ 'show-scroll': showScroll == true }"
        @click="scrollToTop"
    >
        <i class="fa-solid fa-arrow-up scrollup__icon"></i>
    </a>
</template>

<script setup>
import { ref, onMounted } from "vue";

const showScroll = ref(false);

const scrollToTop = () => {
    window.scrollTo({
        top: 0,
        behavior: "smooth",
    });
};

onMounted(() => {
    window.addEventListener("scroll", function () {
        if (window.scrollY >= 560) {
            showScroll.value = true;
        } else {
            showScroll.value = false;
        }
    });
});
</script>

<style>
.scrollup {
    position: fixed;
    right: 2.5rem;
    bottom: -20%;
    background-color: var(--title-color);
    opacity: 0.8;
    padding: 0.6rem 0.9rem;
    border-radius: 0.4rem;
    z-index: var(--z-tooltip);
    transition: 0.4s;
}
.scrollup__icon {
    font-size: 1.2rem;
    color: var(--container-color);
}
.scrollup:hover {
    background-color: var(--title-color-dark);
}

/*Shoo Scroll*/
.show-scroll {
    bottom: 3rem;
}

/*=============== BREAKPOINTS ===============*/
/* For large devices */
@media screen and (max-width: 992px) {
    .scrollup {
        right: 1.5rem;
        padding: 0.25rem 0.4rem;
    }
    .scrollup__icon {
        font-size: 1.25rem;
    }
}

/* For medium devices */
@media screen and (max-width: 768px) {
    .show-scroll {
        bottom: 4rem;
    }
}

/* For small devices */
@media screen and (max-width: 350px) {
    .scrollup {
        right: 1rem;
    }
}
</style>
