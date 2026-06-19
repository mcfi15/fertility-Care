<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->

    <meta charset="utf-8">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="shortcut icon" type="image/png" href="{{ asset($appSetting->favicon) }}" />

    <link rel="stylesheet" href="{{ asset('assets/app/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/app/css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/app/css/bootstrap.min.css') }}">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('assets/app/css/style.css') }}">

    <title>@yield('title') | {{ $appSetting->website_name }}</title>
  </head>
  <body>

  <div class="content">
    @yield('content')
  </div>

  
  <script src="{{ asset('assets/app/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('assets/app/js/popper.min.js') }}"></script>
  <script src="{{ asset('assets/app/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/app/js/main.js') }}"></script>
</body>
</html>