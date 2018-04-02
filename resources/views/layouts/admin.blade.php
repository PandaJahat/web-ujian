
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

  @include('layouts.admin.header.links')

  @stack('links')

</head>
<body class="hold-transition skin-blue sidebar-mini fixed" onload="startTime()">
<!-- Site wrapper -->
<div class="wrapper">

  @include('layouts.admin.header.mainheader')

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  @include('layouts.admin.sidebar')

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('layouts.admin.header.pageheader')

    <!-- Main content -->
    <section class="content">

      @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('layouts.admin.footer.mainfooter')

  @include('layouts.admin.footer.controlsidebar')
</div>
<!-- ./wrapper -->

@include('layouts.admin.footer.scripts')

@stack('scripts')

</body>
</html>
