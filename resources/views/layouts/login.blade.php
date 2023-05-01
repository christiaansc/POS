<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WafflesBike | Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

{!! Html::style('vendor/fontawesome-free/css/all.min.css') !!}

{!! Html::style('vendor/overlayScrollbars/css/OverlayScrollbars.min.css') !!}

{!! Html::style('vendor/adminlte/dist/css/adminlte.min.css') !!}
</head>
<body class="hold-transition login-page">

@yield('content')
<!-- /.login-box -->

<!-- jQuery -->
<!-- jQuery -->
<!-- <script src="../../plugins/jquery/jquery.min.js"></script> -->
{!! Html::script('/vendor/jquery/jquery.min.js') !!}
<!-- Bootstrap 4 -->
<!-- <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
{!! Html::script('/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}
<!-- overlayScrollbars -->

<!-- AdminLTE App -->
<!-- <script src="../../dist/js/adminlte.min.js"></script> -->
{!! Html::script('/vendor/adminlte/dist/js/adminlte.min.js') !!}
<!-- AdminLTE for demo purposes -->
{!! Html::script('/vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js') !!}
</body>
</html>