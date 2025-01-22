<template>  
  <nav class="bg-white shadow-md">      
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">      
          <div class="flex justify-between items-center h-16">      
              <div class="flex items-center">      
                  <div class="flex-shrink-0">      
                      <img class="h-8" src="/path/to/logo.png" alt="Logo" />      
                  </div>      
                  <div class="hidden md:flex md:space-x-8 ml-10">      
                      <router-link to="/" class="text-gray-700 hover:text-gray-900">Product</router-link>      
                      <router-link to="/features" class="text-gray-700 hover:text-gray-900">Features</router-link>      
                      <router-link to="/pricing" class="text-gray-700 hover:text-gray-900">Pricing</router-link>      
                      <router-link to="/support" class="text-gray-700 hover:text-gray-900">Support</router-link>      
                  </div>      
              </div>      
              <div class="flex items-center">      
                  <div class="relative">  
                      <input type="text" placeholder="Search" class="border rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />  
                      <span class="absolute inset-y-0 left-0 flex items-center pl-3">  
                          <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">  
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a7 7 0 100 14 7 7 0 000-14zm0 0v1m0-1a7 7 0 017 7m-7-7a7 7 0 00-7 7m7-7v1m0-1a7 7 0 017 7m-7-7a7 7 0 00-7 7" />  
                          </svg>  
                      </span>  
                  </div>  
                  <router-link to="/login" class="text-gray-700 hover:text-gray-900 ml-4">Login</router-link>      
                  <router-link to="/register" class="ml-4 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">      
                      Register      
                  </router-link>      
              </div>      
          </div>      
      </div>      
  </nav>      
</template>  

<script setup>  
</script>  

<style scoped>  
/* Tambahkan gaya tambahan jika diperlukan */  
</style>  
