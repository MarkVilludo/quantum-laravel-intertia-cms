<template>
    <Head title="Learning Module" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Learning Modules per Student Year</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-white">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <button class="add-new-course-button" @click="$page.component = 'CreateCourse'">
                        <i class="fas fa-plus"></i> Add New Course
                    </button>
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
    import CreateCourse from '@/Pages/LearningCourse/CreateCourse.vue';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head } from '@inertiajs/vue3';
    const darkMode = usePage().props.dark;

    import { usePage } from '@inertiajs/vue3';
    const props = defineProps({
        schoolYear: Array,
    });
    const { data } = usePage();
</script>