import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import Components from 'unplugin-vue-components/vite'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        Components({
            dirs: [
                'resources/js/src/components/',
            ],
            extensions: ['vue'],
        })
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
            '@': '/resources/js/src',
            '*': '/resources/js/public',
            '~': '/node_modules'
        },
    },
    server: {
        hmr: {
           host: 'localhost',
        },
        host: true,
        port: 3000,
        watch: {
            usePolling: true
        }
    },
});
