import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import Components from "unplugin-vue-components/vite";
import i18nResources from "vite-plugin-i18n-resources";
import { resolve } from "path";

export default defineConfig({
  plugins: [
    laravel({
      input: [
        "resources/sass/app.scss",
        "resources/css/app.css",
        "resources/js/app.ts",
      ],
      refresh: true,
    }),
    vue(),
    Components({
      dirs: ["resources/js/src/components/"],
      extensions: ["vue"],
    }),
    i18nResources({
      path: resolve(__dirname, "resources/js/src/locales"),
    }),
  ],
  resolve: {
    alias: {
      vue: "vue/dist/vue.esm-bundler.js",
      "@": "/resources/js/src",
    },
  },
  server: {
    hmr: {
      host: "localhost",
    },
    host: true,
    port: 3000,
    watch: {
      usePolling: true,
    },
  },
});
