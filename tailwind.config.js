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
                // sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                sans: ['Roboto'],
            },
            colors: {
                'Bitterness-Blue': '#1B5678',
              },
        },
    },

    plugins: [forms,
        function ({ addUtilities }) {
          const newUtilities = {
                '.input-num': {
                    '-webkit-appearance': 'none',
                    '&::-webkit-inner-spin-button': {
                    position: 'absolute',
                    top: '0',
                    bottom: '0',
                    right: '0',
                    transform: 'scale(2)',
                    opacity: '0',
                    cursor: 'pointer',
                    },
                },
                '.triangle-upward': {
                    position: 'absolute',
                    top: '30%',
                    right: '8px',
                    'background-color': 'rgb(156 163 175)',
                    height: '5px',
                    width: '12px',
                    'clip-path': 'polygon(50% 0, 100% 100%, 0 100%)',
                },
                '.triangle-downward': {
                    position: 'absolute',
                    bottom: '30%',
                    right: '8px',
                    'background-color': 'rgb(156 163 175)',
                    height: '5px',
                    width: '12px',
                    'clip-path': 'polygon(0 0, 100% 0%, 50% 100%)',
                },
                '.equilateral-triangle-downward': {
                    position: 'absolute',
                    bottom: '40%',
                    right: '35px',
                    height: '11.5px',
                    width: '14px',
                    'clip-path': 'polygon(0 0, 100% 0%, 50% 100%)',
                },
                '.indi-learning-data': {
                    'max-height': '219px',
                    'overflow-y': 'auto',
                },

            }
          addUtilities(newUtilities)
        },
    ]
};
