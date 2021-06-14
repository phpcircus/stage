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
                '70': '70px',
                '-50': '-50px',
                '10': '10px',
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            flex: ['group-hover'],
            animation: ['group-hover'],
            translate: ['group-hover'],
        },
    },

    plugins: [require('./resources/js/tailwindForms.js')],
};
