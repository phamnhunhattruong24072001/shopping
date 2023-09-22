import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import Components from 'unplugin-vue-components/vite';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/sass/app.scss',
        'resources/css/app.css',
        'resources/js/app.ts',
      ],
      refresh: true,
    }),
    vue(),
    Components({
      dirs: [
        'resources/js/src/components/',
      ],
      extensions: ['vue'],
    }),
  ],
  resolve: {
    alias: {
      vue: 'vue/dist/vue.esm-bundler.js',
      '@': '/resources/js/src',
      '~': '/node_modules',
    },
  },
  server: {
    hmr: {
      host: 'localhost',
    },
    host: true,
    port: 3000,
    watch: {
      usePolling: true,
    },
  },
});
