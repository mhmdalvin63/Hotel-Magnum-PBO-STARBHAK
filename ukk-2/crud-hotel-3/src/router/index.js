//import vue router
import { createRouter, createWebHistory } from 'vue-router'

//define a routes
const routes = [
    {
        path: '/',
        name: 'kamar.index-kamar',
        component: () => import( /* webpackChunkName: "kamar.index" */ '@/views/kamar/Index.vue')
    },
    {
        path: '/create',
        name: 'kamar.create-kamar',
        component: () => import( /* webpackChunkName: "kamar.create" */ '@/views/kamar/Create.vue')
    },
    {
        path: '/edit/:id',
        name: 'kamar.edit-kamar',
        component: () => import( /* webpackChunkName: "kamar.edit" */ '@/views/kamar/Edit.vue')
    }
]

//create router
const router = createRouter({
    history: createWebHistory(),
    routes  // config routes
})

export default router