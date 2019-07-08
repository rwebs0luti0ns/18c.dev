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

mix
    .styles(
        [
            'node_modules/admin-lte/bower_components/bootstrap/dist/css/bootstrap.min.css',
            'node_modules/admin-lte/bower_components/font-awesome/css/font-awesome.min.css',
            'node_modules/admin-lte/bower_components/Ionicons/css/ionicons.min.css',
            'node_modules/admin-lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css',
            'node_modules/admin-lte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
            'node_modules/admin-lte/dist/css/skins/skin-green.min.css',
            'node_modules/admin-lte/dist/css/AdminLTE.min.css',
            'node_modules/select2/dist/css/select2.min.css',
            'node_modules/alertifyjs/build/css/alertify.min.css',
            'node_modules/alertifyjs/build/css/themes/default.min.css',
            'resources/css/style.css'
        ],
        'public/css/admin.min.css'
    )

    .scripts(
        [
            'node_modules/jquery/dist/jquery.min.js',
            'node_modules/admin-lte/bower_components/bootstrap/dist/js/bootstrap.min.js',
            'node_modules/admin-lte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
            'node_modules/admin-lte/bower_components/fastclick/lib/fastclick.js',
            'node_modules/admin-lte/bower_components/datatables.net/js/jquery.dataTables.min.js',
            'node_modules/admin-lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js',
            'node_modules/admin-lte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
            'node_modules/admin-lte/bower_components/moment/min/moment.min.js',
            'node_modules/admin-lte/dist/js/adminlte.min.js',
            'node_modules/select2/dist/js/select2.min.js',
            'node_modules/alertifyjs/build/alertify.min.js',
        ],
        'public/js/admin.min.js'
    )

    .copyDirectory('node_modules/admin-lte/bower_components/bootstrap/fonts', 'public/fonts')
    .copyDirectory('node_modules/admin-lte/bower_components/font-awesome/fonts', 'public/fonts')
    .copyDirectory('node_modules/admin-lte/bower_components/Ionicons/fonts', 'public/fonts'); 