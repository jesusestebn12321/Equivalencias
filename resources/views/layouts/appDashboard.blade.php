<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title> Rebel @yield('title')</title>
  <link href="{{asset('template/assets/img/brand/favicon.png')}}" rel="icon" type="image/png">
  <!-- Icons -->
  <link href="{{asset('template/assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
  <link href="{{asset('template/assets/vendor/fonts/css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- Argon CSS -->
  <link  type="text/css" href="{{asset('template/assets/css/argon.css')}}" rel="stylesheet">
  <link  type="text/css" href="{{asset('plugins/css/main.css')}}" rel="stylesheet">
</head>

  @if(Auth::user()->hasRole(1) && !isset($matter_user))
  <body class="modal-open" style="padding-right: 25.9922px;">
  @else
  <body>
  @endif

    <!-- Sidenav -->
    @include('layouts.sidebar.sidebarDashboard')
    <!-- Main content -->
    <div class="main-content">
      <!-- Top navbar -->
      @include('layouts.nav.navDashboard')

      @yield('header')

      <!-- Page content -->
      <div class="container-fluid mt--7">
        @yield('content')
        <!-- Footer -->
        @include('layouts.footer.footerDashboard')
      </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{asset('template/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('template/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Optional JS -->

    <script src="{{asset('template/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('template/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
    <!-- Argon JS -->
    <script src="{{asset('template/assets/vendor/clipboard/dist/clipboard.min.js')}}"></script>
    <script src="{{asset('template/assets/js/argon.js')}}"></script>
    <script>
      var APP_URL={!!json_encode(url('/'))!!};
    </script>
    <script src="{{asset('plugins/js/main.js')}}"></script>
    <script>
      var APP_URL={!!json_encode(url('/'))!!};
    </script>
    @yield('js')
  </body>

  </html>