  import { isInteger } from "lodash";
import axiosClient from "../axios";


export function getCurrentUser({commit}, data) {
    return axiosClient.get('/user', data)
      .then(({data}) => {
        commit('setUser', data);
        return data;
      })
  }
export function login({commit}, data) {
    return axiosClient.post('/login', data)
      .then(({data}) => {
        commit('setUser', data.user); //comit lên thằng mutaions sau đó mới gửi lên thằng state
        commit('setToken', data.token)
        return data;
      })
  }
  export function register({commit}, data) {
    return axiosClient.post('/register', data)
      .then(({data}) => {
        commit('setUser', data.user); //comit lên thằng mutaions sau đó mới gửi lên thằng state
        commit('setToken', data.token)
        return data;
      })
  }
  export function logout({commit}) {
    return axiosClient.post('/logout')
      .then((response) => {
        commit('setToken', null)
  
        return response;
      })
  }

  export function getProducts({commit, state}, {url = null, search = '', per_page, sort_field, sort_direction} = {}) {
    commit('setProducts', [true])
    url = url || '/products'
    const params = {
      per_page: state.products.limit,
    }
    return axiosClient.get(url, {
      params: {
        ...params,
        search, per_page, sort_field, sort_direction
      }
    })
      .then((response) => {
        commit('setProducts', [false, response.data])
      })
      .catch(() => {
        commit('setProducts', [false])
      })
  }
  export function getProductsHP({commit}) {
    return axiosClient.get(`/get-products`)
  }
  export function getProduct({commit}, id) {
    return axiosClient.get(`/products/${id}`)
  }
  
  export function createProduct({commit}, product) {
    if (product.image instanceof File) {
      const form = new FormData();
      form.append('title', product.title);
      form.append('image', product.image);
      form.append('description', product.description || '');
      form.append('published', product.published ? 1 : 0);
      form.append('category_id', product.category_id);
      form.append('inventory_id', product.inventory_id);
      form.append('price', product.price);
      product = form;
    }
    return axiosClient.post('/products', product)
  }

  export function deleteProduct({commit}, id) {
    return axiosClient.delete(`/products/${id}`)
  }
  export function updateProduct({commit}, product) {
    const id = product.id
    if (product.image instanceof File) {
      const form = new FormData();
      form.append('id', product.id);
      form.append('title', product.title);
      form.append('image', product.image);
      form.append('description', product.description || '');
      form.append('published', product.published ? 1 : 0);
      form.append('price', product.price);
      form.append('category_id', product.category_id);
      form.append('inventory_id', product.inventory_id);
      form.append('_method', 'PUT');
      product = form;
    } else {
      product._method = 'PUT'
    }
    return axiosClient.post(`/products/${id}`, product)
  }

//  ---------------------- produc category-------------
  export function getProductCategories({commit, state}, {url = null, search = '', per_page, sort_field, sort_direction} = {}) {
    commit('setProductCategory', [true])
    url = url || '/productCategory'
    const params = {
      per_page: state.productCategory.limit,
    }
    return axiosClient.get(url, {
      params: {
        ...params,
        search, per_page, sort_field, sort_direction
      }
    })
      .then((response) => {
        commit('setProductCategory', [false, response.data])
      })
      .catch(() => {
        commit('setProductCategory', [false])
      })
  }
  export function getProductCategory({commit}, id) {
    return axiosClient.get(`/productCategory/${id}`)
  }

  export function createProductCategory({commit}, productCategory) {
    const form = new FormData();
      form.append('title', productCategory.title);
      form.append('description', productCategory.description || '');
      form.append('published', productCategory.published ? 1 : 0);
      productCategory = form;
    return axiosClient.post('/productCategory', productCategory)
  }

  export function deleteProductCategory({commit}, id) {
    return axiosClient.delete(`/productCategory/${id}`)
  }
  export function updateProductCategory({commit}, productCategory) {
    const id = productCategory.id
      productCategory._method = 'PUT'
    return axiosClient.post(`/productCategory/${id}`, productCategory)
  }
  export function getListPC({commit}) {
    return axiosClient.get(`/get-listPC`);
  }
  export function getCategorySingle({commit}, slug) {
    return axiosClient.get(`/danh-muc/${slug}`)
    
  }
  // ---------------product inventory------------
  export function getProductInventories({commit, state}, {url = null, search = '', per_page, sort_field, sort_direction} = {}) {
    commit('setProductInventory', [true])
    url = url || '/productInventory'
    const params = {
      per_page: state.productInventory.limit,
    }
    return axiosClient.get(url, {
      params: {
        ...params,
        search, per_page, sort_field, sort_direction
      }
    })
      .then((response) => {
        commit('setProductInventory', [false, response.data])
      })
      .catch(() => {
        commit('setProductInventory', [false])
      })
  }
  export function getProductInventory({commit}, id) {
    return axiosClient.get(`/productInventory/${id}`)
  }

  export function createProductInventory({commit}, productInventory) {
    const form = new FormData();
      form.append('quantity', productInventory.quantity);
      form.append('published', productInventory.published ? 1 : 0);
      productInventory = form;
    return axiosClient.post('/productInventory', productInventory)
  }

  export function deleteProductInventory({commit}, id) {
    return axiosClient.delete(`/productInventory/${id}`)
  }
  export function updateProductInventory({commit}, productInventory) {
    const id = productInventory.id
    const form = new FormData();
      form.append('quantity', productInventory.quantity);
      form.append('published', productInventory.published ? 1 : 0);
      form.append('_method', 'PUT');
      productInventory = form;
    return axiosClient.post(`/productInventory/${id}`, productInventory)
  }
  export function getListIV({commit}) {
    return axiosClient.get(`/productInventory`);
  }