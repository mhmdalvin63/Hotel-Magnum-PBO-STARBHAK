import { createRouter, createWebHistory } from "vue-router";
import Dashboard from "../views/Dashboard.vue";
import Tables from "../views/Tables.vue";
import Billing from "../views/Billing.vue";
import VirtualReality from "../views/VirtualReality.vue";
import RTL from "../views/Rtl.vue";
import Profile from "../views/Profile.vue";
import Signup from "../views/Signup.vue";
import Signin from "../views/Signin.vue";

import Indexkamar from "../views/kamar/Index.vue";
import Createkamar from "../views/kamar/Create.vue";
import Editkamar from "../views/kamar/Edit.vue";

import Indextamu from "../views/tamu/Index.vue";
import Createtamu from "../views/tamu/Create.vue";
import Edittamu from "../views/tamu/Edit.vue";

const routes = [
  
// ========== K A M A R ==========
{
    path: '/kamar',
    name: 'kamar.index-kamar',
    component: Indexkamar
},
{
    path: '/create-kamar',
    name: 'kamar.create-kamar',
    component: Createkamar
},
{
    path: '/edit-kamar/:id',
    name: 'kamar.edit-kamar',
    component: Editkamar
},

// ========== T A M U ==========
{
    path: '/tamu',
    name: 'tamu.index-tamu',
    component: Indextamu
},
{
    path: '/create-tamu',
    name: 'tamu.create-tamu',
    component: Createtamu
},
{
    path: '/edit-tamu/:id',
    name: 'tamu.edit-tamu',
    component: Edittamu
},



  {
    path: "/",
    name: "/",
    redirect: "/dashboard-default",
  },
  {
    path: "/dashboard-default",
    name: "Dashboard",
    component: Dashboard,
  },
  {
    path: "/tables",
    name: "Tables",
    component: Tables,
  },
  {
    path: "/billing",
    name: "Billing",
    component: Billing,
  },
  {
    path: "/virtual-reality",
    name: "Virtual Reality",
    component: VirtualReality,
  },
  {
    path: "/rtl-page",
    name: "RTL",
    component: RTL,
  },
  {
    path: "/profile",
    name: "Profile",
    component: Profile,
  },
  {
    path: "/signin",
    name: "Signin",
    component: Signin,
  },
  {
    path: "/signup",
    name: "Signup",
    component: Signup,
  },
  
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
  linkActiveClass: "active",
});

export default router;
