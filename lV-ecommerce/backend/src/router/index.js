import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from '../views/dashboard.vue';
import Login from '../views/login.vue';
import store from '../store';
import Products from "../views/Product/Products.vue";
import AppLayout from '../components/AppLayout.vue';
import NotFound from '../views/NotFound.vue';
import Register from '../views/Register.vue';
import HomePageLayout from '../components/HomePageLayout.vue';
import ProductCategory from '../views/Product_category/ProductCategory.vue';
import ProductInventory from '../views/Product_inventory/ProductInventory.vue';
import ProductContent from '../views/WebHomePage/contentsite/ProductContent.vue';
import SingleCategory  from '../views/WebHomePage/contentsite/SingleCategory.vue';
    const routes = [
          {
            path: '/admin',
            name: 'admin',
            redirect: '/admin/dashboard',
            component: AppLayout,
            meta: {
              requiresAuth: true
            },
            children: [
              {
                path: 'dashboard',
                name: 'admin.dashboard',
                component: Dashboard
              },
              {
                path: 'products',
                name: 'admin.products',
                component: Products
              },
              {
                path: 'product-category',
                name: 'admin.productCategory',
                component: ProductCategory,
              },
              {
                path: 'product-inventory',
                name: 'admin.productInventory',
                component: ProductInventory,
              },                    
              
            ]
          },
        
          {
            path: '/admin/login',
            name: 'admin.login',
            component: Login,
            meta: {
              requiresGuest: true
            }
          }, 
          {
            path: '/admin/register',
            name: 'admin.register',
            component: Register,
            meta: {
              requiresGuest: true
            }
          },                    
        
          { 
            path: '/',
            name: 'homepage',
            component: HomePageLayout,
            children: [
              {
                path: '/',
                name: 'ProductContent',
                component: ProductContent
              },
              {
                path: '/:slug',
                name: 'SingleCategory',
                component: SingleCategory
              },
            ]
            
          },

        //   {
        //     path: '/request-password',
        //     name: 'requestPassword',
        //     component: RequestPassword,
        //     meta: {
        //       requiresGuest: true
        //     }
        //   },
        //   {
        //     path: '/reset-password/:token',
        //     name: 'resetPassword',
        //     component: ResetPassword,
        //     meta: {
        //       requiresGuest: true
        //     }
        //   },
          {
            path: '/:pathMatch(.*)',
            name: 'notfound',
            component: NotFound,
          }
    ];


const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth && !store.state.user.token) {
      next({name: 'admin.login'})
    } else if (to.meta.requiresGuest && store.state.user.token) {
      next({name: 'admin.dashboard'})
    } else {
      next();
    }
  
  })
  
export default router;