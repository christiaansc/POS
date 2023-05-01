<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="shortcut icon" type="image/png" href="{{ asset('../../img/favicon.png') }}">
  <link rel="shortcut icon" sizes="192x192" href="{{ asset('../../img/favicon.png') }}">
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css"> -->
  <!-- overlayScrollbars -->
  <!-- <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css"> -->
  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="../../dist/css/adminlte.min.css"> -->

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

  {!! Html::style('vendor/fontawesome-free/css/all.min.css') !!}
  
  {!! Html::style('vendor/overlayScrollbars/css/OverlayScrollbars.min.css') !!}

  {!! Html::style('vendor/adminlte/dist/css/adminlte.min.css') !!}

  {!! Html::style('vendor/select2/css/select2.min.css') !!}
  {!! Html::style('vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css') !!}

  @yield('css_page')


</head>
<body class="hold-transition  dark-mode sidebar-mini layout-fixed sidebar-collapse ">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
           <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @auth
                                  {{ Auth::user()->name }} 
                                @endauth                                   
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
            </ul>

	
</nav>

<!-- /.navbar -->

  <!-- Main Sidebar Container -->
    @include('layouts._nav')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper pt-4 pb-4">
    <!-- Content Header (Page header) -->
   
    @yield('breadcrumb')

    <!-- Main content -->
        @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 0.0.1
    </div>
    <strong>Copyright &copy; 2023 <a href="">scdev</a>.</strong> All rights reserved.
  </footer>

  <a id="back-to-top" href="#" class="btn btn-success back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
</div>
<!-- ./wrapper -->

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
{!! Html::script('/vendor/sweetalert/sweetalert.all.js') !!}

{!! Html::script('/vendor/select2/js/select2.full.min.js') !!}







<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="../../dist/js/demo.js"></script>
<script src="../../dist/chart.js/Chart.min.js"></script>

@include('sweetalert::alert')

@yield('script')
@yield('js_user_page')
@yield('js_role_page')







</body>
</html>
