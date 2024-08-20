import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue'; // si vous utilisez Vue.js
import laravel from 'vite-plugin-laravel';

export default defineConfig({
    plugins: [
        laravel(),
        vue() // si vous utilisez Vue.js
    ],
    css: {
        postcss: {
            plugins: [
                require('postcss-import'),
                require('tailwindcss'),
                require('autoprefixer'),
            ],
        },
    },
});
