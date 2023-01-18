
<template>
    <GuestLayout title="Đăng ký">
        <p class="mt-2 text-center text-sm text-gray-600">
        <router-link :to="{name: 'admin.login'}" class="font-medium text-indigo-600 hover:text-indigo-500">
            Đăng Nhập Ngay
        </router-link>
      </p>
      <form class="mt-8 space-y-6" method="POST" @submit.prevent="register">
        <div v-if="errorMsg" class="flex items-center justify-between py-3 px-5 bg-red-500 text-white rounded">
          {{ errorMsg }}
          <span @click="errorMsg = ''"
            class="w-8 h-8 flex items-center justify-center rounded-full transition-colors cursor-pointer hover:bg-[rgba(0,0,0,0.2)]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </span>
        </div>
        <input type="hidden" name="remember" value="true" />
        <div class="rounded-md shadow-sm -space-y-px">
        <div>
          <label for="fullname" class="sr-only">Full Name</label>
          <input id="fullname" name="name" v-model="user.name" type="text" autocomplete="name" required class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Full Name">
        </div>
          <div>
            <label for="email-address" class="sr-only">Email address</label>
            <input id="email-address" name="email" type="email" autocomplete="email" required="" v-model="user.email"
              class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
              placeholder="Email address" />
          </div>
          <div>
            <label for="password" class="sr-only">Password</label>
            <input id="password" name="password" type="password" autocomplete="current-password" required=""
              v-model="user.password"
              class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
              placeholder="Password" />
          </div>
          <div>
          <label for="password_confirmation" class="sr-only">Password Confirmation</label>
          <input id="password_confirmation" v-model="user.password_confirmation" name="password_confirmation" type="password" autocomplete="current-password_confirmation" required class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Password Confirm">
         </div>
        </div>
  
        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <input id="remember-me" name="remember-me" type="checkbox" v-model="user.remember"
              class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" />
            <label for="remember-me" class="ml-2 block text-sm text-gray-900"> Remember me </label>
          </div>
  
          <!-- <div class="text-sm">
            <router-link :to="{name: 'requestPassword'}" class="font-medium text-indigo-600 hover:text-indigo-500"> Forgot
              your password?
            </router-link>
          </div> -->
        </div>
  
        <div>
          <button type="submit" :disabled="loading"
            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            :class="{
    'cursor-not-allowed': loading,
    'hover:bg-indigo-500': loading,
  }">
            <svg v-if="loading" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
              fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor"
                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
              </path>
            </svg>
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <LockClosedIcon class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" aria-hidden="true" />
            </span>
            Đăng ký
          </button>
        </div>
      </form>
    </GuestLayout>
  
  </template>
  
  <script setup>
  import { ref } from 'vue'
  import { LockClosedIcon } from '@heroicons/vue/20/solid'
  import GuestLayout from '../components/GuestLayout.vue';
  import store from "../store";
  import router from "../router";
  let loading = ref(false);
  let errorMsg = ref("");
  const user = {
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    remember: false
  }
  function register() {
    loading.value = true;
    store.dispatch('register', user)
      .then(() => {
        loading.value = false;
        router.push({ name: 'admin.dashboard' })
      })
      .catch(({ response }) => {
        loading.value = false;
        errorMsg.value = response.data.message;
      })
  }
  </script>
    
    