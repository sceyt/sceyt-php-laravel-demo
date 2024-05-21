import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

// Load environment variables from `.env` file
import { config as dotenvConfig } from 'dotenv';
dotenvConfig();

export default defineConfig({
    resolve: {
        alias: {
            'sceyt-chat-react-uikit': '/node_modules/sceyt-chat-react-uikit/index.js'
        }
    },
    build: {
        minify: process.env.APP_ENV === 'production' ? 'esbuild' : false,
        cssMinify: process.env.APP_ENV === 'production',
    },
    plugins: [
        laravel({
            input: [
                'resources/react/app.tsx',
            ],
            refresh: true,
        }),
        react(),
    ],
    define: {
        // Define environment variables to be accessible in your React components
        'process.env': process.env
    }
});
