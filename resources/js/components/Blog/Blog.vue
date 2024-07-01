<template>
    <section class="mt-24">
        <div class="w-11/12 mt-10 lg:w-8/12 m-auto items-center">
            <p class="text-center py-4">Welcome to my blog!</p>
            <h1 class="text-center text-3xl font-bold">Blogs</h1>
            <ul
                class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-y-10 gap-x-6 items-start p-8"
            >
                <BlogItem v-for="data in datas" :key="data.id" :data="data" />
            </ul>

            <PaginationVue />
        </div>
    </section>
</template>

<script setup>
import PaginationVue from "../Pagination/Pagination.vue";
import BlogItem from "./BlogItem.vue";

const datas = [
    {
        id: "1",
        title: "Headless UI",
        slug: "headless-ui",
        description:
            "Completely unstyled, fully accessible UI components, designed to integrate beautifully with Tailwind CSS.",
        category: "Default",
        date: "a month ago",
        duration: "2",
    },
    {
        id: "2",
        title: "Headless UI",
        slug: "headless-ui",
        description:
            "Completely unstyled, fully accessible UI components, designed to integrate beautifully with Tailwind CSS.",
        category: "Default",
        date: "a month ago",
        duration: "2",
    },
    {
        id: "3",
        title: "Headless UI",
        slug: "headless-ui",
        description:
            "Completely unstyled, fully accessible UI components, designed to integrate beautifully with Tailwind CSS.",
        category: "Default",
        date: "a month ago",
        duration: "2",
    },
    {
        id: "4",
        title: "Headless UI",
        slug: "headless-ui",
        description:
            "Completely unstyled, fully accessible UI components, designed to integrate beautifully with Tailwind CSS.",
        category: "Default",
        date: "a month ago",
        duration: "2",
    },
    {
        id: "5",
        title: "Headless UI",
        slug: "headless-ui",
        description:
            "Completely unstyled, fully accessible UI components, designed to integrate beautifully with Tailwind CSS.",
        category: "Default",
        date: "a month ago",
        duration: "2",
    },
    {
        id: "6",
        title: "Headless UI",
        slug: "headless-ui",
        description:
            "Completely unstyled, fully accessible UI components, designed to integrate beautifully with Tailwind CSS.",
        category: "Default",
        date: "a month ago",
        duration: "2",
    },
];
</script>

<style></style>
