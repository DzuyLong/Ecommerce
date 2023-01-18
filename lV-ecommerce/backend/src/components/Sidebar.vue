<template>
    <div class="min-w-[250px] w-[250px]  transition-all bg-indigo-700 text-white py-4 px-2" >

      <router-link :to="{name: 'admin.dashboard'}"
                   class="flex items-center p-4 rounded transition-colors hover:bg-black/30">
        <span class="mr-2 text-gray-300">
          <HomeIcon class="w-6"/>
        </span>
        <span class="text-base">
          Dashboard
        </span>
      </router-link>
      <router-link :to="{name: 'admin.productCategory'}"
                   class="flex items-center p-4 rounded transition-colors hover:bg-black/30">
        <span class="mr-2 text-gray-300">
          <i class="bi bi-grid"></i>
        </span>
        <span class="text-base">
          ProductCategory
        </span>
      </router-link>
      <router-link :to="{name: 'admin.productInventory'}"
                   class="flex items-center p-4 rounded transition-colors hover:bg-black/30">
        <span class="mr-2 text-gray-300">
          <i class="bi bi-boxes"></i>
        </span>
        <span class="text-base">
          ProductInventory
        </span>
      </router-link>
      <router-link :to="{name: 'admin.products'}"
                   class="flex items-center p-4 rounded transition-colors hover:bg-black/30">
        <span class="mr-2 text-gray-300">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box2-fill" viewBox="0 0 16 16">
            <path d="M3.75 0a1 1 0 0 0-.8.4L.1 4.2a.5.5 0 0 0-.1.3V15a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4.5a.5.5 0 0 0-.1-.3L13.05.4a1 1 0 0 0-.8-.4h-8.5ZM15 4.667V5H1v-.333L1.5 4h6V1h1v3h6l.5.667Z"/>
          </svg>
        </span>
        <span class="text-base">
          Products
        </span>
      </router-link>
    </div>
  </template>
  
  <script setup>
    import {HomeIcon, UserGroupIcon, UsersIcon, ClipboardDocumentListIcon, ChartBarIcon} from '@heroicons/vue/24/outline'
  </script>
  
  <style scoped>
  .transition-all {
    transition-duration: 0.5s ;
  }
  </style>