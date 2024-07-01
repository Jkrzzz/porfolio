<template>
    <li
        class="relative flex flex-col  xl:flex-col items-start rounded-lg blog__card"
    >
        <div class="order-1 sm:ml-6 md:ml-0 p-5">
            <p class="text-xs py-2">{{ project.date }}</p>
            <h3 class="mb-1 text-slate-900 font-semibold">
                <span class="mb-1 block text-lg leading-6 text-indigo-500">
                    {{ truncateText(project.name, 30) }}
                </span>
            </h3>
            <div class="my-2">

                <span v-for="item in project.items" :key="item.id"
                    :style="{ backgroundColor: item.color }"
                    class="text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded">
                    {{ item.name }}
                </span>
                <div>
                    <span v-for="item in project.categories" :key="item.id"
                        class="text-white bg-slate-900 text-xs font-medium me-2 px-2.5 py-0.5 rounded">
                        {{ item.name }}
                    </span>
                </div>
            </div>
            <a
                class="group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500"
                :href="project.link" target="_blank"
                >Learn more<span class="sr-only"></span
                ><svg
                    class="overflow-visible ml-3 text-slate-300 group-hover:text-slate-400"
                    width="3"
                    height="6"
                    viewBox="0 0 3 6"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path d="M0 0L3 3L0 6"></path></svg>
        </a>
        </div>
        <img
            :src="project.image_location"
            alt=""
            class="shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] xl:w-full"
            width="1216"
            height="640"
        />
    </li>
</template>

<script setup>
import { defineProps } from "vue";

const props = defineProps(["project"]);

const truncateText = (text, maxLength) => {
    if (text.length <= maxLength) return text;
    return text.slice(0, maxLength) + "...";
};
</script>

<style>
.blog__card {
    border: 1px solid rgba(0, 0, 0, 0.1);
}
</style>
