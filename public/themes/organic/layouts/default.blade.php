<!DOCTYPE html>
<!--[if lt IE 7]> <html dir="ltr" lang="en-US" class="ie6"> <![endif]-->
<!--[if IE 7]>    <html dir="ltr" lang="en-US" class="ie7"> <![endif]-->
<!--[if IE 8]>    <html dir="ltr" lang="en-US" class="ie8"> <![endif]-->
<!--[if gt IE 8]><!-->
<html dir="ltr" lang="{{ get_front_lang_attribute() }}">
<!--<![endif]-->

<!-- BEGIN head -->
<head>
    <!-- Essential Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <!-- Title -->
    <title>{!! Theme::hasTitle() ? Theme::getTitle() : '' !!}</title>

    <!-- Stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond" rel="stylesheet">

    <style type="text/css">
        h1, h2, h3, h4, h5, h6, #ui-datepicker-div .ui-datepicker-title, .dropcap, .ui-tabs .ui-tabs-nav li,
        #title-wrapper h1, #main-menu li, #main-menu li span, .caption, .accommodation_img_price {
            font-family: 'EB Garamond', serif;
        }

        #site-title {
            width: 220px;
        }
    </style>

    {!! Theme::asset()->styles() !!}

    <!-- Meta tags -->
    {{-- See https://github.com/joshbuchea/HEAD for further neccesary tags --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="fb:app_id" content="{{ config('services.facebook.app-id') }}"/>
    <meta name="theme-color" content="#80b600">
    <meta name="google" value="notranslate">

    {{--@stack ('meta')--}}

    {!! Theme::partial('analytic') !!}

    <!-- Rollbar tracking code -->
    {!! Theme::partial('errors_tracker') !!}
</head><!-- END head -->

<!-- BEGIN body -->
<body class="home page page-id-14 page-template page-template-template-homepage-php theme-organicshop">
{!! Theme::partial('facebook_sdk') !!}

<!-- BEGIN .wrapper -->
<div class="wrapper">
    {!! Theme::partial('header') !!}

    {!! Theme::partial('slider') !!}

    {!! Theme::content() !!}

    {!! Theme::partial('footer') !!}
</div><!-- END .wrapper -->

<script>
var slideshow_autoplay = true;var slideshow_speed = 7000;
</script>

{!! Theme::asset()->scripts() !!}

{!! Theme::partial('tawk_sdk') !!}

</body><!-- END body -->
</html>