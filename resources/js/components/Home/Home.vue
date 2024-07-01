<template>
    <section id="home_tag" v-if="setting" class="pt-24">
        <div
            class="w-11/12 mt-10 lg:w-8/12 m-auto grid gap-4 grid-cols-1 md:grid-cols-2 items-center"
        >
            <div class="flex items-center">
                <div class="pr-5 md:pr-20">
                    <ul>
                        <li class="py-3">
                            <a :href="setting.facebook_link">
                                <i class="fa-brands fa-facebook fa-xl"></i
                            ></a>
                        </li>
                        <li class="py-3">
                            <a :href="setting.instagram_link"
                                ><i class="fa-brands fa-instagram fa-xl"></i
                            ></a>
                        </li>
                        <li class="py-3">
                            <a :href="setting.github_link">
                                <i class="fa-brands fa-github fa-xl"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h1 class="text-5xl font-extrabold my-5">
                        {{ setting.name }}
                    </h1>
                    <p class="my-5 text-2xl">
                        I am <span class="typed_text">{{ typeValue }}</span>
                        <span class="cursor" :class="{ 'typing ': typeStatus }"
                            >&nbsp;</span
                        >
                    </p>
                    <p>
                        {{ setting.description }}
                    </p>
                    <a
                        href="#"
                        class="bg-transparent hover:bg-black text-gary-900 font-semibold hover:text-white py-2 px-4 border border-black hover:border-transparent rounded inline-block my-5"
                    >
                        Contact
                    </a>
                </div>
            </div>
            <img
                :src="aboutImage"
                width="auto"
                alt="profileimage"
                class="rounded"
                id="profile__image"
            />
        </div>
    </section>

    <About
        v-if="setting"
        :setting="setting"
        :aboutImage="aboutImage"
        :cv="cv"
    />
    <Skill />
    <Service />
    <Qualifications />
    <Contact v-if="setting" :setting="setting" />
</template>

<script setup>
import { ref, onMounted } from "vue";
import About from "./About.vue";
import Skill from "./Skill.vue";
import Service from "./Services.vue";
import Qualifications from "./Qualifications.vue";
import Contact from "./Contact.vue";
import axios from "axios";

const aboutImage = ref(null);
const cv = ref(null);
const typeValue = ref("");
const typeStatus = ref(false);
let typeArray = null;
const typingSpeed = ref(100);
const erasingSpeed = ref(100);
const nextTextDelay = ref(1000);
const typeArrayIndex = ref(0);
const charIndex = ref(0);
const setting = ref(null);

onMounted(() => {
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");
    axios.defaults.headers.common["X-CSRF-TOKEN"] = csrfToken;

    axios
        .get("admin/setting-data")
        .then((response) => {
            setting.value = response.data;
            typeArray = JSON.parse(setting.value.position_array);
            cv.value = `storage/file/${setting.value.cv_pdf}`;
            aboutImage.value = `/img/${setting.value.photo}`;
            setTimeout(typeText, nextTextDelay.value + 20);
        })
        .catch((error) => {
            console.error("Error fetching setting: ", error);
        });
});

const typeText = () => {
    if (charIndex.value < typeArray[typeArrayIndex.value].length) {
        if (!typeStatus.value) typeStatus.value = true;
        typeValue.value += typeArray[typeArrayIndex.value].charAt(
            charIndex.value
        );
        charIndex.value += 1;
        setTimeout(typeText, typingSpeed.value);
    } else {
        typeStatus.value = false;
        setTimeout(eraseText, nextTextDelay.value);
    }
};
const eraseText = () => {
    if (charIndex.value > 0) {
        if (!typeStatus.value) {
            typeStatus.value = true;
        }
        typeValue.value = typeArray[typeArrayIndex.value].substring(
            0,
            charIndex.value - 1
        );
        charIndex.value -= 1;
        setTimeout(eraseText, erasingSpeed.value);
    } else {
        typeStatus.value = false;
        typeArrayIndex.value += 1;
        if (typeArrayIndex.value >= typeArray.length) typeArrayIndex.value = 0;
        setTimeout(typeText, typingSpeed.value + 100);
    }
};
</script>

<style scoped>
span.cursor {
    display: inline-block;
    margin-left: 3px;
    width: 2px;
    background: #000;
    animation: cursorBlink 1s infinite;
}
span.cursor.typing {
    animation: none;
}
@keyframes cursorBlink {
    49% {
        background-color: #000;
    }
    50% {
        background-color: transparent;
    }
    99% {
        background-color: transparent;
    }
}
#profile__image {
    background-image: url(../../assets//profile.jpg);
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    box-shadow: inset 0 0 0 9px rgb(255 255 255/30%);
    order: 1;
    justify-self: center;
    width: 300px;
    height: 300px;
    animation: profile_animate 8s ease-in-out infinite 1s;
}
@keyframes profile_animate {
    0% {
        border-radius: 60% 40% 30% 70%/60% 30% 70% 40%;
    }

    50% {
        border-radius: 30% 60% 70% 40%/50% 60% 30% 60%;
    }
    100% {
        border-radius: 60% 40% 30% 70%/60% 30% 70% 40%;
    }
}
</style>
