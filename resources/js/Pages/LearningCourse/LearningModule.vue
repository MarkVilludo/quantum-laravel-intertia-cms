<template>
    <Head title="Learning Module" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Learning Modules per Student Year</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-white">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="px-4 pt-4 text-right">
                        <button class="inline-flex items-center px-4 py-2 bg-green-500 text-white font-bold rounded-lg shadow hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"  @click="$page.component = 'CreateCourse';console.log('Button clicked');">
                            <i class="fas fa-plus"></i> Add New Course
                        </button>
                        <div>
                        <CreateCourse v-show="showNewCourseModal" @close="showNewCourseModal = false"   @click="$page.component = 'CreateCourse'"/> </div>
                    </div>
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
    import CreateCourse from './CreateCourse.vue';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head } from '@inertiajs/vue3';
    const darkMode = usePage().props.dark;
    import { ref } from 'vue'; // Import ref from Vue

    import { usePage } from '@inertiajs/vue3';
    const props = defineProps({
        schoolYear: Array,
    });
    const showNewCourseModal = ref(true);
    const newCourseData = ref({
        // Define properties for your new course data (e.g., title, description)
        title: '',
        description: '',
    });
    const { data } = usePage();
</script>