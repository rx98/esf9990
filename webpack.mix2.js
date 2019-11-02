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

mix.combine([
    "dist/css/bootstrap-theme.css",
    "dist/css/rtl.css",
    "dist/css/persian-datepicker-0.4.5.min.css",
    "bower_components/font-awesome/css/font-awesome.min.css",
    "bower_components/Ionicons/css/ionicons.min.css",
    "bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css",
    "dist/css/AdminLTE.css",
    "dist/css/skins/_all-skins.min.css",
    "bower_components/morris.js/morris.css",
    "bower_components/jvectormap/jquery-jvectormap.css",
    "bower_components/bootstrap-daterangepicker/daterangepicker.css",
    "bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css",
    "bower_components/select2/dist/css/select2.min.css",
    "plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css",
    "plugins/iCheck/all.css",
    "plugins/timepicker/bootstrap-timepicker.min.css",
    "datapiker/css/bootstrap.min.css",
    "datapiker/css/bootstrap-theme.min.css",
    "datapiker/css/jquery.Bootstrap-PersianDateTimePicker.css",




],'css/admin.css');

mix.combine([

    "datapiker/js/jquery-3.1.0.min.js",
    "datapiker/js/bootstrap.min.js",
    "bower_components/jquery/dist/jquery.min.js",
    "bower_components/jquery-ui/jquery-ui.min.js",
    "bower_components/bootstrap/dist/js/bootstrap.min.js",
    "bower_components/select2/dist/js/select2.full.min.js",
    "bower_components/datatables.net/js/jquery.dataTables.min.js",
    "bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js",
    "bower_components/raphael/raphael.min.js",
    "bower_components/morris.js/morris.min.js",
    "bower_components/jquery-sparkline/dist/jquery.sparkline.min.js",
    "plugins/jvectormap/jquery-jvectormap-1.2.2.min.js",
    "plugins/jvectormap/jquery-jvectormap-world-mill-en.js",
    "plugins/input-mask/jquery.inputmask.js",
    "plugins/input-mask/jquery.inputmask.date.extensions.js",
    "plugins/input-mask/jquery.inputmask.extensions.js",
    "bower_components/jquery-knob/dist/jquery.knob.min.js",
    "bower_components/moment/min/moment.min.js",
    "bower_components/bootstrap-daterangepicker/daterangepicker.js",
    "bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js",
    "bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js",
    "plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js",
    "plugins/timepicker/bootstrap-timepicker.min.js",
    "plugins/iCheck/icheck.min.js",
    "bower_components/jquery-slimscroll/jquery.slimscroll.min.js",
    "bower_components/fastclick/lib/fastclick.js",
    "dist/js/adminlte.min.js",
    "dist/js/persian-date-0.1.8.min.js",
    "dist/js/persian-datepicker-0.4.5.min.js",
    "dist/js/pages/dashboard.js",
    "dist/js/demo.js",
    "datapiker/js/jalaali.js",
    "datapiker/js/jquery.Bootstrap-PersianDateTimePicker.js",


],'js/admin.js');
