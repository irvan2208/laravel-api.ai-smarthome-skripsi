<!DOCTYPE html>  
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
<title>Locato Admin Login</title>
<!-- Bootstrap Core CSS -->
<link href="{{url('/')}}/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- animation CSS -->
<link href="{{url('/')}}/css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{url('/')}}/css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="{{url('/')}}/css/colors/default.css" id="theme"  rel="stylesheet">
</head>
<body>
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register">
  <div class="login-box">
    <div class="white-box">

    {!! Form::open(['url' => route('login'),'class'=>'form-horizontal form-material','id'=>'loginform']) !!}
        <h3 class="box-title m-b-20">Sign In</h3>
        <div class="form-group ">
          <div class="col-xs-12">
            {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <div class="checkbox checkbox-primary pull-left p-t-0">
              <input id="checkbox-signup" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
              <label for="checkbox-signup"> Remember me </label>
            </div>
            <!-- <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> --> </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
          </div>
        </div>
      {!! Form::close() !!}
      {!! Form::open(['url' => route('password.email'),'class'=>'form-horizontal','id'=>'recoverform']) !!}
      {{ csrf_field() }}

        <div class="form-group ">
          <div class="col-xs-12">
            <h3>Recover Password</h3>
            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" type="text" required="" placeholder="Email">
          </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
          </div>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</section>
<!-- jQuery -->
<script src="{{url('/')}}/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{url('/')}}/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="{{url('/')}}/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>

<!--slimscroll JavaScript -->
<script src="{{url('/')}}/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="{{url('/')}}/js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="{{url('/')}}/js/custom.min.js"></script>
<!--Style Switcher -->
<script src="{{url('/')}}/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
