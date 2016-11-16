const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

var assetPath = 'resources/assets/';
var publicPath = 'public/';

// Add path of file for js concatenating task
var cmsScriptPaths = [
    '../../../node_modules/jquery/dist/jquery.min.js',
    '../../../node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js',
    '../../../node_modules/admin-lte/plugins/fastclick/fastclick.min.js',
    '../../../node_modules/admin-lte/dist/js/app.min.js',
    '../../../node_modules/admin-lte/plugins/sparkline/jquery.sparkline.min.js',
    // '../../../node_modules/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
    // '../../../node_modules/admin-lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
    '../../../node_modules/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js',
    '../../../node_modules/admin-lte/plugins/chartjs/Chart.min.js',
    // '../../../node_modules/admin-lte/plugins/iCheck/icheck.min.js',
    '../../../node_modules/admin-lte/plugins/datatables/jquery.dataTables.min.js',
    '../../../node_modules/admin-lte/plugins/datatables/dataTables.bootstrap.min.js',
    '../../../node_modules/admin-lte/plugins/select2/select2.full.min.js',
    '../../../node_modules/summernote/dist/summernote.min.js',
    '../../../node_modules/summernote/dist/lang/summernote-vi-VN.min.js',
    '../../../node_modules/toastr/build/toastr.min.js',
    '../../../node_modules/jquery-ui-dist/jquery-ui.min.js',
    // '../../../node_modules/blueimp-file-upload/js/vendor/jquery.ui.widget.js',
    // '../../../node_modules/blueimp-file-upload/js/jquery.iframe-transport.js',
    // '../../../node_modules/blueimp-file-upload/js/jquery.fileupload.js',
    '../plugins/elFinder/summernote-ext-elfinder.js',
    '../plugins/elFinder/elfinder.min.js',
];

var cmsStylePaths = [
    '../../../node_modules/admin-lte/bootstrap/css/bootstrap.min.css',
    '../../../node_modules/font-awesome/css/font-awesome.min.css',
    '../../../node_modules/ionicons/dist/css/ionicons.min.css',
    // '../../../node_modules/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
    '../../../node_modules/admin-lte/dist/css/AdminLTE.min.css',
    '../../../node_modules/admin-lte/dist/css/skins/_all-skins.min.css',
    // '../../../node_modules/admin-lte/plugins/iCheck/square/purple.css',
    '../../../node_modules/admin-lte/plugins/datatables/dataTables.bootstrap.css',
    '../../../node_modules/admin-lte/plugins/select2/select2.min.css',
    '../../../node_modules/summernote/dist/summernote.css',
    '../../../node_modules/toastr//build/toastr.min.css',
    '../../../node_modules/flag-icon-css/css/flag-icon.min.css',
    '../../../node_modules/jquery-ui-dist/jquery-ui.min.css',
    '../plugins/elFinder/elfinder.min.css',
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
    '../../../resources/assets/plugins/organic.shop.theme/js/scripts.js',
    '../../../resources/assets/plugins/organic.shop.theme/js/vanillatoasts.js'
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
    '../../../resources/assets/plugins/organic.shop.theme/css/fancybox-1.3.4.min.css',
    '../../../resources/assets/plugins/organic.shop.theme/css/social-buttons.min.css',
    '../../../resources/assets/plugins/organic.shop.theme/css/vanillatoasts.css'
];

// Add src and dest paths of file for copying task
var copyPaths = [{
    src: 'js',
    dest: 'js'
}, {
    src: 'plugins/organic.shop.theme/flexslider/**',
    dest: 'css/fonts'
}, {
    src: 'plugins/organic.shop.theme/images',
    dest: 'img'
}];

var copyBuildPaths = [{
    src: 'plugins/flag-icon-css/**',
    dest: 'flags'
}, {
    src: 'plugins/organic.shop.theme/icons',
    dest: 'img'
}, {
    src: 'fonts',
    dest: 'fonts'
}, {
    src: 'plugins/summernote/**',
    dest: 'css/font'
}, {
    src: 'plugins/elFinder/img',
    dest: 'img'
}, {
    src: 'plugins/jquery-ui',
    dest: 'css/images'
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
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

// elixir(mix => {
//     mix.sass('app.scss')
//        .webpack('app.js');
// });

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