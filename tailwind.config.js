import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', 'Figtree', ...defaultTheme.fontFamily.sans],
            },
            borderRadius: {
                '4px': '4px',
                '100px': '100px',
            },
            boxShadow: {
                'sm': '0px 2px 4px 0px rgba(0, 0, 0, 0.10), 0px 0px 2px 0px rgba(0, 0, 0, 0.25)',
                'md-light': '0px 4px 2px -2px rgba(0, 0, 0, 0.10)',
                'regular': '0px 1px 4px 0px rgba(0, 0, 0, 0.25)'
            },
            colors: {
                // Primary
                'primary-950': '#500721',
                'primary-900': '#83183F',
                'primary-800': '#9C1848',
                'primary-700': '#BD1957',
                'primary-600': '#DA2871',
                'primary-500': '#EB4993',
                'primary-400': '#F479B5',
                'primary-300': '#F9A8D1',
                'primary-200': '#FBCFE6',
                'primary-100': '#FCE7F2',
                'primary-50': '#FFF8FB',
                // Secondary
                'secondary-950': '#062C4B',
                'secondary-900': '#124A68',
                'secondary-800': '#0E587E',
                'secondary-700': '#0C6798',
                'secondary-600': '#0D82BC',
                'secondary-500': '#1BA2DC',
                'secondary-400': '#43BBED',
                'secondary-300': '#84D1F5',
                'secondary-200': '#A6DCF7',
                'secondary-100': '#071D49',
                'secondary-50': '#F1F9FE',
                // Neutral
                'neutral-950': '#262626',
                'neutral-900': '#3D3D3D',
                'neutral-800': '#454545',
                'neutral-700': '#4D4D4D',
                'neutral-600': '#5D5D5D',
                'neutral-500': '#6D6D6D',
                'neutral-400': '#888888',
                'neutral-300': '#B0B0B0',
                'neutral-200': '#D1D1D1',
                'neutral-100': '#E7E7E7',
                'neutral-50': '#F6F6F6',
                // Gray
                'gray-01': '#F6F6F6',
                'gray-02': '#E8E8E8',
                'gray-03': '#BDBDBD',
                'gray-04': '#666666',
                // Dark Gray
                'dark-gray-400': '#212B36',
                // Error
                'error-950': '#50011C',
                'error-900': '#8E0D3D',
                'error-800': '#A60B40',
                'error-700': '#C70943',
                'error-600': '#ED1D58',
                'error-500': '#FD3665',
                'error-400': '#FF6A8A',
                'error-300': '#FF9FB1',
                'error-200': '#FFCAD4',
                'error-100': '#FFE3E7',
                'error-50': '#FFF0F2',
                // Success
                'success-950': '#052E14',
                'success-900': '#14532A',
                'success-800': '#166530',
                'success-700': '#158038',
                'success-600': '#16A343',
                'success-500': '#23CD59',
                'success-400': '#4ADE79',
                'success-300': '#86EFA7',
                'success-200': '#BBF7CD',
                'success-100': '#DCFCE5',
                'success-50': '#F0FDF3',
                // Warning
                'warning-950': '#411B07',
                'warning-900': '#723715',
                'warning-800': '#8B4215',
                'warning-700': '#AB5412',
                'warning-600': '#CE7611',
                'warning-500': '#E99D1C',
                'warning-400': '#F0BA2F',
                'warning-300': '#F3CE56',
                'warning-200': '#F7E290',
                'warning-100': '#FBF1CA',
                'warning-50': '#FEFAEC',
            },
        },
    },

    plugins: [forms],
};
