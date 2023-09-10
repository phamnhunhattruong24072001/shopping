import "./bootstrap";
import { createApp } from "vue";
import axios from "axios";
import VueAxios from "vue-axios";

const app = createApp({});

import shoppingHome from "./src/views/client/ShoppingHome.vue";

app.component('shoppingHome', shoppingHome);

app.use(VueAxios, axios);

app.mount("#app");
