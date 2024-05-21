
# Laravel Application with Sceyt Chat API and UI Kit Integration

This sample Laravel project demonstrates how to integrate the `sceyt-chat-react-uikit` as a standalone React component using Vite. Additionally, it showcases the process of issuing chat access tokens to connect securely to your Sceyt application using the `sceyt-chat` SDK.

## Prerequisites

Make sure you have the following installed on your local environment:

- [PHP](https://www.php.net/) (version ^8.1 or higher)
- [Composer](https://getcomposer.org/) for managing PHP dependencies
- [Node.js](https://nodejs.org/) including npm or yarn for managing JavaScript packages

## Getting Started

Follow these steps to get the project up and running.

### Setting up the project 

1. Clone the repository:

    ```bash
    git clone https://github.com/sceyt-php-laravel-demo
    ```

2. Navigate into the project directory:

    ```bash
    cd sceyt-php-laravel-demo
    ```

3. Rename `example.env` to `.env` in the root directory.

4. Install the PHP dependencies using Composer:

    ```bash
    composer install
    ```

5. Install the JavaScript dependencies, including `sceyt-chat` and `sceyt-chat-react-uikit`, using `npm` or `yarn`:

    ```bash
    npm install
    ```

    or

    ```bash
    yarn install
    ```

6. Replace the `CHAT_PRIVATE_KEY` from `.env` file with your Sceyt application's private key to properly issue chat access tokens specific to your application. For guidance on creating a Sceyt application and generating the necessary private/public keys for authentication, visit the [Sceyt documentation](https://docs.sceyt.com/chat/api/application).

7. Change the the `CHAT_APP_ID` in `.env` with your Sceyt application ID.

```javascript
const connectClient = (token: string) => {
    ...
    const appId = 'dqev1ml4ld';
    const sceytClient = new SceytChatClient('https://us-ohio-api.sceyt.com', appId, Math.random()
        .toString(36)
        .substr(2, 11));
    ...
```

**Note**
The private key provided in this project is solely for demonstration purposes and should not be used in a production environment. Always ensure the private key for your Sceyt application is securely managed. Do not commit it to your repository; instead, use environment variables to handle it securely.

### Running the project

1. Start the Laravel development server:

    ```bash
    php artisan serve
    ```

2. In a separate terminal, start the Vite development server:

    ```bash
    npm run dev
    ```

    or

    ```bash
    yarn dev
    ```

After starting the servers, access the application by opening [http://localhost:8000](http://localhost:8000) in your web browser.


## Integration Steps

The `sceyt-chat-react-uikit` package is integrated as a separate React component in the Laravel application. Here are the key integration steps:

1. **Configuration**: Update the Vite configuration file (`vite.config.js` or `vite.config.ts`) to resolve the import paths for the `sceyt-chat-react-uikit` package. Add aliases or resolve paths as needed.

    ```javascript
    import { defineConfig } from 'vite';
    import laravel from 'laravel-vite-plugin';
    import react from '@vitejs/plugin-react';
    import { config as dotenvConfig } from 'dotenv';
    dotenvConfig();

    export default defineConfig({
        resolve: {
            alias: {
                // Add an alias for the sceyt-chat-react-uikit package
                'sceyt-chat-react-uikit': 'sceyt-chat-react-uikit/dist/index.js',
                // You may need to adjust the path to match the actual entry point of the package
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
        'process.env': process.env
        }
    });

    ```

2. **Update `resources/react/app.tsx`**: In your `resources/react/app.tsx` file, replace the rendering of `<Main />` with the chat component and use the `sceyt_chat` as Id in your view component where you want to use:

    ```tsx
    // resources/react/app.tsx

    import ReactDOM from 'react-dom/client';
    import ChatComponent from "./ChatComponent"; // Import the chat component
    import './index.css'

    ReactDOM.createRoot(document.getElementById('sceyt_chat')).render(
        <ChatComponent /> // Replace this component by creating same as https://github.com/sceyt/sceyt-chat-react-uikit/tree/main/examples/sceyt-livechat-agent-demo
    );
    ```

## License

This project is licensed under the [MIT License](LICENSE).
 