<!DOCTYPE HTML>
<html>


<head>
    <title>ریست کردن کلمه عبور</title>
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

                    <form class="login-form login-right-align" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <label> : ایمیل خود را وارد کنید</label>
                        <div class="form-group">
                            <input type="email" class="login-input" placeholder="ایمیل" name="email" value="{{ $email or old('email') }}" required autofocus>
                            <span class="input-icon">
                                <i class="fa fa-lock"></i>
                            </span>
                        </div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        <label>رمز جدید را وارد کنید</label>
                        <div class="form-group">
                            <input type="password" class="login-input" name="password" required placeholder=" کلمه عبور">
                            <span class="input-icon">
                                <i class="fa fa-lock"></i>
                            </span>
                        </div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        <label>تکرار رمز را وارد کنید</label>
                        <div class="form-group">
                            <input type="password" class="login-input" name="password_confirmation" required placeholder="تکرار کلمه عبور">
                            <span class="input-icon">
                                <i class="fa fa-lock"></i>
                            </span>
                        </div>
                        @if ($errors->has('password_confirmtion'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmtion') }}</strong>
                            </span>
                        @endif

                        <input type="submit" class="button-fullwidth cws-button bt-color-3 border-radius" value="ثبت">

                    </form>
                </div>
            </div>
        </section>
    </main>

@include('footer');
    <!-- scripts -->
    <script src="/js/jquery.min.js"></script>
    <script type='text/javascript' src='/js/jquery.validate.min.js'></script>
    <script src="/js/jquery.form.min.js"></script>
    <script src="/js/TweenMax.min.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/select2.js"></script>
    <script src="/js/jquery.isotope.min.js"></script>

    <script src="/js/owl.carousel-v2.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/jflickrfeed.min.js"></script>
    <script src="/js/jquery.tweet.js"></script>
    <!--<script type='text/javascript' src='tuner/js/colorpicker.js'></script>-->
    <!--<script type='text/javascript' src='tuner/js/scripts.js'></script>-->
    <script src="/js/jquery.fancybox.pack.js"></script>
    <script src="/js/jquery.fancybox-media.js"></script>
    <script src="/js/retina.min.js"></script>
    <!-- scripts -->
</body>


</html>
