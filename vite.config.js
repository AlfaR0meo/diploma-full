import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/index.scss',
                'resources/js/index.js',
                'resources/js/map/ecomap.js',
                // 'resources/views/**',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
    // base: './',
    // build: {
    //     outDir: 'public/build',
    // }
});
