<template>
    <div class="sidebar-cate md:min-w-[250px] md:w-[250px] border py-4 px-2 mr-4" >
      <div class="title-category flex items-center p-1">
        <svg xmlns="http://www.w3.org/2000/svg"  width="28" height="28" fill="currentColor" class="bi bi-list-task mx-2 mt-1" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5H2zM3 3H2v1h1V3z"/>
          <path d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9z"/>
          <path fill-rule="evenodd" d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5V7zM2 7h1v1H2V7zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5H2zm1 .5H2v1h1v-1z"/>
        </svg>
        <p class="text-xl">Tất cả danh mục</p>
      </div>
        <router-link v-for="(lispc, index) in ListProductCate" :key="lispc.id" 
            :to="{params: {slug: lispc.slug}, name: 'SingleCategory'}" 
            class="route-cate flex items-center p-4 rounded transition-colors hover:bg-black/30" active-class="active" exact>
            <i class="bi bi-caret-right-fill mr-2 ml-2 text-[13px] text-amber-700"></i>  
          <span class="text-base">
            {{ lispc.title }}
          </span>
        </router-link>
</div>
</template>
<script setup>
import {computed, onMounted, ref} from "vue";
    import store from "../../../store";
    const ListProductCate = ref({});
    onMounted(() => {
      getListPC();
      })
    function getListPC() {
        store.dispatch("getListPC").
        then(({data}) => {
          ListProductCate.value  = data.data;
          });
      }
      // const isActive = false;
</script>
<style scoped>
@media (max-width: 766px) { 
  .sidebar-cate {
    display: flex;
    width: 100%;
    flex-wrap: wrap;
  }
}
.route-cate i {
  display: none;
}
.active i {
  display: block;
}
</style>