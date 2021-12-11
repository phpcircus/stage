const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js');

mix.postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss/nesting')(require('postcss-nesting')),
    require('tailwindcss')('./tailwind.config.js'),
]);

if (mix.inProduction()) {
    mix.version();
}
