const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.ts([
    'resources/js/app.ts', 
    'public/assets/js/functions.ts',
    'public/assets/js/app.ts',
], 'public/js')
.postCss('public/mdb/css/mdb.min.css', 'public/css', [])
.postCss('resources/css/app.css', 'public/css', [])
.postCss('public/assets/css/app.css', 'public/css', [])
.sourceMaps(false, 'source-map');

mix.ts(['public/pages/auth/mentor.ts'], 'public/js/auth/mentor.js')
.ts(['public/pages/auth/login.ts'], 'public/js/auth/login.js')
.ts(['public/pages/home.ts'], 'public/js/home.js')
.ts(['public/pages/minha-conta/index.ts'], 'public/js/minha-conta.js');