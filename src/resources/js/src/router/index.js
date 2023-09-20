import {createRouter, createWebHistory} from "vue-router"
import adminRoutes from "./admin"
import clientRoutes from "./client"

const routes = [
  ...clientRoutes,
  ...adminRoutes,
  {
    path: "/:pathMatch(.*)*",
    component: () => import("@/views/NotFound/404.vue")
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
