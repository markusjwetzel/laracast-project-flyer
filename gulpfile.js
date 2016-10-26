const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.sass('app.scss')
    .scripts([
    	'libs/lity.js',
    	'libs/sweetalert-dev.js'
    ], './public/js/libs.js')
    .styles([
    	'libs/lity.css',
    	'libs/sweetalert.css'
    ], './public/css/libs.css')
    .webpack('app.js');
});
