<template>
    <section class="mt-24">
        <div class="w-11/12 mt-10 lg:w-8/12 m-auto items-center">
            <p class="text-center py-4">Welcome to my blog!</p>
            <h1 class="text-center text-3xl font-bold">Blogs</h1>
            <ul
                class="grid grid-cols-1 xl:grid-cols-3 gap-y-10 gap-x-6 items-start p-8"
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
        description:
            "Completely unstyled, fully accessible UI components, designed to integrate beautifully with Tailwind CSS.",
        category: "Default",
        date: "a month ago",
    },
    {
        id: "2",
        title: "Headless UI",
        description:
            "Completely unstyled, fully accessible UI components, designed to integrate beautifully with Tailwind CSS.",
        category: "Default",
        date: "a month ago",
    },
    {
        id: "3",
        title: "Headless UI",
        description:
            "Completely unstyled, fully accessible UI components, designed to integrate beautifully with Tailwind CSS.",
        category: "Default",
        date: "a month ago",
    },
    {
        id: "4",
        title: "Headless UI",
        description:
            "Completely unstyled, fully accessible UI components, designed to integrate beautifully with Tailwind CSS.",
        category: "Default",
        date: "a month ago",
    },
    {
        id: "5",
        title: "Headless UI",
        description:
            "Completely unstyled, fully accessible UI components, designed to integrate beautifully with Tailwind CSS.",
        category: "Default",
        date: "a month ago",
    },
    {
        id: "6",
        title: "Headless UI",
        description:
            "Completely unstyled, fully accessible UI components, designed to integrate beautifully with Tailwind CSS.",
        category: "Default",
        date: "a month ago",
    },
    {
        id: "7",
        title: "Headless UI",
        description:
            "Completely unstyled, fully accessible UI components, designed to integrate beautifully with Tailwind CSS.",
        category: "Default",
        date: "a month ago",
    },
    {
        id: "8",
        title: "Headless UI",
        description:
            "Completely unstyled, fully accessible UI components, designed to integrate beautifully with Tailwind CSS.",
        category: "Default",
        date: "a month ago",
    },

    {
        id: "9",
        title: "Headless UI",
        description:
            "Completely unstyled, fully accessible UI components, designed to integrate beautifully with Tailwind CSS.",
        category: "Default",
        date: "a month ago",
    },
    {
        id: "10",
        title: "Headless UI",
        description:
            "Completely unstyled, fully accessible UI components, designed to integrate beautifully with Tailwind CSS.",
        category: "Default",
        date: "a month ago",
    },
    {
        id: "11",
        title: "Headless UI",
        description:
            "Completely unstyled, fully accessible UI components, designed to integrate beautifully with Tailwind CSS.",
        category: "Default",
        date: "a month ago",
    },
    {
        id: "12",
        title: "Headless UI",
        description:
            "Completely unstyled, fully accessible UI components, designed to integrate beautifully with Tailwind CSS.",
        category: "Default",
        date: "a month ago",
    },
];
</script>

<style></style>
