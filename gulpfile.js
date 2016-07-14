var elixir = require('laravel-elixir');

var assetPath = 'resources/assets/';
var publicPath = 'public/';

// Add path of file for js concatenating task
var scriptsPath = [
    '../../../bower_components/jquery/dist/jquery.min.js',
    '../../../bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js',
    '../../../bower_components/AdminLTE/plugins/fastclick/fastclick.min.js',
    '../../../bower_components/AdminLTE/dist/js/app.min.js',
    '../../../bower_components/AdminLTE/plugins/sparkline/jquery.sparkline.min.js',
    '../../../bower_components/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
    '../../../bower_components/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
    '../../../bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js',
    '../../../bower_components/AdminLTE/plugins/chartjs/Chart.min.js',
    '../../../bower_components/AdminLTE/plugins/iCheck/icheck.min.js',
    '../../../bower_components/summernote/dist/summernote.min.js',
    '../../../bower_components/summernote/dist/lang/summernote-vi-VN.min.js',
    '../../../bower_components/toastr/toastr.min.js'
];

var stylesPath = [
    '../../../bower_components/AdminLTE/bootstrap/css/bootstrap.min.css',
    '../../../bower_components/fontawesome/css/font-awesome.min.css',
    '../../../bower_components/Ionicons/css/ionicons.min.css',
    '../../../bower_components/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
    '../../../bower_components/AdminLTE/dist/css/AdminLTE.min.css',
    '../../../bower_components/AdminLTE/dist/css/skins/_all-skins.min.css',
    '../../../bower_components/AdminLTE/plugins/iCheck/square/purple.css',
    '../../../bower_components/summernote/dist/summernote.css',
    '../../../bower_components/toastr/toastr.min.css'
];

// Add src and dest paths of file for copying task
var copyPaths = [{
    src: 'images',
    dest: 'img'
}, {
    src: 'fonts',
    dest: 'fonts'
}, {
    src: 'plugins/iCheck/**',
    dest: 'css'
}, {
    src: 'plugins/summernote/**',
    dest: 'css/font'
}];

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */
elixir(function (mix) {
    // mix.sass('app.scss');

    // make vendor.js
    mix.scripts(scriptsPath, publicPath + 'js/' + 'vendor.js');

    mix.scriptsIn(assetPath + 'javascripts');

    // make vendor.css
    mix.styles(stylesPath, publicPath + 'css/' + 'vendor.css');

    // copy images and fonts
    copyPaths.forEach(function (path) {
        mix.copy(assetPath + path.src, publicPath + path.dest)
    });
});