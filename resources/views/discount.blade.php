
<!DOCTYPE HTML>
<html>

<head>
    <title>دومین دوره وستا کمپ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <!-- style -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="shortcut icon" href="/img/logo.ico">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/fi/flaticon.css">
    <link rel="stylesheet" href="/css/main.css">
    <!--<link rel="stylesheet" type="text/css" href="tuner/css/colorpicker.css" />-->
    <!--<link rel="stylesheet" type="text/css" href="tuner/css/styles.css" />-->
    <link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.css" />
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen">
    <link rel="stylesheet" href="/css/animate.css">
    <link rel="stylesheet" href="/css/Kimia.css">
    <!--Owl Carousel-->
    <link rel="stylesheet" href="/css/docs.theme.custom.css">{{--
        <link rel="stylesheet" href="css/owl.carousel.css">--}}
    <script src="js/jquery.min.js"></script>{{--
        <script src="js/owl.carousel.js"></script>
        <script src="js/owl.autoplay.js"></script>--}}

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        form.subscribe input[name="email"] {
            width: calc(100% - 170px);
        }
        form.subscribe input[type="button"] {
            display: inline-block;
            cursor: pointer;
            background-color: #18bb7c;
            color: #ffffff;
            line-height: 40px;
            padding: 0 20px;
            border-top-right-radius: 4px;
            -ms-border-top-right-radius: 4px;
            -moz-border-top-right-radius: 4px;
            -webkit-border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
            -ms-border-bottom-right-radius: 4px;
            -moz-border-bottom-right-radius: 4px;
            -webkit-border-bottom-right-radius: 4px;
            transition: all 0.3s;
            -ms-transition: all 0.3s;
            -moz-transition: all 0.3s;
            -webkit-transition: all 0.3s;
        }
        form.subscribe input[type="button"]:hover {
            color: #f9cb8f;
        }
    </style>
    <!--Owl Carousel-->


    <!-- Latest compiled and minified CSS -->
    <!--<link rel="stylesheet" href="/https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <!-- jQuery library -->
    <!--<script src="/https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
    <!-- Latest compiled JavaScript -->
    <!--<script src="/https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <!--styles -->

</head>
<body>

<!-- page header -->
<header class="only-color">
    @include('header')
</header>
<!-- / page header -->

<div class="container">
    <form action="savecode" method="post">
        {{csrf_field()}}
    <table class="table table-hover" id="table1">
        <thead>
        <tr>
            <th>course id</th>
            <th>course name</th>
            <th>courrse price</th>
            <td>course discount type</td>
            <td>course discount value</td>
        </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr>
                <th><input type="text" name="id{{$course->id}}" value="{{$course->id}}" style="border-color: darkslateblue" hidden>{{$course->id}}</th>
                <th>{{$course->course->name}}</th>
                <th>{{$course->price}}</th>
                <td>
                    <select name="type{{$course->id}}" size="1" style="width: 25%;border-color: darkslateblue">
                        <option value="0" >درصد</option>
                        <option value="1">مقدار</option>
                    </select>
                </td>
                <td><input type="text" name="value{{$course->id}}" style="border-color: darkslateblue"></td>
                <td><input type ='submit' name="{{$course->id}}" value="generate code and save" class="btn btn-primary"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </form>
</div>


<!-- footer -->
@include('footer')
<!-- / footer -->


<!--<script src="js/jquery.min.js"></script>-->
<script src="/js/jquery.min.js"></script>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="../../google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox_packed.html"></script>
<script type='text/javascript' src='/js/jquery.validate.min.js'></script>
<script src="/js/jquery.form.min.js"></script>
<script src="/js/TweenMax.min.js"></script>
<script src="/js/main.js"></script>
<script type="text/javascript" src="/js/slick.min.js"></script>
<!-- jQuery REVOLUTION Slider  -->
<script type="text/javascript" src="/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="/js/jquery.isotope.min.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/jquery-ui.min.js"></script>
<script src="/js/jflickrfeed.min.js"></script>
<script src="/js/jquery.tweet.js"></script>
<!--<script type='text/javascript' src='tuner/js/colorpicker.js'></script>-->
<!--<script type='text/javascript' src='tuner/js/scripts.js'></script>-->
<script src="/js/jquery.fancybox.pack.js"></script>
<script src="/js/jquery.fancybox-media.js"></script>
<script src="/js/retina.min.js"></script>
<script src="/js/Kimia.js"></script>
<script src="/js/control.js"></script>

<!--Owl Carousel-->

{{--<script src="js/owl.carousel.js"></script>--}}
</body>

</html>
