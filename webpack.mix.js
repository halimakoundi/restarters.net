let mix = require('laravel-mix');

let webpack = require('webpack');

mix.webpackConfig({
    plugins: [
        new webpack.IgnorePlugin(/^codemirror$/)
    ]
});

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

mix.scripts([
    'node_modules/js-cookie/src/js.cookie.js',
    'resources/assets/js/gdpr-cookie-notice/templates.js',
    'resources/assets/js/gdpr-cookie-notice/script.js',
    'resources/assets/js/gdpr-cookie-notice/en.js'
], 'public/js/gdpr-cookie-notice.js');

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .browserSync({
       proxy: 'fixo.meter:8888'
    });
