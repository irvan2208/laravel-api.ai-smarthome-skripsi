<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="{{url('/')}}/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('/')}}/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://twitter.github.com/bootstrap/assets/css/bootstrap.css">
    <!-- Custom CSS -->
    <link href="{{url('/')}}/css/style.min.css" rel="stylesheet">
    @stack('pushStyle')
</head>
<body>
    <div class="container-fluid nopadding" id="map">
        <div class="container">
            <div class="col-md-12 text-center">
                <img style="width: 30%;padding: 12px;" id="lqt-logo" src="{{ URL('/').'/img/logo.png' }}">
            </div>
        </div>
        @yield('content')
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
    @stack('pushScript')
</html>
