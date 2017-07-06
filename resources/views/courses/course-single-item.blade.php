<!DOCTYPE HTML>
<html>

<head>
    <title>{{$course->course->name}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <!-- style -->
    <link rel="shortcut icon" href="/img/logo.ico">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/select2.css">
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" href="/css/main.css">
    <!--<link rel="stylesheet" type="text/css" href="tuner/css/colorpicker.css" />-->
    <!--<link rel="stylesheet" type="text/css" href="tuner/css/styles.css" />-->
    <link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.css" />
    <link rel="stylesheet" href="/css/Shadi.css">
    <link rel="stylesheet" href="/css/Kimia.css">

    <!--styles -->
</head>
<body>
<!-- page header -->
<header>
    <!-- main menu -->
    @include('header')
    <!-- / main menu -->
    <!-- page title -->
    <div class="page-title">
        <div class="grid-row">
            <h1>{{$course->course->name}}</h1>
            <!-- bread crumb -->
            <nav class="bread-crumb">
                <a href="/">خانه</a>
                <i class="fa fa-long-arrow-left"></i>
                <a href="/courses-grid">دوره ها</a>
                <i class="fa fa-long-arrow-left"></i>
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
            <section class="clear-fix">
                <div class="name" >
                    <h2> {{$course->course->name}} </h2>
                    <div class="stars">
                        <div class="star-ratings-css">
                            <div class="star-ratings-css-top" style="width: 100%;color:#ff8d00">
                                @for($i=0;$i<$course['rate'];$i++)
                                    ★
                                @endfor
                            </div>
                        </div>

                        {{--<form action="">--}}
                            {{--@if($course['rate']<=5 and $course['rate']>4)--}}
                            {{--<input class="star star-5" id="star-5" type="radio" name="star" checked/>--}}
                            {{--<label class="star star-5" for="star-5"></label>--}}
                            {{--<input class="star star-4" id="star-4" type="radio" name="star" />--}}
                            {{--<label class="star star-4" for="star-4"></label>--}}
                            {{--<input class="star star-3" id="star-3" type="radio" name="star"/>--}}
                            {{--<label class="star star-3" for="star-3"></label>--}}
                            {{--<input class="star star-2" id="star-2" type="radio" name="star"/>--}}
                            {{--<label class="star star-2" for="star-2"></label>--}}
                            {{--<input class="star star-1" id="star-1" type="radio" name="star"/>--}}
                            {{--<label class="star star-1" for="star-1"></label>--}}
                            {{--@endif--}}
                                {{--@if($course['rate']<=5 and $course['rate']>3)--}}
                                {{--<input class="star star-5" id="star-5" type="radio" name="star" />--}}
                                {{--<label class="star star-5" for="star-5"></label>--}}
                                {{--<input class="star star-4" id="star-4" type="radio" name="star" checked/>--}}
                                {{--<label class="star star-4" for="star-4"></label>--}}
                                {{--<input class="star star-3" id="star-3" type="radio" name="star"/>--}}
                                {{--<label class="star star-3" for="star-3"></label>--}}
                                {{--<input class="star star-2" id="star-2" type="radio" name="star"/>--}}
                                {{--<label class="star star-2" for="star-2"></label>--}}
                                {{--<input class="star star-1" id="star-1" type="radio" name="star"/>--}}
                                {{--<label class="star star-1" for="star-1"></label>--}}
                            {{--@endif--}}
                                {{--@if($course['rate']<=3 and $course['rate']>2)--}}
                                    {{--<input class="star star-5" id="star-5" type="radio" name="star" />--}}
                                    {{--<label class="star star-5" for="star-5"></label>--}}
                                    {{--<input class="star star-4" id="star-4" type="radio" name="star" />--}}
                                    {{--<label class="star star-4" for="star-4"></label>--}}
                                    {{--<input class="star star-3" id="star-3" type="radio" name="star" checked/>--}}
                                    {{--<label class="star star-3" for="star-3"></label>--}}
                                    {{--<input class="star star-2" id="star-2" type="radio" name="star"/>--}}
                                    {{--<label class="star star-2" for="star-2"></label>--}}
                                    {{--<input class="star star-1" id="star-1" type="radio" name="star"/>--}}
                                    {{--<label class="star star-1" for="star-1"></label>--}}
                                {{--@endif--}}
                                {{--@if($course['rate']<=2 and $course['rate']>1)--}}
                                    {{--<input class="star star-5" id="star-5" type="radio" name="star" />--}}
                                    {{--<label class="star star-5" for="star-5"></label>--}}
                                    {{--<input class="star star-4" id="star-4" type="radio" name="star" />--}}
                                    {{--<label class="star star-4" for="star-4"></label>--}}
                                    {{--<input class="star star-3" id="star-3" type="radio" name="star"/>--}}
                                    {{--<label class="star star-3" for="star-3"></label>--}}
                                    {{--<input class="star star-2" id="star-2" type="radio" name="star" checked/>--}}
                                    {{--<label class="star star-2" for="star-2"></label>--}}
                                    {{--<input class="star star-1" id="star-1" type="radio" name="star"/>--}}
                                    {{--<label class="star star-1" for="star-1"></label>--}}
                                {{--@endif--}}
                                {{--@if($course['rate']<=1 and $course['rate']>0)--}}
                                    {{--<input class="star star-5" id="star-5" type="radio" name="star" />--}}
                                    {{--<label class="star star-5" for="star-5"></label>--}}
                                    {{--<input class="star star-4" id="star-4" type="radio" name="star" />--}}
                                    {{--<label class="star star-4" for="star-4"></label>--}}
                                    {{--<input class="star star-3" id="star-3" type="radio" name="star"/>--}}
                                    {{--<label class="star star-3" for="star-3"></label>--}}
                                    {{--<input class="star star-2" id="star-2" type="radio" name="star"/>--}}
                                    {{--<label class="star star-2" for="star-2"></label>--}}
                                    {{--<input class="star star-1" id="star-1" type="radio" name="star" checked/>--}}
                                    {{--<label class="star star-1" for="star-1"></label>--}}
                                {{--@endif--}}
                        {{--</form>--}}

                    </div>

                    <div class="course-price-div">
                        <div class="course-price-inner-div">
                            <p class="course-price">
                                <span class="course-amount">
                                     @if($course->price == 0)
                                        رایگان
                                    @else
                                        {{number_format($course->price)}}
                                        <span class="tooman">هزار تومان</span>
                                    @endif
                                </span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="course-main-nav">
                    <div class="course-main-nav-inner">
                                <span class="cws-button bt-color-2 border-radius icon-left small course-time">
                                    <i class="fa fa-file-text-o"></i> سطح درس: <span>{{Config::get('levels.'.$course->course->level)}}</span>
                                </span>
                                <span class="cws-button bt-color-2 border-radius icon-left small course-time">
                                    <i class="fa fa-clock-o"></i> مدت زمان: <span>{{$course['duration']}}&nbsp;ساعت</span>
                                </span>

                        <a href="/courses-grid/category/{{$course->id}}" class="cws-button bt-color-2 border-radius alt small">{{$course['category_name']}}</a>
                    </div>
                </div>

                <div class="single-course-more-info">
                    <a href="/shop-card-course/{{$course->id}}" class="cws-button bt-color-1 border-radius alt large">خرید محصول<i class="fa fa-shopping-cart"></i></a>
                </div>

            </section>
            <!--video-->
            <!--<section>-->

            <!--&lt;!&ndash; video player &ndash;&gt;-->

            <!--<iframe width="100%" height="500vh" src="https://www.youtube.com/embed/rZsH88zNxRw" ></iframe>-->

            <!--&lt;!&ndash; / video player &ndash;&gt;-->
            <!--</section>-->

            <section class="padding-top-none">
                <!-- picture -->
                <div class="course-image">
                    @if(!isset($course->image) and !isset($course->course->introvideo))
                        <?php $img='/pic/370x270-img-3.jpg'?>
                    @elseif(isset($course->image))
                        <?php $img=Voyager::image($course->image)?>
                    @else
                        <?php $img=$course->course->introvideo?>
                    @endif
                    <img src="{{$img}}">
                </div>
                <!-- / picture -->
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
                        <div class="tabs-btn" data-tabs-id="tabs2">اهداف</div>
                        <div class="tabs-btn" data-tabs-id="tabs3">شرایط</div>
                        <div class="tabs-btn" data-tabs-id="tabs4">پیشنیاز ها</div>
                        <div class="tabs-btn" data-tabs-id="tabs5">زمان و مکان دوره</div>
                        @if($enable)
                            <div class="tabs-btn tabs6" data-tabs-id="tabs6">تمرین ها <i class="fa fa-unlock"></i></div>
                        @else
                            <div class="tabs-btn tabs6 lock" style="pointer-events: none;" title="فقط در صورت داشتن درس, مجاز به دیدن قسمت تمرین ها هستید">تمرین ها <i class="fa fa-lock"></i></div>
                        @endif


                    </div>
                    <!-- tabs keeper -->
                    <div class="tabs-keeper single-course-tabs-keeper">
                        <!-- tabs container -->
                        <div class="container-tabs active single-course-overview" data-tabs-id="cont-tabs1">
                            <!--<div class="single-course-overview-img">-->
                            <!--<h5>the teacher</h5>-->
                        <!--<img src="pic/75x75-img-1.jpg"  alt>-->
                            <!--<span>the name of the poor thing</span>-->
                            <!--</div>-->
                            <div class="single-course-overview-text">
                                {{--<p>--}}
                                    {{--<time datetime="{{$course->created_at}}">{{$course->created_at}}</time>--}}
                                    {{--<span>تاریخ ارسال:</span>--}}
                                {{--</p>--}}
                                <div>
                                   {!!  $course->course->introduction!!}
                                </div>
                                <br />
                                <br />
                                <div class="single-course-overview-topics">
                                    <h4>مباحثی که خواهید دید: </h4>
                                    <ul>
                                        @foreach($course->course->sections as $section)
                                            <li>{{$section->name}}
                                            &nbsp;<span> نوع قسمت : @if($section->type) کلاس آموزشی @else کلاس کارگاهی  @endif</span>
                                                {!! $section->description !!}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--/tabs container -->
                        <!-- tabs container -->
                        <div class="container-tabs single-course-purpose" data-tabs-id="cont-tabs2">
                            <!--<div>-->
                            <h4>اهداف این درس: </h4>
                            @if(isset($course->course->goal))
                                {!! $course->course->goal !!}
                            @endif
                            <!--</div>-->
                        </div>
                        <!--/tabs container -->
                        <!-- tabs container -->
                        <div class="container-tabs " data-tabs-id="cont-tabs3">
                            <h4>شرایط لازم برای دوره: </h4>

                                @if(isset($course->course->qualification))
                                    {!! $course->course->qualification !!}
                                @endif
                        </div>
                        <!--/tabs container -->
                        <!-- tabs container -->
                        <div class="container-tabs" data-tabs-id="cont-tabs4">
                            <h4>پیشنیاز‌های لازم برای دوره: </h4>
                            @if(isset($course->course->requirement))

                                {{--$string = "line 1\nline 2\nline3";--}}

                                {{--$bits = explode("\n", $course->course->requirement);--}}

                                {{--$newstring = "<ul>";--}}
                                {{--foreach($bits as $bit)--}}
                                {{--{--}}
                                    {{--$newstring .= "<li>" . $bit . "</li>";--}}
                                {{--}--}}
                                {{--$newstring .= "</ul>";--}}
                                {{--echo $newstring;--}}
                                {!! $course->course->requirement !!}

                            @endif

                        </div>
                        <!--/tabs container -->
                        <!-- tabs container -->
                        <div class="container-tabs single-course-time" data-tabs-id="cont-tabs5">
                            <div class="widget-event">
                                <div class="grid-col grid-col-6">
                                    <article class="clear-fix">
                                        <h4>شروع دوره از:</h4>
                                        <?php
                                        $tempContents = preg_split("/[\s]+/", $course->start_date);
                                        //foreach($tempContents as $temp){
                                        //  echo '<br/>'.$temp;
                                        //}
                                        ?>
                                        <div class="date"><div class="day">{{$tempContents[0]}}</div><div class="month">{{$tempContents[1]}}</div></div>
                                        <div class="event-description"><span class="single-course-time-weekday">{{$course->time}}</span><p></p></div>
                                    </article>

                                    <br>

                                    <div class="single-course-place-div">
                                        <h4>محل برگزاری دوره:</h4>
                                        <div class="single-course-place">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            <span>{{$course->location}}</span>
                                        </div>
                                    </div>
                                </div>

                                <!--<div class="grid-col grid-col-4">-->
                                <div class="map wow fadeInUp">
                                    <div id="map" class="google-map"></div>
                                    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
                                    <!--<script type="text/javascript">-->
                                    <!--function mapinitialize() {-->
                                    <!--var latlng = new google.maps.LatLng(-33.86938,151.204834);-->
                                    <!--var myOptions = {-->
                                    <!--zoom: 14,-->
                                    <!--center: latlng,-->
                                    <!--scrollwheel: false,-->
                                    <!--scaleControl: false,-->
                                    <!--disableDefaultUI: false,-->
                                    <!--mapTypeId: google.maps.MapTypeId.ROADMAP,-->
                                    <!--// Google Map Color Styles-->
                                    <!--styles: [{featureType:"landscape",stylers:[{saturation:-100},{lightness:65},{visibility:"on"}]},{featureType:"poi",stylers:[{saturation:-100},{lightness:51},{visibility:"simplified"}]},{featureType:"road.highway",stylers:[{saturation:-100},-->
                                    <!--{visibility:"simplified"}]},{featureType:"road.arterial",stylers:[{saturation:-100},{lightness:30},{visibility:"on"}]},{featureType:"road.local",stylers:[{saturation:-100},{lightness:40},{visibility:"on"}]},{featureType:"transit",stylers:[{saturation:-100},-->
                                    <!--{visibility:"simplified"}]},{featureType:"administrative.province",stylers:[{visibility:"off"}]/**/},{featureType:"administrative.locality",stylers:[{visibility:"off"}]},{featureType:"administrative.neighborhood",stylers:[{visibility:"on"}-->
                                    <!--]/**/},{featureType:"water",elementType:"labels",stylers:[{visibility:"on"},{lightness:-25},{saturation:-100}]},{featureType:"water",elementType:"geometry",stylers:[{hue:"#ffff00"},{lightness:-25},{saturation:-97}]}]-->
                                    <!--};-->
                                    <!--var map = new google.maps.Map(document.getElementById("map"),myOptions);-->

                                    <!--var image = "/images/map-pin.png";-->
                                    <!--var image = new google.maps.MarkerImage("/images/map-pin.png", null, null, null, new google.maps.Size(84,30));-->
                                    <!--var marker = new google.maps.Marker({-->
                                    <!--map: map,-->
                                    <!--icon: image,-->
                                    <!--position: map.getCenter()-->
                                    <!--});-->

                                    <!--var contentString = '<b>Office</b><br>Streetname 13<br>50000 Sydney';-->
                                    <!--var infowindow = new google.maps.InfoWindow({-->
                                    <!--content: contentString-->
                                    <!--});-->

                                    <!--google.maps.event.addListener(marker, 'click', function() {-->
                                    <!--infowindow.open(map,marker);-->
                                    <!--});-->


                                    <!--}-->
                                    <!--mapinitialize();-->
                                    <!--</script>-->
                                </div>
                                <!--</div>-->

                            </div>
                        </div>
                        <!--/tabs container -->
                        <!-- tabs container -->
                        <div class="container-tabs single-course-exercise" data-tabs-id="cont-tabs6">
                            <h4>تمرینات مربوط به این درس:</h4>
                            @foreach($course->excercises as $excercise)
                                <div class="course-exercises">
                                    <p>{{$excercise->name}}</p>
                                    <br>
                                    <p>
                                        @if(isset($excercise->description))
                                            <p>{!!  $excercise->description!!}</p>
                                        @endif
                                        <a href="{{$excercise->downloadfile}}">لینک دانلود</a>
                                    </p>
                                </div>
                                <br>
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
                        <h2>اساتید درس</h2>
                        <div class="carousel-nav">
                            <div class="carousel-button">
                                <div class="prev"><i class="fa fa-angle-left"></i></div>
                                <div class="next"><i class="fa fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="grid-col-row left-margin-none">
                        <div class="owl-carousel owl-two-item">
                            @foreach($course->teachers as $teacher)
                            <div class="gallery-item">
                                <div class="item-instructor bg-color-5">
                                    <a href="/teachers/{{$teacher->id}}" class="instructor-avatar">
                                        <?php $img='/pic/210x220-img-5.jpg'?>
                                        @if(isset($teacher->image))
                                            <?php $img=Voyager::image($teacher->image)?>
                                        @endif
                                        <img src="{{$img}}" alt>
                                    </a>
                                    <div class="info-box">
                                        <?php $img='/pic/210x220-img-5.jpg'?>
                                        @if(isset($teacher->image))
                                            <?php $img=$teacher->image?>
                                        @endif
                                        <img src="{{$img}}" alt>
                                        <h3>{{$teacher->name}}</h3>
                                        <span class="instructor-profession">{{$teacher->occupation}}</span>
                                        <div class="divider"></div>
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

            <section class="share-it">
                <p>این درس را با دوستان خود به اشتراک بگذارد</p>
                <div class="social-link">
                    <a href="#" class="fa fa-linkedin"></a>
                    <a href="#" class="fa fa-google-plus"></a>
                    <a href="#" class="fa fa-envelope"></a>
                    <a href="#" class="fa fa-telegram"></a>
                </div>
            </section>

            <a href="/course-packages/{{$course->id}}">
                <div class="parallaxed single-course-packages">
                    <div class="parallax-image" data-parallax-left="0" data-parallax-top="0" data-parallax-scroll-speed="0.5">
                        <img src="/img/parallax.png" alt="">
                    </div>
                    <div class="them-mask bg-color-3"></div>
                    <div class="grid-row center-text single-course-packages-text">
                        <span>مشاهده بسته های شامل این درس...</span>
                    </div>
                </div>
            </a>
            <br>

            <!--<li class="dot"></li>-->

            <hr class="divider-big" />
            <br>

            <!-- comments for post -->
            <div class="comments single-course-comments">
                <div id="comments">
                    @if (count($errors) > 0)
                        <div  class="info-boxes confirmation-message" >
                            <div class="info-box-icon"><i class="fa fa-check"></i></div>
                            @foreach ($errors->all() as $error)
                                <p style="color: white;">{{ $error }}</p>
                            @endforeach
                            <div class="close-button"></div>
                        </div>
                    @endif
                    {{--unsuccessfull message--}}
                    {{--<div class="info-boxes error-message">
                        <div class="info-box-icon"><i class="fa fa-times"></i></div>
                        <strong>Error box</strong><br />Vestibulum sodales pellentesque nibh quis imperdiet
                        <div class="close-button"></div>
                    </div>--}}
                    <br>
                    <div class="comment-title"><span>({{$course['reviews_count']}})</span> نظرات </div>
                    <ol class="commentlist">
                        @foreach($reviews as $review)
                            @if($review->pivot->enable == 1)
                                <li class="comment">
                                    <div class="comment_container clear">
                                        <?php $img='/pic/70x70-img-1.jpg'?>
                                        @if(isset($review->image))
                                            <?php $img='/'.$review->image?>
                                        @endif
                                        <img src="{{$img}}"  alt="" class="avatar">
                                        <div class="comment-text">
                                            <div class="meta">
                                                <strong>{{$review->name}}</strong>
                                                {{--<time datetime="2016-06-07">{{$review->pivot->created_at}}</time>--}}
                                            </div>
                                            <div class="description">
                                                <p>{{$review->pivot->comment}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ol>
                </div>
            </div>
            <br />
        @if($comment_enable==1)
            <!-- / comments for post -->
            <hr class="divider-color" />
            <div class="leave-reply single-course-reply">
                <div class="title">نظر خود را ثبت کنید</div>
                <form class="message-form clear-fix" action="{{ url('/course-review') }}" method="post">
                    <input name="id" value="{{$course->id}}" style="display: none">
                    {{--<p class="message-form-subject">--}}
                        {{--<input id="subject" name="email" type="text" value="" size="30" aria-required="true" placeholder="ایمیل شما..." required>--}}
                    {{--</p>--}}
                    {{--<p class="message-form-author">--}}
                        {{--<input id="author" name="author" type="text" value="" size="30" aria-required="true" placeholder="نام شما..." required>--}}
                    {{--</p>--}}
                    <div class="stars">
                        <input class="star star-5"  id="star-5" type="radio" name="1"/>

                        <label class="star star-5" for="star-5"></label>

                        <input class="star star-4" id="star-4" type="radio" name="2"/>

                        <label class="star star-4" for="star-4"></label>

                        <input class="star star-3" id="star-3" type="radio" name="3"/>

                        <label class="star star-3" for="star-3"></label>

                        <input class="star star-2" id="star-2" type="radio" name="4"/>

                        <label class="star star-2" for="star-2"></label>

                        <input class="star star-1" id="star-1" type="radio" name="5"/>

                        <label class="star star-1" for="star-1"></label>

                    </div>
                    <p class="message-form-message">
                        <textarea id="message" name="Comment" cols="45" rows="8" aria-required="true" placeholder="متن مورد نظر..."></textarea>
                    </p>
                    <br>
                    <p class="form-submit rectangle-button green medium">



                        <input class="cws-button border-radius alt" name="submit" type="submit" id="submit" value="ثبت نظر">
                    </p>
                    {{csrf_field()}}
                </form>
            </div>
            @endif
        </div>
    </main>
    <!-- / main content -->
</div>

<!-- footer -->
@include('footer')
<!-- / footer -->
<script src="/js/jquery.min.js"></script>
<script type='text/javascript' src='js/jquery.validate.min.js'></script>
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
<script src="/js/Kimia.js"></script>
</body>

</html>
