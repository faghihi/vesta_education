<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <title>وستاک</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <!-- style -->
    <link rel="shortcut icon" href="img/logo.ico">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/select2.css">
    <link rel="stylesheet" href="css/main.css">
    <!--<link rel="stylesheet" type="text/css" href="tuner/css/colorpicker.css" />-->
    <!--<link rel="stylesheet" type="text/css" href="tuner/css/styles.css" />-->
    <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" />
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/Kimia.css">
    <link rel="stylesheet" type="text/css" href="css/login-reqisterRTL.css">
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
