
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
  
  @include('layouts.auth.header')

</head>
<body class="hold-transition @yield('type')">

  @yield('content')

  @include('layouts.auth.footer')

</body>
</html>
