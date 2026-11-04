import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['"Plus Jakarta Sans"', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                ink: {
                    900: '#1C2521',
                    700: '#3A4440',
                    500: '#5B625C',
                    400: '#8B8F86',
                },
                paper: {
                    DEFAULT: '#F7F6F2',
                    100: '#F1EFE9',
                },
                primary: {
                    50: '#EAF1EE',
                    100: '#D3E3DD',
                    300: '#7FA89C',
                    500: '#2F5D57',
                    600: '#244943',
                    700: '#1B3733',
                },
                border: {
                    DEFAULT: '#DEDAD0',
                },
                status: {
                    draft: '#8A8A82',
                    'draft-bg': '#F1F0EC',
                    diajukan: '#B6742B',
                    'diajukan-bg': '#FBF1E3',
                    dikirim: '#3A6EA5',
                    'dikirim-bg': '#E9F0F7',
                    dikembalikan: '#B3503C',
                    'dikembalikan-bg': '#FBEBE7',
                    divalidasi: '#3F7A52',
                    'divalidasi-bg': '#EAF3EC',
                },
            },
            borderRadius: {
                sm: '4px',
                DEFAULT: '6px',
                md: '8px',
            },
        },
    },

    plugins: [forms],
};
