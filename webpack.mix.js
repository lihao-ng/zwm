require('dotenv').config();
const mix = require('laravel-mix');
require('laravel-mix-alias');
require('laravel-mix-merge-manifest');

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

mix.alias({
	'@vendor': '/resources/js/vendor/',
	'@admin': '/resources/js/admin/',
	'@client': '/resources/js/client/',
	'@root': '/resources/js/'
})


mix
	.js('resources/js/admin/app.js', 'public/js/admin.js')
	.js('resources/js/client/app.js', 'public/js/client.js')
	.sass('resources/sass/admin/app.scss', 'public/css/admin.css')
	.sass('resources/sass/client/app.scss', 'public/css/client.css');

if (mix.inProduction()) {
	mix.version();
}