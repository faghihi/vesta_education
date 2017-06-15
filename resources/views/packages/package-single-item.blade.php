<!DOCTYPE HTML>
<html>

<head>
    <title>UniLearn - Education and Courses Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <!-- style -->
    <link rel="shortcut icon" href="/img/favicon.png">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/select2.css">
    <link rel="stylesheet" href="/css/main.css">
    <!--<link rel="stylesheet" type="text/css" href="tuner/css/colorpicker.css" />-->
    <!--<link rel="stylesheet" type="text/css" href="tuner/css/styles.css" />-->
    <link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.css" />
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" href="/css/Shadi.css">
    <link rel="stylesheet" href="/css/Kimia.css">
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

    <!--styles -->
</head>
<body onload="initialize()">
<!-- page header -->
<header>
    <!-- header top pannel -->
    <div class="page-header-top">
        <div class="grid-row clear-fix">
            <address>
                <a href="tel:123-123456789" class="phone-number"><i class="fa fa-phone"></i>123-123456789</a>
                <a href="mailto:uni@domain.com" class="email"><i class="fa fa-envelope-o"></i>uni@domain.com</a>
            </address>
            <div class="header-top-panel">
                <a href="#" class="fa fa-shopping-cart" title="Shopping Cart"></a>
                <a href="/login" class="fa fa-user login-icon" title="Login"></a>
                <div id="top_social_links_wrapper" title="Share">
                    <div class="share-toggle-button"><i class="share-icon fa fa-share-alt"></i></div>
                    <div class="cws_social_links"><a href="https://plus.google.com/" class="cws_social_link" title="Google +"><i class="share-icon fa fa-google-plus" style="transform: matrix(0, 0, 0, 0, 0, 0);"></i></a><a href="http://twitter.com/" class="cws_social_link" title="Twitter"><i class="share-icon fa fa-twitter"></i></a><a href="http://facebook.com/" class="cws_social_link" title="Facebook"><i class="share-icon fa fa-facebook"></i></a><a href="http://dribbble.com/" class="cws_social_link" title="Dribbble"><i class="share-icon fa fa-dribbble"></i></a></div>
                </div>
                <a href="#" class="search-open" title="Search"><i class="fa fa-search"></i></a>
                <form action="#" class="clear-fix">
                    <input type="text" placeholder="Search" class="clear-fix">
                </form>
            </div>
        </div>
    </div>
    <!-- / header top pannel -->
    <!-- main menu -->
@include('header')
<!-- / main menu -->
    <!-- page title -->
    <div class="page-title">
        <div class="grid-row">
            <h1>بسته</h1>
            <!-- bread crumb -->
            <nav class="bread-crumb">
                <a href="/">خانه</a>
                <i class="fa fa-long-arrow-right"></i>
                <a href="/courses-grid">دوره ها</a>
                <i class="fa fa-long-arrow-right"></i>
                <a href="/courses-grid/{{$pack->id}}">{{$pack->title}}</a>
            </nav>
            <!-- / bread crumb -->
        </div>
    </div>
    <!-- / page title -->
</header>
<!-- page header -->
<!-- content -->
<div class="page-content">
    <!-- main content -->
    <main>
        <div class="container">
            <section class="clear-fix">

                    <div class="course-price-div">
                        <div class="course-price-inner-div">
                            <p class="course-price">
                                <span class="course-amount">
                                    {{$pack->price}} <span class="tooman">هزار تومان</span>
                                </span>
                            </p>
                        </div>
                    </div>
                {{--<div class="course-main-nav">--}}
                    {{--<div class="course-main-nav-inner">--}}
                                {{--<span class="cws-button bt-color-2 border-radius icon-left small course-time">--}}
                                    {{--<i class="fa fa-file-text-o"></i> سطح درس: <span>آسان</span>--}}
                                {{--</span>--}}

                        {{--<a href="#" class="cws-button bt-color-2 border-radius alt small">مجموعه بسته ها</a>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="single-course-more-info">
                    <div class="name" >
                    <h2>{{$pack->title}}</h2>
                        <div class="stars">
                            <form action="">

                                <input class="star star-5" id="star-5" type="radio" name="star"/>

                                <label class="star star-5" for="star-5"></label>

                                <input class="star star-4" id="star-4" type="radio" name="star"/>

                                <label class="star star-4" for="star-4"></label>

                                <input class="star star-3" id="star-3" type="radio" name="star"/>

                                <label class="star star-3" for="star-3"></label>

                                <input class="star star-2" id="star-2" type="radio" name="star"/>

                                <label class="star star-2" for="star-2"></label>

                                <input class="star star-1" id="star-1" type="radio" name="star"/>

                                <label class="star star-1" for="star-1"></label>

                            </form>

                        </div>
                    </div>
                    <button class="cws-button bt-color-1 border-radius alt large">خرید بسته<i class="fa fa-shopping-cart"></i></button>
                </div>

            </section>
            <hr class="divider-big">

            <!--intro-->

            <section class="clear-fix">
                <!-- tabs -->
                <div class="tabs single-course-description">
                    <div class="block-tabs-btn clear-fix">
                        <div class="tabs-btn active" data-tabs-id="tabs1">مشخصات
                            <!--<i class="fa fa-file fa-2x" aria-hidden="true"></i>-->
                        </div>
                        <div class="tabs-btn" data-tabs-id="tabs2">لیست درس های بسته</div>
                        <div class="tabs-btn" data-tabs-id="tabs3">اهداف</div>
                        <div class="tabs-btn" data-tabs-id="tabs4">شرایط</div>
                        <div class="tabs-btn" data-tabs-id="tabs5">پیشنیاز ها</div>
                        <div class="tabs-btn" data-tabs-id="tabs6">زمان و مکان دوره</div>
                    </div>
                    <!-- tabs keeper -->
                    <div class="tabs-keeper single-course-tabs-keeper">
                        <!-- tabs container -->
                        <div class="container-tabs active single-course-overview" data-tabs-id="cont-tabs1">
                            <!--<div class="single-course-overview-img">-->
                            <!--<h5>the teacher</h5>-->
                        <!--<img src="pic/75x75-img-1.jpg" data-at2x="pic/370x270-img-4@2x.jpg" alt>-->
                            <!--<span>the name of the poor thing</span>-->
                            <!--</div>-->
                            <div class="single-course-overview-text">
                                <p>
                                    <time datetime="2016-06-07T12:14:53+00:00">{{$pack->open_time}}</time>
                                    <span>تاریخ ارسال:</span>
                                </p>
                                <div>{{$pack->description}}</div>
                                <br />
                                <br />
                                <div class="single-course-overview-topics">
                                    <h4>مباحثی که خواهید دید: </h4>
                                    <?php
                                        $string = "line 1\nline 2\nline3";

                                        $bits = explode("\n", $pack->work_description);

                                        $newstring = "<ul>";
                                        foreach($bits as $bit)
                                        {
                                            $newstring .= "<li>" . $bit . "</li>";
                                        }
                                        $newstring .= "</ul>";
                                        echo $newstring;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!--/tabs container -->
                        <!-- tabs container -->
                        <div class="container-tabs package-single-item-courses" data-tabs-id="cont-tabs2">
                            <h4>درس هایی که خواهید دید : </h4>
                            <ul>
                                @foreach($courses as $course)
                                    <a href="/courses-grid/{{$course->id}}"><li>{{$course->name}}</li></a>
                                @endforeach
                            </ul>
                        </div>
                        <!--/tabs container -->
                        <!-- tabs container -->
                        <div class="container-tabs single-course-purpose" data-tabs-id="cont-tabs3">
                            <!--<div>-->
                            <h4>اهداف این درس: </h4>
                            <?php
                            $string = "line 1\nline 2\nline3";

                            $bits = explode("\n", $pack->goal);

                            $newstring = "<ul>";
                            foreach($bits as $bit)
                            {
                                $newstring .= "<li>" . $bit . "</li>";
                            }
                            $newstring .= "</ul>";
                            echo $newstring;
                            ?>
                            <!--</div>-->
                        </div>
                        <!--/tabs container -->
                        <!-- tabs container -->
                        <div class="container-tabs " data-tabs-id="cont-tabs4">
                            <h4>شرایط برگزاری دوره: </h4>
                            <?php
                            $string = "line 1\nline 2\nline3";

                            $bits = explode("\n", $pack->condition);

                            $newstring = "<ul>";
                            foreach($bits as $bit)
                            {
                                $newstring .= "<li>" . $bit . "</li>";
                            }
                            $newstring .= "</ul>";
                            echo $newstring;
                            ?>
                        </div>
                        <!--/tabs container -->
                        <!-- tabs container -->
                        <div class="container-tabs" data-tabs-id="cont-tabs5">
                            <h4>پیشنیاز‌های لازم برای دوره: </h4>
                            <?php
                            $string = "line 1\nline 2\nline3";

                            $bits = explode("\n", $pack->requirement);

                            $newstring = "<ul>";
                            foreach($bits as $bit)
                            {
                                $newstring .= "<li>" . $bit . "</li>";
                            }
                            $newstring .= "</ul>";
                            echo $newstring;
                            ?>
                        </div>
                        <!--/tabs container -->
                        <!-- tabs container -->
                        <div class="container-tabs single-course-time" data-tabs-id="cont-tabs6">
                            @foreach($courses as $course)
                            <div class="package-single-item-time">
                                <h3>{{$course->name}}</h3>
                                <div class="widget-event">
                                    <div class="grid-col grid-col-6">
                                        <article class="clear-fix">
                                            <h4>شروع دوره از:</h4>
                                            <?php

                                            $str = "12 January";
                                            $tempContents = preg_split("/[\s]+/", $course->pivot->start_date);
                                            //foreach($tempContents as $temp){
                                              //  echo '<br/>'.$temp;
                                            //}
                                            ?>
                                            <div class="date"><div class="day">{{$tempContents[0]}}</div><div class="month">{{$tempContents[1]}}</div></div>
                                            <div class="event-description"><span class="single-course-time-weekday">{{$course->pivot->time}}</span><p>با خودتان ناهار بیاورید.</p></div>
                                        </article>
                                        <br />

                                        <div class="single-course-place-div">
                                            <h4>محل برگزاری دوره:</h4>
                                            <div class="single-course-place">
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                <span>{{$course->pivot->location}}</span>
                                            </div>
                                        </div>
                                    </div>

                                    {{--<div class="map wow fadeInUp">--}}
                                        {{--<div id="map_canvas" class="google-map"></div>--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                            <br>
                            <hr class="divider-big">
                            @endforeach
                        </div>
                        <!--/tabs container -->

                    </div>
                    <!--/tabs keeper -->
                </div>
                <!-- /tabs -->
            </section>
            <!-- section gallery -->

            <section class="clear-fix">
                <div class="carousel-container single-course-teacher">
                    <div class="title-carousel">
                        <h2>مدرسان این بسته آموزشی</h2>
                        <div class="carousel-nav">
                            <div class="carousel-button">
                                <div class="prev"><i class="fa fa-angle-left"></i></div>
                                <div class="next"><i class="fa fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="grid-col-row left-margin-none">
                        <div class="owl-carousel owl-two-item">
                            @foreach($teachers as $teacher)
                                <div class="gallery-item">
                                    <div class="item-instructor bg-color-5">
                                        <a href="page-profile.html" class="instructor-avatar">
                                            <?php $img='/pic/210x220-img-6.jpg'?>
                                            @if(isset($teacher->image))
                                                <?php $img=$teacher->image?>
                                            @endif
                                            <img src="{{$img}}" data-at2x="/pic/210x220-img-5@2x.jpg" alt>
                                        </a>
                                        <div class="info-box">
                                            <h3>{{$teacher->name}}</h3>
                                            <span class="instructor-profession">{{$teacher->occupation}}</span>
                                            <div class="divider"></div>
                                            <p>{{$teacher->introduction}}</p>
                                            <div class="social-link">
                                                <a href="{{$teacher->linkedin}}" class="fa fa-linkedin"></a>
                                                <a href="{{$teacher->instagram}}" class="fa fa-instagram"></a>
                                                <a href="{{$teacher->github}}" class="fa fa-github"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>

            <!--<li class="dot"></li>-->

            <hr class="divider-big" />
            <br>
            <!-- comments for post -->
            <div class="comments single-course-comments">
                <div id="comments">
                    <div class="comment-title"><span><?php echo count($reviews)?></span> Comments</div>
                    <ol class="commentlist">
                        @foreach($reviews as $review)
                            <li class="comment">
                                <div class="comment_container clear">
                                    <?php $img="/pic/70x70-img-1.jpg"?>
                                    @if(isset($review->image))
                                        <?php $img=$teacher->image?>
                                    @endif
                                    <img src="{{$img}}" data-at2x="/pic/70x70-img-1@2x.jpg" alt="" class="avatar">
                                    <div class="comment-text">
                                        <p class="meta">
                                            <strong>{{$review->name}}</strong>
                                            <time datetime="2016-06-07T12:14:53+00:00">{{$review->pivot->created_at}}</time>
                                        </p>
                                        <div class="description">
                                            <p>{{$review->pivot->comment}}</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        <li class="comment">
                            <div class="comment_container clear">
                                <img src="/pic/70x70-img-1.jpg" data-at2x="/pic/70x70-img-1@2x.jpg" alt="" class="avatar">
                                <div class="comment-text">
                                    <p class="meta">
                                        <strong>Tom Doe</strong>
                                        <time datetime="2016-06-07T12:14:53+00:00"> / 2015.06.25 / 12:12</time>
                                    </p>
                                    <div class="description">
                                        <p>Vestibulum id nisl a neque malesuada hendrerit. Mauris ut porttitor nunc, ut volutpat nisl. Nam ullamcorper ultricies metus vel ornare. Vivamus tincidunt erat in mi accumsan, a sollicitudin risus</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
            <br />
            <!-- / comments for post -->
            <hr class="divider-color" />
            <div class="leave-reply single-course-reply">
                <div class="title">Leave a Comment</div>
                <form class="message-form clear-fix" action="{{ url('/package-review/'.$pack->id) }}" method="get">
                    {{ csrf_field() }}
                    <p class="message-form-subject">
                        <input id="subject" name="Email" type="text" value="" size="30" aria-required="true" placeholder="ایمیل شما..." required>
                    </p>
                    <p class="message-form-author">
                        <input id="author" name="Name" type="text" value="" size="30" aria-required="true" placeholder="نام شما..." required>
                    </p>
                    <p class="message-form-message">
                        <textarea id="message" name="Comment" cols="45" rows="8" aria-required="true" placeholder="متن مورد نظر..." required></textarea>
                    </p>
                    <p class="form-submit rectangle-button green medium">
                        <input class="cws-button border-radius alt" name="submit" type="submit" id="submit" value="ثبت نظر">
                    </p>
                </form>
            </div>
        </div>
    </main>
    <!-- / main content -->
</div>
@include('footer')
<script src="/js/jquery.min.js"></script>
<script type='text/javascript' src='/js/jquery.validate.min.js'></script>
<script src="/js/jquery.form.min.js"></script>
<script src="/js/TweenMax.min.js"></script>
<script src="/js/main.js"></script>

<script src="/js/select2.js"></script>
<script src="/js/owl.carousel-v2.js"></script>
<script src="/js/jquery-ui.min.js"></script>
<script src="/js/jflickrfeed.min.js"></script>
<script src="/js/jquery.tweet.js"></script>
<!--<script type='text/javascript' src='tuner/js/colorpicker.js'></script>-->
<!--<script type='text/javascript' src='tuner/js/scripts.js'></script>-->
<script src="/js/jquery.fancybox.pack.js"></script>
<script src="/js/jquery.fancybox-media.js"></script>
<script src="/js/retina.min.js"></script>
</body>

</html>