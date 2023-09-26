import Admin from "@/layouts/Admin.vue";
import Auth from "@/layouts/Auth.vue";

export default [
  {
    path: "/admin",
    name: "admin",
    redirect: "/admin/dashboard",
    component: Admin,
    meta: {
      requiresAuth: true
    },
    children: [
      {
        path: "/admin/dashboard",
        alias: "/admin",
        name: "admin.dashboard",
        component: () => import("@/views/Admin/Dashboard/Dashboard.vue")
      },
      {
        path: "/admin/setting",
        name: "admin.setting",
        component: () => import("@/views/Admin/Settings/Setting.vue")
      },
    ]
  },
  {
    path: "/admin",
    redirect: "/admin/login",
    component: Auth,
    children: [
      {
        path: "/admin/login",
        name: "admin.login",
        component: () => import("@/views/Admin/Auth/Login.vue")
      },
      {
        path: "/admin/register",
        name: "admin.register",
        component: () => import("@/views/Admin/Auth/Register.vue")
      },
    ]
  }
]
