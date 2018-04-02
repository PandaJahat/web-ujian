
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

  @include('layouts.user.header.links')

  @stack('links')

</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav fixed" @auth onload="startTime()" @endauth >
<div class="wrapper">

  @include('layouts.user.exam.mainheader')
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      {{-- @include('layouts.user.header.pageheader') --}}

      <!-- Main content -->
      <section class="content">
        <div class="row">
             @yield('content')          
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  @include('layouts.user.footer.mainfooter')
</div>
<!-- ./wrapper -->

@include('layouts.user.footer.scripts')

@stack('scripts')

</body>
</html>
