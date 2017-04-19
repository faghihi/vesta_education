<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Vesta Camp - Education and Courses</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <!-- style -->
        <link rel="shortcut icon" href="/img/favicon.png">
        <link rel="stylesheet" href="/css/font-awesome.css">
        <link rel="stylesheet" href="/css/select2.css">
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" type="text/css" href="/css/colorpicker.css" />
        <link rel="stylesheet" type="text/css" href="/css/styles.css" />
        <link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.css" />
        <link rel="stylesheet" href="/css/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="/css/login-registerRTL.css">
        <!--styles -->
    </head>
    {{--<head>--}}
        {{--<meta charset="utf-8">--}}
        {{--<meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
        {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}

        {{--<title>Laravel</title>--}}

        {{--<!-- Fonts -->--}}
        {{--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">--}}

        {{--<!-- Styles -->--}}
        {{--<style>--}}
            {{--html, body {--}}
                {{--background-color: #fff;--}}
                {{--color: #636b6f;--}}
                {{--font-family: 'Raleway', sans-serif;--}}
                {{--font-weight: 100;--}}
                {{--height: 100vh;--}}
                {{--margin: 0;--}}
            {{--}--}}

            {{--.full-height {--}}
                {{--height: 100vh;--}}
            {{--}--}}

            {{--.flex-center {--}}
                {{--align-items: center;--}}
                {{--display: flex;--}}
                {{--justify-content: center;--}}
            {{--}--}}

            {{--.position-ref {--}}
                {{--position: relative;--}}
            {{--}--}}

            {{--.top-right {--}}
                {{--position: absolute;--}}
                {{--right: 10px;--}}
                {{--top: 18px;--}}
            {{--}--}}

            {{--.content {--}}
                {{--text-align: center;--}}
            {{--}--}}

            {{--.title {--}}
                {{--font-size: 84px;--}}
            {{--}--}}

            {{--.links > a {--}}
                {{--color: #636b6f;--}}
                {{--padding: 0 25px;--}}
                {{--font-size: 12px;--}}
                {{--font-weight: 600;--}}
                {{--letter-spacing: .1rem;--}}
                {{--text-decoration: none;--}}
                {{--text-transform: uppercase;--}}
            {{--}--}}

            {{--.m-b-md {--}}
                {{--margin-bottom: 30px;--}}
            {{--}--}}
        {{--</style>--}}
    {{--</head>--}}
        {{--<div class="flex-center position-ref full-height">--}}
            {{--<p>--}}
                {{--enter your number--}}
            {{--</p>--}}
            {{--<form class="form" action="/completesocial" method="post">--}}
                {{--<input type="text" name="phone">--}}
                {{--{{csrf_field()}}--}}
                {{--<button type="submit">submit</button>--}}
            {{--</form>--}}
        {{--</div>--}}

    <body>
    <div id="app">
        <!-- page header -->
        <header class="only-color">
            @include('header')
        </header>
        <!-- / page header -->

        <main>
            <section class="fullwidth-background bg-2">
                <div class="grid-row">
                    <div class="login-block">
                        <div class="logo">
                            <img src="img/logo.png" data-at2x='img/logo@2x.png' width="300" height="300" alt>
                            <h2>Vesta Camp</h2>
                        </div>

                        <form class="login-form" role="form" method="POST" action="/completesocial">

                            {{csrf_field()}}

                            <label style="direction: rtl" id="lblPhoneNumber"> شماره تلفن خودرا وارد کنید:</label>

                            <div class="form-group">
                                <input type="text" name="phone" class="login-input" placeholder="موبایل">
                        <span class="input-icon">
                            <i class="fa fa-phone"></i>
                        </span>
                            </div>

                            <button type="submit" class="button-fullwidth cws-button bt-color-3 border-radius">ثبت</button>


                        </form>
                    </div>
                </div>
            </section>
        </main>

    <!-- footer -->
    @include('footer')
    <!-- / footer -->
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
