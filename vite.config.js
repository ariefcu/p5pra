import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

import flowbite from "flowbite/plugin";
import typography from "flowbite/plugin";

export default defineConfig({
    "darkMode": 'class',
    "plugins": [
        laravel({
            "input": ['resources/css/app.css', 'resources/js/app.js'],
            "refresh": true,
        }),
        tailwindcss(),
        flowbite,
        flowbite-typography,
    ],
    "safelist":["bg-red-100", "bg-green-100", "bg-blue-100", "bg-yellow-100", "bg-pink-100"],
    theme: {
        extend: {
            colors: {
                primary: {
                    "50": "#eff6ff",
                    "100": "#dbeafe",
                    "200": "#bfdbfe",
                    "300": "#93c5fd",
                    "400": "#60a5fa",
                    "500": "#3b82f6",
                    "600": "#2563eb",
                    "700": "#1d4ed8",
                    "800": "#1e40af",
                    "900": "#1e3a8a",
                    "950": "#172554"
                }
            }
        }
    }
});
