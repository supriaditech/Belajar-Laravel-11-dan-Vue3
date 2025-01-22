<template>
    <AppLayout title="Welcome Page">

        <h1 class="text-red-500 text-4xl">
            welcome
        </h1>
        <div v-for="user in user" :key="user.id">
            <Link :href="route('user.detail',user.id)">
                {{ user.nama }}
            </Link>
        </div>
    </AppLayout>
</template>


<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';

    defineProps({
        user:{
            type:Array,
            require:true
        }
    })
</script>