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
        path: "dashboard",
        alias: "admin",
        name: "admin.dashboard",
        meta: {
          title: "Dashboard",
        },
        component: () => import("@/views/admin/dashboard/Dashboard.vue"),
      },
      {
        path: "setting",
        name: "admin.setting",
        meta: {
          title: "Settings",
        },
        component: () => import("@/views/admin/settings/Setting.vue"),
      },
      {
        path: "category",
        children: [
          {
            path: "",
            name: "category",
            meta: {
              title: "List Category",
            },
            component: () =>
              import("@/views/admin/categories/ListCategory.vue"),
          },
          {
            path: "create",
            name: "category.create",
            meta: {
              title: "Create Category",
            },
            component: () =>
              import("@/views/admin/categories/CreateCategory.vue"),
          },
        ],
      },
    ],
  },
  {
    path: "/admin",
    redirect: "/admin/login",
    component: Auth,
    children: [
      {
        path: "login",
        name: "admin.login",
        component: () => import("@/views/admin/auth/Login.vue"),
      },
      {
        path: "register",
        name: "admin.register",
        component: () => import("@/views/admin/auth/Register.vue"),
      },
    ],
  },
];
