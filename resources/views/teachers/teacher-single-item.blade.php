<!DOCTYPE HTML>
<html>

<head>
    <title>وستاکمپ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <!-- style -->
    <link rel="shortcut icon" href="/img/logo.ico">
    <link rel="stylesheet" href="/css/font-awesome.css">
    <link rel="stylesheet" href="/css/main.css">
    <!--<link rel="stylesheet" type="text/css" href="tuner/css/colorpicker.css" />-->
    <!--<link rel="stylesheet" type="text/css" href="tuner/css/styles.css" />-->
    <link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.css" />
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" href="/css/Kimia.css">
    <!--styles -->
</head>
<body class="">
<header>
    <!-- main menu -->
    @include('header')
    <!-- / main menu -->
    <div class="page-title">
        <div class="grid-row">
            <h1>پروفایل</h1>
            <nav class="bread-crumb">
                <a href="/">خانه</a>
                <i class="fa fa-long-arrow-left"></i>
                <a href="/teachers">اساتید</a>
                <i class="fa fa-long-arrow-left"></i>
                <a href="/teachers/{{$teacher->id}}">{{$teacher->name}}</a>

            </nav>
        </div>
    </div>
</header>

<div class="page-content grid-row">
    <main>
        <section class="clear-fix">
            <h2>{{$teacher->name}}<span class="specification">({{$teacher->occupation}})</span></h2>

            <div class="img-float-left">
                <?php $img='/pic/260x290-img-1.jpg'?>
                @if(isset($teacher->image))
                    <?php $img=Voyager::image($teacher->image)?>
                @endif
                <img src="{{$img}}" class="border-img" alt>
                <div class="social-profile">
                    <a href="{{$teacher->github}}" class="fa fa-github"></a>
                    <a href="{{$teacher->linkedin}}" class="fa fa-linkedin"></a>
                    <a href="{{$teacher->instagram}}" class="fa fa-instagram"></a>

                </div>
                <div class="teacher-resume-link">
                    <a href="{{$teacher->resume_link}}" class="cws-button border-radius alt small margin-bottom">لینک رزومه</a>
                </div>
            </div>

            <p>{{$teacher->introduction}}</p>
            <br>
            <!--<br/>-->
            <div class="block-overflow teacher-profile-info">
                <div class="columns-row">
                    <div class="columns-col columns-col-6">
                        <ul class="check-list">
                            <li>میزان تحصیلات: {{$teacher->education}}</li>
                            <li>ایمیل: {{$teacher->email}}</li>
                            {{--<li> شغل فعلی: <span>{{$teacher->occupation}}</span></li>--}}
                            <li>رزومه ی مدرس: <a href="{{$teacher->resume_link}}" class="hover-color">لینک دانلود</a></li>
                        </ul>
                    </div>
                    <div class="columns-col columns-col-6">
                        <ul class="check-list">
                            <li> تعداد دوره ها: <span>{{count($courses)}}</span> </li>
                            <!--<li> آغاز کار با وستاک: از سال <span>۱۳۵۷</span></li>-->
{{--                            <li> زمینه همکاری: <span>{{$teacher->occupation}}</span></li>--}}
                            <!--<li>Сonvallis lectus, vitae condimentum nulla odio</li>-->
                        </ul>
                    </div>
                </div>
            </div>
            <br>
            <p>سابقه ی تحصیلی مدرس به شرح رو به رو است:</p>
            <p>{{$teacher->education_back}}</p>
            <br>
            <p>سابقه ی شغلی مدرس به شرح رو به رو است:  </p>
            <p>{{$teacher->work_experimence}}</p>

        </section>
        <hr class="divider-color" />
        <div class="clear-fix">
            <!--<div class="grid-col-row">-->
            <!--<div class="grid-col grid-col-4">-->
            <!--<section>-->
            <!--<h3>My Skills</h3>-->
            <!-- skill bar -->
            <!--<ul class="skill-bar">-->
            <!--&lt;!&ndash; skill bar item &ndash;&gt;-->
            <!--<li>-->
            <!--<div class="name">Photoshop CC&lt;!&ndash; <span class="skill-bar-perc"></span> &ndash;&gt;</div>-->
            <!--<div class="bar ">-->
            <!--<span class="bg-color-1 skill-bar-progress" data-value="65" ></span>-->
            <!--</div>-->
            <!--</li>-->
            <!--&lt;!&ndash;/skill bar item &ndash;&gt;-->
            <!--&lt;!&ndash; skill bar item &ndash;&gt;-->
            <!--<li>-->
            <!--<div class="name">Developing Mobile Apps&lt;!&ndash; <span class="skill-bar-perc"></span> &ndash;&gt;</div>-->
            <!--<div class="bar ">-->
            <!--<span class="bg-color-2 skill-bar-progress" data-value="35" ></span>-->
            <!--</div>-->
            <!--</li>-->
            <!--&lt;!&ndash;/skill bar item &ndash;&gt;-->
            <!--&lt;!&ndash; skill bar item &ndash;&gt;-->
            <!--<li>-->
            <!--<div class="name">Design&lt;!&ndash; <span class="skill-bar-perc"></span> &ndash;&gt;</div>-->
            <!--<div class="bar ">-->
            <!--<span class="bg-color-3 skill-bar-progress" data-value="90" ></span>-->
            <!--</div>-->
            <!--</li>-->
            <!--&lt;!&ndash;/skill bar item &ndash;&gt;-->
            <!--</ul>-->
            <!--<div class="info-boxes alt confirmation-message">-->
            <!--<div class="info-box-icon"><i class="fa fa-check"></i></div>-->
            <!--<strong>Confirmation box</strong><br />Vestibulum sodales pellentesque nibh quis imperdiet-->
            <!--<div class="close-button"></div>-->
            <!--</div>-->
            <!--<div class="info-boxes alt confirmation-message">-->
            <!--<div class="info-box-icon"><i class="fa fa-check"></i></div>-->
            <!--<strong>Confirmation box</strong><br />Vestibulum sodales pellentesque nibh quis imperdiet-->
            <!--<div class="close-button"></div>-->
            <!--</div>-->
            <!--<div class="info-boxes alt confirmation-message">-->
            <!--<div class="info-box-icon"><i class="fa fa-check"></i></div>-->
            <!--<strong>Confirmation box</strong><br />Vestibulum sodales pellentesque nibh quis imperdiet-->
            <!--<div class="close-button"></div>-->
            <!--</div>-->
            <!--<div class="info-boxes alt confirmation-message">-->
            <!--<div class="info-box-icon"><i class="fa fa-check"></i></div>-->
            <!--<strong>Confirmation box</strong><br />Vestibulum sodales pellentesque nibh quis imperdiet-->
            <!--<div class="close-button"></div>-->
            <!--</div>-->

            <!--/skill bar -->
            <!--</section>-->
            <!--</div>-->
            <!--<div class="grid-col grid-col-12">-->
            <!--<div class="grid-col-row">-->
            <!--carousel testimonials-->
            <section class="quotes-carousel clear-fix teacher-skills">
                <div class="carousel-container">
                    <div class="title-carousel">
                        <h2>مهارت های مدرس</h2>
                        <div class="carousel-nav">
                            <div class="carousel-button">
                                <div class="prev"><i class="fa fa-angle-left"></i></div>
                                <div class="next"><i class="fa fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <!--<h2>مهارت های مدرس</h2>-->
                    <!--<div class="carousel-nav">-->
                    <!--<div class="carousel-button">-->
                    <!--<div class="prev"><i class="fa fa-angle-left"></i></div>&lt;!&ndash;-->
                    <!--&ndash;&gt;<div class="next"><i class="fa fa-angle-right"></i></div>-->
                    <!--</div>-->
                    <!--</div>-->
                    <div class="grid-col-row left-margin-none">
                        <div class="owl-carousel owl-four-items">
                            @foreach($fields as $field)
                            <div class="gallery-item">
                                <div class="info-boxes alt confirmation-message">
                                    <div class="info-box-icon"><i class="fa fa-pencil"></i></div>
													<span>
														<strong>{{$field->tag_name}}</strong>
													</span>
                                    <!--<div class="close-button"></div>-->
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </section>
            <!--carousel testimonials-->
            <!--</div>-->
            <!--</div>-->
        </div>
        <hr class="divider-color" />

        <section class="teacher-profile-courses">
            <h2>درس های مدرس</h2>
            <br>
            <!-- item -->
            @foreach($courses as $course)
            <div class="category-item list clear-fix">
                <div class="picture">
                    <div class="hover-effect"></div>
                    <div class="link-cont">
                        <a href="pic/270x200-img-17%402x.jpg" class="fancy fa fa-search"></a>
                    </div>
                    <?php $img='/pic/270x200-img-17.jpg'?>
                    @if(isset($course->image))
                        <?php $img=$course->image?>
                    @endif
                    <img src="{{$img}}" alt>
                </div>
                <h3><a href="/courses-grid/{{$course->id}}" class="teacher-courses-title">{{$course->course->name}}</a></h3>
                <div>
                    {{--<div class="star-rating" title="Rated 2 out of 5">--}}
                        {{--<span style="width:100%"></span>--}}
                    {{--</div>--}}
                    <div class="star-ratings-css">
                        <div class="star-ratings-css-top" style="width: 84%;color:#ff8d00">
                        @for($i=0;$i<$course['rate'];$i++)
                        <span>★</span>
                        @endfor
                        </div>
                    </div>
                    <div class="count-reviews">( تعداد نظر <span>{{count($course->reviews()->get())}}</span> )</div>
                </div>
                <p>{{$course->course->introduction}}</p>
                <div class="category-info">
									<span class="price">
										<span class="description-price">هزینه: </span>
										<span class="amount">
											{{$course->price}} <span>تومان</span>
										</span>
									</span>
                    <div class="count-users"><i class="fa fa-user"></i> تعداد دانشجویان: <span>{{count($course->takers()->get())}}</span></div>
                    <div class="count-users"><i class="fa fa-file-text-o"></i> سطح درس: {{Config::get('levels.'.$course->course->level)}}</div>
                    <!--<div class="course-lector">-->
                <!--<img src="/pic/60x60-img-1.jpg" class="avatar" alt>-->
                    <!--<div class="lector-name">-->
                    <!--<h4>Robert Doe</h4>-->
                    <!--<span>Doctor</span>-->
                    <!--</div>-->
                    <!--</div>-->
                </div>
            </div>
            @endforeach
            <!-- / item -->
        </section>

        <!--<section>-->
        <!--<div class="event-container-wrap dashboard">-->
        <!--<table>-->
        <!--<tbody>-->
        <!--<tr>-->
        <!--<td>-->
        <!--<div class="day-week"><span>Monday</span></div>-->
        <!--<div class="event">-->
        <!--<div class="title">- Ultrices sit ame</div>-->
        <!--<div class="details">06:15 - 10:45</div>-->
        <!--<div class="title">- Fusce elementum</div>-->
        <!--<div class="details">11:30 - 15:00</div>-->
        <!--<div class="title">- Nam quis mattis</div>-->
        <!--<div class="details">16:15 - 19:45</div>-->
        <!--</div>-->
        <!--<a href="#"></a>-->
        <!--<div class="popup cp-bg-color cp-color">-->
        <!--<div class="title">- Ultrices sit ame</div>-->
        <!--<div class="details">06:15 - 10:45</div>-->
        <!--<p>Morbi quis aliquet ante, quis auctor sem. Nam leo elit, scelerisque porttitor vehicula eget, interdum at turpis. Phasellus ultricies<br><br>Morbi quis aliquet ante, quis auctor sem. Nam leo elit, scelerisque porttitor vehicula eget, interdum at turpis. Phasellus ultricies</p>-->
        <!--<a href="#"></a>-->
        <!--</div>-->
        <!--</td>-->
        <!--<td class="have-event">-->
        <!--<div class="day-week"><span>Tuesday</span></div>-->
        <!--<div class="event">-->
        <!--<div class="title">- Ultrices sit ame</div>-->
        <!--<div class="details">06:15 - 10:45</div>-->
        <!--</div>-->
        <!--<a href="#"></a>-->
        <!--<div class="popup cp-bg-color cp-color">-->
        <!--<div class="title">- Ultrices sit ame</div>-->
        <!--<div class="details">06:15 - 10:45</div>-->
        <!--<p>Morbi quis aliquet ante, quis auctor sem. Nam leo elit, scelerisque porttitor vehicula eget, interdum at turpis. Phasellus ultricies<br><br>Morbi quis aliquet ante, quis auctor sem. Nam leo elit.</p>-->
        <!--<a href="#"></a>-->
        <!--</div>-->
        <!--</td>-->
        <!--<td>-->
        <!--<div class="day-week"><span>Wednesday</span></div>-->
        <!--<div class="event">-->
        <!--<div class="title">- Ultrices sit ame</div>-->
        <!--<div class="details">06:15 - 10:45</div>-->
        <!--<div class="title">- Fusce elementum</div>-->
        <!--<div class="details">11:30 - 15:00</div>-->
        <!--</div>-->
        <!--<a href="#"></a>-->
        <!--<div class="popup cp-bg-color cp-color">-->
        <!--<div class="title">- Ultrices sit ame</div>-->
        <!--<div class="details">06:15 - 10:45</div>-->
        <!--<p>Nam leo elit, scelerisque porttitor vehicula eget,Morbi quis aliquet ante, quis auctor sem. Nam leo elit, scelerisque porttitor vehicula eget, interdum at turpis. Phasellus ultricies<br><br>Morbi quis aliquet ante, quis auctor sem. Nam leo elit, scelerisque porttitor vehicula eget, interdum at turpis. Phasellus ultricies</p>-->
        <!--<a href="#"></a>-->
        <!--</div>-->
        <!--</td>-->
        <!--<td class="have-event">-->
        <!--<div class="day-week"><span>thursday</span></div>-->
        <!--<div class="event">-->
        <!--<div class="title">- Ultrices sit ame</div>-->
        <!--<div class="details">06:15 - 10:45</div>-->
        <!--<div class="title">- Fusce elementum</div>-->
        <!--<div class="details">11:30 - 15:00</div>-->
        <!--<div class="title">- Nam quis mattis</div>-->
        <!--<div class="details">16:15 - 19:45</div>-->
        <!--</div>-->
        <!--<a href="#"></a>-->
        <!--<div class="popup cp-bg-color cp-color">-->
        <!--<div class="title">- Ultrices sit ame</div>-->
        <!--<div class="details">06:15 - 10:45</div>-->
        <!--<p>Morbi quis aliquet ante, quis auctor sem. Nam leo elit, scelerisque porttitor vehicula eget, interdum at turpis. Phasellus ultricies<br><br>Morbi quis aliquet ante, quis auctor sem. Nam leo elit, scelerisque porttitor vehicula eget, interdum at turpis. Phasellus ultricies</p>-->
        <!--<a href="#"></a>-->
        <!--</div>-->
        <!--</td>-->
        <!--<td class="have-event">-->
        <!--<div class="day-week"><span>Friday</span></div>-->
        <!--<div class="event">-->
        <!--<div class="title">- Ultrices sit ame</div>-->
        <!--<div class="details">06:15 - 10:45</div>-->
        <!--<div class="title">- Fusce elementum</div>-->
        <!--<div class="details">11:30 - 15:00</div>-->
        <!--</div>-->
        <!--<a href="#"></a>-->
        <!--<div class="popup cp-bg-color cp-color">-->
        <!--<div class="title">- Ultrices sit ame</div>-->
        <!--<div class="details">06:15 - 10:45</div>-->
        <!--<p>Morbi quis aliquet ante, quis auctor sem. Nam leo elit, scelerisque porttitor vehicula eget, interdum at turpis. Phasellus ultricies</p>-->
        <!--<a href="#"></a>-->
        <!--</div>-->
        <!--</td>-->
        <!--<td>-->
        <!--<div class="day-week"><span>saturday</span></div>-->
        <!--<div class="event">-->
        <!--<div class="title">- Home Practice</div>-->
        <!--</div>-->
        <!--</td>-->
        <!--<td class="have-event">-->
        <!--<div class="day-week"><span>sunday</span></div>-->
        <!--<div class="event">-->
        <!--<div class="title">- Excursion</div>-->
        <!--</div>-->
        <!--</td>-->
        <!--</tr>-->
        <!--</tbody>-->
        <!--</table>-->
        <!--</div>	-->
        <!--</section>-->
        <!-- comments for post -->
        <!--<div class="comments">-->
        <!--<div id="comments">-->
        <!--<div class="comment-title">Ask Me Something <span>(2)</span></div>-->
        <!--<ol class="commentlist">-->
        <!--<li class="comment">-->
        <!--<div class="comment_container clear">-->
    <!--<img src="pic/70x70-img-1.jpg" alt="" class="avatar">-->
        <!--<div class="comment-text">-->
        <!--<p class="meta">-->
        <!--<strong>John Doe</strong>-->
        <!--<time datetime="2016-06-07T12:14:53+00:00">/ 2015.06.25 12:12:14</time>-->
        <!--</p>-->
        <!--<div class="description">-->
        <!--<p>Vestibulum id nisl a neque malesuada hendrerit. Mauris ut porttitor nunc, ut volutpat nisl. Nam ullamcorper ultricies metus vel ornare. Vivamus tincidunt erat in mi accumsan, a sollicitudin risus</p>-->
        <!--</div>-->
        <!--<a class="button reply" href="#"><i class="fa fa-rotate-left"></i> Reply</a>-->
        <!--</div>-->
        <!--</div>-->
        <!--</li>-->
        <!--<li class="comment">-->
        <!--<div class="comment_container second clear-fix">-->
    <!--<img src="pic/70x70-img-1.jpg" alt="" class="avatar">-->
        <!--<div class="comment-text">-->
        <!--<p class="meta">-->
        <!--<strong>Tom Doe</strong>-->
        <!--<time datetime="2016-06-07T12:14:53+00:00">/ 2015.06.25 12:12:14</time>-->
        <!--</p>-->
        <!--<div class="description">-->
        <!--<p>Vestibulum id nisl a neque malesuada hendrerit. Mauris ut porttitor nunc, ut volutpat nisl. Nam ullamcorper ultricies metus vel ornare. Vivamus tincidunt erat in mi accumsan, a sollicitudin risus</p>-->
        <!--</div>-->
        <!--<a class="button reply" href="#"><i class="fa fa-rotate-left"></i> Reply</a>-->
        <!--</div>-->
        <!--</div>-->
        <!--</li>-->
        <!--</ol>-->
        <!--</div>-->
        <!--</div>-->
        <!-- / comments for post -->
        <!-- <hr class="divider-color" /> -->
        <!--<div class="leave-reply">-->
        <!--<div class="title">Leave a Reply</div>-->
        <!--<form class="message-form clear-fix">-->
        <!--<p class="message-form-author">-->
        <!--<input id="author" name="author" type="text" value="" size="30" aria-required="true" placeholder="Your name">-->
        <!--</p>-->
        <!--<p class="message-form-subject">-->
        <!--<input id="subject" name="subject" type="text" value="" size="30" aria-required="true" placeholder="Subject">-->
        <!--</p>-->
        <!--<p class="message-form-message">-->
        <!--<textarea id="message" name="message" cols="45" rows="8" aria-required="true" placeholder="Description"></textarea>-->
        <!--</p>-->
        <!--<p class="form-submit rectangle-button green medium">-->
        <!--<input class="cws-button border-radius alt" name="submit" type="submit" id="submit" value="Submit">-->
        <!--</p>-->
        <!--</form>-->
        <!--</div>-->
    </main>
</div>
<!-- footer -->
@include('footer')
<!-- / footer -->
<script src="/js/jquery.min.js"></script>
<script type='text/javascript' src='/js/jquery.validate.min.js'></script>
<script src="/js/jquery.form.min.js"></script>
<script src="/js/TweenMax.min.js"></script>
<script src="/js/main.js"></script>
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