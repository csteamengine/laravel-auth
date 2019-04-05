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

mix.setPublicPath('public');

mix.sass('resources/sass/frontend/app.scss', 'compiled/css/frontend.css')
    .sass('resources/sass/frontend/projects/projects.scss', 'compiled/css/projects/projects.css')
    .sass('resources/sass/frontend/projects/project.scss', 'compiled/css/projects/project.css')
    .sass('resources/sass/frontend/projects/project_tile.scss', 'compiled/css/projects/project_tile.css')
    .sass('resources/sass/backend/app.scss', 'compiled/css/backend.css')
    .sass('resources/sass/frontend/home.scss', 'compiled/css/home.css')
    .js('resources/js/frontend/app.js', 'compiled/js/frontend.js')
    .js('resources/js/frontend/projects.js', 'compiled/js/frontend/projects.js')
    .js('resources/js/frontend/project.js', 'compiled/js/frontend/project.js')
    .js('resources/js/backend/projects.js', 'compiled/js/backend/projects.js')
    .js('resources/js/backend/project.js', 'compiled/js/backend/project.js')
    .js([
        'resources/js/backend/before.js',
        'resources/js/backend/app.js',
        'resources/js/backend/after.js'
    ], 'compiled/js/backend.js')
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
