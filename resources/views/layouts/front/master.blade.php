<!DOCTYPE html>
<!--[if lt IE 7]> <html dir="ltr" lang="en-US" class="ie6"> <![endif]-->
<!--[if IE 7]>    <html dir="ltr" lang="en-US" class="ie7"> <![endif]-->
<!--[if IE 8]>    <html dir="ltr" lang="en-US" class="ie8"> <![endif]-->
<!--[if gt IE 8]><!-->
<html dir="ltr" lang="en-US">
<!--<![endif]-->

<!-- BEGIN head -->
<head>
    <!-- Essential Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <!-- Title -->
    <title>Organic Shop | A Responsive WordPress Theme for eCommerce Websites</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css\vendor.front.css') }}" type="text/css">
    <style type="text/css">
        h1, h2, h3, h4, h5, h6, #ui-datepicker-div .ui-datepicker-title, .dropcap, .ui-tabs .ui-tabs-nav li,
        #title-wrapper h1, #main-menu li, #main-menu li span, .caption, .accommodation_img_price {
            font-family: 'Cardo', serif;
        }

        #site-title {
            width: 220px;
        }
    </style>

    <!-- Meta tags -->
    {{-- See https://github.com/joshbuchea/HEAD for further neccesary tags --}}
</head><!-- END head -->

<!-- BEGIN body -->
<body class="home page page-id-14 page-template page-template-template-homepage-php theme-organicshop">

    <!-- BEGIN .wrapper -->
    <div class="wrapper">
        @include ('layouts.front._header')

        @yield ('content')

        @include ('layouts.front._footer')
    </div><!-- END .wrapper -->

    <script>
        var slideshow_autoplay = true;var slideshow_speed = 7000;
    </script>
    <script src="{{ asset('js/vendor.front.js') }}"></script>
</body><!-- END body -->
</html>