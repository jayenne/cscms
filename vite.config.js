import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/assets/sass/admin/admin.scss',
                'resources/assets/sass/frontend/styles.scss',
            ],
            refresh: true,
        }),
    ],
});
