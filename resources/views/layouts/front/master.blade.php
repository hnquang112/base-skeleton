<!DOCTYPE html>
<!--[if lt IE 7]> <html dir="ltr" lang="en-US" class="ie6"> <![endif]-->
<!--[if IE 7]>    <html dir="ltr" lang="en-US" class="ie7"> <![endif]-->
<!--[if IE 8]>    <html dir="ltr" lang="en-US" class="ie8"> <![endif]-->
<!--[if gt IE 8]><!-->
<html dir="ltr" lang="en-US">
<!--<![endif]-->

<!-- BEGIN head -->
<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge;chrome=1">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">

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

    <!-- RSS Feeds & Pingbacks -->
    <link href="http://themes.quitenicestuff.com/organicshopwp/feed/" rel="alternate" type="application/rss+xml"
          title="Organic Shop RSS Feed">
    <link href="http://themes.quitenicestuff.com/organicshopwp/xmlrpc.php" rel="pingback">
    <link href="http://themes.quitenicestuff.com/organicshopwp/feed/" rel="alternate" type="application/rss+xml"
          title="Organic Shop » Feed">
    <link href="http://themes.quitenicestuff.com/organicshopwp/comments/feed/" rel="alternate" type="application/rss+xml"
          title="Organic Shop » Comments Feed">
    <link href="http://themes.quitenicestuff.com/organicshopwp/home/feed/" rel="alternate"  type="application/rss+xml"
          title="Organic Shop » Home Comments Feed">
    <link href="http://themes.quitenicestuff.com/organicshopwp/xmlrpc.php?rsd" rel="EditURI" type="application/rsd+xml"
          title="RSD" >
    <link href="http://themes.quitenicestuff.com/organicshopwp/wp-includes/wlwmanifest.xml" rel="wlwmanifest"
          type="application/wlwmanifest+xml">
    <link href="http://themes.quitenicestuff.com/organicshopwp/checkout/order-received/" rel="prev"
          title="Order Received">
    <link href="http://themes.quitenicestuff.com/organicshopwp/blog/" rel="next" title="Blog">
    <link href="http://themes.quitenicestuff.com/organicshopwp/" rel="canonical">
</head><!-- END head -->

<!-- BEGIN body -->
<body class="home page page-id-14 page-template page-template-template-homepage-php theme-organicshop">

    <!-- BEGIN .wrapper -->
    <div class="wrapper">
        @include ('layouts.front._header')

        @include ('layouts.front._slider')

        @yield ('content')

        @include ('layouts.front._footer')
    </div><!-- END .wrapper -->

    <script>
        var slideshow_autoplay = true;var slideshow_speed = 7000;
    </script>
    <script src="{{ asset('js/vendor.front.js') }}"></script>
</body><!-- END body -->
</html>