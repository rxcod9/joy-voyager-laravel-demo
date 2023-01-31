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

mix.options({ processCssUrls: false }).sass('resources/assets/sass/app.scss', 'public/assets/css')
.js('resources/assets/js/app.js', 'public/assets/js').vue({ version: 2 })
.copy('node_modules/tinymce/skins', 'public/assets/js/skins')
.copy('resources/assets/js/skins', 'public/assets/js/skins')
.copy('node_modules/tinymce/themes/silver', 'public/assets/js/themes/silver')
.copy('node_modules/tinymce/models/dom', 'public/assets/js/models/dom')
.copy('node_modules/tinymce/icons/default', 'public/assets/js/icons/default')
.copy('node_modules/ace-builds/src-noconflict', 'public/assets/js/ace/libs');
