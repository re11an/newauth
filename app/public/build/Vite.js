import { defineConfig } from 'Vite';
import laravel from 'laravel-vite-plugin';
import vue from 'vite-plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        vue(),
    ],
});
