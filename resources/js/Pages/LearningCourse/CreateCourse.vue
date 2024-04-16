<template>
    <div class="container mx-auto px-4 py-8">
      <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight mb-3">Add New Course</h2>
      <form @submit.prevent="submitNewCourse">
        <div class="mb-3">
          <label for="title" class="form-label block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Title</label>
          <input type="text" v-model="newCourseData.title" id="title" class="form-control block w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-blue-500 focus:ring-opacity-50">
        </div>
        <div class="mb-3">
          <label for="description" class="form-label block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Description</label>
          <textarea v-model="newCourseData.description" id="description" class="form-control block w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-blue-500 focus:ring-opacity-50" rows="3"></textarea>
        </div>
        <div class="flex items-center justify-end">
          <button type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-2" @click="$page.component = 'LearningModule'">Cancel</button>
          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add Course</button>
        </div>
      </form>
    </div>
  </template>
  
  <script setup>
    import { usePage } from '@inertiajs/vue3';
    import { ref } from 'vue'; // Import ref from Vue
    const newCourseData = ref({
        title: '',
        description: '',
    });
  
  const submitNewCourse = async () => {
    // Use Inertia.post to send data to the server-side controller
    await usePage.post('/learning-module', newCourseData.value);
  
    // Reset new course data (optional)
    newCourseData.value = { title: '', description: '' };
  };
  </script>