<template>
    <li
        class="relative flex flex-col xl:flex-col items-start rounded-lg blog__card"
    >
        <div class="order-1 sm:ml-6 md:ml-0 p-5">
            <div class="flex justify-between">
                <p class="text-xs py-2">{{ data.date }}</p>
                <p class="text-xs py-2">{{ data.date }}</p>
            </div>
            <h3 class="mb-1 text-slate-900 font-semibold">
                <span class="mb-1 block text-lg leading-6 text-indigo-500">
                    {{ truncateText(data.title, 30) }}
                </span>
            </h3>
            <div class="prose prose-slate text-xs text-dark-600">
                <p>
                    {{ truncateText(data.description, 100) }}
                </p>
            </div>
            <div class="my-2">
                <span
                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded"
                    >{{ data.category }}</span
                >
            </div>
            <router-link
                class="group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500"
                :to="`/blogs/${data.slug}`"
                >Learn more<span class="sr-only"></span>
                <svg
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
                    <path d="M0 0L3 3L0 6"></path>
                </svg>
            </router-link>
        </div>
        <img
            src="https://tailwindcss.com/_next/static/media/headlessui@75.c1d50bc1.jpg"
            alt=""
            class="shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] xl:w-full"
            width="1216"
            height="640"
        />
    </li>
</template>

<script setup>
import { defineProps } from "vue";

const props = defineProps(["data"]);

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
