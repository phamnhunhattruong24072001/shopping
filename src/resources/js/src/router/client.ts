import Client from "@/layouts/Client.vue";
export default [
  {
    path: "/",
    redirect: "/",
    component: Client,
    children: [
      {
        path: "/",
        name: "client.home",
        component: () => import("@/views/client/ShopHome.vue"),
      },
    ],
  },
];
