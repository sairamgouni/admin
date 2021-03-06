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

mix.react('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');


 /*
mix.react('resources/assets/js/webfontloader.min.js', 'public/js/webfontloader.min.js');
mix.react([
	'resources/assets/js/jquery-3.2.1.js',
	'resources/assets/js/jquery.appear.js',
	'resources/assets/js/jquery.mousewheel.js',
	'resources/assets/js/perfect-scrollbar.js',
	'resources/assets/js/jquery.matchHeight.js',
	'resources/assets/js/svgxuse.js',
	'resources/assets/js/imagesloaded.pkgd.js',
	'resources/assets/js/Headroom.js',
	// 'resources/assets/js/velocity.js',
	// 'resources/assets/js/ScrollMagic.js',
	// 'resources/assets/js/jquery.waypoints.js',
	// 'resources/assets/js/jquery.countTo.js',
	'resources/assets/js/popper.min.js',
	'resources/assets/js/material.min.js',
	'resources/assets/js/bootstrap-select.js',
	'resources/assets/js/smooth-scroll.js',
	'resources/assets/js/selectize.js',
	'resources/assets/js/swiper.jquery.js',
	'resources/assets/js/moment.js',
	// 'resources/assets/js/daterangepicker.js',
	'resources/assets/js/simplecalendar.js',
	// 'resources/assets/js/fullcalendar.js',
	'resources/assets/js/isotope.pkgd.js',
	'resources/assets/js/ajax-pagination.js',
	'resources/assets/js/Chart.js',
	'resources/assets/js/circle-progress.js',
	'resources/assets/js/loader.js',
	'resources/assets/js/run-chart.js',
	'resources/assets/js/jquery.magnific-popup.js',
	'resources/assets/js/jquery.gifplayer.js',
	// 'resources/assets/js/mediaelement-and-player.js',
	// 'resources/assets/js/mediaelement-playlist-plugin.min.js',
	'resources/assets/js/ion.rangeSlider.js',
	'resources/assets/js/base-init.js',
	
	'resources/assets/fonts/fontawesome-all.js',
	'resources/assets/Bootstrap/dist/js/bootstrap.bundle.js',


	'resources/js/app.js'
	], 'public/js/app.js');

mix.styles([
			'resources/assets/Bootstrap/dist/css/bootstrap-reboot.css',
			'resources/assets/Bootstrap/dist/css/bootstrap.css',
			'resources/assets/Bootstrap/dist/css/bootstrap-grid.css',
			'resources/assets/css/main.css',
			'resources/assets/css/fonts.min.css',

			],'public/css/styles.css');
   // .css('resources/sass/app.scss', 'public/css');

 */