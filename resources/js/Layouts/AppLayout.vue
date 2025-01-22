<template>  
    <Head :title="title" />  
    <div>  
        <Navbar />  
        <main>  
            <slot />  
        </main>  
    </div>  
</template>  
  
<script setup>  
import { Head } from '@inertiajs/vue3';  
import Navbar from './Navbar/Navbar.vue';  
  
defineProps({  
    title: {  
        type: String,  
        required: true,  
    },  
});  
</script>  
