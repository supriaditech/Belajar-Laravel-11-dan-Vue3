<template>
  <nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-16">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <img class="h-8" src="/images/logo/logo.png" alt="Logo" />
          </div>
          <div class="hidden md:flex md:space-x-8 ml-10">
            <div>
              <Link :href="route('user')"> Home </Link>
            </div>
            <div>
              <Link :href="route('question')"> Question </Link>
            </div>
          </div>
        </div>
        <div class="flex items-center">
          <div class="relative">
            <input
              type="text"
              placeholder="Search"
              class="border rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
          </div>
          <Link
            :href="route('login')"
            class="text-gray-700 hover:text-gray-900 ml-4"
          >
            Login
          </Link>
          <Link
            :href="route('register')"
            class="ml-4 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700"
          >
            Register
          </Link>
        </div>
      </div>
    </div>
  </nav>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<style scoped>
/* Tambahkan gaya tambahan jika diperlukan */
</style>
