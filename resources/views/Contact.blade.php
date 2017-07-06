<!DOCTYPE HTML>
<html>
<head>
    <title>وستاکمپ</title>
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
    <link rel="stylesheet" href="css/fateme.css">
    <link rel="stylesheet" href="css/Kimia.css">
    <!--styles -->

</head>
<body class="contact-page">
<header>
<!-- page header -->
@include('header')
<!-- / main menu -->

<div class="page-title">
    <div class="grid-row">
        <h1>ارتباط با ما</h1>
        <nav class="bread-crumb">
            <a href="/">خانه</a>
            <i class="fa fa-long-arrow-left"></i>
            <a href="/contactUs">ارتباط با ما</a>
        </nav>
    </div>
</div>
</header>
<!-- / page header -->
<!-- page content -->
<div class="page-content woocommerce">
    <!-- map -->
    <div class="container clear-fix">
        <div class="map wow fadeInUp">
            <div id="map" class="google-map"></div>
            <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyATpm4C5nbT85Iof0beMfSfhHAXAyCTYOI&sensor=false"></script>
            <script type="text/javascript">
                function mapinitialize() {
                    var latlng = new google.maps.LatLng(35.764058, 51.416628);
                    var myOptions = {
                        zoom: 16,
                        center: latlng,
                        scrollwheel: false,
                        scaleControl: false,
                        disableDefaultUI: false,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        // Google Map Color Styles
                        styles: [{featureType:"landscape",stylers:[{saturation:-100},{lightness:65},{visibility:"on"}]},{featureType:"poi",stylers:[{saturation:-100},{lightness:51},{visibility:"simplified"}]},{featureType:"road.highway",stylers:[{saturation:-100},
                            {visibility:"simplified"}]},{featureType:"road.arterial",stylers:[{saturation:-100},{lightness:30},{visibility:"on"}]},{featureType:"road.local",stylers:[{saturation:-100},{lightness:40},{visibility:"on"}]},{featureType:"transit",stylers:[{saturation:-100},
                            {visibility:"simplified"}]},{featureType:"administrative.province",stylers:[{visibility:"off"}]/**/},{featureType:"administrative.locality",stylers:[{visibility:"off"}]},{featureType:"administrative.neighborhood",stylers:[{visibility:"on"}
                        ]/**/},{featureType:"water",elementType:"labels",stylers:[{visibility:"on"},{lightness:-25},{saturation:-100}]},{featureType:"water",elementType:"geometry",stylers:[{hue:"#ffff00"},{lightness:-25},{saturation:-97}]}]
                    };
                    var map = new google.maps.Map(document.getElementById("map"),myOptions);

                    var image = "/images/map-pin.png";
                    var image = new google.maps.MarkerImage("/images/map-pin.png", null, null, null, new google.maps.Size(84,30));
                    var marker = new google.maps.Marker({
                        map: map,
                        icon: image,
                        position: map.getCenter()
                    });

                    var contentString = '<b>Office</b><br>Streetname 13<br>50000 Sydney';
                    var infowindow = new google.maps.InfoWindow({
                        content: contentString
                    });

                    google.maps.event.addListener(marker, 'click', function() {
                        infowindow.open(map,marker);
                    });
                }
                mapinitialize();
            </script>
        </div>
    </div>
    <!-- / map -->
    <!-- contact form section -->
    <div class="grid-row clear-fix">
        <div class="grid-col-row">
            <div class="grid-col grid-col-8">
                <section>
                    <h2>ارتباط با ما</h2>
                    <div class="widget-contact-form contact-us-form">
                        <!-- contact-form -->
                        {{--<div class="info-boxes error-message alert-boxes error-alert" >
                            <strong>!خطا در فرم</strong>
                            <div class="message"></div>
                        </div>--}}
                        <div class="info-boxes alt error-message alert-boxes error-alert" id="feedback-form-errors">
                            <div class="info-box-icon"><i class="fa fa-times"></i></div>
                            <strong>!خطا در فرم</strong>
                            <div class="close-button"></div>
                        </div>
                        <div class="email_server_responce error-alert">
                            @if (count($errors) > 0)
                                <div class="info-boxes alt error-message ">
                                    <div class="info-box-icon"><i class="fa fa-times"></i></div>
                                            @foreach ($errors->all() as $error)
                                                <p >{{ $error }}</p>
                                            @endforeach
                                    <div class="close-button"></div>
                                </div>
                            @endif
                                @if(session('success'))
                                    <div class="info-boxes  confirmation-message">
                                        <div class="info-box-icon"><i class="fa fa-check"></i></div>
                                        <p >{{session('success')}}</p>
                                        <div class="close-button"></div>
                                    </div>
                                @endif

                        </div>
                        <form action="/contactUs" method="post" class="contact-form alt clear-fix">
                            <input type="text" name="name" value="" size="40" placeholder="نام و نام خانوادگی" aria-invalid="false" aria-required="true">
                            <input type="text" name="email" value="" size="40" placeholder="ایمیل" aria-required="true">
                            <input type="text" name="subject" value="" size="40" placeholder="موضوع" aria-invalid="false" aria-required="true">
                            <textarea name="message"  cols="40" rows="3" placeholder="متن پیام" aria-invalid="false" aria-required="true" maxlength="140"></textarea>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" value="ارسال" class="cws-button border-radius alt">
                        </form>
                        <!--/contact-form -->
                    </div>
                </section>
            </div>
            <div class="grid-col grid-col-4 widget-address">
                <section>
                    <h2>وستاک</h2>
                    <address>
                        <p>مسئول برگزاری دوره های آموزشی وستا کمپ شرکت وستاک با سابقه ی برگزاری چهار دوره کلاس های آموزشی است.</p>
                        <p><strong class="fs-18">آدرس وستاک:</strong><br/>تهران، خیابان دکتر حبیب الله<br/>پلاک 103، واحد 1</p>
                        <p><strong class="fs-18">آدرس محل برگزاری وستاکمپ:</strong><br/>تهران، بلوار آفریقا، خیابان تابان غربی،  <br/>پلاک 17، موسسه آموزش عالی مدیریت و فناوری امیرکبیر</p>
                        <p><strong class="fs-18">تلفن تماس:</strong><br/>
                            <a href="tel:305-333552">021-66065506</a><br/>
                            <a href="tel:305-333552">0903-1909588</a>
                        </p>
                        <p><strong class="fs-18">E-mail:</strong><br/>
                            <a href="mailto:vestacamp@vestaak.com">vestacamp@vestaak.com</a><br/>
                        </p>
                    </address>
                </section>
            </div>
        </div>
    </div>
    <!-- / contact form section -->
</div>
<!-- / page content -->

<!-- footer -->
@include('footer')
<!-- / footer -->


<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<!--<script type="text/javascript" src="../../google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox_packed.html"></script>-->
<!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>-->
<script type='text/javascript' src='js/jquery.validate.min.js'></script>
<script src="js/jquery.form.min.js"></script>
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