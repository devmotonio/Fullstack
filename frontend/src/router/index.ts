import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'
import Products from '@/components/Products.vue';
import ProductsCreate from '@/components/ProductsCreate.vue';
import ProductsUpdate from '@/components/ProductsUpdate.vue';

const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    name: 'Products',
    component: Products
  },
  {
    path: '/adicionar',
    name: 'ProductsCreate',
    component: ProductsCreate
  },
  {
    path: '/:id/editar',
    name: 'ProductsUpdate',
    component: ProductsUpdate
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
