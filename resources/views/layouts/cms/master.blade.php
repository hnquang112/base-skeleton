<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="{{ asset('css/vendor.css') }}">

@stack ('styles')

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
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
        @yield ('content')
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include ('layouts.cms._footer')

  </div>
  <!-- ./wrapper -->

  <!-- Vendor JS -->
  <script src="{{ asset('js/vendor.js') }}"></script>

  @stack ('scripts')
</body>
</html>
