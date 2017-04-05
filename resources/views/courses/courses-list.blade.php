<!DOCTYPE HTML>
<html>

<head>
    <title>UniLearn - Education and Courses Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <!-- style -->
    <link rel="shortcut icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <!--<link rel="stylesheet" type="text/css" href="tuner/css/colorpicker.css" />-->
    <!--<link rel="stylesheet" type="text/css" href="tuner/css/styles.css" />-->
    <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" />
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen">
    <link rel="stylesheet" href="css/Kimia.css">
    <!--styles -->
    <style>
        .course-row{
            margin-bottom:20px;
        }
    </style>
    <!--styles -->
</head>
<body class="shop">
<!-- header -->
<!-- page header -->
<header>
    <!-- menu -->
    @include('header')
    <!-- / menu -->
    <!-- page title -->
    <div class="page-title">
        <div class="grid-row">
            <h1>دوره ها</h1>
            <nav class="bread-crumb">
                <a href="/">خانه</a>
                <i class="fa fa-long-arrow-left"></i>
                <a href="/courses-grid">دوره ها </a>
            </nav>
        </div>
    </div>
    <!-- / page title -->
</header>
<!-- / header -->
<!-- page content -->
<div class="page-content">
    <div class="container">
        <!-- main content -->
        <main>
            <section>
                <?php $course_count=0;?>
                @foreach ($courses->chunk(3) as $chunkedCourses)
                <div class="clear-fix">
                    <div class="grid-col-row course-row">
                        @foreach ($chunkedCourses as $course)
                        <div class="grid-col grid-col-4">
                            <!-- course item -->
                            <div class="course-item">
                                <div class="course-hover">
                                    <?php $img='/pic/sampleback.jpg'?>
                                    @if(isset($course->image))
                                        <?php $img=$course->image?>
                                    @endif
                                    <img src="{{$img}}" data-at2x="/pic/370x280-img-1@2x.jpg" alt>
                                    <div class="hover-bg bg-color-{{$course_count%6 + 1}}"></div>
                                    <a href="#">Learn More</a>
                                </div>
                                <div class="course-name clear-fix">
                                    <h3><a href="#">{{$course->course->name}}</a></h3>
                                    <span class="price" style="direction: rtl">{{number_format($course->price)}} تومان</span>
                                </div>
                                <div class="course-date bg-color-{{$course_count%6 + 1}}">
                                    <div class="day" style="direction: rtl"><i class="fa fa-calendar"></i>{{$course->start}}</div><div class="time"><i class="fa fa-clock-o"></i>{{$course['start_time']}}</div>
                                    <div class="divider"></div>
                                    <div class="description">
                                        <p>{{$course->course->introduction}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- / course item -->
                        </div>
                            <?php $course_count++;?>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </section>
            <hr class="divider-color" />
            <section>
                <h2>Popular In Category</h2>
                <?php $course_count=0;?>
                @foreach ($popular_courses->chunk(3) as $chunkedCourses)
                <div class="clear-fix">
                    <div class="grid-col-row">
                        @foreach ($chunkedCourses as $course)
                        <div class="grid-col grid-col-4">
                            <!-- course item -->
                            <div class="course-item">
                                <div class="course-hover">
                                    <?php $img='/pic/sampleback.jpg'?>
                                    @if(isset($course->image))
                                        <?php $img=$course->image?>
                                    @endif
                                    <img src="{{$img}}" data-at2x="/pic/370x280-img-7@2x.jpg" alt>
                                    <div class="hover-bg bg-color-{{$course_count%6 + 1}}"></div>
                                    <a href="#">Learn More</a>
                                </div>
                                <div class="course-name clear-fix">
                                    <span class="price" style="direction: rtl">{{number_format($course->price)}} تومان</span>
                                    <h3><a href="#">{{$course->course->name}}</a></h3>
                                </div>
                                <div class="course-date bg-color-{{$course_count%6 + 1}}">
                                    <div class="day" style="direction: rtl"><i class="fa fa-calendar"></i>{{$course->start}}</div><div class="time"><i class="fa fa-clock-o"></i>{{$course['start_time']}}</div>
                                    <div class="divider"></div>
                                    <div class="description">{{$course->course->introduction}}</div>
                                </div>
                            </div>
                            <!-- / course item -->
                        </div>
                            <?php $course_count++;?>
                        @endforeach
                        {{--<div class="grid-col grid-col-4">--}}
                            {{--<!-- course item -->--}}
                            {{--<div class="course-item">--}}
                                {{--<div class="course-hover">--}}
                                    {{--<img src="/pic/370x280-img-8.jpg" data-at2x="/pic/370x280-img-8@2x.jpg" alt>--}}
                                    {{--<div class="hover-bg bg-color-2"></div>--}}
                                    {{--<a href="#">Learn More</a>--}}
                                {{--</div>--}}
                                {{--<div class="course-name clear-fix">--}}
                                    {{--<span class="price">Free</span>--}}
                                    {{--<h3><a href="#">Campus Party</a></h3>--}}
                                {{--</div>--}}
                                {{--<div class="course-date bg-color-2 clear-fix">--}}
                                    {{--<div class="day"><i class="fa fa-calendar"></i>12 January</div><div class="time"><i class="fa fa-clock-o"></i>At 4:00 pm</div>--}}
                                    {{--<div class="divider"></div>--}}
                                    {{--<div class="description">Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<!-- / course item -->--}}
                        {{--</div>--}}
                        {{--<div class="grid-col grid-col-4">--}}
                            {{--<!-- course item -->--}}
                            {{--<div class="course-item">--}}
                                {{--<div class="course-hover">--}}
                                    {{--<img src="/pic/370x280-img-9.jpg" data-at2x="/pic/370x280-img-9@2x.jpg" alt>--}}
                                    {{--<div class="hover-bg bg-color-3"></div>--}}
                                    {{--<a href="#">Learn More</a>--}}
                                {{--</div>--}}
                                {{--<div class="course-name clear-fix">--}}
                                    {{--<span class="price">$45</span>--}}
                                    {{--<h3><a href="#">Design Practice</a></h3>--}}
                                {{--</div>--}}
                                {{--<div class="course-date bg-color-3 clear-fix">--}}
                                    {{--<div class="day"><i class="fa fa-calendar"></i>22 January</div><div class="time"><i class="fa fa-clock-o"></i>At 6:30 pm</div>--}}
                                    {{--<div class="divider"></div>--}}
                                    {{--<div class="description">Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<!-- / course item -->--}}
                        {{--</div>--}}
                    </div>
                </div>
                @endforeach
            </section>
        </main>
        <!-- / main content -->
    </div>
</div>
<!-- / page content -->
<!-- footer -->
@include('footer')
<!-- / footer -->
<script src="/js/jquery.min.js"></script>
<script src="/js/jquery.dotdotdot.min.js"></script>
<script type='text/javascript' src='/js/jquery.validate.min.js'></script>
<script src="/js/jquery.form.min.js"></script>
<script src="/js/TweenMax.min.js"></script>
<script src="/js/main.js"></script>
<!-- jQuery REVOLUTION Slider  -->
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
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
</body>
</html>