<!DOCTYPE HTML>
<html>

<!-- Mirrored from html.creaws.com/unilearn/content-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Mar 2017 12:02:44 GMT -->
<head>
    <title>UniLearn - Education and Courses Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <!-- style -->
    <link rel="shortcut icon" href="/img/logo.ico">
    <link rel="stylesheet" href="/css/font-awesome.css">
    <link rel="stylesheet" href="/css/select2.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/colorpicker.css" type="text/css" />
    <link rel="stylesheet" href="/css/styles.css" type="text/css" />
    <link rel="stylesheet" href="/css/jquery.fancybox.css" type="text/css" />
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" href="/css/Shadi.css">
    <?php

    function convertToHoursMins($time, $format = '%02d:%02d') {
        if ($time < 1) {
            return;
        }
        $hours = floor($time / 60);
        $minutes = ($time % 60);
        return sprintf($format, $hours, $minutes);
    }

    ?>
    <!--styles -->
</head>
<body>
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
            <h1>Elements</h1>
            <!-- bread crumb -->
            <nav class="bread-crumb">
                <a href="/">خانه</a>
                <i class="fa fa-long-arrow-right"></i>
                <a href="/courses-grid">دوره ها</a>
                <i class="fa fa-long-arrow-right"></i>
                <a href="/courses-grid/{{$course->id}}">{{$course->course->name}}</a>
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
            <!-- check box section -->
            <!-- / check box section -->
            <!-- section info boxes -->
            <!-- / section info boxes -->
            <div class="grid-col-row clear-fix">
                <div class="grid-col grid-col-6">
                </div>
                <div class="grid-col grid-col-6">
                </div>
            </div>
            <div class="grid-col-row clear-fix">
                <div class="grid-col grid-col-6">
                </div>
                <div class="grid-col grid-col-6">
                </div>
            </div>
            <!--info-->
            <section>
                <div class="name" >
                    <h2> {{$course->course->name}} </h2>

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

                <nav class="main-nav">

                    <!--<i class="mobile_menu_switcher"></i><ul class="clear-fix">-->
                    <!--<li class="header-menu">Menu</li><li id="menu-item-0">-->

                    <!--<span class="currency">$</span>-->
                    <!--<span class="price">تومان300 </span></li>-->

                    <!--<span class="button_open"></span></li>-->
                    <!--<li id="menu-item-6">-->
                    <!--<a href="contact-us.html">خرید</a>-->
                    <!--</li>-->
                    <!--<span class="text"></span></li>-->
                    <!--<li id="menu-item-4">-->
                    <!--<div>مدت زمان: 170 دقیقه</div>-->
                    <!--</li>-->
                    <!--&lt;!&ndash; / sub menu &ndash;&gt;-->

                    <!--<span class="button_open"></span></li>-->
                    <!--<li id="menu-item-46">-->
                    <!--<div>مجموعه-->
                    <!--<a href="contact-us.html">-->
                    <!--طراحی-->
                    <!--</a></div>-->
                    <!--</li>-->

                    <div class="grid-row">
                        <div class="grid-col-row clear-fix">
                            <section class="grid-col grid-col-4 duration">
                                <div class="corner-radius bg-color-2 border-radius  small"> <div class="time"><h6 class="zaman"><i class="fa fa-clock-o"></i> {{$course['duration']}} دقیقه </h6></div></div>
                            </section>
                            <section class="grid-col grid-col-4 category">

                                <a href="#" class="cws-button bt-color-2 border-radius alt small">{{$course->course->category->name}}</a>
                            </section>
                        </div>
                    </div>

                    </nav>
                <p class="price">
                    <span class="amount">{{number_format($course->price)}}<sup>تومان</sup></span>
                </p>
                <!--<a href="" class="cws-button bt-color-3 border-radius alt">طراحی</a>-->

                <!--<a href="" class="cws-button bt-color-3 border-radius alt">زمان دوره</a>-->
                <!--<div class="price-pt"><sup>$</sup>29.<sup>99</sup></div>-->
                <!--&lt;!&ndash;<span class="currency">$</span>&ndash;&gt;-->
                <!--&lt;!&ndash;<span class="price">300</span>&ndash;&gt;-->
                <!--&lt;!&ndash;&lt;!&ndash;<a href="" class="cws-button bt-color-3 border-radius alt">قیمت</a>&ndash;&gt;&ndash;&gt;-->
                <!--<div class="stars">-->
                <!--<form action="">-->

                <!--<input class="star star-5" id="star-5" type="radio" name="star"/>-->

                <!--<label class="star star-5" for="star-5"></label>-->

                <!--<input class="star star-4" id="star-4" type="radio" name="star"/>-->

                <!--<label class="star star-4" for="star-4"></label>-->

                <!--<input class="star star-3" id="star-3" type="radio" name="star"/>-->
                <!--<label class="star star-3" for="star-3"></label>-->

                <!--<input class="star star-2" id="star-2" type="radio" name="star"/>-->

                <!--<label class="star star-2" for="star-2"></label>-->

                <!--<input class="star star-1" id="star-1" type="radio" name="star"/>-->

                <!--<label class="star star-1" for="star-1"></label>-->

                <!--</form>-->

                <!--</div>-->


            </section>
            <!--video-->
            <section>

                <!-- video player -->

                <iframe width="100%" height="500vh" src="{{$course->course->introvideo  }}" ></iframe>


                <!--</video>-->
                <!--<div class="video-player">-->
                <!--<iframe src="https://www.youtube.com/embed/rZsH88zNxRw"></iframe>-->
                <!--</div>-->
                <!-- / video player -->
            </section>
            <hr class="divider-big">
            <!--intro-->
            <section>
                <div class="intro">
                    <h3>Introduction</h3>
                    <p>{{$course->course->introduction}}</p>
                </div>
            </section>

            <!-- section gallery -->
            <section>
                <!-- gallery navigation -->
                <div class="carousel-container ">
                    <div class="teachers"><h2>اساتید</h2></div>
                    <div class="carousel-nav">
                        <div class="carousel-button">
                            <div class="prev"><i class="fa fa-angle-left"></i></div><!--
							 --><div class="next"><i class="fa fa-angle-right"></i></div>
                        </div>
                    </div>
                    <!-- / gallery navigation -->
                    <!-- gallery container -->
                    <div class="grid-col-row">
                        <div class="owl-carousel owl-three-item teacher-part">
                        @foreach ($course->teachers()->get() as $teacher)
                            <!-- gallery item -->
                            <div class="gallery-item">
                                <div class="portfolio-item">
                                    <div class="picture">
                                        <div class="hover-effect"></div>
                                        <div class="link-cont">
                                            <a href="#" class="cws-left fancy fa fa-link"></a>
                                            <a href="pic/370x270-img-3%402x.jpg" class="fancy fa fa-search"></a>
                                            <a href="#" class="cws-right fa fa-heart"></a>
                                        </div>
                                        <img src="/pic/370x270-img-3.jpg" data-at2x="pic/370x270-img-3@2x.jpg" alt>
                                    </div>
                                    <h3>{{$teacher->name}}</h3>
                                    <p>{{$teacher->introduction}}</p>
                                </div>
                            </div>
                            <!-- / gallery item -->
                        @endforeach
                        </div>

                    </div>
                </div>

                <!-- / gallery container -->
            </section>

            <!-- section gallery -->
            <!-- section gallery slider -->
            <!-- / section gallery slider -->
            <!-- section banner alt -->
            <!-- / section banner alt -->
            <!-- section banner -->
            <!-- section banner -->
            <!-- section video player -->
            <!-- / section video player -->
            <!--Tabs-->
            <section class="part">
                <div class="tabs">
                    <div class="block-tabs-btn clear-fix">
                        <div class="tabs-btn active" data-tabs-id="tabs1">Description</div>
                        <div class="tabs-btn" data-tabs-id="tabs2">Course Structure</div>
                        <div class="tabs-btn" data-tabs-id="tabs3">Entery Requirements</div>
                        <div class="tabs-btn " data-tabs-id="tabs4">Apply</div>
                    </div>
                    <!-- tabs keeper -->
                    <div class="tabs-keeper">
                        <!-- tabs container -->
                        <div class="container-tabs active" data-tabs-id="cont-tabs1">
                            <h3>Morbi congue lectus non sem tempus semper</h3>
                            <p>Maecenas accumsan, massa nec vulputate congue, dolor erat ullamcorper dolor,
                                ac aliquam eros sem in dui. In eu sagittis metus. Proin consectetur suscipit
                                dui sed euismod. Nam non metus in est vehicula vestibulum et vel neque.
                                Mauris scelerisque lectus at diam pretium, eget fringilla erat sollicitudin.<br/><br/>Pellentesque
                                quis pharetra tellus. Donec interdum nisi at sem ornare, ut congue felis
                                eleifend. Nam elementum nec leo eget pharetra. Quisque consectetur porta
                                erat sit amet fermentum. </p>
                            <div class="columns-row">
                                <div class="columns-col columns-col-6">
                                    <ul class="check-list">
                                        <li>Aliquam justo lorem, commodo eget tristique non</li>
                                        <li>Curabitur vehicula leo accumsan, varius tellus vitae</li>
                                        <li>Pellentesque imperdiet, leo ut pulvinar facilisis</li>
                                        <li>Сonvallis lectus, vitae condimentum nulla odio id mi</li>
                                    </ul>
                                </div>
                                <div class="columns-col columns-col-6">
                                    <ul class="check-list">
                                        <li>Aliquam justo lorem, commodo eget tristique non</li>
                                        <li>Curabitur vehicula leo accumsan, varius tellus vitae</li>
                                        <li>Pellentesque imperdiet, leo ut pulvinar facilisis</li>
                                        <li>Сonvallis lectus, vitae condimentum nulla odio id mi</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--/tabs container -->
                        <!-- tabs container -->
                        <div class="container-tabs" data-tabs-id="cont-tabs2">
                            <h3>Suspendisse dolor risus</h3>
                            <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis justo
                                at suscipit. Vivamus orci urna, ornare vitae tellus in, condimentum
                                imperdiet eros. Maecenas accumsan, massa nec vulputate congue, dolor erat
                                ullamcorper dolor, ac aliquam eros sem in dui. In eu sagittis metus. Proin
                                consectetur suscipit dui sed euismod. Suspendisse dolor risus, venenatis
                                eget lacus eu, ultrices euismod magna. Etiam luctus suscipit ultrices.
                                Pellentesque nulla sem, aliquam ut vehicula ut, ornare vestibulum mauris.
                                Aenean eget sem eget mauris consequat sodales. Nunc eu libero feugiat,
                                faucibus diam eu, aliquam diam. Nullam enim mauris, ultricies tincidunt
                                hendrerit eu, bibendum ut nunc.</p>
                            <div class="columns-row">
                                <div class="columns-col columns-col-6">
                                    <ul class="check-list">
                                        <li>Aliquam justo lorem, commodo eget tristique non</li>
                                        <li>Curabitur vehicula leo accumsan, varius tellus vitae</li>
                                        <li>Pellentesque imperdiet, leo ut pulvinar facilisis</li>
                                        <li>Сonvallis lectus, vitae condimentum nulla odio id mi</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--/tabs container -->
                        <!-- tabs container -->
                        <div class="container-tabs" data-tabs-id="cont-tabs3">
                            <h3>Additional Information</h3>
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac
                                turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget,
                                tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
                                ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                        </div>
                        <!--/tabs container -->
                        <!-- tabs container -->
                        <div class="container-tabs" data-tabs-id="cont-tabs4">
                            <h3>Morbi congue lectus non sem tempus semper</h3>
                            <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis justo
                                at suscipit. Vivamus orci urna, ornare vitae tellus in, condimentum
                                imperdiet eros. Maecenas accumsan, massa nec vulputate congue, dolor erat
                                ullamcorper dolor, ac aliquam eros sem in dui. In eu sagittis metus. Proin
                                consectetur suscipit dui sed euismod. Suspendisse dolor risus, venenatis
                                eget lacus eu, ultrices euismod magna.</p>
                            <div class="columns-row">
                                <div class="columns-col columns-col-6">
                                    <ul class="check-list">
                                        <li>Aliquam justo lorem, commodo eget tristique non</li>
                                        <li>Curabitur vehicula leo accumsan, varius tellus vitae</li>
                                        <li>Pellentesque imperdiet, leo ut pulvinar facilisis</li>
                                    </ul>
                                </div>
                                <div class="columns-col columns-col-6">
                                    <ul class="check-list">
                                        <li>Aliquam justo lorem, commodo eget tristique non</li>
                                        <li>Curabitur vehicula leo accumsan, varius tellus vitae</li>
                                        <li>Pellentesque imperdiet, leo ut pulvinar facilisis</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--/tabs container -->
                    </div>
                    <!--/tabs keeper -->
                </div>

            </section>

            <li class="dot"></li>

            <hr class="divider-big" />
            <br>
            <div class="comments">
                <div class="comment-title">نظرات</div>
                <br>
                <ol class="commentlist">
                    @foreach($course['Reviews'] as $review)
                    <li class="comment">
                        <div class="comment_container clear">
                            <img src="{{$review['user_image']}}" data-at2x="pic/70x70-img-1@2x.jpg" alt="" class="avatar">
                            <div class="comment-text">
                                <div class="star-rating" title="Rated 5.00 out of 5">
                                    {{$review['user_rate']}}
                                    <span style="width:80%"><strong class="rating">3.00</strong> out of 5</span>
                                </div>
                                <p class="meta">
                                    <strong>{{$review['user_name']}}</strong>
                                    <time datetime="2016-06-07T12:14:53+00:00">{{$review->created_at}}</time>
                                </p>
                                <br>
                                <div class="description">
                                    <p>{{$review['user_comment']}}</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                    {{--<li class="comment">--}}
                        {{--<div class="comment_container clear">--}}
                            {{--<img src="/pic/70x70-img-1.jpg" data-at2x="pic/70x70-img-1@2x.jpg" alt="" class="avatar">--}}
                            {{--<div class="comment-text">--}}
                                {{--<div class="star-rating" title="Rated 5.00 out of 5">--}}
                                    {{--<span style="width:80%"><strong class="rating">4.00</strong> out of 5</span>--}}
                                {{--</div>--}}
                                {{--<p class="meta">--}}
                                    {{--<strong>اصغر</strong>--}}
                                    {{--<time datetime="2016-06-07T12:14:53+00:00">/ 2015.06.25 12:12:14</time>--}}
                                {{--</p>--}}
                                {{--<br>--}}
                                {{--<div class="description">--}}

                                    {{--<p>سلااااااااااااااااااااااام</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                </ol>
            </div>
        </div>
    </main>
    <!-- / main content -->
</div>


<!-- footer -->
@include('footer')
<!-- / footer -->
<script src="/js/jquery.min.js"></script>
<script type='text/javascript' src='/js/jquery.validate.min.js'></script>
<script src="/js/jquery.form.min.js"></script>
<script src="/js/TweenMax.min.js"></script>
<script src="/js/main.js"></script>

<script src="/js/select2.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/jquery-ui.min.js"></script>
<script src="/js/jflickrfeed.min.js"></script>
<script src="/js/jquery.tweet.js"></script>
<script type='text/javascript' src='/js/colorpicker.js'></script>
<script type='text/javascript' src='/js/scripts.js'></script>
<script src="/js/jquery.fancybox.pack.js"></script>
<script src="/js/jquery.fancybox-media.js"></script>
<script src="/js/retina.min.js"></script>
</body>

<!-- Mirrored from html.creaws.com/unilearn/content-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Mar 2017 12:04:17 GMT -->
</html>