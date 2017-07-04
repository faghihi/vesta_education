<!DOCTYPE HTML>
<html>

<head>
        <title>دومین دوره وستا کمپ</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <!-- style -->
        <link rel="shortcut icon" href="img/logo.ico">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="fi/flaticon.css">
        <link rel="stylesheet" href="css/main.css">
        <!--<link rel="stylesheet" type="text/css" href="tuner/css/colorpicker.css" />-->
        <!--<link rel="stylesheet" type="text/css" href="tuner/css/styles.css" />-->
        <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" />
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/Kimia.css">
        <!--Owl Carousel-->
        <link rel="stylesheet" href="css/docs.theme.custom.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <script src="js/jquery.min.js"></script>{{--
        <script src="js/owl.carousel.js"></script>
        <script src="js/owl.autoplay.js"></script>--}}


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

<!--start slider-->
<section id="demos">
    <div class="columns-row">
        <div class="columns-col-12 columns-col">
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <img src="/images/MainPage-Slider/vesta-intro.jpg">
                </div>
                <div class="item">
                    <img src="/images/MainPage-Slider/first-slider-vestak.jpg">
                </div>
                {{--<div class="item">--}}
                    {{--<img src="/images/MainPage-Slider/second-slider-vestak.jpg">--}}
                {{--</div>--}}
                <div class="item">
                    <img src="/images/MainPage-Slider/third-slider-vestak.jpg">
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        var owlDemo = $('#demos .owl-carousel');
        $(owlDemo).owlCarousel({
            items: 1,
            pagination : true,
            autoPlay: true,/*
            autoPlaySpeed: 1000,*/
            autoplayTimeout: 5000,
            autoplayHoverPause: false
        });
    })
</script>
<!--end slider-->


<hr class="divider-color">

<!-- content -->
<div id="home" class="page-content padding-none">

    <!-- #search-form #start  -->
    <section class="search-form">
        <div class="container grid-row clear-fix">
            {{--<h2 class="center-text">Emerge yourself by learning new Skills</h2>--}}
            <h2 class="center-text">دومین دوره وستا کمپ در فضایی جدید</h2>
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

            <aside class="widget-search clear-fix">
                <form method="get" action="{{ url('/Search') }}" class="search-form" >
                    <label style="direction: rtl">
                        <span class="screen-reader-text">جستجو برای:</span>
                        <input type="search" name="search" class="search-field main-search" placeholder="امروز چه می خواهید یاد بگیرید ..." value="" title="جستجو برای:">
                    </label>
                    <input type="submit" class="search-submit" value="جستجو">
                </form>
            </aside>

            <section class="banners">
                <!--<h2>Banners</h2>-->
                <div class="clear-fix">
                    <div class="grid-col-row">
                        <div class="grid-col grid-col-3">
                            <!-- banner alt -->
                            <div class="category-button left-one">
                                <i class="fa fa-user"></i>
                                <p> بیش از ۴۰۰ ثبت نام در کمپ اول</p>
                            </div>
                            <!-- banner alt -->
                        </div>
                        <div class="grid-col grid-col-3">
                            <!-- banner alt -->
                            <div class="category-button left-three">
                                <i class="fa  fa-graduation-cap"></i>
                                <p>بیش از ۳۰ موضوع آموزشی</p>
                            </div>
                            <!-- / banner alt -->
                        </div>
                        <div class="grid-col grid-col-3">
                            <!-- banner alt -->
                            <div class="category-button left-two">
                                <i class="fa  fa-building"></i>
                                <p>همکاری با سازمان های معتبر</p>
                            </div>
                            <!-- / banner alt -->
                        </div>
                        <div class="grid-col grid-col-3">
                            <!-- banner alt -->
                            <div class="category-button left-four">
                                <i class="fa  fa-book"></i>
                                <p>مدرسین مجرب و حرفه ای</p>
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
    <section class="fullwidth-background container">
        <h2 class="center-text">دسته بندی ها</h2>
        <?php $i=0 ?>
        <div class="category-responsive grid-col-row clear-fix ">
            <div class="grid-col grid-col-6">
                <!-- banner -->
                @if(isset($categories[$i]))
                    <div class="banner-offer icon-right bg-color-4 cat-left-first">
                        <a href="courses-grid/category/{{$categories[$i]->id}}">
                            <h3 style="margin-top: 20px; margin-bottom: 20px;">{{$categories[$i]->name}}</h3>
                            <p>
                                {!! $categories[$i]->description !!}
                            </p>
                        </a>
                    </div>
                @endif
                <!-- / banner -->
                @if(isset($categories[$i+1]))
                <!-- banner -->
                    <div class="banner-offer icon-right bg-color-2 cat-left-second">
                        <a href="courses-grid/category/{{$categories[$i+1]->id}}">
                            <h3 style="margin-top: 20px; margin-bottom: 20px;">{{$categories[$i+1]->name}}</h3>
                            <p>
                                {!! $categories[$i+1]->description !!}
                            </p>
                        </a>
                    </div>
                <!-- / banner -->
                @endif
            </div>
            <div class="grid-col grid-col-6">
                @if(isset($categories[$i+2]))
                <!-- banner -->
                    <div class="banner-offer icon-right bg-color-3 cat-right-first">
                        <a href="courses-grid/category/{{$categories[$i+2]->id}}">
                            <h3 style="margin-top: 20px; margin-bottom: 20px;">{{$categories[$i+2]->name}}</h3>
                            <p>
                                {!! $categories[$i+2]->description !!}
                            </p>
                        </a>
                    </div>
                <!-- / banner -->
                @endif
                @if(isset($categories[$i+3]))
                <!-- banner -->
                    <div class="banner-offer icon-right bg-color-2 cat-right-sub1">
                        <a href="courses-grid/category/{{$categories[$i+3]->id}}">
                            <h3 style="margin-top: 20px; margin-bottom: 20px;">{{$categories[$i+3]->name}}</h3>
                            <p>
                                {!! $categories[$i+3]->description !!}
                            </p>
                        </a>
                    </div>
                <!-- / banner -->
                @endif
                @if(isset($categories[$i+4]))
                <!-- banner -->
                    <div class="banner-offer icon-right bg-color-5alt cat-right-sub2">
                        <a href="courses-grid/category/{{$categories[$i+4]->id}}">
                            <h3 style="margin-top: 20px; margin-bottom: 20px;">{{$categories[$i+4]->name}}</h3>
                            <p>
                                {!! $categories[$i+4]->description !!}
                            </p>
                        </a>
                    </div>
                <!-- / banner -->
                @endif
                @if(isset($categories[$i+5]))
                    <div class="banner-offer icon-right bg-color-1alt cat-right-second">
                        <a href="courses-grid/category/{{$categories[$i+5]->id}}">
                            <h3 style="margin-top: 20px; margin-bottom: 20px;">{{$categories[$i+5]->name}}</h3>
                            <p>
                                {!! $categories[$i+5]->description !!}
                            </p>
                        </a>
                    </div>
                @endif
            </div>
            <?php $count=0; ?>
        @for($i=6;$i<count($categories);$i+=2)
            @if(isset($categories[$i]))
                <div class="grid-col grid-col-6">
                    <!-- banner -->
                        <div class="banner-offer icon-right bg-color-{{$count%3 + 4}} cat-right-second">
                            <a href="courses-grid/category/{{$categories[$i]->id}}">
                                <h3 style="margin-top: 20px; margin-bottom: 20px;">{{$categories[$i]->name}}</h3>
                                <p>
                                    {!! $categories[$i]->description !!}
                                </p>
                            </a>
                        </div>
                </div>
            @endif
            @if(isset($categories[$i+1]))
            <div class="grid-col grid-col-6">
                <!-- banner -->
                <div class="banner-offer icon-right bg-color-{{$count%4 + 3}} cat-right-second">
                        <a href="courses-grid/category/{{$categories[$i+1]->id}}">
                            <h3 style="margin-top: 20px; margin-bottom: 20px;">{{$categories[$i+1]->name}}</h3>
                            <p>
                                {!! $categories[$i+1]->description !!}
                            </p>
                        </a>
                    </div>
                    <!-- / banner -->
            </div>
            @endif
            <?php $count++; ?>
        @endfor
        </div>
    </section>
    <!-- / Categories-->
    <hr class="divider-color" />

    <!-- Latest Courses-->
    <section class="padding-section">
        <div class="grid-row clear-fix">
            <h2 class="center-text">جدید ترین دوره ها</h2>
            <div class="grid-col-row">
                <?php $course_count=0;?>
                @foreach($recent_courses as $course)
                <div class="grid-col grid-col-4">
                    <!-- course item -->
                    <div class="course-item" style="margin-bottom: 30px">
                        <div class="course-hover">
                            <?php $img='/pic/sampleback.jpg'?>
                            @if(isset($course->image))
                                <?php $img=Voyager::image($course->image)?>
                            @endif
                            <img src="{{$img}}" alt>
                            <div class="hover-bg bg-color-{{$course_count%6 + 1}}"></div>
                            {{--<a href="/#">Learn More {{$course_count}}</a>--}}
                            <a href="/courses-grid/{{$course->id}}">بیشتر ...</a>
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
                            <h3><a href="/#">{{$course->course->name}}</a></h3>
                        </div>
                        <div class="course-date bg-color-{{$course_count%6 + 1}} clear-fix">
                            <div class="day" style="direction: rtl"><i class="fa fa-calendar"></i>{{$course->start_date}}</div>
                            <div class="time"><i class="fa fa-clock-o"></i>{{$course['duration']}}&nbsp;ساعت</div>
                            <div class="divider"></div>
                            <div class="description"><p>{{$course->course->introduction }}</p></div>
                        </div>
                    </div>
                    <!-- / course item -->
                </div>
                    <?php $course_count++?>
                @endforeach
                 </div>
            <nav  style="display: block;text-align:center">
                {{--{{$recent_courses->links()}}--}}
            </nav>

        </div>
    </section>
    <!-- / Latest Courses-->

    {{--<hr class="divider-color" />--}}

    {{--<!-- section -->--}}
    {{--<section class="fullwidth-background padding-section">--}}
        {{--<div class="grid-row clear-fix">--}}
            {{--<div class="grid-col-row">--}}
                {{--<div class="grid-col grid-col-6">--}}
                    {{--<a href="/#" class="service-icon"><i class="flaticon-pie"></i></a>--}}
                    {{--<a href="/#" class="service-icon"><i class="flaticon-medical"></i></a>--}}
                    {{--<a href="/#" class="service-icon"><i class="flaticon-restaurant"></i></a>--}}
                    {{--<a href="/#" class="service-icon"><i class="flaticon-website"></i></a>--}}
                    {{--<a href="/#" class="service-icon"><i class="flaticon-hotel"></i></a>--}}
                    {{--<a href="/#" class="service-icon"><i class="flaticon-web-programming"></i></a>--}}
                    {{--<a href="/#" class="service-icon"><i class="flaticon-camera"></i></a>--}}
                    {{--<a href="/#" class="service-icon"><i class="flaticon-speech"></i></a>--}}
                {{--</div>--}}
                {{--<div class="grid-col grid-col-6 clear-fix">--}}
                    {{--<h2>خدمات ما</h2>--}}
                    {{--<p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis justo at susp. Vivamus orci urna, ornare vitae tellus in, condimentum imperdiet eros. Maecea accumsan, massa nec vulputate congue. Maecenas nec odio et ante tincidunt creptus alarimus tempus.</p>--}}
                    {{--<a href="/#" class="cws-button bt-color-3 border-radius alt icon-right float-right">بیشتر بدانید<i class="fa fa-angle-left"></i></a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
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
                        <i class="flaticon-pencil"></i>
                        <div class="counter" data-count="{{$count_pack}}">{{$count_pack}}</div>
                        <div class="counter-name">بسته ها</div>
                    </div>
                </div>
                <div class="grid-col grid-col-3 alt">
                    <div class="counter-block">
                        <i class="flaticon-book1"></i>
                        <div class="counter" data-count="{{$count_course}}">{{$count_course}}</div>
                        <div class="counter-name">دوره ها</div>
                    </div>
                </div>
                <div class="grid-col grid-col-3 alt">
                    <div class="counter-block">
                        <i class="flaticon-multiple"></i>
                        <div class="counter" data-count="{{$count_student}}">{{$count_student}}</div>
                        <div class="counter-name">دانشجویان</div>
                    </div>
                </div>
                <div class="grid-col grid-col-3 alt">
                    <div class="counter-block last">
                        <i class="flaticon-calendar"></i>
                        <div class="counter" data-count="{{$count_teacher}}">{{$count_teacher}}</div>
                        <div class="counter-name">اساتید</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / paralax section -->
    <!-- section -->
    <section class="fullwidth-background padding-section">
        <div class="grid-row">
            <h2 class="center-text">نحوه ی کار</h2>
            <!-- time line -->
            <div class="time-line">
                <div class="line-element">
                    <div class="action">
                        <div class="action-block">
                            <span><i class="flaticon-magnifier"></i></span>
                            <div class="text">
                                <h3>ثبت نام در کلاس</h3>
                                <p>اگر میخواهید مهارتی را به طور کامل و کاربردی یاد بگیرید فرصت ثبت نام در کلاس های کارگاهی را دارید.</p>
                            </div>
                        </div>
                    </div>
                    <div class="level">
                        <div class="level-block">مرحله اول</div>
                    </div>
                </div>
                <div class="line-element color-2">
                    <div class="level">
                        <div class="level-block">مرحله اول- نوع دیگر</div>
                    </div>
                    <div class="action">
                        <div class="action-block">
                            <span><i class="flaticon-computer"></i></span>
                            <div class="text">
                                <h3>ثبت نام در بسته ها </h3>
                                <p>اگر میخواهید یک مهارت و تمام مهارت های وابسته به آن را یک جا یاد بگیرید اینجا برای صرفه جویی در هزینه ها مناسب ترین محل خواهد بود</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line-element color-3">
                    <div class="action">
                        <div class="action-block">
                            <span><i class="flaticon-shopping"></i></span>
                            <div class="text">
                                <h3>ساخت پروفایل و معرفی به شرکت ها </h3>
                                <p>اگر نیاز به کارآموزی داشته باشی به کارآموزی فرستاده میشی و اگه دانشت کافی باشه برای استخدام در شرکت ها معرفی میشی</p>
                            </div>
                        </div>
                    </div>
                    <div class="level">
                        <div class="level-block">مرحله دوم</div>
                    </div>
                </div>
            </div>
            <!-- / time line -->
        </div>
    </section>
    <!-- / paralax section -->
    <hr class="divider-color"/>
    <!-- paralax section -->
    <section class="padding-section">
        <div class="grid-row clear-fix">
            <h2 class="center-text">سوالات متداول </h2>
            <div class="grid-col-row">
                <div class="grid-col grid-col-6">
                    <h3>چرا وستا کمپ متفاوت است؟</h3>
                    <p>وستا کمپ همانند سایر کلاس های آموزشی یا کمپ های مشابه صرفا یک فضای آموزشی محسوب نمیشود بلکه یک فضای پویا جهت یادگیری است که با پشتیبانی سازمان های همکار قدم به تولید نیروی متخصص بازار کار و همچنین تقویت دانش موجود نموده است. قطعا تجربه این فضا برای شما یک تجربه جدید خواهد بود تا طعم لذت بخش یادگیری با متد های تحقیق شده اروپایی را از نزدیک بچشید. </p>
                    <!-- accordions -->
                    <div class="accordions">
                        <!-- content-title -->
                        <div class="content-title active">محل برگزاری کلاس ها </div>
                        <!--/content-title -->
                        <!-- accordions content -->
                        <div class="content">محل برگزاری کلاس ها به طور مشترک در دانشگاه صنعتی امیرکبیر تهران و دانشگاه علمی و کاربردی میباشد.</div>
                        <!--/accordions content -->
                        <!-- content-title -->
                        <div class="content-title">اساتید دوره ها چه کسانی هستند ؟</div>
                        <!--/content-title -->
                        <!-- accordions content -->
                        <div class="content">اساتید دوره ها بهترین افراد مشغول در زمینه مرتبط با دوره هستند که اتفاقا سوابق آموزشی فراوانی نیز در کارنامه شان دیده میشود و ترکیب مهارت فنی و آموزشی این اساتید آن ها را مجزا از سایرین خواهد کرد.</div>
                        <!--/accordions content -->
                        <!-- content-title -->
                        <div class="content-title">هسته اصلی وستاکمپ از کجاست؟</div>
                        <!--/content-title -->
                        <!-- accordions content -->
                        <div class="content">هسته اصلی وستا کمپ از دانشگاه صنعتی امیرکبیر ، شریف و تهران است که با جمع آوری بهترین ها و تحقیق روی متد های جدید بهترین را برای شما در تدارک دارد.</div>
                        <!--/accordions content -->
                        <!-- content-title -->
                        <div class="content-title">آیا وستا کمپ فقط آموزش است ؟</div>
                        <!--/content-title -->
                        <!-- accordions content -->
                        <div class="content">وستا کمپ فرآیندی جهت حمایت شما از مرحله آموزش و یادگیری تا مرحله کسب درآمد است و تمامی کلاس ها خارج از زمان آموزشی شد دارای کارگاه های متعدد و همچنین بعضا دارای فرصت های کارآموزی نیز هستند.</div>
                        <!--/accordions content -->
                    </div>
                    <!--/accordions -->
                    <a href="/about" class="cws-button bt-color-3 border-radius alt icon-right">درباره ی ما بدانید<i class="fa fa-angle-left"></i></a>
                </div>
                <div class="grid-col grid-col-6 FAQ-slider ">
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
            <div class="font-style-1 margin-none">هیچ فرصتی را از دست ندهید</div>
            <div class="divider-mini"></div>
            <p class="parallax-text">با عضویت در خبرنامه وستاکمپ بهترین فرصت های تخفیف و همچنین فرصت های فوق العاده کاری را دریافت نمایید و همواره ارتباطتان را حفظ نمایید.</p>
            <form class="subscribe">
                <input type="text" name="email" id="submail" size="40" placeholder="ایمیل خود را وارد نمایید" aria-required="true">
                <input type="button" id="subscribe" data-link="{{ url('/Subscribe') }}"  data-token="{{ csrf_token() }}" class="btn btn-submit" value="عضویت در خبرنامه">
                <div class="alert alert-danger" id="errorform" style="display: none;margin: 5px">
                    <p>ایمیل شما معتبر نمیباشد</p>
                </div>
                <div class="alert alert-danger" id="errorform1" style="display: none;margin: 5px">
                    <p>شما قبلا عضو شده اید</p>
                </div>
                <div class="alert alert-danger" id="errorform2" style="display: none;margin: 5px">
                    <p>ارتباط با سرور قطع شده است .</p>
                </div>
                <div class="alert alert-success" id="successform" style="display: none;margin: 5px">
                    <p>موفقیت آمیز بود . باتشکر از همراهی شما دوست عزیز !</p>
                </div>
            </form>

        </div>
    </div>
    <!-- parallax section -->
    <!-- section -->
    <section class="grid-row clear-fix padding-section">
        <h2 class="center-text">برخی اساتید </h2>
        <?php $counter = 1; ?>
        <div class="grid-col-row">
            @foreach ($teachers->chunk(2) as $chunkedTeachers)
                <div class="grid-col grid-col-6">
                    @foreach ($chunkedTeachers as $item)
                        <!-- instructor item -->
                            <div class="item-instructor <?php echo "bg-color-".$counter; ?>">
                                <a href="/teachers/{{$item->id}}" class="instructor-avatar">
                                    <?php $img='/pic/210x220-img-3.jpg'?>
                                    @if(isset($item->image))
                                        <?php $img=Voyager::image($item->image)?>
                                    @endif
                                    <img src="{{$img}}" alt>
                                </a>
                                <div class="info-box">
                                    <?php $img='/pic/210x220-img-3.jpg'?>
                                    @if(isset($item->image))
                                        <?php $img=Voyager::image($item->image)?>
                                    @endif
                                    <img src="{{$img}}" alt>
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
    {{--<section class="padding-section">--}}
        {{--<div class="grid-row clear-fix">--}}
            {{--<div class="grid-col-row">--}}
                {{--<div class="grid-col grid-col-6">--}}
                    {{--<div class="video-player">--}}
                        {{--<iframe src="/https://www.youtube.com/embed/rZsH88zNxRw"></iframe>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="grid-col grid-col-6 clear-fix">--}}
                    {{--<h2>Learn More About Us From Video</h2>--}}
                    {{--<p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis justo at susp. Vivamus orci urna, ornare vitae tellus in, condimentum imperdiet eros. Maecea accumsan, massa nec vulputate congue.</p>--}}
                    {{--<p>Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.</p>--}}
                    {{--<br/>--}}
                    {{--<br/>--}}
                    {{--<br/>--}}
                    {{--<br/>--}}
                    {{--<a href="/page-about-us.html" class="cws-button bt-color-3 border-radius alt icon-right float-right">Watch More<i class="fa fa-angle-left"></i></a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    <!-- / section -->
    <!-- parallax section -->
    <div class="parallaxed">
        <div class="parallax-image" data-parallax-left="0.5" data-parallax-top="0.3" data-parallax-scroll-speed="0.5">
            <img src="/img/parallax.png" alt="">
        </div>
        <div class="them-mask bg-color-3"></div>
        <div class="grid-row center-text">
            <!-- twitter -->
            <div style="color:white">
                برای بهره مندی از تخفیفات بسیار مناسب برای قشر های مختلف علاقه مندان حتما به کانال و اینستاگرام ما مراجعه کنید
                <br>
                <a href="http://t.me/vestacamp" style="color: blue/*; text-decoration: underline*/">پیوستن به کانال تلگرام </a>
               و
                <a href="http://instagram.com/vestacamp.ir" style="color: red; /*text-decoration: underline*/">پیسوتن به صفحه اینستاگرام</a>
            </div>
            <!-- / twitter -->
        </div>
    </div>
    <!-- parallax section -->
    <!-- section -->
    <section class="padding-section">
        <div class="grid-row clear-fix">
            <h2 class="center-text">فعالیت اجتماعی</h2>
            <div class="grid-col-row">
                <div class="grid-col grid-col-4">
                    <div class="community color-1">
                        <h3>مراسم بزرگداشت</h3>
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
                        <h3>بلاگ</h3>
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
                        <h3>صفحات اجتماعی</h3>
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
            <h2 class="center-text">نظرات</h2>
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

    {{--<section class="padding-section">
        <div class="grid-row clear-fix">
            <div class="grid-col-row">
                <div class="grid-col grid-col-1">
                    <h2>پیشنهادات ما</h2>
                    <p>قطعا یادگیری های دانشگاهی و یا حتی کلاس های آموزشی مهارتی که صرفا به شما توضیحاتی در مورد مهارت میدهند و یا از شما نمیخواهند در طول کلاس و یا خارج از کلاس ایرادات خود را در حین آموزش برطرف نمایید و یا مشغول کار شوید در نهایت سودی را برای شما نخواهند داشت . پیشنهاد ما استفاده از بهترین خدمات موجود در زمینه آموزش همراه با وستا کمپ هست تا در کنار توضیحات مهارت های مورد بحث را به دست نیز بیاورید.</p>

                </div>
                <div class="carousel-container">
                    <div class="title-carousel">
                        <h2>اساتید درس فلان</h2>
                        <div class="carousel-nav">
                            <div class="carousel-button">
                                <div class="prev"><i class="fa fa-angle-left"></i></div>
								 <div class="next"><i class="fa fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="grid-col-row left-margin-none">
                        <div class="owl-carousel owl-four-items" >
                            <div class="owl-item">
                                <div class="item-instructor bg-color-2">
                                    <a href="page-profile.html" class="instructor-avatar">
                                        <img src="pic/210x220-img-2.jpg" alt>
                                    </a>
                                    <div class="info-box">
                                        <h3>John Doe</h3>
                                        <span class="instructor-profession">Lecturer of Design</span>
                                        <div class="divider"></div>
                                        <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis.</p>
                                        <div class="social-link"><!--
												 --><a href="#" class="fa fa-facebook"></a><!--
												 --><a href="#" class="fa fa-google-plus"></a><!--
												 --><a href="#" class="fa fa-twitter"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item">
                                <div class="item-instructor bg-color-3">
                                    <a href="page-profile.html" class="instructor-avatar">
                                        <img src="pic/210x220-img-4.jpg"  alt>
                                    </a>
                                    <div class="info-box">
                                        <h3>Jessy Doe</h3>
                                        <span class="instructor-profession">Professor of Methematic</span>
                                        <div class="divider"></div>
                                        <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis.</p>
                                        <div class="social-link"><!--
												 --><a href="#" class="fa fa-facebook"></a><!--
												 --><a href="#" class="fa fa-google-plus"></a><!--
												 --><a href="#" class="fa fa-twitter"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item">
                                <div class="item-instructor bg-color-1">
                                    <a href="page-profile.html" class="instructor-avatar">
                                        <img src="pic/210x220-img-1.jpg" alt>
                                    </a>
                                    <div class="info-box">
                                        <h3>Jenny Doe</h3>
                                        <span class="instructor-profession">Professor of Methematic</span>
                                        <div class="divider"></div>
                                        <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis.</p>
                                        <div class="social-link"><!--
												 --><a href="#" class="fa fa-facebook"></a><!--
												 --><a href="#" class="fa fa-google-plus"></a><!--
												 --><a href="#" class="fa fa-twitter"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item">
                                <div class="item-instructor bg-color-6">
                                    <a href="page-profile.html" class="instructor-avatar">
                                        <img src="pic/210x220-img-5.jpg" alt>
                                    </a>
                                    <div class="info-box">
                                        <h3>Jenny Doe</h3>
                                        <span class="instructor-profession">Professor of Methematic</span>
                                        <div class="divider"></div>
                                        <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis.</p>
                                        <div class="social-link"><!--
												 --><a href="#" class="fa fa-facebook"></a><!--
												 --><a href="#" class="fa fa-google-plus"></a><!--
												 --><a href="#" class="fa fa-twitter"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>--}}
    <!-- / paralax section -->

    <section class="padding-section our-colleagues">
        <div class="carousel-container grid-row clear-fix">
            <div class="title-carousel">
                <h2>همکاران ما</h2>
                <div class="carousel-nav">
                    <div class="carousel-button">
                        <div class="prev"><i class="fa fa-angle-left"></i></div>
                        <div class="next"><i class="fa fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="grid-col-row left-margin-none">
                <div class="owl-carousel owl-four-items">
                    <div class="gallery-item course-item">
                        <div class="popular-item">
                            <div class="picture">
                                <div class="hover-effect"></div>
                                <div class="link-cont">
                                    <a href="#" class="fancy fa fa-search" title="اطلاعات بیشتر"></a>
                                </div>
                                <img src="pic/270x200-img-2.jpg" alt>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-item course-item">
                        <div class="popular-item">
                            <div class="picture">
                                <div class="hover-effect"></div>
                                <div class="link-cont">
                                    <a href="#" class="fancy fa fa-search" title="اطلاعات بیشتر"></a>
                                </div>
                                <img src="pic/270x200-img-4.jpg" alt>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-item course-item">
                        <div class="popular-item">
                            <div class="picture">
                                <div class="hover-effect"></div>
                                <div class="link-cont">
                                    <a href="#" class="fancy fa fa-search" title="اطلاعات بیشتر"></a>
                                </div>
                                <img src="pic/270x200-img-5.jpg" alt>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-item course-item">
                        <div class="popular-item">
                            <div class="picture">
                                <div class="hover-effect"></div>
                                <div class="link-cont">
                                    <a href="#" class="fancy fa fa-search" title="اطلاعات بیشتر"></a>
                                </div>
                                <img src="pic/270x200-img-1.jpg" alt>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-item course-item">
                        <div class="popular-item">
                            <div class="picture">
                                <div class="hover-effect"></div>
                                <div class="link-cont">
                                    <a href="#" class="fancy fa fa-search" title="اطلاعات بیشتر"></a>
                                </div>
                                <img src="pic/270x200-img-2.jpg" alt>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-item course-item">
                        <div class="popular-item">
                            <div class="picture">
                                <div class="hover-effect"></div>
                                <div class="link-cont">
                                    <a href="#" class="fancy fa fa-search" title="اطلاعات بیشتر"></a>
                                </div>
                                <img src="pic/270x200-img-2.jpg" alt>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-item course-item">
                        <div class="popular-item">
                            <div class="picture">
                                <div class="hover-effect"></div>
                                <div class="link-cont">
                                    <a href="#" class="fancy fa fa-search" title="اطلاعات بیشتر"></a>
                                </div>
                                <img src="pic/270x200-img-4.jpg" alt>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-item course-item">
                        <div class="popular-item">
                            <div class="picture">
                                <div class="hover-effect"></div>
                                <div class="link-cont">
                                    <a href="#" class="fancy fa fa-search" title="اطلاعات بیشتر"></a>
                                </div>
                                <img src="pic/270x200-img-5.jpg" alt>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-item course-item">
                        <div class="popular-item">
                            <div class="picture">
                                <div class="hover-effect"></div>
                                <div class="link-cont">
                                    <a href="#" class="fancy fa fa-search" title="اطلاعات بیشتر"></a>
                                </div>
                                <img src="pic/270x200-img-1.jpg" alt>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-item course-item">
                        <div class="popular-item">
                            <div class="picture">
                                <div class="hover-effect"></div>
                                <div class="link-cont">
                                    <a href="#" class="fancy fa fa-search" title="اطلاعات بیشتر"></a>
                                </div>
                                <img src="pic/270x200-img-2.jpg" alt>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<!-- / content -->
<!-- footer -->
@include('footer')
<!-- / footer -->


<!--<script src="js/jquery.min.js"></script>-->
<script src="js/jquery.min.js"></script>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="../../google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox_packed.html"></script>
<script type='text/javascript' src='js/jquery.validate.min.js'></script>
<script src="js/jquery.form.min.js"></script>
<script src="js/TweenMax.min.js"></script>
<script src="js/main.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<!-- jQuery REVOLUTION Slider  -->
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jflickrfeed.min.js"></script>
<script src="js/jquery.tweet.js"></script>
<!--<script type='text/javascript' src='tuner/js/colorpicker.js'></script>-->
<!--<script type='text/javascript' src='tuner/js/scripts.js'></script>-->
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>
<script src="js/retina.min.js"></script>
<script src="js/Kimia.js"></script>
<script src="js/control.js"></script>

<!--Owl Carousel-->

{{--<script src="js/owl.carousel.js"></script>--}}


</body>

</html>