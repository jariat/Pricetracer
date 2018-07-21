<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Welcome to Price Tracer</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" href="/">

    <!-- Import Template Icons CSS Files -->
    <link rel="stylesheet" href="{{asset("css/font-awesome.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/simple-line-icons.css")}}">
    <link rel="stylesheet" href="{{asset("css/linea-basic.css")}}">

    <!-- Import Custom Country Select CSS Files -->
    <link rel="stylesheet" href="{{asset("css/countrySelect.min.css")}}">

    <!-- Import Perfect ScrollBar CSS Files -->
    <link rel="stylesheet" href="{{asset("css/perfect-scrollbar.css")}}">

    <!-- Import Bootstrap CSS File -->

    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">

    <!-- Import Template's CSS Files -->
    <link rel="stylesheet" href="{{asset("css/presets.css")}}">
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    <link rel="stylesheet" href="{{asset("css/pages/pages.css")}}">
    <link rel="stylesheet" href="{{asset("css/responsive.css")}}">


</head>


<body>


<div class="admin-login d-flex align-content-center flex-wrap">
    <div class="container">

        <div class="row">
            <div class="col-lg-6 offset-md-3">
                <div class="login-content bg-light">
                    <div class="login-logo pt-4 pb-3 background-bg" data-image-src="../images/we.jpg">
                        <a href="/">
                            <img class="align-content" style="width: 70%;height: 200%" src="{{asset('images/logo-2.png')}}" alt="">
                        </a>
                        <p class="mt-2 mb-0 color-white">Welcome To Price Tracer</p>
                    </div>
                    <div class="login-form">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                Email address
                                <input type="email" name="email" class="form-control" placeholder="Email">
                                @if ($errors->has('email'))
                                    <span class="help-block" style="margin-top: 15px;color: crimson">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                Password
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                @if ($errors->has('password'))
                                    <span class="help-block" style="margin-top: 15px;color: crimson">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="checkbox">

                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me

                                <lSource Sans Pro class="pull-right">
                                    <a href="{{ route('password.request') }}">Forgotten Password?</a>
                                </lSource Sans Pro>

                            </div>
                            <button type="submit" class="btn btn-primary btn-flat mb-3 mt-3">Sign in</button>
                            <p> Are you a wholesaler? Email us at<br> <a href="mailto:pricetracer18.50@gmail.com"><b>pricetracer18.50@gmail.com</b> </a> <br>to create an account
                            or Contact Us at;<br>
                                <b>0725324733</b>
								<b>/0787444015</b>
                            </p>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="{{asset("js/jquery-3.2.1.slim.min.js")}}"></script>
<script src="{{asset("js/plugins.js")}}"></script>
<script src="{{asset('js/main.js')}}"></script>
</body>
</htm>