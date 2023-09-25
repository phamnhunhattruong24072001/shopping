import "./bootstrap";
import {createApp} from "vue";
import axios from "axios";
import VueAxios from "vue-axios";
import App from "./App.vue"
import router from "@/router"
import { store } from "@/store";

const app = createApp({})

app.component("AppTemplate", App)

app.use(VueAxios, axios)
  .use(router)
  .use(store)

app.mount("#app")
