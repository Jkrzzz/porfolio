<template>
    <nav class="nav-bg fixed top-0 w-full z-20">
        <div
            class="flex justify-between items-center mx-auto w-11/12 lg:w-8/12 py-4 relative"
        >
            <router-link
                to="#"
                class="flex items-center space-x-3 rtl:space-x-reverse"
            >
                <span
                    class="self-center text-2xl font-semibold whitespace-nowrap"
                >
                    <router-link to="/#home_tag" @click="scrollTo('#home_tag')"
                        >Hein</router-link
                    >
                </span>
            </router-link>
            <div
                v-show="isMenuOpen || !isMobileView"
                id="navbar_cta"
                class="flex items-center md:block"
                :class="{ 'absolute top-16 w-full': isMobileView }"
            >
                <ul
                    class="flex flex-col md:nav__ul md:flex-row md:space-x-8 rtl:space-x-reverse nav__ul"
                    :class="{
                        'w-full bg-white border-gray-700': isMobileView,
                    }"
                >
                    <li>
                        <router-link
                            to="/#home_tag"
                            :class="{
                                nav__link__active:
                                    activeSection === 'home_tag' || activeSection ==='' &&
                                    $route.path === '/' && 
                                    !isMobileView,
                            }"
                            class="block py-4 md:py-2 mx-2 w-full"
                            aria-current="page"
                            @click="scrollTo('#home_tag')"
                        >
                            Home
                        </router-link>
                    </li>
                    <li>
                        <router-link
                            to="/#bio_tag"
                            :class="{
                                nav__link__active:
                                    activeSection === 'bio_tag' &&
                                    $route.path === '/' &&
                                    !isMobileView,
                            }"
                            class="block py-4 md:py-2 mx-2 w-full"
                            aria-current="page"
                            @click="scrollTo('#bio_tag')"
                        >
                            About
                        </router-link>
                    </li>
                    <li>
                        <router-link
                            to="/#skill_tag"
                            :class="{
                                nav__link__active:
                                    activeSection === 'skill_tag' &&
                                    $route.path === '/' &&
                                    !isMobileView,
                            }"
                            class="block py-4 md:py-2 mx-2 w-full"
                            aria-current="page"
                            @click="scrollTo('#skill_tag')"
                        >
                            Skill
                        </router-link>
                    </li>
                    <li>
                        <router-link
                            to="/#service_tag"
                            :class="{
                                nav__link__active:
                                    activeSection === 'service_tag' &&
                                    $route.path === '/' &&
                                    !isMobileView,
                            }"
                            class="block py-4 md:py-2 mx-2 w-full"
                            aria-current="page"
                            @click="scrollTo('#service_tag')"
                        >
                            Service
                        </router-link>
                    </li>
                    <li>
                        <router-link
                            to="/blogs"
                            class="block py-4 md:py-2 mx-2 w-full"
                            :class="{
                                nav__link__active:
                                    $route.path === '/blogs' && !isMobileView,
                            }"
                            aria-current="page"
                            @click="toggleMenu"
                        >
                            Blogs
                        </router-link>
                    </li>
                    <li>
                        <router-link
                            to="/projects"
                            class="block py-4 md:py-2 mx-2 w-full"
                            aria-current="page"
                            :class="{
                                nav__link__active:
                                    $route.path === '/projects' &&
                                    !isMobileView,
                            }"
                            @click="toggleMenu"
                        >
                            Projects
                        </router-link>
                    </li>
                    <li>
                        <router-link
                            to="/#contact_tag"
                            :class="{
                                nav__link__active:
                                    activeSection === 'contact_tag' &&
                                    !isMobileView,
                            }"
                            class="block py-4 md:py-2 mx-2"
                            aria-current="page"
                            @click="scrollTo('#contact_tag')"
                            >Contact</router-link
                        >
                    </li>
                </ul>
            </div>
            <div class="flex items-center md:hidden">
                <ul class="flex">
                    <li>
                        <button
                            @click="toggleMenu"
                            type="button"
                            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                            aria-controls="navbar_cta"
                            :aria-expanded="isMenuOpen.toString()"
                        >
                            <span class="sr-only">Open main menu</span>
                            <svg
                                class="w-5 h-5"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 17 14"
                            >
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M1 1h15M1 7h15M1 13h15"
                                />
                            </svg>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { ref, computed, onMounted, onUnmounted } from "vue";
import { useRouter } from "vue-router";

const router = useRouter();
const isMenuOpen = ref(false);
const isMobileView = ref(window.innerWidth < 768);
const activeSection = ref("");
const scrollDowm = (target) => {
    const element = document.querySelector(target);

    if (element) {
        element.scrollIntoView({ behavior: "smooth" });
    }
};

const scrollTo = (target) => {
    toggleMenu();
    if (router.currentRoute.value.path !== "/") {
        setTimeout(() => {
            scrollDowm(target);
        }, 100);
    } else {
        scrollDowm(target);
    }
};

const toggleMenu = () => {
    isMenuOpen.value = !isMenuOpen.value;
};

const updateMobileView = () => {
    isMobileView.value = window.innerWidth < 768;
};

const handleScroll = () => {
    const sections = document.querySelectorAll("section");
    const scrollPosition = window.scrollY;

    sections.forEach((section) => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;

        if (
            scrollPosition >= sectionTop - 100 &&
            scrollPosition < sectionTop + sectionHeight
        ) {
            activeSection.value = section.id;
        }
    });
};

onMounted(() => {
    window.addEventListener("resize", updateMobileView);
    window.addEventListener("scroll", handleScroll);
});

onUnmounted(() => {
    window.removeEventListener("resize", updateMobileView);
    window.removeEventListener("scroll", handleScroll);
});
</script>

<style>
.nav-bg {
    background: #fff;
    border: 1px solid rgba(0, 0, 0, 0.1);
}
.nav__ul li {
    margin-left: 1.8rem !important;
}
.nav__ul li a::after {
    content: "";
    display: block;
    width: 0;
    height: 2px;
    background: #000;
    transition: width 0.3s;
}
.nav__ul li a:hover::after,
.nav__link__active::after {
    width: 100% !important;
}
</style>
