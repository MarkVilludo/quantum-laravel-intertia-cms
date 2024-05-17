<template>
    <AuthenticatedLayout>
        <template #header>
          <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Learning Subject per Student Year</h2>
        </template>
          <div class="py-4 text-right">
            <Link class="border-b inline-flex items-center px-6 py-4 bg-gray-800 text-white font-bold rounded-lg shadow hover:bg-gray-200 hover:text-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" href="learning-courses/create">Add New Subject</Link>
          </div>
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <template >
              <div class="alert alert-success">
                {{ message }}
              </div>
            </template>
          </div>
          <div class="flex flex-wrap mt-4 px-12">
            <div class="w-full xl:w-12/12 mb-12 xl:mb-0">
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                    <div class="dark:bg-white text-black dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <table class="border-separate border border-slate-500 w-full">
                          <tbody v-for="sy in schoolYear" :key="sy.id">
                            <tr>
                              <td colspan="3" class="text-xl font-medium cursor-pointer border-y pl-2" scope="row">
                                {{ sy.name }}
                              </td>
                            </tr>
                            <tr v-for="learning_course in sy.learning_courses" :key="learning_course.id" class="mx-4">
                              <td colspan="2" class="border-r pl-6">
                                <a href="#" class="font-bold">{{ learning_course.title }}</a>
                                  <p class="text-sm">
                                    {{ learning_course.description }}
                                  </p>
                              </td>
                              <td class="md:grid grid-cols-1 gap-2 text-center flex flex-row px-1 py-1 items-center">
                                <div class="flex gap-1 flex-col md:flex-row items-center justify-center">
                                  <button @click="handleDeleteConfirmation(learning_course.id)" class="items-center py-1 w-24 text-sm font-medium text-center text-white rounded-lg bg-red-500 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                    <i class="fas fa-trash-alt mr-1"></i>
                                    Delete
                                  </button>
                                  <Link :href="`learning-courses/${learning_course.id}/edit`" class="items-center py-1 w-24 text-sm font-medium text-center text-white rounded-lg bg-blue-500 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
import { useForm } from '@inertiajs/vue3';
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    schoolYear: Array,
    message: String
});
const form = useForm({});

const handleDeleteConfirmation = (id) => {
  if (confirm('Are you sure you want to delete this learning course?')) {
    form.delete(`learning-courses/${id}`);
    // Update your data here if needed (e.g., filter deleted course)
  }
};
</script>
  