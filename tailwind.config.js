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
    safelist: [
        'trix-toolbar-1',
        'trix-button',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                badhandwriting: ['bad_handwriting', ...defaultTheme.fontFamily.sans],
                protogrotesk: ['Proto Grotesk Web', ...defaultTheme.fontFamily.sans],
                script: ['Shadows Into Light', 'cursive', ...defaultTheme.fontFamily.sans],
            },
            animation: {
                'spin-stop': 'spin 1s ease-in-out 1',
                blurred: 'blurred 7s infinite',
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
            },
            keyframes: {
                blurred: {
                    '0%': {
                        transform: "translate(0px, 0px) scaleY(1) scaleX(1)",
                    },
                    '33%': {
                        transform: "translate(30px, -50px) scaleY(0.5) scaleX(0.5)",
                    },
                    '66%': {
                        transform: "translate(-20px, 20px) scaleY(2.0) scaleX(2.0)",
                    },
                    '100%': {
                        transform: "translate(0px, 0px) scaleY(1) scaleX(1)",
                    },
                },
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            flex: ['group-hover'],
            animation: ['group-hover'],
            translate: ['group-hover'],
            grayscale: ['hover', 'focus'],
            space: ['first'],
        },
    },

    plugins: [require('./resources/js/tailwindForms.js')],
};
