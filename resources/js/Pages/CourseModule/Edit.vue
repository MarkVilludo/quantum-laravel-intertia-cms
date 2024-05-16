<template>
    <AuthenticatedLayout>
        <template #header>
          <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Edit Module</h2>
        </template>
        <template>
          <div>
            <div v-if="flash" class="alert alert-success" role="alert">
            </div>
          </div>
        </template>
        <div class="py-12 mx-2">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 dark:text-white dark:bg-white text-black dark:bg-gray-800 py-8 dark:text-black">
            <form @submit.prevent="submit">
              <div class="mb-3">
                <label for="name" class="form-label block mb-2 text-sm font-medium dark:text-gray-200">Name</label>
                <input type="text" id="name" v-model="form.name" class="form-control block w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-blue-500 focus:ring-opacity-50">
              </div>
              <div class="mb-3">
                <label for="content" class="form-label block mb-2 text-sm font-medium dark:text-gray-200">Content</label>
                <textarea id="content" v-model="form.content" class="form-control h-56 block w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-blue-500 focus:ring-opacity-50"></textarea>
              </div>
              <div class="mb-3">
                <label for="step" class="form-label block mb-2 text-sm font-medium dark:text-gray-200">Step</label>
                <input type="number" id="step" v-model="form.step" class="form-control block w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-blue-500 focus:ring-opacity-50">
              </div>
              <div class="mb-3">
              </div>
              <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
            </form>
          </div>
        </div>
    </AuthenticatedLayout>
  </template>
  <script setup>
  import { onMounted } from "vue";
  import { usePage, useForm } from "@inertiajs/vue3";

  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  const props = defineProps({
    module: {
      type: Object,
      default: null,
    },
    isUpdating: {
      type: Boolean,
      default: false,
    },
    flash: String,
    course_id: String,
  });

  onMounted(() => {
    form.id = props.module.id;
    form.course_id = props.module.course_id;
    form.name = props.module.name;
    form.content = props.module.content;
    form.step = props.module.step;
  });

  const course_id =  Number(props.course_id); 
  
  const form = useForm({
    name: "",
    description: "",
    content: "",
    step: "",
    course_id: course_id
  });

  const submit = () => {
    form.post("/api/v1/modules-update");
  };
  </script>
  