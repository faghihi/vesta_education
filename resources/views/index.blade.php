<!DOCTYPE HTML>
<html>

<head>
    <title>UniLearn - Education and Courses Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <!-- style -->
    <link rel="shortcut icon" href="/img/favicon.png">
    <link rel="stylesheet" href="/css/font-awesome.css">
    <link rel="stylesheet" href="/fi/flaticon.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.css" />
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="/rs-plugin/css/settings.css" media="screen">
    <link rel="stylesheet" href="/css/animate.css">
    <link rel="stylesheet" href="/css/Kimia.css">
    <!--Owl Carousel-->
    <link rel="stylesheet" href="/css/docs.theme.custom.css">
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/owl.carousel.js"></script>
    <script src="/js/owl.autoplay.js"></script>


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
@include('header')
<!-- / page header -->

<!--start slider-->
<section id="demos">
    <div class="columns-row">
        <div class="columns-col-12 columns-col">
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <h4>1</h4>
                </div>
                <div class="item">
                    <h4>2</h4>
                </div>
                <div class="item">
                    <h4>3</h4>
                </div>
                <div class="item">
                    <h4>4</h4>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    var owl = $('.owl-carousel');
                    owl.owlCarousel({
                        items: 1,
                        loop: true,
                        margin: 10,
                        autoplay: true,
                        autoplayTimeout: 5000,
                        autoplayHoverPause: false

                    });
                })
            </script>
        </div>
    </div>
</section>
<!--end slider-->


<hr class="divider-color">

<!-- content -->
<div id="home" class="page-content padding-none">

    <!-- #search-form #start  -->
    <section class="search-form">
        <div class="container grid-row clear-fix">
            <h2 class="center-text">Emerge yourself by learning new Skills</h2>
            <!--<form action="#" method="get" class="form-inline">-->
            <!--<fieldset>-->
            <!--<div class="input-group">-->
            <!--<input type="text" name="s" id="search" placeholder="What do you want to learn today" value="" class="form-control" />-->
            <!--<span class="input-group-btn">-->
            <!--<button type="submit" class="btn btn-orange btn-medium"><i class="lnr lnr-magnifier"></i> Search</button>-->
            <!--</span>-->
            <!--</div>-->
            <!--</fieldset>-->
            <!--</form>&lt;!&ndash; #search-form #end  &ndash;&gt;-->

            <aside class="widget-search">
                <form method="get" action="{{ url('/Search') }}" class="search-form" action="#">
                    <label>
                        <span class="screen-reader-text">Search for:</span>
                        <input type="search" name="search" class="search-field main-search" placeholder="What do you want to learn today..." value="" title="Search for:">
                    </label>
                    <input type="submit" class="search-submit" value="SEARCH">
                </form>
            </aside>

            <section class="banners">
                <!--<h2>Banners</h2>-->
                <div class="clear-fix">
                    <div class="grid-col-row">
                        <div class="grid-col grid-col-3">
                            <!-- banner alt -->
                            <div class="category-button left-one">
                                <i class="fa fa-briefcase"></i>
                                <p>Over 5 Million Students Enrolled</p>
                            </div>
                            <!-- banner alt -->
                        </div>
                        <div class="grid-col grid-col-3">
                            <!-- banner alt -->
                            <div class="category-button left-three">
                                <i class="fa fa-laptop"></i>
                                <p>Learn skills on any Devices anytime</p>
                            </div>
                            <!-- / banner alt -->
                        </div>
                        <div class="grid-col grid-col-3">
                            <!-- banner alt -->
                            <div class="category-button left-two">
                                <i class="fa fa-briefcase"></i>
                                <p>More than 25,000 Online Available Courses</p>
                            </div>
                            <!-- / banner alt -->
                        </div>
                        <div class="grid-col grid-col-3">
                            <!-- banner alt -->
                            <div class="category-button left-four">
                                <i class="fa fa-fax"></i>
                                <p>More than 5,000 Instructors Registered</p>
                            </div>
                            <!-- / banner alt -->
                        </div>
                    </div>
                </div>
            </section>

        </div><!-- #container #end -->
    </section>
    <!-- #search-form #end  -->

    <hr class="divider-color">

    <!--Categories-->
    <section class="container">
        <h2 class="center-text">Categories</h2>
        @for($i=0;$i<count($categories);$i+=6)
        {{--1,2,3,4--}}
        <div class="column-row clear-fix">
            {{--1--}}
            <div class="columns-col columns-col-6">
                <!-- banner -->
                <div class="banner-offer icon-right bg-color-4 cat-left-first">
                    <a href="/#">
                        <h3 style="margin-top: 20px; margin-bottom: 20px;">{{$categories[$i]->name}}</h3>
{{--                        <p>{{$categories[$i]->description}}</p>--}}
                    </a>
                </div>
                <!-- / banner -->
            </div>
            {{--2,3,4--}}
            <div class="columns-col columns-col-6">
                {{--2--}}
                <div class="columns-row">
                    <div class="columns-col columns-col-12">
                    @if(isset($categories[$i+1]))
                        <!-- banner -->
                        <div class="banner-offer icon-right bg-color-3 cat-right-first">
                            <a href="/#">
                                <h3 style="margin-top: 20px; margin-bottom: 20px;">{{$categories[$i+1]->name}}</h3>
{{--                                <p>{{$categories[$i+1]->description}}</p>--}}
                            </a>
                        </div>
                    @endif
                    </div>
                </div>
                {{--3,4--}}
                <div class="columns-row">
                    {{--3--}}
                    <div class="columns-col columns-col-6">
                        @if(isset($categories[$i+2]))
                        <div class=" banner-offer icon-right bg-color-2 cat-right-sub1">
                            <a href="/#">
                                <h3 style="margin-top: 20px; margin-bottom: 20px;">{{$categories[$i+2]->name}}</h3>
{{--                                <p>{{$categories[$i+2]->description}}</p>--}}
                            </a>
                        </div>
                        @endif
                    </div>
                    {{--4--}}
                    <div class="columns-col columns-col-6">
                        @if(isset($categories[$i+3]))
                        <div class=" banner-offer icon-right bg-color-5alt cat-right-sub2">
                            <a href="/#">
                                <h3 style="margin-top: 20px; margin-bottom: 20px;">{{$categories[$i+3]->name}}</h3>
{{--                                <p>{{$categories[$i+3]->description}}</p>--}}
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{--5,6--}}
        <div class="column-row clear-fix">
            {{--5--}}
            @if(isset($categories[$i+4]))
            <div class="columns-col columns-col-6">
                <!-- banner -->
                <div class="banner-offer icon-right bg-color-6 cat-left-second">
                    <a href="/#">
                        <h3 style="margin-top: 20px; margin-bottom: 20px;">{{$categories[$i+4]->name}}</h3>
{{--                        <p>{{$categories[$i+4]->description}}</p>--}}
                    </a>
                </div>
            </div>
            @endif
            <!-- / banner -->
            {{--6--}}
            <div class="columns-col columns-col-6">
                @if(isset($categories[$i+5]))
                <div class="banner-offer icon-right bg-color-1alt cat-right-second">
                    <a href="/#">
                        <h3 style="margin-top: 20px; margin-bottom: 20px;">{{$categories[$i+5]->name}}</h3>
{{--                        <p>{{$categories[$i+5]->description}}</p>--}}
                    </a>
                </div>
                @endif
            </div>
        </div>
            <br>
        @endfor
    </section>
    <!-- / Categories-->


    <hr class="divider-color" />

    <!-- Latest Courses-->
    <section class="padding-section">
        <div class="grid-row clear-fix">
            <h2 class="center-text">Latest Courses</h2>

            <div class="grid-col-row">
                @foreach($courses as $course)
                <div class="grid-col grid-col-4">
                    <!-- course item -->
                    <div class="course-item">
                        <div class="course-hover">
                            <img src="{{$course->image}}" alt>
                            <div class="hover-bg bg-color-1"></div>
                            <a href="/#">Learn More</a>
                        </div>
                        <div class="course-name clear-fix">
                            <span class="price"> {{$course->price}} ت </span>
                            <h3><a href="/#">{{$course['name']}}</a></h3>
                        </div>
                        <div class="course-date bg-color-1 clear-fix">
                            <div class="day"><i class="fa fa-calendar"></i>{{$course->start}}</div>
                            <div class="time"><i class="fa fa-clock-o"></i>At <?php echo  date('h:i A', strtotime($course['start_time'])); ?></div>
                            <div class="divider"></div>
                            <div class="description">{{$course->course->introduction }}</div>
                        </div>
                    </div>
                    <!-- / course item -->
                </div>
                @endforeach

                {{--<div class="grid-col grid-col-4">--}}
                    {{--<!-- course item -->--}}
                    {{--<div class="course-item">--}}
                        {{--<div class="course-hover">--}}
                            {{--<img src="/pic/370x280-img-2.jpg" alt="">--}}
                            {{--<div class="hover-bg bg-color-2"></div>--}}
                            {{--<a href="/#">Learn More</a>--}}
                        {{--</div>--}}
                        {{--<div class="course-name clear-fix">--}}
                            {{--<span class="price">Free</span>--}}
                            {{--<h3><a href="/#">Campus Party</a></h3>--}}
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
                            {{--<img src="/pic/370x280-img-3.jpg" alt="">--}}
                            {{--<div class="hover-bg bg-color-3"></div>--}}
                            {{--<a href="/#">Learn More</a>--}}
                        {{--</div>--}}
                        {{--<div class="course-name clear-fix">--}}
                            {{--<span class="price">$45</span>--}}
                            {{--<h3><a href="/#">Design Practice</a></h3>--}}
                        {{--</div>--}}
                        {{--<div class="course-date bg-color-3 clear-fix">--}}
                            {{--<div class="day"><i class="fa fa-calendar"></i>22 January</div><div class="time"><i class="fa fa-clock-o"></i>At 6:30 pm</div>--}}
                            {{--<div class="divider"></div>--}}
                            {{--<div class="description">Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattisDonec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattisDonec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattisDonec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattisDonec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattisDonec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattisDonec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<!-- course item -->--}}
                {{--</div>--}}
            </div>
        </div>
    </section>
    <!-- / Latest Courses-->

    <hr class="divider-color" />

    <!-- section -->
    <section class="fullwidth-background padding-section">
        <div class="grid-row clear-fix">
            <div class="grid-col-row">
                <div class="grid-col grid-col-6">
                    <a href="/#" class="service-icon"><i class="flaticon-pie"></i></a>
                    <a href="/#" class="service-icon"><i class="flaticon-medical"></i></a>
                    <a href="/#" class="service-icon"><i class="flaticon-restaurant"></i></a>
                    <a href="/#" class="service-icon"><i class="flaticon-website"></i></a>
                    <a href="/#" class="service-icon"><i class="flaticon-hotel"></i></a>
                    <a href="/#" class="service-icon"><i class="flaticon-web-programming"></i></a>
                    <a href="/#" class="service-icon"><i class="flaticon-camera"></i></a>
                    <a href="/#" class="service-icon"><i class="flaticon-speech"></i></a>
                </div>
                <div class="grid-col grid-col-6 clear-fix">
                    <h2>Our Services</h2>
                    <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis justo at susp. Vivamus orci urna, ornare vitae tellus in, condimentum imperdiet eros. Maecea accumsan, massa nec vulputate congue. Maecenas nec odio et ante tincidunt creptus alarimus tempus.</p>
                    <a href="/#" class="cws-button bt-color-3 border-radius alt icon-right float-right">Learn More<i class="fa fa-angle-left"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- / section -->
    <!-- paralax section -->
    <div class="parallaxed">
        <div class="parallax-image" data-parallax-left="0.5" data-parallax-top="0.3" data-parallax-scroll-speed="0.5">
            <img src="/img/parallax.png" alt="">

        </div>
        <div class="them-mask bg-color-1"></div>
        <div class="grid-row">
            <div class="grid-col-row clear-fix">
                <div class="grid-col grid-col-3 alt">
                    <div class="counter-block">
                        <i class="flaticon-book1"></i>
                        <div class="counter" data-count="{{$course_count}}">{{$course_count}}</div>
                        <div class="counter-name">Courses</div>
                    </div>
                </div>
                <div class="grid-col grid-col-3 alt">
                    <div class="counter-block">
                        <i class="flaticon-multiple"></i>
                        <div class="counter" data-count="{{$count_student}}">{{$count_student}}</div>
                        <div class="counter-name">Students</div>
                    </div>
                </div>
                <div class="grid-col grid-col-3 alt">
                    <div class="counter-block">
                        <i class="flaticon-pencil"></i>
                        <div class="counter" data-count="41">0</div>
                        <div class="counter-name">Lections</div>
                    </div>
                </div>
                <div class="grid-col grid-col-3 alt">
                    <div class="counter-block last">
                        <i class="flaticon-calendar"></i>
                        <div class="counter" data-count="120">0</div>
                        <div class="counter-name">Events</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / paralax section -->
    <!-- section -->
    <section class="fullwidth-background padding-section">
        <div class="grid-row">
            <h2 class="center-text">How We Work</h2>
            <!-- time line -->
            <div class="time-line">
                <div class="line-element">
                    <div class="action">
                        <div class="action-block">
                            <span><i class="flaticon-magnifier"></i></span>
                            <div class="text">
                                <h3>شینلسنذن</h3>
                                <p>Lorem ipsum  dolor sit amet, consectetuer adipisc ing elit. Aenean commodo ligula.</p>
                            </div>
                        </div>
                    </div>
                    <div class="level">
                        <div class="level-block">Step 1</div>
                    </div>
                </div>
                <div class="line-element color-2">
                    <div class="level">
                        <div class="level-block">Step 2</div>
                    </div>
                    <div class="action">
                        <div class="action-block">
                            <span><i class="flaticon-computer"></i></span>
                            <div class="text">
                                <h3>Take A Sample Lesson</h3>
                                <p>Aenean massa. Cum sociis nato que penatibus et magnis dis par turient montes.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line-element color-3">
                    <div class="action">
                        <div class="action-block">
                            <span><i class="flaticon-shopping"></i></span>
                            <div class="text">
                                <h3>Purchase the Course</h3>
                                <p>Donec quam felis, ultricies nec, pellent esque eu, pretium quis, sem. Nulla conse massa.</p>
                            </div>
                        </div>
                    </div>
                    <div class="level">
                        <div class="level-block">Step 3</div>
                    </div>
                </div>
            </div>
            <!-- / time line -->
        </div>
    </section>
    <!-- / paralax section -->
    <hr class="divider-color" />
    <!-- paralax section -->
    <section class="padding-section">
        <div class="grid-row clear-fix">
            <div class="grid-col-row">
                <div class="grid-col grid-col-6">
                    <div class="boxs-tab">
                        <div class="animated fadeIn active" data-box="1">
                            <img src="/pic/H340-img-1.jpg" alt>
                        </div>
                        <div class="animated fadeIn" data-box="2">
                            <img src="/pic/H340-img-2.jpg"  alt>
                        </div>
                        <div class="animated fadeIn" data-box="3">
                            <img src="/pic/H340-img-3.jpg" alt>
                        </div>
                    </div>
                </div>
                <div class="grid-col grid-col-6">
                    <h2>We Offer</h2>
                    <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis justo at suscipit. Vivamus orci urna, ornare vitae tellus in, condimentum imperdiet eros. Maecenas accumsan, massa nec vulputate congue.<br/><br/>Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.</p>
                    <div class="tabs-box">
                        <a href="/#vd" data-boxs-tab="1" class="active">Education</a>
                        <a href="/#dvd" data-boxs-tab="2">Knoweledge</a>
                        <a href="/#cddv" data-boxs-tab="3">Employment</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / paralax section -->
    <hr class="divider-color"/>
    <!-- paralax section -->
    <section class="fullwidth-background padding-section">
        <div class="grid-row clear-fix">
            <h2 class="center-text">About Us</h2>
            <div class="grid-col-row">
                <div class="grid-col grid-col-6">
                    <h3>Why We Are Better</h3>
                    <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis justo at suscipit. Vivamus orci urna, ornare vitae tellus in.</p>
                    <!-- accordions -->
                    <div class="accordions">
                        <!-- content-title -->
                        <div class="content-title active">Donec sollicitudin lacus?</div>
                        <!--/content-title -->
                        <!-- accordions content -->
                        <div class="content">Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue.</div>
                        <!--/accordions content -->
                        <!-- content-title -->
                        <div class="content-title">Lorem ipsum dolor sit amet?</div>
                        <!--/content-title -->
                        <!-- accordions content -->
                        <div class="content">Nullam elementum tristique risus nec pellentesque. Pellentesque bibendum nunc eget nunc hendrerit auctor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur gravida urna nisl</div>
                        <!--/accordions content -->
                        <!-- content-title -->
                        <div class="content-title">Aenean commodo ligula eget dolor?</div>
                        <!--/content-title -->
                        <!-- accordions content -->
                        <div class="content">Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue.</div>
                        <!--/accordions content -->
                        <!-- content-title -->
                        <div class="content-title">Moreno gotro ja pisit amet?</div>
                        <!--/content-title -->
                        <!-- accordions content -->
                        <div class="content">Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue.</div>
                        <!--/accordions content -->
                    </div>
                    <!--/accordions -->
                    <a href="/#" class="cws-button bt-color-3 border-radius alt icon-right">View Detail<i class="fa fa-angle-left"></i></a>
                </div>
                <div class="grid-col grid-col-6">
                    <div class="owl-carousel full-width-slider">
                        <div class="gallery-item picture">
                            <img src="/pic/570x380-img-2.jpg" alt>
                        </div>
                        <div class="gallery-item picture">
                            <img src="/pic/570x380-img-1.jpg" alt>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- paralax section -->
    <!-- parallax section -->
    <div class="parallaxed">
        <div class="parallax-image" data-parallax-left="0.5" data-parallax-top="0.3" data-parallax-scroll-speed="0.5">
            <img src="/img/parallax.png" alt="">
        </div>
        <div class="them-mask bg-color-2"></div>
        <div class="grid-row center-text">
            <div class="font-style-1 margin-none">Get In Touch With Us</div>
            <div class="divider-mini"></div>
            <p class="parallax-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
            <form class="subscribe" method="post" action="{{ url('/Subscribe') }}" data-link="{{ url('/Subscribe') }}"  data-token="{{ csrf_token() }}">
                {{ csrf_field() }}
                <input type="text" name="email" id="submail" value="" size="40" placeholder="Enter your email" aria-required="true">
                <input type="submit" value="Subscribe" id="subscribe">
                <div class="alert alert-danger" id="errorform" style="display: none;">
                    <p>ایمیل شما معتبر نمیباشد</p>
                </div>
                <div class="alert alert-danger" id="errorform1" style="display: none;">
                    <p>شما قبلا عضو شده اید</p>
                </div><div class="alert alert-danger" id="errorform2" style="display: none;">
                    <p>ارتباط با سرور قطع شده است .</p>
                </div><div class="alert alert-success" id="successform" style="display: none;">
                    <p>موفقیت آمیز بود . باتشکر از همراهی شما دوست عزیز !</p>
                </div>
            </form>

        </div>
    </div>
    <!-- parallax section -->
    <!-- section -->
    <section class="grid-row clear-fix padding-section">
        <h2 class="center-text">Our Teachers</h2>
        <?php $counter = 1; ?>
        <div class="grid-col-row">
            @foreach ($teachers->chunk(2) as $chunkedTeachers)
                <div class="grid-col grid-col-6">
                    @foreach ($chunkedTeachers as $item)
                        <!-- instructor item -->
                            <div class="item-instructor <?php echo "bg-color-".$counter; ?>">
                                <a href="/page-profile.html" class="instructor-avatar">
                                    <img src="/pic/210x220-img-1.jpg" alt>
                                </a>
                                <div class="info-box">
                                    <h3>{{$item->name}}</h3>
                                    <span class="instructor-profession">{{$item->occupation}}</span>
                                    <div class="divider"></div>
                                    <p>{{$item->introduction}}</p>
                                    <div class="social-link">
                                     <a href="{{$item->linkedin}}" class="fa fa-linkedin"></a>
                                     <a href="{{$item->instagram}}" class="fa fa-instagram"></a>
                                     <a href="{{$item->github}}" class="fa fa-github"></a>
                                    </div>
                                </div>
                            </div>
                            <!-- / instructor item -->
                            <?php if($counter==6){$counter=1;}else{$counter++;} ?>
                    @endforeach
                    <br>
                </div>
            @endforeach
        </div>
    </section>
    <!-- / section -->
    <hr class="divider-color" />
    <!-- section -->
    <section class="padding-section">
        <div class="grid-row clear-fix">
            <div class="grid-col-row">
                <div class="grid-col grid-col-6">
                    <div class="video-player">
                        <iframe src="/https://www.youtube.com/embed/rZsH88zNxRw"></iframe>
                    </div>
                </div>
                <div class="grid-col grid-col-6 clear-fix">
                    <h2>Learn More About Us From Video</h2>
                    <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis justo at susp. Vivamus orci urna, ornare vitae tellus in, condimentum imperdiet eros. Maecea accumsan, massa nec vulputate congue.</p>
                    <p>Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.</p>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <a href="/page-about-us.html" class="cws-button bt-color-3 border-radius alt icon-right float-right">Watch More<i class="fa fa-angle-left"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- / section -->
    <!-- parallax section -->
    <div class="parallaxed">
        <div class="parallax-image" data-parallax-left="0.5" data-parallax-top="0.3" data-parallax-scroll-speed="0.5">
            <img src="/img/parallax.png" alt="">
        </div>
        <div class="them-mask bg-color-3"></div>
        <div class="grid-row center-text">
            <!-- twitter -->
            <div class="twitter-1"></div>
            <!-- / twitter -->
        </div>
    </div>
    <!-- parallax section -->
    <!-- section -->
    <section class="padding-section">
        <div class="grid-row clear-fix">
            <h2 class="center-text">Community Life</h2>
            <div class="grid-col-row">
                <div class="grid-col grid-col-4">
                    <div class="community color-1">
                        <h3>Events</h3>
                        <div class="community-logo">
                            <i class="flaticon-calendar"></i>
                        </div>
                        <div class="info-block">
                            <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis. Aliquam lorem ante, dapibus in.</p>
                        </div>
                    </div>
                </div>
                <div class="grid-col grid-col-4">
                    <div class="community">
                        <h3>Blog</h3>
                        <div class="community-logo">
                            <i class="flaticon-pencil"></i>
                        </div>
                        <div class="info-block">
                            <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis. Aliquam lorem ante, dapibus in.</p>
                        </div>
                    </div>
                </div>
                <div class="grid-col grid-col-4">
                    <div class="community color-2">
                        <h3>Publishers</h3>
                        <div class="community-logo">
                            <i class="flaticon-book1"></i>
                        </div>
                        <div class="info-block">
                            <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis. Aliquam lorem ante, dapibus in.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / section -->
    <hr class="divider-color" />
    <!-- section -->
    <section class="fullwidth-background testimonial padding-section">
        <div class="grid-row">
            <h2 class="center-text">Testimonials</h2>
            <div class="owl-carousel testimonials-carousel">
                <div class="gallery-item">
                    <div class="quote-avatar-author clear-fix"><img src="/pic/94x94-img-1.jpg" alt=""><div class="author-info">Karl Doe<br><span>Writer</span></div></div>
                    <p>Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. </p>
                </div>
                <div class="gallery-item">
                    <div class="quote-avatar-author clear-fix"><img src="/pic/94x94-img-1.jpg"  alt=""><div class="author-info">Karl Doe<br><span>Writer</span></div></div>
                    <p>Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. </p>
                </div>
                <div class="gallery-item">
                    <div class="quote-avatar-author clear-fix"><img src="/pic/94x94-img-1.jpg"  alt=""><div class="author-info">Karl Doe<br><span>Writer</span></div></div>
                    <p>Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. </p>
                </div>
            </div>
        </div>
    </section>
    <!-- / section -->
</div>
<!-- / content -->
<!-- footer -->
@include('footer')
<!-- / footer -->

<!--<script src="/js/jquery.min.js"></script>-->
<script src="/js/jquery.min.js"></script>

<script type="text/javascript" src="/http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="/../../google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox_packed.html"></script>
<script type='text/javascript' src='/js/jquery.validate.min.js'></script>
<script src="/js/jquery.form.min.js"></script>
<script src="/js/TweenMax.min.js"></script>
<script type="text/javascript" src="/js/slick.min.js"></script>
<!-- jQuery REVOLUTION Slider  -->
<script type="text/javascript" src="/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="/js/jquery.isotope.min.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/jquery-ui.min.js"></script>
<script src="/js/jflickrfeed.min.js"></script>
<script src="/js/jquery.tweet.js"></script>
<script src="/js/jquery.fancybox.pack.js"></script>
<script src="/js/jquery.fancybox-media.js"></script>
<script src="/js/retina.min.js"></script>

<!--Owl Carousel-->
<script src="/js/owl.carousel.js"></script>
<script src="/js/main.js"></script>
<script type="text/javascript" src="js/control.js"></script>

</body>

</html>