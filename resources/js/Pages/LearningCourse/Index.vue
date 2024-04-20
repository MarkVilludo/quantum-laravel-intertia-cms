<template>
    <AuthenticatedLayout>
        <template #header>
          <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Learning Modules per Student Year</h2>
        </template>
      <div class="py-12 mx-2 py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-white">
          <div class="py-4 text-right">
            <Link class="inline-flex items-center px-6 py-4 bg-gray-800 text-white font-bold rounded-lg shadow hover:bg-gray-200 hover:text-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" href="learning-modules/create">Add New Learning Module</Link>
          </div>
          <template>
            {{  message }}
          <div v-if="message" class="alert alert-success">
            {{ message }}
          </div>
        </template>
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="container mx-auto px-4 py-8">
              <table class="border-separate border border-slate-500">
                <tbody v-for="sy in schoolYear" :key="sy.id">
                  <tr>
                    <th class="text-xl font-medium cursor-pointer" scope="row">
                      {{ sy.name }}
                    </th>
                  </tr>
                  <tr v-for="learning_course in sy.learning_courses" :key="learning_course.id" class="mx-4">
                    <td> </td>
                    <td>
                      <a href="#" class="font-bold">{{ learning_course.title }}</a>
                        <p class="text-sm">
                          {{ learning_course.description }}
                        </p>
                    </td>
                      <td class="grid grid-cols-2 gap-2">
                        <div class="flex space-x-2">
                          <button @click="deleteLearningCourse(learning_course.id)" class="inline-flex items-center px-2 py-1 my-6 text-sm font-medium text-center text-white rounded-lg bg-red-500 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            <i class="fas fa-trash-alt mr-1"></i>
                            Delete
                          </button>
                          <Link :href="`learning-modules/${learning_course.id}/edit`" class="inline-flex items-center px-2 py-1 my-6 text-sm font-medium text-center text-white rounded-lg bg-blue-500 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <i class="fas fa-edit mr-1"></i>
                            Edit
                          </Link>
                        </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  </template>
  
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { usePage, useForm } from '@inertiajs/vue3';
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    schoolYear: Array,
    message: String
});
const form = useForm({});

const deleteLearningCourse = (id) => {
    form.delete(`learning-modules/${id}`);
};
// const handleDelete = async (id) => {
//   if (confirm('Are you sure you want to delete this learning course?')) {
//     await form.delete(`learning-modules/${id}`);
//     // Update your data here if needed (e.g., filter deleted course)
//   }
// };
</script>
  