const elixir = require('laravel-elixir');

require('laravel-elixir-vue');
// require('laravel-elixir-vueify');
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
    	.styles([//'./node_modules/datatables.net-dt/css/jquery.dataTables.css',
    		'./node_modules/datatables.net-bs/css/dataTables.bootstrap.css',
    		'./node_modules/datatables.net-buttons-bs/css/buttons.bootstrap.css',
        './node_modules/fonts/fonts.css',
        // './node_modules/fonts/Raleway_300_normal.woff',
        // './node_modules/fonts/Raleway_400_normal.woff',
        // './node_modules/fonts/Raleway_600_normal.woff',
        // './node_modules/fonts/Raleway_300_normal.ttf',
        // './node_modules/fonts/Raleway_400_normal.ttf',
        // './node_modules/fonts/Raleway_600_normal.ttf',
    		'./node_modules/sweetalert/dist/sweetalert.css',])
       	.webpack('app.js')
       	.scripts([
       		'./node_modules/sweetalert/dist/sweetalert.min.js',
       		'./node_modules/datatables.net/js/jquery.dataTables.js',
       		'./node_modules/datatables.net-bs/js/dataTables.bootstrap.js',
       		// './node_modules/datatables.net-buttons/js/dataTables.buttons.js',
       		'./node_modules/datatables.net-buttons-bs/js/buttons.bootstrap.js',
       		]);
});
