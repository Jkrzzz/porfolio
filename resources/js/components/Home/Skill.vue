<template>
    <section class="pt-24" id="skill_tag">
        <p class="text-center py-4">My Technical Level</p>
        <h1 class="text-center text-3xl font-bold">Skills</h1>

        <div
            class="w-11/12 mt-10 lg:w-8/12 m-auto grid md:grid-cols-2 grid-cols-1 justify-center items-center py-5 gap-12"
        >
            <div
                class="py-4 px-10 lg:px-20 lg:py-8 border border-gray-700 rounded-lg p-shadow"
            >
                <h3
                    class="mt-3 mb-10 text-lg font-extrabold text-center skill_title"
                >
                    Frontend Developer
                </h3>
                <div class="grid grid-cols-2 gap-cols-14 gap-8">
                    <div
                        v-for="(skill, index) in skills_front"
                        :key="index"
                        class="flex px-5"
                    >
                        <i class="fa-regular fa-circle-check"></i>
                        <div class="pl-2">
                            <h3 class="text-xl font-bold">{{ skill.name }}</h3>
                            <span class="text-xs skill_title">{{
                                skill.level
                            }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="py-4 px-10 lg:px-20 lg:py-8 border border-gray-700 rounded-lg p-shadow"
            >
                <h3
                    class="mt-3 mb-10 text-lg font-extrabold text-center skill_title"
                >
                    Backend Developer
                </h3>
                <div class="grid grid-cols-2 gap-cols-14 gap-8">
                    <div
                        v-for="(skill, index) in skills_back"
                        :key="index"
                        class="flex px-5"
                    >
                        <i class="fa-regular fa-circle-check"></i>
                        <div class="pl-2">
                            <h3 class="text-xl font-bold">{{ skill.name }}</h3>
                            <span class="text-xs skill_title">{{
                                skill.level
                            }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
const skills_front = [
    { name: "HTML", level: "Basic" },
    { name: "HTML", level: "Basic" },
    { name: "HTML", level: "Basic" },
    { name: "HTML", level: "Basic" },
    { name: "HTML", level: "Basic" },
    { name: "HTML", level: "Basic" },
];
const skills_back = [
    { name: "PHP", level: "Basic" },
    { name: "Laravel", level: "Basic" },
    { name: "MySQL", level: "Basic" },
    { name: "HTML", level: "Basic" },
    { name: "HTML", level: "Basic" },
    { name: "HTML", level: "Basic" },
];
</script>

<style>
.skill_title {
    color: #0008;
}
</style>
