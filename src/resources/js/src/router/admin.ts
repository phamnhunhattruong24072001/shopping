import Admin from "@/layouts/Admin.vue";
import Auth from "@/layouts/Auth.vue";

export default [
  {
    path: "/admin",
    name: "admin",
    redirect: "/admin/dashboard",
    component: Admin,
    meta: {
      requiresAuth: true,
    },
    children: [
      {
        path: "/admin/dashboard",
        alias: "/admin",
        name: "admin.dashboard",
        meta: {
          title: "Dashboard",
        },
        component: () => import("@/views/admin/dashboard/Dashboard.vue"),
      },
      {
        path: "/admin/setting",
        name: "admin.setting",
        meta: {
          title: "Settings",
        },
        component: () => import("@/views/admin/settings/Setting.vue"),
      },
      {
        path: "/admin/category",
        name: "admin.category",
        meta: {
          title: "Categories",
        },
        component: () => import("@/views/admin/categories/ListCategory.vue"),
      },
    ],
  },
  {
    path: "/admin",
    redirect: "/admin/login",
    component: Auth,
    children: [
      {
        path: "/admin/login",
        name: "admin.login",
        component: () => import("@/views/admin/auth/Login.vue"),
      },
      {
        path: "/admin/register",
        name: "admin.register",
        component: () => import("@/views/admin/auth/Register.vue"),
      },
    ],
  },
];
