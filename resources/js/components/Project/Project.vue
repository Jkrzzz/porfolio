<template>
    <section class="mt-24">
      <div class="w-11/12 mt-10 lg:w-8/12 m-auto items-center">
        <p class="text-center py-4">Welcome to my Project!</p>
        <h1 class="text-center text-3xl font-bold">Projects</h1>
        <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-y-10 gap-x-6 items-start p-8">
          <ProjectItem v-for="project in projects" :key="project.id" :project="project" />
        </ul>
        <PaginationVue 
          :current_page="pagination.current_page" 
          :last_page="pagination.last_page" 
          @page-changed="fetchProjects" 
        />
      </div>
    </section>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import axios from 'axios';
  import PaginationVue from "../Pagination/Pagination.vue";
  import ProjectItem from "./ProjectItem.vue";
  
  const projects = ref([]);
  const pagination = ref({
    current_page: 1,
    last_page: 1,
    per_page: 10,
    total: 0,
  });
  
  const fetchProjects = async (page = 1) => {
    const api_url = `/admin/get-project?page=${page}`;
    try {
      const response = await axios.get(api_url);
      projects.value = response.data.data;
      pagination.value = response.data.meta;
    } catch (error) {
      console.error("Error fetching projects: ", error);
    }
  };
  
  fetchProjects();
  </script>
  
  <style></style>
  