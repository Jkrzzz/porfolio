<template>
    <section class="pt-24" id="service_tag">
        <p class="text-center py-4">What I offer</p>
        <h1 class="text-center text-3xl font-bold">Services</h1>

        <div
            class="w-11/12 mt-10 lg:w-8/12 m-auto grid md:grid-cols-3 grid-cols-2 justify-center items-center py-5 gap-12"
        >
            <div class="pt-24 pb-10 pl-8 border-solid service_card">
                <div>
                    <i class="fa-solid fa-server text-2xl"></i>
                    <h3 class="text-lg font-bold my-5">
                        Product <br />
                        Designer
                    </h3>
                </div>
                <span
                    class="cursor-pointer text-sm service_view"
                    @click="toggleModal(1)"
                >
                    View More
                    <i class="fa-solid fa-arrow-right"></i>
                </span>
                <div
                    :class="{ 'active-modal': showModal === 1 }"
                    class="services__modal"
                >
                    <div class="services__modal-content">
                        <span @click="toggleModal(0)">
                            <i
                                class="fa-solid fa-xmark services__modal-close"
                            ></i
                        ></span>

                        <h3 class="services__modal-title">UI/UX Designer</h3>
                        <p class="services__modal-description">
                            Service with more than 1 years of
                            experience.Providing quality work to clients and
                            companies.
                        </p>
                        <ul class="services__modal-services grid">
                            <li class="services__modal-service">
                                <i class="fa-regular fa-circle-check"></i>
                                <p class="services__modal-info">
                                    I develop the user interface.
                                </p>
                            </li>
                            <li class="services__modal-service">
                                <i class="fa-regular fa-circle-check"></i>
                                <p class="services__modal-info">
                                    Web page development
                                </p>
                            </li>
                            <li class="services__modal-service">
                                <i class="fa-regular fa-circle-check"></i>
                                <p class="services__modal-info">
                                    I create ux element interactions.
                                </p>
                            </li>
                            <li class="services__modal-service">
                                <i class="fa-regular fa-circle-check"></i>
                                <p class="services__modal-info">
                                    I position your company brand.
                                </p>
                            </li>
                            <li class="services__modal-service">
                                <i class="fa-regular fa-circle-check"></i>
                                <p class="services__modal-info">
                                    Design and mockups of products for
                                    companies.
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="pt-24 pb-10 pl-8 border-solid service_card">
                <div>
                    <i class="fa-solid fa-code text-2xl"></i>
                    <h3 class="text-lg font-bold my-5">
                        Ui/Ux <br />
                        Designer
                    </h3>
                </div>
                <span
                    class="cursor-pointer text-sm service_view"
                    @click="toggleModal(2)"
                >
                    View More
                    <i class="fa-solid fa-arrow-right"></i>
                </span>
                <div
                    :class="{ 'active-modal': showModal === 2 }"
                    class="services__modal"
                >
                    <div class="services__modal-content">
                        <span @click="toggleModal(0)">
                            <i
                                class="fa-solid fa-xmark services__modal-close"
                            ></i
                        ></span>

                        <h3 class="services__modal-title">UI/UX Designer</h3>
                        <p class="services__modal-description">
                            Service with more than 1 years of
                            experience.Providing quality work to clients and
                            companies.
                        </p>
                        <ul class="services__modal-services grid">
                            <li class="services__modal-service">
                                <i class="fa-regular fa-circle-check"></i>
                                <p class="services__modal-info">
                                    I develop the user interface.
                                </p>
                            </li>
                            <li class="services__modal-service">
                                <i class="fa-regular fa-circle-check"></i>
                                <p class="services__modal-info">
                                    Web page development
                                </p>
                            </li>
                            <li class="services__modal-service">
                                <i class="fa-regular fa-circle-check"></i>
                                <p class="services__modal-info">
                                    I create ux element interactions.
                                </p>
                            </li>
                            <li class="services__modal-service">
                                <i class="fa-regular fa-circle-check"></i>
                                <p class="services__modal-info">
                                    I position your company brand.
                                </p>
                            </li>
                            <li class="services__modal-service">
                                <i class="fa-regular fa-circle-check"></i>
                                <p class="services__modal-info">
                                    Design and mockups of products for
                                    companies.
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="pt-24 pb-10 pl-8 border-solid service_card">
                <div>
                    <i class="fa-solid fa-pen-to-square text-2xl"></i>
                    <h3 class="text-lg font-bold my-5">
                        Visual <br />
                        Designer
                    </h3>
                </div>
                <span
                    class="cursor-pointer text-sm service_view"
                    @click="toggleModal(3)"
                >
                    View More
                    <i class="fa-solid fa-arrow-right"></i>
                </span>
                <div
                    :class="{ 'active-modal': showModal === 3 }"
                    class="services__modal"
                >
                    <div class="services__modal-content">
                        <span @click="toggleModal(0)">
                            <i
                                class="fa-solid fa-xmark services__modal-close"
                            ></i
                        ></span>

                        <h3 class="services__modal-title">UI/UX Designer</h3>
                        <p class="services__modal-description">
                            Service with more than 1 years of
                            experience.Providing quality work to clients and
                            companies.
                        </p>
                        <ul class="services__modal-services grid">
                            <li class="services__modal-service">
                                <i class="fa-regular fa-circle-check"></i>
                                <p class="services__modal-info">
                                    I develop the user interface.
                                </p>
                            </li>
                            <li class="services__modal-service">
                                <i class="fa-regular fa-circle-check"></i>
                                <p class="services__modal-info">
                                    Web page development
                                </p>
                            </li>
                            <li class="services__modal-service">
                                <i class="fa-regular fa-circle-check"></i>
                                <p class="services__modal-info">
                                    I create ux element interactions.
                                </p>
                            </li>
                            <li class="services__modal-service">
                                <i class="fa-regular fa-circle-check"></i>
                                <p class="services__modal-info">
                                    I position your company brand.
                                </p>
                            </li>
                            <li class="services__modal-service">
                                <i class="fa-regular fa-circle-check"></i>
                                <p class="services__modal-info">
                                    Design and mockups of products for
                                    companies.
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref } from "vue";

const showModal = ref(0);
const toggleModal = (index) => {
    showModal.value = index;
};
</script>

<style>
.service_card {
    border: 1px solid rgba(0, 0, 0, 0.1);
}

.service_view svg {
    transition: 0.3s;
}
.service_view:hover svg {
    transform: translateX(10px);
}

.services__modal {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: var(--z-modal);
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0 1rem;
    opacity: 0;
    visibility: hidden;
    transition: 0.3s;
}
.services__modal-content {
    width: 500px;
    position: relative;
    background-color: var(--container-color);
    padding: 4.5rem 2.5rem 2.5rem;
    border-radius: 1.5rem;
}
.services__modal-close {
    cursor: pointer;
    position: absolute;
    top: 1.5rem;
    right: 1.5rem;
    font-size: 1.5rem;
    color: var(--title-color);
}

.services__modal-title,
.services__modal-description {
    text-align: center;
}
.services__modal-title {
    font-size: var(--h3-font-size);
    font-weight: var(--font-medium);
    margin-bottom: var(--mb-1);
}
.services__modal-description {
    font-size: var(--small-font-size);
    padding: 0 3.5rem;
    margin-bottom: var(--mb-2);
}
.services__modal-services {
    row-gap: 0.75rem;
}
.services__modal-service {
    display: flex;
    align-items: center;
    column-gap: 0.5rem;
}
.services__modal-icon {
    color: var(--title-color);
    font-size: 1.1rem;
}
.services__modal-info {
    font-size: var(--small-font-size);
}

.active-modal {
    opacity: 1;
    visibility: visible;
}
</style>
