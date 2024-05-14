import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/index.scss',
                'resources/js/index.js',
                'resources/js/map/ecomap.js',
<<<<<<< HEAD

=======
                // 'resources/views/**',
>>>>>>> 4936f0ffebc584b2bb464390a8fffa220084732c
                'resources/js/app.js'
            ],
            refresh: true,
        }),
<<<<<<< HEAD
    ]
=======
    ],
    // base: './',
    // build: {
    //     outDir: 'public/build',
    // }
>>>>>>> 4936f0ffebc584b2bb464390a8fffa220084732c
});
