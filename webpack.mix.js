const { vue } = require('laravel-mix');
let mix = require('laravel-mix');

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

mix.options({ processCssUrls: false }).sass('resources/sass/app.scss', 'public/css')
.js('resources/js/app.js', 'public/js').vue({ version: 3 })
.copy('node_modules/tinymce/skins', 'public/js/skins')
.copy('resources/js/skins', 'public/js/skins')
.copy('node_modules/tinymce/themes/silver', 'public/js/themes/silver')
.copy('node_modules/tinymce/models/dom', 'public/js/models/dom')
.copy('node_modules/tinymce/icons/default', 'public/js/icons/default')
.copy('node_modules/ace-builds/src-noconflict', 'public/js/ace/libs');
