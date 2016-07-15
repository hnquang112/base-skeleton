var elixir = require('laravel-elixir');

var assetPath = 'resources/assets/';
var publicPath = 'public/';

// Add path of file for js concatenating task
var cmsScriptPaths = [
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

var scriptPaths = [
    '../../../resources/assets/plugins/organic.shop.theme/js/jquery-1.7.2.min.js',
    '../../../resources/assets/plugins/organic.shop.theme/js/jquery-ui.js',
    '../../../resources/assets/plugins/organic.shop.theme/js/hoverIntent.js',
    '../../../resources/assets/plugins/organic.shop.theme/js/superfish.js',
    '../../../resources/assets/plugins/organic.shop.theme/js/flexslider-2.1.min.js',
    '../../../resources/assets/plugins/organic.shop.theme/js/prettyPhoto-3.1.4.min.js',
    '../../../resources/assets/plugins/organic.shop.theme/js/jquery.numeric.js',
    '../../../resources/assets/plugins/organic.shop.theme/js/scripts.js',
    '../../../resources/assets/plugins/organic.shop.theme/js/blockUI-2.39.min.js'
];

var cmsStylePaths = [
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

var stylePaths = [
    '../../../resources/assets/plugins/organic.shop.theme/css/theme.css',
    '../../../resources/assets/plugins/organic.shop.theme/css/theme.green.css',
    '../../../resources/assets/plugins/organic.shop.theme/css/responsive.css',
    '../../../resources/assets/plugins/organic.shop.theme/css/font-face.css',
    '../../../resources/assets/plugins/organic.shop.theme/css/woocommerce.css',
    '../../../resources/assets/plugins/organic.shop.theme/css/superfish.css',
    '../../../resources/assets/plugins/organic.shop.theme/css/prettyPhoto.css',
    '../../../resources/assets/plugins/organic.shop.theme/css/flexslider.css'
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
}, {
    src: 'plugins/flexslider',
    dest: 'css/fonts'
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
    mix.scripts(cmsScriptPaths, publicPath + 'js/' + 'vendor.js');
    mix.scripts(scriptPaths, publicPath + 'js/' + 'vendor.front.js');

    mix.scriptsIn(assetPath + 'javascripts');

    // make vendor.css
    mix.styles(cmsStylePaths, publicPath + 'css/' + 'vendor.css');
    mix.styles(stylePaths, publicPath + 'css/' + 'vendor.front.css');

    // copy images and fonts
    copyPaths.forEach(function (path) {
        mix.copy(assetPath + path.src, publicPath + path.dest)
    });
});