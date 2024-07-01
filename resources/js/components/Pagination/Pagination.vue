<template>
    <nav aria-label="Page navigation example" class="flex justify-center mt-4 mb-10">
      <ul class="flex items-center -space-x-px h-8 text-sm">
        <li>
          <button
            @click="changePage(current_page - 1)"
            :disabled="current_page <= 1"
            class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700"
          >
            <span class="sr-only">Previous</span>
            <svg
              class="w-2.5 h-2.5 rtl:rotate-180"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 6 10"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M5 1 1 5l4 4"
              />
            </svg>
          </button>
        </li>
        <li v-for="page in pages" :key="page">
          <button
            @click="changePage(page)"
            :class="{ 'pagination__active': page === current_page }"
            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700"
          >
            {{ page }}
          </button>
        </li>
        <li>
          <button
            @click="changePage(current_page + 1)"
            :disabled="current_page >= last_page"
            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700"
          >
            <span class="sr-only">Next</span>
            <svg
              class="w-2.5 h-2.5 rtl:rotate-180"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 6 10"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="m1 9 4-4-4-4"
              />
            </svg>
          </button>
        </li>
      </ul>
    </nav>
  </template>
  
  <script setup>
  import { computed } from 'vue';
  import { defineProps, defineEmits } from 'vue';
  
  const props = defineProps({
    current_page: Number,
    last_page: Number
  });
  
  const emit = defineEmits(['page-changed']);
  
  const changePage = (page) => {
    if (page >= 1 && page <= props.last_page) {
      emit('page-changed', page);
    }
  };
  
  const pages = computed(() => {
    const pagesArray = [];
    for (let i = 1; i <= props.last_page; i++) {
      pagesArray.push(i);
    }
    return pagesArray;
  });
  </script>
  
  <style>
  .pagination__active {
    background-color: #000;
    color: #fff;
  }
  </style>
  