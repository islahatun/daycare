@include('partials.home.header')
@yield('style')
</head>

<body>

  <!-- ======= Header ======= -->
  @include('partials.home.navbar')
 <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  @yield('hero')
  <!-- End Hero -->

  @yield('container')
 <!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('partials.home.footer')
  @yield('script')
