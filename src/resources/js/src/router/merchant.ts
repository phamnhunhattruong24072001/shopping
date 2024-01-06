import Admin from "@/layouts/Admin.vue";
import Auth from "@/layouts/Auth.vue";

export default [
  {
    path: "/merchant",
    name: "merchant",
    redirect: "/merchant/dashboard",
    component: Admin,
    meta: {
      requiresAuth: true,
    },
    children: [
      {
        path: "dashboard",
        alias: "merchant",
        name: "merchant.dashboard",
        meta: {
          title: "Dashboard",
        },
        component: () => import("@/views/merchant/dashboard/Dashboard.vue"),
      },
      {
        path: "setting",
        name: "merchant.setting",
        meta: {
          title: "Settings",
        },
        component: () => import("@/views/merchant/settings/Setting.vue"),
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
              import("@/views/merchant/categories/ListCategory.vue"),
          },
          {
            path: "create",
            name: "category.create",
            meta: {
              title: "Create Category",
            },
            component: () =>
              import("@/views/merchant/categories/CreateCategory.vue"),
          },
        ],
      },
    ],
  },
  {
    path: "/merchant",
    redirect: "/merchant/login",
    component: Auth,
    children: [
      {
        path: "login",
        name: "merchant.login",
        component: () => import("@/views/merchant/auth/Login.vue"),
      },
      {
        path: "register",
        name: "merchant.register",
        component: () => import("@/views/merchant/auth/Register.vue"),
      },
    ],
  },
];
