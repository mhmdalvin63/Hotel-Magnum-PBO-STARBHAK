//import vue router
import { createRouter, createWebHistory } from 'vue-router'

//define a routes
const routes = [
    {
        path: '/',
        name: 'index-home',
        component: () => import( /* webpackChunkName: "kamar.index" */ '@/views/Index.vue')
    },
    // ========== K A M A R ==========
    {
        path: '/kamar',
        name: 'kamar.index-kamar',
        component: () => import( /* webpackChunkName: "kamar.index" */ '@/views/kamar/Index.vue')
    },
    {
        path: '/create-kamar',
        name: 'kamar.create-kamar',
        component: () => import( /* webpackChunkName: "kamar.create" */ '@/views/kamar/Create.vue')
    },
    {
        path: '/edit-kamar/:id',
        name: 'kamar.edit-kamar',
        component: () => import( /* webpackChunkName: "kamar.edit" */ '@/views/kamar/Edit.vue')
    },

    // ========== T A M U ==========
    {
        path: '/tamu',
        name: 'tamu.index-tamu',
        component: () => import( /* webpackChunkName: "kamar.index" */ '@/views/tamu/Index.vue')
    },
    {
        path: '/create-tamu',
        name: 'tamu.create-tamu',
        component: () => import( /* webpackChunkName: "kamar.create" */ '@/views/tamu/Create.vue')
    },
    {
        path: '/edit-tamu/:id',
        name: 'tamu.edit-tamu',
        component: () => import( /* webpackChunkName: "kamar.edit" */ '@/views/tamu/Edit.vue')
    }
]

//create router
const router = createRouter({
    history: createWebHistory(),
    routes  // config routes
})

export default router