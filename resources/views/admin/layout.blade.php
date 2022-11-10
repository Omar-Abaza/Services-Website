<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- theme meta -->
    <meta name="theme-name" content="focus" />
    <title>Dashboard</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="{{asset("admin/css")}}/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="{{asset("admin/css")}}/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="{{asset("admin/css")}}/lib/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset("admin/css")}}/lib/themify-icons.css" rel="stylesheet">
    <link href="{{asset("admin/css")}}/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="{{asset("admin/css")}}/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="{{asset("admin/css")}}/lib/weather-icons.css" rel="stylesheet" />
    <link href="{{asset("admin/css")}}/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="{{asset("admin/css")}}/lib/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset("admin/css")}}/lib/helper.css" rel="stylesheet">
    <link href="{{asset("admin/css")}}/style.css" rel="stylesheet">
    @yield('styles')
</head>

<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <div class="logo"><a href="{{route("admin.homepage")}}">
                        <!-- <img src="{{ asset('admin/images') }}/logo.png" alt="" /> --><span>Focus</span>
                    </a></div>
                <li class="label">Main</li>
                <li><a class="sidebar-sub-toggle"><i class="ti-home"></i> DASHBOARD <span
                            class="badge badge-primary"></span> <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{route("front.homepage")}}">WEB SITE</a></li>
                        <li><a href="{{route("admin.homepage")}}">DASHBOARD </a></li>
                    </ul>
                </li>
                <li><a class="sidebar-sub-toggle"><i class="ti-home"></i> MAIN ITEMS <span
                    class="badge badge-primary"></span> <span
                    class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{route("admin.all-projects")}}">Projects </a></li>
                        <li><a href="{{route("admin.all-services")}}">Services </a></li>
                        <li><a href="{{route("admin.all-events")}}">Events </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /# sidebar -->

<div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="float-left">
                    <div class="hamburger sidebar-toggle">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </div>
                <div class="float-right">
                    <a class="btn btn-primary" href="{{ route("front.homepage")}}">logout</a>
                </div>
            </div>
        </div>
    </div>
</div>

@yield('main')

  <!-- jquery vendor -->
  <script src="{{asset("admin/js")}}/lib/jquery.min.js"></script>
  <script src="{{asset("admin/js")}}/lib/jquery.nanoscroller.min.js"></script>
  <!-- nano scroller -->
  <script src="{{asset("admin/js")}}/lib/menubar/sidebar.js"></script>
  <script src="{{asset("admin/js")}}/lib/preloader/pace.min.js"></script>
  <!-- sidebar -->

  <script src="{{asset("admin/js")}}/lib/bootstrap.min.js"></script>
  <script src="{{asset("admin/js")}}/scripts.js"></script>
  <!-- bootstrap -->

  <script src="{{asset("admin/js")}}/lib/calendar-2/moment.latest.min.js"></script>
  <script src="{{asset("admin/js")}}/lib/calendar-2/pignose.calendar.min.js"></script>
  <script src="{{asset("admin/js")}}/lib/calendar-2/pignose.init.js"></script>


  <script src="{{asset("admin/js")}}/lib/weather/jquery.simpleWeather.min.js"></script>
  <script src="{{asset("admin/js")}}/lib/weather/weather-init.js"></script>
  <script src="{{asset("admin/js")}}/lib/circle-progress/circle-progress.min.js"></script>
  <script src="{{asset("admin/js")}}/lib/circle-progress/circle-progress-init.js"></script>
  <script src="{{asset("admin/js")}}/lib/chartist/chartist.min.js"></script>
  <script src="{{asset("admin/js")}}/lib/sparklinechart/jquery.sparkline.min.js"></script>
  <script src="{{asset("admin/js")}}/lib/sparklinechart/sparkline.init.js"></script>
  <script src="{{asset("admin/js")}}/lib/owl-carousel/owl.carousel.min.js"></script>
  <script src="{{asset("admin/js")}}/lib/owl-carousel/owl.carousel-init.js"></script>
  <!-- scripit init-->
  <script src="{{asset("admin/js")}}/dashboard2.js"></script>
  @yield('scripts')

</body>

</html>
