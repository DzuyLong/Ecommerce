export default {
    user: {
      token: sessionStorage.getItem('TOKEN'),
      data: {}
    },
    productCategory: {
      loading: false,
      data: [],
      links: [],
      from: null,
      to: null,
      page: 1,
      limit: null,
      total: null
    },
    productInventory: {
      loading: false,
      data: [],
      links: [],
      from: null,
      to: null,
      page: 1,
      limit: null,
      total: null
    },
    products: {
      loading: false,
      data: [],
      links: [],
      from: null,
      to: null,
      page: 1,
      limit: null,
      total: null
    },
}