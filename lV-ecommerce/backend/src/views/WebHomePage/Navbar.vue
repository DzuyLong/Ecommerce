<template>
    <div class="bg-gray-900 text-gray-50 py-3.5 md:px-8 px-12 shadow-md md:flex justify-between relative  items-center">
       <div class="flex items-center">
          <span class="text-amber-400 text-2xl mx-4">
            <i class="bi bi-basket3"></i>
          </span>
          <h1 class="text-xl">Name</h1>
       </div>

       <span @click="ToggleMenuOpen" class="absolute md:hidden right-10 text-amber-400 top-[15px] cursor-pointer text-2xl" >
        <i :class="[openNavbar ? 'bi bi-x-circle' : 'bi bi-menu-button-wide']"></i>  
      </span>


       <ul class="md:flex z-50 md:items-center md:px-0 px-16 md:pb-0 pb-10 md:static absolute bg-slate-900 md:w-auto w-full 
       top-[52px] left-0 transition-all duration-500 ease-in-out" :class="[openNavbar ? 'left-0' : 'left-[-100%]']">
        <li class="md:mx-5 md:my-0  my-2" v-for="item in navigation" :key="item.name" >
           <router-link :to="item.to" class="relative inline-block leading-8 text-xl hover:after:w-full 
           after:bg-amber-400 after:transition-all after:duration-300 
           after:block after:w-0 after:h-[1px] hover:text-amber-500 
           hover:text-navbar-font ease-in-out transition-all duration-300 
           " 
           >{{ item.name }}</router-link>
        </li>
        <Button>
          Buy Now
        </Button>
       </ul>
    </div>
</template>
  
  <script setup>
  import Button from '../WebHomePage/button.vue'
  import { ref } from 'vue'
  const openNavbar = ref(false);
  const navigation = [
    { name: 'Home', to: {name: 'homepage'} },
    { name: 'About', to: {name: 'homepage'} },
    { name: 'Contract', to: {name: 'homepage'}},
  ]

  function ToggleMenuOpen(){
    openNavbar.value  = !openNavbar.value;
  }
  // <router-link v-for="item in navigation" :key="item.name" :to="item.to" active-class = "bg-gray-900 text-white" 
  //                 :class="[this.$route.name === item.to.name ? ' ' : 'text-gray-300 hover:bg-gray-700 hover:text-white'
  //                 , 'px-3 py-2 rounded-md text-sm font-medium']">{{ item.name }}</router-link>
  </script>