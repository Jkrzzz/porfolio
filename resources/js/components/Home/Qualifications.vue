<template>
    <section class="qualification section" id="qualification_tag">
        <p class="text-center py-4">My Personal Journey</p>
        <h1 class="text-center text-3xl font-bold">Qualification</h1>

        <div class="qualification__container container mt-12">
            <div class="qualification__tabs">
                <div
                    :class="{
                        'qualification__button qualification__active button--flex':
                            activeTab === 1,
                        'qualification__button button--flex': activeTab !== 1,
                    }"
                    @click="toggleTab(1)"
                >
                    <i
                        class="fa-solid fa-graduation-cap qualification__icon"
                    ></i>
                    Education
                </div>
                <div
                    :class="{
                        'qualification__button qualification__active button--flex':
                            activeTab === 2,
                        'qualification__button button--flex': activeTab !== 2,
                    }"
                    @click="toggleTab(2)"
                >
                    <i class="fa-solid fa-briefcase qualification__icon"></i>
                    Experience
                </div>
            </div>
            <div class="qualification__sections">
                <div
                    v-show="activeTab === 1"
                    class="qualification__content qualification__content-active"
                >
                    <!-- Education content -->
                    <div
                        class="qualification__data"
                        v-for="(education, index) in educations"
                        :key="index"
                    >
                        <div v-if="index % 2 === 1"></div>
                        <div v-if="index % 2 === 1">
                            <span class="qualification__rounder"></span>
                            <span class="qualification__line"></span>
                        </div>
                        <div>
                            <h3 class="qualification__title">
                                {{ education.title }}
                            </h3>
                            <span class="qualification__subtitle">{{
                                education.subtitle
                            }}</span>
                            <div class="qualification__calendar">
                                <i class="fa-regular fa-calendar-days"></i>
                                {{ education.period }}
                            </div>
                        </div>
                        <div v-if="index % 2 === 0">
                            <span class="qualification__rounder"></span>
                            <span class="qualification__line"></span>
                        </div>
                        <div v-if="index % 2 === 0"></div>
                    </div>
                </div>
                <div
                    v-show="activeTab === 2"
                    class="qualification__content qualification__content-active"
                >
                    <!-- Experience content -->
                    <div
                        class="qualification__data"
                        v-for="(experience, index) in experiences"
                        :key="index"
                    >
                        <div v-if="index % 2 === 1"></div>
                        <div v-if="index % 2 === 1">
                            <span class="qualification__rounder"></span>
                            <span class="qualification__line"></span>
                        </div>
                        <div>
                            <h3 class="qualification__title">
                                {{ experience.title }}
                            </h3>
                            <span class="qualification__subtitle">{{
                                experience.subtitle
                            }}</span>
                            <div class="qualification__calendar">
                                <i class="fa-regular fa-calendar-days"></i>
                                {{ experience.period }}
                            </div>
                        </div>
                        <div v-if="index % 2 === 0">
                            <span class="qualification__rounder"></span>
                            <span class="qualification__line"></span>
                        </div>
                        <div v-if="index % 2 === 0"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref } from "vue";

const activeTab = ref(1);

const toggleTab = (tab) => {
    activeTab.value = tab;
};

// Dummy data for educations and experiences
const educations = [
    {
        title: "BE EC",
        subtitle: "TU Magway",
        period: "2014-2019",
    },
    {
        title: "Web Design",
        subtitle: "LogicUnicon - Class",
        period: "2020-2021",
    },
    {
        title: "Web Development",
        subtitle: "LogicUnicon - Class",
        period: "2021-2021",
    },
];

const experiences = [
    {
        title: "Junior Engineer",
        subtitle: "GlobalNet - (5bb)",
        period: "2021-2022",
    },
    {
        title: "Software Engineer",
        subtitle: "Bliss Stock - JPN",
        period: "2022-Present",
    },
    {
        title: "Web Developer",
        subtitle: "Freelance",
        period: "2022-Present",
    },
];
</script>

<style scoped>
.qualification__container {
    max-width: 768px;
}
.qualification__tabs {
    display: flex;
    justify-content: center;
    margin-bottom: var(--mb-2);
}
.qualification__button {
    font-size: var(--h3-font-size);
    font-weight: var(--font-medium);
    color: var(--title-color);
    margin: 0 var(--mb-1);
    cursor: pointer;
}
.qualification__button:hover {
    color: var(--title-color-dark);
}
.qualification__icon {
    font-size: 1.5rem;
    margin-right: var(--mb-0-5);
}
.qualification__active {
    color: var(--title-color-dark);
}

.qualification__sections {
    display: grid;
    grid-template-columns: 0.5fr;
    justify-content: center;
}
.qualification__content {
    display: none;
}
.qualification__content-active {
    display: block;
}
.qualification__data {
    display: grid;
    grid-template-columns: 1fr max-content 1fr;
    column-gap: 1.5rem;
}
.qualification__title {
    font-size: var(--normal-font-size);
    font-weight: var(--font-medium);
}
.qualification__subtitle {
    display: inline-block;
    font-size: var(--small-font-size);
    margin-bottom: var(--mb-1);
}
.qualification__calendar {
    font-size: var(--small-font-size);
}
.qualification__rounder {
    display: inline-block;
    width: 13px;
    height: 13px;
    background-color: var(--text-color);
    border-radius: 50%;
}
.qualification__line {
    display: block;
    width: 1px;
    height: 100%;
    background-color: var(--text-color);

    transform: translate(6px, -7px);
}

/*=============== BREAKPOINTS ===============*/
/* For large devices */
@media screen and (max-width: 992px) {
    .qualification__container {
        margin-left: auto;
        margin-right: auto;
    }
}

/* For medium devices */

@media screen and (max-width: 576px) {
    .qualification__sections {
        grid-template-columns: initial;
    }
    .qualification__button {
        margin: 0 var(--mb-0-75);
    }
}

/* For small devices */
@media screen and (max-width: 350px) {
    .qualification__data {
        gap: 0.5rem;
    }
}
</style>
