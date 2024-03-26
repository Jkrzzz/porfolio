<template>
    <footer class="footer">
        <div class="footer__container container">
            <h1 class="footer__title">Hein</h1>
            <ul class="footer__list">
                <li>
                    <router-link
                        to="/#bio_tag"
                        @click="scrollTo('#bio_tag')"
                        class="footer__link"
                    >
                        About
                    </router-link>
                </li>
                <li>
                    <router-link
                        to="/#service_tag"
                        @click="scrollTo('#service_tag')"
                        class="footer__link"
                        >Servie</router-link
                    >
                </li>
                <li>
                    <router-link
                        to="/#contact_tag"
                        @click="scrollTo('#contact_tag')"
                        class="footer__link"
                    >
                        Contact
                    </router-link>
                </li>
            </ul>
            <div class="footer__social">
                <a
                    href="https://www.instagram.com/heinhtet_jkrz/"
                    class="footer__social-link"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    <i class="fa-brands fa-instagram"> </i>
                </a>
                <a
                    href="https://twitter.com/"
                    class="footer__social-link"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    <i class="fa-brands fa-twitter"></i>
                </a>
                <a
                    href="https://www.facebook.com/hein.htet.10420"
                    class="footer__social-link"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    <i class="fa-brands fa-facebook"></i>
                </a>
            </div>
            <span class="footer__copy">
                &#169; HeinJKRZ. All rights reserved
            </span>
        </div>
    </footer>
</template>

<script setup>
import { defineProps } from "vue";
const props = defineProps(["scrollTo"]);
</script>

<style>
.footer {
    background-color: var(--container-color);
    border-top: 1px solid rgba(0, 0, 0, 0.1);
}
.footer__container {
    padding: 2rem 0 6rem;
}
.footer__title,
.footer__link {
    color: var(--title-color);
}

.footer__title {
    text-align: center;
    margin-bottom: var(--mb-2);
}

.footer__link:hover {
    color: var(--title-color-dark);
}

.footer__list {
    display: flex;
    justify-content: center;
    column-gap: 1.5rem;
    margin-bottom: var(--mb-2);
}
.footer__social {
    display: flex;
    justify-content: center;
    column-gap: 1.125rem;
}
.footer__social-link {
    background-color: var(--title-color);
    color: var(--container-color);
    font-size: 1.25rem;
    padding: 0.4rem;
    border-radius: 0.5rem;
    display: inline-flex;
}
.footer__social-link:hover {
    background-color: var(--title-color-dark);
}
.footer__copy {
    display: block;
    margin-top: 4.5rem;
    color: var(--title-color);
    text-align: center;
    font-size: var(--smaller-font-size);
}

/*=============== BREAKPOINTS ===============*/
/* For large devices */
@media screen and (max-width: 992px) {
    .footer__social-link {
        padding: 0.25rem;
        border-radius: 0.25rem;
        font-size: 1rem;
    }
}
</style>
