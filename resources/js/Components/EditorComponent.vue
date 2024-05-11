<template>
    <div>
      <ckeditor id="wysywyg" v-model="editorData" :editor="editor" :config="editorConfig" @update:editorData="handleEditorUpdate" />
    </div>
  </template>
  
  <script setup>
  import { ref, watch } from 'vue';
  import CKEditor from '@ckeditor/ckeditor5-vue';
//   import { ClassicEditor } from '@ckeditor/ckeditor5-classic'; // Assuming ClassicEditor


  
  // Import your custom configuration (optional)
//   import editorConfig from './ckeditor-config.js';
  const props = defineProps({
    editor: {
      type: Object,
      required: true,
    },
    config: {
      type: Object,
      default: () => ({}), // Empty default config if not provided
    },
  });
  
  const editorData = ref(''); // Reactive data to store the WYSIWYG content
  const ClassicEditor = await ClassicEditor.create(document.querySelector('#wysywyg')); // Assuming you have an element for the editor
  
  const handleEditorUpdate = (updatedValue) => {
    editorData.value = updatedValue;
    console.log('Editor content updated:', updatedValue);
    // You can potentially perform actions like sending data to the server here
  };
  
  watch(editorData, (newValue) => {
    console.log('Editor data changed:', newValue);
    // Optional: Perform actions based on editor content changes
  });
  </script>
  
  <style scoped>
  /* (Optional) Add custom styles for the CKEditor component */
  </style>
  