const defaultTheme = require('tailwindcss/defaultTheme');

function withOpacity(variableName) {
    return ({ opacityValue }) => {
        if (opacityValue !== undefined) {
            return `rgba(var(${variableName}), ${opacityValue})`;
        }
        return `rgb(var(${variableName}))`;
    }
}

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
        screens: {
            'xxs': '280px',
            'xs': '320px',
            'ws': '540px',
            'sm': '703px',
            'md': '768px',
            'lg': '1024px',
            'xl': '1280px',
            '2xl': '1536px',
        },
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                badhandwriting: ['bad_handwriting', ...defaultTheme.fontFamily.sans],
                protogrotesk: ['Proto Grotesk Web', ...defaultTheme.fontFamily.sans],
                soloist: ['soloist', ...defaultTheme.fontFamily.sans],
                'lemonmilk': ['lemon_milk', ...defaultTheme.fontFamily.sans],
                milestone: ['milestone', ...defaultTheme.fontFamily.sans],
            },
            transitionProperty: {
                'width': 'width'
            },
            animation: {
                'spin-stop': 'spin 1s ease-in-out 1',
                blurred: 'blurred 7s infinite',
            },
            scale: {
               '10': '.10',
               '25': '.25',
            },
            zIndex: {
                '60': 60,
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
            textColor: {
                skin: {
                    base: withOpacity('---color-text-base'),
                    quiet: withOpacity('---color-text-quiet'),
                    muted: withOpacity('---color-text-muted'),
                    loud: withOpacity('---color-text-loud'),
                    extreme: withOpacity('---color-text-extreme'),
                    'loud-inverted': withOpacity('---color-text-loud-inverted'),
                    'base-inverted': withOpacity('---color-text-base-inverted'),
                },
            },
            borderColor: {
                skin: {
                    base: withOpacity('---color-text-base'),
                    hover: withOpacity('---color-text-muted'),
                },
            },
            backgroundColor: {
                skin: {
                    'fill-core': withOpacity('---color-fill-core'),
                    'fill-mantle': withOpacity('---color-fill-mantle'),
                    'fill-crust': withOpacity('---color-fill-crust'),
                    'fill-extreme': withOpacity('---color-fill-extreme'),
                },
            },
            gradientColorStops: {
                skin: {
                    'stop-core': withOpacity('---color-fill-core'),
                    'stop-crust': withOpacity('---color-fill-crust'),
                    'stop-mantle': withOpacity('---color-fill-mantle'),
                    'stop-extreme': withOpacity('---color-fill-extreme'),
                },
            },
            boxShadow: {
                'red': '0 0 25px 10px rgba(239,68,68,0.3)',
                'attention': '0 0 12px 5px var(---border-fill-attention)',
                'extreme': '-1px 3px 6px 3px var(---border-fill-extreme)',
                'small-white': '0 0 6px 3px rgba(255,255,255,0.3)',
                'small-dark': '0 0 6px 3px rgba(0,0,0,0.3)',
            },
        },
    },

    variants: {
        extend: {

        },
    },

    plugins: [
        require('./resources/js/tailwindForms.js'),
        require('@tailwindcss/line-clamp'),
        require('@tailwindcss/aspect-ratio'),
    ],
};
