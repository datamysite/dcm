<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <title>@yield('title') | {{env('APP_NAME')}}</title>
    @include('layout.style')
    @yield('addStyle')
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{URL::to('/public')}}/Icon-Black.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
    @include('layout.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    @include('layout.sidebar')

  <!-- Content Wrapper. Contains page content -->
    @yield('content')
  <!-- /.content-wrapper -->
  
    @include('layout.footer')
</div>
<!-- ./wrapper -->

    @include('layout.script')
    @yield('addScript')
</body>
</html>
