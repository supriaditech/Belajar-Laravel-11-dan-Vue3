<template>
  <Head :title="title" />
  <div>
    <Navbar />
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
      <slot />
    </main>
  </div>
</template>

<script setup>
import { Head } from '@inertiajs/vue3'
import Navbar from './Navbar/Navbar.vue'

defineProps({
  title: {
    type: String,
    required: true,
  },
})
</script>
