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
    '../../../bower_components/jquery/dist/jquery.min.js',
    '../../../bower_components/jquery-ui/jquery-ui.min.js',
    '../../../bower_components/superfish/dist/js/hoverIntent.js',
    '../../../bower_components/superfish/dist/js/superfish.min.js',
    '../../../bower_components/prettyphoto/js/jquery.prettyPhoto.js',
    '../../../bower_components/prettyphoto/js/jquery.prettyPhoto.js',
    '../../../bower_components/blockUI/jquery.blockUI.js',
    '../../../resources/assets/plugins/jquery.numeric/jquery.numeric.min.js'
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
    '../../../resources/assets/plugins/organic.shop.theme/theme.css',
    '../../../resources/assets/plugins/organic.shop.theme/theme.green.css',
    '../../../resources/assets/plugins/organic.shop.theme/responsive.css',
    '../../../resources/assets/plugins/organic.shop.theme/font-face.css',
    '../../../resources/assets/plugins/organic.shop.theme/woocommerce.css',
    '../../../bower_components/superfish/dist/css/superfish.css',
    '../../../bower_components/prettyphoto/css/prettyPhoto.css',
    '../../../bower_components/flexslider/flexslider.css'
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