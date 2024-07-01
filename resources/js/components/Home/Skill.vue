<template>
    <section v-if="skills" class="pt-24" id="skill_tag">
        <p class="text-center py-4">My Technical Level</p>
        <h1 class="text-center text-3xl font-bold">Skills</h1>

        <div
            class="w-11/12 mt-10 lg:w-8/12 m-auto grid md:grid-cols-2 grid-cols-1 justify-center items-center py-5 gap-12"
        >
            <div
                v-for="(skill, index) in skills"
                :key="index"
                class="py-4 px-10 lg:px-20 lg:py-8 border border-gray-700 rounded-lg p-shadow"
            >
                <h3
                    class="mt-3 mb-10 text-lg font-extrabold text-center skill_title"
                >
                    {{ skill.category }}
                </h3>
                <div class="grid grid-cols-2 gap-cols-14 gap-8">
                    <div
                        v-for="(item, index) in skill.skill_items"
                        :key="index"
                        class="flex px-5"
                    >
                        <i class="fa-regular fa-circle-check"></i>
                        <div class="pl-2">
                            <h3 class="text-xl font-bold">{{ item.name }}</h3>
                            <span class="text-xs skill_title">{{
                                item.level
                            }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import axios from "axios";
import { onMounted, ref } from "vue";

const skills = ref(null);

// Fetch skills data when component is mounted
const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");
const api_url = "/admin/get-skill";
axios.defaults.headers.common["X-CSRF-TOKEN"] = csrfToken;
axios
    .get(api_url)
    .then((response) => {
        skills.value = response.data;
        console.log(skills.value);
    })
    .catch((error) => {
        console.error("Error fetching setting: ", error);
    });
</script>

<style>
.skill_title {
    color: #0008;
}
</style>
