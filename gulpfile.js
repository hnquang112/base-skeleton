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
    // '../../../bower_components/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
    // '../../../bower_components/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
    '../../../bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js',
    // '../../../bower_components/AdminLTE/plugins/chartjs/Chart.min.js',
    // '../../../bower_components/AdminLTE/plugins/iCheck/icheck.min.js',
    '../../../bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js',
    '../../../bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js',
    '../../../bower_components/AdminLTE/plugins/select2/select2.full.min.js',
    '../../../bower_components/summernote/dist/summernote.min.js',
    '../../../bower_components/summernote/dist/lang/summernote-vi-VN.min.js',
    // '../../../bower_components/toastr/toastr.min.js',
    '../../../bower_components/blueimp-file-upload/js/vendor/jquery.ui.widget.js',
    '../../../bower_components/blueimp-file-upload/js/jquery.iframe-transport.js',
    '../../../bower_components/blueimp-file-upload/js/jquery.fileupload.js'
];

var cmsStylePaths = [
    '../../../bower_components/AdminLTE/bootstrap/css/bootstrap.min.css',
    '../../../bower_components/fontawesome/css/font-awesome.min.css',
    '../../../bower_components/Ionicons/css/ionicons.min.css',
    // '../../../bower_components/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
    '../../../bower_components/AdminLTE/dist/css/AdminLTE.min.css',
    '../../../bower_components/AdminLTE/dist/css/skins/_all-skins.min.css',
    // '../../../bower_components/AdminLTE/plugins/iCheck/square/purple.css',
    '../../../bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css',
    '../../../bower_components/AdminLTE/plugins/select2/select2.min.css',
    '../../../bower_components/summernote/dist/summernote.css',
    // '../../../bower_components/toastr/toastr.min.css',
    '../../../bower_components/flag-icon-css/css/flag-icon.min.css'
];

var scriptPaths = [
    '../../../resources/assets/plugins/organic.shop.theme/js/jquery-1.7.2.min.js',
    '../../../resources/assets/plugins/organic.shop.theme/js/jquery-ui-1.8.24.min.js',
    '../../../resources/assets/plugins/organic.shop.theme/js/hoverIntent.js',
    '../../../resources/assets/plugins/organic.shop.theme/js/superfish.js',
    '../../../resources/assets/plugins/organic.shop.theme/js/flexslider-2.1.min.js',
    '../../../resources/assets/plugins/organic.shop.theme/js/prettyPhoto-3.1.4.min.js',
    '../../../resources/assets/plugins/organic.shop.theme/js/jquery.numeric-1.3.js',
    '../../../resources/assets/plugins/organic.shop.theme/js/blockUI-2.39.min.js',
    '../../../resources/assets/plugins/organic.shop.theme/js/fancybox-1.3.4.min.js',
    '../../../resources/assets/plugins/organic.shop.theme/js/scripts.js'
];

var stylePaths = [
    '../../../resources/assets/plugins/organic.shop.theme/css/theme.css',
    '../../../resources/assets/plugins/organic.shop.theme/css/theme.green.css',
    '../../../resources/assets/plugins/organic.shop.theme/css/responsive.css',
    '../../../resources/assets/plugins/organic.shop.theme/css/font-face.css',
    '../../../resources/assets/plugins/organic.shop.theme/css/woocommerce.css',
    '../../../resources/assets/plugins/organic.shop.theme/css/superfish.css',
    '../../../resources/assets/plugins/organic.shop.theme/css/prettyPhoto.css',
    '../../../resources/assets/plugins/organic.shop.theme/css/flexslider.css',
    '../../../resources/assets/plugins/organic.shop.theme/css/fancybox-1.3.4.min.css'
];

// Add src and dest paths of file for copying task
var copyPaths = [{
    src: 'javascripts',
    dest: 'js'
}, {
    src: 'images',
    dest: 'img'
}, {
    src: 'plugins/flexslider/**',
    dest: 'css/fonts'
}];

var copyBuildPaths = [{
    src: 'plugins/flag-icon-css/**',
    dest: 'flags'
}, {
    src: 'icons',
    dest: 'img'
}, {
    src: 'fonts',
    dest: 'fonts'
}, {
    src: 'plugins/summernote/**',
    dest: 'css/font'
}];

var versioningPaths = [
    'css/vendor.css',
    'css/vendor.front.css',
    'js/vendor.js',
    'js/vendor.front.js',
    'js/common.js'
];

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

    // make vendor.css
    mix.styles(cmsStylePaths, publicPath + 'css/' + 'vendor.css');
    mix.styles(stylePaths, publicPath + 'css/' + 'vendor.front.css');

    // copy images and fonts
    copyPaths.forEach(function (path) {
        mix.copy(assetPath + path.src, publicPath + path.dest)
    });

    copyBuildPaths.forEach(function (path) {
        mix.copy(assetPath + path.src, publicPath + 'build/' + path.dest)
    });

    mix.version(versioningPaths);
});