import "./bootstrap";
import { createApp } from "vue";
import axios from "axios";
import VueAxios from "vue-axios";
import App from "./App.vue";
import router from "@/router";
import { store } from "@/store";
import { createI18n } from "vue-i18n";
import { messages } from "vite-i18n-resources";

const app = createApp({});

app.component("AppTemplate", App);

const i18n = new createI18n({
  legacy: false,
  locale: "en",
  fallbackLocale: "vi",
  messages,
});

if (import.meta.hot) {
  import.meta.hot.on("locales-update", (data) => {
    Object.keys(data).forEach((lang) => {
      i18n.global.setLocaleMessage(lang, data[lang]);
    });
  });
}

app.use(VueAxios, axios).use(router).use(store).use(i18n);

app.mount("#app");
