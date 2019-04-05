const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.setPublicPath('src/public');

mix.sass('src/resources/sass/frontend/app.scss', 'css/frontend.css')
    .sass('src/resources/sass/backend/app.scss', 'css/backend.css')
    .sass('src/resources/sass/frontend/home.scss', 'css/home.css')
    .js('src/resources/js/frontend/app.js', 'js/frontend.js')
    .js([
        'src/resources/js/backend/before.js',
        'src/resources/js/backend/app.js',
        'src/resources/js/backend/after.js'
    ], 'js/backend.js')
    .extract([
        'jquery',
        'bootstrap',
        'popper.js/dist/umd/popper',
        'axios',
        'sweetalert2',
        'lodash',
        '@fortawesome/fontawesome-svg-core',
        '@fortawesome/free-brands-svg-icons',
        '@fortawesome/free-regular-svg-icons',
        '@fortawesome/free-solid-svg-icons'
    ]);

if (mix.inProduction() || process.env.npm_lifecycle_event !== 'hot') {
    mix.version();
}
