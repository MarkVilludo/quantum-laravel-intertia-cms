<template>
    <AuthenticatedLayout>
        <template #header>
          <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Learning Modules per Student Year</h2>
        </template>
      <div class="py-12">
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
              <table>
                <tbody v-for="sy in schoolYear" :key="sy.id">
                  <tr>
                    <th class="text-xl font-medium cursor-pointer" scope="row">
                      {{ sy.name }}
                    </th>
                  </tr>
                  <tr v-for="learning_course in sy.learning_courses" :key="learning_course.id">
                    <td></td>
                    <td>
                      <table>
                        <tbody>
                          <tr>
                            <td>
                              <a href="#">{{ learning_course.title }}</a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
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
import { usePage } from '@inertiajs/vue3';
import { Link } from "@inertiajs/vue3";

let showAddModal = false; // Initial state for modal visibility

const props = defineProps({
    schoolYear: Array,
    message: String
});

const submitLearningModule = async (data) => {
    // Implement logic to submit learning module data (using Inertia or other method)
    console.log('Submitted Learning Module Data:', data);
    // You can potentially reset `formData` or close the modal here
};
</script>
  