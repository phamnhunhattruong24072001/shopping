import { createRouter, createWebHistory, RouteRecordRaw } from "vue-router";
import merchantRoutes from "./merchant";
import clientRoutes from "./client";

const routes: Array<RouteRecordRaw> = [
  ...clientRoutes,
  ...merchantRoutes,
  {
    path: "/:pathMatch(.*)*",
    name: "404",
    component: () => import("@/views/notfound/404.vue"),
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
  linkActiveClass: "",
});

router.beforeEach((to, from, next) => {
  const isLoginAdmin = localStorage.getItem("merchant_access_token");
  const isLoginClient = localStorage.getItem("access_token");
  const nameRouter = to.name;
  if (to.path.includes("/merchant") || to.path.includes("/merchant/")) {
    if (to.meta.requiresAuth && !isLoginAdmin) {
      next({ name: "merchant.login" });
    } else {
      if (
        (nameRouter === "merchant.login" || nameRouter === "merchant.register") &&
        isLoginAdmin
      ) {
        next({ name: "merchant" });
      } else {
        next();
      }
    }
  } else {
    if (to.meta.requiresAuth && !isLoginClient) {
      next({ name: "client.login" });
    } else {
      if (
        (nameRouter === "client.login" || nameRouter === "client.register") &&
        isLoginClient
      ) {
        next({ name: "client.home" });
      } else {
        next();
      }
    }
  }
});

export default router;
