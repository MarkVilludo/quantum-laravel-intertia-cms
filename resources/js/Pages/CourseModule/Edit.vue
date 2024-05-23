<template>
    <AuthenticatedLayout>
        <template #header>
          <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Edit Module</h2>
        </template>
        <div class="py-12 mx-2">
          <div v-if="success">
            
            <div class="bg-green-500 text-white px-4 py-3 rounded-full text-sm font-medium">
              <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 0 0-3.54.86l-2 2a1 1 0 0 0 1.414 1.414L10 8.586l3.586-3.586a1 1 0 0 0 1.414-1.414zM10 10a10 10 0 1 0 0-20 10 10 0 0 0 0 20z" clip-rule="evenodd"></path></svg>
              <span>{{  message }}</span>
            </div>
          </div>
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 dark:text-white dark:bg-white text-black dark:bg-gray-800 py-8 dark:text-black">
            <form @submit.prevent="submit">
              <div class="mb-3">
                <label for="name" class="form-label block mb-2 text-sm font-medium dark:text-gray-200">Name</label>
                <input type="text" id="name" v-model="form.name" class="form-control block w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-blue-500 focus:ring-opacity-50">
              </div>
              <div class="mb-3">
                <label for="content" class="form-label block mb-2 text-sm font-medium dark:text-gray-200">Content</label>
                <Editor api-key='oghexe64qzr3qq2ok0vnyz7s20xhkzspi8b1rlogu9oxdimz' v-model="form.content"/>
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
  import Editor from '@tinymce/tinymce-vue'

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
    message: String,
    success: Boolean,
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
    form.put(`/learning-modules/${props.module.id}`);
  };
  </script>
  <style scoped>
    @media (min-width: 1024px) {
      #sample {
        display: flex;
        flex-direction: column;
        place-items: center;
        width: 1000px;
      }
    }
  </style>
  