<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <header>
    <div class="max-w-7xl mx-auto">
      <nav class="p-2">
        <RouterLink 
          class="
          px-5 
          py-3
          mr-4
          bg-orange-500
          hover:bg-orange-600
          rounded 
          text-white"

          to="/"
          >Home</RouterLink
        >
        <RouterLink
          class="
            px-5 
            py-3
            mr-4
            bg-orange-500
            hover:bg-orange-600
            rounded 
            text-white"
          
          to="/users"
          >Users</RouterLink
        >
        <RouterLink
          class="
            px-5 
            py-3
            mr-4
            bg-orange-500
            hover:bg-orange-600
            rounded 
            text-white"
          
          to="/enterprises"
          >Enterprises</RouterLink
        >
        <RouterLink
          class="
            px-5 
            py-3
            mr-4
            bg-orange-500
            hover:bg-orange-600
            rounded 
            text-white"
          
          to="/categories"
          >Categories</RouterLink
        >
      </nav>
    </div>
  </header>

  <main class="max-w-7xl mx-auto min-h-screen">
    <RouterView />
  </main>
</template>
