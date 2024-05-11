<template>
  <AuthenticatedLayout>
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Create Subject</h2>
      </template>
      <template>
        <div>
          <div v-if="flash" class="alert alert-success" role="alert">
            {{ flash }}
          </div>
        </div>
      </template>
            <div class="py-12 mx-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 dark:text-white dark:bg-white text-black dark:bg-gray-800 py-8 dark:text-black">
          <form @submit.prevent="submit">
            <div class="mb-3">
              <label for="year_id" class="form-label block mb-2 text-sm font-medium dark:text-gray-200">Year</label>
              <select id="year_id" v-model="form.year_id" class="form-control block w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-blue-500 focus:ring-opacity-50">
                <option value="1">First</option>
                <option value="2">Second</option>
                <option value="3">Third</option>
                <option value="4">Fourth</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="title" class="form-label block mb-2 text-sm font-medium dark:text-gray-200">Title</label>
              <input type="text" id="title" v-model="form.title" class="form-control block w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-blue-500 focus:ring-opacity-50">
            </div>
            <div class="mb-3">
              <label for="description" class="form-label block mb-2 text-sm font-medium dark:text-gray-200">Body</label>
              <textarea id="description" v-model="form.description" class="form-control block w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-blue-500 focus:ring-opacity-50"></textarea>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
          </form>
        </div>
      </div>
  </AuthenticatedLayout>
</template>
<script setup>
import { useForm } from "@inertiajs/vue3";
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';


const props = defineProps({
  learning_course: {
    type: Object,
    default: null,
  },
  isUpdating: {
    type: Boolean,
    default: false,
  },
  flash: String,
});

const form = useForm({
  year_id: "",
  title: "",
  description: "",
});
const submit = () => {
  form.post("/learning-courses");
};
</script>
