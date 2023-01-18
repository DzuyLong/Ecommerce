export function setUser(state, user) {
    state.user.data = user;
  }
  
  export function setToken(state, token) {
    state.user.token = token;
    if (token) {
      sessionStorage.setItem('TOKEN', token);
    } else {
      sessionStorage.removeItem('TOKEN')
    }
  }

  export function setProducts(state, [loading, data = null]) {

    if (data) {
      state.products = {
        ...state.products,
        data: data.data,
        links: data.meta?.links,
        page: data.meta.current_page,
        limit: data.meta.per_page,
        from: data.meta.from,
        to: data.meta.to,
        total: data.meta.total,
      }
    }
    state.products.loading = loading;
  }
  export function setProductCategory(state, [loading, data = null]) {

    if (data) {
      state.productCategory = {
        ...state.productCategory,
        data: data.data,
        links: data.meta?.links,
        page: data.meta.current_page,
        limit: data.meta.per_page,
        from: data.meta.from,
        to: data.meta.to,
        total: data.meta.total,
      }
    }
    state.productCategory.loading = loading;
  }
  export function setProductInventory(state, [loading, data = null]) {

    if (data) {
      state.productInventory = {
        ...state.productInventory,
        data: data.data,
        links: data.meta?.links,
        page: data.meta.current_page,
        limit: data.meta.per_page,
        from: data.meta.from,
        to: data.meta.to,
        total: data.meta.total,
      }
    }
    state.productInventory.loading = loading;
  }