import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/index.scss',
                'resources/js/index.js',
                'resources/js/ecomap/ecomap.js',
                'resources/js/auth.js',
                'resources/js/profile.js',

                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ]
});
