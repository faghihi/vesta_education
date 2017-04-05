<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <title>Vesta Camp - Education and Courses</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}

    {{--<!-- CSRF Token -->--}}
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}

    {{--<title>{{ config('app.name', 'Laravel') }}</title>--}}

    {{--<!-- Styles -->--}}
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

    {{--<!-- Scripts -->--}}
    {{--<script>--}}
        {{--window.Laravel = {!! json_encode([--}}
            {{--'csrfToken' => csrf_token(),--}}
        {{--]) !!};--}}
    {{--</script>--}}
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
<body>
    <div id="app">
        <!-- page header -->
        <header class="only-color">
            @include('header')
        </header>
        <!-- / page header -->

        @yield('content')

        <!-- footer -->
        @include('footer')
        <!-- / footer -->
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
