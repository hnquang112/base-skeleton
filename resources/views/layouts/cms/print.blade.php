<!DOCTYPE html>
<html lang="{{ get_cms_lang_attribute() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name='format-detection' content='telephone=no'>
    <meta name='msapplication-tap-highlight' content='no'>
    <meta name='description' content=''/><!----**********ADD WEB DESCRIPTION---->
    <meta name='keywords' content=''/><!----**********ADD WEB KEYWORDS---->
    <meta name='author' content='hnquang112'/><!----**********ADD WEB AUTHOR---->

    @inject ('_request', 'Illuminate\Http\Request')
    <link rel="canonical" href="{{ $_request->url() }}">

    <title>BaseSkeleton | Dashboard</title>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ elixir('css/vendor.css') }}">

    @stack ('styles')

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @include ('layouts._analytic')
</head>
<body onload="window.print();">
    <div class="wrapper">
        @yield ('content')
    </div><!-- ./wrapper -->
</body>
</html>
