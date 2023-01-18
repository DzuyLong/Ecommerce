<template>
    <div class="flex items-center justify-between mb-3">
      <h1 class="text-3xl font-semibold">Product Category</h1>
      <button type="button"
              @click="showAddNewModal()"
              class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
      >
        Add new Product Category
      </button>
    </div>
    <ProductCategoryTable @clickEditPc="editProductCategory"/>
    <ProductCategoryModal v-model="showProductCategoryModal" :productCategory="productCategorytModel" @close="onModalClose"/>
  </template>
  
  <script setup>
  import {computed, onMounted, ref} from "vue";
  import store from "../../store";
  import ProductCategoryModal from "./ProductCategoryModal.vue";
  import ProductCategoryTable from "./ProductCategoryTable.vue";
  const DEFAULT_PRODUCT_CATEGORY = {
    id: '',
    title: '',
    description: '',
    published: false,
  }
  const productCategory = computed(() => store.state.productCategory);
  const productCategorytModel = ref({...DEFAULT_PRODUCT_CATEGORY});
  const showProductCategoryModal = ref(false);
  function showAddNewModal() {
    showProductCategoryModal.value = true
  }
  function editProductCategory(p) {
    store.dispatch('getProductCategory', p.id)
      .then(({data}) => {
        productCategorytModel.value = data.data;
        showAddNewModal();
      })
  }
  function onModalClose() {
    productCategorytModel.value =  {...DEFAULT_PRODUCT_CATEGORY}
  }
  </script>
  
  <style scoped>
  </style>