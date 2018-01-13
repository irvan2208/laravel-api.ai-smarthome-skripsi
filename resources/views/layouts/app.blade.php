<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Smart Home Dashboard</title>
    <link rel="icon" href="{{url('/')}}/favicon.ico?v=2" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="{{url('/')}}/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('/')}}/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/bootstrap/dist/css/bootstrap.css">
    <!-- Web fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,600,700&Open+Sans:300,400,600,700">
    <!-- Custom CSS -->
    <link href="{{url('/')}}/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/')}}/css/animate.min.css">
    <link rel="stylesheet" href="{{url('/')}}/css/ares.css">
    @stack('pushStyle')
</head>
<body>

    <div id="page-container" class="modern-sf">
            <!-- Header -->
            <header id="page-header">
                <div class="h3 text-right pull-right hidden-xs">
                    <div class="text-crystal font-w300">USER_LOGGED_IN</div>
                    <!-- <div class="text-success animated infinite pulse pull-right">[LIVE]</div> -->
                </div>
                <h1 class="h3 font-w200">
                    <span class="text-crystal">//</span> <a class="link-sf font-w300" href="{{url('/')}}">SMART_HOME | Irvan Santoso (1431059)</a>
                </h1>
            </header>
            <!-- END Header -->

            <!-- Main Content -->
            @yield('content')
            <!-- END Main Content -->
        </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
<!-- jQuery -->
    <script src="{{url('/')}}/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
    <script src="{{url('/')}}/bootstrap/dist/js/tether.min.js"></script>
    <script src="{{url('/')}}/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="{{url('/')}}/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <script src="{{url('/')}}/js/plugins/jquery.appear.min.js"></script>
    <script src="{{url('/')}}/js/plugins/jquery.countTo.min.js"></script>
    <script src="{{url('/')}}/js/plugins/jquery.easypiechart.min.js"></script>
    <script src="{{url('/')}}/js/ares.js"></script>
    <script src="{{url('/')}}/js/jquery.animateNumber.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/js/svg-classes.js"></script>
    @stack('pushScript')
</html>
