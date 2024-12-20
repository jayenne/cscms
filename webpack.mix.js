let mix = require("laravel-mix");

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

/* BACKEND */
mix.setPublicPath("../public_html/");
mix.webpackConfig({
	module: {
		noParse:
			/jquery-form-validator\/form-validator\/jquery.form-validator\.min\.js$/,
	},
});
mix.js(
	[
		"resources/assets/js/admin/app.js",
		"resources/assets/js/admin/fa-solid.min.js",
		"node_modules/jquery.scrollbar/jquery.scrollbar.min.js",
		"node_modules/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js",
		"node_modules/jquery.easing/jquery.easing.min.js",
		"resources/assets/js/admin/jquery-ui.min.js",
		"node_modules/summernote/dist/summernote-bs4.min.js",
		/*'node_modules/unveil2/src/jquery.unveil2.js',*/
		/*'bower_components/ioslist/src/jquery.ioslist.src.js',*/
		/*'node_modules/jquery.actual/jquery.actual.min.js',*/
		"node_modules/select2/dist/js/select2.full.min.js",
		"node_modules/hammerjs/hammer.min.js",
		"node_modules/jquery-mousewheel/jquery.mousewheel.js",
		/*'node_modules/rickshaw/rickshaw.min.js',*/
		"node_modules/metrojs/release/MetroJs.Full/MetroJs.min.js",
		/*'node_modules/sparkline/lib/sparkline.js',*/
		/*'node_modules/skycons/skycons.js',*/
		"node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js",
		"resources/assets/js/admin/admin.js",
		"resources/assets/js/admin/dashboard.js",
		"resources/assets/js/admin/bootstrap-tabcollapse.js",
		"resources/assets/js/admin/bootstrap-tagsinput.min.js",
		"resources/assets/js/admin/jquery.simple.timer.js",
		//'node_modules/jquery.dirty/dist/jquery.dirty.js',
		"node_modules/bootstrap-notify/bootstrap-notify.min.js",
		"node_modules/jquery-form-validator/form-validator/jquery.form-validator.min.js",
		"resources/assets/js/admin/scripts.js",
	],
	"../public_html/system/js"
);

mix.sass("resources/assets/sass/admin/admin.scss", "../public_html/system/css/")
	.combine(
		[
			//'node_modules/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.css',
			"node_modules/summernote/dist/summernote-bs4.css",
			// 'resources/assets/css/admin/pace-theme-flash.css',
			"node_modules/jquery.scrollbar/jquery.scrollbar.css",
			"node_modules/select2/dist/css/select2.css",
			/*'bower_components/ioslist/dist/css/jquery.ioslist.css',*/
			/*'node_modules/rickshaw/rickshaw.min.css',*/
			"node_modules/metrojs/release/MetroJs.Full/MetroJs.min.css",
			"node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css",
			"node_modules/jquery-form-validator/form-validator/theme-default.min.css",
			"resources/assets/css/admin/fa-svg-with-js.css",
			"resources/assets/css/admin/pages-icons.css",
			"resources/assets/css/admin/icons.css",
			"resources/assets/css/admin/style.css",
			"../public_html/system/css/admin.css",
		],
		"../public_html/system/css/admin.css"
	)
	.sourceMaps();

mix.copyDirectory(
	"node_modules/font-awesome/fonts/",
	"../public_html/system/css/font/"
);
mix.copyDirectory(
	"node_modules/summernote/dist/font/",
	"../public_html/system/css/font/"
);
mix.copyDirectory(
	"resources/assets/fonts/pages-icon/",
	"../public_html/system/css/font/"
);
mix.copyDirectory("resources/assets/img", "../public_html/system/img/");

mix.copy(
	[
		"node_modules/jquery/dist/jquery.min.js",
		"node_modules/dropzone/dist/min/dropzone.min.js",
		"node_modules/cropperjs/dist/cropper.min.js",
		"node_modules/jquery-cropper/dist/jquery-cropper.min.js",
		"resources/assets/js/admin/pace.min.js",
		"node_modules/moment/min/moment.min.js",
		//'node_modules/font-awesome/js/fontawesome.min.js',
		"node_modules/@fortawesome/fontawesome-free/js/fontawesome.min.js",
		"resources/assets/js/admin/nestable.js",
		"resources/assets/js/admin/datatable.js",
		"resources/assets/js/admin/update-page.js",
		"resources/assets/js/admin/is-updated.js",
	],
	"../public_html/system/js/"
);

mix.copy(
	[
		"node_modules/cropperjs/dist/cropper.min.css",
		"node_modules/dropzone/dist/min/dropzone.min.css",
		"resources/assets/css/admin/nestable.css",
	],
	"../public_html/system/css/"
);

/* FRONTEND */

mix.js(
	[
		"resources/assets/js/frontend/app.js",
		"resources/assets/js/frontend/frontend.js",
		"resources/assets/js/frontend/cookiealert-standalone.js",
	],
	"../public_html/js"
)
	.sass(
		"resources/assets/sass/frontend/styles.scss",
		"../public_html/css/bootstrap.css"
	)
	.combine(
		[
			"../public_html/css/bootstrap.css",
			"resources/assets/css/frontend/theme.css",
			"resources/assets/css/frontend/cookiealert.css",
			"resources/assets/css/frontend/flickity.css",
		],
		"../public_html/css/styles.css"
	);
