<template>
    <div class="flex items-center justify-between mb-3">
      <h1 class="text-3xl font-semibold">Product Inventory</h1>
      <button type="button"
              @click="showAddNewModal()"
              class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
      >
        Add new Product Inventory
      </button>
    </div>
    <ProductInventoryTable @clickEditin="editProductInventory"/>
    <ProductInventoryModal v-model="showProductInventoryModal" :productInventory="productInventorytModel" @close="onModalClose"/>
  </template>
  
  <script setup>
  import {computed, onMounted, ref} from "vue";
  import store from "../../store";
  import ProductInventoryModal from "./ProductInventoryModal.vue";
  import ProductInventoryTable from "./ProductInventoryTable.vue";
  const DEFAULT_PRODUCT_Inventory = {
    id: '',
    quantity: '',
    published: false,
  }
  const productInventory = computed(() => store.state.productInventory);
  const productInventorytModel = ref({...DEFAULT_PRODUCT_Inventory});
  const showProductInventoryModal = ref(false);
  function showAddNewModal() {
    showProductInventoryModal.value = true
  }
  function editProductInventory(p) {
    store.dispatch('getProductInventory', p.id)
      .then(({data}) => {
        productInventorytModel.value = data.data;
        showAddNewModal();
      })
  }
  function onModalClose() {
    productInventorytModel.value =  {...DEFAULT_PRODUCT_Inventory}
  }
  </script>
  
  <style scoped>
  </style>