<!DOCTYPE HTML>
<html>
<head>
    <title>UniLearn - Education and Courses Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <!-- style -->
    <link rel="shortcut icon" href="img/favicon.png">
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
            <h1>بسته ها</h1>
            <nav class="bread-crumb">
                <a href="/">خانه</a>
                <i class="fa fa-long-arrow-left"></i>
                <a href="/packages-grid">بسته ها</a>
            </nav>
        </div>
    </div>
</header>
<div class="page-content">
    <div class="container">
        <main>
            <h2>بسته ها</h2>
            <p>
                بسته بردارید ... بسته های خوب
            </p>
            <div class="clear-fix">
                <?php $count=0;?>
                @foreach ($packs->chunk(3) as $chunkedPacks)
                <div class="grid-col-row">
                    @foreach($chunkedPacks as $pack)
                    <div class="grid-col grid-col-4">
                        <article class="pricing-table color-{{$count%6 + 1}}">
                            <div class="header-pt clear-fix">
                                <h3>{{$pack->title}}</h3>
                            </div>
                            <div class="price-pt">{{$pack->price}}<span class="tooman">هزار تومان </span></div>
                            <p>هر ماه</p>
                            <ul>
                                @foreach($pack['courses'] as $course)
                                    <li>{{$course->name}}</li>
                                @endforeach
                            </ul>
                            <a href="/packages-grid/{{$pack->id}}" class="cws-button border-radius alt">مشاهده جزئیات</a>
                        </article>
                    </div>
                        <?php $count++;?>
                    @endforeach
                </div>
                @endforeach
            </div>

        </main>
    </div>
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
<script src="js/Kimia.js"></script>
</body>
</html>