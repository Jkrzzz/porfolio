<template>
    <section class="pt-24" id="bio_tag">
        <p class="text-center py-4">Get to Know More</p>
        <h1 class="text-center text-3xl font-bold">About Me</h1>
        <div
            class="w-11/12 mt-10 lg:w-8/12 m-auto grid grid-cols-1 md:grid-cols-2 items-center"
        >
            <img
                :src="aboutImage"
                alt="about_image"
                class="rounded-lg md:w-9/12"
                width="auto"
            />
            <div>
                <div class="grid grid-cols-3 gap-2">
                    <div
                        href="#"
                        class="block max-w-sm p-2 md:p-4 border border-gray-700 rounded-lg p-shadow text-center"
                    >
                        <i class="fa-solid fa-award"></i>
                        <h5
                            class="mb-2 font-bold tracking-tight text-gray-900 text-xs"
                        >
                            Experience
                        </h5>
                        <p class="text-gray-900 text__p">2 Years Working</p>
                    </div>
                    <div
                        href="#"
                        class="block max-w-sm p-2 md:p-4 border border-gray-700 rounded-lg p-shadow text-center"
                    >
                        <i class="fa-solid fa-briefcase"></i>
                        <h5
                            class="mb-2 font-bold tracking-tight text-gray-900 text-xs"
                        >
                            Completed
                        </h5>
                        <p class="text-gray-900 text__p">10 + projects</p>
                    </div>
                    <div
                        href="#"
                        class="block max-w-sm p-2 md:p-4 border border-gray-700 rounded-lg p-shadow text-center"
                    >
                        <i class="fa-solid fa-headset"></i>
                        <h5
                            class="mb-2 font-bold tracking-tight text-gray-900 text-xs"
                        >
                            Support
                        </h5>
                        <p class="text-gray-900 text__p">Online 24/7</p>
                    </div>
                </div>
                <p class="py-6 my-5">
                    Full Stack Developer,I create web pages with UI/UX user
                    interface, I have experinece and my clients are happy with
                    projects carried out.
                </p>
                <a
                    :href="cv"
                    download
                    target="_blank"
                    class="bg-transparent hover:bg-black text-black font-semibold hover:text-white py-4 px-10 border border-black hover:border-transparent rounded inline-block"
                >
                    Download CV
                    <span class="download__icon pl-2">
                        <i class="fa-solid fa-file fa-xl"></i>
                    </span>
                </a>
            </div>
        </div>
    </section>
</template>

<script setup>
import { defineProps } from "vue";
const props = defineProps(["aboutImage", "cv"]);
</script>

<style scoped>
.text__p {
    font-size: 0.6rem;
}
.download__icon .fa-solid path {
    fill: #2c5282 !important;
}
</style>
