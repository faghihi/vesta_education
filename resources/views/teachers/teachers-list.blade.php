<!DOCTYPE HTML>
<html>

<head>
    <title>اساتید وستاکمپ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <!-- style -->
    <link rel="shortcut icon" href="img/logo.ico">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <!--<link rel="stylesheet" type="text/css" href="tuner/css/colorpicker.css" />-->
    <!--<link rel="stylesheet" type="text/css" href="tuner/css/styles.css" />-->
    <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" />
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/Kimia.css">
    <!--styles -->
</head>
<body class="">
<header>
    <!-- main menu -->
@include('header')
<!-- / main menu -->
    <div class="page-title">
        <div class="grid-row">
            <h1>اساتید</h1>
            <nav class="bread-crumb">
                <a href="/">خانه</a>
                <i class="fa fa-long-arrow-left"></i>
                <a href="/teachers">اساتید</a>
            </nav>
        </div>
    </div>
</header>
<div class="page-content">
    <main>
        <div class="container">
            {{--<div class="category-search course-grid-category-search">--}}
                {{--<i class="fa fa-search"></i><!----}}
						 {{----><form method="get" action="{{ url('/teachers-Search') }}" class="search-form" >--}}
                    {{--<select name="category-id" class="category-id">--}}
                        {{--<option selected disabled>دسته بندی ها</option>--}}
                        {{--@foreach($categories as $category)--}}
                            {{--<option value="{{$category->name}}">{{$category->name}}</option>--}}
                        {{--@endforeach--}}
                    {{--</select><!----}}
							 {{----><input type="text" class="input-text" placeholder="کلید واژه" name="search"><!----}}
							 {{----><button type="submit" class="cws-button smaller border-radius alt" >جستجو</button>--}}
                {{--</form>--}}
            {{--</div>--}}
            <section class="clear-fix">
                <h2>با اساتید ما آشنا شوید</h2>
                <div class="grid-col-row">
                    @for($i=0;$i<count($teachers);$i+=8)
                    <div class="grid-col grid-col-6">
                        {{--1--}}
                        @if(isset($teachers[$i+0]))
                        <div class="item-instructor bg-color-1">
                            {{--11--}}
                            <a href="/teachers/{{$teachers[$i+0]->id}}" class="instructor-avatar">
                                <?php $img='/pic/210x220-img-1.jpg'?>
                                @if(isset($teachers[$i+0]->image))
                                    <?php $img=Voyager::image($teachers[$i+0]->image)?>
                                @endif
                                <img src="{{$img}}" alt>
                            </a>
                            <div class="info-box">
                                <h3>{{$teachers[$i+0]->name}}</h3>
                                <span class="instructor-profession">{{$teachers[$i+0]->occupation}}</span>
                                <div class="divider"></div>
                                <p>{{$teachers[$i+0]->introduction}}</p>
                                <div class="social-link">
                                    <a href="{{$teachers[$i+0]->linkedin}}" class="fa fa-linkedin"></a>
                                    <a href="{{$teachers[$i+0]->instagram}}" class="fa fa-instagram"></a>
                                    <a href="{{$teachers[$i+0]->github}}" class="fa fa-github"></a>
                                </div>
                            </div>
                            {{--11--}}
                        </div>
                        @endif
                        @if(isset($teachers[$i+2]))
                            <div class="item-instructor bg-color-3">
                                {{--111--}}
                                <a href="/teachers/{{$teachers[$i+2]->id}}" class="instructor-avatar">
                                    <?php $img='/pic/210x220-img-3.jpg'?>
                                    @if(isset($teachers[$i+2]->image))
                                        <?php $img=Voyager::image($teachers[$i+2]->image)?>
                                    @endif
                                    <img src="{{$img}}" alt>
                                </a>
                                <div class="info-box">
                                    <h3>{{$teachers[$i+2]->name}}</h3>
                                    <span class="instructor-profession">{{$teachers[$i+2]->occupation}}</span>
                                    <div class="divider"></div>
                                    <p>{{$teachers[$i+2]->introduction}}</p>
                                    <div class="social-link">
                                        <a href="{{$teachers[$i+2]->linkedin}}" class="fa fa-linkedin"></a>
                                        <a href="{{$teachers[$i+2]->instagram}}" class="fa fa-instagram"></a>
                                        <a href="{{$teachers[$i+2]->github}}" class="fa fa-github"></a>
                                    </div>
                                </div>
                                {{--111--}}
                            </div>
                        @endif
                            @if(isset($teachers[$i+4]))
                                <div class="item-instructor bg-color-2">
                                    {{--111--}}
                                    <a href="/teachers/{{$teachers[$i+4]->id}}" class="instructor-avatar">
                                        <?php $img='/pic/210x220-img-2.jpg'?>
                                        @if(isset($teachers[$i+4]->image))
                                            <?php $img=Voyager::image($teachers[$i+4]->image)?>
                                        @endif
                                        <img src="{{$img}}" alt>
                                    </a>
                                    <div class="info-box">
                                        <h3>{{$teachers[$i+4]->name}}</h3>
                                        <span class="instructor-profession">{{$teachers[$i+4]->occupation}}</span>
                                        <div class="divider"></div>
                                        <p>{{$teachers[$i+4]->introduction}}</p>
                                        <div class="social-link">
                                            <a href="{{$teachers[$i+4]->linkedin}}" class="fa fa-linkedin"></a>
                                            <a href="{{$teachers[$i+4]->instagram}}" class="fa fa-instagram"></a>
                                            <a href="{{$teachers[$i+4]->github}}" class="fa fa-github"></a>
                                        </div>
                                    </div>
                                    {{--111--}}
                                </div>
                            @endif
                            @if(isset($teachers[$i+6]))
                                <div class="item-instructor bg-color-6">
                                    {{--111--}}
                                    <a href="/teachers/{{$teachers[$i+6]->id}}" class="instructor-avatar">
                                        <?php $img='/pic/210x220-img-4.jpg'?>
                                        @if(isset($teachers[$i+6]->image))
                                            <?php $img=Voyager::image($teachers[$i+6]->image)?>
                                        @endif
                                        <img src="{{$img}}" alt>
                                    </a>
                                    <div class="info-box">
                                        <h3>{{$teachers[$i+6]->name}}</h3>
                                        <span class="instructor-profession">{{$teachers[$i+6]->occupation}}</span>
                                        <div class="divider"></div>
                                        <p>{{$teachers[$i+6]->introduction}}</p>
                                        <div class="social-link">
                                            <a href="{{$teachers[$i+6]->linkedin}}" class="fa fa-linkedin"></a>
                                            <a href="{{$teachers[$i+6]->instagram}}" class="fa fa-instagram"></a>
                                            <a href="{{$teachers[$i+6]->github}}" class="fa fa-github"></a>
                                        </div>
                                    </div>
                                    {{--111--}}
                                </div>
                            @endif
                        {{--1--}}
                    </div>
                    <div class="grid-col grid-col-6">
                        @if(isset($teachers[$i+1]))
                            <div class="item-instructor bg-color-2">
                                {{--111--}}
                                <a href="/teachers/{{$teachers[$i+1]->id}}" class="instructor-avatar">
                                    <?php $img='/pic/210x220-img-2.jpg'?>
                                    @if(isset($teachers[$i+1]->image))
                                        <?php $img=Voyager::image($teachers[$i+1]->image)?>
                                    @endif
                                    <img src="{{$img}}"  alt>
                                </a>
                                <div class="info-box">
                                    <h3>{{$teachers[$i+1]->name}}</h3>
                                    <span class="instructor-profession">{{$teachers[$i+1]->occupation}}</span>
                                    <div class="divider"></div>
                                    <p>{{$teachers[$i+1]->introduction}}</p>
                                    <div class="social-link">
                                        <a href="{{$teachers[$i+1]->linkedin}}" class="fa fa-linkedin"></a>
                                        <a href="{{$teachers[$i+1]->instagram}}" class="fa fa-instagram"></a>
                                        <a href="{{$teachers[$i+1]->github}}" class="fa fa-github"></a>
                                    </div>
                                </div>
                                {{--111--}}
                            </div>
                        @endif
                            @if(isset($teachers[$i+3]))
                                <div class="item-instructor bg-color-6">
                                    {{--111--}}
                                    <a href="/teachers/{{$teachers[$i+3]->id}}" class="instructor-avatar">
                                        <?php $img='/pic/210x220-img-4.jpg'?>
                                        @if(isset($teachers[$i+3]->image))
                                            <?php $img=Voyager::image($teachers[$i+3]->image)?>
                                        @endif
                                        <img src="{{$img}}" alt>
                                    </a>
                                    <div class="info-box">
                                        <h3>{{$teachers[$i+3]->name}}</h3>
                                        <span class="instructor-profession">{{$teachers[$i+3]->occupation}}</span>
                                        <div class="divider"></div>
                                        <p>{{$teachers[$i+3]->introduction}}</p>
                                        <div class="social-link">
                                            <a href="{{$teachers[$i+3]->linkedin}}" class="fa fa-linkedin"></a>
                                            <a href="{{$teachers[$i+3]->instagram}}" class="fa fa-instagram"></a>
                                            <a href="{{$teachers[$i+3]->github}}" class="fa fa-github"></a>
                                        </div>
                                    </div>
                                    {{--111--}}
                                </div>
                            @endif
                                @if(isset($teachers[$i+5]))
                                    <div class="item-instructor bg-color-1">
                                        {{--111--}}
                                        <a href="/teachers/{{$teachers[$i+5]->id}}" class="instructor-avatar">
                                            <?php $img='/pic/210x220-img-1.jpg'?>
                                            @if(isset($teachers[$i+5]->image))
                                                <?php $img=Voyager::image($teachers[$i+5]->image)?>
                                            @endif
                                            <img src="{{$img}}" alt>
                                        </a>
                                        <div class="info-box">
                                            <h3>{{$teachers[$i+5]->name}}</h3>
                                            <span class="instructor-profession">{{$teachers[$i+5]->occupation}}</span>
                                            <div class="divider"></div>
                                            <p>{{$teachers[$i+5]->introduction}}</p>
                                            <div class="social-link">
                                                <a href="{{$teachers[$i+5]->linkedin}}" class="fa fa-linkedin"></a>
                                                <a href="{{$teachers[$i+5]->instagram}}" class="fa fa-instagram"></a>
                                                <a href="{{$teachers[$i+5]->github}}" class="fa fa-github"></a>
                                            </div>
                                        </div>
                                        {{--111--}}
                                    </div>
                                @endif
                                @if(isset($teachers[$i+7]))
                                    <div class="item-instructor bg-color-3">
                                        {{--111--}}
                                        <a href="/teachers/{{$teachers[$i+7]->id}}" class="instructor-avatar">
                                            <?php $img='/pic/210x220-img-3.jpg'?>
                                            @if(isset($teachers[$i+7]->image))
                                                <?php $img=Voyager::image($teachers[$i+7]->image)?>
                                            @endif
                                            <img src="{{$img}}" alt>
                                        </a>
                                        <div class="info-box">
                                            <h3>{{$teachers[$i+7]->name}}</h3>
                                            <span class="instructor-profession">{{$teachers[$i+7]->occupation}}</span>
                                            <div class="divider"></div>
                                            <p>{{$teachers[$i+7]->introduction}}</p>
                                            <div class="social-link">
                                                <a href="{{$teachers[$i+7]->linkedin}}" class="fa fa-linkedin"></a>
                                                <a href="{{$teachers[$i+7]->instagram}}" class="fa fa-instagram"></a>
                                                <a href="{{$teachers[$i+7]->github}}" class="fa fa-github"></a>
                                            </div>
                                        </div>
                                        {{--111--}}
                                    </div>
                                @endif
                    </div>
                    @endfor
                </div>
            </section>
            <div class="page-pagination clear-fix">

                {{$teachers->links('Pagination.default')}}
            </div>
            {{--<div class="page-pagination clear-fix">--}}
                {{--<a href="#"><i class="fa fa-angle-double-left"></i></a>--}}
                {{--<a href="#" class="active">1</a>--}}
                {{--<a href="#">2</a>--}}
                {{--<a href="#">3</a>--}}
                {{--<a href="#"><i class="fa fa-angle-double-right"></i></a>--}}
            {{--</div>--}}
            <hr class="divider-color" />
            <br>
            <section class="padding-top-none">
                <div class="carousel-container">
                    <div class="title-carousel">
                        <h2>اساتید محبوب</h2>
                        <div class="carousel-nav">
                            <div class="carousel-button">
                                <div class="prev"><i class="fa fa-angle-left"></i></div>
                                <div class="next"><i class="fa fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="grid-col-row left-margin-none">
                        <div class="owl-carousel owl-two-item">
                            @for($i=0;$i<count($teachers);$i++)
                            {{--1--}}
                            @if($teachers[$i]['rate']>3)
                                <div class="gallery-item">
                                    <div class="item-instructor bg-color-5">
                                        <a href="/teachers/{{$teachers[$i]->id}}" class="instructor-avatar">
                                            <?php $img='/pic/210x220-img-5.jpg'?>
                                            @if(isset($teachers[$i]->image))
                                                <?php $img=Voyager::image($teachers[$i]->image)?>
                                            @endif
                                            <img src="{{$img}}" alt>
                                        </a>
                                        <div class="info-box">
                                            <h3>{{$teachers[$i]->name}}</h3>
                                            <span class="instructor-profession">{{$teachers[$i]->occupation}}</span>
                                            <div class="divider"></div>
{{--                                            <p>{{$teachers[$i]->introduction}}</p>--}}
                                            <div class="social-link">
                                                <a href="{{$teachers[$i]->linkedin}}" class="fa fa-linkedin"></a>
                                                <a href="{{$teachers[$i]->instagram}}" class="fa fa-instagram"></a>
                                                <a href="{{$teachers[$i]->github}}" class="fa fa-github"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            {{--1--}}
                            @endfor
                            {{--2--}}
                            {{--<div class="gallery-item">--}}
                                {{--<div class="item-instructor bg-color-4">--}}
                                    {{--<a href="profile-v2.html" class="instructor-avatar">--}}
                                        {{--<img src="pic/210x220-img-6.jpg" alt>--}}
                                    {{--</a>--}}
                                    {{--<div class="info-box">--}}
                                        {{--<h3>Max Doe</h3>--}}
                                        {{--<span class="instructor-profession">Writer</span>--}}
                                        {{--<div class="divider"></div>--}}
                                        {{--<p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis.</p>--}}
                                        {{--<div class="social-link">--}}
                                            {{--<a href="#" class="fa fa-linkedin"></a>--}}
                                            {{--<a href="#" class="fa fa-google-plus"></a>--}}
                                            {{--<a href="#" class="fa fa-globe"></a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--2--}}
                            {{--3--}}
                            {{--<div class="gallery-item">--}}
                                {{--<div class="item-instructor bg-color-3">--}}
                                    {{--<a href="profile-v2.html" class="instructor-avatar">--}}
                                        {{--<img src="pic/210x220-img-7.jpg" alt>--}}
                                    {{--</a>--}}
                                    {{--<div class="info-box">--}}
                                        {{--<h3>Piter Doe</h3>--}}
                                        {{--<span class="instructor-profession">Writer</span>--}}
                                        {{--<div class="divider"></div>--}}
                                        {{--<p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis.</p>--}}
                                        {{--<div class="social-link">--}}
                                            {{--<a href="#" class="fa fa-linkedin"></a>--}}
                                            {{--<a href="#" class="fa fa-google-plus"></a>--}}
                                            {{--<a href="#" class="fa fa-globe"></a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--3--}}
                            {{--4--}}
                            {{--<div class="gallery-item">--}}
                                {{--<div class="item-instructor bg-color-6">--}}
                                    {{--<a href="profile-v2.html" class="instructor-avatar">--}}
                                        {{--<img src="pic/210x220-img-1.jpg" alt>--}}
                                    {{--</a>--}}
                                    {{--<div class="info-box">--}}
                                        {{--<h3>Jenny Doe</h3>--}}
                                        {{--<span class="instructor-profession">Professor of Methematic</span>--}}
                                        {{--<div class="divider"></div>--}}
                                        {{--<p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis.</p>--}}
                                        {{--<div class="social-link">--}}
                                            {{--<a href="#" class="fa fa-linkedin"></a>--}}
                                            {{--<a href="#" class="fa fa-google-plus"></a>--}}
                                            {{--<a href="#" class="fa fa-globe"></a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--4--}}
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</div>
<!-- footer -->
@include('footer')
<!-- / footer -->
<script src="js/jquery.min.js"></script>
<script type='text/javascript' src='js/jquery.validate.min.js'></script>
<script src="js/jquery.form.min.js"></script>
<script src="js/TweenMax.min.js"></script>
<script src="js/main.js"></script>
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
</body>

</html>