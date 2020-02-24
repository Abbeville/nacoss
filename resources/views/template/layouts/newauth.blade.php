<!DOCTYPE html>
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Abbeville Technology">
  <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <title>{{ config('app.name', 'Laravel') }}</title>

  <link rel="canonical" href="https://www.creative-tim.com/product/argon-dashboard-pro" />

  <meta itemprop="name" content="Nacoss Portal TPI">
  <meta itemprop="image" content="">


  <!-- Favicon -->
  <link rel="icon" href="{{ asset('/') }}assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/%40fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('/') }}assets/css/argon.min9f1e.css?v=1.1.0" type="text/css">

</head>

<body class="bg-default">
 
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-5 py-lg-5 pt-lg-5">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              {{-- Logo coming here --}}
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    @yield('content')
  </div>
  
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ asset('/') }}assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="{{ asset('/') }}assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('/') }}assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="{{ asset('/') }}assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="{{ asset('/') }}assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="{{ asset('/') }}assets/js/argon.min9f1e.js?v=1.1.0"></script>

</body>

</html>