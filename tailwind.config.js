const tailwindcss = require('tailwindcss');
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                badhandwriting: ['bad_handwriting', ...defaultTheme.fontFamily.sans],
                protogrotesk: ['Proto Grotesk Web', ...defaultTheme.fontFamily.sans],
            },
            animation: {
                'spin-stop': 'spin 1s ease-in-out 1',
            },
            scale: {
               '10': '.10',
               '25': '.25',
            },
            screens: {
                'xxs': '280px',
                'xs': '320px',
            },
            inset: {
                '-4': '-4px',
                '70': '70px',
                '-50': '-50px',
                '10': '10px',
                '-10': '-10px',
            },
            transitionDuration: {
                '0': '0ms',
                '2000': '2000ms',
                '3000': '3000ms',
                '4000': '4000ms',
            }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            flex: ['group-hover'],
            animation: ['group-hover'],
            translate: ['group-hover'],
            grayscale: ['hover', 'focus'],
        },
    },

    plugins: [require('./resources/js/tailwindForms.js')],
};
