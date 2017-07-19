<!DOCTYPE HTML>
<html>

<head>
    <title>دوره های وستاکمپ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <!-- style -->
    <link rel="shortcut icon" href="/img/logo.ico">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!--<link rel="stylesheet" type="text/css" href="tuner/css/colorpicker.css" />-->
    <!--<link rel="stylesheet" type="text/css" href="tuner/css/styles.css" />-->
    <link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.css" />
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="/rs-plugin/css/settings.css" media="screen">
    <link rel="stylesheet" href="/css/Kimia.css">
    <!--styles -->

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
            <div class="category-search course-grid-category-search">
                <i class="fa fa-search"></i><!--
						 --><form method="get" action="{{ url('/courses-grid/Search') }}" class="search-form" >
                    <select name="category-id" class="category-id">
                        <option selected disabled>دسته بندی ها</option>
                        @foreach($categories as $category)
                            <option value="{{$category->name}}">{{$category->name}}</option>
                        @endforeach
                    </select><!--
							 --><input type="text" class="input-text" placeholder="کلید واژه" name="search"><!--
							 --><button type="submit" class="cws-button smaller border-radius alt" >جستجو</button>
                </form>
            </div>
            <section>
                <div class="clear-fix">
                    <div class="grid-col-row">
                        @if(!count($courses))
                            <p>موردی یافت نشد.</p>
                        @endif
                    </div>
                    <?php $course_count=0;?>
                    @for ($i=0;$i<count($courses);$i=$i+3)
                    <div class="grid-col-row">
                            <div class="grid-col grid-col-4" style="margin-bottom: 30px">
                                @if(isset($courses[$i]))
                                <div class="course-item" >
                                    <div class="course-hover">
                                        <?php $img='/pic/H340-img-3.jpg'?>
                                        @if(isset($courses[$i]->image))
                                            <?php $img=Voyager::image($courses[$i]->image)?>
                                        @endif
                                        <img src="{{$img}}" alt>
                                    <div class="hover-bg bg-color-{{$course_count%6 + 1}}"></div>
                                        <a href="/courses-grid/{{$courses[$i]->id}}">بیشتر </a>
                                    </div>
                                    <div class="course-name clear-fix">
                                        <h3><a href="/courses-grid/{{$courses[$i]->id}}">{{$courses[$i]->course->name}}</a></h3>
                                        <span class="price"> @if($courses[$i]->price == 0)
                                        رایگان
                                        @else
                                        {{number_format($courses[$i]->price)}}
                                        <span class="course-item-tooman" style="float: left"> هزار تومان</span>
                                        @endif  </span>
                                    </div>
                                    <div class="course-date bg-color-{{$course_count%6 + 1}} clear-fix">
                                        <div class="day"><i class="fa fa-calendar"></i>{{$courses[$i]->start_date}}</div><div class="time"><i class="fa fa-clock-o"></i>{{$courses[$i]['time']}}&nbsp;ساعت</div>
                                        <div class="divider"></div>
                                        <div class="description">
                                        <p>{!!  $courses[$i]->course->introduction!!}  </p>
                                        </div><a href="/courses-grid/{{$courses[$i]->id}}" style="display: inline">(بیشتر بدانید)</a>
                                    </div>
                                </div>
                                @endif
                            </div>
                        <div class="grid-col grid-col-4" style="margin-bottom: 30px">
                            @if(isset($courses[$i+1]))
                                <div class="course-item" >
                                    <div class="course-hover">
                                        <?php $img='/pic/H340-img-3.jpg'?>
                                        @if(isset($courses[$i+1]->image))
                                            <?php $img=Voyager::image($courses[$i+1]->image)?>
                                        @endif
                                        <img src="{{$img}}" alt>
                                        <div class="hover-bg bg-color-{{$course_count%6 + 2}}"></div>
                                        <a href="/courses-grid/{{$courses[$i+1]->id}}">بیشتر </a>
                                    </div>
                                    <div class="course-name clear-fix">
                                        <h3><a href="/courses-grid/{{$courses[$i+1]->id}}">{{$courses[$i+1]->course->name}}</a></h3>
                                        <span class="price"> @if($courses[$i+1]->price == 0)
                                                رایگان
                                            @else
                                                {{number_format($courses[$i+1]->price)}}
                                                <span class="course-item-tooman" style="float: left"> هزار تومان</span>
                                            @endif  </span>
                                    </div>
                                    <div class="course-date bg-color-{{$course_count%6 + 2}} clear-fix">
                                        <div class="day"><i class="fa fa-calendar"></i>{{$courses[$i+1]->start_date}}</div><div class="time"><i class="fa fa-clock-o"></i>{{$courses[$i+1]['time']}}&nbsp;ساعت</div>
                                        <div class="divider"></div>
                                        <div class="description">
                                            <p>{!!  $courses[$i+1]->course->introduction!!}  </p>
                                        </div><a href="/courses-grid/{{$courses[$i]->id}}" style="display: inline">(بیشتر بدانید)</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="grid-col grid-col-4" style="margin-bottom: 30px">
                            @if(isset($courses[$i+2]))
                                <div class="course-item" >
                                    <div class="course-hover">
                                        <?php $img='/pic/H340-img-3.jpg'?>
                                        @if(isset($courses[$i+2]->image))
                                            <?php $img=Voyager::image($courses[$i+2]->image)?>
                                        @endif
                                        <img src="{{$img}}" alt>
                                        <div class="hover-bg bg-color-{{$course_count%6 + 3}}"></div>
                                        <a href="/courses-grid/{{$courses[$i+2]->id}}">بیشتر </a>
                                    </div>
                                    <div class="course-name clear-fix">
                                        <h3><a href="/courses-grid/{{$courses[$i+2]->id}}">{{$courses[$i+2]->course->name}}</a></h3>
                                        <span class="price"> @if($courses[$i+2]->price == 0)
                                                رایگان
                                            @else
                                                {{number_format($courses[$i+2]->price)}}
                                                <span class="course-item-tooman" style="float: left"> هزار تومان</span>
                                            @endif  </span>
                                    </div>
                                    <div class="course-date bg-color-{{$course_count%6 + 3}} clear-fix">
                                        <div class="day"><i class="fa fa-calendar"></i>{{$courses[$i+2]->start_date}}</div><div class="time"><i class="fa fa-clock-o"></i>{{$courses[$i+2]['time']}}&nbsp;ساعت</div>
                                        <div class="divider"></div>
                                        <div class="description">
                                            <p>{!!  $courses[$i+2]->course->introduction!!}  </p>
                                        </div>

                                        <div class="course-more">
                                            <a href="/courses-grid/{{$courses[$i]->id}}" >(بیشتر بدانید)</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                            <?php $course_count+=3;?>
                    </div>
                    @endfor
                </div>
            </section>

                    <div class="page-pagination clear-fix">
                        {{$courses->links('Pagination.default')}}
                    </div>

            {{--<div class="page-pagination clear-fix">--}}
                {{--<a href="#"><i class="fa fa-angle-double-left"></i></a>--}}
                {{--<a href="#" class="active">1</a>--}}
                {{--<a href="#">2</a>--}}
                {{--<a href="#">3</a>--}}
                {{--<a href="#"><i class="fa fa-angle-double-right"></i></a>--}}
            {{--</div>--}}
            <hr class="divider-color" />
            <section>
                @if(isset($courses['data']))
                    <h2>دوره های محبوب</h2>
                @endif
                <?php $course_count=0;?>

                    <div class="clear-fix">
                        <div class="grid-col-row">
                            @foreach ($courses as $course)
                                <div class="grid-col grid-col-4">
                                    <!-- course item -->
                                    @if($course['rate']>3)
                                    <div class="course-item">
                                        <div class="course-hover">
                                            <?php $img='/pic/sampleback.jpg'?>
                                            @if(isset($course->image))
                                                <?php $img=Voyager::image($courses->image)?>
                                            @endif
                                            <img src="{{$img}}" alt>
                                            <div class="hover-bg bg-color-{{$course_count%6 + 1}}"></div>
                                            <a href="/courses-grid/{{$course->id}}">بیشتر</a>
                                        </div>
                                        <div class="course-name clear-fix">
                                        <span class="price" style="direction: rtl">
                                        @if($course->price == 0)
                                                رایگان
                                            @else
                                                {{number_format($course->price)}}
                                                هزار تومان
                                            @endif
                                        </span>
                                            <h3><a href="/courses-grid/{{$course->id}}">{{$course->course->name}}</a></h3>
                                        </div>
                                        <div class="course-date bg-color-{{$course_count%6 + 1}}">
                                            <div class="day" style="direction: rtl"><i class="fa fa-calendar"></i>{{$course->start_date}}</div><div class="time"><i class="fa fa-clock-o"></i>{{$course['time']}}&nbsp;ساعت</div>
                                            <div class="divider"></div>
                                            <div class="description">
                                                <p>{!!  $course->course->introduction!!}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <!-- / course item -->
                                </div>
                                <?php $course_count++;?>
                            @endforeach
                            {{--<div class="grid-col grid-col-4">--}}
                            {{--<!-- course item -->--}}
                            {{--<div class="course-item">--}}
                            {{--<div class="course-hover">--}}
                            {{--<img src="/pic/370x280-img-8.jpg" alt>--}}
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
                            {{--<img src="/pic/370x280-img-9.jpg" alt>--}}
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
<script type="text/javascript" src="/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
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
<script src="/js/Kimia.js"></script>
</body>
</html>