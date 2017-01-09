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
    <meta name='author' content='hnquang112'/>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    {!! SEO::generate(true) !!}

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ elixir('css/vendor.css') }}">
    <style>
        textarea {
            resize: vertical;
        }
    </style>

    @stack ('styles')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @if (!app()->environment('local'))
        @include ('layouts._analytic')

        <!-- Rollbar tracking code -->
        @include ('layouts._errors_tracker')
    @endif
</head>

<body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">
        @include ('layouts.cms._header')

        <!-- Left side column. contains the logo and sidebar -->
        @include ('layouts.cms._sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                @include ('layouts.cms._breadcrump')
            </section>

            <!-- Main content -->
            <section class="content">
                @include ('flash::message')

                @yield ('content')
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

            @include ('layouts.cms._modals')
        @stack ('modals')

        @include ('layouts.cms._footer')
    </div><!-- ./wrapper -->

    <!-- Vendor JS -->
    <script src="{{ elixir('js/vendor.js') }}"></script>
    <script src="{{ elixir('js/common.js') }}"></script>

    @stack ('scripts')
</body>
</html>
