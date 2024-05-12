
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
import 'dotenv/config';
// import Lame from '/node_modules/lame.js';
export default defineConfig({
    resolve: {
        alias: {
            'sceyt-chat-react-uikit': '/node_modules/sceyt-chat-react-uikit/index.js'
        }
    },
    
    // define: {
    //     'global.Lame': Lame  
    // },
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
});
