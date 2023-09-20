import Admin from "../layouts/Admin.vue";
import Auth from "../layouts/Auth.vue";

export default [
  {
    path: "/admin",
    redirect: "/admin",
    component: Admin,
    children: [
      {
        path: "/admin",
        component: () => import("@/views/Admin/Dashboard/Dashboard.vue")
      },
      {
        path: "/admin/setting",
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
        component: () => import("@/views/Admin/Auth/Login.vue")
      },
      {
        path: "/admin/register",
        component: () => import("@/views/Admin/Auth/Register.vue")
      },
    ]
  }
]
