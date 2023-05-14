import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/users',
      name: 'indexUser',
      component: () => import('../views/users/UserIndex.vue')
    },
    {
      path: '/users/create',
      name: 'createUser',
      component: () => import('../views/users/UserCreate.vue')
    },
    {
      path: '/users/:id/edit',
      name: 'editUser',
      component: () => import('../views/users/UserEdit.vue'),
      props: true
    },
    {
      path: '/enterprises',
      name: 'indexEnterprise',
      component: () => import('../views/enterprises/EnterpriseIndex.vue')
    },
    {
      path: '/enterprises/create',
      name: 'createEnterprise',
      component: () => import('../views/enterprises/EnterpriseCreate.vue')
    },
    {
      path: '/enterprises/:id/edit',
      name: 'editEnterprise',
      component: () => import('../views/enterprises/EnterpriseEdit.vue'),
      props: true
    },
    {
      path: '/categories',
      name: 'indexCategory',
      component: () => import('../views/categories/CategoryIndex.vue')
    },
    {
      path: '/categories/create',
      name: 'createCategory',
      component: () => import('../views/categories/CategoryCreate.vue')
    },
    {
      path: '/categories/:id/edit',
      name: 'editCategory',
      component: () => import('../views/categories/CategoryEdit.vue'),
      props: true
    },
  ]
})

export default router
