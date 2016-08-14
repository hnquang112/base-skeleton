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
    <link rel="stylesheet" href="{{ elixir('css/vendor.front.css') }}" type="text/css">
    <style type="text/css">
        h1, h2, h3, h4, h5, h6, #ui-datepicker-div .ui-datepicker-title, .dropcap, .ui-tabs .ui-tabs-nav li,
        #title-wrapper h1, #main-menu li, #main-menu li span, .caption, .accommodation_img_price {
            font-family: 'Cardo', serif;
        }

        #site-title {
            width: 220px;
        }
    </style>

    @stack ('styles')

    <!-- Meta tags -->
    {{-- See https://github.com/joshbuchea/HEAD for further neccesary tags --}}
    @stack ('meta')
</head><!-- END head -->

<!-- BEGIN body -->
<body class="home page page-id-14 page-template page-template-template-homepage-php theme-organicshop">
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.7&appId={{ config('services.facebook.app-id') }}";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    <!-- BEGIN .wrapper -->
    <div class="wrapper">
        @include ('layouts.front._header')

        @yield ('content')

        @include ('layouts.front._footer')
    </div><!-- END .wrapper -->

    <script>
        var slideshow_autoplay = true;var slideshow_speed = 7000;
    </script>
    <script src="{{ elixir('js/vendor.front.js') }}"></script>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/{{ config('services.tawk-to.api-key') }}/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script><!--End of Tawk.to Script-->

    <script src="https://google.com/recaptcha/api.js?hl=en"></script>

    @stack ('scripts')
</body><!-- END body -->
</html>