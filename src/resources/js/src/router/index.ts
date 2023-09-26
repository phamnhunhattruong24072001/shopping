import {createRouter, createWebHistory, RouteRecordRaw} from "vue-router"
import adminRoutes from "./admin"
import clientRoutes from "./client"

const routes: Array<RouteRecordRaw> = [
  ...clientRoutes,
  ...adminRoutes,
  {
    path: "/:pathMatch(.*)*",
    name: "404",
    component: () => import("@/views/NotFound/404.vue")
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
  linkActiveClass: ''
})

router.beforeEach((to, from, next) => {
  const isLoginAdmin = localStorage.getItem('admin_access_token')
  const isLoginClient = localStorage.getItem('access_token')
  const nameRouter = to.name
  if (to.path.includes('/admin') || to.path.includes('/admin/')) {
    if (to.meta.requiresAuth && !isLoginAdmin) {
      next({ name: 'admin.login'})
    } else {
      if ((nameRouter === 'admin.login' || nameRouter === 'admin.register') && isLoginAdmin) {
        next({ name: 'admin'})
      } else {
        next()
      }
    }
  } else {
    if (to.meta.requiresAuth && !isLoginClient) {
      next({ name: 'client.login'})
    } else {
      if ((nameRouter === 'client.login' || nameRouter === 'client.register') && isLoginClient) {
        next({ name: 'client.home'})
      } else {
        next()
      }
    }
  }
})

export default router
