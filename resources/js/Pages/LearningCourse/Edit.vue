<template>
    <AuthenticatedLayout>
        <template #header>
          <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Edit Subject</h2>
        </template>
          <div class="py-12 mx-2 py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 dark:bg-gray-800 py-8 dark:text-black text-black">
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
                <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Update</button>
              </form>

              <div class="relative overflow-x-auto py-6">
                <div class="py-4 text-right">
                  <Link class="border-b inline-flex items-center px-6 py-4 bg-gray-800 text-white font-bold rounded-lg shadow hover:bg-gray-200 hover:text-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" href="modules/create"> Add Module</Link>
                </div>
                <h1 class="font-bold">Modules</h1>
                <!-- {{ modules }} -->
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Module Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Content
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Step
                            </th>
                            <th scope="col" class="px-6 py-3">
                              Action
                            </th>
                        </tr>
                    </thead>
                    <tbody v-for="module in modules" :key="module.id">
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                               {{ module.name }}
                            </th>
                            <td class="px-6 py-4">
                              {{ module.content }}
                            </td>
                            <td class="px-6 py-4">
                              {{ module.step }}
                            </td>
                            <td class="gap">
                     
                                <i class="fas fa-edit"></i>
                                <button @click="redirectToEdit(module.id)"  class="items-center p-1 mr-1 w-24 text-sm font-medium text-center text-white rounded-lg bg-blue-500 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                  Editx
                                </button>
                                
                              <button @click="handleDeleteConfirmation(module.id)" class="items-center p-1 mr-1 w-24 text-sm font-medium text-center text-white rounded-lg bg-red-500 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                <i class="fas fa-trash-alt"></i>
                                Delete
                              </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
    </AuthenticatedLayout>
  </template>
  <script>
  export default {
    methods: {
      redirectToEdit(moduleId) {
        window.location.href = `http://127.0.0.1:8003/learning-modules/${moduleId}/edit`;
      }
    }
  }
  </script>
  <script setup>
  import { onMounted } from "vue";
  import { Link, useForm, usePage } from '@inertiajs/vue3';
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
    modules: {
      type: Object,
      default: null,
    },
  });
  
  const form = useForm({
    year_id: "",
    title: "",
    description: "",
  });

  
  const submit = () => (props.isUpdating ? updateLearningCourse() : addLearningCourse());
  const addLearningCourse = () => form.post("/learning-courses");
  const updateLearningCourse = () => form.put(`/learning-courses/${props.learning_course.id}`);
  onMounted(() => {
    form.year_id = props.learning_course.year_id;
    form.title = props.learning_course.title;
    form.description = props.learning_course.description;
  });

  const handleEdit = (id) => {
    alert(id)
    const page = usePage()
    page.inertia.visit('/modules', id);
  }

  const handleDeleteConfirmation = (id) => {
  if (confirm('Are you sure you want to delete this learning course?')) {
    form.delete(`learning-modules/${id}`);
    // Update your data here if needed (e.g., filter deleted course)
  }
};
  </script>