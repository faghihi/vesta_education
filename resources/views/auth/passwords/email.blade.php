<!DOCTYPE HTML>
<html>


<head>
    <title>UniLearn - Education and Courses Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <!-- style -->
    <link rel="shortcut icon" href="/img/logo.ico">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/select2.css">
    <link rel="stylesheet" href="/css/main.css">
    <!--<link rel="stylesheet" type="text/css" href="tuner/css/colorpicker.css" />-->
    <!--<link rel="stylesheet" type="text/css" href="tuner/css/styles.css" />-->
    <link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.css" />
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="/css/login-reqisterRTL.css">
    <link rel="stylesheet" href="/css/Kimia.css">
    <!--styles -->
</head>
<body class="">
<header>
    <!-- sticky -->
@include('header')
<!-- sticky -->
</header>
<main>
    <section class="fullwidth-background bg-2">
        <div class="grid-row">
            <div class="login-block">
                <div class="logo">
                    <img src="/img/logo.png"  width="82" height="72" alt>
                    <h2>وستا کمپ</h2>
                </div>

                {{--<form class="login-form login-right-align">--}}
                    {{--<label> : بازنشانی گذرواژه</label>--}}
                    {{--<div class="form-group">--}}
                        {{--<input type="text" class="login-input" placeholder="کلمه عبور">--}}
                        {{--<span class="input-icon">--}}
								{{--<i class="fa fa-lock"></i>--}}
							{{--</span>--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<input type="text" class="login-input" placeholder="تکرار کلمه عبور">--}}
                        {{--<span class="input-icon">--}}
								{{--<i class="fa fa-lock"></i>--}}
							{{--</span>--}}
                    {{--</div>--}}

                    {{--<a href="#" class="button-fullwidth cws-button bt-color-3 border-radius">ثبت </a>--}}

                {{--</form>--}}
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

                <form class="login-form login-right-align" role="form" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}
                    <label> بازنشانی گذرواژه</label>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input id="email" type="email" class="login-input" name="email" value="{{ old('email') }}" placeholder="ایمیل" required>
                            <span class="input-icon">
                                <i class="fa fa-lock"></i>
                            </span>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                    </div>
                    <button type="submit" class="button-fullwidth cws-button bt-color-3 border-radius">
                    ارسال بازنشانی گذرواژه
                    </button>

                </form>
            </div>
        </div>
    </section>
</main>
<!-- footer -->
@include('footer')
<!-- footer -->
<!-- scripts -->
<script src="js/jquery.min.js"></script>
<script type='text/javascript' src='js/jquery.validate.min.js'></script>
<script src="js/jquery.form.min.js"></script>
<script src="js/TweenMax.min.js"></script>
<script src="js/main.js"></script>
<script src="js/select2.js"></script>
<script src="js/jquery.isotope.min.js"></script>

<script src="js/owl.carousel-v2.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jflickrfeed.min.js"></script>
<script src="js/jquery.tweet.js"></script>
<!--<script type='text/javascript' src='tuner/js/colorpicker.js'></script>-->
<!--<script type='text/javascript' src='tuner/js/scripts.js'></script>-->
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>
<script src="js/retina.min.js"></script>
<!-- scripts -->
</body>


</html>

{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Reset Password</div>--}}
                {{--<div class="panel-body">--}}
                    {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--<form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">--}}
                        {{--{{ csrf_field() }}--}}

                        {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                            {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--Send Password Reset Link--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--@endsection--}}
